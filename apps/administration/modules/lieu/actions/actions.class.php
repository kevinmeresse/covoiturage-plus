<?php

/**
 * lieu actions.
 *
 * @package    roulezmailn_v3
 * @subpackage lieu
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 * @todo       adapter le code et le javascript pour deplacer le marker et récupérer directement
 *              les informations d'adresse et de coordonnées
 */
class lieuActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

        $this->forward('lieu', 'list');
    }

    public function executeList(sfWebRequest $request) {

        //initialisation du formulaire de recherche et filtre
        $this->formRecherche = new LieuRechercheForm();

        //indicateur de validité du formulaire de recherche pour la requete
        $this->ind_valid = 0;

        //variable permettant le transfert dans le formulaire de la ville autocompléteé
        $this->tab_ville_autoc = array();

        //indicateur de leiu de type "lieu" (et non evenement)
        $this->tab_ville_autoc['evenement'] = 0;

        $this->tab_ville_autoc['ville'] = '';
        $this->tab_ville_autoc['id_lieu_type'] = 0;

        $villeId = 0;

        //variable permettant de passer la requete dans le pager
        $this->pagerRequete = '';



        if ($request->isMethod('post')) { //cas du passage par formulaire
            $this->formRecherche->bind($request->getParameter('lieuRecherche'), $request->getFiles('lieuRecherche'));
            if ($this->formRecherche->isValid()) {

                $formulaire = $this->formRecherche->getValues();


                if ($formulaire['id_lieu_type'] != '' && !is_null($formulaire['id_lieu_type'])) {
                    $this->ind_valid = 1;
                    $this->pagerRequete .= '/id_lieu_type/' . $formulaire['id_lieu_type'];
                    $this->tab_ville_autoc['id_lieu_type'] = $formulaire['id_lieu_type'];
                }

                if ($formulaire['ville'] != '' && !is_null($formulaire['ville'])) {
                    $this->ind_valid = 1;
                    //$this->pagerRequete .= '/ville/' . $formulaire['ville'];
                    $outil = new Util();
                    $chaine = $outil->extractCpLibelle($formulaire['ville']);
                    $villeId = Doctrine_Core::getTable('VilleFr')->getIdVille($chaine);
                    //$this->villeId = $villeId;

                    $this->tab_ville_autoc['ville'] = $formulaire['ville'];

                    $this->pagerRequete .= '/ville/' . $formulaire['ville'] . '/villeId/' . $villeId;
                }
            } else {
                $this->tab_ville_autoc['ville'] = '';
                $this->tab_ville_autoc['id_lieu_type'] = 0;
                $villeId = 0;
            }
        } else {  //cas du passage par pager
            if ($request->getParameter('id_lieu_type') != '' && !is_null($request->getParameter('id_lieu_type') && $request->getParameter('id_lieu_type') != 0)) {
                $this->ind_valid = 1;
                $this->pagerRequete .= '/id_lieu_type/' . $formulaire['id_lieu_type'];
                $this->tab_ville_autoc['id_lieu_type'] = $formulaire['id_lieu_type'];
            }


            //mise à jour du formulaire avec la valeur passée
            $this->formRecherche->setDefault('id_lieu_type', $request->getParameter('id_lieu_type'));


            if ($request->getParameter('ville')) {
                $this->tab_ville_autoc['ville'] = $request->getParameter('ville');
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
                $this->ind_valid = 0;
            }
        }

        //suppression des éléments entre parenthese dans le nom de l'établissement
        //extraction des infos entre parentheses
        $outil = new Util();

        if ($this->tab_ville_autoc['ville'] != '') {
            $chaineNomEtb = $outil->extractCpLibelle($this->tab_ville_autoc['ville']);
        } else {
            $chaineNomEtb = null;
        }




        $this->pager = new sfDoctrinePager(
                        'Lieu',
                        sfConfig::get('app_max_lieu_list')
        );

        //récupération des lieux limités au site
        //$this->pager->setQuery(Doctrine::getTable('Lieu')->getLieuSite());
        $this->pager->setQuery(Doctrine::getTable('Lieu')->getLieuRechercheSite(null, $this->tab_ville_autoc['ville'], $villeId, $this->tab_ville_autoc['id_lieu_type']));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    //liste des lieux de type "evenement"
    public function executeListEvenement(sfWebRequest $request) {

        //variable permettant le transfert dans le formulaire de la ville autocompléteé
        $this->tab_ville_autoc = array();

        //indicateur de leiu de type "lieu" (et non evenement)
        $this->tab_ville_autoc['evenement'] = 1;

        $this->pager = new sfDoctrinePager(
                        'Lieu',
                        sfConfig::get('app_max_lieu_list')
        );

        //récupération des lieux limités au site et au type evenement
        $this->pager->setQuery(Doctrine::getTable('Lieu')->getLieuEvenementSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeNew(sfWebRequest $request) {
        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        if ($request->isMethod('post')) {
            $formnew = $request->getParameter('lieu');
            $this->tab_ville_autoc['ville'] = $formnew['ville'];
        } else {
            $this->tab_ville_autoc['ville'] = '';
        }
        $this->tab_ville_autoc['adresse'] = '';
        $this->tab_ville_autoc['latitude'] = '';
        $this->tab_ville_autoc['longitude'] = '';
        $this->tab_ville_autoc['code_postal'] = '';
        //indicateur permettant de connaitre le type lieu evenement
        $this->tab_ville_autoc['evenement'] = 0;

        $this->form = new LieuForm();
    }

    //nouveau lieu de type "Evnement"
    public function executeNewEvenement(sfWebRequest $request) {
        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        if ($request->isMethod('post')) {
            $formnew = $request->getParameter('lieu');
            $this->tab_ville_autoc['ville'] = $formnew['ville'];
        } else {
            $this->tab_ville_autoc['ville'] = '';
        }
        $this->tab_ville_autoc['adresse'] = '';
        $this->tab_ville_autoc['latitude'] = '';
        $this->tab_ville_autoc['longitude'] = '';
        $this->tab_ville_autoc['code_postal'] = '';

        //indicateur permettant de connaitre le type lieu evenement
        $this->tab_ville_autoc['evenement'] = 1;

        $this->form = new LieuEvenementForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->test = 0;

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = '';

        //indicateur permettant de connaitre le type lieu evenement
        $this->tab_ville_autoc['evenement'] = 0;
        $this->form = new LieuForm();
        $this->processForm($request, $this->form);
        $this->setTemplate('new');
    }

    //nouveau lieu de type "Evnement"
    public function executeCreateEvenement(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->test = 0;

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = '';

        //indicateur permettant de connaitre le type lieu evenement
        $this->tab_ville_autoc['evenement'] = 1;
        $this->form = new LieuEvenementForm();
        $this->processFormEvenement($request, $this->form);
        $this->setTemplate('newEvenement');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($lieu = Doctrine_Core::getTable('Lieu')->find(array($request->getParameter('id_lieu'))), sprintf('Object lieu does not exist (%s).', $request->getParameter('id_lieu')));
        //$this->form = new LieuForm($lieu);

        $this->tab_ville_autoc = array();

        //indicateur permettant de connaitre le type lieu evenement
        $this->tab_ville_autoc['evenement'] = 0;

        $ville = Doctrine_Core::getTable('VilleFr')->getVilleFromFrId($lieu->getCodeInsee());
        $this->form = new LieuForm($lieu);
        $this->form->setDefault('ville', $ville->getNomVille());
        $this->form->setDefault('code_postal', $ville->getCodePostal());
    }

    //edition d'un lieu de type Evenement
    public function executeEditEvenement(sfWebRequest $request) {
        $this->forward404Unless($lieu = Doctrine_Core::getTable('Lieu')->find(array($request->getParameter('id_lieu'))), sprintf('Object lieu does not exist (%s).', $request->getParameter('id_lieu')));
        //$this->form = new LieuForm($lieu);

        $this->tab_ville_autoc = array();

        //indicateur permettant de connaitre le type lieu evenement
        $this->tab_ville_autoc['evenement'] = 1;


        $ville = Doctrine_Core::getTable('VilleFr')->getVilleFromFrId($lieu->getCodeInsee());
        $this->form = new LieuEvenementForm($lieu);
        $this->form->setDefault('ville', $ville->getNomVille());
        $this->form->setDefault('code_postal', $ville->getCodePostal());
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($lieu = Doctrine_Core::getTable('Lieu')->find(array($request->getParameter('id_lieu'))), sprintf('Object lieu does not exist (%s).', $request->getParameter('id_lieu')));

        $this->form = new LieuForm($lieu);

        $this->processForm($request, $this->form);

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();

        $this->tab_ville_autoc['ville'] = Doctrine_Core::getTable('VilleFr')->getNomVilleFromFrId($lieu->getCodeInsee());

        //indicateur permettant de connaitre le type lieu evenement
        $this->tab_ville_autoc['evenement'] = 0;

        $this->setTemplate('edit');
    }

    public function executeUpdateEvenement(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($lieu = Doctrine_Core::getTable('Lieu')->find(array($request->getParameter('id_lieu'))), sprintf('Object lieu does not exist (%s).', $request->getParameter('id_lieu')));

        $this->form = new LieuEvenementForm($lieu);

        $this->processFormEvenement($request, $this->form);

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();

        $this->tab_ville_autoc['ville'] = Doctrine_Core::getTable('VilleFr')->getNomVilleFromFrId($lieu->getCodeInsee());

        //indicateur permettant de connaitre le type lieu evenement
        $this->tab_ville_autoc['evenement'] = 1;

        $this->setTemplate('editEvenement');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($lieu = Doctrine_Core::getTable('Lieu')->find(array($request->getParameter('id_lieu'))), sprintf('Object lieu does not exist (%s).', $request->getParameter('id_lieu')));
        $lieu->delete();

        $this->redirect('lieu/list');
    }

    //delete des lieux de type "Evenement"
    public function executeDeleteEvenement(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($lieu = Doctrine_Core::getTable('Lieu')->find(array($request->getParameter('id_lieu'))), sprintf('Object lieu does not exist (%s).', $request->getParameter('id_lieu')));
        $lieu->delete();

        $this->redirect('lieu/listEvenement');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }


        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $lieu = $form->save();
            $this->tab_ville_autoc = array();
            //gestion des dates
            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");
            if ($newInd == 1) {
                $lieu->setDateCreation($now);
                $lieu->setIdSite(sfConfig::get('sf_id_site_client'));
            }
            $lieu->setDateModification($now);
            $lieu->setLatitude($form->getValue('latitude'));
            $lieu->setLongitude($form->getValue('longitude'));
            $maVille = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle("", $form->getValue('ville'));
            $lieu->setCodeInsee('fr-' . $maVille[0]['id_ville']);
            $lieu->save();
            $this->redirect('lieu/edit?id_lieu=' . $lieu->getIdLieu());
        }
    }

    //process des lieux de type "Evenement"
    protected function processFormEvenement(sfWebRequest $request, sfForm $form) {
        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $lieu = $form->save();
            $this->tab_ville_autoc = array();
            //gestion des dates
            //gestion de la date de modification et de la date de création            
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $lieu->setDateCreation($now);
                $lieu->setIdSite(sfConfig::get('sf_id_site_client'));
            }
            $lieu->setDateModification($now);
            //récupération des informations de lieux
            $lieu->setLatitude($form->getValue('latitude'));
            $lieu->setLongitude($form->getValue('longitude'));
            $maVille = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle("", $form->getValue('ville'));
            $lieu->setCodeInsee('fr-' . $maVille[0]['id_ville']);
            $lieu->save();
            $this->redirect('lieu/editEvenement?id_lieu=' . $lieu->getIdLieu());
        }
    }

}
