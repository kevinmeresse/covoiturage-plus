<?php

/**
 * Covoitureur form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurRechercheForm extends BaseCovoitureurForm {

    public function configure() {
        /*
        $this->useFields(array(
            //'date_creation', 
            'ville',
            'rsa',
            'newsletter',
            'mail'
            ));
            */
    
        
        unset(
                $this['photo_ext'],
                //$this['etat_site_client_validation'], 
                $this['inscription_minute'], 
                $this['date_fin'],
                $this['identifiant'],
                $this['civilite'],
                $this['tranche_age'],
                $this['nombre_connexion'],
                $this['permanente_connexion'],
                $this['note'],
                $this['mise_en_relation_sms'],
                $this['bascule'], 
                $this['mot_de_passe'], 
                $this['mail_perso'], 
                $this['telephone_mobile'], 
                $this['question'], $this['reponse'], 
                $this['id_partenaire'], $this['id_site_client'], 
                $this['id_site_site'], $this['etat_video'], 
                $this['dirgrp'], $this['dptag'], 
                $this['svcpdv'], $this['date_naissance'], 
                $this['id_facebook'], $this['date_derniere_connexion']
        );
        
        //amènagement des widget
        //ville
        //$this->widgetSchema['ville'] = new sfWidgetFormInputText();
        //$this->validatorSchema['ville'] =  new sfValidatorString(array('required' => false));
       
        
        //gestion du champ "bénéficiaire du RSA"
        $this->widgetSchema['rsa'] = new sfWidgetFormChoice(array(
                        'expanded' => true,
                        'multiple' => false,
                        'choices' => array(0 => 'Non', 1 => 'Oui', 2 => 'Indifférent!!!!'),
                        'default' => 2,
                    ));

        $this->widgetSchema['rsa']->setLabel('Bénéficiaire du RSA 44444?');
        
        $this->validatorSchema['rsa'] = new sfValidatorChoice(array('choices' => array(0,1,2), 'required' => false));
        
        
        //widget de Newsletter
        $this->widgetSchema['newsletter'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui', 2 => 'Indifférent'),
                    'default' => 2,
                ));
        $this->widgetSchema['newsletter']->setLabel('Inscrit à la newsletter?');
        
        $this->validatorSchema['newsletter'] = new sfValidatorChoice(array('choices' => array(0,1,2)));
        
        
        
        
        //widgets spécifiques pour la recherche de la date de création
        $this->widgetSchema['date_debut'] = new sfWidgetFormI18nDate(array('culture' => 'fr_FR'));        
        $this->validatorSchema['date_debut'] = new sfValidatorDate(array('required' => false));
        
        $this->widgetSchema['date_fin'] = new sfWidgetFormI18nDate(array('culture' => 'fr_FR'));        
        $this->validatorSchema['date_fin'] = new sfValidatorDate(array('required' => false));
        
        
        //widget pour la recherche sur trajet
        $this->widgetSchema['trajet'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui', 99 => 'Indifférent'),
                    'default' => 0,
                ));
        $this->widgetSchema['trajet']->setLabel('a déposé un trajet ?');
        
        $this->validatorSchema['trajet'] = new sfValidatorChoice(array('choices' => array(0,1,99)));
        
        //widget pour la recherche sur équipage
        $this->widgetSchema['equipage'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui', 99 => 'Indifférent'),
                    'default' => 0,
                ));
        $this->widgetSchema['equipage']->setLabel('fait partie d\'un équipage ?');
        
        $this->validatorSchema['equipage'] = new sfValidatorChoice(array('choices' => array(0,1,99)));
        
        //initialisation des valeurs par défaut
        $this->setDefaults(array(
            'rsa' => 2,
            'newsletter' => 2
            ));
        
        
        $this->widgetSchema->setNameFormat('covoitureurrecherche5[%s]');
    }

}
