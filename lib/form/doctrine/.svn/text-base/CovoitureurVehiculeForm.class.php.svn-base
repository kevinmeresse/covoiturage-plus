<?php

/**
 * CovoitureurVehicule form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurVehiculeForm extends BaseCovoitureurVehiculeForm
{
  public function configure()
  {

      unset(
        $this['cle'],
        //$this['etat'],
        $this['date_creation']
        //$this['id_utilisateur']
      );

      //$this->widgetSchema['id_utilisateur'] = new sfWidgetFormInputHidden();
      
      //récupération des utilisateur lié au site_client uniquement
      /*
      $this->widgetSchema['id_utilisateur'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Covoitureur'),
                    'query' => Doctrine::getTable('Covoitureur')->getCovoitureurSite(),
                    'add_empty' => true,

                ));
       * 
       */
      $this->widgetSchema['id_utilisateur'] = new sfWidgetFormInputHidden();
      
      //modification des widgets du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'off', 1 => 'on'),
                    'default' => 1,
                ));
        
       $this->widgetSchema['id_marque'] = new sfWidgetFormDoctrineChoice(array(
           'model' => $this->getRelatedModelName('VehiculeMarque'), 
           'add_empty' => true
           ));
       
       
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
