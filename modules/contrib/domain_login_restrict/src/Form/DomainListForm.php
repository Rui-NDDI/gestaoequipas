<?php

namespace Drupal\domain_login_restrict\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * List the all domain name.
 */
class DomainListForm extends FormBase {

  /**
   * The domain entity manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The domain storage.
   *
   * @var \Drupal\domain\DomainStorageInterface
   */
  protected $domain;

  /**
   * Constructs a new Domain List Form object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The path alias manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
    $this->domain = $this->entityTypeManager->getStorage('domain');
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'domain_list_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $domains = $this->domain->loadMultipleSorted();
    $domainList = ['' => $this->t('-Select-')];
    foreach ($domains as $domain) {
      if ($domain->status()) {
        $domainList[$domain->getUrl()] = $domain->label();
      }
    }
    $form['domain_list'] = [
      '#type' => 'select',
      '#options' => $domainList,
      '#weight' => '0',
      '#attributes' => ['onchange' => "javascript:location.href = this.value;"],
    ];
    $form['#cache'] = ['max-age' => 0];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // No need to do any thing.
  }

}
