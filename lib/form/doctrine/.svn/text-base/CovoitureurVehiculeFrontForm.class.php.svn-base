<?php

/**
 * CovoitureurVehicule form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurVehiculeFrontForm extends BaseCovoitureurVehiculeForm
{
  public function configure()
  {

      unset(
        $this['cle'],
        $this['etat'],
        $this['date_creation']
        //$this['id_utilisateur']
      );

      $this->widgetSchema['id_utilisateur'] = new sfWidgetFormInputHidden();
      
      //modification des widgets du formulaire
      //gestion de la couleur des vehicules
       $choice = array(
           'noire' => 'noire',
           'blanche' => 'blanche',
           'bleue' => 'bleue',
           'verte' => 'verte',
           'rouge' => 'rouge',
           'jaune' => 'jaune',
           'grise' => 'grise',
           'sable' => 'sable',
           'marron' => 'marron'
       );
       
       $this->widgetSchema['couleur'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $choice,
                    'default' => 'noire',
                ));

  }
}
