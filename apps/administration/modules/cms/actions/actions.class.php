<?php

/**
 * cms actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cms
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cmsActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    //gestion de l'arborescence du site  => CMS
    public function executeIndex(sfWebRequest $request) {
        //indicateur d'inclusion de la liste des actualités
        $this->ind_include = 1;
        
        
        //récupération des rubriques => menu et contenu
        // qui sont actives 
        // par ordre de priorité du menu puis des pages
        
        $q1 = Doctrine_Core::getTable('ContenuRubrique')
                ->createQuery('cr')
                ->leftJoin('cr.Contenu c')
                ->where('cr.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('cr.etat = 1')
                ->orderBy('cr.priorite')
                ->addOrderBy('c.priorite');

        
        //modification de la requete en fonction des permissions de l'utilisateur
        if(!$this->getUser()->hasCredential("admin")){
            $q1->andWhere('cr.id_perm = 2');
            $q1->andWhere('c.id_perm = 2');
        }
            $this->rubriques = $q1->execute();     


        //recuperation du nombre d'élément par rubrique
        $q2 = Doctrine_Query::create()
                ->from('ContenuRubrique cr')
                ->leftJoin('cr.Contenu c')
                ->select('cr.id_rubrique,count(`id_contenu`) as nb_page')
                ->where('cr.id_site = ?', sfConfig::get('sf_id_site_client'))
                //->andWhere('cr.etat = 1')
                //->andWhere('c.etat = 1')
                ->groupBy('cr.id_rubrique');
        
        //modification de la requete en fonction des permissions de l'utilisateur
        if(!$this->getUser()->hasCredential("admin")){
            $q2->andWhere('cr.id_perm = 2');
            $q2->andWhere('c.id_perm = 2');
        }
        
        //$this->requete = $q2->getSqlQuery();
        
        $nb_elemnt_rub = $q2->fetchArray();
        
        $this->tab_count = array();
        
        

        foreach ($nb_elemnt_rub as $key => $value) {

            //$tab_count[$key] = $value;
            foreach ($value as $key1 => $value1) {
                if ($key1 == 'id_rubrique') {
                    $rub = $value1;
                }
                if ($key1 == 'nb_page') {
                    $nb = $value1;
                } 
            }
            $this->tab_count[$rub] = $nb;
        }

        
        //recuperation du nombre de rubriques
         $q3 = Doctrine_Query::create()
                ->from('ContenuRubrique cr')
                ->select('count(`id_rubrique`) as nb_rubrique')
                ->where('cr.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('cr.etat = 1');
                
        
        //modification de la requete en fonction des permissions de l'utilisateur
        if(!$this->getUser()->hasCredential("admin")){
            $q3->andWhere('cr.id_perm = 2');
        }
        
        $nb_elemnt_rub = $q3->fetchArray();
        
        $this->nb_rubrique = $nb_elemnt_rub[0]['nb_rubrique'];

        
        //récupération de la rubrique actualité => menu actualité
        $actualiteRubriques = Doctrine_Core::getTable('ContenuActualiteRubrique')
                ->createQuery('cra')
                ->where('cra.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->execute();

        //récupération des actualités
        // qui sont actives et par ordre de priorité
        $actualites = Doctrine_Core::getTable('ContenuActualite')
                ->createQuery('ca')
                ->where('ca.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('ca.etat = 1')
                ->orderBy('position')
                ->execute();
    }
    
    
    /*
     * méthode pour monter une page (contenu) au niveau supérieur
     * en alternant son numéro de priorite avec le contenu qui le précède,
     * tout en gardant les memes numero de priorité (ce qui permet d'avoir des pages
     * avec un numéro de priorité qui ne se suite pas de un en un)
     */
    public function executePageUp(sfWebRequest $request) {
        //requete pour récupérer les éléments de la rubrique concernée
        $contenus = Doctrine_Core::getTable('Contenu')
                ->createQuery('co')
                ->where('co.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('co.etat = 1')
                ->andWhere('co.id_rubrique_parente = ?', $request->getParameter('id_rubrique'))
                ->addOrderBy('priorite')
                ->execute();
        
        //tableaux servant à inverser les ordres
        $tab_temp = array();
        $tab_subit = array();
        $tab_impose = array();
        
        $priorite_init = $request->getParameter('priorite');
        $priorite_fin = $priorite_init - 1;
        
        //chargement des tableaux
        foreach($contenus as $contenu){

            if($contenu->getIdContenu() == $request->getParameter('id_contenu')){
                $tab_impose = array('id' => $contenu->getIdContenu(),'old_pri' => $contenu->getPriorite(),'new_pri' => $priorite_fin);
                $tab_subit = $tab_temp;
            }
            
            $tab_temp = array('id' => $contenu->getIdContenu(),'old_pri' => $contenu->getPriorite(),'new_pri' => $priorite_init);
            
        }
        
        //allternace des priorites afain de garder les vrai indices
        $tab_impose['new_pri'] = $tab_subit['old_pri'];
        $tab_subit['new_pri'] = $tab_impose['old_pri'] ;
        
        //update des enregistrements en base
        $contenu_subit = Doctrine_Core::getTable('Contenu')->find(array($tab_subit['id']));
        $contenu_subit->setPriorite($tab_subit['new_pri']);
        $contenu_subit->save();
        
        $contenu_impose = Doctrine_Core::getTable('Contenu')->find(array($tab_impose['id']));
        $contenu_impose->setPriorite($tab_impose['new_pri']);
        $contenu_impose->save();
        
        $this->redirect('cms/index');
    }
    

    /*
     * méthode pour descendre une page (contenu) au niveau inférieur
     * en alternant son numéro de priorite avec le contenu qui le suit,
     * tout en gardant les memes numero de priorité (ce qui permet d'avoir des pages
     * avec un numéro de priorité qui ne se suite pas de un en un)
     */
    public function executePageDown(sfWebRequest $request) {
        //requete pour récupérer les éléments de la rubrique concernée
        $contenus = Doctrine_Core::getTable('Contenu')
                ->createQuery('co')
                ->where('co.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('co.etat = 1')
                ->andWhere('co.id_rubrique_parente = ?', $request->getParameter('id_rubrique'))
                ->addOrderBy('priorite')
                ->execute();
        
        //tableaux servant à inverser les ordres
        $tab_temp = array();
        $tab_subit = array();
        $tab_impose = array();
        
        $priorite_init = $request->getParameter('priorite');
        $priorite_fin = $priorite_init + 1;
        
        //indicateur indiquant le changement => il faut remplir le tableau apres 
        //  le contenu initial
        $ind_chgt = 0;
        
        //chargement des tableaux
        foreach($contenus as $contenu){
            if($ind_chgt == 1){
                //on met à jour le tableau avec les données de l'enregistrement qui suis celui
                //  qui vaprendre sa place
                $tab_subit = array('id' => $contenu->getIdContenu(),'old_pri' => $contenu->getPriorite(),'new_pri' => $priorite_init);
                $ind_chgt = 0;
            }
            if($contenu->getIdContenu() == $request->getParameter('id_contenu')){
                $tab_impose = array('id' => $contenu->getIdContenu(),'old_pri' => $contenu->getPriorite(),'new_pri' => $priorite_fin);
                $ind_chgt = 1;
            }
            
        }
        
        //allternace des priorites afain de garder les vrai indices
        $tab_impose['new_pri'] = $tab_subit['old_pri'];
        $tab_subit['new_pri'] = $tab_impose['old_pri'] ;
        
        //update des enregistrements en base
        $contenu_subit = Doctrine_Core::getTable('Contenu')->find(array($tab_subit['id']));
        $contenu_subit->setPriorite($tab_subit['new_pri']);
        $contenu_subit->save();
        
        $contenu_impose = Doctrine_Core::getTable('Contenu')->find(array($tab_impose['id']));
        $contenu_impose->setPriorite($tab_impose['new_pri']);
        $contenu_impose->save();
        
        $this->redirect('cms/index');
    }
    
    
    /*****************************************************************/
    /*                   gestion des menus                           */
    /*****************************************************************/
    
    
    /*
     * méthode pour monter un menu (contenu) au niveau supérieur
     * en alternant son numéro de priorite avec le contenu qui le précède,
     * tout en gardant les memes numero de priorité (ce qui permet d'avoir des menus
     * avec un numéro de priorité qui ne se suit pas de un en un)
     */
    public function executeMenuUp(sfWebRequest $request) {
        //requete pour récupérer les éléments de la rubrique concernée
        $q1 = Doctrine_Core::getTable('ContenuRubrique')
                ->createQuery('co')
                ->where('co.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('co.etat = 1')
                ->addOrderBy('priorite');
                        
        //modification de la requete en fonction des permissions de l'utilisateur
        if(!$this->getUser()->hasCredential("admin")){
            $q1->andWhere('id_perm = 2');
        }
        
        $contenurubriques = $q1->execute();
        
        //tableaux servant à inverser les ordres
        $tab_temp = array();
        $tab_subit = array();
        $tab_impose = array();
        
        $priorite_init = $request->getParameter('priorite');
        $priorite_fin = $priorite_init - 1;
        
        //chargement des tableaux
        foreach($contenurubriques as $contenurubrique){

            if($contenurubrique->getIdRubrique() == $request->getParameter('id_rubrique')){
                $tab_impose = array('id' => $contenurubrique->getIdRubrique(),'old_pri' => $contenurubrique->getPriorite(),'new_pri' => $priorite_fin);
                $tab_subit = $tab_temp;
            }
            
            $tab_temp = array('id' => $contenurubrique->getIdRubrique(),'old_pri' => $contenurubrique->getPriorite(),'new_pri' => $priorite_init);
            
        }
        
        //allternace des priorites afin de garder les vrai indices
        $tab_impose['new_pri'] = $tab_subit['old_pri'];
        $tab_subit['new_pri'] = $tab_impose['old_pri'] ;
        
        //update des enregistrements en base
        $contenurubrique_subit = Doctrine_Core::getTable('ContenuRubrique')->find(array($tab_subit['id']));
        $contenurubrique_subit->setPriorite($tab_subit['new_pri']);
        $contenurubrique_subit->save();
        
        $contenurubrique_impose = Doctrine_Core::getTable('ContenuRubrique')->find(array($tab_impose['id']));
        $contenurubrique_impose->setPriorite($tab_impose['new_pri']);
        $contenurubrique_impose->save();
        
        $this->redirect('cms/index');
    }
    
    /*
     * méthode pour descendre un menu (contenu) au niveau inférieur
     * en alternant son numéro de priorite avec le contenu qui le précède,
     * tout en gardant les memes numero de priorité (ce qui permet d'avoir des menus
     * avec un numéro de priorité qui ne se suit pas de un en un)
     */
    public function executeMenuDown(sfWebRequest $request) {
        //requete pour récupérer les éléments de la rubrique concernée
        $q1 = Doctrine_Core::getTable('ContenuRubrique')
                ->createQuery('co')
                ->where('co.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('co.etat = 1')
                ->addOrderBy('priorite');
                        
        //modification de la requete en fonction des permissions de l'utilisateur
        if(!$this->getUser()->hasCredential("admin")){
            $q1->andWhere('id_perm = 2');
        }
        
        $contenurubriques = $q1->execute();
        
        //tableaux servant à inverser les ordres
        $tab_temp = array();
        $tab_subit = array();
        $tab_impose = array();
        
        $priorite_init = $request->getParameter('priorite');
        $priorite_fin = $priorite_init + 1;
        
        //indicateur indiquant le changement => il faut remplir le tableau apres 
        //  le contenu initial
        $ind_chgt = 0;
        
        //chargement des tableaux
        foreach($contenurubriques as $contenurubrique){

            if($ind_chgt == 1){
                //on met à jour le tableau avec les données de l'enregistrement qui suis celui
                //  qui va prendre sa place
                $tab_subit = array('id' => $contenurubrique->getIdRubrique(),'old_pri' => $contenurubrique->getPriorite(),'new_pri' => $priorite_init);
                $ind_chgt = 0;
            }
            if($contenurubrique->getIdRubrique() == $request->getParameter('id_rubrique')){
                $tab_impose = array('id' => $contenurubrique->getIdRubrique(),'old_pri' => $contenurubrique->getPriorite(),'new_pri' => $priorite_fin);
                $ind_chgt = 1;
            }
            
        }
        
        //allternace des priorites afin de garder les vrai indices
        $tab_impose['new_pri'] = $tab_subit['old_pri'];
        $tab_subit['new_pri'] = $tab_impose['old_pri'] ;
        
        //update des enregistrements en base
        $contenurubrique_subit = Doctrine_Core::getTable('ContenuRubrique')->find(array($tab_subit['id']));
        $contenurubrique_subit->setPriorite($tab_subit['new_pri']);
        $contenurubrique_subit->save();
        
        $contenurubrique_impose = Doctrine_Core::getTable('ContenuRubrique')->find(array($tab_impose['id']));
        $contenurubrique_impose->setPriorite($tab_impose['new_pri']);
        $contenurubrique_impose->save();
        
        $this->redirect('cms/index');
    }

}
