<?php

/**
 * Trajet form.
 *
 * @package    roulezmailn_v3 1
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrajetForm extends BaseTrajetForm {

    public function configure() {
        /*
         * gestion des champs hidden
         */
        // $this->widgetSchema['id_utilisateur'] = new sfWidgetFormInputHidden();
        /*
        $valIdUtil = $this->getObject()->getIdUtilisateur();
        if (!empty($valIdUtil) ){
            $this->widgetSchema['id_utilisateur'] = new sfWidgetFormInputHidden();
        }
         *
         */
      //$this->widgetSchema['id_site'] = new sfWidgetFormInputHidden();
        //$this->widgetSchema['cle'] = new sfWidgetFormInputHidden();
        //$this->widgetSchema['date_creation'] = new sfWidgetFormInputHidden();

        //suppression des champs inutilisés pour le formulaire 
        unset(
                 
                $this['bascule'], 
                $this['cle'],
                $this['etat_avant_bascule'],
                $this['site_confidentiel'], 
                //$this['id_utilisateur'],
                $this['id_partenaire'],
                $this['id_offre_sur_site_partenaire'],                
                $this['id_site'],
                $this['id_site_site'],
                $this['id_nature_trajet'],
                $this['id_frequence'],
                $this['id_depart'], 
                $this['id_depart2'], 
                $this['id_depart_pays'],
                $this['depart_adresse_numero'],
                $this['id_destination'], 
                $this['id_destination2'], 
                $this['id_destination_pays'],
                $this['destination_adresse_numero'],
                $this['zone_entreprise_autre'],   
                $this['id_zone_entreprise'], 
                $this['tolerance'],
                $this['date_modification'],
                $this['date_creation'],
                $this['km'],
                $this['vehicule'],
                $this['id_type_vehicule']
        );
        
        //récupération des informations par défaut de l'utilisateur
        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find($this->getObject()->getIdUtilisateur());
        
        $this->widgetSchema['id_utilisateur'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['id_utilisateur']->setDefault($this->getObject()->getIdUtilisateur());


        //modification des widget du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non visible', 1 => 'visible'),
                ));
        $this->setDefault('etat', 1);

        $this->widgetSchema['actif'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'supprimé', 1 => 'valide'),
                ));


        //gestion du champ id_type_trajet en fonction du type trajet choisi
        $this->widgetSchema['id_type_trajet'] = new sfWidgetFormDoctrineChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'model' => $this->getRelatedModelName('TrajetTypeCovoiturage'),
                    'query' => Doctrine::getTable('TrajetTypeCovoiturage')->getTypeTrajetSite(),
                    //'add_empty' => true,
                ));
        
        //gestion du positionnement par défaut du type trajet sur PSA si covoitureur de type PSA
        if(isset($covoitureur) && $covoitureur->getCpEtablissement()->getCpEtablissementEtablissementPereId() == sfConfig::get('sf_id_etablissement_psa_RS')){
            $this->setDefault('id_type_trajet', 3);
        }else{
            $this->setDefault('id_type_trajet', 1);
        }
        

        $this->widgetSchema['jour_unique_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                    'default' => 0,
                ));
        //$this->setDefault('jour_unique_type_cov', 0);

        $this->widgetSchema['jour_unique_type_cov_retour'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));

        $this->widgetSchema['jour_unique_retour'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'aller simple', 1 => 'aller/retour'),
                ));

        $this->widgetSchema['lundi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        /*
        $this->widgetSchema['lundi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
         * 
         */

        $this->widgetSchema['lundi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));


        $this->widgetSchema['mardi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        /*
        $this->widgetSchema['mardi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
         *
         */
        $this->widgetSchema['mardi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));


        $this->widgetSchema['mercredi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        /*
        $this->widgetSchema['mercredi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
         * 
         */
        $this->widgetSchema['mercredi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));


        $this->widgetSchema['jeudi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        /*
        $this->widgetSchema['jeudi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
         *
         */
        $this->widgetSchema['jeudi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));


        $this->widgetSchema['vendredi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        /*
        $this->widgetSchema['vendredi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
         *
         */
        $this->widgetSchema['vendredi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));


        $this->widgetSchema['samedi_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        /*
        $this->widgetSchema['samedi_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
         *
         */
        $this->widgetSchema['samedi_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));


        $this->widgetSchema['dimanche_type_cov'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'indifférent', 1 => 'conducteur', 2 => 'passager'),
                ));
        /*
        $this->widgetSchema['dimanche_etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
         *
         */
        $this->widgetSchema['dimanche_etat'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));

        
        //mise en hidden des champs horaire depart et arrivee pour retro-compatibilité
        $this->widgetSchema['lundi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['lundi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['mardi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['mardi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['mercredi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['mercredi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['jeudi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['jeudi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['vendredi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['vendredi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['samedi_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['samedi_heure_retour'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['dimanche_heure_depart'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['dimanche_heure_retour'] = new sfWidgetFormInputHidden();

        /*
        $this->widgetSchema['mobilite_r'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
         
        $this->widgetSchema['trajet_etudiant'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['visible_uniquement_partenaire'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));

        $this->widgetSchema['id_type_vehicule'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'perso', 1 => 'pro'),
                ));
         
         $this->widgetSchema['covoiturage_solidaire'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non', 1 => 'oui'),
                ));
         * 
         */
        $this->widgetSchema['volume_bagage'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non renseigné', 1 => 'petit', 2 => 'moyen', 3 => 'gros'),
                ));
        
        /*
        $this->widgetSchema['cout'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => true,
                    'choices' => array('oui' => 'oui'),
                ));
        $this->widgetSchema['autoroute'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => true,
                    'choices' => array('oui' => 'oui'),
                ));
         * 
         */
        if($this->getObject()->getCout() == 1){
            $this->widgetSchema['cout'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false),array('checked'=>true));
        }else{
            $this->widgetSchema['cout'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
        }
        
        if($this->getObject()->getAutoroute() == 1){
            $this->widgetSchema['autoroute'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false),array('checked'=>true));
        }else{
            $this->widgetSchema['autoroute'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
        }
        

        
        if($this->getObject()->isNew()){
            if($covoitureur->getPossedeVehicule() == 1){                
                $this->widgetSchema['presence_vehicule'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false),array('checked'=>true));
            }else{
                $this->widgetSchema['presence_vehicule'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
            }
            //$this->widgetSchema['presence_vehicule'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false),array('checked'=>true));
            //$this->widgetSchema['presence_vehicule'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
        }else{
            $this->widgetSchema['presence_vehicule'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => '1', 'default' => false));
        }

/*
        $this->widgetSchema['id_evenement'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    //'query' => $this->getRelatedModelName('Lieu')->getTable()->getLieuSite(),
                    'query' => Doctrine::getTable('Lieu')->getLieuSite(),
                    'add_empty' => true,
                ));
*/
        
        /*
        $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    'query' => Doctrine::getTable('Lieu')->getLieuAireSite(),
                    'add_empty' => true,
                ));


        $this->widgetSchema['destination_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    'query' => Doctrine::getTable('Lieu')->getLieuZISite(),
                    'add_empty' => true,
                ));
         * 
         */

        
        //gestion du champ id_site_site en fonction
        $this->widgetSchema['id_site_site'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('SiteClient'),
                    'query' => Doctrine::getTable('SiteClient')->getSiteSite(),
                    'add_empty' => true,

                ));

        /*****************************************************************/
        /*       gestion des lieux                                       */
        /*****************************************************************/
        //Pour covoiturage plus
        //récupération des lieux en fonction de la ville de depart et de destination
        //initialement la ville de départ correspond à la domiciliation du covoitureur
        //la ville de destination, à la ville de l'établissement
        //dernier vehicule de l'utilisateur ou du trajet deja enregistre
        $tabVide = array();
        
        if($this->getObject()->isNew()){ 
            //cas d'un nouveau trajet => dans ce cas on utilise la ville de domiciliation et l'entreprise
            if(!is_null($this->getObject()->getIdUtilisateur())){
                $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                        'model' => $this->getRelatedModelName('Lieu'),
                        'query' => Doctrine::getTable('Lieu')->getLieuSiteVille($this->getObject()->getCovoitureur()->getVille(),$this->getObject()->getCovoitureur()->getCodePostal()),
                        'add_empty' => true,
                    ));
                if($covoitureur->getCpEtablissementId() != 0 && !is_null($covoitureur->getCpEtablissement()->getCpEtablissementVilleId()) )    {
                    $this->widgetSchema['destination_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                        'model' => $this->getRelatedModelName('Lieu'),
                        //'query' => Doctrine::getTable('Lieu')->getLieuSiteVilleById($this->getObject()->getCovoitureur()->getCpEtablissement()->getCpEtablissementVilleId()),
                        'query' => Doctrine::getTable('Lieu')->getLieuZISiteById($covoitureur->getCpEtablissement()->getCpEtablissementVilleId()),
                        'add_empty' => true,
                    ));
                    //traitement de la zone par défaut si existe
                    if( !is_null($covoitureur->getCpEtablissement()->getCpEtablissementZoneId())){
                        $this->widgetSchema['destination_autre_lieu']->setDefault($covoitureur->getCpEtablissement()->getCpEtablissementZoneId());
                    }
                    
                }else{
                    $this->widgetSchema['destination_autre_lieu'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
                }

            }else{
                //retourne des listes vides
                $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));

                $this->widgetSchema['destination_autre_lieu'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));

            }
            
            //lieux pour villes étapes
            $this->widgetSchema['etape1_lieu_id'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
                $this->widgetSchema['etape2_lieu_id'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
                $this->widgetSchema['etape3_lieu_id'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
                $this->widgetSchema['etape4_lieu_id'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
                $this->widgetSchema['etape5_lieu_id'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
            
        }else{
            // cas d'un trajet existant, dans ce cas, on utilise la ville existante
            if($this->getObject()->getDepartInsee() != '' && !is_null($this->getObject()->getDepartInsee())){
                $outil = new Util();
                
                $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                        'model' => $this->getRelatedModelName('Lieu'),
                        'query' => Doctrine::getTable('Lieu')->getLieuSiteVilleById( $outil->extractIdVille($this->getObject()->getDepartInsee())) ,
                        'add_empty' => true,
                    ));
                
            }else{
                //retourne des listes vides
                $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
            }
            
            if($this->getObject()->getDestinationInsee() != '' && !is_null($this->getObject()->getDestinationInsee())){
                $outil = new Util();
                
                $this->widgetSchema['destination_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                        'model' => $this->getRelatedModelName('Lieu'),
                        'query' => Doctrine::getTable('Lieu')->getLieuZISiteById( $outil->extractIdVille($this->getObject()->getDestinationInsee())) ,
                        'add_empty' => true,
                    ),array('size' => 15));
                
            }else{
                //retourne des listes vides
                $this->widgetSchema['destination_autre_lieu'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
            }
            
            //villes étapes
            if($this->getObject()->getEtape1Ville() != '' && !is_null($this->getObject()->getEtape1Ville())){
                $outil = new Util();
                
                $this->widgetSchema['etape1_lieu_id'] = new sfWidgetFormDoctrineChoice(array(
                        'model' => $this->getRelatedModelName('Lieu'),
                        'query' => Doctrine::getTable('Lieu')->getLieuSiteVilleById( $outil->extractIdVille($this->getObject()->getEtape1Insee())) ,
                        'add_empty' => true,
                    ));
                
            }else{
                //retourne des listes vides
                $this->widgetSchema['etape1_lieu_id'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
            }
            
            if($this->getObject()->getEtape2Ville() != '' && !is_null($this->getObject()->getEtape2Ville())){
                $outil = new Util();
                
                $this->widgetSchema['etape2_lieu_id'] = new sfWidgetFormDoctrineChoice(array(
                        'model' => $this->getRelatedModelName('Lieu'),
                        'query' => Doctrine::getTable('Lieu')->getLieuSiteVilleById( $outil->extractIdVille($this->getObject()->getEtape2Insee())) ,
                        'add_empty' => true,
                    ));
                
            }else{
                //retourne des listes vides
                $this->widgetSchema['etape2_lieu_id'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
            }    
            
            if($this->getObject()->getEtape3Ville() != '' && !is_null($this->getObject()->getEtape3Ville())){
                $outil = new Util();
                
                $this->widgetSchema['etape3_lieu_id'] = new sfWidgetFormDoctrineChoice(array(
                        'model' => $this->getRelatedModelName('Lieu'),
                        'query' => Doctrine::getTable('Lieu')->getLieuSiteVilleById( $outil->extractIdVille($this->getObject()->getEtape3Insee())) ,
                        'add_empty' => true,
                    ));
                
            }else{
                //retourne des listes vides
                $this->widgetSchema['etape3_lieu_id'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
            }
            
            if($this->getObject()->getEtape4Ville() != '' && !is_null($this->getObject()->getEtape4Ville())){
                $outil = new Util();
                
                $this->widgetSchema['etape4_lieu_id'] = new sfWidgetFormDoctrineChoice(array(
                        'model' => $this->getRelatedModelName('Lieu'),
                        'query' => Doctrine::getTable('Lieu')->getLieuSiteVilleById( $outil->extractIdVille($this->getObject()->getEtape4Insee())) ,
                        'add_empty' => true,
                    ));
                
            }else{
                //retourne des listes vides
                $this->widgetSchema['etape4_lieu_id'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
            }
            
            if($this->getObject()->getEtape5Ville() != '' && !is_null($this->getObject()->getEtape5Ville())){
                $outil = new Util();
                
                $this->widgetSchema['etape5_lieu_id'] = new sfWidgetFormDoctrineChoice(array(
                        'model' => $this->getRelatedModelName('Lieu'),
                        'query' => Doctrine::getTable('Lieu')->getLieuSiteVilleById( $outil->extractIdVille($this->getObject()->getEtape5Insee())) ,
                        'add_empty' => true,
                    ));
                
            }else{
                //retourne des listes vides
                $this->widgetSchema['etape5_lieu_id'] = new sfWidgetFormChoice(array(
                        'expanded' => false,
                        'multiple' => false,
                        'choices' => $tabVide,
                    ));
            }
        }
            
        
        
        

        //$this->widgetSchema['destination_autre_lieu']->setDefault('12152');

        /*/
        if ($this->getObject()->getCovoitureur()->getVille() != null && $this->getObject()->getCovoitureur()->getVille() != '') {
            // recuperation de l'id_ville pour genere code_insee pour lieu
            $lieux = Doctrine_Core::getTable('CovoitureurVehicule')->getLieuSiteVille;

            
            $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    //'query' => Doctrine::getTable('Lieu')->getLieuSiteVille(),
                    'add_empty' => true,
                ));

            
        } else {//recuperation du choix de vehicule du profil utilisateur

            $this->widgetSchema['depart_autre_lieu'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Lieu'),
                    'query' => Doctrine::getTable('Lieu')->getLieuSiteVille(),
                    'add_empty' => true,
                ));

        }
*/

        //récupération des véhicule liés à l'utilisateur
        $liste_vehicule = array();
        //$liste_vehicules_temp = Doctrine_Core::getTable('CovoitureurVehicule')->find($this->getObject()->getIdUtilisateur());
/* MODIF
        $liste_vehicules_temp = Doctrine_Core::getTable('CovoitureurVehicule')
                ->createQuery('a')
                ->where('id_utilisateur = ?', $this->getObject()->getIdUtilisateur())
                ->execute();


        foreach ($liste_vehicules_temp as $i => $vehicules_temp) {
            $vehiculeMarqueModele = $vehicules_temp->getVehiculeMarque() . " / " . $vehicules_temp->getVehiculeModele();
            //array_push($liste_vehicule, $vehicules_temp->getIdVehicule() => $vehiculeMarqueModele);
            $liste_vehicule[] = array($vehicules_temp->getIdVehicule() => $vehiculeMarqueModele);
        }

        $this->widgetSchema['vehicule'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $liste_vehicule,
                ));

     */   

        /**************************************************************/
        //récupération des véhicule liés à l'utilisateur
        $liste_vehicule = array();

        //definition des variables permettant d'avoir les informations de base sur le svehicules
        $vehicule_marque_id = 0;
        $vehicule_modele_id = 0;
        $vehicule_id = 0;

        //dernier vehicule de l'utilisateur ou du trajet deja enregistre
        if ($this->getObject()->getVehicule() != null && $this->getObject()->getVehicule() != 0) { // recuperation du vehicule du trajet
            //$vehicule = Doctrine_Core::getTable('CovoitureurVehicule')->find($this->getObject()->getVehicule());
            if ($vehicule = Doctrine_Core::getTable('CovoitureurVehicule')->find($this->getObject()->getVehicule())) {
                $vehicule_marque_id = $vehicule->getIdMarque();
                $vehicule_modele_id = $vehicule->getIdModele();
                $vehicule_id = $vehicule->getIdVehicule();
            }
        } else {//recuperation du choix de vehicule du profil utilisateur
            $vehicule = Doctrine_Core::getTable('CovoitureurVehicule')
                    ->createQuery('a')
                    ->where('id_utilisateur = ?', $this->getObject()->getIdUtilisateur())
                    ->orderBy('date_creation DESC')
                    ->fetchOne()
            ;
            if ($vehicule) {
                $vehicule_marque_id = $vehicule->getIdMarque();
                $vehicule_modele_id = $vehicule->getIdModele();
                $vehicule_id = $vehicule->getIdVehicule();
            }
        }


        //génératiuon des combos

        $this->widgetSchema['vehicule_marque'] = new sfWidgetFormDoctrineChoice(array(
                    //'model' => $this->getRelatedModelName('VehiculeMarque'),
                    'model' => 'VehiculeMarque',
                    // 'query' => Doctrine::getTable('Covoitureur')->getCovoitureurSite(),
                    'add_empty' => true,
                ));
        $this->validatorSchema['vehicule_marque'] = new sfValidatorDoctrineChoice(array('model' => 'VehiculeMarque', 'required' => false));

        
        if ($vehicule_marque_id != 0) {
            $query = Doctrine::getTable('VehiculeModele')->getVehiculeModeleListByMarqueQuery($vehicule_marque_id);

            $this->widgetSchema['vehicule_modele'] = new sfWidgetFormDoctrineChoice(array(
                        //'model' => $this->getRelatedModelName('VehiculeMarque'),
                        'model' => 'VehiculeModele',
                        'query' => $query,
                        'add_empty' => true,
                    ));
        } else {
            $this->widgetSchema['vehicule_modele'] = new sfWidgetFormDoctrineChoice(array(
                        //'model' => $this->getRelatedModelName('VehiculeMarque'),
                        'model' => 'VehiculeModele',
                        // 'query' => Doctrine::getTable('Covoitureur')->getCovoitureurSite(),
                        'add_empty' => true,
                    ));
        }
        $this->validatorSchema['vehicule_modele'] = new sfValidatorDoctrineChoice(array('model' => 'VehiculeModele', 'required' => false));

        
        

        //pre-positionnement des valeurs par défaut sur le modele et la marque du véhicule
        if ($vehicule_marque_id != null && $vehicule_marque_id != 0) {
            $this->widgetSchema['vehicule_marque']->setDefault($vehicule_marque_id);
        }

        if ($vehicule_modele_id != null && $vehicule_modele_id != 0) {
            $this->widgetSchema['vehicule_modele']->setDefault($vehicule_modele_id);
        }
        
        /**************************************************************/

        //$this->widgetSchema['jour_unique_date'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        //$this->widgetSchema['jour_unique_date_retour'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        //$this->widgetSchema['date_creation'] = new sfWidgetFormI18nDateTime(array('culture' => 'fr'));
        //$this->widgetSchema['date_depublication'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        //$this->widgetSchema['date_modification'] = new sfWidgetFormI18nDateTime(array('culture' => 'fr'));
        //$this->widgetSchema['date_verification'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        
        //gestion du format des dates
        
        $this->widgetSchema['jour_unique_date'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        
        $this->widgetSchema['jour_unique_date_retour'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        /*
         $this->widgetSchema['date_depublication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr')),
                    'config' => array('firstDay' => '1')
                ));*/
        /*
         $this->widgetSchema['date_depublication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
         //$this->setDefault('date_depublication', '2017-12-31');
         $this->validatorSchema['date_depublication'] = new sfValidatorDate(array('required' => false));
         * 
         */
         
         $this->widgetSchema['date_depublication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
         $this->setDefault('date_depublication', '');
         
         //$this->widgetSchema['date_depublication'] = new sfWidgetFormI18nDate(array('culture' => 'fr_FR'));
         
         
         $this->widgetSchema['date_verification'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));


        /*
         * gestion des états "tolérance" => fait appel à une méthode spécifique pour sérialiser le tableau
         */

        
        
        //initialisation des choix possibles
        $choices = array(0 => 'non acceptés', 1 => 'acceptés');
        $choices1 = array(0 => 'non acceptée', 1 => 'acceptée');


        //initialisation des valeurs par defaut si l'objet est initialisé
        if($covoitureur->getTolereAnimaux() != null){
            $val_defaut_0 = $covoitureur->getTolereAnimaux();
        }else{
            $val_defaut_0 = 0;
        }
        if($covoitureur->getTolereFumeur() != null){
            $val_defaut_1 = $covoitureur->getTolereFumeur();
        }else{
            $val_defaut_1 = 0;
        }
        if($covoitureur->getTolereBagage() != null){
            $val_defaut_2 = $covoitureur->getTolereBagage();
        }else{
            $val_defaut_2 = 0;
        }
        if($covoitureur->getTolereMusique() != null){
            $val_defaut_3 = $covoitureur->getTolereMusique();
        }else{
            $val_defaut_3 = 0;
        }
        if($covoitureur->getTolereDiscussion() != null){
            $val_defaut_4 = $covoitureur->getTolereDiscussion();
        }else{
            $val_defaut_4 = 0;
        }




        if ($this->getObject()->get('id_trajet') != '') {
            $val_defaut = $this->getObject()->getCheckboxTolerance();
            //gestion des cas de trajets venant de la migration ou les tolerances sont mises par defaut par la bdd
            //   et non compatible avec le fonctionnement de C+
            $val_defaut_0 = ((($val_defaut[0] == 2) || is_null($val_defaut[0])) ? 0 : $val_defaut[0]);
            $val_defaut_1 = ((($val_defaut[1] == 2) || is_null($val_defaut[1])) ? 0 : $val_defaut[1]);
            $val_defaut_2 = ((($val_defaut[2] == 2) || is_null($val_defaut[2])) ? 0 : $val_defaut[2]);
            //$val_defaut_1 = $val_defaut[1];
            //$val_defaut_2 = $val_defaut[2];
            $val_defaut_3 = $val_defaut[3];
            $val_defaut_4 = $val_defaut[4];
        }

        /* $this->widgetSchema['tolerance_0']= new sfWidgetFormInputText();
          $this->widgetSchema['tolerance_0']->setDefault($this->getObject()->getTolerance());
          initialisation de l'objet virtuel "tolerance_0" correspondant à animaux
          $this->widgetSchema['tolerance_0'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => $choices,
          'default' => $val_defaut_0,
          ));
          $this->widgetSchema['tolerance_0']->setLabel('Animaux'); */


        //initialisation de l'objet virtuel "tolerance_0" correspondan,t à animaux
        $this->widgetSchema['tolerance_0'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => $choices,
                    'default' => $val_defaut_0,
                ));

        $this->widgetSchema['tolerance_0']->setLabel('Animaux');

        //initialisation de l'objet virtuel "tolerance_1" correspondant à fumeurs
        $this->widgetSchema['tolerance_1'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => $choices,
                    'default' => $val_defaut_1,
                ));
        $this->widgetSchema['tolerance_1']->setLabel('Fumeurs');


        //initialisation de l'objet virtuel "tolerance_1" correspondant à bagages
        $this->widgetSchema['tolerance_2'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => $choices,
                    'default' => $val_defaut_2,
                ));
        $this->widgetSchema['tolerance_2']->setLabel('Bagages');
        
        //initialisation de l'objet virtuel "tolerance_3" correspondant à Musique
        $this->widgetSchema['tolerance_3'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => $choices1,
                    'default' => $val_defaut_3,
                ));
        $this->widgetSchema['tolerance_3']->setLabel('Musique');


        //initialisation de l'objet virtuel "tolerance_4" correspondant à Discussion
        $this->widgetSchema['tolerance_4'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => $choices1,
                    'default' => $val_defaut_4,
                ));
        $this->widgetSchema['tolerance_4']->setLabel('Discussion');


        //initialisation des validateurs
        $this->validatorSchema['tolerance_0'] = new sfValidatorChoice(array('choices' => array(0, 1)));
        $this->validatorSchema['tolerance_1'] = new sfValidatorChoice(array('choices' => array(0, 1)));
        $this->validatorSchema['tolerance_2'] = new sfValidatorChoice(array('choices' => array(0, 1)));
        $this->validatorSchema['tolerance_3'] = new sfValidatorChoice(array('choices' => array(0, 1)));
        $this->validatorSchema['tolerance_4'] = new sfValidatorChoice(array('choices' => array(0, 1)));
        
        $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        
        $this->widgetSchema['nombre_de_place'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7),
                ));
        $this->validatorSchema['nombre_de_place'] = new sfValidatorInteger();

        //champ texte réservé à C+
        $this->widgetSchema['technique'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor','rows'=>'10' ,'cols'=>'50'));


        /*
         * gestion du type trajet
         *      1 => regulier	=> si jour_unique_date est vide
         *      2 => ponctuel	=> si jour_unique_date n'est pas vide
         *      3 => option 3 utilisée dans V1
         */
        
        
        //nouvel widget pour l'autocompletion du covoitureur
        //$this->widgetSchema['covoitureur'] = new sfWidgetFormInputText();
        //$this->validatorSchema['covoitureur'] = new sfValidatorString(array('max_length' => 255, 'required' => $this->getObject()->isNew()));
        
        
        
        /********************************************************************/
        /*           Imbrication du formulaire de trajetspecifique C+       */
        /********************************************************************/
   
        
        //$this->embedRelation('CpTrajet','CpTrajetForm');
        //$this->embedRelation('CpTrajet','CpTrajetNewForm');
  

        $this->widgetSchema['cp_trajet_id'] = new sfWidgetFormInputHidden();
        $this->setDefault('cp_trajet_id', $this->getObject()->isNew() ? NULL : $this->getObject()->getCpTrajetId());

        //$cpTrajetId = $this->getObject()->isNew() ? NULL : $this->getObject()->getCpTrajetId();
        
        if($this->getObject()->isNew()){
            $cpTrajetId = NULL;
            $form = new CpTrajetNewForm(array(), array());
        }  elseif ($this->getObject()->getCpTrajetId() != NULL) {
            $cpTrajetId = $this->getObject()->getCpTrajetId();
            $form = new CpTrajetNewForm(array(), array('cp_trajet_id' => $cpTrajetId));
            $form->setDefault('cp_trajet_id', $this->getObject()->getCpTrajetId());
        }else{
            $cpTrajetId = NULL;
            $form = new CpTrajetNewForm(array(), array());
        }
        
        /*
        if($this->getObject()->isNew()){
            $form = new CpTrajetNewForm(array(), array());
        }else{
            if($cpTrajetId != NULL){
                $form = new CpTrajetNewForm(array(), array('cp_trajet_id' => $cpTrajetId));
                $form->setDefault('cp_trajet_id', $this->getObject()->getCpTrajetId());
            }else{
                $form = new CpTrajetNewForm(array(), array());
            }
        
            
        }
        */
        
        $this->embedForm('CpTrajet', $form);
        $this->embedRelation('CpTrajet');


    }
    
    
    /*
     * surcharge de la methode pour empecher l'enregistrement d'un cpTrajet en cas de trajet non regulier
     */

/*
    protected function doBind(array $values)
      {
        if ($values['id_type_trajet'] == 2)
        {
          unset($values['CpTrajet'], $this['CpTrajet']);
        }

        parent::doBind($values);
      }

    */
    /**
   * Saves embedded form objects.
   *
   * @param mixed $con   An optional connection object
   * @param array $forms An array of forms
   */
    /*
  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if (null === $con)
    {
      $con = $this->getConnection();
    }

    if (null === $forms)
    {
      
      $cpTrajet = $this->getValue('CpTrajet');

        $forms = $this->embeddedForms;
        foreach ($this->embeddedForms['newPhotos'] as $name => $form)
        {
          if ($form['lundi_prise_service_min']['hour'] == '' || $form['lundi_prise_service_max']['hour'])
          {
            if ($form['lundi_prise_service_min']['hour'] == '' && $form['lundi_prise_service_max']['hour']){
                
            }  elseif ($form['lundi_prise_service_min']['hour'] != '') {
                $form['lundi_prise_service_max']['hour'] = $form['lundi_prise_service_min']['hour'];
                $form['lundi_prise_service_max']['minute'] = $form['lundi_prise_service_min']['minute'];
                
            } elseif ($form['lundi_prise_service_max']['hour'] != '') {
                $form['lundi_prise_service_min']['hour'] = $form['lundi_prise_service_max']['hour'];
                $form['lundi_prise_service_min']['minute'] = $form['lundi_prise_service_max']['minute'];
            }
          }
          
          if ($form['lundi_fin_service_min']['hour'] == '' || $form['lundi_fin_service_max']['hour'])
          {
            if ($form['lundi_fin_service_min']['hour'] == '' && $form['lundi_fin_service_max']['hour']){
                
            }  elseif ($form['lundi_fin_service_min']['hour'] != '') {
                $form['lundi_fin_service_max']['hour'] = $form['lundi_fin_service_min']['hour'];
                $form['lundi_fin_service_max']['minute'] = $form['lundi_fin_service_min']['minute'];
                
            } elseif ($form['lundi_fin_service_max']['hour'] != '') {
                $form['lundi_fin_service_min']['hour'] = $form['lundi_fin_service_max']['hour'];
                $form['lundi_fin_service_min']['minute'] = $form['lundi_fin_service_max']['minute'];
            }
          }
          //
          $form['mercredi_fin_service_min']['hour'] = 12;
                $form['mercredi_fin_service_min']['minute'] = 37;
          
        }
    }
    
    //gestion des horaires min et max quand une des valeur est nulle
return parent::saveEmbeddedForms($con, $forms);
    
  }
     * 
     */
  

}
