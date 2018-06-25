<?php

namespace Drupal\contacts_jobs;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Job entities.
 *
 * @ingroup contacts_jobs
 */
class JobListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Job ID');
    $header['title'] = $this->t('Job Title');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\contacts_jobs\Entity\Job */
    $row['id'] = $entity->id();
    $row['title'] = Link::createFromRoute(
      $entity->label(),
      'entity.job.edit_form',
      ['job' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
