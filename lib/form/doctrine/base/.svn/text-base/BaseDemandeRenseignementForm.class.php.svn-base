<?php

/**
 * DemandeRenseignement form base class.
 *
 * @method DemandeRenseignement getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDemandeRenseignementForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'demande_renseignement_id'          => new sfWidgetFormInputHidden(),
      'demande_renseignement_civilite'    => new sfWidgetFormInputText(),
      'demande_renseignement_nom'         => new sfWidgetFormInputText(),
      'demande_renseignement_prenom'      => new sfWidgetFormInputText(),
      'demande_renseignement_societe'     => new sfWidgetFormInputText(),
      'demande_renseignement_fonction'    => new sfWidgetFormInputText(),
      'demande_renseignement_adresse'     => new sfWidgetFormInputText(),
      'demande_renseignement_cp'          => new sfWidgetFormInputText(),
      'demande_renseignement_ville'       => new sfWidgetFormInputText(),
      'demande_renseignement_pays'        => new sfWidgetFormInputText(),
      'demande_renseignement_telephone'   => new sfWidgetFormInputText(),
      'demande_renseignement_email'       => new sfWidgetFormInputText(),
      'demande_renseignement_fax'         => new sfWidgetFormInputText(),
      'demande_renseignement_texte'       => new sfWidgetFormTextarea(),
      'demande_renseignement_type'        => new sfWidgetFormInputText(),
      'demande_renseignement_date_insert' => new sfWidgetFormTime(),
      'id_site_client'                    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'demande_renseignement_id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('demande_renseignement_id')), 'empty_value' => $this->getObject()->get('demande_renseignement_id'), 'required' => false)),
      'demande_renseignement_civilite'    => new sfValidatorString(array('max_length' => 15)),
      'demande_renseignement_nom'         => new sfValidatorString(array('max_length' => 50)),
      'demande_renseignement_prenom'      => new sfValidatorString(array('max_length' => 50)),
      'demande_renseignement_societe'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'demande_renseignement_fonction'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'demande_renseignement_adresse'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'demande_renseignement_cp'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'demande_renseignement_ville'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'demande_renseignement_pays'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'demande_renseignement_telephone'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'demande_renseignement_email'       => new sfValidatorString(array('max_length' => 255)),
      'demande_renseignement_fax'         => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'demande_renseignement_texte'       => new sfValidatorString(),
      'demande_renseignement_type'        => new sfValidatorString(array('max_length' => 255)),
      'demande_renseignement_date_insert' => new sfValidatorTime(array('required' => false)),
      'id_site_client'                    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SiteClient'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('demande_renseignement[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DemandeRenseignement';
  }

}
