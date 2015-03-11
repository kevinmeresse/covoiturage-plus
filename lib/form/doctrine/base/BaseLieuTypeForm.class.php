<?php

/**
 * LieuType form base class.
 *
 * @method LieuType getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLieuTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_lieu_type'           => new sfWidgetFormInputHidden(),
      'libelle_lieu_type'      => new sfWidgetFormInputText(),
      'libelle_lieu_type_neer' => new sfWidgetFormInputText(),
      'version_light'          => new sfWidgetFormInputText(),
      'id_site_client'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
      'evenement'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_lieu_type'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_lieu_type')), 'empty_value' => $this->getObject()->get('id_lieu_type'), 'required' => false)),
      'libelle_lieu_type'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'libelle_lieu_type_neer' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'version_light'          => new sfValidatorInteger(array('required' => false)),
      'id_site_client'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'required' => false)),
      'evenement'              => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lieu_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LieuType';
  }

}
