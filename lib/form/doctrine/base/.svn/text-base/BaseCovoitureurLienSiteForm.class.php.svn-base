<?php

/**
 * CovoitureurLienSite form base class.
 *
 * @method CovoitureurLienSite getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCovoitureurLienSiteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_covoitureur_lien_site' => new sfWidgetFormInputHidden(),
      'nom'                      => new sfWidgetFormInputText(),
      'date_creation'            => new sfWidgetFormDateTime(),
      'id_site_client'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id_covoitureur_lien_site' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_covoitureur_lien_site')), 'empty_value' => $this->getObject()->get('id_covoitureur_lien_site'), 'required' => false)),
      'nom'                      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'date_creation'            => new sfValidatorDateTime(array('required' => false)),
      'id_site_client'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('covoitureur_lien_site[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CovoitureurLienSite';
  }

}
