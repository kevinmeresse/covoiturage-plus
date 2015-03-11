
<?php

/**
 * covoitureur actions.
 *
 * @package    roulezmailn_v3
 * @subpackage covoitureur
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class covoitureurActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {

        $this->forward('covoitureur', 'list');
    }

    public function executeShow(sfWebRequest $request) {

        $this->forward404Unless($this->covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_utilisateur'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_utilisateur')));

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
        
        $this->etabId = $request->getParameter('etabId');
        
        $this->valEtab = $request->getParameter('valEtab');
    }

    /*
     * gestion de la liste des covoitureurs et du formulaire de recherche
     * associé => reinitialisation de la recherche
     */

    public function executeListCancel(sfWebRequest $request) {
        $this->form = new CovoitureurRechercheNewForm();

        $this->pager = new sfDoctrinePager(
                        'Covoitureur',
                        sfConfig::get('app_max_covoitureur_list')
        );
        $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();

        $this->lien_export_csv = array('date_debut' => '',
            'date_fin' => '',
            'mail' => '',
            'ville' => '',
            'nom' => '',
            'rsa' => '',
            'newsletter' => '',
            'trajet' => '',
            'equipage' => ''
        );

        //suppression des données en session
        //insertion du tableau de requete en session
        $this->getUser()->setAttribute('filtreCovoitureur', null);


        //tableau des parametres passés en autocomplétion
        $this->tab_covoitureur_autoc = array();
        $this->tab_covoitureur_autoc['ville'] = '';
        $this->tab_covoitureur_autoc['nom'] = '';
        $this->tab_covoitureur_autoc['newsletter'] = '';
        $this->tab_covoitureur_autoc['rsa'] = '';
        $this->tab_covoitureur_autoc['mail'] = '';
        $this->tab_covoitureur_autoc['date_debut'] = '';
        $this->tab_covoitureur_autoc['date_fin'] = '';
        $this->tab_covoitureur_autoc['trajet'] = '';
        $this->tab_covoitureur_autoc['equipage'] = '';

        //génération de l'élément de lien pour csv
        $this->lien_to = '';
        $compt = 0;
        if ($this->tab_covoitureur_autoc['newsletter'] != '') {
            if ($compt == 0) {
                $esplt = '';
            } else {
                $esplt = '&';
            }
            $this->lien_to .= $esplt . 'newsletter=' . $this->tab_covoitureur_autoc['newsletter'];
            $compt++;
        }
        if ($this->tab_covoitureur_autoc['ville'] != '') {
            if ($compt == 0) {
                $esplt = '';
            } else {
                $esplt = '&';
            }
            $this->lien_to .= $esplt . 'ville=' . $this->tab_covoitureur_autoc['ville'];
            $compt++;
        }
        if ($this->tab_covoitureur_autoc['nom'] != '') {
            if ($compt == 0) {
                $esplt = '';
            } else {
                $esplt = '&';
            }
            $this->lien_to .= $esplt . 'nom=' . $this->tab_covoitureur_autoc['nom'];
            $compt++;
        }
        if ($this->tab_covoitureur_autoc['rsa'] != '') {
            if ($compt == 0) {
                $esplt = '';
            } else {
                $esplt = '&';
            }
            $this->lien_to .= $esplt . 'rsa=' . $this->tab_covoitureur_autoc['rsa'];
            $compt++;
        }
        if ($this->tab_covoitureur_autoc['mail'] != '') {
            if ($compt == 0) {
                $esplt = '';
            } else {
                $esplt = '&';
            }
            $this->lien_to .= $esplt . 'mail=' . $this->tab_covoitureur_autoc['mail'];
            $compt++;
        }
        if ($this->tab_covoitureur_autoc['date_debut'] != '') {
            if ($compt == 0) {
                $esplt = '';
            } else {
                $esplt = '&';
            }
            $this->lien_to .= $esplt . 'date_debut=' . $this->tab_covoitureur_autoc['date_debut'];
            $compt++;
        }
        if ($this->tab_covoitureur_autoc['date_fin'] != '') {
            if ($compt == 0) {
                $esplt = '';
            } else {
                $esplt = '&';
            }
            $this->lien_to .= $esplt . 'date_fin=' . $this->tab_covoitureur_autoc['date_fin'];
            $compt++;
        }
        if ($this->tab_covoitureur_autoc['trajet'] != '') {
            if ($compt == 0) {
                $esplt = '';
            } else {
                $esplt = '&';
            }
            $this->lien_to .= $esplt . 'trajet=' . $this->tab_covoitureur_autoc['trajet'];
            $compt++;
        }
        if ($this->tab_covoitureur_autoc['equipage'] != '') {
            if ($compt == 0) {
                $esplt = '';
            } else {
                $esplt = '&';
            }
            $this->lien_to .= $esplt . 'equipage=' . $this->tab_covoitureur_autoc['equipage'];
            $compt++;
        }

        $this->setTemplate('list');
    }

    /*
     * gestion de la liste des covoitureurs et du formulaire de recherche
     * associé
     */

    public function executeList(sfWebRequest $request) {

        $tab_mois = array();
        $tab_mois['month'] = '';
        $tab_mois['day'] = '';
        $tab_mois['year'] = '';

        $formnew = array();
        $formnew['newsletter'] = '';
        $formnew['ville'] = '';
        $formnew['nom'] = '';
        $formnew['prenom'] = '';
        $formnew['rsa'] = '';
        $formnew['mail'] = '';
        $formnew['date_debut'] = '';
        $formnew['date_arret'] = '';
        $formnew['trajet'] = '';
        $formnew['equipage'] = '';

        //tableau des parametres passés en autocomplétion
        $this->tab_covoitureur_autoc = array();
        $this->tab_covoitureur_autoc['ville'] = '';
        $this->tab_covoitureur_autoc['nom'] = '';
        $this->tab_covoitureur_autoc['prenom'] = '';
        $this->tab_covoitureur_autoc['newsletter'] = 2;
        $this->tab_covoitureur_autoc['rsa'] = 2;
        $this->tab_covoitureur_autoc['mail'] = '';
        $this->tab_covoitureur_autoc['date_debut'] = '';
        $this->tab_covoitureur_autoc['date_arret'] = '';
        $this->tab_covoitureur_autoc['trajet'] = 99;
        $this->tab_covoitureur_autoc['equipage'] = 99;


        //variable permettant la création du lien pour l'export csv
        $this->lien_export_csv = array('date_debut' => '',
            'date_arret' => '',
            'mail' => '',
            'ville' => '',
            'nom' => '',
            'prenom' => '',
            'rsa' => '',
            'newsletter' => '',
            'trajet' => '',
            'equipage' => ''
        );

        $this->lien_to = '';

        //tableau permettant de transférer les données en session
        $tab_req_session = array();
        $tab_req_session['newsletter'] = 2;
        $tab_req_session['ville'] = '';
        $tab_req_session['nom'] = '';
        $tab_req_session['prenom'] = '';
        $tab_req_session['rsa'] = 2;
        $tab_req_session['mail'] = '';
        $tab_req_session['date_debut'] = '';
        $tab_req_session['date_arret'] = '';
        $tab_req_session['trajet'] = 99;
        $tab_req_session['equipage'] = 99;

        //insertion du tableau de requete en session
        //$this->getUser()->setAttribute('filtreCovoitureur', $tab_req_session);
        //initialisation du formulaire
        $this->form = new CovoitureurRechercheNewForm();

        if ($request->isMethod('post')) { // mode recherche
            $formnew = $request->getParameter('covoitureurrechercheNew');

            if ($formnew['newsletter'] != '' && !is_null($formnew['newsletter'])) {
                $this->tab_covoitureur_autoc['newsletter'] = $formnew['newsletter'];
                $tab_req_session['newsletter'] = $formnew['newsletter'];
            } else {
                $tab_req_session['newsletter'] = '';
            }


            if ($formnew['ville'] != '' && !is_null($formnew['ville'])) {
                $this->tab_covoitureur_autoc['ville'] = $formnew['ville'];
                $tab_req_session['ville'] = $formnew['ville'];
            } else {
                $tab_req_session['ville'] = '';
            }

            if ($formnew['nom'] != '' && !is_null($formnew['nom'])) {
                $this->tab_covoitureur_autoc['nom'] = $formnew['nom'];
                $tab_req_session['nom'] = $formnew['nom'];
            } else {
                $tab_req_session['nom'] = '';
            }
            
            if ($formnew['prenom'] != '' && !is_null($formnew['prenom'])) {
                $this->tab_covoitureur_autoc['prenom'] = $formnew['prenom'];
                $tab_req_session['prenom'] = $formnew['prenom'];
            } else {
                $tab_req_session['prenom'] = '';
            }

            if ($formnew['rsa'] != '' && !is_null($formnew['rsa'])) {
                $this->tab_covoitureur_autoc['rsa'] = $formnew['rsa'];
                $tab_req_session['rsa'] = $formnew['rsa'];
            } else {
                $tab_req_session['rsa'] = '';
            }

            if ($formnew['mail'] != '' && !is_null($formnew['mail'])) {
                $this->tab_covoitureur_autoc['mail'] = $formnew['mail'];
                $tab_req_session['mail'] = $formnew['mail'];
            } else {
                $tab_req_session['mail'] = '';
            }


            if ($formnew['date_debut']['month'] != '' &&
                    $formnew['date_debut']['day'] != '' &&
                    $formnew['date_debut']['year'] != '') {
                $this->tab_covoitureur_autoc['date_debut'] = date("Y-m-d H:i:s", mktime(
                                        0, 0, 0, $formnew['date_debut']['month'], $formnew['date_debut']['day'], $formnew['date_debut']['year']));

                $tab_req_session['date_debut']['month'] = $formnew['date_debut']['month'];
                $tab_req_session['date_debut']['day'] = $formnew['date_debut']['day'];
                $tab_req_session['date_debut']['year'] = $formnew['date_debut']['year'];
            } else {
                $this->tab_covoitureur_autoc['date_debut'] = '';

                $tab_req_session['date_debut']['month'] = '';
                $tab_req_session['date_debut']['day'] = '';
                $tab_req_session['date_debut']['year'] = '';
            }


            if ($formnew['date_arret']['month'] != '' &&
                    $formnew['date_arret']['day'] != '' &&
                    $formnew['date_arret']['year'] != '') {
                $this->tab_covoitureur_autoc['date_arret'] = date("Y-m-d H:i:s", mktime(
                                        23, 59, 59, $formnew['date_arret']['month'], $formnew['date_arret']['day'], $formnew['date_arret']['year']));

                $tab_req_session['date_arret']['month'] = $formnew['date_arret']['month'];
                $tab_req_session['date_arret']['day'] = $formnew['date_arret']['day'];
                $tab_req_session['date_arret']['year'] = $formnew['date_arret']['year'];
            } else {
                $this->tab_covoitureur_autoc['date_arret'] = '';

                $tab_req_session['date_arret']['month'] = '';
                $tab_req_session['date_arret']['day'] = '';
                $tab_req_session['date_arret']['year'] = '';
            }

            if ($formnew['trajet'] != '' && !is_null($formnew['trajet'])) {
                $this->tab_covoitureur_autoc['trajet'] = $formnew['trajet'];
                $tab_req_session['trajet'] = $formnew['trajet'];
            } else {
                $tab_req_session['trajet'] = '';
            }

            if ($formnew['equipage'] != '' && !is_null($formnew['equipage'])) {
                $this->tab_covoitureur_autoc['equipage'] = $formnew['equipage'];
                $tab_req_session['equipage'] = $formnew['equipage'];
            } else {
                $tab_req_session['equipage'] = '';
            }


            //insertion du tableau de requete en session
            $this->getUser()->setAttribute('filtreCovoitureur', $tab_req_session);

            //insertion des données par défaut au niveau du formulaire
            $this->form->setDefault('newsletter', $this->tab_covoitureur_autoc['newsletter']);
            $this->form->setDefault('ville', $this->tab_covoitureur_autoc['ville']);
            $this->form->setDefault('nom', $this->tab_covoitureur_autoc['nom']);
            $this->form->setDefault('prenom', $this->tab_covoitureur_autoc['prenom']);
            $this->form->setDefault('rsa', $this->tab_covoitureur_autoc['rsa']);
            $this->form->setDefault('mail', $this->tab_covoitureur_autoc['mail']);
            $this->form->setDefault('date_debut', $this->tab_covoitureur_autoc['date_debut']);
            $this->form->setDefault('date_arret', $this->tab_covoitureur_autoc['date_arret']);
            $this->form->setDefault('trajet', $this->tab_covoitureur_autoc['trajet']);
            $this->form->setDefault('equipage', $this->tab_covoitureur_autoc['equipage']);



            //génération de l'élément de lien pour csv
            $this->lien_to = '';
            $compt = 0;
            if ($this->tab_covoitureur_autoc['newsletter'] != '') {
                if ($compt == 0) {
                    $esplt = '';
                } else {
                    $esplt = '&';
                }
                $this->lien_to .= $esplt . 'newsletter=' . $this->tab_covoitureur_autoc['newsletter'];
                $compt++;
            }
            if ($this->tab_covoitureur_autoc['ville'] != '') {
                if ($compt == 0) {
                    $esplt = '';
                } else {
                    $esplt = '&';
                }
                $this->lien_to .= $esplt . 'ville=' . $this->tab_covoitureur_autoc['ville'];
                $compt++;
            }
            if ($this->tab_covoitureur_autoc['nom'] != '') {
                if ($compt == 0) {
                    $esplt = '';
                } else {
                    $esplt = '&';
                }
                $this->lien_to .= $esplt . 'nom=' . $this->tab_covoitureur_autoc['nom'];
                $compt++;
            }
            if ($this->tab_covoitureur_autoc['prenom'] != '') {
                if ($compt == 0) {
                    $esplt = '';
                } else {
                    $esplt = '&';
                }
                $this->lien_to .= $esplt . 'prenom=' . $this->tab_covoitureur_autoc['prenom'];
                $compt++;
            }
            if ($this->tab_covoitureur_autoc['rsa'] != '') {
                if ($compt == 0) {
                    $esplt = '';
                } else {
                    $esplt = '&';
                }
                $this->lien_to .= $esplt . 'rsa=' . $this->tab_covoitureur_autoc['rsa'];
                $compt++;
            }
            if ($this->tab_covoitureur_autoc['mail'] != '') {
                if ($compt == 0) {
                    $esplt = '';
                } else {
                    $esplt = '&';
                }
                $this->lien_to .= $esplt . 'mail=' . $this->tab_covoitureur_autoc['mail'];
                $compt++;
            }
            if ($this->tab_covoitureur_autoc['date_debut'] != '') {
                if ($compt == 0) {
                    $esplt = '';
                } else {
                    $esplt = '&';
                }
                $this->lien_to .= $esplt . 'date_debut=' . $this->tab_covoitureur_autoc['date_debut'];
                $compt++;
            }
            if ($this->tab_covoitureur_autoc['date_arret'] != '') {
                if ($compt == 0) {
                    $esplt = '';
                } else {
                    $esplt = '&';
                }
                $this->lien_to .= $esplt . 'date_arret=' . $this->tab_covoitureur_autoc['date_arret'];
                $compt++;
            }
            if ($this->tab_covoitureur_autoc['trajet'] != '') {
                if ($compt == 0) {
                    $esplt = '';
                } else {
                    $esplt = '&';
                }
                $this->lien_to .= $esplt . 'trajet=' . $this->tab_covoitureur_autoc['trajet'];
                $compt++;
            }
            if ($this->tab_covoitureur_autoc['equipage'] != '') {
                if ($compt == 0) {
                    $esplt = '';
                } else {
                    $esplt = '&';
                }
                $this->lien_to .= $esplt . 'equipage=' . $this->tab_covoitureur_autoc['equipage'];
                $compt++;
            }

            //utilisation des validateurs existant pour nettoyer et filtrer les informations passées par le formulaire de recherche
            //en cas de passage par formulire (methode post)

            $this->form->bind($request->getParameter('covoitureurrechercheNew'), $request->getFiles('covoitureurrechercheNew'));
            $this->test = 3;

            if ($this->form->isValid()) {

                //récupération des éléments du formulaire de recherche
                //pour la création de la requete

                $this->pager = new sfDoctrinePager(
                                'Covoitureur',
                                sfConfig::get('app_max_covoitureur_list')
                );
                $this->test = 4;
                //sélection de la méthode de recherche si demande de (trajet ou equipage) ou non
                if ($this->tab_covoitureur_autoc['trajet'] == 0) { //sélection si pas de trajet
                    $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRecherche(
                                    $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['nom'], $this->tab_covoitureur_autoc['prenom'], null
                    ));
                    $this->pager->setPage($request->getParameter('page', 1));
                    $this->pager->init();

                    $this->lien_export_csv = array('date_debut' => '',
                        'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                        'mail' => $this->tab_covoitureur_autoc['mail'],
                        'ville' => $this->tab_covoitureur_autoc['ville'],
                        'nom' => $this->tab_covoitureur_autoc['nom'],
                        'prenom' => $this->tab_covoitureur_autoc['prenom'],
                        'rsa' => $this->tab_covoitureur_autoc['rsa'],
                        'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                        'trajet' => '',
                        'equipage' => ''
                    );
                    $this->test = 41;
                } else {//sélection si  avec trajet ou trajet indifférent
                    /*
                    if ($this->tab_covoitureur_autoc['equipage'] == 0) {// recherche pour non équipagé

                        $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRechercheTrajetNonEquipage(
                                        $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['trajet'], $this->tab_covoitureur_autoc['equipage'], $this->tab_covoitureur_autoc['nom'], null
                        ));

                        $this->pager->setPage($request->getParameter('page', 1));
                        $this->pager->init();

                        $this->lien_export_csv = array('date_debut' => '',
                            'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                            'mail' => $this->tab_covoitureur_autoc['mail'],
                            'ville' => $this->tab_covoitureur_autoc['ville'],
                            'nom' => $this->tab_covoitureur_autoc['nom'],
                            'rsa' => $this->tab_covoitureur_autoc['rsa'],
                            'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                            'trajet' => $this->tab_covoitureur_autoc['trajet'],
                            'equipage' => $this->tab_covoitureur_autoc['equipage']
                        );
                        $this->test = 42;
                    } else {
                      
                        $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRechercheTrajetEquipage(
                                        $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['trajet'], $this->tab_covoitureur_autoc['equipage'], $this->tab_covoitureur_autoc['nom'], null
                        ));

                        $this->pager->setPage($request->getParameter('page', 1));
                        $this->pager->init();

                        $this->lien_export_csv = array('date_debut' => '',
                            'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                            'mail' => $this->tab_covoitureur_autoc['mail'],
                            'ville' => $this->tab_covoitureur_autoc['ville'],
                            'nom' => $this->tab_covoitureur_autoc['nom'],
                            'rsa' => $this->tab_covoitureur_autoc['rsa'],
                            'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                            'trajet' => $this->tab_covoitureur_autoc['trajet'],
                            'equipage' => $this->tab_covoitureur_autoc['equipage']
                        );
                        $this->test = 43;
                    }
                    */
                    
                    $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRechercheTrajetEquipageOuNon(
                                        $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['trajet'], $this->tab_covoitureur_autoc['equipage'], $this->tab_covoitureur_autoc['nom'], $this->tab_covoitureur_autoc['prenom'], null
                        ));
                        $this->pager->setPage($request->getParameter('page', 1));
                        $this->pager->init();

                        $this->lien_export_csv = array('date_debut' => '',
                            'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                            'mail' => $this->tab_covoitureur_autoc['mail'],
                            'ville' => $this->tab_covoitureur_autoc['ville'],
                            'nom' => $this->tab_covoitureur_autoc['nom'],
                            'prenom' => $this->tab_covoitureur_autoc['prenom'],
                            'rsa' => $this->tab_covoitureur_autoc['rsa'],
                            'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                            'trajet' => $this->tab_covoitureur_autoc['trajet'],
                            'equipage' => $this->tab_covoitureur_autoc['equipage']
                        );
                }
            } else {//si le formulaire n'est pas valide
                //initialisation des valeurs par défaut des input autocomplétés
                //$this->tab_covoitureur_autoc['ville'] = '';
                //$this->tab_covoitureur_autoc['covoitureur'] = '';
                $this->pager = new sfDoctrinePager(
                                'Covoitureur',
                                sfConfig::get('app_max_covoitureur_list')
                );
                $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurSite());
                $this->pager->setPage($request->getParameter('page', 1));
                $this->pager->init();

                $this->lien_export_csv = array('date_debut' => '',
                    'date_arret' => '',
                    'mail' => '',
                    'ville' => '',
                    'nom' => '',
                    'prenom' => '',
                    'rsa' => '',
                    'newsletter' => '',
                    'trajet' => '',
                    'equipage' => ''
                );
                $this->test = 7;
                //insertion du tableau de requete en session
                //$this->getUser()->setAttribute('filtreCovoitureur', $tab_req_session);
            }
        } else { // passage en GET
            //si passage par pager
            if ($request->getParameter('page') != '') {

//$this->test = 22;
                //initialisation du pager
                $this->pager = new sfDoctrinePager(
                                'Covoitureur',
                                sfConfig::get('app_max_covoitureur_list')
                );

                $formnew = $this->getUser()->getAttribute('filtreCovoitureur');
                //$this->test = print_r($this->getUser()->getAttribute('filtreCovoitureur'));

                if ($formnew['newsletter'] != '' && !is_null($formnew['newsletter'])) {
                    $this->tab_covoitureur_autoc['newsletter'] = $formnew['newsletter'];
                    $tab_req_session['newsletter'] = $formnew['newsletter'];
                } else {
                    $tab_req_session['newsletter'] = '';
                }


                if ($formnew['ville'] != '' && !is_null($formnew['ville'])) {
                    $this->tab_covoitureur_autoc['ville'] = $formnew['ville'];
                    $tab_req_session['ville'] = $formnew['ville'];
                } else {
                    $tab_req_session['ville'] = '';
                }

                if ($formnew['nom'] != '' && !is_null($formnew['nom'])) {
                    $this->tab_covoitureur_autoc['nom'] = $formnew['nom'];
                    $tab_req_session['nom'] = $formnew['nom'];
                } else {
                    $tab_req_session['nom'] = '';
                }
                
                if ($formnew['prenom'] != '' && !is_null($formnew['prenom'])) {
                    $this->tab_covoitureur_autoc['prenom'] = $formnew['prenom'];
                    $tab_req_session['prenom'] = $formnew['prenom'];
                } else {
                    $tab_req_session['prenom'] = '';
                }

                if ($formnew['rsa'] != '' && !is_null($formnew['rsa'])) {
                    $this->tab_covoitureur_autoc['rsa'] = $formnew['rsa'];
                    $tab_req_session['rsa'] = $formnew['rsa'];
                } else {
                    $tab_req_session['rsa'] = '';
                }

                if ($formnew['mail'] != '' && !is_null($formnew['mail'])) {
                    $this->tab_covoitureur_autoc['mail'] = $formnew['mail'];
                    $tab_req_session['mail'] = $formnew['mail'];
                } else {
                    $tab_req_session['mail'] = '';
                }


                if ($formnew['date_debut']['month'] != '' &&
                        $formnew['date_debut']['day'] != '' &&
                        $formnew['date_debut']['year'] != '') {
                    $this->tab_covoitureur_autoc['date_debut'] = date("Y-m-d H:i:s", mktime(
                                            0, 0, 0, $formnew['date_debut']['month'], $formnew['date_debut']['day'], $formnew['date_debut']['year']));

                    $tab_req_session['date_debut']['month'] = $formnew['date_debut']['month'];
                    $tab_req_session['date_debut']['day'] = $formnew['date_debut']['day'];
                    $tab_req_session['date_debut']['year'] = $formnew['date_debut']['year'];
                } else {
                    $this->tab_covoitureur_autoc['date_debut'] = '';

                    $tab_req_session['date_debut']['month'] = '';
                    $tab_req_session['date_debut']['day'] = '';
                    $tab_req_session['date_debut']['year'] = '';
                }


                if ($formnew['date_arret']['month'] != '' &&
                        $formnew['date_arret']['day'] != '' &&
                        $formnew['date_arret']['year'] != '') {
                    $this->tab_covoitureur_autoc['date_arret'] = date("Y-m-d H:i:s", mktime(
                                            0, 0, 0, $formnew['date_arret']['month'], $formnew['date_arret']['day'], $formnew['date_arret']['year']));

                    $tab_req_session['date_arret']['month'] = $formnew['date_arret']['month'];
                    $tab_req_session['date_arret']['day'] = $formnew['date_arret']['day'];
                    $tab_req_session['date_arret']['year'] = $formnew['date_arret']['year'];
                } else {
                    $this->tab_covoitureur_autoc['date_arret'] = '';

                    $tab_req_session['date_arret']['month'] = '';
                    $tab_req_session['date_arret']['day'] = '';
                    $tab_req_session['date_arret']['year'] = '';
                }

                if ($formnew['trajet'] != '' && !is_null($formnew['trajet'])) {
                    $this->tab_covoitureur_autoc['trajet'] = $formnew['trajet'];
                    $tab_req_session['trajet'] = $formnew['trajet'];
                } else {
                    $tab_req_session['trajet'] = '';
                }

                if ($formnew['equipage'] != '' && !is_null($formnew['equipage'])) {
                    $this->tab_covoitureur_autoc['equipage'] = $formnew['equipage'];
                    $tab_req_session['equipage'] = $formnew['equipage'];
                } else {
                    $tab_req_session['equipage'] = '';
                }

                //insertion des données par défaut au niveau du formulaire
                $this->form->setDefault('newsletter', $this->tab_covoitureur_autoc['newsletter']);
                $this->form->setDefault('ville', $this->tab_covoitureur_autoc['ville']);
                $this->form->setDefault('nom', $this->tab_covoitureur_autoc['nom']);
                $this->form->setDefault('prenom', $this->tab_covoitureur_autoc['prenom']);
                $this->form->setDefault('rsa', $this->tab_covoitureur_autoc['rsa']);
                $this->form->setDefault('mail', $this->tab_covoitureur_autoc['mail']);
                $this->form->setDefault('date_debut', $this->tab_covoitureur_autoc['date_debut']);
                $this->form->setDefault('date_arret', $this->tab_covoitureur_autoc['date_arret']);
                $this->form->setDefault('trajet', $this->tab_covoitureur_autoc['trajet']);
                $this->form->setDefault('equipage', $this->tab_covoitureur_autoc['equipage']);

                //sélection de la méthode de recherche si demande de (trajet ou equipage) ou non
                if ($this->tab_covoitureur_autoc['trajet'] == 0) { //sélection si pas de trajet
                    $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRecherche(
                                    $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['nom'], $this->tab_covoitureur_autoc['prenom'],null
                    ));
                    $this->pager->setPage($request->getParameter('page', 1));
                    $this->pager->init();

                    $this->lien_export_csv = array('date_debut' => '',
                        'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                        'mail' => $this->tab_covoitureur_autoc['mail'],
                        'ville' => $this->tab_covoitureur_autoc['ville'],
                        'nom' => $this->tab_covoitureur_autoc['nom'],
                        'prenom' => $this->tab_covoitureur_autoc['prenom'],
                        'rsa' => $this->tab_covoitureur_autoc['rsa'],
                        'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                        'trajet' => '',
                        'equipage' => ''
                    );
                } else {//sélection si autre
                    /*
                    if ($this->tab_covoitureur_autoc['equipage'] == 0) {// recherche pour non équipagé
                        $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRechercheTrajetNonEquipage(
                                        $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['trajet'], $this->tab_covoitureur_autoc['equipage'], $this->tab_covoitureur_autoc['nom'], null
                        ));
                        $this->pager->setPage($request->getParameter('page', 1));
                        $this->pager->init();

                        $this->lien_export_csv = array('date_debut' => '',
                            'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                            'mail' => $this->tab_covoitureur_autoc['mail'],
                            'ville' => $this->tab_covoitureur_autoc['ville'],
                            'nom' => $this->tab_covoitureur_autoc['nom'],
                            'rsa' => $this->tab_covoitureur_autoc['rsa'],
                            'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                            'trajet' => $this->tab_covoitureur_autoc['trajet'],
                            'equipage' => $this->tab_covoitureur_autoc['equipage']
                        );
                    } else {
                        $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRechercheTrajetEquipage(
                                        $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['trajet'], $this->tab_covoitureur_autoc['equipage'], $this->tab_covoitureur_autoc['nom'], null
                        ));
                        $this->pager->setPage($request->getParameter('page', 1));
                        $this->pager->init();

                        $this->lien_export_csv = array('date_debut' => '',
                            'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                            'mail' => $this->tab_covoitureur_autoc['mail'],
                            'ville' => $this->tab_covoitureur_autoc['ville'],
                            'nom' => $this->tab_covoitureur_autoc['nom'],
                            'rsa' => $this->tab_covoitureur_autoc['rsa'],
                            'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                            'trajet' => $this->tab_covoitureur_autoc['trajet'],
                            'equipage' => $this->tab_covoitureur_autoc['equipage']
                        );
                    }
                    */
                    
                    $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRechercheTrajetEquipageOuNon(
                                        $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['trajet'], $this->tab_covoitureur_autoc['equipage'], $this->tab_covoitureur_autoc['nom'], $this->tab_covoitureur_autoc['prenom'],null
                        ));
                        $this->pager->setPage($request->getParameter('page', 1));
                        $this->pager->init();

                        $this->lien_export_csv = array('date_debut' => '',
                            'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                            'mail' => $this->tab_covoitureur_autoc['mail'],
                            'ville' => $this->tab_covoitureur_autoc['ville'],
                            'nom' => $this->tab_covoitureur_autoc['nom'],
                            'prenom' => $this->tab_covoitureur_autoc['prenom'],
                            'rsa' => $this->tab_covoitureur_autoc['rsa'],
                            'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                            'trajet' => $this->tab_covoitureur_autoc['trajet'],
                            'equipage' => $this->tab_covoitureur_autoc['equipage']
                        );
                }
            } else {//dans ce cas retour à partir d'une autre page
                $this->pager = new sfDoctrinePager(
                                'Covoitureur',
                                sfConfig::get('app_max_covoitureur_list')
                );
                $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurSite());
                $this->pager->setPage($request->getParameter('page', 1));
                $this->pager->init();

                $this->lien_export_csv = array('date_debut' => '',
                    'date_arret' => '',
                    'mail' => '',
                    'ville' => '',
                    'nom' => '',
                    'prenom' => '',
                    'rsa' => '',
                    'newsletter' => '',
                    'trajet' => '',
                    'equipage' => ''
                );

                //suppression des données en session
                //insertion du tableau de requete en session
                $this->getUser()->setAttribute('filtreCovoitureur', null);


                //tableau des parametres passés en autocomplétion
                $this->tab_covoitureur_autoc = array();
                $this->tab_covoitureur_autoc['ville'] = '';
                $this->tab_covoitureur_autoc['nom'] = '';
                $this->tab_covoitureur_autoc['prenom'] = '';
                $this->tab_covoitureur_autoc['newsletter'] = 2;
                $this->tab_covoitureur_autoc['rsa'] = 2;
                $this->tab_covoitureur_autoc['mail'] = '';
                $this->tab_covoitureur_autoc['date_debut'] = '';
                $this->tab_covoitureur_autoc['date_arret'] = '';
                $this->tab_covoitureur_autoc['trajet'] = 99;
                $this->tab_covoitureur_autoc['equipage'] = 99;

                //génération de l'élément de lien pour csv
                $this->lien_to = '';
                $compt = 0;
                if ($this->tab_covoitureur_autoc['newsletter'] != '') {
                    if ($compt == 0) {
                        $esplt = '';
                    } else {
                        $esplt = '&';
                    }
                    $this->lien_to .= $esplt . 'newsletter=' . $this->tab_covoitureur_autoc['newsletter'];
                    $compt++;
                }
                if ($this->tab_covoitureur_autoc['ville'] != '') {
                    if ($compt == 0) {
                        $esplt = '';
                    } else {
                        $esplt = '&';
                    }
                    $this->lien_to .= $esplt . 'ville=' . $this->tab_covoitureur_autoc['ville'];
                    $compt++;
                }
                if ($this->tab_covoitureur_autoc['nom'] != '') {
                    if ($compt == 0) {
                        $esplt = '';
                    } else {
                        $esplt = '&';
                    }
                    $this->lien_to .= $esplt . 'nom=' . $this->tab_covoitureur_autoc['nom'];
                    $compt++;
                }
                if ($this->tab_covoitureur_autoc['prenom'] != '') {
                    if ($compt == 0) {
                        $esplt = '';
                    } else {
                        $esplt = '&';
                    }
                    $this->lien_to .= $esplt . 'prenom=' . $this->tab_covoitureur_autoc['prenom'];
                    $compt++;
                }
                if ($this->tab_covoitureur_autoc['rsa'] != '') {
                    if ($compt == 0) {
                        $esplt = '';
                    } else {
                        $esplt = '&';
                    }
                    $this->lien_to .= $esplt . 'rsa=' . $this->tab_covoitureur_autoc['rsa'];
                    $compt++;
                }
                if ($this->tab_covoitureur_autoc['mail'] != '') {
                    if ($compt == 0) {
                        $esplt = '';
                    } else {
                        $esplt = '&';
                    }
                    $this->lien_to .= $esplt . 'mail=' . $this->tab_covoitureur_autoc['mail'];
                    $compt++;
                }
                if ($this->tab_covoitureur_autoc['date_debut'] != '') {
                    if ($compt == 0) {
                        $esplt = '';
                    } else {
                        $esplt = '&';
                    }
                    $this->lien_to .= $esplt . 'date_debut=' . $this->tab_covoitureur_autoc['date_debut'];
                    $compt++;
                }
                if ($this->tab_covoitureur_autoc['date_arret'] != '') {
                    if ($compt == 0) {
                        $esplt = '';
                    } else {
                        $esplt = '&';
                    }
                    $this->lien_to .= $esplt . 'date_arret=' . $this->tab_covoitureur_autoc['date_arret'];
                    $compt++;
                }
                if ($this->tab_covoitureur_autoc['trajet'] != '') {
                    if ($compt == 0) {
                        $esplt = '';
                    } else {
                        $esplt = '&';
                    }
                    $this->lien_to .= $esplt . 'trajet=' . $this->tab_covoitureur_autoc['trajet'];
                    $compt++;
                }
                if ($this->tab_covoitureur_autoc['equipage'] != '') {
                    if ($compt == 0) {
                        $esplt = '';
                    } else {
                        $esplt = '&';
                    }
                    $this->lien_to .= $esplt . 'equipage=' . $this->tab_covoitureur_autoc['equipage'];
                    $compt++;
                }
                //sélection de la méthode de recherche si demande de (trajet ou equipage) ou non
                if ($this->tab_covoitureur_autoc['trajet'] == 0) { //sélection si pas de trajet
                    $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRecherche(
                                    $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['nom'],$this->tab_covoitureur_autoc['prenom'], null
                    ));
                    $this->pager->setPage($request->getParameter('page', 1));
                    $this->pager->init();

                    $this->lien_export_csv = array('date_debut' => '',
                        'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                        'mail' => $this->tab_covoitureur_autoc['mail'],
                        'ville' => $this->tab_covoitureur_autoc['ville'],
                        'nom' => $this->tab_covoitureur_autoc['nom'],
                        'prenom' => $this->tab_covoitureur_autoc['prenom'],
                        'rsa' => $this->tab_covoitureur_autoc['rsa'],
                        'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                        'trajet' => '',
                        'equipage' => ''
                    );
                } else {//sélection si autre
                    /*
                    if ($this->tab_covoitureur_autoc['equipage'] == 0) {// recherche pour non équipagé
                        $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRechercheTrajetNonEquipage(
                                        $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['trajet'], $this->tab_covoitureur_autoc['equipage'], $this->tab_covoitureur_autoc['nom'], null
                        ));
                        $this->pager->setPage($request->getParameter('page', 1));
                        $this->pager->init();

                        $this->lien_export_csv = array('date_debut' => '',
                            'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                            'mail' => $this->tab_covoitureur_autoc['mail'],
                            'ville' => $this->tab_covoitureur_autoc['ville'],
                            'nom' => $this->tab_covoitureur_autoc['nom'],
                            'rsa' => $this->tab_covoitureur_autoc['rsa'],
                            'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                            'trajet' => $this->tab_covoitureur_autoc['trajet'],
                            'equipage' => $this->tab_covoitureur_autoc['equipage']
                        );
                    } else {
                        $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRechercheTrajetEquipage(
                                        $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['trajet'], $this->tab_covoitureur_autoc['equipage'], $this->tab_covoitureur_autoc['nom'], null
                        ));
                        $this->pager->setPage($request->getParameter('page', 1));
                        $this->pager->init();

                        $this->lien_export_csv = array('date_debut' => '',
                            'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                            'mail' => $this->tab_covoitureur_autoc['mail'],
                            'ville' => $this->tab_covoitureur_autoc['ville'],
                            'nom' => $this->tab_covoitureur_autoc['nom'],
                            'rsa' => $this->tab_covoitureur_autoc['rsa'],
                            'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                            'trajet' => $this->tab_covoitureur_autoc['trajet'],
                            'equipage' => $this->tab_covoitureur_autoc['equipage']
                        );
                    }
                    
                    */
                    $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurRechercheTrajetEquipageOuNon(
                                        $this->tab_covoitureur_autoc['date_debut'], $this->tab_covoitureur_autoc['date_arret'], $this->tab_covoitureur_autoc['mail'], $this->tab_covoitureur_autoc['ville'], $this->tab_covoitureur_autoc['rsa'], $this->tab_covoitureur_autoc['newsletter'], $this->tab_covoitureur_autoc['trajet'], $this->tab_covoitureur_autoc['equipage'], $this->tab_covoitureur_autoc['nom'], $this->tab_covoitureur_autoc['prenom'],null
                        ));
                        $this->pager->setPage($request->getParameter('page', 1));
                        $this->pager->init();

                        $this->lien_export_csv = array('date_debut' => '',
                            'date_arret' => $this->tab_covoitureur_autoc['date_arret'],
                            'mail' => $this->tab_covoitureur_autoc['mail'],
                            'ville' => $this->tab_covoitureur_autoc['ville'],
                            'nom' => $this->tab_covoitureur_autoc['nom'],
                            'prenom' => $this->tab_covoitureur_autoc['prenom'],
                            'rsa' => $this->tab_covoitureur_autoc['rsa'],
                            'newsletter' => $this->tab_covoitureur_autoc['newsletter'],
                            'trajet' => $this->tab_covoitureur_autoc['trajet'],
                            'equipage' => $this->tab_covoitureur_autoc['equipage']
                        );
                }
            }
        }
    }

    /*     * ***************************************************** */
    /*     MISE EN FORME CSV  de la liste covoitureurs               * */
    /*     * ***************************************************** */

    public function executeExportCsvListe(sfWebRequest $request) {


        // Create new PHPExcel object
        //echo date('H:i:s') . " Create new PHPExcel object\n";
        $objPHPExcel = new sfPhpExcel();

        //récupération des parametres passé par l'url
        if ($request->getParameter('date_debut') != null && $request->getParameter('date_debut') != '') {
            $date_debut = $request->getParameter('date_debut');
        } else {
            $date_debut = '';
        }
        if ($request->getParameter('date_fin') != null && $request->getParameter('date_fin') != '') {
            $date_fin = $request->getParameter('date_fin');
        } else {
            $date_fin = '';
        }
        if ($request->getParameter('mail') != null && $request->getParameter('mail') != '') {
            $mail = $request->getParameter('mail');
        } else {
            $mail = '';
        }
        if ($request->getParameter('nom') != null && $request->getParameter('nom') != '') {
            $nom = $request->getParameter('nom');
        } else {
            $nom = '';
        }
        if ($request->getParameter('ville') != null && $request->getParameter('ville') != '') {
            $ville = $request->getParameter('ville');
        } else {
            $ville = '';
        }
        if ($request->getParameter('rsa') != null && $request->getParameter('rsa') != '') {
            $rsa = $request->getParameter('rsa');
        } else {
            $rsa = '';
        }
        if ($request->getParameter('newsletter') != null && $request->getParameter('newsletter') != '') {
            $newsletter = $request->getParameter('newsletter');
        } else {
            $newsletter = '';
        }
        if ($request->getParameter('trajet') != null && $request->getParameter('trajet') != '') {
            $trajet = $request->getParameter('trajet');
        } else {
            $trajet = '';
        }
        if ($request->getParameter('equipage') != null && $request->getParameter('equipage') != '') {
            $equipage = $request->getParameter('equipage');
        } else {
            $equipage = '';
        }

        /*
          $this->lien_export_csv = array('date_debut' => $request->getParameter('date_debut'),
          'date_fin' => $request->getParameter('date_fin'),
          'mail' => $request->getParameter('ville'),
          'ville' => $request->getParameter('mail'),
          'rsa' => $request->getParameter('rsa'),
          'newsletter' => $request->getParameter('newsletter'),
          'trajet' => $request->getParameter('trajet'),
          'equipage' => $request->getParameter('equipage')
          );
         */

        $this->lien_export_csv = array('date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'mail' => $mail,
            'nom' => $nom,
            'ville' => $ville,
            'rsa' => $rsa,
            'newsletter' => $newsletter,
            'trajet' => $trajet,
            'equipage' => $equipage
        );


        //récupération de la liste des covoitureur
        if ($date_debut == ''
                && $date_fin == ''
                && $mail == ''
                && $nom == ''               
                && $ville == ''
                && $rsa == ''
                && $newsletter == ''
                && $trajet == ''
                && $equipage == ''
        ) {
            $covoitureurs = Doctrine::getTable('Covoitureur')->getCovoitureurSiteExecute();
            //$covoitureurs->execute();
        } elseif ($trajet != 0 ) {
            $covoitureurs = Doctrine::getTable('Covoitureur')->getCovoitureurRechercheTrajetEquipageOuNon(
                            $date_debut, $date_fin, $mail, $ville, $rsa, $newsletter, $trajet, $equipage, $nom, true
            );
            
        } else {
            $covoitureurs = Doctrine::getTable('Covoitureur')->getCovoitureurRecherche(
                            $date_debut, $date_fin, $mail, $ville, $rsa, $newsletter, $nom, true
            );
        }



        //mise en forme CSV
        $objPHPExcel->getProperties()->setCreator("Covoiturage Plus");
        $objPHPExcel->getProperties()->setLastModifiedBy("Covoiturage Plus");
        $objPHPExcel->getProperties()->setTitle("Covoiturage Plus - Liste des covoitureurs");
        $objPHPExcel->getProperties()->setSubject("Covoiturage Plus");
        $objPHPExcel->getProperties()->setDescription("Liste des covoitureurs.");
        $objPHPExcel->getProperties()->setKeywords("Covoiturage Plus");
        $objPHPExcel->getProperties()->setCategory("covoitureurs");

        //
        $objPHPExcel->setActiveSheetIndex(0);

        //premiere ligne de titre
        $objPHPExcel->getActiveSheet()->setCellValue('A1', "Nom");
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Prenom');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Mail');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Etablissement');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Nb de trajets');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Equipage?');
        $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Adresse');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Telephone');

        $i = 1;

        //lignes de données
        
        foreach ($covoitureurs as $covoitureur) {
            $i++;
            $colA = 'A'.$i;
            $colB = 'B'.$i;
            $colC = 'C'.$i;
            $colD = 'D'.$i;
            $colE = 'E'.$i;
            $colF = 'F'.$i;
            $colG = 'G'.$i;
            $colH = 'H'.$i;
            
            $objPHPExcel->getActiveSheet()->setCellValue($colA, $covoitureur->getNom());
            $objPHPExcel->getActiveSheet()->setCellValue($colB, $covoitureur->getPrenom());
            $objPHPExcel->getActiveSheet()->setCellValue($colC, $covoitureur->getMail());

            $objPHPExcel->getActiveSheet()->setCellValue($colD, $covoitureur->getCpEtablissement()->getCpEtablissementEtablissementNom());
            $objPHPExcel->getActiveSheet()->setCellValue($colE, $covoitureur->getNbTrajetCovoitureur());

            if ($covoitureur->getNbTrajetEquipageCovoitureur() != 0) {
                $objPHPExcel->getActiveSheet()->setCellValue($colF, 'OUI');
            } else {
                $objPHPExcel->getActiveSheet()->setCellValue($colF, 'NON');
            }
            $objPHPExcel->getActiveSheet()->setCellValue($colG, $covoitureur->getAdresse() . " - " . $covoitureur->getCodePostal() . " " . $covoitureur->getVille());
            $objPHPExcel->getActiveSheet()->setCellValue($colH, $covoitureur->getTelephone());

        }





// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


// Save CSV file
        //echo date('H:i:s') . " Write to Excel2007 format\n";
        $this->fichier_sortie = sfConfig::get('app_rep_fic_csv') . sfConfig::get('app_fic_covoit_csv') . "_" . date('Y_m_d') . ".csv";
        //$this->fichier_sortie = sfConfig::get('app_rep_fic_csv') . "stat.csv";
        $fic_sortie = "inscrit";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');

        $objWriter->setUseBOM(true);
        $objWriter->setDelimiter(';');
        $objWriter->setEnclosure('');
        $objWriter->setLineEnding("\r\n");
        $objWriter->setSheetIndex(0);


        $xls_data = $objWriter->save(str_replace('.php', '.csv', $this->fichier_sortie));

        $this->getResponse()->clearHttpHeaders();
        $this->getResponse()->setStatusCode(200);
        $this->getResponse()->setContentType('application/txt');
        $this->getResponse()->setHttpHeader('Pragma', 'public'); //optional cache header
        $this->getResponse()->setHttpHeader('Expires', 0); //optional cache header
        $this->getResponse()->setHttpHeader('Content-Disposition', "attachment; filename=$this->fichier_sortie");
        $this->getResponse()->setHttpHeader('Content-Transfer-Encoding', 'binary');
        $this->getResponse()->setHttpHeader('Content-Length', filesize($this->fichier_sortie));

        return $this->renderText(file_get_contents($this->fichier_sortie));

        //$this->setTemplate('exportCsvListe');
        
    }

    public function executeNew(sfWebRequest $request) {
        //insertion des informations nécessaire &agrave; une création
        //$this->covoitureur = New Covoitureur();
        // $this->covoitureur->setIdSiteClient(sfConfig::get('sf_id_site_client'));
        //gestion de la date de modification
        //$now = date("Y-m-d H:i:s");
        //$this->covoitureur->setDateCreation($now);
        //génération de la clé
        //$outil = New Util();
        //$this->covoitureur->setCle($outil->genereCle('', ''));
        //$this->form = new CovoitureurForm($this->covoitureur);
        $this->form = new CovoitureurForm();
        
        

        


        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = '';
        
        
        //recupération des informations liées à l'établissement passe en parametre
        if ($request->getParameter('cp_etablissement_id')) {
            
            $this->forward404Unless($etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('cp_etablissement_id')));
            //$libellEtab = $etablissement->getNomEtablissementRaisonSocialeId();
            
            $this->tab_ville_autoc['etablissement'] = $etablissement->getNomEtablissementRaisonSocialeId();
             //$this->tab_ville_autoc['etablissement'] = 'TEST';
        }else{
            $this->tab_ville_autoc['etablissement'] = '';
        }

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        //insertion des informations nécessaire &agrave; une création
        //$covoitureur = New Covoitureur();
        //$covoitureur->setIdSiteClient(sfConfig::get('sf_id_site_client'));
        //gestion de la date de modification
        //$now = date("Y-m-d H:i:s");
        //$covoitureur->setDateCreation($now);
        //génération de la clé
        //$outil = New Util();
        //$covoitureur->setCle($outil->genereCle('', ''));
        //$this->form = new CovoitureurForm($covoitureur);
        $this->form = new CovoitureurForm();

        //gestion des parametres recupérés par autocompletion
        $formnew = $request->getParameter('covoitureur');

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = $formnew['ville'];
        $this->tab_ville_autoc['etablissement'] = $formnew['etablissement'];

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($this->covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_utilisateur'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_utilisateur')));
        $this->form = new CovoitureurForm($this->covoitureur);
        $this->form->setDefault('valid_mail', $this->covoitureur->getMail());

        //vérification de la présence de la photo et insertion
        /*
          if($covoitureur->getFilePhoto() != ''){
          $this->image = $covoitureur->getCheminPhotoCovoitureur(ESC_RAW);
          }else{
          $this->image = '';
          }
         */
        //$this->chemin = sfConfig::get('sf_rep_ini_photo_covoitureur');
        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = $this->covoitureur->getVille();
        $this->tab_ville_autoc['etablissement'] = $this->covoitureur->getCpEtablissement()->getNomEtablissementRaisonSocialeId();
        $this->id_utilisateur = $request->getParameter('id_utilisateur');

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($this->covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_utilisateur'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_utilisateur')));
        $this->form = new CovoitureurForm($this->covoitureur);

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->processForm($request, $this->form);

        //tableau des parametres passé en autocomplétion
        $this->tab_ville_autoc = array();
        $this->tab_ville_autoc['ville'] = $this->covoitureur->getVille();
        $this->tab_ville_autoc['etablissement'] = $this->covoitureur->getCpEtablissement();

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        //$request->checkCSRFProtection();

        //suppression des trajets et actions liées au covoitureur
        try {
            //récupération des cp_trajets_id
            $liste_trajet = Doctrine_Core::getTable('Trajet')->getListeTrajetCovoitureur($request->getParameter('id_utilisateur'));
            if($liste_trajet){
                //suppression des cp_trajets
                Doctrine_Query::create()
                ->delete('CpTrajet ct')
                ->whereIn('ct.cp_trajet_id',$liste_trajet)
                ->execute()    ;
            }

            Doctrine::getTable('Trajet')
                    ->findBy('id_utilisateur', $request->getParameter('id_utilisateur'))
                    ->delete();
        } catch (Doctrine_Validator_Exception $e) {
            echo "erreur à la suppression du trajet associée à l'inscrit";
        }

        $this->forward404Unless($covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($request->getParameter('id_utilisateur'))), sprintf('Object covoitureur does not exist (%s).', $request->getParameter('id_utilisateur')));
        $covoitureur->delete();

        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        $this->message = "le covoitureur a été supprimé";
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

            $covoitureur = $form->save();

            //gestion de la date de modification et de la date de création
            $now = date("Y-m-d H:i:s");

            if ($newInd == 1) {
                $covoitureur->setDateCreation($now);

                //génération de la clé
                $outil = New Util();
                $covoitureur->setCle($outil->genereCle('', ''));

                //mise &agrave; jour du site
                $covoitureur->setIdSiteClient(sfConfig::get('sf_id_site_client'));

                //creation du mot de passe
                $covoitureur->setMotDePasse(sfConfig::get('app_new_password'));
            }

            //gestion de la date de naissance
            if ($form->getValue('annee_naissance') != 0 && $form->getValue('annee_naissance') != '') {
                $date_naiss = $form->getValue('annee_naissance') . "-01-01";
                //$date_naiss = "1965-01-01";
                $covoitureur->setDateNaissance($date_naiss);
            }

            //mise &agrave; jour de la date de modification
            $covoitureur->setDateModification($now);
            
            $this->etabId = 0;
            
            $valEtab = $form->getValue('etablissement');
            
            //gestion de l'établissement
            if ( $form->getValue('etablissement') != '') {

                //Recupération du libelle de l'établissement
                $outil = New Util();
                $etabExtrait = $outil->extractCpLibelle($form->getValue('etablissement'));
                
                //récupération de l'id de l'établisement
                $etabExtraitId = Doctrine_Core::getTable('CpEtablissement')->getIdEtabParLibel(null,$etabExtrait);
                
                
                $this->etabId = $etabExtraitId;
                
                $covoitureur->setCpEtablissementId($etabExtraitId);
                                
            }else{
                $covoitureur->setCpEtablissementId(0);
            }


            $covoitureur->save();
            
            //gestion de la photo
            if (!is_null($form->getValue('file_photo'))) {
                $file = $form->getValue('file_photo');

                //$covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($this->getValue('id_utilisateur')));
                //$filename = sfConfig::get('sf_photo_covoitureur_prefixe') . $this->getValue('id_utilisateur') . $file->getExtension($file->getOriginalExtension());
                //$filename = sfConfig::get('sf_photo_covoitureur_prefixe') . $this->getValue('id_utilisateur') . sfConfig::get('extension_fichier_image');
                //$filename = sfConfig::get('sf_chemin_base') . $covoitureur->setCheminPhotoCovoitureur();
                $filename = sfConfig::get('sf_web_dir') . $covoitureur->setCheminPhotoCovoitureur();
                $thumbfilename = sfConfig::get('sf_chemin_base') . $covoitureur->setThumbnailPhotoCovoitureur();

                $file->save($filename);
                $outil = new Util();
                $outil->thumbnailPhotoEtEnreg($form->getValue('file_photo'), $thumbfilename);

                $covoitureur->setPhotoExt(sfConfig::get('sf_extension_fichier_image'));
                $covoitureur->setEtatPhoto(1);
                $covoitureur->save();
                //$this->setDefault('etat_photo ', '1');
            } else {//pas de fichier photo proposé en téléchargement
                //$this->setDefault('file_photo','');
                //l'etat_photo est à 0 en base , => forcage etat_photo à zéro et suppression de la photo
                //  si elle existe
                if ($covoitureur->getEtatPhoto() == 0) {
                    //$this->setDefault('etat_photo ', '0');
                    $covoitureur->setEtatPhoto(0);
                    //$covoitureur->setSuppPhoto('0');
                    $covoitureur->setFilePhoto('');
                    //$this->setDefault('supp_photo', '0');
                    //$this->setDefault('file_photo', '');
                } else {// etat_photo diff de 0 => fichier photo existe
                    //gestion de la suppression de la photo  et du thumbnail      
                    if (($form->getValue('supp_photo')) == 1) {
                        //$covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($this->getValue('id_utilisateur')));

                        //suppression de la photo
                        /*if (!$covoitureur->deletePhotoCovoitureur()) {
                            $erreur = 1;
                        }
                         * 
                         */
                        $cheminPhoto = $covoitureur->getCheminPhotoCovoitureur1();
                        //unlink(sfConfig::get('sf_chemin_base') . $covoitureur->setCheminPhotoCovoitureur());
                        unlink(sfConfig::get('sf_web_dir') . $covoitureur->setCheminPhotoCovoitureur());

                        //suppression du thumnail de la photo
                        if (!$covoitureur->deleteThumnailPhotoCovoitureur()) {
                            $erreur = 1;
                        }


                        $covoitureur->setPhotoExt('');
                        $covoitureur->setEtatPhoto(0);
                        $covoitureur->setFilePhoto('');
                        //$covoitureur->save();
                        //$this->setDefault('supp_photo', '0');
                        //$this->setDefault('etat_photo ', '0');
                    } else { // gestion de la vérificatin de présence photo
                    }
                }
            }
            
            $covoitureur->save();

            if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
                
                $this->redirect('covoitureur/show?popup=1&etabId='.$this->etabId.'&id_utilisateur=' . $covoitureur->getIdUtilisateur().'&valEtab='.$valEtab);
                //$this->redirect('covoitureur/show?popup=1&id_utilisateur=' . $covoitureur->getIdUtilisateur());
            } else {
                //$this->redirect('covoitureur/edit?id_utilisateur=' . $covoitureur->getIdUtilisateur());
                $this->redirect('covoitureur/show?id_utilisateur=' . $covoitureur->getIdUtilisateur());
            }

        }
    }




    /*     * **********************************************************************************
     *                   GESTION POUR LES EQUIPAGES                                     *
     * ********************************************************************************** */


    /*
     * retourne la liste des covoitureurs &agrave; partir des éléments de requete
     * fournis par le formulaire de recherche
     */

    public function executeListeCovoitureurPourEquipage(sfWebRequest $request) {


        $this->form = new CovoitureurRecherchePourEquipageForm();

        $this->equipvalue = $request->getParameter('id_equipage');

        if ($request->isMethod('post')) {
            //utilisation des validateurs existant pour nettoyer et filtrer les informations passées par le formulaire de recherche
            $this->form->bind($request->getParameter('CovoitureurRecherchePourEquipage'), $request->getFiles('CovoitureurRecherchePourEquipage'));

            //vérification de la validité du formulaire et création de la requete idoine
            if ($this->form->isValid()) {
                $formulaire = $this->form->getValues('nom');
                $covoitureur_nom = $formulaire['nom'] . '%';
                $covoitureur_ville = $formulaire['ville'];
                $covoitureur_mail = $formulaire['mail'];

                //requete en fonction des éléments passés
                $this->covoitureurs = Doctrine_Core::getTable('Covoitureur')
                                ->createQuery('ce')
                                ->where('ce.id_site_client = ?', sfConfig::get('sf_id_site_client'))
                                ->andWhere('ce.nom LIKE ?', $covoitureur_nom)
                                ->execute();
            } else {
                $this->covoitureurs = Doctrine_Core::getTable('Covoitureur')
                                ->createQuery('ce')
                                ->limit('10')
                                ->execute();
            }
        }

        //passage de l'id equipage
        $this->id_equipage = $request->getParameter('id_equipage');
    }

    /*
     * ajoute un covoitureur &agrave; un équipage
     *
     */

    public function executeCovoitureurEquipageAjout(sfWebRequest $request) {
        //vérification des parametres passés
        if (is_null($request->getParameter('id_equipage')) || is_null($request->getParameter('id_covoitureur'))) {
            return sfView::NONE;
        }

        //ajout du covoitureur à la table EquipagesCovoitureur

        $equipagecovoitureur = new EquipageCovoitureur();
        $equipagecovoitureur->setIdEquipage($request->getParameter('id_equipage'));
        $equipagecovoitureur->setIdSite(sfConfig::get('sf_id_site_client'));
        $equipagecovoitureur->setIdCovoitureur($request->getParameter('id_covoitureur'));

        //génération de la clé
        $outil = New Util();
        $equipagecovoitureur->setCle($outil->genereCle('', ''));

        //gestion de la date de modification
        $now = date("Y-m-d H:i:s");
        $equipagecovoitureur->setDateCreation($now);

        $equipagecovoitureur->save();


        $this->redirect('equipage/edit?id_equipage=' . $request->getParameter('id_equipage'));

        //return sfView::NONE;
    }

    /*
     * méthode pour suppimer la liaison d'un covoitureur et d'un équipage => table EquipageCovoitureur
     *
     */

    public function executeCovoitureurEquipageDelete(sfWebRequest $request) {
        $this->forward404Unless($equipageCovoitureur = Doctrine_Core::getTable('EquipageCovoitureur')->find(array($request->getParameter('id_equipage'), $request->getParameter('id_covoitureur'))), sprintf('Object equipagecovoitureur does not exist (%s).', array($request->getParameter('id_equipage'), $request->getParameter('id_covoitureur'))));
        $equipageCovoitureur->delete();

        $this->redirect('equipage/edit?id_equipage=' . $request->getParameter('id_equipage'));
    }

    /*
     * fonction d'autocomplétion pour le covoitureur
     */

    public function executeAutocompleteCovoitureur(sfWebRequest $request) {
        //récupération du parametre passé par ajax
        $value = $request->getParameter('q');

        $covoitureur = new Covoitureur();

        $this->results = $covoitureur->getAutocomplete($value);
        $this->setLayout(false);
    }

    /*
     * fonction d'autocomplétion pour le covoitureur
     */

    public function executeAutocompleteCovoitureurId(sfWebRequest $request) {
        //récupération du parametre passé par ajax
        $value = $request->getParameter('q');

        $covoitureur = new Covoitureur();

        $this->results = $covoitureur->getAutocompleteId($value);
        $this->setLayout(false);
    }

    /*
     * liste des covoitureurs associés &agrave; une entreprise (Etablissement)
     */

    public function executeListeCovoitureurEtb(sfWebRequest $request) {



        $this->pager = new sfDoctrinePager(
                        'Covoitureur',
                        sfConfig::get('app_max_covoitureur_list')
        );
        $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurEtb($request->getParameter('cp_etablissement_id')));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();

        //récupération du nom de l'établissement
        $etablissement = Doctrine_Core::getTable('CpEtablissement')->find($request->getParameter('cp_etablissement_id'));

        if ($etablissement->getCpEtablissementRaisonSocial() == '' || $etablissement->getCpEtablissementRaisonSocial() == null) {
            $this->nomEtablissement = $etablissement->getCpEtablissementEtablissementNom();
        } else {
            $this->nomEtablissement = $etablissement->getCpEtablissementRaisonSocial();
        }
    }

    /*
     * liste les covoitureurs liés à un établissement
     *  => recherche dans la table Covoitureur
     */

    public function executeListeInscritsEtb(sfWebRequest $request) {
        
        
        $this->pager = new sfDoctrinePager(
                        'Covoitureur',
                        sfConfig::get('app_max_covoitureur_list')
        );
        //$this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurInscritEtb($this->etb_id));
        $this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurInscritEtb($request->getParameter('cp_etablissement_id')));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        
        
        /*
        $this->pager = new sfDoctrinePager(
                        'Trajet',
                        sfConfig::get('app_max_covoitureur_list')
        );
        //$this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurInscritEtb($this->etb_id));
        $this->pager->setQuery(Doctrine::getTable('Trajet')->getCovoitureurInscritEtb($request->getParameter('cp_etablissement_id')));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
*/
        /*
        
        $this->pager = new sfDoctrinePager(
                        'CovoitureurTrajet',
                        sfConfig::get('app_max_covoitureur_list')
        );
        //$this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurInscritEtb($this->etb_id));
        $this->pager->getQuery()
                //->createQuery('c')
                ->select('c.*, t.id_trajet as id_trajet, t.depart_ville as depart_ville, t.destination_ville as destination_ville')
                ->from('Covoitureur c,Trajet t')
                //->leftJoin('c.Trajet t')
                ->where('t.id_utilisateur = c.id_utilisateur')
                ->andWhere('c.id_site_client = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('c.cp_etablissement_id = ?', $request->getParameter('cp_etablissement_id'))
                ;
        */
        
        
        //$this->pager->setQuery(Doctrine::getTable('Covoitureur')->getCovoitureurInscritEtb($request->getParameter('cp_etablissement_id')));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        
                
        
        //$this->pager1 = Doctrine_Core::getTable('Covoitureur')->getCovoitureurInscritEtbExe($request->getParameter('cp_etablissement_id'));
        
        
        //print_r($this->pager1);
        
        //sélection du layout de popup en cas de demande d'affichage en popup
        if ($request->getParameter('popup') && $request->getParameter('popup') == 1) {
            $this->setLayout('layout-popup');

            //indicateur de fenetre en popup pour affichage des boutons adéquats
            $this->popup = 1;
        }

        //passage du parametre etablissement pour le pager
        $this->cp_etablissement_id = $request->getParameter('cp_etablissement_id');

        //récupération du nom de l'établissement
        $this->forward404Unless($etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object etablissement does not exist (%s).', $request->getParameter('cp_etablissement_id')));
        $this->etablissement_nom = $etablissement->getCpEtablissementEtablissementNom();

    }

}
