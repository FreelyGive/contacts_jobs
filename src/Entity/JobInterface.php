<?php

namespace Drupal\contacts_jobs\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Job entities.
 *
 * @ingroup contacts_jobs
 */
interface JobInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Job name.
   *
   * @return string
   *   Name of the Job.
   */
  public function getName();

  /**
   * Sets the Job name.
   *
   * @param string $name
   *   The Job name.
   *
   * @return \Drupal\contacts_jobs\Entity\JobInterface
   *   The called Job entity.
   */
  public function setName($name);

  /**
   * Gets the Job creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Job.
   */
  public function getCreatedTime();

  /**
   * Sets the Job creation timestamp.
   *
   * @param int $timestamp
   *   The Job creation timestamp.
   *
   * @return \Drupal\contacts_jobs\Entity\JobInterface
   *   The called Job entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Job published status indicator.
   *
   * Unpublished Job are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Job is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Job.
   *
   * @param bool $published
   *   TRUE to set this Job to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\contacts_jobs\Entity\JobInterface
   *   The called Job entity.
   */
  public function setPublished($published);

}
