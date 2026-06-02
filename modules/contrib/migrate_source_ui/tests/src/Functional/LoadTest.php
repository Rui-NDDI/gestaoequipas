<?php

namespace Drupal\Tests\migrate_source_ui\Functional;

use Drupal\Core\Url;
use Drupal\Tests\BrowserTestBase;

/**
 * Simple test to ensure that main page loads with module enabled.
 *
 * @group migrate_source_ui
 */
class LoadTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = [
    'file',
    'migrate_source_ui',
    'migrate_plus',
    'migrate_source_csv',
    'migrate_spreadsheet',
    'migrate_source_csv_test',
    'system',
    'url_source_test',
  ];

  /**
   * A user with permission to administer site configuration.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $user;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    $this->user = $this->drupalCreateUser([
      'access migrate source ui',
      'administer migrate source ui',
    ]);
    $this->drupalLogin($this->user);
  }

  /**
   * Tests that the home page loads with a 200 response.
   */
  public function testLoad() {
    $assert = $this->assertSession();
    $this->drupalGet(Url::fromRoute('migrate_source_ui.form'));
    $assert->statusCodeEquals(200);
    $assert->optionExists('edit-migrations', 'url_404_source_test');
    $assert->optionExists('edit-migrations', 'migrate_csv_test');
    $file = \Drupal::service('extension.list.module')->getPath('migrate_source_csv_test') . '/artifacts/people.csv';
    $this->submitForm([
      'edit-migrations' => 'migrate_csv_test',
      'edit-source-file' => $file,
    ], 'Migrate');
    $assert->statusCodeEquals(200);
    $this->drupalGet(Url::fromRoute('migrate_source_ui.settings'));
    $assert->statusCodeEquals(200);
  }

}
