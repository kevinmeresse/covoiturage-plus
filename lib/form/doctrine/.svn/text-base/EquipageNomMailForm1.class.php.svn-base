<?php

/**
 * Equipage form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EquipageNomMailForm1 extends BaseFormDoctrine
{
   public function setup()
  {
    $this->setWidgets(array(
      //'id_equipage'   => new sfWidgetFormInputHidden(),
      //'id_trajet'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'), 'add_empty' => false)),
      //'id_createur'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'), 'add_empty' => false)),
      //'id_site'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      //'cle'           => new sfWidgetFormInputText(),
      //'etat'          => new sfWidgetFormInputText(),
      //'date_creation' => new sfWidgetFormDateTime(),
      'nom_equipage'  => new sfWidgetFormInputText(),
      'mail_covoitureur'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      //'id_equipage'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_equipage')), 'empty_value' => $this->getObject()->get('id_equipage'), 'required' => false)),
      //'id_trajet'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Trajet'))),
      //'id_createur'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Covoitureur'))),
      //'id_site'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'))),
      //'cle'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      //'etat'          => new sfValidatorInteger(array('required' => false)),
      //'date_creation' => new sfValidatorDateTime(array('required' => false)),
      'nom_equipage'  => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'mail_covoitureur'  => new sfValidatorString(array('max_length' => 255, 'required' => true))
    ));

    //$this->widgetSchema->setNameFormat('equipage[%s]');

    //$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    //$this->setupInheritance();

    //parent::setup();
  }

  public function getModelName()
  {
    return 'Equipage';
  }

}
