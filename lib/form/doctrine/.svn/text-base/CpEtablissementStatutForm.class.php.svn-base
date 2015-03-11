<?php

/**
 * CpEtablissementStatut form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpEtablissementStatutForm extends BaseCpEtablissementStatutForm
{
  public function configure()
  {
      $this->widgetSchema['cp_etablissement_statut_ordre'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10),
                ));
        $this->validatorSchema['cp_etablissement_statut_ordre'] = new sfValidatorInteger();
  }
}
