<?php

/**
 * ContactLesecomobiles filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContactLesecomobilesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'contact_nom'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact_prenom'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact_mail'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact_adresse'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact_tel'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact_organisme' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact_fonction'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact_remarques' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact_choixdate' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'contact_nom'       => new sfValidatorPass(array('required' => false)),
      'contact_prenom'    => new sfValidatorPass(array('required' => false)),
      'contact_mail'      => new sfValidatorPass(array('required' => false)),
      'contact_adresse'   => new sfValidatorPass(array('required' => false)),
      'contact_tel'       => new sfValidatorPass(array('required' => false)),
      'contact_organisme' => new sfValidatorPass(array('required' => false)),
      'contact_fonction'  => new sfValidatorPass(array('required' => false)),
      'contact_remarques' => new sfValidatorPass(array('required' => false)),
      'contact_choixdate' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('contact_lesecomobiles_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactLesecomobiles';
  }

  public function getFields()
  {
    return array(
      'contact_id'        => 'Number',
      'contact_nom'       => 'Text',
      'contact_prenom'    => 'Text',
      'contact_mail'      => 'Text',
      'contact_adresse'   => 'Text',
      'contact_tel'       => 'Text',
      'contact_organisme' => 'Text',
      'contact_fonction'  => 'Text',
      'contact_remarques' => 'Text',
      'contact_choixdate' => 'Number',
    );
  }
}
