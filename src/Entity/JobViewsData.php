<?php

namespace Drupal\contacts_jobs\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Job entities.
 */
class JobViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['job_field_data']['published'] = [
      'title' => t('Show only published'),
      'help' => t('Whether a job is published'),
      'filter' => [
        'title' => t('Published'),
        'id' => 'contacts_jobs_published',
      ],
    ];

    $data['job_field_data']['promoted'] = [
      'title' => t('Show only promoted '),
      'help' => t('Whether a job is promoted'),
      'filter' => [
        'title' => t('Promoted'),
        'id' => 'contacts_jobs_promoted',
      ],
    ];

    return $data;
  }

}
