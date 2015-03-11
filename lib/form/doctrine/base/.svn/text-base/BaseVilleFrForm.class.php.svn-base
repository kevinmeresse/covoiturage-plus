<?php

/**
 * VilleFr form base class.
 *
 * @method VilleFr getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVilleFrForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_ville'        => new sfWidgetFormInputHidden(),
      'id_pays'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaysMonde'), 'add_empty' => false)),
      'art_maj'         => new sfWidgetFormInputText(),
      'nom_ville'       => new sfWidgetFormInputText(),
      'art_min'         => new sfWidgetFormInputText(),
      'nom_ville2'      => new sfWidgetFormInputText(),
      'x'               => new sfWidgetFormInputText(),
      'y'               => new sfWidgetFormInputText(),
      'x_nom_decalage'  => new sfWidgetFormInputText(),
      'y_nom_decalage'  => new sfWidgetFormInputText(),
      'latitude'        => new sfWidgetFormInputText(),
      'longitude'       => new sfWidgetFormInputText(),
      'code_postal'     => new sfWidgetFormInputText(),
      'code_insee'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Equipage'), 'add_empty' => false)),
      'departement'     => new sfWidgetFormInputText(),
      'departement_num' => new sfWidgetFormInputText(),
      'region_num'      => new sfWidgetFormInputText(),
      'chef_lieu'       => new sfWidgetFormInputText(),
      'cle'             => new sfWidgetFormInputText(),
      'ma_plage'        => new sfWidgetFormInputText(),
      'pavillonbleu'    => new sfWidgetFormInputText(),
      'id_communaute'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CommunauteCommune'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_ville'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_ville')), 'empty_value' => $this->getObject()->get('id_ville'), 'required' => false)),
      'id_pays'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PaysMonde'), 'required' => false)),
      'art_maj'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'nom_ville'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'art_min'         => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'nom_ville2'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'x'               => new sfValidatorInteger(array('required' => false)),
      'y'               => new sfValidatorInteger(array('required' => false)),
      'x_nom_decalage'  => new sfValidatorInteger(array('required' => false)),
      'y_nom_decalage'  => new sfValidatorInteger(array('required' => false)),
      'latitude'        => new sfValidatorNumber(),
      'longitude'       => new sfValidatorNumber(),
      'code_postal'     => new sfValidatorInteger(),
      'code_insee'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Equipage'))),
      'departement'     => new sfValidatorString(array('max_length' => 100)),
      'departement_num' => new sfValidatorInteger(),
      'region_num'      => new sfValidatorInteger(),
      'chef_lieu'       => new sfValidatorInteger(array('required' => false)),
      'cle'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'ma_plage'        => new sfValidatorInteger(array('required' => false)),
      'pavillonbleu'    => new sfValidatorInteger(array('required' => false)),
      'id_communaute'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CommunauteCommune'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ville_fr[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'VilleFr';
  }

}
