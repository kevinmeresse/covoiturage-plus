<?php

/**
 * trajet actions.
 *
 * @package    roulezmalin_v3
 * @subpackage trajet
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class trajetActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {


        $this->forward('trajet', 'list');
    }

    public function executeShow(sfWebRequest $request) {
        $this->trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet')));
        $this->forward404Unless($this->trajet);

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }

    public function executeList(sfWebRequest $request) {
       /*
        $this->trajet = new Trajet();

        //récupération des éléments du formulaire
        //tableau des parametres passé en autocomplétion
        //initialisation des parametres
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = '';
        $this->tab_ville_autoc['destination_ville'] = '';

        //gestion de la pagination pour les trajets
        //le parametre du nombre d'element affichée "app_max_trajet_list"
        // est géré dans app.yml
        $this->pager = new sfDoctrinePager(
                        'Trajet',
                        sfConfig::get('app_max_trajet_list')
        );
        //$this->pager->setQuery(Doctrine::getTable('Trajet')->createQuery('a'));
        $this->pager->setQuery(Doctrine::getTable('Trajet')->getTrajetSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        */

        //Gestion de l'alerte mail
        $this->formAlerte = new TrajetAlerteListForm();


        //tableau permettant de passer les élément de requete pour l'utilisation du pager
        $elemntRequete = array();

        $elemntRequete['form_type'] = 'avnc';
        $elemntRequete['depart_ville'] = '';
        $elemntRequete['destination_ville'] = '';
        $elemntRequete['id_etablissement'] = '';
        $elemntRequete['id_type_trajet'] = '';
        $elemntRequete['id_evenement'] = '';
        $elemntRequete['horaire_id'] = '';
        $elemntRequete['secteur_id'] = '';
        $elemntRequete['depart_autre_lieu'] = '';
        $elemntRequete['destination_autre_lieu'] = '';
        $elemntRequete['type_cov'] = '';
        $elemntRequete['heure_prise_min'] = '';
        $elemntRequete['heure_prise_max'] = '';
        $elemntRequete['heure_fin_min'] = '';
        $elemntRequete['heure_fin_max'] = '';
        $elemntRequete['depart_ville_rayon'] = '';
        $elemntRequete['inscrit'] = '';
        $elemntRequete['cp_type_action_statut_id'] = '';
        $elemntRequete['ville_etape'] = '';
        $elemntRequete['date_creation'] = '';
        $elemntRequete['date_creation_deb'] = '';
        $elemntRequete['date_creation_fin'] = '';

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
        $this->tab_ville_autoc['etablissement'] = '';
        $this->tab_ville_autoc['ville_etape'] = '';


        $this->value = $newForm["depart_ville"];

        $this->extract = 0;

        //traitement du formulaire simplifié
        //vérification du type de requete
        // si Post vient du formulaire
        // si get vient de l'url (passage par page)
        if ($request->isMethod(sfRequest::POST)) {//passage par Post (formulaire)

            /*             * ****************************************** */
            //traitement du formulaire
            /*             * ****************************************** */
            if ($newForm["form_type"] == 'avnc') {
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
                
                //récupération de la ville étape
                if ($newForm["ville_etape"] != '' && $newForm["ville_etape"] != 'Ville') {
                    $tabCpVille = $outil->recupCpLibelle($newForm["ville_etape"]);

                    if ($tabCpVille['error_type'] == 0) {
                        //$filtre["ville_etape"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                        $villeEtape = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                        $filtre["ville_etape"] = $villeEtape[0]["nom_ville"];
                        //$filtre["ville_etape"] = "DIJON";
                    } else {
                        //$filtre["ville_etape"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                        $filtre["ville_etape"] = "REIMS";
                    }
                } else {
                    $filtre["ville_etape"] = null;
                }

                
                
                
                
                $filtre["form_type"] = $newForm["form_type"];

                //récupération de l'entrprise
                /*
                if ($newForm["id_etablissement"] != '') {
                    $filtre["id_etablissement"] = $newForm["id_etablissement"];
                    $this->formAlerte->setDefault('id_etablissement', $newForm["id_etablissement"]);
                }
                 * 
                 */
                $valIdEtab = 0;
                //$filtre["id_etablissement"] = '';
                if ($newForm["etablissement"] != '') {
                    
                    //nettoyage du libelle pour suppression de la chaine (id=???)
                    $outil = New Util();
                    $etabExtrait = $outil->extractCpLibelle($newForm["etablissement"]);
                    
                    //recuperation des id etablissements sur recheche sur etablissement ou raison sociale
                    $etabExtraitId = Doctrine_Core::getTable('CpEtablissement')->getTabIdEtab2(null,$etabExtrait);
                    
                    $filtre["id_etablissement"] = $etabExtraitId;
                    $this->formAlerte->setDefault('id_etablissement', $etabExtraitId);
                    $valIdEtab = $etabExtraitId;
                }

                //récupération de l'horaire
                /*
                if ($newForm["horaire_id"] != '') {
                    $filtre["horaire_id"] = $newForm["horaire_id"];
                }


                //récupération du secteur
                if ($newForm["secteur_id"] != '') {
                    $filtre["secteur_id"] = $newForm["secteur_id"];
                }
                 *
                 */

                //récupération de l'évènement
                if ($newForm["id_evenement"] != '') {
                    $filtre["id_evenement"] = $newForm["id_evenement"];
                }

                //récupération du type de trajet
                if ($newForm["id_type_trajet"] != '') {
                    $filtre["id_type_trajet"] = $newForm["id_type_trajet"];
                }else{
                    $filtre["id_type_trajet"] = 0;
                }


                //récupération du lieu de départ
                if (isset ($newForm["depart_autre_lieu"]) && $newForm["depart_autre_lieu"] != '') {
                    $filtre["depart_autre_lieu"] = $newForm["depart_autre_lieu"];
                }

                //récupération du lieu de destination
                if (isset ($newForm["destination_autre_lieu"]) && $newForm["destination_autre_lieu"] != '') {
                    $filtre["destination_autre_lieu"] = $newForm["destination_autre_lieu"];
                }

                //récupération du type de covoitureur
                if ($newForm["type_cov"] != '') {
                    $filtre["type_cov"] = $newForm["type_cov"];
                }


                //récupération de la prise de service
                if ($newForm["heure_prise_min"] != '') {
                    $filtre["heure_prise_min"] = $newForm["heure_prise_min"];
                }

                //récupération de la pprise de service
                if ($newForm["heure_prise_max"] != '') {
                    $filtre["heure_prise_max"] = $newForm["heure_prise_max"];
                }

                //récupération de la prise de service
                if ($newForm["heure_fin_min"] != '') {
                    $filtre["heure_fin_min"] = $newForm["heure_fin_min"];
                }

                //récupération de la fin de service
                if ($newForm["heure_fin_max"] != '') {
                    $filtre["heure_fin_max"] = $newForm["heure_fin_max"];
                }
                
                //récupération de l'horaire specifique PSA
                if ($newForm["horaire_id"] != '') {
                    $filtre["horaire_id"] = $newForm["horaire_id"];
                }

                //récupération du secteur specifique PSA
                if ($newForm["secteur_id"] != '') {
                    $filtre["secteur_id"] = $newForm["secteur_id"];
                }

                //Gestion des rayons d'élargissement
                if ($newForm["depart_ville_rayon"] != '') {
                    $filtre["depart_ville_rayon"] = $newForm["depart_ville_rayon"];
                }
                
                
                if ($newForm["destination_ville_rayon"] != '') {
                    $filtre["destination_ville_rayon"] = $newForm["destination_ville_rayon"];
                }

                if ($newForm["inscrit"] != '') {
                    $filtre["inscrit"] = $newForm["inscrit"];
                }
                
                if ($newForm["cp_type_action_statut_id"] != '') {
                    $filtre["cp_type_action_statut_id"] = $newForm["cp_type_action_statut_id"];
                }
                
                /*
                if ($newForm["ville_etape"] != '') {
                    $filtre["ville_etape"] = $newForm["ville_etape"];
                }
                */
                
                if ($newForm["date_creation"]["day"] != '' && $newForm["date_creation"]["month"] != '' && $newForm["date_creation"]["year"] != '') {
                    $filtre["date_creation"] = array("day" => $newForm["date_creation"]["day"],"month" => $newForm["date_creation"]["month"],"year" => $newForm["date_creation"]["year"]);
                }
                
                if ($newForm["date_creation_deb"]["day"] != '' && $newForm["date_creation_deb"]["month"] != '' && $newForm["date_creation_deb"]["year"] != '') {
                    //$filtre["date_creation_deb"] = array("day" => $elemntRequete["date_creation_deb"]["day"],"month" => $elemntRequete["date_creation_deb"]["month"],"year" => $elemntRequete["date_creation_deb"]["year"]);
                    $filtre["date_creation_deb"] = date("Y-m-d H:i:s", mktime(
                                        00, 00, 00, $newForm['date_creation_deb']['month'], $newForm['date_creation_deb']['day'], $newForm['date_creation_deb']['year']));
                }
                
                if ($newForm["date_creation_fin"]["day"] != '' && $newForm["date_creation_fin"]["month"] != '' && $newForm["date_creation_fin"]["year"] != '') {
                    //$filtre["date_creation_fin"] = array("day" => $elemntRequete["date_creation_fin"]["day"],"month" => $elemntRequete["date_creation_fin"]["month"],"year" => $elemntRequete["date_creation_fin"]["year"]);
                    $filtre["date_creation_fin"] = date("Y-m-d H:i:s", mktime(
                                        23, 59, 59, $newForm['date_creation_fin']['month'], $newForm['date_creation_fin']['day'], $newForm['date_creation_fin']['year']));
                }

                //element pour le formulaire
                $this->tab_ville_autoc['depart_ville']      = $newForm['depart_ville'];
                $this->tab_ville_autoc['destination_ville'] = $newForm['destination_ville'];
                $this->tab_ville_autoc['etablissement']     = $newForm["etablissement"];
                $this->tab_ville_autoc['ville_etape']       = $newForm["ville_etape"];

                //génération des élément à passer en session pour regenérer la requete à l'aide du pager
                $elemntRequete['form_type']                 = 'avnc';
                $elemntRequete['depart_ville']              = $newForm["depart_ville"];
                $elemntRequete['destination_ville']         = $newForm["destination_ville"];
                $elemntRequete['id_etablissement']          = $valIdEtab;
                $elemntRequete['etablissement']             = $newForm["etablissement"];
                $elemntRequete['id_evenement']              = $newForm["id_evenement"];
                $elemntRequete['id_type_trajet']            = $newForm["id_type_trajet"];
                $elemntRequete['horaire_id']                = $newForm["horaire_id"];
                $elemntRequete['secteur_id']                = $newForm["secteur_id"];
                $elemntRequete['depart_autre_lieu']         = isset ($newForm["depart_autre_lieu"]) ?  $newForm["depart_autre_lieu"]: '' ;
                $elemntRequete['destination_autre_lieu']    = isset ($newForm["destination_autre_lieu"]) ?  $newForm["destination_autre_lieu"]: '';
                $elemntRequete['type_cov']                  = $newForm["type_cov"];
                $elemntRequete['heure_prise_min']           = $newForm["heure_prise_min"];
                $elemntRequete['heure_prise_max']           = $newForm["heure_prise_max"];
                $elemntRequete['heure_fin_min']             = $newForm["heure_fin_min"];
                $elemntRequete['heure_fin_max']             = $newForm["heure_fin_max"];
                $elemntRequete['depart_ville_rayon']        = $newForm["depart_ville_rayon"];
                $elemntRequete['destination_ville_rayon']   = $newForm["destination_ville_rayon"];
                $elemntRequete['inscrit']                   = $newForm["inscrit"];
                $elemntRequete['cp_type_action_statut_id']  = $newForm["cp_type_action_statut_id"];
                $elemntRequete['ville_etape']               = $newForm["ville_etape"];
                $elemntRequete['date_creation']['day']      = $newForm["date_creation"]['day'];
                $elemntRequete['date_creation']['month']    = $newForm["date_creation"]['month'];
                $elemntRequete['date_creation']['year']     = $newForm["date_creation"]['year'];
                $elemntRequete['date_creation_deb']['day']      = $newForm["date_creation_deb"]['day'];
                $elemntRequete['date_creation_deb']['month']    = $newForm["date_creation_deb"]['month'];
                $elemntRequete['date_creation_deb']['year']     = $newForm["date_creation_deb"]['year'];
                $elemntRequete['date_creation_fin']['day']      = $newForm["date_creation_fin"]['day'];
                $elemntRequete['date_creation_fin']['month']    = $newForm["date_creation_fin"]['month'];
                $elemntRequete['date_creation_fin']['year']     = $newForm["date_creation_fin"]['year'];

                //insertion du tableau de requete en session
                $this->getUser()->setAttribute('elemntRequete', $elemntRequete);
            }
        } else {//passage par GET (pager)
            //récupération des élément de requete de la session
            $elemntRequete = $this->getUser()->getAttribute('elemntRequete');

            $this->getUser()->setAttribute('formRequete', 'GET');


            if ($elemntRequete['form_type'] == 'avnc')  {//traitement du formulaire avancé
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
                
                //récupération de la ville étape
                /*
                if ($elemntRequete["ville_etape"] != '') {
                    $tabCpVille = $outil->recupCpLibelle($elemntRequete["ville_etape"]);

                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["ville_etape"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["ville_etape"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["ville_etape"] = null;
                }
                 * 
                 */
                

                $filtre["form_type"] = $elemntRequete['form_type'];


                //Gestion des rayons d'élargissement
                if ($elemntRequete["depart_ville_rayon"] != '') {
                    $filtre["depart_ville_rayon"] = $elemntRequete["depart_ville_rayon"];
                }

                if ($elemntRequete["destination_ville_rayon"] != '') {
                    $filtre["destination_ville_rayon"] = $elemntRequete["destination_ville_rayon"];
                }


                $valIdEtab = 0;
                //$filtre["id_etablissement"] = '';
                //récupération de l'entrprise
                if ($elemntRequete["id_etablissement"] != '') {
                    $filtre["id_etablissement"] = $elemntRequete["id_etablissement"];
                    $valIdEtab = $elemntRequete["id_etablissement"];
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
                if ($elemntRequete["id_evenement"] != '') {
                    $filtre["id_evenement"] = $elemntRequete["id_evenement"];
                }

                //récupération du type de trajet
                if ($elemntRequete["id_type_trajet"] != '') {
                    $filtre["id_type_trajet"] = $elemntRequete["id_type_trajet"];
                }


                //récupération du lieu de départ
                if ($elemntRequete["depart_autre_lieu"] != '') {
                    $filtre["depart_autre_lieu"] = $elemntRequete["depart_autre_lieu"];
                }

                //récupération du lieu de destination
                if ($elemntRequete["destination_autre_lieu"] != '') {
                    $filtre["destination_autre_lieu"] = $elemntRequete["destination_autre_lieu"];
                }

                //récupération du type de covoitureur
                if ($elemntRequete["type_cov"] != '') {
                    $filtre["type_cov"] = $elemntRequete["type_cov"];
                }


                //récupération de la rise de service
                if ($elemntRequete["heure_prise_min"] != '') {
                    $filtre["heure_prise_min"] = $elemntRequete["heure_prise_min"];
                }

                //récupération de la prise de service
                if ($elemntRequete["heure_prise_max"] != '') {
                    $filtre["heure_prise_max"] = $elemntRequete["heure_prise_max"];
                }

                //récupération de la prise de service
                if ($elemntRequete["heure_fin_min"] != '') {
                    $filtre["heure_fin_min"] = $elemntRequete["heure_fin_min"];
                }

                //récupération de la fin de service
                if ($elemntRequete["heure_fin_max"] != '') {
                    $filtre["heure_fin_max"] = $elemntRequete["heure_fin_max"];
                }
                
                if ($elemntRequete["inscrit"] != '') {
                    $filtre["inscrit"] = $elemntRequete["inscrit"];
                }
                
                if ($elemntRequete["cp_type_action_statut_id"] != '') {
                    $filtre["cp_type_action_statut_id"] = $elemntRequete["cp_type_action_statut_id"];
                }
                
                
                if ($elemntRequete["date_creation"]["day"] != '' && $elemntRequete["date_creation"]["month"] != '' && $elemntRequete["date_creation"]["year"] != '') {
                    $filtre["date_creation"] = array("day" => $elemntRequete["date_creation"]["day"],"month" => $elemntRequete["date_creation"]["month"],"year" => $elemntRequete["date_creation"]["year"]);
                }
                
                if ($elemntRequete["date_creation_deb"]["day"] != '' && $elemntRequete["date_creation_deb"]["month"] != '' && $elemntRequete["date_creation_deb"]["year"] != '') {
                    //$filtre["date_creation_deb"] = array("day" => $elemntRequete["date_creation_deb"]["day"],"month" => $elemntRequete["date_creation_deb"]["month"],"year" => $elemntRequete["date_creation_deb"]["year"]);
                    $filtre["date_creation_deb"] = date("Y-m-d H:i:s", mktime(
                                        00, 00, 00, $elemntRequete['date_creation_deb']['month'], $elemntRequete['date_creation_deb']['day'], $elemntRequete['date_creation_deb']['year']));
                }
                
                if ($elemntRequete["date_creation_fin"]["day"] != '' && $elemntRequete["date_creation_fin"]["month"] != '' && $elemntRequete["date_creation_fin"]["year"] != '') {
                    //$filtre["date_creation_fin"] = array("day" => $elemntRequete["date_creation_fin"]["day"],"month" => $elemntRequete["date_creation_fin"]["month"],"year" => $elemntRequete["date_creation_fin"]["year"]);
                    $filtre["date_creation_fin"] = date("Y-m-d H:i:s", mktime(
                                        23, 59, 59, $elemntRequete['date_creation_fin']['month'], $elemntRequete['date_creation_fin']['day'], $elemntRequete['date_creation_fin']['year']));
                }

                //element pour le formulaire
                $this->tab_ville_autoc['depart_ville']      = $elemntRequete['depart_ville'];
                $this->tab_ville_autoc['destination_ville'] = $elemntRequete['destination_ville'];
                $this->tab_ville_autoc['etablissement']     = $elemntRequete['etablissement'];
                $this->tab_ville_autoc['ville_etape']       = $elemntRequete['ville_etape'];
            }
        }



        $filtre["all"] = true;


        $this->filtre = $filtre;
        $this->pager = new sfDoctrinePager(
                        'Trajet',
                        sfConfig::get('app_max_trajet_list'));

        //$this->pager = new sfDoctrinePager('Trajet',5);
        $this->pager->setQuery(Doctrine::getTable('Trajet')->listingBo($filtre," trajet.id_trajet DESC ",  10,  "BO"));
        //$this->pager->setQuery(Doctrine::getTable('Trajet')->createQuery());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();


    }

    /*
     * Nouveau trajet
     */

    public function executeNew(sfWebRequest $request) {
        $trajet = new Trajet();

        //insertion de l'id_site
        $trajet->setIdSite(sfConfig::get('sf_id_site_client'));

        //génération de la clé
        $outil = New Util();
        $trajet->setCle($outil->genereCle('', ''));

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = '';
        $this->tab_ville_autoc['destination_ville'] = '';
        $this->tab_ville_autoc['etape1_ville'] = '';
        $this->tab_ville_autoc['etape2_ville'] = '';
        $this->tab_ville_autoc['etape3_ville'] = '';
        $this->tab_ville_autoc['etape4_ville'] = '';
        $this->tab_ville_autoc['etape5_ville'] = '';
        $this->tab_ville_autoc['covoitureur'] = '';

        $this->form = new TrajetForm($trajet);

        //indicateur que le covoitueur n'est pas connu
        $this->tab_ville_autoc['covoitureur_ident'] = 0;
        //$this->covoitureur_ident = 0;
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $trajet = new Trajet();

        //gestion de la date de modification
        $now = date("Y-m-d H:i:s");
        $trajet->setDateCreation($now);
        $trajet->setDateModification($now);

        //insertion de l'id_site
        $trajet->setIdSite(sfConfig::get('sf_id_site_client'));

        //génération de la clé
        $outil = New Util();
        $trajet->setCle($outil->genereCle('', ''));

        //forcage du type de trajet => régulier
        //$trajet->setIdTypeTrajet(1);

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
        //$this->tab_ville_autoc['covoitureur'] = $formnew['covoitureur'];

        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($formnew['id_utilisateur']));

        $this->tab_ville_autoc['covoitureur'] = $covoitureur->getNom() . " " . $covoitureur->getPrenom() . " (" . $covoitureur->getIdUtilisateur() . ")";

        $trajet->setIdUtilisateur($formnew['id_utilisateur']);
        //$form->bind($request->getParameter($form->getName()), $request->getFiles($this->form->getName()));

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }


        $this->form = new TrajetForm($trajet);


        $this->depart_ville1 = $this->form->getValue('depart_ville');
        $this->depart_ville2 = $this->form->getValue('trajet[depart_ville]');
        $this->depart_ville3 = $this->form->getObject()->getDepartVille();

        $this->processForm($request, $this->form);

        //$this->depart_ville = $this->form->getValue('depart_ville');
        //$this->depart_ville = $this->form->getValue('trajet[depart_ville]');
        //$this->depart_ville = $this->form->getObject()->getDepartVille();

        $this->testvalue = "OK";

        $this->setTemplate('newCovoitureurTrajet');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));

        //mise en forme de la partie "tolérance"
        $toleranceTab = $trajet->getCheckboxTolerance();
        
       // $this->testMax = $request->getParameter('testMax');


        $this->form = new TrajetForm($trajet);

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = $trajet->getDepartVille();
        $this->tab_ville_autoc['destination_ville'] = $trajet->getDestinationVille();
        $this->tab_ville_autoc['etape1_ville'] = $trajet->getEtape1Ville();
        $this->tab_ville_autoc['etape2_ville'] = $trajet->getEtape2Ville();
        $this->tab_ville_autoc['etape3_ville'] = $trajet->getEtape3Ville();
        $this->tab_ville_autoc['etape4_ville'] = $trajet->getEtape4Ville();
        $this->tab_ville_autoc['etape5_ville'] = $trajet->getEtape5Ville();

        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($trajet->getIdUtilisateur()));

        $this->tab_ville_autoc['covoitureur'] = $covoitureur->getNom() . " " . $covoitureur->getPrenom() . " (" . $covoitureur->getIdUtilisateur() . ")";


        $this->depart_ville = $trajet->getDepartVille();
        $this->destination_ville = $trajet->getDestinationVille();
        $this->id_trajet = $request->getParameter('id_trajet');
        $this->covoitureur = $trajet->getCovoitureur()->getNom() . " " . $trajet->getCovoitureur()->getPrenom() . " (" . $trajet->getCovoitureur()->getIdUtilisateur() . ")";
        $this->id_utilisateur = $trajet->getCovoitureur()->getIdUtilisateur();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
        
        //lundi_prise_service_min
        //$this->form->setDefault('lundi_prise_service_min', '07:00');
        //$this->form->setDefaults(array('CpTrajet' => array('lundi_prise_service_min' => '07:00')));
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));

        //récupération des paramètres passés (dans la requete)
        $tabrequest = $request->getParameter('trajet');


        /*
         * mise à jour des valeurs liées aux informations du formulaire
         */



        //gestion de la date de modification
        $now = date("Y-m-d H:i:s");
        $trajet->setDateModification($now);
        
        //gestion de la date de dépuvlication
        //$trajet->setDateDepublication($now);
        
        $trajet->setDateVerification($now);

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }



        $this->form = new TrajetForm($trajet);

        $this->processForm($request, $this->form);

        $this->depart_ville = $trajet->getDepartVille();
        $this->destination_ville = $trajet->getDestinationVille();
        $this->id_trajet = $request->getParameter('id_trajet');
        $this->covoitureur = $trajet->getCovoitureur()->getNom() . " " . $trajet->getCovoitureur()->getPrenom() . " (" . $trajet->getCovoitureur()->getIdUtilisateur() . ")";
        //$this->id_utilisateur = $trajet->getCovoitureur()->getIdUtilisateur();
        $this->id_utilisateur = $trajet->getIdUtilisateur();

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = $trajet->getDepartVille();
        $this->tab_ville_autoc['destination_ville'] = $trajet->getDestinationVille();
        $this->tab_ville_autoc['etape1_ville'] = $trajet->getEtape1Ville();
        $this->tab_ville_autoc['etape2_ville'] = $trajet->getEtape2Ville();
        $this->tab_ville_autoc['etape3_ville'] = $trajet->getEtape3Ville();
        $this->tab_ville_autoc['etape4_ville'] = $trajet->getEtape4Ville();
        $this->tab_ville_autoc['etape5_ville'] = $trajet->getEtape5Ville();

        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($trajet->getIdUtilisateur()));
        $this->tab_ville_autoc['covoitureur'] = $covoitureur->getNom() . " " . $covoitureur->getPrenom() . " (" . $covoitureur->getIdUtilisateur() . ")";


        $this->setTemplate('edit');
        //$this->forward('trajet', 'edit');
    }


    /*
     * suppression d'un trajet et des MER associées
     */
    public function executeDelete(sfWebRequest $request) {

        //suppression des trajets et MER liées au trajet
        try {
            //récupération des id_mer et suppression
            $liste_mer_tab = array();
            $liste_mer_tab = Doctrine_Core::getTable('TrajetMiseEnRelation')->getListeMerTrajet($request->getParameter('id_trajet'));
            if(count($liste_mer_tab) != 0){
                //suppression des cp_trajets
                Doctrine_Query::create()
                        ->delete('TrajetMiseEnRelation ct')
                        ->whereIn('ct.id_trajet_mise_en_relation',$liste_mer_tab)
                        ->execute()
                        ;
            }

        } catch (Doctrine_Validator_Exception $e) {
            echo "erreur à la suppression du trajet associée à l'inscrit";
        }

        //suppression du trajet
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_utilisateur')));
        $trajet->delete();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->message = "le trajet a été supprimé";
        //$this->redirect('covoitureur/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }

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
            //$trajet->setDateDepublication($now);
            if($trajet->getIdTypeTrajet() == 2){ // trajet occasionnel
                if($trajet->getJourUniqueDate() != NULL){ // la date de trajet est renseignée
                    if($trajet->getDateDepublication() == '0000-00-00' || $trajet->getDateDepublication() == '' || $trajet->getDateDepublication() == NULL){
                        $trajet->setDateDepublication(date("Y-m-d", strtotime('+1 day',strtotime($trajet->getJourUniqueDate()))));
                    }
                }
            }

            //gestion des tolérances
            $trajet->setTolerance($trajet->setCheckboxTolerance(
                            $form->getValue('tolerance_0'), $form->getValue('tolerance_1'), $form->getValue('tolerance_2'), $form->getValue('tolerance_3'), $form->getValue('tolerance_4')
                    ));
            
            


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

            $webService = 'http://maps.google.com/maps/api/directions/xml?origin=' . $outil->extractCpLibelle($form->getValue('depart_ville')) . '&destination=' . $outil->extractCpLibelle($form->getValue('destination_ville')) . '&sensor=true';
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
            /*
              $IdUtil = $outil->extractIdUtilisateur($form->getValue('covoitureur'));
              if ($chaine != '') {
              $trajet->setIdUtilisateur($IdUtil);
              }
             * 
             */

            $vehicule = new CovoitureurVehicule();
            //$vehicule->setIdMarque($form->getValue('vehicule_marque'));
            //$vehicule->setIdModele($form->getValue('vehicule_modele'));
            //$vehicule->setIdUtilisateur($trajet->getIdUtilisateur());
            //$vehicule->save();
            //$trajet->setVehicule($vehicule->setCovoitVehiculeId($form->getValue('vehicule_marque'), $val_temp, $IdUtil));
            $trajet->setVehicule($vehicule->setCovoitVehiculeId(
                            $form->getValue('vehicule_marque'), $form->getValue('vehicule_modele'), $trajet->getIdUtilisateur()));



            $trajet->save();
            
            $valEmbed = $form->getValue('CpTrajet');
            $this->testMax = $valEmbed["lundi_prise_service_max"];

           //$this->redirect('trajet/edit?id_trajet=' . $trajet->getIdTrajet().'&testMax='.$testMax);

            if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                $this->redirect('trajet/show?popup=1&id_trajet=' . $trajet->getIdTrajet());
            } else {
                $this->redirect('trajet/show?id_trajet=' . $trajet->getIdTrajet());
            }
           

            //$this->setTemplate('test');

        }
    }

    /*
     * fonction d'autocomplétion pour la ville
     */

    public function executeAutocomplete(sfWebRequest $request) {
        //récupération du parametre passé par ajax
        $value = $request->getParameter('q');
        $type = $request->getParameter('target');

        $trajetville = new Trajet();

        //$this->results = "test ".$param2;
        $this->results = $trajetville->getAutocomplete($type, $value);
        //return sfView::NONE;        
    }

    /*     * ********************************************************* */
    /*       Trajets pour équipages                             */
    /*     * ********************************************************* */

    /*
     * supprime la liaison entre un trajet et un équipage
     */

    public function executeDeleteAssocUnTrajetEquipage(sfWebRequest $request) {
        //récupération de la liste des trajets associés à l'équipage

        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));
        
        //récupération de l'id du covoitureur
        $covoitureurId = $trajet->getIdUtilisateur();
        
        //verification du statut du trajet et si différent de "Refus", modification
        //if($trajet->getCpTypeActionStatutId() != sfConfig::get('app_id_type_act_statut_refus')){
          //  $trajet->setCpTypeActionStatutId(sfConfig::get('app_id_type_act_statut_refus'));
        //}
        
        //forcage du statut en "a contacter"
        $trajet->setCpTypeActionStatutId(sfConfig::get('app_id_type_act_statut_acontacter'));
        
        //mise à zéro de id_équipage
        $trajet->setIdEquipage(0);
        $trajet->save();
        
        //gestion de la date de modification et de la date de création            
        $now = date("Y-m-d H:i:s");
        
       //création d'une action signalant le détachement du trajet de l'équipage
        if ($request->getParameter('id_equipage') != 0 && !is_null($request->getParameter('id_equipage'))) {
            $equipageId = $request->getParameter('id_equipage');
        }else{
            $equipageId = "non defini";
        }
        
        $message = sfConfig::get('app_detail_detach_trajet_equipage')." (trajet: ".$request->getParameter('id_trajet').") (equipage: ".$equipageId .")";
        
        $actionInscrit = new CpActionCv();
        $actionInscrit->setCpActionCvDetail($message);
        $actionInscrit->setCpActionCvDateCreation($now);
        $actionInscrit->setCpActionCvDateModification($now);
        $actionInscrit->setCpActionCvCpTypeActionId(sfConfig::get('app_detach_trajet_action_id'));
        $actionInscrit->setCpActionCvCovoitureurId($covoitureurId);
        $actionInscrit->setCpActionCvUserId($this->getUser()->getGuardUser()->getId());
        $actionInscrit->setCpActionCvTrajetId($request->getParameter('id_trajet'));
        $actionInscrit->save();
        
        
        //envoi mail inscrit (covoitureur) => a ne pas implementer
        
        //sélection du layout de popup en cas de demande d'affichage en popup
        $popup = 0;
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $popup = 1;
        }

        //si un id_equipage est fourni , redirection vers l'quipage en edition, 
        //  sinon redirection vers la liste des équipage
        if ($request->getParameter('id_equipage') != 0 && !is_null($request->getParameter('id_equipage'))) {
            $this->redirect('equipage/edit?popup='.$popup.'&id_equipage=' . $request->getParameter('id_equipage'));
        } else {
            $this->redirect('equipage/list?popup='.$popup);
        }
    }

    /*
     * associe un trajet à un équipage
     */

    public function executeTrajetEquipageAjout(sfWebRequest $request) {

        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));

        //insertion de l'équipage
        $trajet->setIdEquipage($request->getParameter('id_equipage'));
        $trajet->save();

        /*         * ************************************* */
        /*   creation de la MER correspondante */
        /*         * ************************************* */
        //gestion de la date de modification et de la date de création            
        $now = date("Y-m-d H:i:s");

        $mer = new TrajetMiseEnRelation();
        $mer->setDateCreation($now);
        $mer->setDateModification($now);
        $mer->setDateEnvoi($now);

        //génération de la clé
        $outil = New Util();
        $mer->setCle($outil->genereCle('', ''));

        $mer->setEtat(0);
        //$mer->setEtat(sfConfig::get('sf_desc_ind__mer_0_val'));


        $mer->setIdSite(sfConfig::get('sf_id_site_client'));

        $mer->setIdTrajet($request->getParameter('id_trajet'));
        //$mer->setIdTrajetCreateur($trajet->getIdUtilisateur());
        $mer->setIdTrajetCreateur($trajet->getEquipage()->getIdCreateur());
        $mer->setIdDemandeur($trajet->getIdUtilisateur());

        $mer->setMessage("BO - MER générée par l'ajout d'un trajet (" . $request->getParameter('id_trajet') . ") à un équipage (" . $request->getParameter('id_equipage') . ")");

        $mer->save();
        
        /*         * ************************************* */
        /*   creation de l'action pour l'inscrit  */
        /*         * ************************************* */
        $actionCv = new CpActionCv();

        //gestion de la date de modification
        $actionCv->setCpActionCvDateCreation($now);
        $actionCv->setCpActionCvDateModification($now);

        $message = sfConfig::get('app_detail_attach_trajet_equipage')." (trajet: ".$trajet->getIdTrajet().") (equipage: ".$request->getParameter('id_equipage') .")";

        $actionCv->setCpActionCvCpTypeActionId(sfConfig::get('app_attach_trajet_action_id'));
        $actionCv->setCpActionCvDetail($message);

        $actionCv->setCpActionCvCovoitureurId($trajet->getIdUtilisateur());
        $actionCv->setCpActionCvUserId($this->getUser()->getGuardUser()->getId());

        $actionCv->setCpActionCvTrajetId($trajet->getIdTrajet());

        $actionCv->save();


        /*         * ************************************* */
        /*   creation du mail  */
        /*         * ************************************* */

        //covoitureur initial  
        $this->forward404Unless($covoitureur_init = Doctrine_Core::getTable('Covoitureur')->find(array($trajet->getIdUtilisateur())), sprintf('Object covoitureur does not exist (%s).', $trajet->getIdUtilisateur()));


        //Preparation du mail                
        $params['subject'] = "Rattachement à équipage";
        $params['to'] = $covoitureur_init->getMail();
        $params['from'] = sfConfig::get('sf_mail_envoi');
        $params["message"] = "Vous venez d\'être rattaché à un équipage";

        //envoi mail
        //$outil = New Util();
        //$outil->envoi_mail($this, "NouvelEquipageApresMer", $params);



        //si un id_equipage est fourni , redirection vers l'quipage en edition, 
        //  sinon redirection vers la liste des équipage
        if ($request->getParameter('id_equipage') != 0 && !is_null($request->getParameter('id_equipage'))) {
            $this->redirect('equipage/edit?id_equipage=' . $request->getParameter('id_equipage'));
        } else {
            $this->redirect('equipage/list');
        }
    }

    /*
     * liste les trajets qui répondent aux éléments de recherche fournis
     * (réponse au formulaire de recherche des trajets pour equipage)
     */

    public function executeListeTrajetPourEquipage(sfWebRequest $request) {
    
        
        //tableau permettant de passer les élément de requete pour l'utilisation du pager
        $elemntRequete = array();

        $elemntRequete['form_type'] = 'avnc';
        $elemntRequete['depart_ville'] = '';
        $elemntRequete['destination_ville'] = '';
        $elemntRequete['id_etablissement'] = '';
        $elemntRequete['id_type_trajet'] = '';
        $elemntRequete['id_evenement'] = '';
        $elemntRequete['horaire_id'] = '';
        $elemntRequete['secteur_id'] = '';
        $elemntRequete['depart_autre_lieu'] = '';
        $elemntRequete['destination_autre_lieu'] = '';
        $elemntRequete['type_cov'] = '';
        $elemntRequete['heure_prise_min'] = '';
        $elemntRequete['heure_prise_max'] = '';
        $elemntRequete['heure_fin_min'] = '';
        $elemntRequete['heure_fin_max'] = '';
        $elemntRequete['depart_ville_rayon'] = '';
        $elemntRequete['inscrit'] = '';
        $elemntRequete['cp_type_action_statut_id'] = '';
        $elemntRequete['ville_etape'] = '';
        $elemntRequete['date_creation'] = '';
        //$elemntRequete['date_creation_deb'] = '';
        //$elemntRequete['date_creation_fin'] = '';
        
        $this->equipage = 0;

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
        $this->tab_ville_autoc['etablissement'] = '';
        $this->tab_ville_autoc['ville_etape'] = '';


        $this->value = $newForm["depart_ville"];

        $this->extract = 0;

        //traitement du formulaire simplifié
        //vérification du type de requete
        // si Post vient du formulaire
        // si get vient de l'url (passage par page)
        if ($request->isMethod(sfRequest::POST)) {//passage par Post (formulaire)

            /*             * ****************************************** */
            //traitement du formulaire
            /*             * ****************************************** */
            if ($newForm["form_type"] == 'avnc') {
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


                $this->id_equipage = $newForm["id_equipage"];

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
                
                //récupération de la ville étape
                if ($newForm["ville_etape"] != '' && $newForm["ville_etape"] != 'Ville') {
                    $tabCpVille = $outil->recupCpLibelle($newForm["ville_etape"]);

                    if ($tabCpVille['error_type'] == 0) {
                        //$filtre["ville_etape"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                        $villeEtape = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                        $filtre["ville_etape"] = $villeEtape[0]["nom_ville"];
                        //$filtre["ville_etape"] = "DIJON";
                    } else {
                        //$filtre["ville_etape"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                        $filtre["ville_etape"] = "REIMS";
                    }
                } else {
                    $filtre["ville_etape"] = null;
                }

                
                
                
                
                $filtre["form_type"] = $newForm["form_type"];

                //récupération de l'entrprise
                /*
                if ($newForm["id_etablissement"] != '') {
                    $filtre["id_etablissement"] = $newForm["id_etablissement"];
                    $this->formAlerte->setDefault('id_etablissement', $newForm["id_etablissement"]);
                }
                 * 
                 */
                $valIdEtab = 0;
                /*
                if ($newForm["etablissement"] != '') {
                    
                    
                    $outil = New Util();
                
                    //extraction des informations entre parenthese de l'établissement  (id de l'etab)
                    $etabExtraitId = $outil->extractIdCpEtablissement($newForm["etablissement"]);
                    //$this->etabId = $etabExtraitId;
                    
                    $filtre["id_etablissement"] = $etabExtraitId;
                    //$this->formAlerte->setDefault('id_etablissement', $etabExtraitId);
                    $valIdEtab = $etabExtraitId;
                }
                 * 
                 */
                if ($newForm["etablissement"] != '') {
                    
                    //nettoyage du libelle pour suppression de la chaine (id=???)
                    $outil = New Util();
                    $etabExtrait = $outil->extractCpLibelle($newForm["etablissement"]);
                    
                    //recuperation des id etablissements sur recheche sur etablissement ou raison sociale
                    $etabExtraitId = Doctrine_Core::getTable('CpEtablissement')->getTabIdEtab2(null,$etabExtrait);
                    
                    $filtre["id_etablissement"] = $etabExtraitId;
                    //$this->formAlerte->setDefault('id_etablissement', $etabExtraitId);
                    $valIdEtab = $etabExtraitId;
                }

                //récupération de l'horaire
                
                if ($newForm["horaire_id"] != '') {
                    $filtre["horaire_id"] = $newForm["horaire_id"];
                }


                //récupération du secteur
                if ($newForm["secteur_id"] != '') {
                    $filtre["secteur_id"] = $newForm["secteur_id"];
                }
                 

                //récupération de l'évènement
                if ($newForm["id_evenement"] != '') {
                    $filtre["id_evenement"] = $newForm["id_evenement"];
                }

                //récupération du type de trajet
                if ($newForm["id_type_trajet"] != '') {
                    $filtre["id_type_trajet"] = $newForm["id_type_trajet"];
                }


                //récupération du lieu de départ
                if (isset ($newForm["depart_autre_lieu"]) && $newForm["depart_autre_lieu"] != '') {
                    $filtre["depart_autre_lieu"] = $newForm["depart_autre_lieu"];
                }

                //récupération du lieu de destination
                if (isset ($newForm["destination_autre_lieu"]) && $newForm["destination_autre_lieu"] != '') {
                    $filtre["destination_autre_lieu"] = $newForm["destination_autre_lieu"];
                }

                //récupération du type de covoitureur
                if ($newForm["type_cov"] != '') {
                    $filtre["type_cov"] = $newForm["type_cov"];
                }


                //récupération de la prise de service
                if ($newForm["heure_prise_min"] != '') {
                    $filtre["heure_prise_min"] = $newForm["heure_prise_min"];
                }

                //récupération de la pprise de service
                if ($newForm["heure_prise_max"] != '') {
                    $filtre["heure_prise_max"] = $newForm["heure_prise_max"];
                }

                //récupération de la prise de service
                if ($newForm["heure_fin_min"] != '') {
                    $filtre["heure_fin_min"] = $newForm["heure_fin_min"];
                }

                //récupération de la fin de service
                if ($newForm["heure_fin_max"] != '') {
                    $filtre["heure_fin_max"] = $newForm["heure_fin_max"];
                }

                //Gestion des rayons d'élargissement
                if ($newForm["depart_ville_rayon"] != '') {
                    $filtre["depart_ville_rayon"] = $newForm["depart_ville_rayon"];
                }
                
                
                if ($newForm["destination_ville_rayon"] != '') {
                    $filtre["destination_ville_rayon"] = $newForm["destination_ville_rayon"];
                }

                if ($newForm["inscrit"] != '') {
                    $filtre["inscrit"] = $newForm["inscrit"];
                }
                
                if ($newForm["cp_type_action_statut_id"] != '') {
                    $filtre["cp_type_action_statut_id"] = $newForm["cp_type_action_statut_id"];
                }
                
                /*
                if ($newForm["ville_etape"] != '') {
                    $filtre["ville_etape"] = $newForm["ville_etape"];
                }
                */
                
                if ($newForm["date_creation"]["day"] != '' && $newForm["date_creation"]["month"] != '' && $newForm["date_creation"]["year"] != '') {
                    $filtre["date_creation"] = array("day" => $newForm["date_creation"]["day"],"month" => $newForm["date_creation"]["month"],"year" => $newForm["date_creation"]["year"]);
                }
                
                if ($newForm["date_creation_deb"]["day"] != '' && $newForm["date_creation_deb"]["month"] != '' && $newForm["date_creation_deb"]["year"] != '') {
                    //$filtre["date_creation_deb"] = array("day" => $elemntRequete["date_creation_deb"]["day"],"month" => $elemntRequete["date_creation_deb"]["month"],"year" => $elemntRequete["date_creation_deb"]["year"]);
                    $filtre["date_creation_deb"] = date("Y-m-d H:i:s", mktime(
                                        00, 00, 00, $newForm['date_creation_deb']['month'], $newForm['date_creation_deb']['day'], $newForm['date_creation_deb']['year']));
                }
                
                if ($newForm["date_creation_fin"]["day"] != '' && $newForm["date_creation_fin"]["month"] != '' && $newForm["date_creation_fin"]["year"] != '') {
                    //$filtre["date_creation_fin"] = array("day" => $elemntRequete["date_creation_fin"]["day"],"month" => $elemntRequete["date_creation_fin"]["month"],"year" => $elemntRequete["date_creation_fin"]["year"]);
                    $filtre["date_creation_fin"] = date("Y-m-d H:i:s", mktime(
                                        23, 59, 59, $newForm['date_creation_fin']['month'], $newForm['date_creation_fin']['day'], $newForm['date_creation_fin']['year']));
                }

                //element pour le formulaire
                $this->tab_ville_autoc['depart_ville']      = $newForm['depart_ville'];
                $this->tab_ville_autoc['destination_ville'] = $newForm['destination_ville'];
                $this->tab_ville_autoc['etablissement']     = $newForm["etablissement"];
                $this->tab_ville_autoc['ville_etape']       = $newForm["ville_etape"];

                //génération des élément à passer en session pour regenérer la requete à l'aide du pager
                $elemntRequete['form_type']                 = 'avnc';
                $elemntRequete['depart_ville']              = $newForm["depart_ville"];
                $elemntRequete['destination_ville']         = $newForm["destination_ville"];
                $elemntRequete['id_etablissement']          = $valIdEtab;
                $elemntRequete['etablissement']             = $newForm["etablissement"];
                $elemntRequete['id_evenement']              = $newForm["id_evenement"];
                $elemntRequete['id_type_trajet']            = $newForm["id_type_trajet"];
                $elemntRequete['horaire_id']                = $newForm["horaire_id"];
                $elemntRequete['secteur_id']                = $newForm["secteur_id"];
                $elemntRequete['depart_autre_lieu']         = isset ($newForm["depart_autre_lieu"]) ?  $newForm["depart_autre_lieu"]: '' ;
                $elemntRequete['destination_autre_lieu']    = isset ($newForm["destination_autre_lieu"]) ?  $newForm["destination_autre_lieu"]: '';
                $elemntRequete['type_cov']                  = $newForm["type_cov"];
                $elemntRequete['heure_prise_min']           = $newForm["heure_prise_min"];
                $elemntRequete['heure_prise_max']           = $newForm["heure_prise_max"];
                $elemntRequete['heure_fin_min']             = $newForm["heure_fin_min"];
                $elemntRequete['heure_fin_max']             = $newForm["heure_fin_max"];
                $elemntRequete['depart_ville_rayon']        = $newForm["depart_ville_rayon"];
                $elemntRequete['destination_ville_rayon']   = $newForm["destination_ville_rayon"];
                $elemntRequete['inscrit']                   = $newForm["inscrit"];
                $elemntRequete['cp_type_action_statut_id']  = $newForm["cp_type_action_statut_id"];
                $elemntRequete['ville_etape']               = $newForm["ville_etape"];
                $elemntRequete['date_creation']['day']      = $newForm["date_creation"]['day'];
                $elemntRequete['date_creation']['month']    = $newForm["date_creation"]['month'];
                $elemntRequete['date_creation']['year']     = $newForm["date_creation"]['year'];
                $elemntRequete['date_creation_deb']         = $newForm["date_creation_deb"];
                $elemntRequete['date_creation_fin']         = $newForm["date_creation_fin"];
                $elemntRequete['id_equipage']               = $newForm["id_equipage"];
                
                
                //passage du filtre pour l'utilisation, des partial etr du pager
                //$this->filtre_trans = $filtre;

                //insertion du tableau de requete en session
                $this->getUser()->setAttribute('elemntRequete', $elemntRequete);
            }
        } else {//passage par GET (pager)
            //récupération des élément de requete de la session
            $elemntRequete = $this->getUser()->getAttribute('elemntRequete');
            
            $this->getUser()->setAttribute('formRequete', 'GET');


            if ($elemntRequete['form_type'] == 'avnc')  {//traitement du formulaire avancé
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
                
                //récupération de la ville étape
                /*
                if ($elemntRequete["ville_etape"] != '') {
                    $tabCpVille = $outil->recupCpLibelle($elemntRequete["ville_etape"]);

                    if ($tabCpVille['error_type'] == 0) {
                        $filtre["ville_etape"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tabCpVille['cp'], $tabCpVille['ville']);
                    } else {
                        $filtre["ville_etape"] = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle('', $tabCpVille['ville']);
                    }
                } else {
                    $filtre["ville_etape"] = null;
                }
                 * 
                 */
                

                $filtre["form_type"] = $elemntRequete['form_type'];


                //Gestion des rayons d'élargissement
                if ($elemntRequete["depart_ville_rayon"] != '') {
                    $filtre["depart_ville_rayon"] = $elemntRequete["depart_ville_rayon"];
                }

                if ($elemntRequete["destination_ville_rayon"] != '') {
                    $filtre["destination_ville_rayon"] = $elemntRequete["destination_ville_rayon"];
                }


                $valIdEtab = 0;
                //récupération de l'entrprise
                if ($elemntRequete["id_etablissement"] != '') {
                    $filtre["id_etablissement"] = $elemntRequete["id_etablissement"];
                    $valIdEtab = $elemntRequete["id_etablissement"];
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
                if ($elemntRequete["id_evenement"] != '') {
                    $filtre["id_evenement"] = $elemntRequete["id_evenement"];
                }

                //récupération du type de trajet
                if ($elemntRequete["id_type_trajet"] != '') {
                    $filtre["id_type_trajet"] = $elemntRequete["id_type_trajet"];
                }


                //récupération du lieu de départ
                if ($elemntRequete["depart_autre_lieu"] != '') {
                    $filtre["depart_autre_lieu"] = $elemntRequete["depart_autre_lieu"];
                }

                //récupération du lieu de destination
                if ($elemntRequete["destination_autre_lieu"] != '') {
                    $filtre["destination_autre_lieu"] = $elemntRequete["destination_autre_lieu"];
                }

                //récupération du type de covoitureur
                if ($elemntRequete["type_cov"] != '') {
                    $filtre["type_cov"] = $elemntRequete["type_cov"];
                }


                //récupération de la rise de service
                if ($elemntRequete["heure_prise_min"] != '') {
                    $filtre["heure_prise_min"] = $elemntRequete["heure_prise_min"];
                }

                //récupération de la prise de service
                if ($elemntRequete["heure_prise_max"] != '') {
                    $filtre["heure_prise_max"] = $elemntRequete["heure_prise_max"];
                }

                //récupération de la prise de service
                if ($elemntRequete["heure_fin_min"] != '') {
                    $filtre["heure_fin_min"] = $elemntRequete["heure_fin_min"];
                }

                //récupération de la fin de service
                if ($elemntRequete["heure_fin_max"] != '') {
                    $filtre["heure_fin_max"] = $elemntRequete["heure_fin_max"];
                }
                
                if ($elemntRequete["inscrit"] != '') {
                    $filtre["inscrit"] = $elemntRequete["inscrit"];
                }
                
                if ($elemntRequete["cp_type_action_statut_id"] != '') {
                    $filtre["cp_type_action_statut_id"] = $elemntRequete["cp_type_action_statut_id"];
                }
                
                
                if ($elemntRequete["date_creation"]["day"] != '' && $elemntRequete["date_creation"]["month"] != '' && $elemntRequete["date_creation"]["year"] != '') {
                    $filtre["date_creation"] = array("day" => $elemntRequete["date_creation"]["day"],"month" => $elemntRequete["date_creation"]["month"],"year" => $elemntRequete["date_creation"]["year"]);
                }
                
                if ($elemntRequete["date_creation_deb"]["day"] != '' && $elemntRequete["date_creation_deb"]["month"] != '' && $elemntRequete["date_creation_deb"]["year"] != '') {
                    //$filtre["date_creation_deb"] = array("day" => $elemntRequete["date_creation_deb"]["day"],"month" => $elemntRequete["date_creation_deb"]["month"],"year" => $elemntRequete["date_creation_deb"]["year"]);
                    $filtre["date_creation_deb"] = date("Y-m-d H:i:s", mktime(
                                        00, 00, 00, $elemntRequete['date_creation_deb']['month'], $elemntRequete['date_creation_deb']['day'], $elemntRequete['date_creation_deb']['year']));
                }
                
                if ($elemntRequete["date_creation_fin"]["day"] != '' && $elemntRequete["date_creation_fin"]["month"] != '' && $elemntRequete["date_creation_fin"]["year"] != '') {
                    //$filtre["date_creation_fin"] = array("day" => $elemntRequete["date_creation_fin"]["day"],"month" => $elemntRequete["date_creation_fin"]["month"],"year" => $elemntRequete["date_creation_fin"]["year"]);
                    $filtre["date_creation_fin"] = date("Y-m-d H:i:s", mktime(
                                        23, 59, 59, $elemntRequete['date_creation_fin']['month'], $elemntRequete['date_creation_fin']['day'], $elemntRequete['date_creation_fin']['year']));
                }

                //element pour le formulaire
                $this->tab_ville_autoc['depart_ville']      = $elemntRequete['depart_ville'];
                $this->tab_ville_autoc['destination_ville'] = $elemntRequete['destination_ville'];
                $this->tab_ville_autoc['etablissement']     = $elemntRequete['etablissement'];
                $this->tab_ville_autoc['ville_etape']       = $elemntRequete['ville_etape'];
                $this->id_equipage                          = $elemntRequete['id_equipage'];
                
                $this->getUser()->setAttribute('elemntRequete', $elemntRequete);
                
                //passage du filtre pour l'utilisation, des partial etr du pager
                //$this->filtre_trans = $filtre_trans ;
                        
            }
        }



        $filtre["all"] = true;

/*
        $this->filtre = $filtre;
        
        $this->trajets = Doctrine::getTable('Trajet')
                ->listingBo($filtre," trajet.id_trajet DESC ",  10,  "BO")
                ->execute()
                ;
        
 * 
 */
        $this->filtre = $filtre;
        $this->pager = new sfDoctrinePager(
                        'Trajet',
                        sfConfig::get('app_max_trajet_list'));

        
        $this->pager->setQuery(Doctrine::getTable('Trajet')->listingBo($filtre," trajet.id_trajet DESC ",  10,  "BO"));
        
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        
 
    }
    

    

    /*
     * test du formulaire à la place de l'ajax
     */

    public function executeTestListeTrajetPourEquipage(sfWebRequest $request) {
        $this->form = new TrajetRecherchePourEquipageForm();
    }

    /*     * ********************************************************* */
    /*       Trajets pour covoitureurs spécifié                 */
    /*     * ********************************************************* */

    /*
     * méthode pour visualiser le détail d'un trajet avec le covoitureur associé
     */

    public function executeShowTrajetCovoitureur(sfWebRequest $request) {


        $this->trajet = Doctrine_Query::create()
                ->from('Trajet t')
                ->leftjoin('t.Covoitureur c')
                ->where('t.id_trajet = ?', $request->getParameter('id_trajet'))
                ->fetchOne();

        $this->forward404Unless($this->trajet);

        //
    }

    /*
     * méthode pour visualiser le détail d'un trajet avec le covoitureur associé
     * dans une popup
     */

    public function executeShowTrajetCovoitureurPopup(sfWebRequest $request) {


        $this->trajet = Doctrine_Query::create()
                ->from('Trajet t')
                ->leftjoin('t.Covoitureur c')
                ->where('t.id_trajet = ?', $request->getParameter('id_trajet'))
                ->fetchOne();

        $this->forward404Unless($this->trajet);

        //
        $this->setLayout('layout-popup');
    }

    /*
     *  Creation d'un trajet pour un covoitureur défni 
     */

    public function executeNewCovoitureurTrajet(sfWebRequest $request) {
        $trajet = new Trajet();


        //insertion de l'id_site
        $trajet->setIdSite(sfConfig::get('sf_id_site_client'));

        //insertion de l'id_covoitureur
        $trajet->setIdUtilisateur($request->getParameter('id_utilisateur'));

        //génération de la clé
        $outil = New Util();
        $trajet->setCle($outil->genereCle('', ''));

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = '';
        $this->tab_ville_autoc['destination_ville'] = '';
        $this->tab_ville_autoc['etape1_ville'] = '';
        $this->tab_ville_autoc['etape2_ville'] = '';
        $this->tab_ville_autoc['etape3_ville'] = '';
        $this->tab_ville_autoc['etape4_ville'] = '';
        $this->tab_ville_autoc['etape5_ville'] = '';
        //$this->tab_ville_autoc['covoitureur'] = '';


        //récupération des informations du covoitureur
        $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_utilisateur'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_utilisateur')));


        //$trajet->getCovoitureur()->getNom()." ".$trajet->getCovoitureur()->getPrenom()." (".$trajet->getCovoitureur()->getIdUtilisateur().")"

        $this->tab_ville_autoc['covoitureur'] = $covoitureur->getNom() . " " . $covoitureur->getPrenom() . " (" . $covoitureur->getIdUtilisateur() . ")";
        $this->tab_ville_autoc['covoitureur'] .= " - (".$covoitureur->getCpEtablissement()." - RS: ".$covoitureur->getCpEtablissement()->getRSEtablissementRaisonSociale().")";

        $this->form = new TrajetForm($trajet);

        //positionnement par défaut des informations du formulaire à partir des informations covoitureur
        $this->form->setDefault('depart_adresse', $covoitureur->getAdresse());
        $this->tab_ville_autoc['depart_ville'] = $covoitureur->getVille();

        $this->form->setDefault('destination_adresse', $covoitureur->getCpEtablissement()->getCpEtablissementAdresse1());
        $this->tab_ville_autoc['destination_ville'] = $covoitureur->getCpEtablissement()->getVilleFr();
        
        //passage du lieu de destination par défaut de l'établissement

        //indicateur que le covoitueur est  connu
        $this->tab_ville_autoc['covoitureur_ident'] = 1;
        //$this->covoitureur_ident = 1;

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }

    /*
     * méthode pour lister les trajets avec le covoitureur associé
     */

    public function executeListTrajetCovoitureur(sfWebRequest $request) {

        //récupération des informations du covoitureur

        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_utilisateur')));

        $this->nomCovoitureur = $covoitureur->getNom();
        $this->prenomCovoitureur = $covoitureur->getPrenom();
        $this->id_utilisateur = $request->getParameter('id_utilisateur');

        $this->id_utilisateur = $request->getParameter('id_utilisateur');

        $this->pager = new sfDoctrinePager(
                        'Trajet',
                        sfConfig::get('app_max_trajet_list')
        );
        //$this->pager->setQuery(Doctrine::getTable('Trajet')->createQuery('a'));
        $this->pager->setQuery(Doctrine::getTable('Trajet')->getTrajetCovoitureur($request->getParameter('id_utilisateur')));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
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
        foreach ($vehiculeModeles as $vehiculeModele) {
            $this->tab_modele[$vehiculeModele['id_modele']] = $vehiculeModele['nom_modele'];
        }
    }

    /*
     * liste des trajets pour un equipage
     */

    public function executeListeTrajetAssocEquipage(sfWebRequest $request) {
        $this->id_equipage = $request->getParameter('id_equipage');
    }

    /*     * ********************************************************** */
    /*   gestion des trajets et équipage apres mise en relation  */
    /*     * ********************************************************** */

    public function executeEditEquipage(sfWebRequest $request) {



        //récupération des infrmations nécessaires à la suite des opérations

        if ($request->isMethod(sfRequest::POST)) {//passage des parametres par formulaires
            //récupération des éléments passés dans le formulaire
            $formnew = $request->getParameter('trajet');
            $attach_trajet = $formnew['attach_trajet'];

            //trajet initial
            $this->forward404Unless($id_trajet_init = $formnew['id_trajet_init'], sprintf('Object trajet does not exist (%s).', $formnew['id_trajet_init']));
            //covoitureur demandeur  
            $this->forward404Unless($id_covoitureur_demandeur = $formnew['id_covoitureur_demandeur'], sprintf('Object covoitureur does not exist (%s).', $formnew['id_covoitureur_demandeur']));
            //MER  
            $this->forward404Unless($this->id_mer = $formnew['id_mer'], sprintf('Object covoitureur does not exist (%s).', $formnew['id_mer']));
        } else {//passage des parametres par lien url
            //trajet genere
            $this->forward404Unless($attach_trajet = $request->getParameter('attach_trajet'), sprintf('Object trajet does not exist (%s).', $request->getParameter('attach_trajet')));


            //trajet initial
            $this->forward404Unless($id_trajet_init = $request->getParameter('id_trajet_init'), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet_init')));
            //covoitureur demandeur  
            $this->forward404Unless($id_covoitureur_demandeur = $request->getParameter('id_covoitureur_demandeur'), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_covoitureur_demandeur')));
            //MER  
            $this->forward404Unless($this->id_mer = $request->getParameter('id_mer'), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_mer')));
        }




        //indicateur d'un trajet cree par recopie
        $this->trajet_recopie = 0;

        //vérification de la valeur du trajet à rattacher et aiguillage en fonction de la valeur
        // si valeur = new => création d'un nouveau trajet par copie du trajet initial
        //          Dans ce cas création d'un trajet virtuekl => id_nature_trajet = -1
        // si valeur existe => edition
        $this->forward404Unless($attach_trajet, sprintf('Object trajet does not exist (%s).', $attach_trajet));

        //récupération du trajet initial
        $this->forward404Unless($trajet_init = Doctrine_Core::getTable('Trajet')->find(array($id_trajet_init)), sprintf('Object trajet does not exist (%s).', $id_trajet_init));

        if ($attach_trajet == "new") {//création d'un nouveau trajet à partir
            //$trajet = new Trajet();
            /*
              $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet_init'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet_init')));

              $this->trajet_recopie = 1;

              //forcage des données pour le nouveau trajet
              $trajet->setIdTrajet(0);
              $trajet->setIdUtilisateur($id_covoitureur_demandeur);

              $trajet->setCpTrajetId(0);

              $this->id_trajet = 0;

             */

            $trajet = new Trajet();
            //$this->forward404Unless($trajet_init = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet_init'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet_init')));
            //creation du nouveau trajet par copie
            $trajet = $trajet_init->copy();
            $trajet->setIdUtilisateur($id_covoitureur_demandeur);
            
            //indication du trajet virtuel
            $trajet->setIdNatureTrajet(-1);

            $trajet->setCpTrajetId(0);
            
            //sauvegarde du trajet
            $trajet->save();

            $this->id_trajet = 0;
        } else {//utilisation d'un trajet existant du covoitureur demandeur
            $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($attach_trajet)), sprintf('Object trajet does not exist (%s).', $attach_trajet));
            $this->id_trajet = $attach_trajet;
            
        }

        //utilisation de l'équipage si existe
        if ($trajet_init->getIdEquipage()) {
            $trajet->setIdEquipage($trajet_init->getIdEquipage());
            $this->id_equipage = $trajet_init->getIdEquipage();
            //sauvegarde du trajet
            $trajet->save();
        } else {
            $trajet->setIdEquipage(0);
            $this->id_equipage = null;
            //sauvegarde du trajet
            $trajet->save();
        }


        //mise en forme de la partie "tolérance"
        $toleranceTab = $trajet->getCheckboxTolerance();


        $this->form = new TrajetForm($trajet);

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = $trajet->getDepartVille();
        $this->tab_ville_autoc['destination_ville'] = $trajet->getDestinationVille();
        $this->tab_ville_autoc['etape1_ville'] = $trajet->getEtape1Ville();
        $this->tab_ville_autoc['etape2_ville'] = $trajet->getEtape2Ville();
        $this->tab_ville_autoc['etape3_ville'] = $trajet->getEtape3Ville();
        $this->tab_ville_autoc['etape4_ville'] = $trajet->getEtape4Ville();
        $this->tab_ville_autoc['etape5_ville'] = $trajet->getEtape5Ville();
        $this->tab_ville_autoc['id_trajet_init'] = $id_trajet_init;
        $this->tab_ville_autoc['id_covoitureur_init'] = $trajet_init->getIdUtilisateur();
        $this->tab_ville_autoc['id_mer'] = $this->id_mer;

        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($id_covoitureur_demandeur));

        $this->tab_ville_autoc['covoitureur'] = $covoitureur->getNom() . " " . $covoitureur->getPrenom() . " (" . $covoitureur->getIdUtilisateur() . ")";


        $this->depart_ville = $trajet->getDepartVille();
        $this->destination_ville = $trajet->getDestinationVille();

        //$this->id_trajet = $request->getParameter('id_trajet');
        $this->covoitureur = $covoitureur->getNom() . " " . $covoitureur->getPrenom() . " (" . $covoitureur->getIdUtilisateur() . ")";
        $this->id_utilisateur = $id_covoitureur_demandeur;
    }

    public function executeCreateAttachEquipage(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $trajet = new Trajet();

        //gestion de la date de modification
        $now = date("Y-m-d H:i:s");
        $trajet->setDateCreation($now);
        $trajet->setDateModification($now);

        //insertion de l'id_site
        $trajet->setIdSite(sfConfig::get('sf_id_site_client'));

        //génération de la clé
        $outil = New Util();
        $trajet->setCle($outil->genereCle('', ''));

        //forcage du type de trajet => régulier
        $trajet->setIdTypeTrajet(1);

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('trajet');
        $this->depart_ville = $formnew['depart_ville'];

        $formnewEquip = $request->getParameter('trajet_equip');


        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = $formnew['depart_ville'];
        $this->tab_ville_autoc['destination_ville'] = $formnew['destination_ville'];
        $this->tab_ville_autoc['etape1_ville'] = $formnew['etape1_ville'];
        $this->tab_ville_autoc['etape2_ville'] = $formnew['etape2_ville'];
        $this->tab_ville_autoc['etape3_ville'] = $formnew['etape3_ville'];
        $this->tab_ville_autoc['etape4_ville'] = $formnew['etape4_ville'];
        $this->tab_ville_autoc['etape5_ville'] = $formnew['etape5_ville'];
        $this->tab_ville_autoc['id_trajet_init'] = $formnewEquip['id_trajet_init'];
        $this->tab_ville_autoc['id_covoitureur_init'] = $formnewEquip['id_covoitureur_init'];
        $this->tab_ville_autoc['id_mer'] = $formnewEquip['id_mer'];

        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($formnew['id_utilisateur']));

        $this->tab_ville_autoc['covoitureur'] = $covoitureur->getNom() . " " . $covoitureur->getPrenom() . " (" . $covoitureur->getIdUtilisateur() . ")";

        $trajet->setIdUtilisateur($formnew['id_utilisateur']);
        //$form->bind($request->getParameter($form->getName()), $request->getFiles($this->form->getName()));
        //recuperation de l'équipage si existe
        $trajet->setIdEquipage($formnew['id_equipage']);
        //$id_equipage = 


        $this->form = new TrajetForm($trajet);


        $this->depart_ville1 = $this->form->getValue('depart_ville');
        $this->depart_ville2 = $this->form->getValue('trajet[depart_ville]');
        $this->depart_ville3 = $this->form->getObject()->getDepartVille();

        $this->processFormMer($request, $this->form, $formnewEquip['id_trajet_init'], $formnewEquip['id_mer']);

        //$this->depart_ville = $this->form->getValue('depart_ville');
        //$this->depart_ville = $this->form->getValue('trajet[depart_ville]');
        //$this->depart_ville = $this->form->getObject()->getDepartVille();

        $this->testvalue = "OK";

        $this->setTemplate('editEquipage');
    }

     public function executeUpdateAttachEquipage(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet'))), sprintf('Object trajet does not exist (%s).', $request->getParameter('id_trajet')));

        //récupération des paramètres passés (dans la requete)
        $tabrequest = $request->getParameter('trajet');


        /*
         * mise à jour des valeurs liées aux informations du formulaire
         */



        //gestion de la date de modification
        $now = date("Y-m-d H:i:s");
        $trajet->setDateModification($now);
        $trajet->setDateDepublication($now);
        $trajet->setDateVerification($now);

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('trajet');
        $this->depart_ville = $formnew['depart_ville'];

        $formnewEquip = $request->getParameter('trajet_equip');


        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = $formnew['depart_ville'];
        $this->tab_ville_autoc['destination_ville'] = $formnew['destination_ville'];
        $this->tab_ville_autoc['etape1_ville'] = $formnew['etape1_ville'];
        $this->tab_ville_autoc['etape2_ville'] = $formnew['etape2_ville'];
        $this->tab_ville_autoc['etape3_ville'] = $formnew['etape3_ville'];
        $this->tab_ville_autoc['etape4_ville'] = $formnew['etape4_ville'];
        $this->tab_ville_autoc['etape5_ville'] = $formnew['etape5_ville'];
        $this->tab_ville_autoc['id_trajet_init'] = $formnewEquip['id_trajet_init'];
        $this->tab_ville_autoc['id_covoitureur_init'] = $formnewEquip['id_covoitureur_init'];
        $this->tab_ville_autoc['id_mer'] = $formnewEquip['id_mer'];

        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($formnew['id_utilisateur']));

        $this->tab_ville_autoc['covoitureur'] = $covoitureur->getNom() . " " . $covoitureur->getPrenom() . " (" . $covoitureur->getIdUtilisateur() . ")";




        $this->form = new TrajetForm($trajet);

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('trajet');
        $this->depart_ville = $formnew['depart_ville'];

        $formnewEquip = $request->getParameter('trajet_equip');


        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['depart_ville'] = $formnew['depart_ville'];
        $this->tab_ville_autoc['destination_ville'] = $formnew['destination_ville'];
        $this->tab_ville_autoc['etape1_ville'] = $formnew['etape1_ville'];
        $this->tab_ville_autoc['etape2_ville'] = $formnew['etape2_ville'];
        $this->tab_ville_autoc['etape3_ville'] = $formnew['etape3_ville'];
        $this->tab_ville_autoc['etape4_ville'] = $formnew['etape4_ville'];
        $this->tab_ville_autoc['etape5_ville'] = $formnew['etape5_ville'];
        $this->tab_ville_autoc['id_trajet_init'] = $formnewEquip['id_trajet_init'];
        $this->tab_ville_autoc['id_covoitureur_init'] = $formnewEquip['id_covoitureur_init'];
        $this->tab_ville_autoc['id_mer'] = $formnewEquip['id_mer'];

        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($formnew['id_utilisateur']));

        $this->tab_ville_autoc['covoitureur'] = $covoitureur->getNom() . " " . $covoitureur->getPrenom() . " (" . $covoitureur->getIdUtilisateur() . ")";

        $this->depart_ville1 = $this->form->getValue('depart_ville');
        $this->depart_ville2 = $this->form->getValue('trajet[depart_ville]');
        $this->depart_ville3 = $this->form->getObject()->getDepartVille();

        $this->processFormMer($request, $this->form, $formnewEquip['id_trajet_init'], $formnewEquip['id_mer']);

     }

    //process form spécifique aux MER
    protected function processFormMer(sfWebRequest $request, sfForm $form, $id_trajet_init, $id_mer) {
        //initialisation des id des covoitureurs (pour le traitement des mail)
        $id_covoitureur_init = 0;
        $id_covoitureur_demandeur = 0;

        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }


        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $trajet = $form->save();

            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $trajet->setDateCreation($now);
            }
            $trajet->setDateModification($now);

            //gestion des tolérances
            $trajet->setTolerance($trajet->setCheckboxTolerance(
                            $form->getValue('tolerance_0'), $form->getValue('tolerance_1'), $form->getValue('tolerance_2'), $form->getValue('tolerance_3'), $form->getValue('tolerance_4')
                    ));


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

            $webService = 'http://maps.google.com/maps/api/directions/xml?origin=' . $outil->extractCpLibelle($form->getValue('depart_ville')) . '&destination=' . $outil->extractCpLibelle($form->getValue('destination_ville')) . '&sensor=true';
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



            $vehicule = new CovoitureurVehicule();
            //$vehicule->setIdMarque($form->getValue('vehicule_marque'));
            //$vehicule->setIdModele($form->getValue('vehicule_modele'));
            //$vehicule->setIdUtilisateur($trajet->getIdUtilisateur());
            //$vehicule->save();
            //$trajet->setVehicule($vehicule->setCovoitVehiculeId($form->getValue('vehicule_marque'), $val_temp, $IdUtil));
            $trajet->setVehicule($vehicule->setCovoitVehiculeId(
                            $form->getValue('vehicule_marque'), $form->getValue('vehicule_modele'), $trajet->getIdUtilisateur()));



            $trajet->save();


            /**************************************************** */
            /*          creation de l'equipage associé           */
            /**************************************************** */
            if ($trajet->getIdEquipage() == 0 || $trajet->getIdEquipage() == null) {
                if ($id_trajet_init != '' && $id_trajet_init != null) {
                    $equipage = new Equipage();
                    $equipage->setDateCreation($now);
                    $equipage->setDateModification($now);
                    $equipage->setIdSite(sfConfig::get('sf_id_site_client'));

                    //génération de la clé
                    $outil = New Util();
                    $equipage->setCle($outil->genereCle('', ''));

                    $equipage->setEtat(1);

                    //récupération des informations du trajet initial
                    $this->forward404Unless($trajet_init = Doctrine_Core::getTable('Trajet')->find(array($id_trajet_init)), sprintf('Object trajet does not exist (%s).', $id_trajet_init));

                    $equipage->setIdTrajet($id_trajet_init);
                    $equipage->setIdCreateur($trajet_init->getIdUtilisateur());
                    $id_covoitureur_init = $trajet_init->getIdUtilisateur();

                    $equipage->setIdVilleOrigine($trajet_init->getIdDepart());
                    $equipage->setIdVilleDestination($trajet_init->getIdDestination());

                    //creation du nom de l'equipage
                    $nom_equipage = $trajet_init->getDepartVille() . "-" . $trajet_init->getDestinationVille();
                    $equipage->setNomEquipage($nom_equipage);

                    $equipage->setIdProfil(sfConfig::get('sf_id_fo_profil'));

                    //sauvegarde de l'équipage
                    $equipage->save();

                    //reuperation de l'id_equipage et sauvegarde au niveau des deux trajets
                    $trajet_init->setIdEquipage($equipage->getIdEquipage());
                    $trajet_init->save();

                    $trajet->setIdEquipage($equipage->getIdEquipage());
                    $trajet->save();
                }

                /**************************************************** */
                /*       changement d'etat de la MER                 */
                /**************************************************** */
                $this->forward404Unless($merEnCours = Doctrine_Core::getTable('TrajetMiseEnRelation')->find(array($id_mer)), sprintf('Object MER does not exist (%s).', $id_mer));

                //passage à l'etat "equipagée"
                //$merEnCours->setEtat(sfConfig::get('sf_desc_ind__mer_7'));
                $merEnCours->setEtat(sfConfig::get('sf_desc_ind__mer_7_val'));
                $merEnCours->save();

                /**************************************************** */
                /*       envoi des mails aux covoitureurs            */
                /*************************************************** */
                //envoi du mail au covoitureur du trajet initial 

                if ($id_covoitureur_init == 0) {
                    //récupération des informations du trajet initial
                    $this->forward404Unless($trajet_init = Doctrine_Core::getTable('Trajet')->find(array($id_trajet_init)), sprintf('Object trajet does not exist (%s).', $id_trajet_init));

                    $id_covoitureur_init = $trajet_init->getIdUtilisateur();
                }

                //covoitureur initial  
                $this->forward404Unless($covoitureur_init = Doctrine_Core::getTable('Covoitureur')->find(array($id_covoitureur_init)), sprintf('Object covoitureur does not exist (%s).', $id_covoitureur_init));


                //Preparation du mail                
                $params['subject'] = "Rattachement à équipage";
                $params['to'] = $covoitureur_init->getMail();
                $params['from'] = sfConfig::get('sf_mail_envoi');
                $params["message"] = "Vous venez d\'être rattaché à un équipage";

                //envoi mail
                //$outil = New Util();
                $outil->envoi_mail($this, "NouvelEquipageApresMer", $params);


                //envoi du mail au covoitureur du trajet demandeur 
                //covoitureur demandeur  
                $this->forward404Unless($id_covoitureur_demandeur = $trajet->getIdUtilisateur(), sprintf('Object covoitureur does not exist (%s).', $trajet->getIdUtilisateur()));
                $this->forward404Unless($covoitureur_demandeur = Doctrine_Core::getTable('Covoitureur')->find(array($id_covoitureur_demandeur)), sprintf('Object covoitureur does not exist (%s).', $id_covoitureur_demandeur));

                //Preparation du mail                
                $params['subject'] = "Rattachement à équipage";
                $params['to'] = $covoitureur_demandeur->getMail();
                $params['from'] = sfConfig::get('sf_mail_envoi');
                $params["message"] = "Vous venez d\'être rattaché à un équipage";

                //envoi mail
                //$outil = New Util();
                $outil->envoi_mail($this, "NouvelEquipageApresMer", $params);
            }




            $this->redirect('trajet/editEquipage?id_trajet_init=' . $id_trajet_init . '&id_covoitureur_demandeur=' . $trajet->getIdUtilisateur() . '&id_mer=' . $id_mer . '&attach_trajet=' . $trajet->getIdTrajet());
        }
    }

}

