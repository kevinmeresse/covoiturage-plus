<?php

/**
 * LieuTest form base class.
 *
 * @method LieuTest getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLieuTestForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_lieu'            => new sfWidgetFormInputHidden(),
      'bascule_insee'      => new sfWidgetFormInputText(),
      'id_site'            => new sfWidgetFormInputText(),
      'id_site_site'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      'id_pour_partenaire' => new sfWidgetFormInputText(),
      'libelle_lieu'       => new sfWidgetFormInputText(),
      'id_lieu_type'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('LieuType'), 'add_empty' => true)),
      'code_insee'         => new sfWidgetFormInputText(),
      'date_creation'      => new sfWidgetFormDateTime(),
      'date_modification'  => new sfWidgetFormDateTime(),
      'date_publication'   => new sfWidgetFormDate(),
      'date_depublication' => new sfWidgetFormDate(),
      'visible_dans_liste' => new sfWidgetFormInputText(),
      'latitude'           => new sfWidgetFormInputText(),
      'longitude'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_lieu'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_lieu')), 'empty_value' => $this->getObject()->get('id_lieu'), 'required' => false)),
      'bascule_insee'      => new sfValidatorInteger(array('required' => false)),
      'id_site'            => new sfValidatorInteger(array('required' => false)),
      'id_site_site'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'))),
      'id_pour_partenaire' => new sfValidatorInteger(),
      'libelle_lieu'       => new sfValidatorString(array('max_length' => 255)),
      'id_lieu_type'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('LieuType'), 'required' => false)),
      'code_insee'         => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'date_creation'      => new sfValidatorDateTime(),
      'date_modification'  => new sfValidatorDateTime(),
      'date_publication'   => new sfValidatorDate(),
      'date_depublication' => new sfValidatorDate(),
      'visible_dans_liste' => new sfValidatorInteger(array('required' => false)),
      'latitude'           => new sfValidatorNumber(),
      'longitude'          => new sfValidatorNumber(),
    ));

    $this->widgetSchema->setNameFormat('lieu_test[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LieuTest';
  }

}
