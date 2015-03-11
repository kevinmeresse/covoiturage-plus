<?php

/**
 * CovoitureurVehicule form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurVehiculeNewForm extends BaseCovoitureurVehiculeForm
{
  public function configure()
  {

      unset(
        $this['cle'],
        $this['date_creation'],
        $this['date_modification']
        //$this['id_utilisateur']
      );

      //modification des widgets du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'off', 1 => 'on'),
                    'default' => 1,
                ));

      //récupération des utilisateur lié au site_client uniquement
      $this->widgetSchema['id_utilisateur'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Covoitureur'),
                    'query' => Doctrine::getTable('Covoitureur')->getCovoitureurSite(),
                    'add_empty' => true,

                ));

  }
}
