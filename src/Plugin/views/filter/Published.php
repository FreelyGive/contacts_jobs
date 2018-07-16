<?php

namespace Drupal\contacts_jobs\Plugin\views\filter;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\filter\FilterPluginBase;

/**
 * Filter handler for whether a job is published.
 *
 * @ingroup views_filter_handlers
 *
 * @ViewsFilter("contacts_jobs_published")
 */
class Published extends FilterPluginBase {

  protected function valueForm(&$form, FormStateInterface $form_state) {
    $form['value'] = array(
      '#type' => 'checkbox',
      '#title' => t("Show only published jobs"),
      '#default_value' => $this->value,
    );
  }

  public function query() {
    $now = time();
    $table = $this->ensureMyTable();
    $this->query->addWhereExpression($this->options['group'], "$table.publish_start < $now AND $table.publish_end > $now");
  }

}
