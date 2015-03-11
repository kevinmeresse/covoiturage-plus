<?php

/**
 * CovoitureurVehicule form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurVehiculeMarqueFrontForm extends BaseCovoitureurVehiculeForm
{
  public function configure()
  {
      //formulaire servant uniquement à récupérer la liste des modeles 
      //  de véhicules en focntion de la marque passées
      $this->useFields(array('id_modele'));

/* paasage de parametre a un formulaire
 * $form = new myForm(null, 
                   array('attributeFoo' => 
                         $this->getUser()->getAttribute('attributeFoo'));
 */      

//recuperation du parametre passé au formulaire
      $idMarque = $this->getOption('attributeFoo');
      
      //requete de récupération des modeles
      $choice = array();
      $result = Doctrine_Core::getTable('VehiculeModele')->getVehiculeModeleListByMarque($idMarque);
      foreach($result as $vehiculeModele){
          $choice[$vehiculeModele->getIdModele()] = $vehiculeModele->getNomModele();
      }
      
      //modification des widgets du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => $choice,

                ));


  }
}
