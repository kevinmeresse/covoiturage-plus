<?php

/**
 * CpTrajet form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpTrajetForm extends BaseCpTrajetForm
{
  public function configure()
  {
      //gestion des heures de départ et d'arrivée
        $horaire = array(); //On crée par exemple un tableau de valeur
        for ($heure = 0; $heure <= 23; $heure++) {
            for ($quart = 0; $quart <= 45; $quart = $quart + 15) {
                if (strlen($heure) == 1) {
                    $heure = "0" . $heure;
                }
                if (strlen($quart) == 1) {
                    $quart = "0" . $quart;
                }
                //$temps = $heure.":".$quart.":00";
                $temps = $heure . ":" . $quart;
                $horaire[$temps] = $temps;
            }
        }
        //$horaire = array('' => '') + $horaire;
        $horaire_list = array_combine($horaire, $horaire);
        
        $minute_time = array(00 => '00', 15 => '15', 30 => '30', 45 => '45');
/*
        //LUNDI
        $this->widgetSchema['lundi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list
                    //'add_empty' => true,
                    //'default' => '07:30',
                ));
        //$this->setDefault('lundi_prise_service_min', 5);
        $this->widgetSchema['lundi_prise_service_min']->setDefault('07:30');
        $this->validatorSchema['lundi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['lundi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['lundi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['lundi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['lundi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['lundi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['lundi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        //MARDI
        $this->widgetSchema['mardi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['mardi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['mardi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['mardi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['mardi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['mardi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['mardi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['mardi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        //MERCREDI
        $this->widgetSchema['mercredi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['mercredi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['mercredi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['mercredi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['mercredi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['mercredi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['mercredi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['mercredi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        //JEUDI
        $this->widgetSchema['jeudi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['jeudi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['jeudi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['jeudi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['jeudi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['jeudi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['jeudi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['jeudi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        //VENDREDI
        $this->widgetSchema['vendredi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['vendredi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['vendredi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['vendredi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['vendredi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['vendredi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['vendredi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['vendredi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        //SAMEDI
        $this->widgetSchema['samedi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['samedi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['samedi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['samedi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['samedi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['samedi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['samedi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['samedi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        //DIMANCHE
        $this->widgetSchema['dimanche_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['dimanche_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['dimanche_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['dimanche_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['dimanche_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['dimanche_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));

        $this->widgetSchema['dimanche_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->validatorSchema['dimanche_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list,'required' => false));
* 
 * 
 */
        
        $this->widgetSchema['lundi_prise_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty'  => true));
        $this->widgetSchema['lundi_prise_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['lundi_prise_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['lundi_prise_service_max']->setAttribute('style', 'width:45px');
        $this->widgetSchema['lundi_fin_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['lundi_fin_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['lundi_fin_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['lundi_fin_service_max']->setAttribute('style', 'width:45px');
        
        $this->widgetSchema['mardi_prise_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty'  => true));
        $this->widgetSchema['mardi_prise_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['mardi_prise_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['mardi_prise_service_max']->setAttribute('style', 'width:45px');
        $this->widgetSchema['mardi_fin_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['mardi_fin_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['mardi_fin_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['mardi_fin_service_max']->setAttribute('style', 'width:45px');
        
        $this->widgetSchema['mercredi_prise_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty'  => true));
        $this->widgetSchema['mercredi_prise_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['mercredi_prise_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['mercredi_prise_service_max']->setAttribute('style', 'width:45px');
        $this->widgetSchema['mercredi_fin_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['mercredi_fin_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['mercredi_fin_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['mercredi_fin_service_max']->setAttribute('style', 'width:45px');
        
        $this->widgetSchema['jeudi_prise_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty'  => true));
        $this->widgetSchema['jeudi_prise_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['jeudi_prise_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['jeudi_prise_service_max']->setAttribute('style', 'width:45px');
        $this->widgetSchema['jeudi_fin_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['jeudi_fin_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['jeudi_fin_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['jeudi_fin_service_max']->setAttribute('style', 'width:45px');
        
        $this->widgetSchema['vendredi_prise_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty'  => true));
        $this->widgetSchema['vendredi_prise_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['vendredi_prise_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['vendredi_prise_service_max']->setAttribute('style', 'width:45px');
        $this->widgetSchema['vendredi_fin_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['vendredi_fin_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['vendredi_fin_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['vendredi_fin_service_max']->setAttribute('style', 'width:45px');
        
        $this->widgetSchema['samedi_prise_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty'  => true));
        $this->widgetSchema['samedi_prise_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['samedi_prise_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['samedi_prise_service_max']->setAttribute('style', 'width:45px');
        $this->widgetSchema['samedi_fin_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['samedi_fin_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['samedi_fin_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['samedi_fin_service_max']->setAttribute('style', 'width:45px');
        
        $this->widgetSchema['dimanche_prise_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty'  => true));
        $this->widgetSchema['dimanche_prise_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['dimanche_prise_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['dimanche_prise_service_max']->setAttribute('style', 'width:45px');
        $this->widgetSchema['dimanche_fin_service_min'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['dimanche_fin_service_min']->setAttribute('style', 'width:45px');
        $this->widgetSchema['dimanche_fin_service_max'] = new sfWidgetFormTime(array('minutes' => $minute_time, 'can_be_empty' => true));
        $this->widgetSchema['dimanche_fin_service_max']->setAttribute('style', 'width:45px');
        
 
        /*
        $this->widgetSchema['lundi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->widgetSchema['lundi_prise_service_min']->setDefault('07:30');
        $this->validatorSchema['lundi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));
        
        $this->widgetSchema['lundi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    'default' => '08:30',
                ));
        $this->validatorSchema['lundi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));
        
        $this->widgetSchema['lundi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    'default' => '17:30',
                ));
        $this->widgetSchema['lundi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    'default' => '18:30',
                ));
         * 
         */
        
        //test
        //$this->widgetSchema['testSi'] = new sfWidgetFormInputText();
        //$this->validatorSchema['testSi'] = new sfValidatorString(array('max_length' => 200, 'required' => false));

        //alternance de vehicule
        $this->widgetSchema['alternance_vehicule'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => true));
       
  }
  
  
  
  public function doUpdateObject($values = null) {
        
        $tabRetour = array();
        
        //LUNDI
        $tabRetour = $this->adaptHoraireMinMax($values["lundi_prise_service_min"],$values["lundi_prise_service_max"]);
        $values["lundi_prise_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["lundi_prise_service_max"] = $tabRetour['valeurHoraireMax'];
        
        $tabRetour = $this->adaptHoraireMinMax($values["lundi_fin_service_min"],$values["lundi_fin_service_max"]);
        $values["lundi_fin_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["lundi_fin_service_max"] = $tabRetour['valeurHoraireMax'];
        
        //MARDI
        $tabRetour = $this->adaptHoraireMinMax($values["mardi_prise_service_min"],$values["mardi_prise_service_max"]);
        $values["mardi_prise_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["mardi_prise_service_max"] = $tabRetour['valeurHoraireMax'];
        
        $tabRetour = $this->adaptHoraireMinMax($values["mardi_fin_service_min"],$values["mardi_fin_service_max"]);
        $values["mardi_fin_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["mardi_fin_service_max"] = $tabRetour['valeurHoraireMax'];
        
        //MERCREDI
        $tabRetour = $this->adaptHoraireMinMax($values["mercredi_prise_service_min"],$values["mercredi_prise_service_max"]);
        $values["mercredi_prise_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["mercredi_prise_service_max"] = $tabRetour['valeurHoraireMax'];
        
        $tabRetour = $this->adaptHoraireMinMax($values["mercredi_fin_service_min"],$values["mercredi_fin_service_max"]);
        $values["mercredi_fin_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["mercredi_fin_service_max"] = $tabRetour['valeurHoraireMax'];
        
        //JEUDI
        $tabRetour = $this->adaptHoraireMinMax($values["jeudi_prise_service_min"],$values["jeudi_prise_service_max"]);
        $values["jeudi_prise_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["jeudi_prise_service_max"] = $tabRetour['valeurHoraireMax'];
        
        $tabRetour = $this->adaptHoraireMinMax($values["jeudi_fin_service_min"],$values["jeudi_fin_service_max"]);
        $values["jeudi_fin_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["jeudi_fin_service_max"] = $tabRetour['valeurHoraireMax'];
        
        //VENDREDI
        $tabRetour = $this->adaptHoraireMinMax($values["vendredi_prise_service_min"],$values["vendredi_prise_service_max"]);
        $values["vendredi_prise_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["vendredi_prise_service_max"] = $tabRetour['valeurHoraireMax'];
        
        $tabRetour = $this->adaptHoraireMinMax($values["vendredi_fin_service_min"],$values["vendredi_fin_service_max"]);
        $values["vendredi_fin_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["vendredi_fin_service_max"] = $tabRetour['valeurHoraireMax'];
        
        //SAMEDI
        $tabRetour = $this->adaptHoraireMinMax($values["samedi_prise_service_min"],$values["samedi_prise_service_max"]);
        $values["samedi_prise_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["samedi_prise_service_max"] = $tabRetour['valeurHoraireMax'];
        
        $tabRetour = $this->adaptHoraireMinMax($values["samedi_fin_service_min"],$values["samedi_fin_service_max"]);
        $values["samedi_fin_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["samedi_fin_service_max"] = $tabRetour['valeurHoraireMax'];
        
        //DIMANCHE
        $tabRetour = $this->adaptHoraireMinMax($values["dimanche_prise_service_min"],$values["dimanche_prise_service_max"]);
        $values["dimanche_prise_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["dimanche_prise_service_max"] = $tabRetour['valeurHoraireMax'];
        
        $tabRetour = $this->adaptHoraireMinMax($values["dimanche_fin_service_min"],$values["dimanche_fin_service_max"]);
        $values["dimanche_fin_service_min"] = $tabRetour['valeurHoraireMin'];
        $values["dimanche_fin_service_max"] = $tabRetour['valeurHoraireMax'];
        
          
           parent::doUpdateObject($values);

    }
   
   /*
    * methode de mise à jour des horaire min et max si l'un des deux n'est pas 
    * renseigné en prenant la valeur de l'autre
    * 
    */ 
   //protected function adaptHoraireMinMax($horaireMin = null, $horaireMax = null, $indMinMax = null){
    protected function adaptHoraireMinMax($horaireMin = null, $horaireMax = null){
       $valeurHoraireMin = $horaireMin;
       $valeurHoraireMax = $horaireMax;
       
       
       
       if ($horaireMin == '' || is_null($horaireMin) || $horaireMax == '' || is_null($horaireMax)){
           
            if (($horaireMin == '' || is_null($horaireMin)) && ($horaireMax == '' || is_null($horaireMax))){
                $valeurHoraireMax = $horaireMax;
                $valeurHoraireMin = $horaireMin;
                // $valeurHoraireMin = "19:27";
                
            }  elseif ($horaireMin != '' && !is_null($horaireMin)) {

                $valeurHoraireMax = $horaireMin;
                
            } elseif ($horaireMax != '' && !is_null($horaireMax) ) {

                $valeurHoraireMin = $horaireMax;
            } 
          }else{
              $valeurHoraireMax = $horaireMax;
              $valeurHoraireMin = $horaireMin;
              //$valeurHoraireMin = "21:27";
          }
          
          $tabRetour = array('valeurHoraireMin' => $valeurHoraireMin,'valeurHoraireMax' => $valeurHoraireMax);
       

       return $tabRetour ;
   }

}
