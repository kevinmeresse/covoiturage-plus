<?php

/**
 * CpTrajet form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpTrajetNewForm extends BaseCpTrajetForm
{
  public function configure()
  {
       
      unset(
                 
                $this['cp_trajet_id']
        );
       
        
      //$this->widgetSchema['cp_trajet_id'] = new sfWidgetFormInputHidden();
      
      /*  
      if($this->getObject()->isNew()) {
            //? NULL : $this->getObject()->getCpTrajetId()
        }
       * 
       */

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
        $horaire_list = array_combine($horaire, $horaire);
        
        $minute_time = array(00 => '00', 15 => '15', 30 => '30', 45 => '45');
        
        //indicateur indiquant l'existence d'un objet cp_trajet
        $indCpTrajet = 0;
        
        //récupération des informations par défaut du cp_trajet
        if($this->getOption('cp_trajet_id') != null) {
            $cpTrajet = Doctrine_Core::getTable('CpTrajet')->find($this->getOption('cp_trajet_id'));
            $indCpTrajet = 1;
        }
        
        
        //définition des valeurs par défaut des horaires de prise et de fin de service min et max
        $defautPsMin = '07:00';
        $defautPsMax = '08:00';
        $defautFsMin = '17:00';
        $defautFsMax = '18:00';
        
        /*************************************/  
        //LUNDI
        $this->widgetSchema['lundi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        /*
        if($indCpTrajet == 1){
            $this->setDefault('lundi_prise_service_min', $cpTrajet->getHorairesPriseMinMaxForm('lundi','min'));
        }else{
            $this->setDefault('lundi_prise_service_min', '05:00');
        }*/
        $this->setDefault('lundi_prise_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesPriseMinMaxForm('lundi','min') : $defautPsMin);        
        $this->validatorSchema['lundi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['lundi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('lundi_prise_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesPriseMinMaxForm('lundi','max') : $defautPsMax);        
        $this->validatorSchema['lundi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['lundi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('lundi_fin_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('lundi','min') : $defautFsMin);        
        $this->validatorSchema['lundi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['lundi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('lundi_fin_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('lundi','max') : $defautFsMax);   
        $this->validatorSchema['lundi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));
        

        /*************************************/          
        //MARDI
        $this->widgetSchema['mardi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('mardi_prise_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('mardi','min') : $defautFsMin);   
        $this->validatorSchema['mardi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['mardi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('mardi_prise_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesPriseMinMaxForm('mardi','max') : $defautPsMax);
        $this->validatorSchema['mardi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['mardi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('mardi_fin_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('mardi','min') : $defautFsMin);
        $this->validatorSchema['mardi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['mardi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('mardi_fin_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('mardi','max') : $defautFsMax);
        $this->validatorSchema['mardi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));
        

        /*************************************/          
        //MERCREDI
        $this->widgetSchema['mercredi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('mercredi_prise_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('mercredi','min') : $defautFsMin); 
        $this->validatorSchema['mercredi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['mercredi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        
        $this->setDefault('mercredi_prise_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesPriseMinMaxForm('mercredi','max') : $defautPsMax);
        $this->validatorSchema['mercredi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['mercredi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('mercredi_fin_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('mercredi','min') : $defautFsMin);
        $this->validatorSchema['mercredi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['mercredi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('mercredi_fin_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('mercredi','max') : $defautFsMax);
        $this->validatorSchema['mercredi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));
        
        
        /*************************************/  
        //JEUDI
        $this->widgetSchema['jeudi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('jeudi_prise_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('jeudi','min') : $defautFsMin);   
        $this->validatorSchema['jeudi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['jeudi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('jeudi_prise_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesPriseMinMaxForm('jeudi','max') : $defautPsMax);
        $this->validatorSchema['jeudi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['jeudi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('jeudi_fin_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('jeudi','min') : $defautFsMin);
        $this->validatorSchema['jeudi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['jeudi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('jeudi_fin_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('jeudi','max') : $defautFsMax);
        $this->validatorSchema['jeudi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));
        
        
        /*************************************/  
        //VENDREDI
        $this->widgetSchema['vendredi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('vendredi_prise_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('vendredi','min') : $defautFsMin);
        $this->validatorSchema['vendredi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['vendredi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('vendredi_prise_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesPriseMinMaxForm('vendredi','max') : $defautPsMax);
        $this->validatorSchema['vendredi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['vendredi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('vendredi_fin_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('vendredi','min') : $defautFsMin);
        $this->validatorSchema['vendredi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['vendredi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('vendredi_fin_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('vendredi','max') : $defautFsMax);
        $this->validatorSchema['vendredi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));
        
        
        /*************************************/  
        //SAMEDI
        $this->widgetSchema['samedi_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('samedi_prise_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('samedi','min') : $defautFsMin); 
        $this->validatorSchema['samedi_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['samedi_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('samedi_prise_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesPriseMinMaxForm('samedi','max') : $defautPsMax);
        $this->validatorSchema['samedi_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['samedi_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('samedi_fin_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('samedi','min') : $defautFsMin);
        $this->validatorSchema['samedi_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['samedi_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('samedi_fin_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('samedi','max') : $defautFsMax);
        $this->validatorSchema['samedi_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));
        
        
        /*************************************/  
        //DIMANCHE
        $this->widgetSchema['dimanche_prise_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('dimanche_prise_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('dimanche','min') : $defautFsMin); 
        $this->validatorSchema['dimanche_prise_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['dimanche_prise_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('dimanche_prise_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesPriseMinMaxForm('dimanche','max') : $defautPsMax);
        $this->validatorSchema['dimanche_prise_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['dimanche_fin_service_min'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('dimanche_fin_service_min', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('dimanche','min') : $defautFsMin);
        $this->validatorSchema['dimanche_fin_service_min'] = new sfValidatorChoice(array('choices' => $horaire_list));

        $this->widgetSchema['dimanche_fin_service_max'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $horaire_list,
                    //'default' => '07:30',
                ));
        $this->setDefault('dimanche_fin_service_max', $indCpTrajet == 1 ? $cpTrajet->getHorairesFinMinMaxForm('dimanche','max') : $defautFsMax);
        $this->validatorSchema['dimanche_fin_service_max'] = new sfValidatorChoice(array('choices' => $horaire_list));

        


        //alternance de vehicule
        $this->widgetSchema['alternance_vehicule'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => true));
        
        //gestion des valeurs par défaut pour PSA
        if ($indCpTrajet == 1){
            $this->setDefault('cp_etablissement_horaire_id', $cpTrajet->getCpEtablissementHoraireId());
            $this->setDefault('cp_etablissement_secteur_id', $cpTrajet->getCpEtablissementSecteurId());
        }
        
        
        
       
  }
  
  
  /*
     * surcharge de la méthode save pour enregistrer les horaires min et max au bon format
     */
/*
    public function save($con = null) {
        //gestion des erreur
        $erreur = 0;

        //appel de l'objet cpTrajet pour mise en forme des horaires aux bons formats
        //$cp_trajet= Doctrine_Core::getTable('CpTrajet')->find(array($this->getValue('cp_trajet_id')));
        
        //appel de la librairie outil pour utilisation methode de transformation
        $outil = new Util();
        
        //$cp_trajet->setLundiPriseServiceMin($outil->transformeEnTime($this->getValue('lundi_prise_service_min')));

        $this->setDefault('lundi_prise_service_min', $outil->transformeEnTime($this->getValue('lundi_prise_service_min')));

        $this->setDefault('id_trajet', 0);

        return parent::save($con);
    }
    
    */
    
    public function updateObject($values = null)
      {
        $object = parent::updateObject($values);
        
        //appel de la librairie outil pour utilisation methode de transformation
        $outil = new Util();

        //$object->setFile(str_replace(sfConfig::get('sf_upload_dir').'/', '', $object->getFile()));
        /*
        $object->setLundiPriseServiceMin($outil->transformeEnTime($object->getLundiPriseServiceMin()));
        $object->setLundiPriseServiceMin($outil->transformeEnTime($this->getValue('image')));
        $object->setLundiPriseServiceMax($outil->transformeEnTime($object->getLundiPriseServiceMax()));
        $object->setLundiFinServiceMin($outil->transformeEnTime($object->getLundiFinServiceMin()));
        $object->setLundiFinServiceMax($outil->transformeEnTime($object->getLundiFinServiceMax()));
        
        $object->setMardiPriseServiceMin($outil->transformeEnTime($object->getMardiPriseServiceMin()));
        $object->setMardiPriseServiceMax($outil->transformeEnTime($object->getMardiPriseServiceMax()));
        $object->setMardiFinServiceMin($outil->transformeEnTime($object->getMardiFinServiceMin()));
        $object->setMardiFinServiceMax($outil->transformeEnTime($object->getMardiFinServiceMax()));
        
        $object->setMercrediPriseServiceMin($outil->transformeEnTime($object->getMercrediPriseServiceMin()));
        $object->setMercrediPriseServiceMax($outil->transformeEnTime($object->getMercrediPriseServiceMax()));
        $object->setMercrediFinServiceMin($outil->transformeEnTime($object->getMercrediFinServiceMin()));
        $object->setMercrediFinServiceMax($outil->transformeEnTime($object->getMercrediFinServiceMax()));
        
        $object->setJeudiPriseServiceMin($outil->transformeEnTime($object->getJeudiPriseServiceMin()));
        $object->setJeudiPriseServiceMax($outil->transformeEnTime($object->getJeudiPriseServiceMax()));
        $object->setJeudiFinServiceMin($outil->transformeEnTime($object->getJeudiFinServiceMin()));
        $object->setJeudiFinServiceMax($outil->transformeEnTime($object->getJeudiFinServiceMax()));
        
        $object->setVendrediPriseServiceMin($outil->transformeEnTime($object->getVendrediPriseServiceMin()));
        $object->setVendrediPriseServiceMax($outil->transformeEnTime($object->getVendrediPriseServiceMax()));
        $object->setVendrediFinServiceMin($outil->transformeEnTime($object->getVendrediFinServiceMin()));
        $object->setVendrediFinServiceMax($outil->transformeEnTime($object->getVendrediFinServiceMax()));
        
        $object->setSamediPriseServiceMin($outil->transformeEnTime($object->getSamediPriseServiceMin()));
        $object->setSamediPriseServiceMax($outil->transformeEnTime($object->getSamediPriseServiceMax()));
        $object->setSamediFinServiceMin($outil->transformeEnTime($object->getSamediFinServiceMin()));
        $object->setSamediFinServiceMax($outil->transformeEnTime($object->getSamediFinServiceMax()));
        
        $object->setDimanchePriseServiceMin($outil->transformeEnTime($object->getDimanchePriseServiceMin()));
        $object->setDimanchePriseServiceMax($outil->transformeEnTime($object->getDimanchePriseServiceMax()));
        $object->setDimancheFinServiceMin($outil->transformeEnTime($object->getDimancheFinServiceMin()));
        $object->setDimancheFinServiceMax($outil->transformeEnTime($object->getDimancheFinServiceMax()));
        
        */
        
        $object->setLundiPriseServiceMin($outil->transformeEnTime($this->getValue('lundi_prise_service_min')));
        $object->setLundiPriseServiceMax($outil->transformeEnTime($this->getValue('lundi_prise_service_max')));
        $object->setLundiFinServiceMin($outil->transformeEnTime($this->getValue('lundi_fin_service_min')));
        $object->setLundiFinServiceMax($outil->transformeEnTime($this->getValue('lundi_fin_service_max')));
        
        $object->setMardiPriseServiceMin($outil->transformeEnTime($this->getValue('mardi_prise_service_min')));
        $object->setMardiPriseServiceMax($outil->transformeEnTime($this->getValue('mardi_prise_service_max')));
        $object->setMardiFinServiceMin($outil->transformeEnTime($this->getValue('mardi_fin_service_min')));
        $object->setMardiFinServiceMax($outil->transformeEnTime($this->getValue('mardi_fin_service_max')));
        
        $object->setMercrediPriseServiceMin($outil->transformeEnTime($this->getValue('mercredi_prise_service_min')));
        $object->setMercrediPriseServiceMax($outil->transformeEnTime($this->getValue('mercredi_prise_service_max')));
        $object->setMercrediFinServiceMin($outil->transformeEnTime($this->getValue('mercredi_fin_service_min')));
        $object->setMercrediFinServiceMax($outil->transformeEnTime($this->getValue('mercredi_fin_service_max')));
        
        $object->setJeudiPriseServiceMin($outil->transformeEnTime($this->getValue('jeudi_prise_service_min')));
        $object->setJeudiPriseServiceMax($outil->transformeEnTime($this->getValue('jeudi_prise_service_max')));
        $object->setJeudiFinServiceMin($outil->transformeEnTime($this->getValue('jeudi_fin_service_min')));
        $object->setJeudiFinServiceMax($outil->transformeEnTime($this->getValue('jeudi_fin_service_max')));
        
        $object->setVendrediPriseServiceMin($outil->transformeEnTime($this->getValue('vendredi_prise_service_min')));
        $object->setVendrediPriseServiceMax($outil->transformeEnTime($this->getValue('vendredi_prise_service_max')));
        $object->setVendrediFinServiceMin($outil->transformeEnTime($this->getValue('vendredi_fin_service_min')));
        $object->setVendrediFinServiceMax($outil->transformeEnTime($this->getValue('vendredi_fin_service_max')));
        
        $object->setSamediPriseServiceMin($outil->transformeEnTime($this->getValue('samedi_prise_service_min')));
        $object->setSamediPriseServiceMax($outil->transformeEnTime($this->getValue('samedi_prise_service_max')));
        $object->setSamediFinServiceMin($outil->transformeEnTime($this->getValue('samedi_fin_service_min')));
        $object->setSamediFinServiceMax($outil->transformeEnTime($this->getValue('samedi_fin_service_max')));
        
        $object->setDimanchePriseServiceMin($outil->transformeEnTime($this->getValue('dimanche_prise_service_min')));
        $object->setDimanchePriseServiceMax($outil->transformeEnTime($this->getValue('dimanche_prise_service_max')));
        $object->setDimancheFinServiceMin($outil->transformeEnTime($this->getValue('dimanche_fin_service_min')));
        $object->setDimancheFinServiceMax($outil->transformeEnTime($this->getValue('dimanche_fin_service_max')));

        return $object;
      }
  

}
