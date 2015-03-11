<?php

/**
 * WysiNewsletterCategorie filter form base class.
 *
 * @package    roulezmailn_v3
 * @subpackage filter
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseWysiNewsletterCategorieFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'fr_titre'                => new sfWidgetFormFilterInput(),
      'etat'                    => new sfWidgetFormFilterInput(),
      'id_administrateur'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'fr_titre'                => new sfValidatorPass(array('required' => false)),
      'etat'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_administrateur'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('wysi_newsletter_categorie_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'WysiNewsletterCategorie';
  }

  public function getFields()
  {
    return array(
      'id_newsletter_categorie' => 'Number',
      'fr_titre'                => 'Text',
      'etat'                    => 'Number',
      'id_administrateur'       => 'Number',
    );
  }
}
