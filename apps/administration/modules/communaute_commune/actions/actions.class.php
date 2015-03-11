<?php

/**
 * communaute_commune actions.
 *
 * @package    roulezmailn_v3
 * @subpackage communaute_commune
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class communaute_communeActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->communaute_communes = Doctrine_Core::getTable('CommunauteCommune')
                        ->createQuery('a')
                        ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new CommunauteCommuneForm();

        $this->ville_ref = $this->form->getValue('ville_ref');
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('communaute_commune');
        $this->depart_ville = $formnew['ville_ref'];


        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville_ref'] = $formnew['ville_ref'];

        $communautecommune = New CommunauteCommune();


        $this->form = new CommunauteCommuneForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($communaute_commune = Doctrine_Core::getTable('CommunauteCommune')->find(array($request->getParameter('id_communaute'))), sprintf('Object communaute_commune does not exist (%s).', $request->getParameter('id_communaute')));
        $this->form = new CommunauteCommuneForm($communaute_commune);

        $this->addCcForm = new VilleFrAddCcForm();

        //génération de la ville si elle n'est pas renseignée dans le formulaire
        $this->ville_ref = $communaute_commune->getVilleFr()->getNomVille();

        //passage de l'id de la communaute de commune pour la liste des villes liées
        $this->id_cc = $request->getParameter('id_communaute');
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($communaute_commune = Doctrine_Core::getTable('CommunauteCommune')->find(array($request->getParameter('id_communaute'))), sprintf('Object communaute_commune does not exist (%s).', $request->getParameter('id_communaute')));
        $this->form = new CommunauteCommuneForm($communaute_commune);



        $this->ville_ref = $this->form->getValue('ville_ref');

        //passage de l'id de la communaute de commune pour la liste des villes liées
        $this->id_cc = $request->getParameter('id_communaute');

        $this->addCcForm = new VilleFrAddCcForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($communaute_commune = Doctrine_Core::getTable('CommunauteCommune')->find(array($request->getParameter('id_communaute'))), sprintf('Object communaute_commune does not exist (%s).', $request->getParameter('id_communaute')));
        $communaute_commune->delete();

        $this->redirect('communaute_commune/index');
    }

    /*
     * ajout de ville à la communaute de commun
     * insère l'id-communaute au niveau de l'enregistrement de la ville
     */

    public function executeAddVille(sfWebRequest $request) {

        $this->addCcForm = new VilleFrAddCcForm();

        $this->processAddVilleForm($request, $this->addCcForm);

        $this->redirect('communaute_commune/edit?id_communaute=' . $request->getParameter('id_communaute'));
    }

    /*
     * supprime le lien entre la communaute de commune et la ville
     * impossible pour la ville de référence
     */

    public function executeDeleteVille(sfWebRequest $request) {
        //récupération de la ville de référence de la communauté de commune
        $communaute_commune = Doctrine_Core::getTable('CommunauteCommune')->find(array($request->getParameter('id_communaute')));
        $id_villeRef = $communaute_commune->getIdVilleRef();

        //vérification que la ville à supprimer n'est pas la ville de référence
        if ($request->getParameter('id_ville') != $id_villeRef) {
            $villeLiee = Doctrine_Core::getTable('VilleFr')->find(array($request->getParameter('id_ville')));

            $villeLiee->setIdCommunaute('0');
            $villeLiee->save();
        }


        $this->redirect('communaute_commune/edit?id_communaute=' . $request->getParameter('id_communaute'));
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {

            /*
             * modification en fonction de la présence ou non de la ville de reference
             *
             * si id_ville_ref n'est pas renseignée => on récupère les infos du champ de la ville
             *
             * si id_ville_ref est renseigné => on compare avec la ville du input
             *      si ville et cp renseigné => pris par défaut
             *      si ville uniquement on garde l'id
             */
            
            if ($form->getValue('id_ville_ref') == '' || $form->getValue('id_ville_ref') == 0) {//cas ou la ville de ref n'est pas renseignée
                //extraction des infos entre parentheses
                $outil = new Util();
                //$chaine = $outil->extractCpLibelle($form->getValue('ville_ref'));

                $tab_chaine = $outil->recupCpLibelle($form->getValue('ville_ref'));

                if ($tab_chaine['cp'] == '') { //cas ou le cp n'est pas renseigné
                    $this->forward404Unless($villeDeRef = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($tab_chaine['ville']), sprintf('Object communaute_commune does not exist (%s).', $tab_chaine['ville']));
                } else {
                    $this->forward404Unless($villeDeRef = Doctrine_Core::getTable('VilleFr')->findOneByNomVilleAndCodePostal($tab_chaine['ville'], $tab_chaine['cp']), sprintf('Object communaute_commune does not exist (%s).', $tab_chaine['ville'] . $tab_chaine['cp']));
                }

                $communaute_commune = $form->save();

                //mise à jour de l'id ville
                $communaute_commune->setIdVilleRef($villeDeRef->getIdVille());
                $communaute_commune->save();

                //mise à jour de l'id comunaute de commune dans la ville de référence
                $villeDeRef->setIdCommunaute($communaute_commune->getIdCommunaute());
                $villeDeRef->save();

                //$this->message = $mes;
                $this->redirect('communaute_commune/edit?id_communaute=' . $communaute_commune->getIdCommunaute());
            } else {//cas ou la ville de ref est  renseignée
                //extraction des infos entre parentheses
                $outil = new Util();
                //$chaine = $outil->extractCpLibelle($form->getValue('ville_ref'));

                $tab_chaine = $outil->recupCpLibelle($form->getValue('ville_ref'));

                if ($tab_chaine['cp'] == '') { //cas ou le cp n'est pas renseigné
                    $this->forward404Unless($villeDeRef = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($tab_chaine['ville']), sprintf('Object communaute_commune does not exist (%s).', $tab_chaine['ville']));
                } else {
                    $this->forward404Unless($villeDeRef = Doctrine_Core::getTable('VilleFr')->findOneByNomVilleAndCodePostal($tab_chaine['ville'], $tab_chaine['cp']), sprintf('Object communaute_commune does not exist (%s).', $tab_chaine['ville'] . $tab_chaine['cp']));
                }

                if ($villeDeRef->getIdVille() != $form->getValue('id_ville_ref')) { //cas ou la ville de ref est différente
                    $communaute_commune = $form->save();

                    //mise à jour de l'id ville
                    $communaute_commune->setIdVilleRef($villeDeRef->getIdVille());
                    $communaute_commune->save();

                    //mise à jour de l'id comunaute de commune dans la ville de référence
                    $villeDeRef->setIdCommunaute($communaute_commune->getIdCommunaute());
                    $villeDeRef->save();

                    $this->getUser()->setFlash('notice', sprintf('Les modifications ont été apportées et la ville de référence modifiée.'));

                } else {//cas ou la ville de ref est la meme
                    $communaute_commune = $form->save();

                    $this->getUser()->setFlash('notice', sprintf('Les modifications ont été apportées.'));
                }
                $this->redirect('communaute_commune/edit?id_communaute=' . $communaute_commune->getIdCommunaute());
            }
            /*
            //extraction des infos entre parentheses
            $outil = new Util();
            //$chaine = $outil->extractCpLibelle($form->getValue('ville_ref'));

            $tab_chaine = $outil->recupCpLibelle($form->getValue('ville_ref'));

            //récupération de l'id de la ville     
            //$this->forward404Unless($villeDeRef = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine), sprintf('Object communaute_commune does not exist (%s).', $chaine));
            if ($villeDeRef = Doctrine_Core::getTable('VilleFr')->findOneByNomVilleAndCodePostal($tab_chaine['ville'], $tab_chaine['cp'])) {
                $mes = "Communauté de commune crée";
                //sauvegarde du formulaire

                $communaute_commune = $form->save();

                //mise à jour de l'id ville
                $communaute_commune->setIdVilleRef($villeDeRef->getIdVille());
                $communaute_commune->save();

                //mise à jour de l'id comunaute de commune dans la ville de référence
                $villeDeRef->setIdCommunaute($communaute_commune->getIdCommunaute());
                $villeDeRef->save();

                $this->message = $mes;
                $this->redirect('communaute_commune/edit?id_communaute=' . $communaute_commune->getIdCommunaute());
            } else {
                $mes = "Re-saisissez la commune.";
                $this->message = $mes;
            }
            */
            //if(count($villeDeRef))
            //$this->redirect('communaute_commune/edit?id_communaute=' . $communaute_commune->getIdCommunaute());
            //$this->redirect('communaute_commune/new');
        }else{ // formulaire invalid
            $this->getUser()->setFlash('notice', sprintf('Il y a un probleme sur le remplissage du formulaire.'));

        }
    }

    protected function processAddVilleForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {

            $tab_chaine = array();

            //extraction des infos entre parentheses
            $outil = new Util();
            //$chaine = $outil->extractCpLibelle($form->getValue('nom_ville'));
            $tab_chaine = $outil->recupCpLibelle($form->getValue('nom_ville'));


            //récupération de l'id de la ville     
            $villeDeRef = Doctrine_Core::getTable('VilleFr')->findOneByNomVilleAndCodePostal($tab_chaine['ville'], $tab_chaine['cp']);


            //mise à jour de l'id comunaute de commune dans la ville de référence
            $villeDeRef->setIdCommunaute($form->getValue('id_communaute'));
            $villeDeRef->save();


            $this->redirect('communaute_commune/edit?id_communaute=' . $form->getValue('id_communaute'));
        }
    }

}
