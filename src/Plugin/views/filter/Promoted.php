<?php

namespace Drupal\contacts_jobs\Plugin\views\filter;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\filter\FilterPluginBase;

/**
 * Filter handler for whether a job is promoted.
 *
 * @ingroup views_filter_handlers
 *
 * @ViewsFilter("contacts_jobs_promoted")
 */
class Promoted extends FilterPluginBase {

  protected function valueForm(&$form, FormStateInterface $form_state) {
    $form['value'] = array(
      '#type' => 'checkbox',
      '#title' => t("Show only promoted jobs"),
      '#default_value' => $this->value,
    );
  }

  public function query() {
    $now = time();
    $table = $this->ensureMyTable();
    $this->query->addWhereExpression($this->options['group'], "$table.promoted_start < $now AND $table.promoted_end > $now");
  }

}
