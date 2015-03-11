<?php

/**
 * MailRecommandationTrajetForm form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MailRecommandationTrajetForm extends sfForm 
{

    public function configure()
  {
      $this->widgetSchema['id_trajet'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['id_trajet'] = new sfValidatorInteger(array('required'=> false));
      
      $this->widgetSchema['sender_name'] = new sfWidgetFormInput(array(),array('size' => 50));
      $this->widgetSchema['sender_name']->setLabel('Votre nom');
      $this->validatorSchema['sender_name'] = new sfValidatorString(array('required'=> true));
      
      
      $this->widgetSchema['sender_mail'] = new sfWidgetFormInput(array(),array('size' => 50));
      $this->widgetSchema['sender_mail']->setLabel('Votre mail');
      $this->validatorSchema['sender_mail'] = new sfValidatorEmail(array('required'=> true));
      $this->validatorSchema['sender_mail']->setMessage('required', 'Ce champ est obligatoire.');
      
      $this->widgetSchema['destination_mail'] = new sfWidgetFormInput(array(),array('size' => 50));
      $this->widgetSchema['destination_mail']->setLabel('Destinataire');
      $this->validatorSchema['destination_mail'] = new sfValidatorEmail(array('required'=> true));
      $this->validatorSchema['destination_mail']->setMessage('required', 'Ce champ est obligatoire.');
        
      
      $this->widgetSchema->setNameFormat('mailRecommandation[%s]');
  }
  
}
