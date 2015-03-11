<?php

/**
 * Commune form base class.
 *
 * @method Commune getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommuneForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_commune'      => new sfWidgetFormInputHidden(),
      'art_maj'         => new sfWidgetFormInputText(),
      'nom_commune'     => new sfWidgetFormInputText(),
      'art_min'         => new sfWidgetFormInputText(),
      'nom_commune2'    => new sfWidgetFormInputText(),
      'x'               => new sfWidgetFormInputText(),
      'y'               => new sfWidgetFormInputText(),
      'x_nom_decalage'  => new sfWidgetFormInputText(),
      'y_nom_decalage'  => new sfWidgetFormInputText(),
      'latitude'        => new sfWidgetFormInputText(),
      'longitude'       => new sfWidgetFormInputText(),
      'code_postal'     => new sfWidgetFormInputText(),
      'code_insee'      => new sfWidgetFormInputText(),
      'departement'     => new sfWidgetFormInputText(),
      'departement_num' => new sfWidgetFormInputText(),
      'region_num'      => new sfWidgetFormInputText(),
      'chef_lieu'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_commune'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_commune')), 'empty_value' => $this->getObject()->get('id_commune'), 'required' => false)),
      'art_maj'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'nom_commune'     => new sfValidatorString(array('max_length' => 255)),
      'art_min'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'nom_commune2'    => new sfValidatorString(array('max_length' => 255)),
      'x'               => new sfValidatorInteger(array('required' => false)),
      'y'               => new sfValidatorInteger(array('required' => false)),
      'x_nom_decalage'  => new sfValidatorInteger(array('required' => false)),
      'y_nom_decalage'  => new sfValidatorInteger(array('required' => false)),
      'latitude'        => new sfValidatorNumber(),
      'longitude'       => new sfValidatorNumber(),
      'code_postal'     => new sfValidatorInteger(),
      'code_insee'      => new sfValidatorInteger(),
      'departement'     => new sfValidatorString(array('max_length' => 100)),
      'departement_num' => new sfValidatorInteger(),
      'region_num'      => new sfValidatorInteger(),
      'chef_lieu'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('commune[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Commune';
  }

}
