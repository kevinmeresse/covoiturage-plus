<?php

/**
 * CpTypeAction form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpTypeActionForm extends BaseCpTypeActionForm
{
  public function configure()
  {
      //ordre des actions
      $this->widgetSchema['cp_type_action_ordre'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10),
                ));
        $this->validatorSchema['cp_type_action_ordre'] = new sfValidatorInteger();
        
        //lien des actions avec les inscit/etab/contacts   ou les trajet
        $this->widgetSchema['cp_type_action_cible'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'contact/inscrit/établissement', 1 => 'trajet (avec statut)', -1 => 'aucun'),
                ));
        $this->setDefault('cp_type_action_cible', 0);
        
        $this->validatorSchema['cp_type_action_cible'] = new sfValidatorInteger();

        $this->widgetSchema['cp_type_action_nom'] = new sfWidgetFormInputText();

        $this->validatorSchema['cp_type_action_nom'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
        
        $this->widgetSchema['cp_type_action_type_mail'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
  }
}
