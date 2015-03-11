<?php

/**
 * CovoitureurAmis form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurAmisForm extends BaseCovoitureurAmisForm
{
  public function configure()
  {
      unset(
              $this['id_site'],
              //$this['id_covoitureur'],
              //$this['id_covoitureur_amis'],
              $this['note'],
              $this['date_insert']           
        );
      
      $this->widgetSchema['id_covoitureur'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['id_covoitureur_amis'] = new sfWidgetFormInputHidden();
      
      
//modification du widget
      $this->widgetSchema['valide_message'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non valide', 1 => 'Valide'),
                    'default' => 1,
                ));
  }
}
