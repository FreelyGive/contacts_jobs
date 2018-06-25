<?php

namespace Drupal\contacts_jobs\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Job entity.
 *
 * @ingroup contacts_jobs
 *
 * @ContentEntityType(
 *   id = "job",
 *   label = @Translation("Job"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\contacts_jobs\JobListBuilder",
 *     "views_data" = "Drupal\contacts_jobs\Entity\JobViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\contacts_jobs\Form\JobForm",
 *       "add" = "Drupal\contacts_jobs\Form\JobForm",
 *       "edit" = "Drupal\contacts_jobs\Form\JobForm",
 *       "delete" = "Drupal\contacts_jobs\Form\JobDeleteForm",
 *     },
 *     "access" = "Drupal\contacts_jobs\JobAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\contacts_jobs\JobHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "job",
 *   admin_permission = "administer job entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "title",
 *     "uuid" = "uuid",
 *     "uid" = "uid",
 *     "langcode" = "langcode",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/job/{job}",
 *     "add-form" = "/admin/structure/job/add",
 *     "edit-form" = "/admin/structure/job/{job}/edit",
 *     "delete-form" = "/admin/structure/job/{job}/delete",
 *     "collection" = "/admin/structure/job",
 *   },
 *   field_ui_base_route = "job.settings"
 * )
 */
class Job extends ContentEntityBase implements JobInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return $this->get('title')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setTitle($title) {
    $this->set('title', $title);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwner() {
    return $this->get('uid')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwnerId() {
    return $this->get('uid')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwnerId($uid) {
    $this->set('uid', $uid);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwner(UserInterface $account) {
    $this->set('uid', $account->id());
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getClosingTime() {
    return $this->get('closing')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setClosingTime($timestamp) {
    $this->set('closing', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPublishStartTime() {
    return $this->get('publish_start')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setPublishStartTime($timestamp) {
    $this->set('publish_start', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPublishEndTime() {
    return $this->get('publish_end')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setPublishEndTime($timestamp) {
    $this->set('publish_end', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPromotedStartTime() {
    return $this->get('promoted_start')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setPromotedStartTime($timestamp) {
    $this->set('promoted_start', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getPromotedEndTime() {
    return $this->get('promoted_end')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setPromotedEndTime($timestamp) {
    $this->set('promoted_end', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Job Title'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['uid'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Authored by'))
      ->setDescription(t('The username of the content author.'))
      ->setSetting('target_type', 'user')
      ->setDefaultValueCallback('Drupal\node\Entity\Node::getCurrentUserId')
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'author',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 5,
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => '60',
          'placeholder' => '',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the job was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the job was last edited.'));

    $fields['closing'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Closing Date'))
      ->setDescription(t('The time that the job closes.'))
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'timestamp',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'datetime_timestamp',
        'weight' => 10,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['publish_start'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Publish Start'))
      ->setDescription(t('The time that the job starts publishing.'));

    $fields['publish_end'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Publish End'))
      ->setDescription(t('The time that the job ends publishing.'));

    $fields['promoted_start'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Promoted Start'))
      ->setDescription(t('The time that the job starts promoting.'));

    $fields['promoted_end'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Promoted End'))
      ->setDescription(t('The time that the job ends promoting.'));

    return $fields;
  }

  /**
   * Default value callback for 'uid' base field definition.
   *
   * @see ::baseFieldDefinitions()
   *
   * @return array
   *   An array of default values.
   */
  public static function getCurrentUserId() {
    return [\Drupal::currentUser()->id()];
  }

}
