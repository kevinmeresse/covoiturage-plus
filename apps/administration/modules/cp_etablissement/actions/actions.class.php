<?php

/**
 * cp_etablissement actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cp_etablissement
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cp_etablissementActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

        //indicateur du nombre de parametres du filtre
        $nb_occ = 0;

        //valeur à transemmetre au champ en autocomplétion
        $this->nom_etb = '';
        $this->statut = '';
        $this->zone = '';
        $this->ville = '';
        $villeId = 0;

        //initialisation du formulaire de recherche et filtre
        $this->formRecherche = new CpEtablissementRechercheForm();

        //indicateur de validité du formulaire de recherche pour la requete
        $this->ind_valid = 0;

        //variable permettant le transfert dans le formulaire de la ville autocompléteé
        $this->ville_autocomp = '';



        if ($request->isMethod('post')) {
            $this->formRecherche->bind($request->getParameter('CpEtablissementRecherche'), $request->getFiles('CpEtablissementRecherche'));
            if ($this->formRecherche->isValid()) {

                $formulaire = $this->formRecherche->getValues();

                $this->nom_etb = $formulaire['cp_etablissement_etablissement_nom'];
                $this->raison_sociale = $formulaire['cp_etablissement_raison_social'];
                $this->statut = $formulaire['cp_etablissement_cp_etablissement_statut_id'];
                $this->zone = $formulaire['cp_etablissement_zone_id'];
                $this->ville = $formulaire['ville'];
                //$villeId = $formulaire['villeId'];


                if ($formulaire['cp_etablissement_etablissement_nom'] != '' && !is_null($formulaire['cp_etablissement_etablissement_nom'])) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_etablissement_nom/' . $formulaire['cp_etablissement_etablissement_nom'];
                }
                
                if ($formulaire['cp_etablissement_raison_social'] != '' && !is_null($formulaire['cp_etablissement_raison_social'])) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_raison_social/' . $formulaire['cp_etablissement_raison_social'];
                }

                if ($formulaire['cp_etablissement_cp_etablissement_statut_id'] != '' && !is_null($formulaire['cp_etablissement_cp_etablissement_statut_id'])) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_cp_etablissement_statut_id/' . $formulaire['cp_etablissement_cp_etablissement_statut_id'];
                }
                if ($formulaire['cp_etablissement_zone_id'] != '' && !is_null($formulaire['cp_etablissement_zone_id'])) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_zone_id/' . $formulaire['cp_etablissement_zone_id'];
                }

                if ($formulaire['ville'] != '' && !is_null($formulaire['ville'])) {
                    $this->ind_valid = 1;
                    //$this->pagerRequete .= '/ville/' . $formulaire['ville'];
                    $outil = new Util();
                    $chaine = $outil->extractCpLibelle($formulaire['ville']);
                    $villeId = Doctrine_Core::getTable('VilleFr')->getIdVille($chaine);
                    //$this->villeId = $villeId;

                    $this->ville_autocomp = $formulaire['ville'];

                    $this->pagerRequete .= '/ville/' . $formulaire['ville'] . '/villeId/' . $villeId;
                }
            } else {
                $this->nom_etb = '';
                $this->raison_sociale = '';
                $this->statut = '';
                $this->zone = '';
                $this->ville = '';
                $villeId = 0;
                $this->ind_valid = 0;
            }
        } else {
            //initialisation de l'indicateur de passage de requete 
            $this->ind_valid = 0;
            
            if ($request->getParameter('cp_etablissement_etablissement_nom')) {
                $this->nom_etb = trim($request->getParameter('cp_etablissement_etablissement_nom'));
                if ($request->getParameter('cp_etablissement_etablissement_nom') != '' && !is_null($request->getParameter('cp_etablissement_etablissement_nom'))) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_etablissement_nom/' . $request->getParameter('cp_etablissement_etablissement_nom');
                }
            } else {
                $this->nom_etb = '';
                //$this->ind_valid = 0;
            }
            
            if ($request->getParameter('cp_etablissement_raison_social')) {
                $this->raison_sociale = trim($request->getParameter('cp_etablissement_raison_social'));
                if ($request->getParameter('cp_etablissement_raison_social') != '' && !is_null($request->getParameter('cp_etablissement_raison_social'))) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_raison_social/' . $request->getParameter('cp_etablissement_raison_social');
                }
            } else {
                $this->raison_sociale = '';
                //$this->ind_valid = 0;
            }

            if ($request->getParameter('cp_etablissement_cp_etablissement_statut_id')) {
                $this->statut = $request->getParameter('cp_etablissement_cp_etablissement_statut_id');
                if ($request->getParameter('cp_etablissement_cp_etablissement_statut_id') != '' && !is_null($request->getParameter('cp_etablissement_cp_etablissement_statut_id'))) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_cp_etablissement_statut_id/' . $request->getParameter('cp_etablissement_cp_etablissement_statut_id');
                }

                //mise à jour du formulaire avec la valeur passée
                $this->formRecherche->setDefault('cp_etablissement_cp_etablissement_statut_id', $request->getParameter('cp_etablissement_cp_etablissement_statut_id'));
            } else {
                $this->statut = '';
                //$this->ind_valid = 0;
            }

            if ($request->getParameter('cp_etablissement_zone_id')) {
                $this->zone = $request->getParameter('cp_etablissement_zone_id');
                if ($request->getParameter('cp_etablissement_zone_id') != '' && !is_null($request->getParameter('cp_etablissement_zone_id'))) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_zone_id/' . $request->getParameter('cp_etablissement_zone_id');
                }


                //mise à jour du formulaire avec la valeur passée
                $this->formRecherche->setDefault('cp_etablissement_zone_id', $request->getParameter('cp_etablissement_zone_id'));
            } else {
                $this->zone = '';
                //$this->ind_valid = 0;
            }

            if ($request->getParameter('ville')) {
                $this->statut = $request->getParameter('ville');
                if ($request->getParameter('ville') != '' && !is_null($request->getParameter('ville'))) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/ville/' . $request->getParameter('ville');
                }
                if ($request->getParameter('villeId') != 0 && !is_null($request->getParameter('villeId'))) {
                    //$this->ind_valid = 1;
                    $this->pagerRequete .= '/villeId/' . $request->getParameter('villeId');
                    $villeId = $request->getParameter('villeId');
                }

                //mise à jour du formulaire avec la valeur passée
                $this->formRecherche->setDefault('ville', $request->getParameter('ville'));
            } else {
                $this->ville = '';
                $villeId = 0;
                //$this->ind_valid = 0;
            }
        }

        //suppression des éléments entre parenthese dans le nom de l'établissement 
        //extraction des infos entre parentheses
        $outil = new Util();

        $chaineNomEtb = $outil->extractCpLibelle($this->nom_etb);
        
        //recuperation des id de raison sociale
        $tabIdRs = array(); // tableau de récupération des id des s correspondantes
        
        if ($this->raison_sociale != '' && !is_null($this->raison_sociale)) {
                    $tabIdRs = Doctrine_Core::getTable('CpEtablissement')->getTabIdRs(null,$this->raison_sociale);
        }
        
  
        //génération du pager
        $this->pager = new sfDoctrinePager(
                        'CpEtablissement',
                        sfConfig::get('app_max_raison_sociale_list')
        );
        //$this->pager->setQuery($query);
        ///$this->pager->setQuery(Doctrine::getTable('CpEtablissement')->getEtablissementRecherche(null, $this->nom_etb, $this->statut, $this->zone, $this->ville,$villeId ));
        $this->pager->setQuery(Doctrine::getTable('CpEtablissement')->getEtablissementRecherche(null, $chaineNomEtb, $tabIdRs, $this->statut, $this->zone, $this->ville, $villeId));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeNew(sfWebRequest $request) {
        $this->cp_etablissement = new CpEtablissement();
        //gestion de la date de modification
        $now = date("Ymd H:i:s");

        $this->cp_etablissement->setCpEtablissementDateCreation($now);
        $this->cp_etablissement->setCpEtablissementDateModification($now);
        $this->cp_etablissement->setCpEtablissementTypeSociete(0);

        $this->form = new CpEtablissementForm($this->cp_etablissement);

        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = '';


        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CpEtablissementForm();

        $this->processForm($request, $this->form);

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object cp_etablissement does not exist (%s).', $request->getParameter('cp_etablissement_id')));

        //récupération de la raison sociale
        $this->raison_sociale = $cp_etablissement->getEtablissementRaisonSociale();
        //gestion de la date de modification
        $now = date("Ymd H:i:s");
        $cp_etablissement->setCpEtablissementDateModification($now);

        //$this->form = new CpEtablissementForm($cp_etablissement);
        //id de l'etablissement pour les partial et component
        $this->etb = $request->getParameter('cp_etablissement_id');

        //initialisation du parametre pour affichage de la ville
        if(!is_null($cp_etablissement->getCpEtablissementVilleId())){
            $idville = $cp_etablissement->getCpEtablissementVilleId();
        }else{
            $idville = sfConfig::get('sf_id_defaut_etab');
        }
        
        $ville = Doctrine_Core::getTable('VilleFr')->find($idville);
        $this->form = new CpEtablissementForm($cp_etablissement);
        $this->form->setDefault('ville', $ville->getNomVille());

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }

    //visualisation d'une Raison Sociale
    public function executeVisu(sfWebRequest $request) {
        $this->forward404Unless($cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object cp_etablissement does not exist (%s).', $request->getParameter('cp_etablissement_id')));
        $this->cp_etablissement = $cp_etablissement;

        /*
         * récuprération des informations de la fiche pour centrer la carte GoogleMap
         */
        //utilisation des coordonnées

        $val_test = 0;
        if (($cp_etablissement->getCpEtablissementLatitude() != '0.000000000'
                && !is_null($cp_etablissement->getCpEtablissementLatitude())
                && $cp_etablissement->getCpEtablissementLatitude() != '')
                && ($cp_etablissement->getCpEtablissementLongitude() != '0.000000000'
                && !is_null($cp_etablissement->getCpEtablissementLongitude())
                && $cp_etablissement->getCpEtablissementLongitude() != '')) {

            $this->gMap = new GMap();
            //récupération de l'adresse du lieu à partir des coordonnées
            // Reverse geocoding of the center of the map
            $geocoded_address = new GMapGeocodedAddress(null);
            $geocoded_address->setLat($cp_etablissement->getCpEtablissementLatitude());
            $geocoded_address->setLng($cp_etablissement->getCpEtablissementLongitude());
            $geocoded_address->reverseGeocode($this->gMap->getGMapClient());

            //gestion de l'adresse dans la bulle
            $info_window = new GMapInfoWindow('<div class="icon_map"><b>Addresse:</b><br />' . $geocoded_address->getGeocodedAddress() . '</div>');
            $gMapEvent = new GMapEvent('click', "get_click_coord", false);
            $this->gMap->addEvent($gMapEvent);
            $this->gMap->addGlobalVariable('marker', 'null');

            $name = '"' . $cp_etablissement->getCpEtablissementEtablissementNom() . '"';

            $gMapMarker = new GMapMarker($cp_etablissement->getCpEtablissementLatitude(), $cp_etablissement->getCpEtablissementLongitude(), array('title' => $name), 'marker');

            $gMapMarker->addHtmlInfoWindow($info_window);

            $this->gMap->addMarker($gMapMarker);

            $this->gMap->centerAndZoomOnMarkers();
        }
        //utilisation de l'adresse
        elseif ($cp_etablissement->getCpEtablissementAdresse1() != '' && $cp_etablissement->getCpEtablissementCodePostal() != '' && $cp_etablissement->getCpEtablissementVilleId() != '') {
            $depVille = Doctrine_Core::getTable('VilleFr')->find($cp_etablissement->getCpEtablissementVilleId());
            //génération de l'adresse pour GMap
            $adresse = $cp_etablissement->getCpEtablissementAdresse1() . ", " . $cp_etablissement->getCpEtablissementCodePostal() . " " . $depVille['nom_ville'];

            $this->gMap = new GMap();
            //récupération de l'adresse du lieu
            $geocoded_address = $this->gMap->geocode($adresse);
            //gestion de l'adresse dans la bulle
            $info_window = new GMapInfoWindow('<div class="icon_map"><b>Addresse:</b><br />' . $adresse . '</div>');
            $gMapEvent = new GMapEvent('click', "get_click_coord", false);
            $this->gMap->addEvent($gMapEvent);
            $this->gMap->addGlobalVariable('marker', 'null');

            $name = '"' . $cp_etablissement['cp_etablissement_etablissement_nom'] . '"';

            $gMapMarker = new GMapMarker($geocoded_address->getLat(), $geocoded_address->getLng(), array('title' => $name), 'marker');

            $gMapMarker->addHtmlInfoWindow($info_window);

            $this->gMap->addMarker($gMapMarker);

            $this->gMap->centerAndZoomOnMarkers();

            //mise à jour des latitudes et longitudes
        }
        //utilisation de l'adresse de covoiturage plus (definie dans app.yml)
        else {
            $this->gMap = new GMap();
            //récupération de l'adresse de covoiturage plus (definie dans app.yml)
            $geocoded_address = $this->gMap->geocode(sfConfig::get('app_covoiturage_adresse_map'));
            $gMapMarker = new GMapMarker($geocoded_address->getLat(), $geocoded_address->getLng());
            //$gMapMarker->addHtmlInfoWindow('<b>Address:</b><br />'.sfConfig::get('app_covoiturage_adresse_map'));
            $this->gMap->addMarker($gMapMarker);

            //$this->gMap->addMarker(new GMapMarker($geocoded_address->getLat(),$geocoded_address->getLng()));
            $this->gMap->centerAndZoomOnMarkers();
            //$val_test = $geocoded_address->getLat()."-".$geocoded_address->getLng();
            //$val_test = $gAddress->getRawAddress();
        }

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
        
        //utilisation d'un indicateur indiquant que'un module est intégré dans un autre moduel
        // (permet d'éviter d'afficher plusieur fois le bouton "fermer la fenetre")
        if ($request->getParameter('listeIntegre') && $request->getParameter('listeIntegre') == 1) {
            $this->listeIntegre = 1;
        }
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object cp_etablissement does not exist (%s).', $request->getParameter('cp_etablissement_id')));

        $this->etb = $request->getParameter('cp_etablissement_id');

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('cp_etablissement');

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = $formnew['ville'];

        //gestion de la date de modification
        $now = date("Ymd H:i:s");
        $cp_etablissement->setCpEtablissementDateModification($now);

        $this->form = new CpEtablissementForm($cp_etablissement);

        $this->processForm($request, $this->form);

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->setTemplate('edit');
        //$this->redirect('cp_etablissement/edit?cp_etablissement_id='.$request->getParameter('cp_etablissement_id'));
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        //filtrage pour empécher de supprimer PSA
        if ($request->getParameter('cp_etablissement_id') != sfConfig::get('sf_id_etablissement_psa')) {
            //suppression des contacts liés à l'établissement
            // Doctrine::getTable('CpContact')->getDeleteContactEtb($request->getParameter('cp_etablissement_id'));
            try {
                Doctrine::getTable('CpContact')
                    ->findBy('cp_contact_cp_etablissement_id', $request->getParameter('cp_etablissement_id'))
                    ->delete();
            } catch (Doctrine_Validator_Exception $e){
                echo "erreur à la suppression du contact associe à l'établissement";
            }


            //suppression des actions liées à l'établissement
            //Doctrine::getTable('CpActionEtb')->getDeleteActionEtb($request->getParameter('cp_etablissement_id'));

            try {
                Doctrine::getTable('CpActionEtb')
                    ->findBy('cp_action_etb_cp_etablissement_id', $request->getParameter('cp_etablissement_id'))
                    ->delete();
            } catch (Doctrine_Validator_Exception $e){
                echo "erreur à la suppression de l'action associée à l'établissement";
            }

            $this->forward404Unless($cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object cp_etablissement does not exist (%s).', $request->getParameter('cp_etablissement_id')));
            $cp_etablissement->delete();
        } else {
            $this->getUser()->setFlash('notice', sprintf('Vous ne pouvez pas supprimer cette entreprise PSA.'));
        }

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->message = "L'établissement a été supprimé";

        //$this->redirect('cp_etablissement/index');
    }

    /*     * ************************************************* */
    /* creation d'un etablissement à partir d'une RS    */
    /*     * ************************************************* */

    public function executeNewFromRs(sfWebRequest $request) {
        $this->cp_etablissement = new CpEtablissement();

        //recupération de la valeur de la RS
        //$this->cp_etablissementRS = $request->getParameter('cp_etablissementRS');

        $this->forward404Unless($cp_etablissementRs = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissementRS'))), sprintf('Object cp_etablissement does not exist (%s).', $request->getParameter('cp_etablissementRS')));
        //recuperation du nom de la raison sociale
        $this->nomRs = $cp_etablissementRs->getCpEtablissementRaisonSocial();
//$this->nomRs = $request->getParameter('cp_etablissementRS');

        $this->cp_etablissement->setCpEtablissementEtablissementPereId($request->getParameter('cp_etablissementRS'));

        //gestion de la date de modification
        $now = date("Ymd H:i:s");

        $this->cp_etablissement->setCpEtablissementDateCreation($now);
        $this->cp_etablissement->setCpEtablissementDateModification($now);
        $this->cp_etablissement->setCpEtablissementTypeSociete(0);

        $this->form = new CpEtablissementFromRsForm($this->cp_etablissement);

        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = '';
        $this->tab_ville_autoc['nomRs'] = $cp_etablissementRs->getCpEtablissementRaisonSocial();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }

    public function executeCreateFromRs(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CpEtablissementFromRsForm();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processForm($request, $this->form);

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('cp_etablissement');

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = $formnew['ville'];
        $this->tab_ville_autoc['nomRs'] = $formnew['nomRs'];
        //$this->nomRs = $formnew['nomRs'];

        $this->setTemplate('newFromRs');
        
        
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        
        //récupération de la RS et traitement sinon reour
        $cp_etablissement_Rs_Id = Doctrine_Core::getTable('CpEtablissement')->getIdRsParLibel(null,$form->getValue('cp_etablissement_etablissement_RS'));
               
        
        if ($form->isValid() && $cp_etablissement_Rs_Id != 0) {
            //vérification si le formulaire est en création ou en update
            $newInd = 0;
            if ($form->getObject()->isNew()) {
                $newInd = 1;
            }
            
            

            $cp_etablissement = $form->save();
            
            //renseignement de la RS
            $cp_etablissement->setCpEtablissementEtablissementPereId($cp_etablissement_Rs_Id);

            //aiguillage de la sortie de la méthode en fonction du type etablissement ou siociete
            if ($cp_etablissement->getCpEtablissementTypeSociete() == 1) {
                $type_societe_mere = true;
            } else {
                $type_societe_mere = false;
                
                //mise à jour de la ville
                //extraction des infos entre parentheses
                $outil = new Util();

                //mise à jour des informations liées aux villes
                //ville 
                $cp_etablissement->setCpEtablissementLatitude($form->getValue('cp_etablissement_latitude'));
                $cp_etablissement->setCpEtablissementLongitude($form->getValue('cp_etablissement_longitude'));

                $depVille = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle("", $form->getValue('ville'));
                $depVille = $depVille[0];

                if (isset($depVille)) {

                    //$cp_etablissement->setCpEtablissementVilleId($depVille->getCodeInsee());
                    $cp_etablissement->setCpEtablissementVilleId($depVille['id_ville']);


                    if ($cp_etablissement->getCpEtablissementCodePostal() == '') {
                        $cp_etablissement->setCpEtablissementCodePostal($depVille['code_postal']);
                    }


                    //$cp_etablissement->save();
                }
            }


            //gestion de la date de modification et de la date de création
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $cp_etablissement->setCpEtablissementDateCreation($now);
            }
            $cp_etablissement->setCpEtablissementDateModification($now);

            
            
            $cp_etablissement->save();

            //sélection du layout de popup en cas de demande d'affichage en popup
            if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                $this->setLayout('layout-popup');
            }

            if ($type_societe_mere) {//cas de la société (lere)
                //$this->redirect('cp_etablissement/editSociete?cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId());
                if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                    $this->redirect('cp_etablissement/visuSociete?popup=1&cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId());
                } else {
                    $this->redirect('cp_etablissement/visuSociete?cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId());
                }
            } else { //cas d'un simple établissement
                //$this->redirect('cp_etablissement/visu?cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId());
                //sélection du layout de popup en cas de demande d'affichage en popup
                if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                    $this->redirect('cp_etablissement/visu?popup=1&cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId());
                } else {
                    $this->redirect('cp_etablissement/visu?cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId());
                }
            }
        }
    }

    /*
     * fonction d'autocomplétion pour les établissement
     */

    public function executeAutocomplete(sfWebRequest $request) {

        $cp_etablissement = new CpEtablissement();
        $this->results = $cp_etablissement->getEtablissementAutocomplete($request->getParameter('q'));
        $this->setLayout(false);
    }
    
    /*
     * fonction d'autocomplétion pour les établissement sur le formulaire covoitureur
     */

    public function executeAutocompleteCovoit(sfWebRequest $request) {

        $cp_etablissement = new CpEtablissement();
        $this->results = $cp_etablissement->getEtablissementAutocompleteCovoit($request->getParameter('q'));
        $this->setLayout(false);
        $this->setTemplate('autocomplete');
    }

    /*     * ************************************************************** */
    /*     * ******       Raisons Sociales   -      Societe         ******* */
    /*     * ************************************************************** */

    //liste des sociétés
    public function executeIndexSociete(sfWebRequest $request) {
        //indicateur du nombre de parametres du filtre
        $nb_occ = 0;

        //initialisation du formulaire de recherche et filtre
        $this->formRecherche = new CpEtablissementRechercheRsForm();



        //indicateur de validité du formulaire de recherche pour la requete
        $this->ind_valid = 0;

        //element permettant de faire uivre la requete au niveau du pager
        $this->pagerRequete = '';

        //variable permettant le transfert des variables sélectionnées dans le formulaire de recherche
        $this->statut = '';
        $this->raison_sociale = '';


        if ($request->isMethod('post')) {
            $this->formRecherche->bind($request->getParameter('CpEtablissementRechercheRs'), $request->getFiles('CpEtablissementRechercheRs'));
            if ($this->formRecherche->isValid()) {

                $formulaire = $this->formRecherche->getValues();

                $this->raison_sociale = $formulaire['cp_etablissement_raison_social'];
                $this->statut = $formulaire['cp_etablissement_cp_etablissement_statut_id'];

                if ($formulaire['cp_etablissement_raison_social'] != '' && !is_null($formulaire['cp_etablissement_raison_social'])) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_raison_social/' . $formulaire['cp_etablissement_raison_social'];
                }

                if ($formulaire['cp_etablissement_cp_etablissement_statut_id'] != '' && !is_null($formulaire['cp_etablissement_cp_etablissement_statut_id'])) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_cp_etablissement_statut_id/' . $formulaire['cp_etablissement_cp_etablissement_statut_id'];
                }
            } else {
                $this->raison_sociale = '';
                $this->statut = '';
                $this->ind_valid = 0;
            }
        } else {
            //initialisation de l'indicateur de passage de requete 
            $this->ind_valid = 0;
            
            if ($request->getParameter('cp_etablissement_raison_social')) {
                $this->raison_sociale = trim($request->getParameter('cp_etablissement_raison_social'));
                if ($request->getParameter('cp_etablissement_raison_social') != '' && !is_null($request->getParameter('cp_etablissement_raison_social'))) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_raison_social/' . $request->getParameter('cp_etablissement_raison_social');
                }
            } else {
                $this->raison_sociale = '';
                //$this->ind_valid = 0;
            }

            if ($request->getParameter('cp_etablissement_cp_etablissement_statut_id')) {
                $this->statut = $request->getParameter('cp_etablissement_cp_etablissement_statut_id');
                if ($request->getParameter('cp_etablissement_cp_etablissement_statut_id') != '' && !is_null($request->getParameter('cp_etablissement_cp_etablissement_statut_id'))) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/cp_etablissement_cp_etablissement_statut_id/' . $request->getParameter('cp_etablissement_cp_etablissement_statut_id');
                }

                //mise à jour du formulaire avec la valeur passée
                $this->formRecherche->setDefault('cp_etablissement_cp_etablissement_statut_id', $request->getParameter('cp_etablissement_cp_etablissement_statut_id'));
            } else {
                $this->statut = '';
            }
        }

        //génération du pager
        $this->pager = new sfDoctrinePager(
                        'CpEtablissement',
                        sfConfig::get('app_max_raison_sociale_list')
        );
        //$this->pager->setQuery($query);
        $this->pager->setQuery(Doctrine::getTable('CpEtablissement')->getEtablissementRechercheRS(null, $this->raison_sociale, $this->statut));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    //création d'une nouvelle raison sociale - société
    public function executeNewSociete(sfWebRequest $request) {
        $this->cp_etablissement = new CpEtablissement();
        //gestion de la date de modification
        $now = date("Ymd H:i:s");

        $this->cp_etablissement->setCpEtablissementDateCreation($now);
        $this->cp_etablissement->setCpEtablissementDateModification($now);
        $this->cp_etablissement->setCpEtablissementTypeSociete(1);

        $this->form = new CpEtablissementSocieteForm($this->cp_etablissement);

        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = '';
    }

    public function executeUpdateSociete(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object cp_etablissement does not exist (%s).', $request->getParameter('cp_etablissement_id')));

        //gestion de la date de modification
        $now = date("Ymd H:i:s");
        $cp_etablissement->setCpEtablissementDateModification($now);

        $this->form = new CpEtablissementSocieteForm($cp_etablissement);

        $this->processForm($request, $this->form);

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('cp_etablissement_societe');

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = $formnew['ville'];
        
        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->setTemplate('editSociete');
    }

    public function executeDeleteSociete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        //$this->forward404Unless($cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object cp_etablissement does not exist (%s).', $request->getParameter('cp_etablissement_id')));
        //$cp_etablissement->delete();
        //filtrage pour empécher de supprimer PSA
        if ($request->getParameter('cp_etablissement_id') != sfConfig::get('sf_id_etablissement_psa')) {
            $this->forward404Unless($cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object cp_etablissement does not exist (%s).', $request->getParameter('cp_etablissement_id')));
            $cp_etablissement->delete();
        } else {
            $this->getUser()->setFlash('notice', sprintf('Vous ne pouvez pas supprimer cette entreprise PSA.'));
        }

        $this->redirect('cp_etablissement/indexSociete');
    }

    public function executeCreateSociete(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new CpEtablissementSocieteForm();

        $this->processForm($request, $this->form);

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('cp_etablissement_societe');

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = $formnew['ville'];


        $this->setTemplate('newSociete');
    }

    public function executeEditSociete(sfWebRequest $request) {
        $this->forward404Unless($cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object cp_etablissement does not exist (%s).', $request->getParameter('cp_etablissement_id')));


        //gestion de la date de modification
        $now = date("Ymd H:i:s");
        $cp_etablissement->setCpEtablissementDateModification($now);

        //$this->form = new CpEtablissementForm($cp_etablissement);
        //id de l'etablissement pour les partial et component
        $this->etb = $request->getParameter('cp_etablissement_id');

        //initialisation du parametre pour affichage de la ville
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = '0';
        $idville = $cp_etablissement->getCpEtablissementVilleId();

        if ($cp_etablissement->getCpEtablissementVilleId() != 0) {
            $depVille = Doctrine_Core::getTable('VilleFr')->find($cp_etablissement->getCpEtablissementVilleId());
            $this->tab_ville_autoc['ville'] = $depVille['nom_ville'] . " (" . $depVille['code_postal'] . ")";
        }



        /*
         * récuprération des informations de la fiche pour centrer la carte GoogleMap
         */
        //utilisation des coordonnées

        $val_test = 0;
        if (($cp_etablissement->getCpEtablissementLatitude() != '0.000000000'
                && !is_null($cp_etablissement->getCpEtablissementLatitude())
                && $cp_etablissement->getCpEtablissementLatitude() != '')
                && ($cp_etablissement->getCpEtablissementLongitude() != '0.000000000'
                && !is_null($cp_etablissement->getCpEtablissementLongitude())
                && $cp_etablissement->getCpEtablissementLongitude() != '')) {

            $this->gMap = new GMap();
            //récupération de l'adresse du lieu à partir des coordonnées
            // Reverse geocoding of the center of the map
            $geocoded_address = new GMapGeocodedAddress(null);
            $geocoded_address->setLat($cp_etablissement->getCpEtablissementLatitude());
            $geocoded_address->setLng($cp_etablissement->getCpEtablissementLongitude());
            $geocoded_address->reverseGeocode($this->gMap->getGMapClient());

            //gestion de l'adresse dans la bulle
            $info_window = new GMapInfoWindow('<div class="icon_map"><b>Addresse:</b><br />' . $geocoded_address->getGeocodedAddress() . '</div>');
            $gMapEvent = new GMapEvent('click', "get_click_coord", false);
            $this->gMap->addEvent($gMapEvent);
            $this->gMap->addGlobalVariable('marker', 'null');

            $name = '"' . $cp_etablissement->getCpEtablissementEtablissementNom() . '"';

            $gMapMarker = new GMapMarker($cp_etablissement->getCpEtablissementLatitude(), $cp_etablissement->getCpEtablissementLongitude(), array('title' => $name), 'marker');

            $gMapMarker->addHtmlInfoWindow($info_window);

            $this->gMap->addMarker($gMapMarker);

            $this->gMap->centerAndZoomOnMarkers();
        }
        //utilisation de l'adresse
        elseif ($cp_etablissement->getCpEtablissementAdresse1() != '' && $cp_etablissement->getCpEtablissementCodePostal() != '' && $cp_etablissement->getCpEtablissementVilleId() != '') {
            //génération de l'adresse pour GMap
            $adresse = $cp_etablissement->getCpEtablissementAdresse1() . ", " . $cp_etablissement->getCpEtablissementCodePostal() . " " . $depVille['nom_ville'];

            $this->gMap = new GMap();
            //récupération de l'adresse du lieu
            $geocoded_address = $this->gMap->geocode($adresse);
            //gestion de l'adresse dans la bulle
            $info_window = new GMapInfoWindow('<div class="icon_map"><b>Addresse:</b><br />' . $adresse . '</div>');
            $gMapEvent = new GMapEvent('click', "get_click_coord", false);
            $this->gMap->addEvent($gMapEvent);
            $this->gMap->addGlobalVariable('marker', 'null');

            $name = '"' . $cp_etablissement['cp_etablissement_etablissement_nom'] . '"';

            $gMapMarker = new GMapMarker($geocoded_address->getLat(), $geocoded_address->getLng(), array('title' => $name), 'marker');

            $gMapMarker->addHtmlInfoWindow($info_window);

            $this->gMap->addMarker($gMapMarker);

            $this->gMap->centerAndZoomOnMarkers();

            //mise à jour des latitudes et longitudes
        }
        //utilisation de l'adresse de covoiturage plus (definie dans app.yml)
        else {
            $this->gMap = new GMap();
            //récupération de l'adresse de covoiturage plus (definie dans app.yml)
            $geocoded_address = $this->gMap->geocode(sfConfig::get('app_covoiturage_adresse_map'));
            $gMapMarker = new GMapMarker($geocoded_address->getLat(), $geocoded_address->getLng());
            //$gMapMarker->addHtmlInfoWindow('<b>Address:</b><br />'.sfConfig::get('app_covoiturage_adresse_map'));
            $this->gMap->addMarker($gMapMarker);

            //$this->gMap->addMarker(new GMapMarker($geocoded_address->getLat(),$geocoded_address->getLng()));
            $this->gMap->centerAndZoomOnMarkers();
            //$val_test = $geocoded_address->getLat()."-".$geocoded_address->getLng();
            //$val_test = $gAddress->getRawAddress();
        }

        $this->form = new CpEtablissementSocieteForm($cp_etablissement);
        
        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }

    //visualisation d'une Raison Sociale
    public function executeVisuSociete(sfWebRequest $request) {
        $this->forward404Unless($cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object cp_etablissement does not exist (%s).', $request->getParameter('cp_etablissement_id')));
        $this->cp_etablissement = $cp_etablissement;

        /*
         * récuprération des informations de la fiche pour centrer la carte GoogleMap
         */
        //utilisation des coordonnées

        $val_test = 0;
        if (($cp_etablissement->getCpEtablissementLatitude() != '0.000000000'
                && !is_null($cp_etablissement->getCpEtablissementLatitude())
                && $cp_etablissement->getCpEtablissementLatitude() != '')
                && ($cp_etablissement->getCpEtablissementLongitude() != '0.000000000'
                && !is_null($cp_etablissement->getCpEtablissementLongitude())
                && $cp_etablissement->getCpEtablissementLongitude() != '')) {

            $this->gMap = new GMap();
            //récupération de l'adresse du lieu à partir des coordonnées
            // Reverse geocoding of the center of the map
            $geocoded_address = new GMapGeocodedAddress(null);
            $geocoded_address->setLat($cp_etablissement->getCpEtablissementLatitude());
            $geocoded_address->setLng($cp_etablissement->getCpEtablissementLongitude());
            $geocoded_address->reverseGeocode($this->gMap->getGMapClient());

            //gestion de l'adresse dans la bulle
            $info_window = new GMapInfoWindow('<div class="icon_map"><b>Addresse:</b><br />' . $geocoded_address->getGeocodedAddress() . '</div>');
            $gMapEvent = new GMapEvent('click', "get_click_coord", false);
            $this->gMap->addEvent($gMapEvent);
            $this->gMap->addGlobalVariable('marker', 'null');

            $name = '"' . $cp_etablissement->getCpEtablissementEtablissementNom() . '"';

            $gMapMarker = new GMapMarker($cp_etablissement->getCpEtablissementLatitude(), $cp_etablissement->getCpEtablissementLongitude(), array('title' => $name), 'marker');

            $gMapMarker->addHtmlInfoWindow($info_window);

            $this->gMap->addMarker($gMapMarker);

            $this->gMap->centerAndZoomOnMarkers();
        }
        //utilisation de l'adresse
        elseif ($cp_etablissement->getCpEtablissementAdresse1() != '' && $cp_etablissement->getCpEtablissementCodePostal() != '' && $cp_etablissement->getCpEtablissementVilleId() != '') {
            //génération de l'adresse pour GMap
            $adresse = $cp_etablissement->getCpEtablissementAdresse1() . ", " . $cp_etablissement->getCpEtablissementCodePostal() . " " . $depVille['nom_ville'];

            $this->gMap = new GMap();
            //récupération de l'adresse du lieu
            $geocoded_address = $this->gMap->geocode($adresse);
            //gestion de l'adresse dans la bulle
            $info_window = new GMapInfoWindow('<div class="icon_map"><b>Addresse:</b><br />' . $adresse . '</div>');
            $gMapEvent = new GMapEvent('click', "get_click_coord", false);
            $this->gMap->addEvent($gMapEvent);
            $this->gMap->addGlobalVariable('marker', 'null');

            $name = '"' . $cp_etablissement['cp_etablissement_etablissement_nom'] . '"';

            $gMapMarker = new GMapMarker($geocoded_address->getLat(), $geocoded_address->getLng(), array('title' => $name), 'marker');

            $gMapMarker->addHtmlInfoWindow($info_window);

            $this->gMap->addMarker($gMapMarker);

            $this->gMap->centerAndZoomOnMarkers();

            //mise à jour des latitudes et longitudes
        }
        //utilisation de l'adresse de covoiturage plus (definie dans app.yml)
        else {
            $this->gMap = new GMap();
            //récupération de l'adresse de covoiturage plus (definie dans app.yml)
            $geocoded_address = $this->gMap->geocode(sfConfig::get('app_covoiturage_adresse_map'));
            $gMapMarker = new GMapMarker($geocoded_address->getLat(), $geocoded_address->getLng());
            //$gMapMarker->addHtmlInfoWindow('<b>Address:</b><br />'.sfConfig::get('app_covoiturage_adresse_map'));
            $this->gMap->addMarker($gMapMarker);

            //$this->gMap->addMarker(new GMapMarker($geocoded_address->getLat(),$geocoded_address->getLng()));
            $this->gMap->centerAndZoomOnMarkers();
            //$val_test = $geocoded_address->getLat()."-".$geocoded_address->getLng();
            //$val_test = $gAddress->getRawAddress();
        }
        
        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }else{
            $this->popup = 0;
        }
    }

    /*
     * fonction d'autocomplétion pour les établissement
     */

    public function executeAutocompleteRs(sfWebRequest $request) {

        $cp_etablissement = new CpEtablissement();
        $this->results = $cp_etablissement->getEtablissementAutocompleteRs($request->getParameter('q'));
        $this->setLayout(false);
    }

    /*
     * acces à la liste des inscrits par appel à un composant dans le template
     * listeInscrit
     */

    public function executeListeInscrit(sfWebRequest $request) {

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        //passage de l'id etablissement
        $this->cp_etablissement_id = $request->getParameter('cp_etablissement_id');
    }

    /*
     * acces à la liste des contacts par appel à un composant dans le template
     * listeInscrit
     */

    public function executeListeContact(sfWebRequest $request) {

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        //passage de l'id etablissement
        $this->etb = $request->getParameter('cp_etablissement_id');
    }

    /*
     * acces à la liste des contacts par appel à un composant dans le template
     * listeInscrit
     */

    public function executeListeActionEtb(sfWebRequest $request) {

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        //passage de l'id etablissement
        $this->etb = $request->getParameter('cp_etablissement_id');
    }

}
