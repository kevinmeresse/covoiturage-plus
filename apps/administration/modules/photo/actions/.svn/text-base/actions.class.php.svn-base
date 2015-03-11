<?php

/**
 * photo actions.
 *
 * @package    roulezmailn_v3
 * @subpackage photo
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class photoActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('photo', 'list');
    }

    /*
     * liste des covoitureurs avec une photo
     */

    public function executeList(sfWebRequest $request) {


        //initialisation du formulaire
        $this->form = new PhotoListForm();

        //création de la requete si le formulaire est passé
        if ($request->isMethod('post')) {
            $formnew = $request->getParameter('photo');

            foreach ($formnew as $i => $value){

                
                //récupération des éléments correspondant
                //  uniquement aux id_utilisateurs
                if(strstr($i,'id_') != ""){
                    $lg= strlen($i);
                    $lg = $lg - 3;
                    $id_covoitureur = substr($i,3,$lg);
                    
                    //traitement différent si c'est l'état général qui est sollicité
                    //  sinon le traitement de chaque élément est séparé
                    if(isset($formnew['etat_general']) && $formnew['etat_general'] != ''){ //traitement global
                        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($id_covoitureur));
                        $covoitureur->traiteEtatPhotoCovoitureur($formnew['etat_general']);
                    }else{ // traitement valeur par valeur
                        $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($id_covoitureur));
                        $covoitureur->traiteEtatPhotoCovoitureur($value);
                    }

                }

                
            }

        }


            $this->pager = new sfDoctrinePager(
                            'Covoitureur',
                            sfConfig::get('app_max_photo_covoitureur_list')
            );
            $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getPhotoCovoitureurSite());

            if($request->isMethod('post') && $formnew['page'] !='' ){
                $this->pager->setPage($formnew['page']);
            }else{
                $this->pager->setPage($request->getParameter('page', 1));
            }
            
            $this->pager->init();
        }
    }

    