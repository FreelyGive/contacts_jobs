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
   * Gets the Job title.
   *
   * @return string
   *   Title of the Job.
   */
  public function getTitle();

  /**
   * Sets the Job title.
   *
   * @param string $title
   *   The Job title.
   *
   * @return \Drupal\contacts_jobs\Entity\JobInterface
   *   The called Job entity.
   */
  public function setTitle($title);

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
   * Gets the Job closing timestamp.
   *
   * @return int
   *   Closing timestamp of the Job.
   */
  public function getClosingTime();

  /**
   * Sets the Job closing timestamp.
   *
   * @param int $timestamp
   *   The Job closing timestamp.
   *
   * @return \Drupal\contacts_jobs\Entity\JobInterface
   *   The called Job entity.
   */
  public function setClosingTime($timestamp);

  /**
   * Gets the Job publish start timestamp.
   *
   * @return int
   *   Publish start timestamp of the Job.
   */
  public function getPublishStartTime();

  /**
   * Sets the Job publish start timestamp.
   *
   * @param int $timestamp
   *   The Job publish start timestamp.
   *
   * @return \Drupal\contacts_jobs\Entity\JobInterface
   *   The called Job entity.
   */
  public function setPublishStartTime($timestamp);

  /**
   * Gets the Job publish end timestamp.
   *
   * @return int
   *   Publish end timestamp of the Job.
   */
  public function getPublishEndTime();

  /**
   * Sets the Job publish end timestamp.
   *
   * @param int $timestamp
   *   The Job publish end timestamp.
   *
   * @return \Drupal\contacts_jobs\Entity\JobInterface
   *   The called Job entity.
   */
  public function setPublishEndTime($timestamp);

  /**
   * Gets the Job promoted start timestamp.
   *
   * @return int
   *   Promoted start timestamp of the Job.
   */
  public function getPromotedStartTime();

  /**
   * Sets the Job promoted start timestamp.
   *
   * @param int $timestamp
   *   The Job promoted start timestamp.
   *
   * @return \Drupal\contacts_jobs\Entity\JobInterface
   *   The called Job entity.
   */
  public function setPromotedStartTime($timestamp);

  /**
   * Gets the Job promoted end timestamp.
   *
   * @return int
   *   Promoted end timestamp of the Job.
   */
  public function getPromotedEndTime();

  /**
   * Sets the Job promoted end timestamp.
   *
   * @param int $timestamp
   *   The Job promoted end timestamp.
   *
   * @return \Drupal\contacts_jobs\Entity\JobInterface
   *   The called Job entity.
   */
  public function setPromotedEndTime($timestamp);

}
