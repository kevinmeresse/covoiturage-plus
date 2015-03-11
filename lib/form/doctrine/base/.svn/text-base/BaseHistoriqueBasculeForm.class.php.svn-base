<?php

/**
 * HistoriqueBascule form base class.
 *
 * @method HistoriqueBascule getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHistoriqueBasculeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_historique'  => new sfWidgetFormInputHidden(),
      'id_site_client' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => false)),
      'type_donnee'    => new sfWidgetFormInputText(),
      'ancien_id'      => new sfWidgetFormInputText(),
      'nouvel_id'      => new sfWidgetFormInputText(),
      'date_bascule'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id_historique'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_historique')), 'empty_value' => $this->getObject()->get('id_historique'), 'required' => false)),
      'id_site_client' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'))),
      'type_donnee'    => new sfValidatorInteger(),
      'ancien_id'      => new sfValidatorInteger(),
      'nouvel_id'      => new sfValidatorInteger(),
      'date_bascule'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('historique_bascule[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HistoriqueBascule';
  }

}
