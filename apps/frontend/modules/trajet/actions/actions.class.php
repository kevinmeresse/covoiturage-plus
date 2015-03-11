<?php

/**
 * trajet actions.
 *
 * @package    roulezmailn_v3
 * @subpackage trajet
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class trajetActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object test
     */
    public function executeIndex(sfWebRequest $request) {
        //initialisation du formulaire de recherche et filtre
        $this->formRecherche = new TrajetRechercheForm();
    }

    //liste des trajets au travers du formulaire de recherche
    public function executeList(sfWebRequest $request) {

        //Gestion de l'alerte mail
        $this->formAlerte = new TrajetAlerteListForm();


        //tableau permettant de passer les élément de requete pour l'utilisation du pager
        $elemntRequete = array();

        //extraction des infos entre parentheses
        $outil = new Util();

        //Récupération des filtres
        $newForm = $request->getParameter('trajet');
        $filtre = array();
        $filtre["all"] = false;
        $tabCpVille = array();
        
        $etabExtraitId = '';

        //récupération des éléments du formulaire
        //tableau des parametres passé en autocomplétion
        //initialisation des parametres
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = '';
        $this->tab_ville_autoc['destination_ville'] = '';
        $this->tab_ville_autoc['etablissement'] = '';
        $this->tab_ville_autoc['id_evenement'] = '';
        $this->tab_ville_autoc['depart_autre_lieu'] = '';
        $this->tab_ville_autoc['destination_autre_lieu'] = '';
        $this->tab_ville_autoc['type_cov'] = '';
        $this->tab_ville_autoc['id_type_trajet'] = '';
        $this->tab_ville_autoc['heure_prise_min'] = '';
        $this->tab_ville_autoc['heure_prise_max'] = '';
        $this->tab_ville_autoc['heure_fin_min'] = '';
        $this->tab_ville_autoc['heure_fin_max'] = '';
        $this->tab_ville_autoc['depart_ville_rayon'] = '';
        $this->tab_ville_autoc['destination_ville_rayon'] = '';
        $this->tab_ville_autoc['horaire_id'] = '';
        $this->tab_ville_autoc['secteur_id'] = '';
        $this->tab_ville_autoc['jour_unique_date'] = '';
        

        $this->value = $newForm["depart_ville"];

        $this->extract = 0;

        //traitement du formulaire simplifié
        //vérification du type de requete
        // si Post vient du formulaire
        // si get vient de l'url (passage par page)
        if ($request->isMethod(sfRequest::POST)) {//passage par Post (formulaire)

            /*             * ****************************************** */
            //traitement du formulaire simple => smpl
            /*             * ****************************************** */
            if ($newForm["form_type"] == 'smpl') {
                //récupération de la ville de départ
                if ($newForm["depart_ville"] != '' && $newForm["depart_ville"] != 'Ville') {
                    $tabCpVille = $outil->recupCpLibelle($newForm["depart_ville"]);
                    //$this->erreur = $tabCpVille;

                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["depart_ville"] = null;
                    $filtre["all"] = true;
                }


                //récupération de la ville de destination
                if ($newForm["destination_ville"] != '' && $newForm["destination_ville"] != 'Ville') {
                    $tabCpVille = $outil->recupCpLibelle($newForm["destination_ville"]);

                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["destination_ville"] = null;
                    $filtre["all"] = true;
                }
                $filtre["form_type"] = $newForm["form_type"];

                //element pour le formulaire
                if ($newForm["depart_ville"] != 'Départ') {
                    $this->tab_ville_autoc['depart_ville'] = $newForm['depart_ville'];
                }
                if ($newForm["destination_ville"] != 'Destination') {
                    $this->tab_ville_autoc['destination_ville'] = $newForm['destination_ville'];
                }
                
                //génération des élément à passer en session pour regenérer la requete à l'aide du pager
                $elemntRequete['form_type'] = 'smpl';
                if ($newForm["depart_ville"] != 'Départ') {
                    $elemntRequete['depart_ville'] = $newForm["depart_ville"];
                } else {
                    $elemntRequete['depart_ville'] = '';
                }
                if ($newForm["destination_ville"] != 'Destination') {
                    $elemntRequete['destination_ville'] = $newForm["destination_ville"];
                } else {
                    $elemntRequete['destination_ville'] = '';
                }
                //$this->tab_ville_autoc['etablissement'] = $newForm["etablissement"];

                //insertion du tableau de requete en session
                $this->getUser()->setAttribute('elemntRequete', $elemntRequete);

                /*                 * ****************************************** */
                //traitement du formulaire avancé => avnc
                /*                 * ****************************************** */
            } else {
                //récupération de la ville de départ
                if ($newForm["depart_ville"] != '' && $newForm["depart_ville"] != 'Ville') {
                    $tabCpVille = $outil->recupCpLibelle($newForm["depart_ville"]);
                    //$this->erreur = $tabCpVille;

                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["depart_ville"] = null;
                    $filtre["all"] = true;
                }




                //récupération de la ville de destination
                if ($newForm["destination_ville"] != '' && $newForm["destination_ville"] != 'Ville') {
                    $tabCpVille = $outil->recupCpLibelle($newForm["destination_ville"]);

                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["destination_ville"] = null;
                    $filtre["all"] = true;
                }

                $filtre["form_type"] = $newForm["form_type"];

                //récupération de l'entrprise
                /*
                if ($newForm["id_etablissement"] != '') {
                    $filtre["id_etablissement"] = $newForm["id_etablissement"];
                }
                 * 
                 */
                $valIdEtab = 0;
                if ($newForm["etablissement"] != '') {
                    
                    
                    $outil = New Util();
                
                    //extraction des informations entre parenthese de l'établissement  (id de l'etab)
                    $etabExtraitId = $outil->extractIdCpEtablissement($newForm["etablissement"]);
                    //$this->etabId = $etabExtraitId;
                    
                    $filtre["id_etablissement"] = $etabExtraitId;
                    //$this->formAlerte->setDefault('id_etablissement', $etabExtraitId);
                    $valIdEtab = $etabExtraitId;
                }

                //récupération de la date du trajet
                if ($newForm["jour_unique_date"] != '' && ($newForm["jour_unique_date"]["year"] != '' && $newForm["jour_unique_date"]["month"] != '' && $newForm["jour_unique_date"]["day"] != '')) {
                    //print_r($newForm["jour_unique_date"]);
                    $filtre["jour_unique_date"] = date($newForm["jour_unique_date"]["year"]."-".$newForm["jour_unique_date"]["month"]."-".$newForm["jour_unique_date"]["day"]);
                    $this->tab_ville_autoc['jour_unique_date'] = $newForm["jour_unique_date"];
                }
                
                //récupération de l'horaire
                if ($newForm["horaire_id"] != '') {
                    $filtre["horaire_id"] = $newForm["horaire_id"];
                    $this->tab_ville_autoc['horaire_id'] = $newForm["horaire_id"];
                }

                //récupération du secteur
                if ($newForm["secteur_id"] != '') {
                    $filtre["secteur_id"] = $newForm["secteur_id"];
                    $this->tab_ville_autoc['secteur_id'] = $newForm["secteur_id"];
                }

                //récupération de l'évènement
                if ($newForm["id_evenement"] != '') {
                    $filtre["id_evenement"] = $newForm["id_evenement"];
                    $this->tab_ville_autoc['id_evenement'] = $newForm["id_evenement"];
                }
                
                //récupération du lieu de départ
                if ($newForm["depart_autre_lieu"] != '') {
                    $filtre["depart_autre_lieu"] = $newForm["depart_autre_lieu"];
                    $this->tab_ville_autoc['depart_autre_lieu'] = $newForm["depart_autre_lieu"];
                }



                //récupération du lieu de destination 
                if ($newForm["destination_autre_lieu"] != '') {
                    $filtre["destination_autre_lieu"] = $newForm["destination_autre_lieu"];
                    $this->tab_ville_autoc['destination_autre_lieu'] = $newForm["destination_autre_lieu"];
                }

                //récupération du type de covoitureur
                if ($newForm["type_cov"] != '') {
                    $filtre["type_cov"] = $newForm["type_cov"];
                    $this->tab_ville_autoc['type_cov'] = $newForm["type_cov"];
                }
                
                
                //récupération du type de trajet
                if ($newForm["id_type_trajet"] != '') {
                    $filtre["id_type_trajet"] = $newForm["id_type_trajet"];
                    $this->tab_ville_autoc['id_type_trajet'] = $newForm["id_type_trajet"];
                }


                //récupération de la prise de service
                if ($newForm["heure_prise_min"] != '') {
                    $filtre["heure_prise_min"] = $newForm["heure_prise_min"];
                    $this->tab_ville_autoc['heure_prise_min'] = $newForm["heure_prise_min"];
                }

                //récupération de la pprise de service
                if ($newForm["heure_prise_max"] != '') {
                    $filtre["heure_prise_max"] = $newForm["heure_prise_max"];
                    $this->tab_ville_autoc['heure_prise_max'] = $newForm["heure_prise_max"];
                }

                //récupération de la prise de service
                if ($newForm["heure_fin_min"] != '') {
                    $filtre["heure_fin_min"] = $newForm["heure_fin_min"];
                    $this->tab_ville_autoc['heure_fin_min'] = $newForm["heure_fin_min"];
                }

                //récupération de la fin de service
                if ($newForm["heure_fin_max"] != '') {
                    $filtre["heure_fin_max"] = $newForm["heure_fin_max"];
                    $this->tab_ville_autoc['heure_fin_max'] = $newForm["heure_fin_max"];
                }

                //Gestion des rayons d'élargissement
                if ($newForm["depart_ville_rayon"] != '') {
                    $filtre["depart_ville_rayon"] = $newForm["depart_ville_rayon"];
                    $this->tab_ville_autoc['depart_ville_rayon'] = $newForm["depart_ville_rayon"];
                }

                if ($newForm["destination_ville_rayon"] != '') {
                    $filtre["destination_ville_rayon"] = $newForm["destination_ville_rayon"];
                    $this->tab_ville_autoc['destination_ville_rayon'] = $newForm["destination_ville_rayon"];
                }

                //element pour le formulaire
                $this->tab_ville_autoc['depart_ville'] = $newForm['depart_ville'];
                $this->tab_ville_autoc['destination_ville'] = $newForm['destination_ville'];
                $this->tab_ville_autoc['etablissement'] = $newForm['etablissement'];

                //génération des élément à passer en session pour regenérer la requete à l'aide du pager
                $elemntRequete['form_type'] = 'avnc';
                $elemntRequete['depart_ville'] = $newForm["depart_ville"];
                $elemntRequete['destination_ville'] = $newForm["destination_ville"];
                $elemntRequete['etablissement'] = $newForm["etablissement"];
                $elemntRequete['id_etablissement'] = $etabExtraitId;
                $elemntRequete['id_evenement'] = $newForm["id_evenement"];
                $elemntRequete['jour_unique_date'] = $newForm["jour_unique_date"];
                $elemntRequete['horaire_id'] = $newForm["horaire_id"];
                $elemntRequete['secteur_id'] = $newForm["secteur_id"];
                $elemntRequete['depart_autre_lieu'] = $newForm["depart_autre_lieu"];
                $elemntRequete['destination_autre_lieu'] = $newForm["destination_autre_lieu"];
                $elemntRequete['type_cov'] = $newForm["type_cov"];
                $elemntRequete['id_type_trajet'] = $newForm["id_type_trajet"];
                $elemntRequete['heure_prise_min'] = $newForm["heure_prise_min"];
                $elemntRequete['heure_prise_max'] = $newForm["heure_prise_max"];
                $elemntRequete['heure_fin_min'] = $newForm["heure_fin_min"];
                $elemntRequete['heure_fin_max'] = $newForm["heure_fin_max"];
                $elemntRequete['depart_ville_rayon'] = $newForm["depart_ville_rayon"];
                $elemntRequete['destination_ville_rayon'] = $newForm["destination_ville_rayon"];

                //insertion du tableau de requete en session
                $this->getUser()->setAttribute('elemntRequete', $elemntRequete);
            }
        } else {//passage par GET (pager)
            //récupération des élément de requette de la session
            $elemntRequete = $this->getUser()->getAttribute('elemntRequete');

            $this->getUser()->setAttribute('formRequete', 'GET');


            if ($elemntRequete['form_type'] == 'smpl') {
                //récupération de la ville de départ
                if ($elemntRequete['depart_ville'] != '') {

                    $tabCpVille = $outil->recupCpLibelle($elemntRequete['depart_ville']);


                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["depart_ville"] = null;
                    $filtre["all"] = true;
                }


                //récupération de la ville de destination
                if ($elemntRequete['destination_ville'] != '') {

                    $tabCpVille = $outil->recupCpLibelle($elemntRequete['destination_ville']);
                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["destination_ville"] = null;
                    $filtre["all"] = true;
                }
                $filtre["form_type"] = $elemntRequete['form_type'];

                //element pour le formulaire
                $this->tab_ville_autoc['depart_ville'] = $elemntRequete['depart_ville'];
                $this->tab_ville_autoc['destination_ville'] = $elemntRequete['destination_ville'];
            } else {//traitement du formulaire avancé
                //récupération de la ville de départ
                if ($elemntRequete['depart_ville'] != '') {

                    $tabCpVille = $outil->recupCpLibelle($elemntRequete['depart_ville']);


                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["depart_ville"] = null;
                }


                //récupération de la ville de destination
                if ($elemntRequete['destination_ville'] != '') {

                    $tabCpVille = $outil->recupCpLibelle($elemntRequete['destination_ville']);
                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["destination_ville"] = null;
                }

                $filtre["form_type"] = $elemntRequete['form_type'];


                //Gestion des rayons d'élargissement
                if ($elemntRequete["depart_ville_rayon"] != '') {
                    $filtre["depart_ville_rayon"] = $elemntRequete["depart_ville_rayon"];
                }

                if ($elemntRequete["destination_ville_rayon"] != '') {
                    $filtre["destination_ville_rayon"] = $elemntRequete["destination_ville_rayon"];
                }



                //récupération de l'entrprise
                /*
                if ($newForm["id_etablissement"] != '') {
                    $filtre["id_etablissement"] = $elemntRequete["id_etablissement"];
                }
                 * 
                 */
                $valIdEtab = 0;
                //récupération de l'entrprise
                if ($newForm["id_etablissement"] != '') {
                    $filtre["id_etablissement"] = $elemntRequete["id_etablissement"];
                    $valIdEtab = $elemntRequete["id_etablissement"];
                }

                //récupération de la date du trajet
                if ($newForm["jour_unique_date"] != '') {
                    $filtre["jour_unique_date"] = $elemntRequete["jour_unique_date"];
                }
                
                //récupération de l'horaire
                if ($newForm["horaire_id"] != '') {
                    $filtre["horaire_id"] = $elemntRequete["horaire_id"];
                }
                
                //récupération du secteur
                if ($newForm["secteur_id"] != '') {
                    $filtre["secteur_id"] = $elemntRequete["secteur_id"];
                }

                //récupération de l'évènement
                if ($newForm["id_evenement"] != '') {
                    $filtre["id_evenement"] = $elemntRequete["id_evenement"];
                }
                

                //récupération du lieu de départ
                if ($newForm["depart_autre_lieu"] != '') {
                    $filtre["depart_autre_lieu"] = $elemntRequete["depart_autre_lieu"];
                }

                //récupération du lieu de destination
                if ($newForm["destination_autre_lieu"] != '') {
                    $filtre["destination_autre_lieu"] = $elemntRequete["destination_autre_lieu"];
                }

                //récupération du type de covoitureur
                if ($newForm["type_cov"] != '') {
                    $filtre["type_cov"] = $elemntRequete["type_cov"];
                }

                                //récupération du type de trajet
                if ($newForm["id_type_trajet"] != '') {
                    $filtre["id_type_trajet"] = $elemntRequete["id_type_trajet"];
                }

                //récupération de la rise de service
                if ($newForm["heure_prise_min"] != '') {
                    $filtre["heure_prise_min"] = $elemntRequete["heure_prise_min"];
                }

                //récupération de la prise de service
                if ($newForm["heure_prise_max"] != '') {
                    $filtre["heure_prise_max"] = $elemntRequete["heure_prise_max"];
                }

                //récupération de la prise de service
                if ($newForm["heure_fin_min"] != '') {
                    $filtre["heure_fin_min"] = $elemntRequete["heure_fin_min"];
                }

                //récupération de la fin de service
                if ($newForm["heure_fin_max"] != '') {
                    $filtre["heure_fin_max"] = $elemntRequete["heure_fin_max"];
                }

                //element pour le formulaire
                $this->tab_ville_autoc['depart_ville'] = $elemntRequete['depart_ville'];
                $this->tab_ville_autoc['destination_ville'] = $elemntRequete['destination_ville'];
                $this->tab_ville_autoc['etablissement'] = $elemntRequete['etablissement'];
            }
        }






        $this->filtre = $filtre;
        $this->pager = new sfDoctrinePager(
                        'Trajet',
                        sfConfig::get('app_max_trajet_list'));

        //$this->pager = new sfDoctrinePager('Trajet',5);
        $this->pager->setQuery(Doctrine::getTable('Trajet')->listing($filtre));
        //$this->pager->setQuery(Doctrine::getTable('Trajet')->createQuery());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }
    
      //liste des trajets au travers du formulaire de recherche
    public function executeListAlloStop(sfWebRequest $request) {

        //Gestion de l'alerte mail
        $this->formAlerte = new TrajetAlerteListForm();


        //tableau permettant de passer les élément de requete pour l'utilisation du pager
        $elemntRequete = array();

        //extraction des infos entre parentheses
        $outil = new Util();

        //Récupération des filtres
        $newForm = $request->getParameter('trajet');
        $filtre = array();
        $tabCpVille = array();

        //récupération des éléments du formulaire
        //tableau des parametres passé en autocomplétion
        //initialisation des parametres
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = '';
        $this->tab_ville_autoc['destination_ville'] = '';


        $this->value = $newForm["depart_ville"];

        $this->extract = 0;

        //traitement du formulaire simplifié
        //vérification du type de requete
        // si Post vient du formulaire
        // si get vient de l'url (passage par page)
        if ($request->isMethod(sfRequest::POST)) {//passage par Post (formulaire)

            /*             * ****************************************** */
            //traitement du formulaire simple => smpl
            /*             * ****************************************** */
            if ($newForm["form_type"] == 'smpl') {
                //récupération de la ville de départ
                if ($newForm["depart_ville"] != '' && $newForm["depart_ville"] != 'Ville') {
                    $tabCpVille = $outil->recupCpLibelle($newForm["depart_ville"]);
                    //$this->erreur = $tabCpVille;

                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["depart_ville"] = null;
                }


                //récupération de la ville de destination
                if ($newForm["destination_ville"] != '' && $newForm["destination_ville"] != 'Ville') {
                    $tabCpVille = $outil->recupCpLibelle($newForm["destination_ville"]);

                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["destination_ville"] = null;
                }
                $filtre["form_type"] = $newForm["form_type"];

                //element pour le formulaire
                $this->tab_ville_autoc['depart_ville'] = $newForm['depart_ville'];
                $this->tab_ville_autoc['destination_ville'] = $newForm['destination_ville'];

                //génération des élément à passer en session pour regenérer la requete à l'aide du pager
                $elemntRequete['form_type'] = 'smpl';
                $elemntRequete['depart_ville'] = $newForm["depart_ville"];
                $elemntRequete['destination_ville'] = $newForm["destination_ville"];

                //insertion du tableau de requete en session
                $this->getUser()->setAttribute('elemntRequete', $elemntRequete);

                /*                 * ****************************************** */
                //traitement du formulaire avancé => avnc
                /*                 * ****************************************** */
            } else {
                //récupération de la ville de départ
                if ($newForm["depart_ville"] != '' && $newForm["depart_ville"] != 'Ville') {
                    $tabCpVille = $outil->recupCpLibelle($newForm["depart_ville"]);
                    //$this->erreur = $tabCpVille;

                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["depart_ville"] = null;
                }




                //récupération de la ville de destination
                if ($newForm["destination_ville"] != '' && $newForm["destination_ville"] != 'Ville') {
                    $tabCpVille = $outil->recupCpLibelle($newForm["destination_ville"]);

                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["destination_ville"] = null;
                }

                $filtre["form_type"] = $newForm["form_type"];

   

                //récupération de l'évènement
                if ($newForm["id_evenement"] != '') {
                    $filtre["id_evenement"] = $newForm["id_evenement"];
                }


                //récupération du lieu de départ
                if ($newForm["depart_autre_lieu"] != '') {
                    $filtre["depart_autre_lieu"] = $newForm["depart_autre_lieu"];
                }

                //récupération du lieu de destination
                if ($newForm["destination_autre_lieu"] != '') {
                    $filtre["destination_autre_lieu"] = $newForm["destination_autre_lieu"];
                }

                //récupération du type de covoitureur
                if ($newForm["type_cov"] != '') {
                    $filtre["type_cov"] = $newForm["type_cov"];
                }


         

                //Gestion des rayons d'élargissement
                if ($newForm["depart_ville_rayon"] != '') {
                    $filtre["depart_ville_rayon"] = $newForm["depart_ville_rayon"];
                }

                if ($newForm["destination_ville_rayon"] != '') {
                    $filtre["destination_ville_rayon"] = $newForm["destination_ville_rayon"];
                }

                //element pour le formulaire
                $this->tab_ville_autoc['depart_ville'] = $newForm['depart_ville'];
                $this->tab_ville_autoc['destination_ville'] = $newForm['destination_ville'];

                //génération des élément à passer en session pour regenérer la requete à l'aide du pager
                $elemntRequete['form_type'] = 'avnc';
                $elemntRequete['depart_ville'] = $newForm["depart_ville"];
                $elemntRequete['destination_ville'] = $newForm["destination_ville"];
                $elemntRequete['id_evenement'] = $newForm["id_evenement"];
                $elemntRequete['depart_autre_lieu'] = $newForm["depart_autre_lieu"];
                $elemntRequete['destination_autre_lieu'] = $newForm["destination_autre_lieu"];
                $elemntRequete['type_cov'] = $newForm["type_cov"];
            
                $elemntRequete['depart_ville_rayon'] = $newForm["depart_ville_rayon"];
                $elemntRequete['destination_ville_rayon'] = $newForm["destination_ville_rayon"];

                //insertion du tableau de requete en session
                $this->getUser()->setAttribute('elemntRequete', $elemntRequete);
            }
        } else {//passage par GET (pager)
            //récupération des élément de requette de la session
            $elemntRequete = $this->getUser()->getAttribute('elemntRequete');

            $this->getUser()->setAttribute('formRequete', 'GET');


            if ($elemntRequete['form_type'] == 'smpl') {
                //récupération de la ville de départ
                if ($elemntRequete['depart_ville'] != '') {

                    $tabCpVille = $outil->recupCpLibelle($elemntRequete['depart_ville']);


                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["depart_ville"] = null;
                }


                //récupération de la ville de destination
                if ($elemntRequete['destination_ville'] != '') {

                    $tabCpVille = $outil->recupCpLibelle($elemntRequete['destination_ville']);
                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["destination_ville"] = null;
                }
                $filtre["form_type"] = $elemntRequete['form_type'];

                //element pour le formulaire
                $this->tab_ville_autoc['depart_ville'] = $elemntRequete['depart_ville'];
                $this->tab_ville_autoc['destination_ville'] = $elemntRequete['destination_ville'];
            } else {//traitement du formulaire avancé
                //récupération de la ville de départ
                if ($elemntRequete['depart_ville'] != '') {

                    $tabCpVille = $outil->recupCpLibelle($elemntRequete['depart_ville']);


                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["depart_ville"] = null;
                }


                //récupération de la ville de destination
                if ($elemntRequete['destination_ville'] != '') {

                    $tabCpVille = $outil->recupCpLibelle($elemntRequete['destination_ville']);
                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["destination_ville"] = null;
                }

                $filtre["form_type"] = $elemntRequete['form_type'];


                //Gestion des rayons d'élargissement
                if ($elemntRequete["depart_ville_rayon"] != '') {
                    $filtre["depart_ville_rayon"] = $elemntRequete["depart_ville_rayon"];
                }

                if ($elemntRequete["destination_ville_rayon"] != '') {
                    $filtre["destination_ville_rayon"] = $elemntRequete["destination_ville_rayon"];
                }



      

                //récupération de l'évènement
                if ($newForm["id_evenement"] != '') {
                    $filtre["id_evenement"] = $elemntRequete["id_evenement"];
                }
                

                //récupération du lieu de départ
                if ($newForm["depart_autre_lieu"] != '') {
                    $filtre["depart_autre_lieu"] = $elemntRequete["depart_autre_lieu"];
                }

                //récupération du lieu de destination
                if ($newForm["destination_autre_lieu"] != '') {
                    $filtre["destination_autre_lieu"] = $elemntRequete["destination_autre_lieu"];
                }

                //récupération du type de covoitureur
                if ($newForm["type_cov"] != '') {
                    $filtre["type_cov"] = $elemntRequete["type_cov"];
                }



                //element pour le formulaire
                $this->tab_ville_autoc['depart_ville'] = $elemntRequete['depart_ville'];
                $this->tab_ville_autoc['destination_ville'] = $elemntRequete['destination_ville'];
            }
        }






        $this->filtre = $filtre;
        $this->pager = new sfDoctrinePager(
                        'Trajet',
                        sfConfig::get('app_max_trajet_list'));

        //$this->pager = new sfDoctrinePager('Trajet',5);
        $this->pager->setQuery(Doctrine::getTable('Trajet')->listingAlloStop($filtre));
        //$this->pager->setQuery(Doctrine::getTable('Trajet')->createQuery());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    //Flux RSS des trajets
    public function executeRss(sfWebRequest $request) {

        //tableau permettant de passer les élément de requete pour l'utilisation du pager
        $elemntRequete = array();

        //extraction des infos entre parentheses
        $outil = new Util();

        //Récupération des filtres
        $filtre = array();

        $elemntRequete['form_type'] = 'smpl';
        $elemntRequete['depart_ville'] = $request->getParameter('depart');
        $elemntRequete['destination_ville'] = $request->getParameter('destination');



        if ($elemntRequete['form_type'] == 'smpl') {
            //récupération de la ville de départ
            if ($elemntRequete['depart_ville'] != '') {

                $tabCpVille = $outil->recupCpLibelle($elemntRequete['depart_ville']);


                if ($tabCpVille['error_type'] == 0) {
                    $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                } else {
                    $filtre["depart_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                }
            } else {
                $filtre["depart_ville"] = null;
            }


            //récupération de la ville de destination
            if ($elemntRequete['destination_ville'] != '') {

                $tabCpVille = $outil->recupCpLibelle($elemntRequete['destination_ville']);
                if ($tabCpVille['error_type'] == 0) {
                    $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                } else {
                    $filtre["destination_ville"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                }
            } else {
                $filtre["destination_ville"] = null;
            }
            $filtre["form_type"] = $elemntRequete['form_type'];
        }








        $feed = new sfAtom1Feed();
        $outil = New Util();

        $feed->setLanguage("fr");
        $feed->setTitle('Covoiturage+');
        $feed->setLink(sfConfig::get('sf_url_site'));
        $feed->setAuthorEmail('contact@covoiturage.asso.fr');
        $feed->setAuthorName('Covoiturage+');

        $feedImage = new sfFeedImage();
        $feedImage->setFavicon(sfConfig::get('sf_url_site') . '/images/favicon.ico');
        $feedImage->setImage(sfConfig::get('sf_url_site') . '/images/structure/logo-covoiturage-plus.png');
        $feed->setImage($feedImage);
        $trajets = Doctrine_Core::getTable('Trajet')->listing($filtre)->execute();
        foreach ($trajets as $trajet) {
            //$trajet = new Trajet();
            $item = new sfFeedItem();
            $item->setTitle("Trajet " . $trajet->getDepartVille() . " - " . $trajet->getDestinationVille());
            $item->setLink(sfConfig::get('sf_url_site') . '/trajet/view?id_trajet=' . $trajet->getIdTrajet());
            //Création du champ description et content
            $description = "Déposé le " . $outil->affiche_date($trajet->getDateCreation());
            $content = "Type de trajet : ";

            if ($trajet->getIdTypeTrajet() == 1) {
                $content .= "Régulier (";
                //Gestion des jours
                if ($trajet->getLundiEtat() == 1) {
                    $content .=" Lundi ";
                }
                if ($trajet->getMardiEtat() == 1) {
                    $content .=" Mardi ";
                }
                if ($trajet->getMercrediEtat() == 1) {
                    $content .=" Mercredi ";
                }
                if ($trajet->getJeudiEtat() == 1) {
                    $content .=" Jeudi ";
                }
                if ($trajet->getVendrediEtat() == 1) {
                    $content .=" Vendredi ";
                }
                if ($trajet->getSamediEtat() == 1) {
                    $content .=" Samedi ";
                }
                if ($trajet->getDimancheEtat() == 1) {
                    $content .=" Dimanche ";
                }
                $content.=")";
            } else {
                $content .= "Occasionnel ";
            }
            $content .="<br />";

            //Gestion des villes étapes
            if ($trajet->getEtape1Ville() != "") {
                $content .= "Etape intermédiaire : ";
                if ($trajet->getEtape1Ville() != "") {
                    $content .= " " . $trajet->getEtape1Ville();
                }
                if ($trajet->getEtape2Ville() != "") {
                    $content .= " " . $trajet->getEtape2Ville();
                }
                if ($trajet->getEtape3Ville() != "") {
                    $content .= " " . $trajet->getEtape3Ville();
                }
                if ($trajet->getEtape4Ville() != "") {
                    $content .= " " . $trajet->getEtape4Ville();
                }
                if ($trajet->getEtape5Ville() != "") {
                    $content .= " " . $trajet->getEtape1Ville();
                }
                $content .="<br />";
            }
            //Gestion du nombre de place
            $content .= "Nombre de place : " . $trajet->getNombreDePlace();
            $content .="<br />";

            //Gestion du du champ description de l'offre
            $content .= "Précision : " . $trajet->getDescription();
            $content .="<br />";

            $item->setDescription($description);
            $item->setContent($content);
            //$item->setPubdate();


            $feed->addItem($item);
        }

        $this->feed = $feed;
    }

    /*
     * Liste des trajets relatifs à une communauté de commune
     * 
     * @param sfRequest $request A request object    
     *      type_trajet : determine si les trajets sont au départ ou à destination des villes
     *      id_communaute : communaute de commune
     */

    public function executeListComntCom(sfWebRequest $request) {
        //tableau des noms des villes (de lacommunaute de commune
        $tabNomVille = array();

        //récupération de la liste de communes de la communaute de communes
        $this->forward404Unless($communaute_commune = Doctrine_Core::getTable('CommunauteCommune')->find(array($request->getParameter('id_communaute'))), sprintf('Object communaute_commune does not exist (%s).', $request->getParameter('id_communaute')));
        //$this->communaute_commune = $communaute_commune;
        $tabNomVille = $communaute_commune->getListeVilleLieeTabNom();

        $this->pager = new sfDoctrinePager(
                        'Trajet',
                        sfConfig::get('app_max_trajet_list'));

        $this->pager->setQuery(Doctrine::getTable('Trajet')->listingComntCom($tabNomVille, $request->getParameter('type_trajet')));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();

        $this->nomComntCom = $communaute_commune->getNom();
        $this->id_communaute = $request->getParameter('id_communaute');
        $this->type_trajet = $request->getParameter('type_trajet');
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new TrajetFrontForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));
        $this->form = new TrajetFrontForm();
        $this->processForm($request, $this->form);
        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));
        $this->form = new TrajetFrontForm($trajet);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));
        $this->form = new TrajetFrontForm($trajet);
        $this->processForm($request, $this->form);
        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));
        $trajet->delete();
        $this->redirect('trajet/list');
    }

    //Affichage de la fiche trajet
    public function executeView(sfWebRequest $request) {
        $this->forward404Unless($this->trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));

        //gestion de la mise en relation
        $miseEnRelation = new TrajetMiseEnRelation();
        $miseEnRelation->setIdTrajet($request->getParameter('id_trajet'));
        $miseEnRelation->setIdTrajetCreateur($this->trajet->getIdUtilisateur());
        $miseEnRelation->setIdDemandeur($this->getUser()->getAttribute('id_covoitureur'));

        //initialisation du formulaire de contact de covoitureur
        $this->form = new TrajetMiseEnRelationFrontForm($miseEnRelation, array('nb_passager_max' => $this->trajet->getNombreDePlace()));
        $this->form->setDefault('ind_ss_contact', $this->trajet->getCovoitureur()->getSsContactCovoit());

        $this->getContext()->getResponse()->setTitle('Covoiturage de ' . $this->trajet->getDepartVille() . ' à ' . $this->trajet->getDestinationVille() . ' avec ' . $this->trajet->getCovoitureur()->getIdentiteReduiteNom());
        $this->getContext()->getResponse()->addMeta('description', 'Trajet de covoiturage de ' . $this->trajet->getDepartVille() . ' à ' . $this->trajet->getDestinationVille() . ' avec ' . $this->trajet->getCovoitureur()->getIdentiteReduiteNom());
        $trajet = new Trajet();

        //Calcul du CO2
        $CO2 = (93.31 / 215) / 2; //en Kg
        $this->CO2 = round($this->trajet->getKm() * $CO2);

        //Gestion de GM Api
        $this->gmapCentre = array("lat" => "48.113475", "long" => "-1.675708");
        $this->gmapItineraireDepart = array("lat" => $this->trajet->getDepartLongitude(), "long" => $this->trajet->getDepartLatitude());
        $this->gmapItineraireDestination = array("lat" => $this->trajet->getDestinationLongitude(), "long" => $this->trajet->getDestinationLatitude());
        $this->gmapItineraireEtapes = array($this->trajet->getEtape1Ville(), $this->trajet->getEtape2Ville(), $this->trajet->getEtape3Ville(), $this->trajet->getEtape4Ville(), $this->trajet->getEtape5Ville());
        
        $this->getResponse()->addStylesheet('print-itineraire', '', array('media' => 'print'));
        $this->fromPage = $request->getParameter('from');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $trajet = $form->save();
            $this->getUser()->setFlash('notice', sprintf('Votre trajet vient d\'être enregistré.'));
            $this->redirect('trajet/edit?id_trajet=' . $trajet->getIdTrajet());
        }
    }

    //fonction d'autocomplétion
    public function executeAutocomplete(sfWebRequest $request) {
        //récupération du parametre passé par ajax
        $value = $request->getParameter('q');
        $type = $request->getParameter('target');
        $trajetville = new Trajet();
        $this->results = $trajetville->getAutocomplete($type, $value);
    }

    /*     * *********************************************************************** */
    /* gestion du contact du covoitureur par mail                                 */
    /*     * *********************************************************************** */

    // page de formulaire de contact
    public function executeMessageEnvoiMailTrajetForm(sfWebRequest $request) {
        $this->id_trajet = $request->getParameter('id_trajet');
        $this->depart_ville = $request->getParameter('depart_ville');
        $this->destination_ville = $request->getParameter('destination_ville');

        $this->form = new ContactMailCovoitureurtForm();
        $this->form->setDefaults(array(
            'id_trajet' => $request->getParameter('id_trajet'),
            'depart_ville' => $request->getParameter('depart_ville'),
            'destination_ville' => $request->getParameter('destination_ville')
        ));

        $this->forward404Unless($this->trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));


        //gestion de la mise en relation
        $miseEnRelation = new TrajetMiseEnRelation();
        $miseEnRelation->setIdTrajet($request->getParameter('id_trajet'));
        $miseEnRelation->setIdTrajetCreateur($this->trajet->getIdUtilisateur());
        $miseEnRelation->setIdDemandeur($this->getUser()->getAttribute('id_covoitureur'));

        //initialisation du formulaire de contact de covoitureur
        $this->form = new TrajetMiseEnRelationFrontForm($miseEnRelation);
        $this->form->setDefault('ind_ss_contact', $this->trajet->getCovoitureur()->getSsContactCovoit());
    }

    //CovoitureurEnvoiMailTrajet
    public function executeCovoitureurEnvoiMailTrajet(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));
        //$this->form = new ContactMailCovoitureurtForm();TrajetMiseEnRelationForm
        $this->form = new TrajetMiseEnRelationFrontForm();

        $this->processCovoitureurEnvoiMailTrajetForm($request, $this->form);
        //$this->setTemplate('view');
        $this->forward('trajet', 'view');
    }
    
    public function executeMailRecommandationTrajetForm(sfWebRequest $request) {
        $this->form = new MailRecommandationTrajetForm();
        $this->form->setDefault('id_trajet', $request->getParameter('id_trajet'));
        $this->setLayout('layout-popup');
    }
    
    public function executeEnvoiMailRecommandationTrajet(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));
        $this->form = new MailRecommandationTrajetForm();
        $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
        if ($this->form->isValid()) {
            $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($this->form->getValue('id_trajet'))), sprintf('Object trajet does not exist (%s).', $this->form->getValue('id_trajet')));
            $params['subject'] = $this->form->getValue('sender_name').' vous propose de covoiturer entre '.$trajet->getDepartVille().' et '.$trajet->getDestinationVille();
            $params['from'] = $this->form->getValue('sender_mail');
            $params['to'] = $this->form->getValue('destination_mail');
            $params['idTrajet'] = $this->form->getValue('id_trajet');
            $params['senderName'] = $this->form->getValue('sender_name');
            $params["depart"] = $trajet->getDepartVille();
            $params["destination"] = $trajet->getDestinationVille();
            $outil = New Util();
            $outil->envoi_mail($this, "mailRecommandationTrajet", $params);
        }
        $this->setLayout('layout-popup');
    }

    public function executeMessageEnvoiMailTrajet(sfWebRequest $request) {
        $this->setTemplate('envoiMail');
        $this->id_trajet = $request->getParameter('id_trajet');
        $this->depart_ville = $request->getParameter('depart_ville');
        $this->destination_ville = $request->getParameter('destination_ville');
    }

    //process spécifique à l'envoi de mail de contact de covoitureur sur un trajet
    protected function processCovoitureurEnvoiMailTrajetForm(sfWebRequest $request, sfForm $form) {

        $this->test = 0;
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $this->test = 1;

            $outil = new Util();

            $now = date("Y-m-d H:i:s");

            //enregistrement de la mise en relation
            $miseEnRelation = $form->save();
            $miseEnRelation->setDateCreation($now);
            $miseEnRelation->setDateEnvoi($now);
            $miseEnRelation->setIdSite(sfConfig::get('sf_id_site_client'));
            $miseEnRelation->setCle($outil->genereCle('trajet', 'mer'));

            //gestion de l'état 0
            $miseEnRelation->setEtat(0);
            $miseEnRelation->save();


            //traitement de l'envoi de mail
            $trajetId = $form->getValue('id_trajet');
            //Récuperation du trajet
            $trajet = Doctrine_Core::getTable('Trajet')->find($trajetId);
            //Récuperation du covoitureur demandeur
            $covoitureurDemandeur = Doctrine_Core::getTable('Covoitureur')->find($miseEnRelation->getIdDemandeur());

            //$CovoitureurId = $this->getUser()->getAttribute('id_covoitureur');
            //$covoitureur = Doctrine_Core::getTable('Covoitureur')->find($CovoitureurId);
            $covoitureurTrajet = Doctrine_Core::getTable('Covoitureur')->find($miseEnRelation->getIdTrajetCreateur());

            //Preparation du mail
            $params['subject'] = "Demande de covoiturage";
            //$params['to'] = $trajet->getCovoitureur()->getMail();
            //gestion des covoitureurs ne souhaitant pas etre mis en relation avec les autres covoitureurs directement
            if ($form->getValue('ind_ss_contact') == 0) { //ne souhaite pas etre contacte directement
                $params['to'] = sfConfig::get('sf_mail_cp_contact_trajet');
                $params['depositaire'] = '';
            } else {
                $params['to'] = $covoitureurTrajet->getMail();
                $params['depositaire'] = ' '.$covoitureurTrajet->getPrenom().' '.$covoitureurTrajet->getNom();
            }

            $params['from'] = sfConfig::get('sf_mail_envoi');
            $params["depart"] = $trajet->getDepartVille();
            $params["arrivee"] = $trajet->getDestinationVille();
            //$params["date"] = $trajet->get();
            $params["places"] = $miseEnRelation->getNbPlacesDemandees();
            $params["message"] = $miseEnRelation->getMessage();
            $params["demandeur"] = $covoitureurDemandeur->getIdentiteReduiteNom();
            $params["coordonneeDemandeur"] = $covoitureurDemandeur->getMail();
            //$params["urlValide1"] = $this->getContext()->getRouting()->generate('default', array('module'=>'Trajet','action'=>'reponseMiseEnRelationRefus','mer'=>$miseEnRelation->getIdTrajetMiseEnRelation()));
            //$params["urlValide0"] = $this->generateUrl('default', array('module'=>'Trajet','action'=>'reponseMiseEnRelationRefus','mer'=>$miseEnRelation->getIdTrajetMiseEnRelation()));
            $params["urlValide1"] = "trajet/reponseMiseEnRelationAccept?mer=" . $miseEnRelation->getCle();
            $params["urlValide0"] = "trajet/reponseMiseEnRelationRefus?mer=" . $miseEnRelation->getCle();


            //envoi mail
            $outil = New Util();
            $outil->envoi_mail($this, "mailDemandeCovoiturage", $params);

            $this->redirect($this->generateUrl(
                            'default', array('module' => 'trajet',
                        'action' => 'messageEnvoiMailTrajet',
                        'id_trajet' => $form->getValue('id_trajet'),
                        'depart_ville' => $form->getValue('depart_ville'),
                        'destination_ville' => $form->getValue('destination_ville')
                    )));
            //$this->setTemplate('envoiMail');
        }
        $trajet->setNombreDemande($trajet->getNombreDemande() + 1);
        $trajet->save();
        $this->test = 2;
        //$this->redirect('trajet/messageEnvoiMailTrajet');
        $this->setTemplate('envoiMail');
    }

    public function executeReponseMiseEnRelationAccept(sfWebRequest $request) {
        //récupération de la mise en relation
        $this->forward404Unless($trajetMER = Doctrine_Core::getTable('TrajetMiseEnRelation')->findOneByCle(array($request->getParameter('mer'))), sprintf('Probleme au niveau de la récupération des données de mise en relation (%s).', $request->getParameter('mer')));
        
        //récupération des informations covoitureur et trajet
        $this->forward404Unless($covoitureurDemandeur = Doctrine_Core::getTable('Covoitureur')->find(array($trajetMER->getIdDemandeur())), sprintf('Probleme au niveau de la récupération des données covoitureur (%s).', $trajetMER->getIdDemandeur()));
        $this->forward404Unless($covoitureurDepositaire = Doctrine_Core::getTable('Covoitureur')->find(array($trajetMER->getIdTrajetCreateur())), sprintf('Probleme au niveau de la récupération des données covoitureur (%s).', $trajetMER->getIdTrajetCreateur()));

        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($trajetMER->getIdTrajet())), sprintf('Probleme au niveau de la récupération des données trajet (%s).', $trajetMER->getIdTrajet()));
        
        // Sauvegarde des infos pour les afficher dans le template
        $this->id_trajet_mise_en_relation = $request->getParameter('mer');
        $this->depart_ville = $trajet->getDepartVille();
        $this->destination_ville = $trajet->getDestinationVille();
        $this->nb_place = $trajetMER->getNbPlacesDemandees();
        $this->nb_place_dispo = $trajet->getNombreDePlace();
        
        
        if ($trajetMER->getEtat() == 1) {
            $this->setTemplate('reponseMiseEnRelationDejaAcceptee');
        } elseif ($trajetMER->getNbPlacesDemandees() > $trajet->getNombreDePlace()) {
            $this->setTemplate('reponseMiseEnRelationPlusDePlace');
        } else {
            $now = date("Y-m-d H:i:s");
            
            //acceptation de la demande de mise en relation
            $trajetMER->setEtat(1);
            $trajetMER->setDateModification($now);
            $trajetMER->save();
            
            $trajet->setNombreDePlace($trajet->getNombreDePlace() - $trajetMER->getNbPlacesDemandees());
            $trajet->save();

            //envoi du mail au demandeur
            //Preparation du mail
            $params['subject'] = "Acceptation de covoiturage";
            //$params['to'] = $trajet->getCovoitureur()->getMail();
            $params['to'] = $covoitureurDemandeur->getMail();
            $params['from'] = sfConfig::get('sf_mail_envoi');
            $params["depart"] = $trajet->getDepartVille();
            $params["arrivee"] = $trajet->getDestinationVille();
            //$params["date"] = $trajet->get();
            $params["places"] = $trajetMER->getNbPlacesDemandees();
            $params["message"] = $trajetMER->getMessage();
            $params["depositaire"] = $covoitureurDepositaire->getIdentiteReduiteNom();
            $params["coordonneeDepositaire"] = $covoitureurDepositaire->getMail();
            $params["urlAnnule"] = "trajet/reponseMiseEnRelationAnnuleDemandeur?mer=" . $trajetMER->getCle();

            //envoi mail
            $outil = New Util();
            $outil->envoi_mail($this, "mailConfirmationCovoiturage", $params);
        }
    }

    public function executeReponseMiseEnRelationRefus(sfWebRequest $request) {
        //récupération de la mise en relation
        $this->forward404Unless($trajetMER = Doctrine_Core::getTable('TrajetMiseEnRelation')->findOneByCle(array($request->getParameter('mer'))), sprintf('Probleme au niveau de la récupération des données de mise en relation (%s).', $request->getParameter('mer')));

        //acceptation de la demande de mise en relation
        $now = date("Y-m-d H:i:s");
        $trajetMER->setEtat(2);
        $trajetMER->setDateModification($now);
        $trajetMER->save();

        //récupération des informations covoitureur et trajet
        $this->forward404Unless($covoitureurDemandeur = Doctrine_Core::getTable('Covoitureur')->find(array($trajetMER->getIdDemandeur())), sprintf('Probleme au niveau de la récupération des données covoitureur (%s).', $trajetMER->getIdDemandeur()));
        $this->forward404Unless($covoitureurDepositaire = Doctrine_Core::getTable('Covoitureur')->find(array($trajetMER->getIdTrajetCreateur())), sprintf('Probleme au niveau de la récupération des données covoitureur (%s).', $trajetMER->getIdTrajetCreateur()));

        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($trajetMER->getIdTrajet())), sprintf('Probleme au niveau de la récupération des données trajet (%s).', $trajetMER->getIdTrajet()));


        //envoi du mail au demandeur
        //Preparation du mail
        $params['subject'] = "Refus de covoiturage";
        //$params['to'] = $trajet->getCovoitureur()->getMail();
        $params['to'] = $covoitureurDemandeur->getMail();
        $params['from'] = sfConfig::get('sf_mail_envoi');
        $params["depart"] = $trajet->getDepartVille();
        $params["arrivee"] = $trajet->getDestinationVille();
        //$params["date"] = $trajet->get();
        $params["places"] = $trajetMER->getNbPlacesDemandees();
        $params["message"] = $trajetMER->getMessage();
        $params["depositaire"] = $covoitureurDepositaire->getIdentiteReduiteNom();
        $params["coordonneeDepositaire"] = $covoitureurDepositaire->getMail();



        //envoi mail
        $outil = New Util();
        $outil->envoi_mail($this, "mailRefusCovoiturage", $params);



        $this->id_trajet_mise_en_relation = $request->getParameter('mer');
        $this->depart_ville = $trajet->getDepartVille();
        $this->destination_ville = $trajet->getDestinationVille();
        $this->nb_place = $trajetMER->getNbPlacesDemandees();
    }

    public function executeReponseMiseEnRelationAnnuleDemandeur(sfWebRequest $request) {
        //récupération de la mise en relation
        $this->forward404Unless($trajetMER = Doctrine_Core::getTable('TrajetMiseEnRelation')->findOneByCle(array($request->getParameter('mer'))), sprintf('Probleme au niveau de la récupération des données de mise en relation (%s).', $request->getParameter('mer')));
        
        //récupération des informations covoitureur et trajet
        $this->forward404Unless($covoitureurDemandeur = Doctrine_Core::getTable('Covoitureur')->find(array($trajetMER->getIdDemandeur())), sprintf('Probleme au niveau de la récupération des données covoitureur (%s).', $trajetMER->getIdDemandeur()));
        $this->forward404Unless($covoitureurDepositaire = Doctrine_Core::getTable('Covoitureur')->find(array($trajetMER->getIdTrajetCreateur())), sprintf('Probleme au niveau de la récupération des données covoitureur (%s).', $trajetMER->getIdTrajetCreateur()));

        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($trajetMER->getIdTrajet())), sprintf('Probleme au niveau de la récupération des données trajet (%s).', $trajetMER->getIdTrajet()));

        
        //annulation de la demande de mise en relation
        $now = date("Y-m-d H:i:s");
        $trajetMER->setEtat(6);
        $trajetMER->setDateModification($now);
        $trajetMER->save();
        
        $trajet->setNombreDePlace($trajet->getNombreDePlace() + $trajetMER->getNbPlacesDemandees());
        $trajet->save();
        
        //envoi du mail au demandeur
        //Preparation du mail
        $params['subject'] = "Annulation de demande de covoiturage";
        //$params['to'] = $trajet->getCovoitureur()->getMail();
        $params['to'] = $covoitureurDemandeur->getMail();
        $params['from'] = sfConfig::get('sf_mail_envoi');
        $params["depart"] = $trajet->getDepartVille();
        $params["arrivee"] = $trajet->getDestinationVille();
        //$params["date"] = $trajet->get();
        $params["places"] = $trajetMER->getNbPlacesDemandees();
        $params["message"] = $trajetMER->getMessage();
        $params["depositaire"] = $covoitureurDepositaire->getIdentiteReduiteNom();
        $params["coordonneeDepositaire"] = $covoitureurDepositaire->getMail();



        //envoi mail
        $outil = New Util();
        $outil->envoi_mail($this, "mailAnnulationCovoiturageDemandeur", $params);



        $this->id_trajet_mise_en_relation = $request->getParameter('mer');
        $this->depart_ville = $trajet->getDepartVille();
        $this->destination_ville = $trajet->getDestinationVille();
        $this->nb_place = $trajetMER->getNbPlacesDemandees();
    }

    /*     * *********************************************************************** */

    //Affichage de la liste des trajets d'un covoitureur
    public function executeListeTrajetCovoitureur(sfWebRequest $request) {
        $this->pager = new sfDoctrinePager(
                        'Trajet',
                        sfConfig::get('app_max_trajet_list')
        );
        //$this->pager->setQuery(Doctrine::getTable('Trajet')->createQuery('a'));
        $this->pager->setQuery(Doctrine::getTable('Trajet')->getTrajetCovoitureur($this->getUser()->getAttribute('id_covoitureur')));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    //creation d'un trajet pour un covoitureur identifie
    public function executeNewTrajetCovoitIdent(sfWebRequest $request) {
        //récupération des informations de base de l'utilisateur
        $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array(
            $this->getUser()->getAttribute('id_covoitureur'))), sprintf('Object covoitureur does not exist (%s).', $this->getUser()->getAttribute('id_covoitureur')));

        $trajet = new Trajet();

        //insertion de l'id_site
        $trajet->setIdSite(sfConfig::get('sf_id_site_client'));

        //génération de la clé
        $outil = New Util();
        $trajet->setCle($outil->genereCle('', ''));

        //id du covoitureur
        $trajet->setIdUtilisateur($this->getUser()->getAttribute('id_covoitureur'));

        //mise à jour du champ "tolérance"
        $trajet->setTolerance(
                $trajet->setCheckboxTolerance($covoitureur->getTolereFumeur(), $covoitureur->getTolereAnimaux(), $covoitureur->getTolereBagage(), $covoitureur->getTolereMusique(), $covoitureur->getTolereDiscussion()
                ));

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = '';
        $this->tab_ville_autoc['destination_ville'] = '';
        $this->tab_ville_autoc['etape1_ville'] = '';
        $this->tab_ville_autoc['etape2_ville'] = '';
        $this->tab_ville_autoc['etape3_ville'] = '';
        $this->tab_ville_autoc['etape4_ville'] = '';
        $this->tab_ville_autoc['etape5_ville'] = '';
        $this->tab_ville_autoc['covoitureur'] = $this->getUser()->getAttribute('id_covoitureur');




        $this->form = new TrajetCovoitureurForm($trajet, array('id_covoitureur' => $this->getUser()->getAttribute('id_covoitureur')));

        //id du covoitureur
        //$this->id_covoitureur = $this->getUser()->getAttribute('id_covoitureur');
    }

    public function executeCreateTrajetCovoitIdent(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));
        $trajet = new Trajet();
        //$trajet->setKm('55');
        $trajet->setIdUtilisateur($this->getUser()->getAttribute('id_covoitureur'));

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('trajet');
        $this->depart_ville = $formnew['depart_ville'];


        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = $formnew['depart_ville'];
        $this->tab_ville_autoc['destination_ville'] = $formnew['destination_ville'];
        $this->tab_ville_autoc['etape1_ville'] = $formnew['etape1_ville'];
        $this->tab_ville_autoc['etape2_ville'] = $formnew['etape2_ville'];
        $this->tab_ville_autoc['etape3_ville'] = $formnew['etape3_ville'];
        $this->tab_ville_autoc['etape4_ville'] = $formnew['etape4_ville'];
        $this->tab_ville_autoc['etape5_ville'] = $formnew['etape5_ville'];

        $this->tab_ville_autoc['covoitureur'] = $this->getUser()->getAttribute('id_covoitureur');

        $this->form = new TrajetCovoitureurForm($trajet);
        $this->processTrajetCovoitForm($request, $this->form);
        $this->setTemplate('createTrajet');
    }

    public function executeEditTrajetCovoitIdent(sfWebRequest $request) {
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));
        //$this->forward404Unless($cp_trajet = Doctrine_Core::getTable('CpTrajet')->find(array($trajet->getCpTrajetId)), sprintf('Object trajet does not exist (%s).', $trajet->getCpTrajetId));
        $this->form = new TrajetCovoitureurForm($trajet);

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = $trajet->getDepartVille();
        $this->tab_ville_autoc['destination_ville'] = $trajet->getDestinationVille();
        $this->tab_ville_autoc['etape1_ville'] = $trajet->getEtape1Ville();
        $this->tab_ville_autoc['etape2_ville'] = $trajet->getEtape2Ville();
        $this->tab_ville_autoc['etape3_ville'] = $trajet->getEtape3Ville();
        $this->tab_ville_autoc['etape4_ville'] = $trajet->getEtape4Ville();
        $this->tab_ville_autoc['etape5_ville'] = $trajet->getEtape5Ville();
    }

    public function executeUpdateTrajetCovoitIdent(sfWebRequest $request) {

        $idTrajet = $request->getParameter('id_trajet');

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('trajet');
        $this->depart_ville = $formnew['depart_ville'];

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = $formnew['depart_ville'];
        $this->tab_ville_autoc['destination_ville'] = $formnew['destination_ville'];
        $this->tab_ville_autoc['etape1_ville'] = $formnew['etape1_ville'];
        $this->tab_ville_autoc['etape2_ville'] = $formnew['etape2_ville'];
        $this->tab_ville_autoc['etape3_ville'] = $formnew['etape3_ville'];
        $this->tab_ville_autoc['etape4_ville'] = $formnew['etape4_ville'];
        $this->tab_ville_autoc['etape5_ville'] = $formnew['etape5_ville'];

        $this->tab_ville_autoc['covoitureur'] = $this->getUser()->getAttribute('id_covoitureur');


        //$this->test = $formnew['vehicule_modele'] . $formnew['vehicule_marque'];

        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));
        $this->form = new TrajetCovoitureurForm($trajet);
        $this->processTrajetCovoitForm($request, $this->form);
        //$this->setTemplate('editTrajetCovoitIdent');
        $this->redirect('trajet/editTrajetCovoitIdent?id_trajet='.$idTrajet);
    }

    /*
     * La suppression n'est pas vraiment réalisée => le trajet est mis dans l'état etat = 0
     */

    public function executeDeleteTrajetCovoitIdent(sfWebRequest $request) {

        //$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));
        $trajet->setEtat(0);
        $trajet->save();
        $this->redirect('trajet/listeTrajetCovoitureur');
    }

    /*
     * activation n'est pas vraiment réalisée => le trajet est mis dans l'état etat = 0
     */

    public function executeActiveTrajetCovoitIdent(sfWebRequest $request) {

        //$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));
        $trajet->setActif(1);
        $trajet->save();
        $this->redirect('trajet/listeTrajetCovoitureur');
    }

    /*
     * La desactivation n'est pas vraiment réalisée => le trajet est mis dans l'état etat = 0
     */

    public function executeDesactiveTrajetCovoitIdent(sfWebRequest $request) {

        //$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));
        $trajet->setActif(0);
        $trajet->save();
        $this->redirect('trajet/listeTrajetCovoitureur');
    }

    protected function processTrajetCovoitForm(sfWebRequest $request, sfForm $form) {


        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }

        //$val_temp = $form->getValue('vehicule_modele');

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {

            $trajet = $form->save();

            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $trajet->setDateCreation($now);
            }
            $trajet->setDateModification($now);

            //gestion de la date de dépublication
            //si trajet occasionnel (1) => date_depubli = date jour unique + 1 jour
            //si trajet régulier (2) => date_depubli = date_creation + 1 an
            if ($form->getValue('id_type_trajet') == 2) { //trajet occasionnel
                if ($form->getValue('jour_unique_date_retour') != '' && $form->getValue('jour_unique_date_retour') != '0000-00-00') {

                    $date_modif = strtotime("+1 day", strtotime($form->getValue('jour_unique_date_retour')));

                    $format_date = date("Y-m-d", $date_modif);

                    $trajet->setDateDepublication($format_date);
                } else {
                    if ($form->getValue('jour_unique_date') == '' || $form->getValue('jour_unique_date') == null) {
                        $date_modif = strtotime("+1 day", strtotime($now));
                    } else {
                        $date_modif = strtotime("+1 day", strtotime($form->getValue('jour_unique_date')));
                    }

                    $format_date = date("Y-m-d", $date_modif);

                    $trajet->setDateDepublication($format_date);
                }
            } elseif ($form->getValue('id_type_trajet') == 1) {//trajet régulier                
                $date_modif = strtotime("+1 year", strtotime($now));
                $format_date = date("Y-m-d", $date_modif);

                $trajet->setDateDepublication($format_date);
            } else {//autre => probleme?
                $date_modif = strtotime("+1 year", strtotime($now));
                $format_date = date("Y-m-d", $date_modif);

                $trajet->setDateDepublication($format_date);
            }

            //mise à jour du site
            $trajet->setIdSite(sfConfig::get('sf_id_site_client'));

            //mise à jour de l'état du trajet (par défaut à 1
            $trajet->setEtat(1);



            //extraction des infos entre parentheses
            $outil = new Util();
            $trajet->setCle($outil->genereCle('', ''));

            //mise à jour des informations liées aux villes
            //ville départ
            $chaine = $outil->extractCpLibelle($form->getValue('depart_ville'));
            $depVille = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine);

            $trajet->setDepartVille($chaine);
            $trajet->setIdDepart($depVille->getCodeInsee());
            $trajet->setDepartCodePostal($depVille['code_postal']);
            $trajet->setDepartLatitude($depVille['latitude']);
            $trajet->setDepartLongitude($depVille['longitude']);
            $trajet->setDepartInsee($depVille->getConcatPaysVille());
            $trajet->setIdDepartPays($depVille->getIdPays());


            //ville destination
            $chaine = $outil->extractCpLibelle($form->getValue('destination_ville'));
            $destVille = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine);

            $trajet->setDestinationVille($chaine);
            $trajet->setIdDestination($destVille->getCodeInsee());
            $trajet->setDestinationCodePostal($destVille['code_postal']);
            $trajet->setDestinationLatitude($destVille['latitude']);
            $trajet->setDestinationLongitude($destVille['longitude']);
            $trajet->setDestinationInsee($destVille->getConcatPaysVille());
            $trajet->setIdDestinationPays($destVille->getIdPays());

            //calcul du nombre de kilometre

            $webService = 'http://maps.googleapis.com/maps/api/directions/xml?origin=' . $outil->extractCpLibelle($form->getValue('depart_ville')) . '&destination=' . $outil->extractCpLibelle($form->getValue('destination_ville')) . '&sensor=true';
            $itineraire = simplexml_load_file($webService);
            // Recuperation des donnees
            $distance = $itineraire->route->leg->distance->value;
            $distanceKm = round($distance / 1000);
            $trajet->setKm($distanceKm);


            //ville etape 1
            $chaine = $outil->extractCpLibelle($form->getValue('etape1_ville'));
            if ($chaine != '') {
                if ($etap1Ville = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine)) {
                    $trajet->setEtape1Ville($chaine);
                    $trajet->setEtape1Insee($etap1Ville->getConcatPaysVille());
                    $trajet->setEtapeDepartement1($etap1Ville->getDepartementNum());
                }
            }

            //ville etape 2
            $chaine = $outil->extractCpLibelle($form->getValue('etape2_ville'));
            if ($chaine != '') {
                if ($etap2Ville = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine)) {
                    $trajet->setEtape2Ville($chaine);
                    $trajet->setEtape2Insee($etap2Ville->getConcatPaysVille());
                    $trajet->setEtapeDepartement2($etap2Ville->getDepartementNum());
                }
            }

            //ville etape 3
            $chaine = $outil->extractCpLibelle($form->getValue('etape3_ville'));
            if ($chaine != '') {
                if ($etap3Ville = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine)) {
                    $trajet->setEtape3Ville($chaine);
                    $trajet->setEtape3Insee($etap3Ville->getConcatPaysVille());
                    $trajet->setEtapeDepartement3($etap3Ville->getDepartementNum());
                }
            }

            //ville etape 4
            $chaine = $outil->extractCpLibelle($form->getValue('etape4_ville'));
            if ($chaine != '') {
                if ($etap4Ville = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine)) {
                    $trajet->setEtape4Ville($chaine);
                    $trajet->setEtape4Insee($etap4Ville->getConcatPaysVille());
                    $trajet->setEtapeDepartement4($etap4Ville->getDepartementNum());
                }
            }

            //ville etape 5
            $chaine = $outil->extractCpLibelle($form->getValue('etape5_ville'));
            if ($chaine != '') {
                if ($etap5Ville = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine)) {
                    $trajet->setEtape5Ville($chaine);
                    $trajet->setEtape5Insee($etap5Ville->getConcatPaysVille());
                    $trajet->setEtapeDepartement5($etap5Ville->getDepartementNum());
                }
            }

            //récupération du id_utilisateur
            //$chaine = $outil->extractIdUtilisateur($form->getValue('covoitureur'));
            //if ($chaine != '') {
            //  $trajet->setIdUtilisateur($chaine);
            //}
            //gestion des tolérances

            $trajet->setTolerance($trajet->setCheckboxTolerance(
                            $form->getValue('tolerance_0'), $form->getValue('tolerance_1'), $form->getValue('tolerance_2'), $form->getValue('tolerance_3'), $form->getValue('tolerance_4')
                    ));

            //$trajet->setEtatAvantBascule($val_temp);

            /*
              //gestion du véhicule si celui-ci diffère de la liste de vehicule existante
              if ($form->getValue('id_vehicule_mem') == 0) {//le covoitureur n'a pas de vehicule enregistre
              $vehicule = new CovoitureurVehicule();

              $trajet->setVehicule($vehicule->setCovoitVehiculeId($form->getValue('vehicule_marque'), $val_temp, $this->getUser()->getAttribute('id_covoitureur')));
              //$trajet->setVehicule($vehicule->setCovoitVehicule($form->getValue('vehicule_marque'),$form->getValue('vehicule_modele'),$form->getValue('covoitureur')));
              } else {//le covoitureur a deja au moins un vehicule enregistre
              if ($form->getValue('marque_vehicule_mem') != $form->getValue('vehicule_marque')
              && $form->getValue('marque_vehicule_mem') != $val_temp) {//le vehicule selectionner differe du vehiudle de base du covoiturereur
              $vehicule = new CovoitureurVehicule();
              //$trajet->setVehicule($vehicule->setCovoitVehicule($form->getValue('vehicule_marque'),$form->getValue('vehicule_modele'),$form->getValue('covoitureur')));
              //un vehicule correspond deja dans la liste du covoitureur
              if ($vehicule->getCovoitVehiculeId($form->getValue('vehicule_marque'), $val_temp, $this->getUser()->getAttribute('id_covoitureur')) != 0) {
              $trajet->setVehicule($vehicule->getCovoitVehiculeId($form->getValue('vehicule_marque'), $val_temp, $this->getUser()->getAttribute('id_covoitureur')));
              } else {//nouveau vehicule
              $vehicule = new CovoitureurVehicule();

              $trajet->setVehicule($vehicule->setCovoitVehiculeId($form->getValue('vehicule_marque'), $val_temp, $this->getUser()->getAttribute('id_covoitureur')));
              }
              } else {//le vehicule st celui du covoitureur
              $trajet->setVehicule($form->getValue('id_vehicule_mem'));
              }
              }
             */

            $vehicule = new CovoitureurVehicule();
            //$vehicule->setIdMarque($form->getValue('vehicule_marque'));
            //$vehicule->setIdModele($form->getValue('vehicule_modele'));
            //$vehicule->setIdUtilisateur($trajet->getIdUtilisateur());
            //$vehicule->save();
            //$trajet->setVehicule($vehicule->setCovoitVehiculeId($form->getValue('vehicule_marque'), $val_temp, $IdUtil));
            if ($form->getValue('vehicule') != '') {
                $trajet->setVehicule($form->getValue('vehicule'));
            } else {
                $trajet->setVehicule($vehicule->setCovoitVehiculeId($form->getValue('vehicule_marque'), $form->getValue('vehicule_modele_id'), $trajet->getIdUtilisateur()));
            }


            $trajet->save();
            $this->getUser()->setFlash('notice', sprintf('Votre trajet vient d\'être enregistré.'));
            // $cp_trajet = 
            //$this->redirect('trajet/listeTrajetCovoitureur');
            $this->setTemplate('envoiMail');
        }
    }

    public function executeListVehiculeModeleParMarque(sfWebRequest $request) {
        //passage de la marque du véhicule
        $this->idmarque = $request->getParameter('idmarque');

        //passage du nom et id du composant formulaire
        $this->idComposantForm = $request->getParameter('idComposantForm');
        $this->nomComposantForm = $request->getParameter('nomComposantForm');

        //$this->setLayout(false);
        //$vehiculeModeles = Doctrine_Core::getTable('VehiculeModele')->getVehiculeModeleListByMarque($request->getParameter('idmarque'));
        $vehiculeModeles = Doctrine_Core::getTable('VehiculeModele')->getVehiculeModeleListByMarque($this->idmarque);

        $this->tab_modele = array();
        $this->tab_modele[''] = '';
        foreach ($vehiculeModeles as $vehiculeModele) {
            $this->tab_modele[$vehiculeModele['id_modele']] = $vehiculeModele['nom_modele'];
        }
        $this->setLayout(false);
    }

    //liste les trajets équipagés liés à un covoitureur
    public function executeListeTrajetEquipageCovoitureur(sfWebRequest $request) {
        $this->mesTrajets = Doctrine::getTable('Trajet')->getEquipageListeTrajetCovoitureur($this->getUser()->getAttribute('id_covoitureur'));
    }
    
}
