<?php

/**
 * CpTypeAction form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpTypeActionTrajetForm extends BaseCpTypeActionForm
{
  public function configure($id_covoitureur = null, $is_statut_init = null)
  {
      
      //gestion du composant statut avec gestion de l'ordre
      $this->widgetSchema['cp_type_action_statut_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    'query' => Doctrine::getTable('Lieu')->getLieuZISite(),
                    'add_empty' => true,
                ));
      
      $this->widgetSchema['cp_type_action_ordre'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10),
                ));
        $this->validatorSchema['cp_type_action_ordre'] = new sfValidatorInteger();

        $this->widgetSchema['cp_type_action_nom'] = new sfWidgetFormInputText();

        $this->validatorSchema['cp_type_action_nom'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
  }
}
