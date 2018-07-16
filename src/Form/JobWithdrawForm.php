<?php

namespace Drupal\contacts_jobs\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\contacts_jobs\Entity\JobInterface;

/**
 * Class JobWithdrawForm.
 *
 * @ingroup contacts_jobs
 */
class JobWithdrawForm extends ConfirmFormBase {

  protected $job;

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return t('Do you want to withdraw %title?', ['%title' => $this->job->getTitle()]);
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Withdraw');
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return $this->job->toUrl();
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'job_withdraw';
  }


  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, JobInterface $job = NULL) {
    $this->job = $job;
    return parent::buildForm($form, $form_state);;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->job->setPublishEndTime(time());
    $this->job->save();

    drupal_set_message(t('The %title has been withdrawn.', array('%title' => $this->job->getTitle())));
    $form_state->setRedirectUrl($this->job->toUrl());
  }

}
