<?php

namespace Drupal\migrate_source_ui\Form;

use Drupal\Component\Datetime\TimeInterface;
use Drupal\Component\Utility\NestedArray;
use Drupal\Core\File\FileExists;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;
use Drupal\Core\StringTranslation\TranslationManager;
use Drupal\migrate\Plugin\MigrationInterface;
use Drupal\migrate\Plugin\MigrationPluginManager;
use Drupal\migrate_plus\Plugin\migrate\source\Url;
use Drupal\migrate_plus\Plugin\migrate_plus\data_parser\Json;
use Drupal\migrate_plus\Plugin\migrate_plus\data_parser\Xml;
use Drupal\migrate_source_csv\Plugin\migrate\source\CSV;
use Drupal\migrate_source_ui\StubMigrationMessage;
use Drupal\migrate_spreadsheet\Plugin\migrate\source\Spreadsheet;
use Drupal\migrate_tools\MigrateBatchExecutable;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Management form to control execution of migrations via the UI.
 */
class MigrateSourceUiForm extends FormBase {

  public function __construct(
    protected MigrationPluginManager $migrationPluginManager,
    protected $configFactory,
    protected FileSystemInterface $fileSystem,
    protected TimeInterface $time,
    protected KeyValueFactoryInterface $keyValueFactory,
    protected TranslationManager $translationManager,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('plugin.manager.migration'),
      $container->get('config.factory'),
      $container->get('file_system'),
      $container->get('datetime.time'),
      $container->get('keyvalue'),
      $container->get('string_translation'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'migrate_source_ui_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $options = [];
    foreach ($this->migrationPluginManager->getDefinitions() as $definition) {
      if ($extension = $this->getFileExtensionSupported($definition)) {
        $options[$definition['id']] = $this->t('%id (supports %file_type)', [
          '%id' => $definition['label'] ?? $definition['id'],
          '%file_type' => $extension,
        ]);
      }
    }
    natcasesort($options);
    $form['migrations'] = [
      '#type' => 'select',
      '#title' => $this->t('Migrations'),
      '#options' => $options,
    ];
    $form['source_file'] = [
      '#type' => 'file',
      '#title' => $this->t('Upload the source file'),
      '#upload_validators' => [
        'FileExtension' => [
          'extensions' => 'json csv xml',
        ],
      ],
    ];
    $form['update_existing_records'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Update existing records'),
      '#default_value' => 1,
    ];
    $form['import'] = [
      '#type' => 'submit',
      '#value' => $this->t('Migrate'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    parent::validateForm($form, $form_state);

    $migration_id = $form_state->getValue('migrations');
    $definition = $this->migrationPluginManager->getDefinition($migration_id);
    $extension = $this->getFileExtensionSupported($definition);

    $validators = ['FileExtension' => ['extensions' => $extension]];
    // Check to see if a specific file temp directory is configured. If not,
    // default the value to FALSE, which will instruct file_save_upload() to
    // use Drupal's temporary files scheme.
    $file_destination = $this->configFactory->get('migrate_source_ui.settings')->get('file_temp_directory');
    if (is_null($file_destination)) {
      $file_destination = FALSE;
    }

    $directory = $this->fileSystem->realpath($file_destination);
    $this->fileSystem->prepareDirectory($directory, FileSystemInterface::CREATE_DIRECTORY);

    $file = file_save_upload('source_file', $validators, $file_destination, 0, FileExists::Replace);

    if (isset($file)) {
      // File upload was attempted.
      if ($file) {
        $form_state->setValue('file_path', $file->getFileUri());
      }
      // File upload failed.
      else {
        $form_state->setErrorByName('source_file', $this->t('The file could not be uploaded.'));
      }
    }
    else {
      $form_state->setErrorByName('source_file', $this->t('You have to upload a source file.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $migration_id = $form_state->getValue('migrations');
    /** @var \Drupal\migrate\Plugin\Migration $migration */
    $migration = $this->migrationPluginManager->createInstance($migration_id);

    // Reset status.
    $status = $migration->getStatus();
    if ($status !== MigrationInterface::STATUS_IDLE) {
      $migration->setStatus(MigrationInterface::STATUS_IDLE);
      $this->messenger()->addWarning($this->t('Migration @id reset to Idle', ['@id' => $migration_id]));
    }

    $executable = new MigrateBatchExecutable($migration, new StubMigrationMessage(), $this->keyValueFactory, $this->time, $this->translationManager, $this->migrationPluginManager, $this->getBatchOptions($form, $form_state));
    $executable->batchImport();
  }

  /**
   * Prepares an array of migrate batch options.
   */
  protected function getBatchOptions($form, FormStateInterface $form_state): array {
    $options = [
      'configuration' => [
        'source' => [
          'path' => $form_state->getValue('file_path'),
        ],
      ],
    ];

    // Force updates or not.
    if ($form_state->getValue('update_existing_records')) {
      $options['update'] = 1;
    }

    return $options;
  }

  /**
   * The allowed file extension for the migration.
   *
   * @param array $definition
   *   The migration definition array.
   *
   * @return string|null
   *   The file extension or null if not detected.
   */
  public function getFileExtensionSupported(array $definition): ?string {
    $extension_detected = NULL;
    $extensions_allowed = ['csv', 'json', 'xml'];

    $migrationInstance = $this->migrationPluginManager->createStubMigration($definition);
    if ($migrationInstance->getSourcePlugin() instanceof CSV) {
      $extension_detected = 'csv';
    }
    elseif ($migrationInstance->getSourcePlugin() instanceof Json) {
      $extension_detected = 'json';
    }
    elseif ($migrationInstance->getSourcePlugin() instanceof Spreadsheet) {
      $extension_detected = 'csv ods slk xls xlsx xml';
    }
    elseif ($migrationInstance->getSourcePlugin() instanceof Xml) {
      $extension_detected = 'xml';
    }
    elseif ($migrationInstance->getSourcePlugin() instanceof Url) {
      $extension_detected = NestedArray::getValue($definition, [
        'source',
        'data_parser_plugin',
      ]);
      if ($extension_detected === 'simple_xml') {
        $extension_detected = 'xml';
      }
    }

    if ($extension_detected && in_array($extension_detected, $extensions_allowed, TRUE)) {
      return $extension_detected;
    }
    return NULL;
  }

}
