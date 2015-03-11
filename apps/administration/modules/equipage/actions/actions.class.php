<?php

/**
 * equipage actions.
 *
 * @package    roulezmailn_v3
 * @subpackage equipage
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class equipageActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

        $this->forward('equipage', 'list');
    }

    /*
     * liste des équipages avec gestion de la pagination
     * et gestion de la recherche des équipages à partir du formulaire de recherche
     * inclu dans le template
     */

    public function executeList(sfWebRequest $request) {
        /*
          $this->pager = new sfDoctrinePager(
          'Equipage',
          sfConfig::get('app_max_equipage_list')
          );
          $this->pager->setQuery(Doctrine::getTable('Equipage')->getEquipageSiteNbCovoitureur());
          $this->pager->setPage($request->getParameter('page', 1));
          $this->pager->init();
         */
        //tableau des parametres passé en autocomplétion
        $this->tab_equipage_autoc = array();

        //initialisation du formulaire
        $this->form = new EquipageRechercheForm();

        //création de la requete si le formulaire est passé
        if ($request->isMethod('post')) {

            //gestion des parametres recupérés par autocompletion
            $formnew = $request->getParameter('equipagerecherche');
            $this->tab_equipage_autoc['nom_equipage'] = $formnew['nom_equipage'];
            $this->tab_equipage_autoc['depart_ville'] = $formnew['depart_ville'];
            $this->tab_equipage_autoc['dest_ville'] = $formnew['dest_ville'];
            $this->tab_equipage_autoc['covoitureur'] = $formnew['covoitureur'];
            $this->tab_equipage_autoc['id_profil'] = $formnew['id_profil'];
            $this->tab_equipage_autoc['action_statut_id'] = $formnew['action_statut_id'];

            //utilisation des validateurs existant pour nettoyer et filtrer les informations passées par le formulaire de recherche
            $this->form->bind($request->getParameter('equipagerecherche'), $request->getFiles('equipagerecherche'));


            if ($this->form->isValid()) {

                //récupération des éléments du formulaire de recherche
                //pour la création de la requete

                if (($this->tab_equipage_autoc['nom_equipage'] != '' && $this->tab_equipage_autoc['nom_equipage'] != null) ||
                        ($this->tab_equipage_autoc['depart_ville'] != '' && $this->tab_equipage_autoc['depart_ville'] != null) ||
                        ($this->tab_equipage_autoc['dest_ville'] != '' && $this->tab_equipage_autoc['dest_ville'] != null) ||
                        ($this->tab_equipage_autoc['covoitureur'] != '' && $this->tab_equipage_autoc['covoitureur'] != null) ||
                        ($this->tab_equipage_autoc['action_statut_id'] != '' && $this->tab_equipage_autoc['action_statut_id'] != null) ||
                        ($this->tab_equipage_autoc['id_profil'] != '' && $this->tab_equipage_autoc['id_profil'] != null)
                ) {
                    $this->pager = new sfDoctrinePager(
                                    'Equipage',
                                    sfConfig::get('app_max_equipage_list')
                    );
                    $this->pager->setQuery(Doctrine::getTable('Equipage')->getEquipageRecherche($this->tab_equipage_autoc['nom_equipage'], $this->tab_equipage_autoc['depart_ville'], $this->tab_equipage_autoc['dest_ville'], $this->tab_equipage_autoc['id_profil'], $this->tab_equipage_autoc['covoitureur'],$this->tab_equipage_autoc['action_statut_id']));
                    $this->pager->setPage($request->getParameter('page', 1));
                    $this->pager->init();
                } else {
                    $this->pager = new sfDoctrinePager(
                                    'Equipage',
                                    sfConfig::get('app_max_equipage_list')
                    );
                    $this->pager->setQuery(Doctrine::getTable('Equipage')->getEquipageSiteNbCovoitureur());
                    $this->pager->setPage($request->getParameter('page', 1));
                    $this->pager->init();
                }
            } else {
                //initialisation des valeurs par défaut des input autocomplétés
                $this->tab_equipage_autoc['depart_ville'] = '';
                $this->tab_equipage_autoc['dest_ville'] = '';
                $this->tab_equipage_autoc['covoitureur'] = '';

                $this->pager = new sfDoctrinePager(
                                'Equipage',
                                sfConfig::get('app_max_equipage_list')
                );
                $this->pager->setQuery(Doctrine::getTable('Equipage')->getEquipageSiteNbCovoitureur());
                $this->pager->setPage($request->getParameter('page', 1));
                $this->pager->init();
            }

            //gestion de la page liste demandée sans passage par le formulaire
        } else {
            //initialisation des valeurs par défaut des input autocomplétés
            $this->tab_equipage_autoc['depart_ville'] = '';
            $this->tab_equipage_autoc['dest_ville'] = '';
            $this->tab_equipage_autoc['covoitureur'] = '';

            $this->pager = new sfDoctrinePager(
                            'Equipage',
                            sfConfig::get('app_max_equipage_list')
            );
            $this->pager->setQuery(Doctrine::getTable('Equipage')->getEquipageSiteNbCovoitureur());
            $this->pager->setPage($request->getParameter('page', 1));
            $this->pager->init();
        }
        //$equipes = Doctrine_Core::getTable('Equipage')->getEquipageSiteNbCovoitureur();
        //$equipes->getSQLQuery();
        //print_r($equipes->getSQLQuery());
    }

    public function executeNew(sfWebRequest $request) {
        //$this->form = new EquipageForm();
        $this->messageInfo = "";
    }

    /*
     * creation d'un nouvel équipage à partir d'un trajet existant
     */

    public function executeNewEquipageTrajet(sfWebRequest $request) {
        //vérification que l'id du trajet est bien fourni
        if (is_null($request->getParameter('id_trajet'))) {
            $this->messageInfo = "le trajet n\'est pas fourni";
            $this->setTemplate('new');
        } else {
            $this->messageInfo = "";

            //récupération des informations liées au trajet
            $this->id_trajet = $request->getParameter('id_trajet');
            $trajet = Doctrine_Core::getTable('Trajet')->find($request->getParameter('id_trajet'));
            $this->infoTrajet = $trajet->getDepartVille() . " => " . $trajet->getDestinationVille();

            //initialisation des parametres par défaut pour les villes en autocomplétion
            $this->tab_ville_autoc = array();
            $this->tab_ville_autoc['ville_origine'] = $trajet->getDepartVille();
            $this->tab_ville_autoc['ville_destination'] = $trajet->getDestinationVille();

            $this->id_trajet = $request->getParameter('id_trajet');

            $equipage = new Equipage();

            $this->form = new EquipageForm($equipage);

            //initialisation du champ trajet initial avec l'id_trajet
            $this->form->setDefault('id_trajet_init', $request->getParameter('id_trajet'));
            
            //initialisation du champ initiales du createur
            $this->form->setDefault('id_profil', $this->getUser()->getProfile()->getId());
            
            
            
            
            
            
            //sélection du layout de popup en cas de demande d'affichage en popup
            if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                $this->setLayout('layout-popup');

                //indicateur de fenetre en popup pour affichage des boutons adéquats
                $this->popup = 1;
            }
        }
    }

    public function executeCreateNomMail(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new EquipageNomMailForm1();

        //vérification de la validation du formulaire par les validateurs
        $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
        if ($this->form->isValid()) {
            //récupération de la liste des trajets pour le covoitureur
            if ($request->getParameter('mail_covoitureur')) {
                $covoitureur = new Covoitureur();
                /*
                  $q = Doctrine_Query::create()
                  ->from('Covoitureur c')
                  ->where('c.mail=?', $request->getParameter('mail_covoitureur'));

                  return $q->execute();
                 */
                $covoitureur = Doctrine::getTable('Covoitureur c')
                        ->createQuery('a')
                        ->where('c.mail=?', $request->getParameter('mail_covoitureur'))
                        ->execute();

                //retour 404 si pas de covoitureur trouvé
                $this->forward404Unless($covoitureur);

                //récupération de la liste des trajets pour ce covoitureur
                $this->trajetList = Doctrine::getTable('Trajet t')
                        ->createQuery('a')
                        ->where('t.id_utilisateur=?', $covoitureur->getIdUtilisateur())
                        ->execute();
            }

            $this->redirect('equipage/edit?id_equipage=' . $equipage->getIdEquipage());
        }



        //$this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        //insertion des informations nécessaire à une création
        $equipage = New Equipage();

        $equipage->setIdSite(sfConfig::get('sf_id_site_client'));

        //gestion de la date de modification
        $now = date("Y-m-d H:i:s");
        $equipage->setDateCreation($now);
        $equipage->setDateModification($now);
        
        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        //génération de la clé
        $outil = New Util();
        $equipage->setCle($outil->genereCle('', ''));

        $this->form = new EquipageForm($equipage);

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($equipage = Doctrine_Core::getTable('Equipage')->find(array($request->getParameter('id_equipage'))), sprintf('Object equipage does not exist (%s).', $request->getParameter('id_equipage')));
        $this->form = new EquipageForm($equipage);

        //initialisation des parametres par défaut pour les en autocomplétion
        $this->tab_ville_autoc = array();

        //récupération des informations liées aux villes
        //$this->id_trajet = $request->getParameter('id_trajet');
        if ($equipage->getIdVilleOrigine() != 0) {
            $villeOrigine = Doctrine_Core::getTable('VilleFr')->findOneByCodeInsee($equipage->getIdVilleOrigine());
            $this->tab_ville_autoc['ville_origine'] = $villeOrigine->getNomVille();
        } else {
            $this->tab_ville_autoc['ville_origine'] = '';
        }

        if ($equipage->getIdVilleDestination() != 0) {
            $villeDestination = Doctrine_Core::getTable('VilleFr')->findOneByCodeInsee($equipage->getIdVilleDestination());
            $this->tab_ville_autoc['ville_destination'] = $villeDestination->getNomVille();
        } else {
            $this->tab_ville_autoc['ville_destination'] = '';
        }


        //passage du parametre equipage pour appel liste des covoitureurs
        $this->id_equipage = $request->getParameter('id_equipage');
        
        //passage de l'id trajet origine de l'équipage
        $this->id_trajet_origine = $equipage->getIdTrajet();
        
        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }

    /*
     * visualisationde l'équipage
     */

    public function executeShow(sfWebRequest $request) {
        $this->forward404Unless($this->equipage = Doctrine_Core::getTable('Equipage')->find(array($request->getParameter('id_equipage'))), sprintf('Object equipage does not exist (%s).', $request->getParameter('id_equipage')));
        //$this->form = new EquipageForm($equipage);
        //récupération des informations liées au trajet
        //$this->id_trajet = $request->getParameter('id_trajet');
        //$trajet = Doctrine_Core::getTable('Trajet')->find($this->equipage->getIdTrajet());
        //$this->infoTrajet = $trajet->getDepartVille() . " => " . $trajet->getDestinationVille();
        //passage du parametre equipage pour appel liste des covoitureurs
        $this->id_equipage = $request->getParameter('id_equipage');
        
        //passage de l'id trajet origine de l'équipage
        $this->id_trajet_origine = $this->equipage->getIdTrajet();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
        
        
        // récupération de la liste des trajets pour l'équipage
        $q = Doctrine_Query::create()
              //->select('t.*, tmer.id_trajet_mise_en_relation as tmerid, tmer.etat as tmeretat')
                ->select('t.*')
              ->from('Trajet t')
              //->leftJoin('t.TrajetMiseEnRelation tmer')
              ->where('t.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('t.id_equipage = ?', $request->getParameter('id_equipage'))
                ->orderBy('t.date_modification')
                ;
        
        $this->trajets = $q->execute();
        
        //Gestion de GM Api  pour affichage de la carte
        $this->gmapCentre = array("lat" => "48.113475", "long" => "-1.675708");
        /*
        $this->gmapItineraireDepart = array("lat" => $this->trajet->getDepartLongitude(), "long" => $this->trajet->getDepartLatitude());
        $this->gmapItineraireDestination = array("lat" => $this->trajet->getDestinationLongitude(), "long" => $this->trajet->getDestinationLatitude());
        $this->gmapItineraireEtapes = array($this->trajet->getEtape1Ville(), $this->trajet->getEtape2Ville(), $this->trajet->getEtape3Ville(), $this->trajet->getEtape4Ville(), $this->trajet->getEtape5Ville());
         * 
         */
        
        //tableau général des trajets
        $this->tabTrajetMaps = array();
        
        //compteur pour le tableau de tableau de coordonnées
        $i = 0;
        
        foreach ($this->trajets as $trajet){
            if($trajet->getDepartLongitude() == '' 
                    || $trajet->getDepartLongitude() == null 
                    || $trajet->getDepartLatitude() == ''
                    || $trajet->getDepartLatitude() == null){
                $latLong = $trajet->getDepartVilleLatLong();
                $depLongitude = $latLong["longitude"];
                $depLatitude  = $latLong["latitude"];
            }else{
                $depLongitude = $trajet->getDepartLongitude();
            $depLatitude = $trajet->getDepartLatitude();
            }
            
            if($trajet->getDestinationLongitude() == '' 
                    || $trajet->getDestinationLongitude() == null 
                    || $trajet->getDestinationLatitude() == ''
                    || $trajet->getDestinationLatitude() == null){
                $latLong = $trajet->getDepartVilleLatLong();
                $destLongitude = $latLong["longitude"];
                $destLatitude  = $latLong["latitude"];
            }else{
                $destLongitude = $trajet->getDestinationLongitude();
            $destLatitude = $trajet->getDestinationLatitude();
            }
            
            
            $Etape1Ville = $trajet->getEtape1Ville();
            $Etape2Ville = $trajet->getEtape2Ville();
            $Etape3Ville = $trajet->getEtape3Ville();
            $Etape4Ville = $trajet->getEtape4Ville();
            $Etape5Ville = $trajet->getEtape5Ville();
            
           // $this->trajetId = $trajet->getIdTrajet();
         /*   
        $this->gmapItineraireDepart = array("lat" => $depLongitude, "long" => $depLatitude);
        $this->gmapItineraireDestination = array("lat" => $destLongitude, "long" => $destLatitude);
        $this->gmapItineraireEtapes = array($Etape1Ville, $Etape2Ville, $Etape3Ville, $Etape4Ville, $Etape5Ville);
          * 
          */
        
        $this->tabTrajetMaps[$i] = (array('gmapItineraireDepart' => array("lat" => $depLongitude, "long" => $depLatitude),
                            'gmapItineraireDestination' => array("lat" => $destLongitude, "long" => $destLatitude),
                            'gmapItineraireEtapes' => array($Etape1Ville, $Etape2Ville, $Etape3Ville, $Etape4Ville, $Etape5Ville)
                            ));
            
            $i++;
        }
        
        /*
        $this->gmapItineraireDepart = array("lat" => $depLongitude, "long" => $depLatitude);
        $this->gmapItineraireDestination = array("lat" => $destLongitude, "long" => $destLatitude);
        $this->gmapItineraireEtapes = array($Etape1Ville, $Etape2Ville, $Etape3Ville, $Etape4Ville, $Etape5Ville);
        
         * 
         */
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($equipage = Doctrine_Core::getTable('Equipage')->find(array($request->getParameter('id_equipage'))), sprintf('Object equipage does not exist (%s).', $request->getParameter('id_equipage')));
        //gestion de la date de modification
        $now = date("Y-m-d H:i:s");
        $equipage->setDateModification($now);

        $this->form = new EquipageForm($equipage);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();


        //suppression des liens entre équipage et trajet
        if ($request->getParameter('id_equipage') != 0 && !is_null($request->getParameter('id_equipage'))) {
            //récupération de la liste des trajets liés
            $listeTrajets = Doctrine_Core::getTable('Trajet')->findByIdEquipage($request->getParameter('id_equipage'));
            if (count($listeTrajets) > 0) {
                foreach ($listeTrajets as $trajet) {
                    //suppression de l'association
                    $trajet->setDissocieTrajetEquipage($request->getParameter('id_equipage'));
                }
            }
        }

        //suppression de l'équipage       
        $this->forward404Unless($equipage = Doctrine_Core::getTable('Equipage')->find(array($request->getParameter('id_equipage'))), sprintf('Object equipage does not exist (%s).', $request->getParameter('id_equipage')));
        $equipage->delete();

        $this->redirect('equipage/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            //vérification si le formulaire est en création ou en update
            $newInd = 0;
            if ($form->getObject()->isNew()) {
                $newInd = 1;
            }
            //$equipage->setIdTrajet($form->getValue('id_trajet_init'));
            $equipage = $form->save();
            //$equipage->setIdTrajet($form->getValue('id_trajet_init'));
            //$equipage->setIdCreateur($newInd);
            //$equipage->save();
            //en cas de création de'un nouvel équipage
            //mise à jour du trajet avec inscription de l'id_equipage
            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $equipage->setDateCreation($now);
            }
            $equipage->setDateModification($now);

            if ($newInd == 1 && !is_null($form->getValue('id_trajet_init'))) {
                $trajet = Doctrine_Core::getTable('Trajet')->find(array($form->getValue('id_trajet_init')));
                $trajet->setIdEquipage($equipage->getIdEquipage());
                $trajet->save();

                //sélection du trajet comme trajet principal
                $equipage->setIdTrajet($form->getValue('id_trajet_init'));

                //indication du createur de trajet
                $equipage->setIdCreateur($trajet->getIdUtilisateur());
                
                //création de l'action liée à l'attachement du trajet
                $actionCv = new CpActionCv();

                //gestion de la date de modification
                $actionCv->setCpActionCvDateCreation($now);
                $actionCv->setCpActionCvDateModification($now);

                $message = sfConfig::get('app_detail_attach_trajet_princ_equipage')." (trajet: ".$this->id_trajet.") (equipage: ".$equipage->getIdEquipage() .")";

                $actionCv->setCpActionCvCpTypeActionId(sfConfig::get('app_attach_trajet_princ_action_id'));
                $actionCv->setCpActionCvDetail($message);

                $actionCv->setCpActionCvCovoitureurId($trajet->getIdUtilisateur());
                $actionCv->setCpActionCvUserId($this->getUser()->getGuardUser()->getId());

                $actionCv->setCpActionCvTrajetId($trajet->getIdTrajet());

                $actionCv->save();
                
                //indication par mail au covitureur de la création de l'équipage
                //Preparation du mail                
                $params['subject'] = "Rattachement à équipage nouvellement créé";
                $params['to'] = $trajet->getCovoitureur()->getMail();
                $params['from'] = sfConfig::get('sf_mail_envoi');
                $params["message"] = "Vous venez d\'être rattaché à un équipage nouvellement créé";

                //envoi mail
                $outil = New Util();
                //$outil->envoi_mail($this, "NouvelEquipageSurTrajet", $params);
            }

            //mise à jour de la ville
            //extraction des infos entre parentheses
            $outil = new Util();

            //mise à jour des informations liées aux villes
            //ville origine 
            $chaine = $outil->extractCpLibelle($form->getValue('ville_origine'));
            $origineVille = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine);

            if (isset($origineVille)) {
                $equipage->setIdVilleOrigine($origineVille['code_insee']);
            }

            //ville destination 
            $chaine = $outil->extractCpLibelle($form->getValue('ville_destination'));
            $destinationVille = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine);

            if (isset($origineVille)) {
                $equipage->setIdVilleDestination($destinationVille['code_insee']);
            }
            $equipage->save();

            $this->getUser()->setFlash('notice', sprintf('Votre équipage vient d\'être modifié.'));
            
            
            


            //$this->redirect('equipage/edit?id_equipage=' . $equipage->getIdEquipage());
            
            //sélection du layout de popup en cas de demande d'affichage en popup
                if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                    $this->redirect('equipage/show?popup=1&id_equipage=' . $equipage->getIdEquipage());
                } else {
                    $this->redirect('equipage/show?id_equipage=' . $equipage->getIdEquipage());
                }
        }
    }

}
