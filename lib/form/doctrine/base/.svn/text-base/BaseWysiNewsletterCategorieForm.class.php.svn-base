<?php

/**
 * WysiNewsletterCategorie form base class.
 *
 * @method WysiNewsletterCategorie getObject() Returns the current form's model object
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseWysiNewsletterCategorieForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_newsletter_categorie' => new sfWidgetFormInputHidden(),
      'fr_titre'                => new sfWidgetFormInputText(),
      'etat'                    => new sfWidgetFormInputText(),
      'id_administrateur'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_newsletter_categorie' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_newsletter_categorie')), 'empty_value' => $this->getObject()->get('id_newsletter_categorie'), 'required' => false)),
      'fr_titre'                => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'etat'                    => new sfValidatorInteger(array('required' => false)),
      'id_administrateur'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('wysi_newsletter_categorie[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WysiNewsletterCategorie';
  }

}
