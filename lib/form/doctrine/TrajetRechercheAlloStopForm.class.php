<?php

/**
 * CpEtablissement form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrajetRechercheAlloStopForm extends BaseTrajetForm {

    public function configure() {

        //selection des champs à utiliser pour le formulaire de recherche du front office
        $this->useFields(array(
            'depart_ville',
            'destination_ville',
            'id_evenement'
        ));




        $this->validatorSchema['depart_ville'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['destination_ville'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

        $this->widgetSchema['depart_ville1'] = new sfWidgetFormInputText();
        $this->widgetSchema['destination_ville1'] = new sfWidgetFormInputText();


        //Créeation du tableau des rayons de départ
        $distanceTab = array();
        $distanceTab[''] = '';
        for ($distance = 1; $distance <= 10; $distance++) {
            $distanceMetre = $distance * 1000;
            $distanceTab[$distanceMetre] = $distance;
        }

        $this->widgetSchema['depart_ville_rayon'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $distanceTab
                ));

        $this->widgetSchema['destination_ville_rayon'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $distanceTab
                ));


        //détermination du type evenement
        $this->widgetSchema['id_evenement'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    //'query' => $this->getRelatedModelName('Lieu')->getTable()->getLieuSite(),
                    'query' => Doctrine::getTable('Lieu')->getLieuEvenementSite(),
                    'add_empty' => true,
                ));
        $this->validatorSchema['id_evenement'] = new sfValidatorInteger(array('required' => false));


        $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    'query' => Doctrine::getTable('Lieu')->getLieuSite(),
                    'add_empty' => 'Lieu'
                ));

        $this->widgetSchema['destination_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    'query' => Doctrine::getTable('Lieu')->getLieuSite(),
                    'add_empty' => 'Lieu'
                ));

//choix du type de covoiyurage (conductuer, indifférent, passager)
        $this->widgetSchema['type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        $this->validatorSchema['type_cov'] = new sfValidatorInteger(array('required' => false));



    }

}
