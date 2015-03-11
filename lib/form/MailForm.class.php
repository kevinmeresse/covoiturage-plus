<?php

/**
 * ContactMailCovoitureurt form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MailForm extends sfForm 
{

    public function configure()
  {
      $this->widgetSchema['id_trajet'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['id_trajet'] = new sfValidatorInteger(array('required'=> false));
      
      $this->widgetSchema['id_covoitureur'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['id_covoitureur'] = new sfValidatorInteger(array('required'=> false));
      
      $this->widgetSchema['mail_covoitureur'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['mail_covoitureur'] = new sfValidatorString(array('required'=> false));
      
      $this->widgetSchema['mail_subject'] = new sfWidgetFormInput(array(),array('size' => 50));
      $this->widgetSchema['mail_subject']->setLabel('Objet');
      $this->validatorSchema['mail_subject'] = new sfValidatorString(array('required'=> true));
        
      $this->widgetSchema['texte'] = new sfWidgetFormTextarea(array());
      $this->widgetSchema['texte']->setLabel('Indiquez votre message');
      $this->validatorSchema['texte'] = new sfValidatorString(array('required'=> true));
      

      
      $this->widgetSchema->setNameFormat('mail[%s]');
  }

/*
  
  public function configure()
  {
    $this->setWidgets(array(
      'id_trajet'   => new sfWidgetFormInputHidden(),
      'id_covoitureur'   => new sfWidgetFormInputHidden(),
      'texte' => new sfWidgetFormTextarea(),
    ));
 
    $this->setValidators(array(
      'id_trajet'   => new sfValidatorInteger(),
      'id_covoitureur'   => new sfValidatorInteger(),
      'texte' => new sfValidatorString(array('max_length' => 255)),
    ));
  }
*/
}
