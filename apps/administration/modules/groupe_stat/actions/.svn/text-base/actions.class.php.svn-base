<?php

/**
 * groupe_stat actions.
 *
 * @package    roulezmailn_v3
 * @subpackage groupe_stat
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class groupe_statActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
        $this->groupe_stats = Doctrine_Core::getTable('GroupeStat')
                ->createQuery('a')
                ->where('a.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('a.etat = 1')
                ->orderBy('a.intitule')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new GroupeStatForm();

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = '';

        $this->tab_param ='';
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new GroupeStatForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($groupe_stat = Doctrine_Core::getTable('GroupeStat')->find(array($request->getParameter('id_groupe_stat'))), sprintf('Object groupe_stat does not exist (%s).', $request->getParameter('id_groupe_stat')));
        $this->form = new GroupeStatForm($groupe_stat);
        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = '';

        //passage de parametre servant à la sérialisation des données ville
        $this->tab_param = $groupe_stat->getParametres();
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($groupe_stat = Doctrine_Core::getTable('GroupeStat')->find(array($request->getParameter('id_groupe_stat'))), sprintf('Object groupe_stat does not exist (%s).', $request->getParameter('id_groupe_stat')));
        $this->form = new GroupeStatForm($groupe_stat);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($groupe_stat = Doctrine_Core::getTable('GroupeStat')->find(array($request->getParameter('id_groupe_stat'))), sprintf('Object groupe_stat does not exist (%s).', $request->getParameter('id_groupe_stat')));
        $groupe_stat->delete();

        $this->redirect('groupe_stat/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        //vérification si le formulaire est en création ou en update
        $newInd = 0;
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }

        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $groupe_stat = $form->save();

            //gestion des dates
            //gestion de la date de modification et de la date de création
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $groupe_stat->setDateCreation($now);
                $groupe_stat->setIdSite(sfConfig::get('sf_id_site_client'));
            }
            $groupe_stat->setDateModification($now);

            $groupe_stat->setParametres($form->getValue('tab_param'));

            $groupe_stat->save();

            $this->redirect('groupe_stat/edit?id_groupe_stat='.$groupe_stat->getIdGroupeStat());
        }
    }

    /****************************************************/
    /*    gestion des villes ajoutées dans les groupes  */
    /****************************************************/
    /*
     * méthode permettant d'ajouter ou supprimer les villes dans un tableau
     *  serialisé pour la gestion des groupes (de villes) pour les statistiques
    */
    public function executeAddDelVille(sfWebRequest $request) {
        //récupération des parametres passés
        // sens : add/del => determine si la ville est ajoutée ou supprimée de la liste
        // tab : valeur du tableau préalablement sérialisé (sur lequel l'opération va etre éffectuée dans cette méthode)
        // ville : ville saisie (par autocomplétion)

        //message d'erreur potentielle
        $this->message_erreur = '';

        //tableau pour la récupération des informations de la ville
        $tab_ville = array();

        //tableau servant serialiser les données (id des villes)
        $this->tab_id_ville = array();

        //valuer de l'id de la ville servant lors de la suppression d'une ville
        $id_ville = 0;

        if(!is_null($request->getParameter('tab_param')) && $request->getParameter('tab_param') != ''){
            $this->tab_id_ville = unserialize($request->getParameter('tab_param'));
        }
        

        if($request->getParameter('sens') == 'add') {  //ajout de la ville à la liste
            //vérification de la présence des paramètres
            if($request->getParameter('ville') == '' ) {
                $this->message_erreur = 'attention, la ville n\'a pas été saisie correctement';
                //serialisation pour passage dans formulaire
                $this->tab_param = serialize($this->tab_id_ville);

            }else {//récupération d'informations liées à la ville
                $outil = new Util();
                //récupération du cp de la ville
                $tab_ville = $outil->recupCpLibelle($request->getParameter('ville'));
                if($tab_ville['error_type'] != 0) {
                    $this->message_erreur = $tab_ville['error_msg'];

                    //récupération de l'identifiant de la ville sur le libellé uniquement
                    $this->forward404Unless($ville = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle(null,$tab_ville['ville']), sprintf('Object groupe_stat does not exist (%s).', $request->getParameter('id_groupe_stat')));

                    $this->tab_id_ville[$ville[0]['id_ville']] = $ville[0]['nom_ville'];

                }else {//recuperation sur le cp et le nom de la ville
                    $this->forward404Unless($ville = Doctrine_Core::getTable('VilleFr')->infoVilleCpLibelle($tab_ville['cp'],$tab_ville['ville']), sprintf('Object groupe_stat does not exist (%s).', $request->getParameter('id_groupe_stat')));

                    $this->tab_id_ville[$ville[0]['id_ville']] = $ville[0]['nom_ville'];
                }


                //serialisation pour passage dans formulaire
                $this->tab_param = serialize($this->tab_id_ville);
            }
        }elseif($request->getParameter('sens') == 'del'){  //suppression de la ville de la liste
            //récupération de l'id de la ville à supprimer du tableau
            $id_ville = $request->getParameter('idville');

            if($id_ville == 0 || is_null($id_ville)){
                //il ne se passe rien => cas ou l'id n'est pas passé
            }else{
                unset($this->tab_id_ville[$id_ville]);
            }

            //serialisation pour passage dans formulaire
            $this->tab_param = serialize($this->tab_id_ville);

        }else{// cas ou probleme => pas de sens

        }


    }
}
