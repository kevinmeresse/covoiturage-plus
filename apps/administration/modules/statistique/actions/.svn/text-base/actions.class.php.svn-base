<?php

/**
 * statistique actions.
 *
 * @package    roulezmailn_v3
 * @subpackage statistique
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statistiqueActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        
        
        $this->forward('statistique', 'statAccueil');
    }
    
    /*
     * test
     */
     public function executeTest(sfWebRequest $request) {
        
        if ($request->getParameter('datedeb') != '0000-00-00' && $request->getParameter('datedeb') != '' && $request->getParameter('datedeb') != '0') {
            $date_deb = $request->getParameter('datedeb');
        } else {
            $date_deb = null;
        }

        if ($request->getParameter('datefin') != '0000-00-00' && $request->getParameter('datefin') != '' && $request->getParameter('datefin') != '0') {
            $date_fin = $request->getParameter('datefin');
        } else {
            $date_fin = null;
        }
        
        if ($request->getParameter('etablissement') != null && $request->getParameter('etablissement') != '' && $request->getParameter('etablissement') != '0') {
            $etablissement = $request->getParameter('etablissement');
           // $this->test = 1;
        } else {
            $etablissement = null;
            //$this->test = 0;
        }
        /*
        $this->etab6 = print_r($request->getParameter('etablissement'));
        $this->datefin = $date_fin;
        $this->etab = $request->getParameter('etablissement');
        $this->etab2 = $etablissement;
        $etab = $request->getParameter('etablissement');
        $this->etab4 = $etab;
        $this->etab3 = (($request->getParameter('etablissement')==0)?0:1);
        $this->etab5 = (($etab!=0)?0:1);
         * 
         */

        //tableau des parametres passés par le formulaire et initialisation
        $tab_stat_param = array();
        $tab_stat_param['etablissement'] = '';
        $tab_stat_param['date_debut'] = null;
        $tab_stat_param['date_fin'] = null;
        $tab_stat_param['groupe_stat'] = null;
        $tab_stat_param['communaute_commune'] = null;
        $tab_stat_param['groupe_stat_nom'] = null;
        $tab_stat_param['communaute_commune_nom'] = null;

         //extraction des éléments des groupes
        $groupe_stat = null;
        $communaute_commune = null;
        
                if ( $request->getParameter('groupe_stat') != '0' && $request->getParameter('groupe_stat') != null) {
                    //récupération des éléments du groupe_stat (tableau de villes liées)
                    $this->forward404Unless($groupe_stat = Doctrine_Core::getTable('GroupeStat')->find(array($request->getParameter('groupe_stat'))), sprintf('Object groupe_stat does not exist (%s).', $request->getParameter('groupe_stat')));

                    $this->groupe = $groupe_stat->getParametres();

                    $tab_stat_param['groupe_stat'] = $groupe_stat->extractIdSerialiseGroupe();
                    //$this->extrait = print_r($this->tab_stat_param['groupe_stat']);

                    //extraction des noms de ville pour les covoitureurs
                    $tab_stat_param['groupe_stat_nom'] = $groupe_stat->extractNomVilleTab();
                }

                //extraction des éléments des CC
                if ( $request->getParameter('communaute_commune') != '0' && $request->getParameter('communaute_commune') != null) {
                    //récupération des éléments du communaute_commune (tableau de villes liées)
                    $this->forward404Unless($communaute_commune = Doctrine_Core::getTable('CommunauteCommune')->find(array($request->getParameter('communaute_commune'))), sprintf('Object groupe_stat does not exist (%s).', $request->getParameter('communaute_commune')));

                    $tab_stat_param['communaute_commune'] = $communaute_commune->getListeVilleLieeTabCdIn();

                    //extraction des noms de ville pour les covoitureurs
                    $tab_stat_param['communaute_commune_nom'] = $communaute_commune->getListeVilleLieeTabNom();
                }


                 $Stat = new statistiqueClass();
                $tab_result_stat_trajet = $Stat->trajetStat($date_deb, $date_fin, $etablissement, $groupe_stat, $communaute_commune);
                print_r($tab_result_stat_trajet);
                
        //$fichierPdf = new PdfFicGener();
        //$fichierPdf->generepdfStat($date_deb, $date_fin, $etablissement, $tab_stat_param['groupe_stat'], $tab_stat_param['groupe_stat_nom'],$tab_stat_param['communaute_commune'], $tab_stat_param['communaute_commune_nom']  );
        
        //test
        //$fichierPdf->generepdfStat1($date_deb, $date_fin, $etablissement, $tab_stat_param['groupe_stat'], $tab_stat_param['groupe_stat_nom'],$tab_stat_param['communaute_commune'], $tab_stat_param['communaute_commune_nom']  );
    }

    /*
     * statistiques pour la page d'accueil
     */

    public function executeStatAccueil(sfWebRequest $request) {
        //tableau des parametres passés par le formulaire
        $this->tab_stat_param = array();
        //$this->tab_stat_param['societe'] = '';
        $this->tab_stat_param['etablissement'] = '';
        $this->tab_stat_param['date_debut'] = null;
        $this->tab_stat_param['date_fin'] = null;
        $this->tab_stat_param['groupe_stat'] = null;
        $this->tab_stat_param['communaute_commune'] = null;
        $this->tab_stat_param['groupe_stat_nom'] = null;
        $this->tab_stat_param['communaute_commune_nom'] = null;
        $this->tab_stat_param['groupe_stat_exp'] = null;
        $this->tab_stat_param['communaute_commune_exp'] = null;

        $this->tab_stat_param['pdf_date_debut'] = '0000-00-00';
        $this->tab_stat_param['pdf_date_fin'] = '0000-00-00';

        //initialisation du formulaire
        $this->form = new StatistiqueTriForm();

        //vérification si le formulaire est activé
        if ($request->isMethod('post')) {
            //vérification de la validité du formulaire
            $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
            if ($this->form->isValid()) {
                $formulaire = $this->form->getValues();
                //$covoitureur_nom = $formulaire['nom'] . '%';
                $this->tab_stat_param['etablissement'] = $formulaire['etablissement'];
                $this->tab_stat_param['date_debut'] = $formulaire['date_debut'];
                $this->tab_stat_param['date_fin'] = $formulaire['date_fin'];

                if ($formulaire['date_debut'] != null) {
                    $this->tab_stat_param['pdf_date_debut'] = $formulaire['date_debut'];
                }

                if ($formulaire['date_fin'] != null) {
                    $this->tab_stat_param['pdf_date_fin'] = $formulaire['date_fin'];
                }

                //extraction des éléments des groupes
                if ($formulaire['groupe_stat'] != null) {
                    //récupération des éléments du groupe_stat (tableau de villes liées)
                    $this->forward404Unless($groupe_stat = Doctrine_Core::getTable('GroupeStat')->find(array($formulaire['groupe_stat'])), sprintf('Object groupe_stat does not exist (%s).', $formulaire['groupe_stat']));

                    $this->groupe = $groupe_stat->getParametres();

                    $this->tab_stat_param['groupe_stat'] = $groupe_stat->extractIdSerialiseGroupe();
                    //$this->extrait = print_r($this->tab_stat_param['groupe_stat']);

                    //extraction des noms de ville pour les covoitureurs
                    $this->tab_stat_param['groupe_stat_nom'] = $groupe_stat->extractNomVilleTab();

                    //valeur du groupe_stat pour utilisation dans le lien vers fichiers csv et pdf
                    $this->tab_stat_param['groupe_stat_exp'] = $formulaire['groupe_stat'];
                }

                //extraction des éléments des CC
                if ($formulaire['communaute_commune'] != null) {
                    //récupération des éléments du communaute_commune (tableau de villes liées)
                    $this->forward404Unless($communaute_commune = Doctrine_Core::getTable('CommunauteCommune')->find(array($formulaire['communaute_commune'])), sprintf('Object groupe_stat does not exist (%s).', $formulaire['communaute_commune']));

                    $this->tab_stat_param['communaute_commune'] = $communaute_commune->getListeVilleLieeTabCdIn();

                    //extraction des noms de ville pour les covoitureurs
                    $this->tab_stat_param['communaute_commune_nom'] = $communaute_commune->getListeVilleLieeTabNom();

                    //valeur du groupe_stat pour utilisation dans le lien vers fichiers csv et pdf
                    $this->tab_stat_param['communaute_commune_exp'] = $formulaire['communaute_commune'];
                }
            }
        }
    }

    /*
     * génération du pdf de statistique
     */

    public function executeStatAccueilPdf(sfWebRequest $request) {
        //récupération des éléments passés par argument  

        if ($request->getParameter('datedeb') != '0000-00-00' && $request->getParameter('datedeb') != '' && $request->getParameter('datedeb') != '0') {
            $date_deb = $request->getParameter('datedeb');
        } else {
            $date_deb = null;
        }

        if ($request->getParameter('datefin') != '0000-00-00' && $request->getParameter('datefin') != '' && $request->getParameter('datefin') != '0') {
            $date_fin = $request->getParameter('datefin');
        } else {
            $date_fin = null;
        }
        
        if ($request->getParameter('etablissement') != null && $request->getParameter('etablissement') != '' && $request->getParameter('etablissement') != '0') {
            $etablissement = $request->getParameter('etablissement');
           // $this->test = 1;
        } else {
            $etablissement = null;
            //$this->test = 0;
        }
        /*
        $this->etab6 = print_r($request->getParameter('etablissement'));
        $this->datefin = $date_fin;
        $this->etab = $request->getParameter('etablissement');
        $this->etab2 = $etablissement;
        $etab = $request->getParameter('etablissement');
        $this->etab4 = $etab;
        $this->etab3 = (($request->getParameter('etablissement')==0)?0:1);
        $this->etab5 = (($etab!=0)?0:1);
         * 
         */

        //tableau des parametres passés par le formulaire et initialisation
        $tab_stat_param = array();
        $tab_stat_param['etablissement'] = '';
        $tab_stat_param['date_debut'] = null;
        $tab_stat_param['date_fin'] = null;
        $tab_stat_param['groupe_stat'] = null;
        $tab_stat_param['communaute_commune'] = null;
        $tab_stat_param['groupe_stat_nom'] = null;
        $tab_stat_param['communaute_commune_nom'] = null;

         //extraction des éléments des groupes
        
                if ( $request->getParameter('groupe_stat') != '0' && $request->getParameter('groupe_stat') != null) {
                    //récupération des éléments du groupe_stat (tableau de villes liées)
                    $this->forward404Unless($groupe_stat = Doctrine_Core::getTable('GroupeStat')->find(array($request->getParameter('groupe_stat'))), sprintf('Object groupe_stat does not exist (%s).', $request->getParameter('groupe_stat')));

                    $this->groupe = $groupe_stat->getParametres();

                    $tab_stat_param['groupe_stat'] = $groupe_stat->extractIdSerialiseGroupe();
                    //$this->extrait = print_r($this->tab_stat_param['groupe_stat']);

                    //extraction des noms de ville pour les covoitureurs
                    $tab_stat_param['groupe_stat_nom'] = $groupe_stat->extractNomVilleTab();
                }

                //extraction des éléments des CC
                if ( $request->getParameter('communaute_commune') != '0' && $request->getParameter('communaute_commune') != null) {
                    //récupération des éléments du communaute_commune (tableau de villes liées)
                    $this->forward404Unless($communaute_commune = Doctrine_Core::getTable('CommunauteCommune')->find(array($request->getParameter('communaute_commune'))), sprintf('Object groupe_stat does not exist (%s).', $request->getParameter('communaute_commune')));

                    $tab_stat_param['communaute_commune'] = $communaute_commune->getListeVilleLieeTabCdIn();

                    //extraction des noms de ville pour les covoitureurs
                    $tab_stat_param['communaute_commune_nom'] = $communaute_commune->getListeVilleLieeTabNom();
                }



        $fichierPdf = new PdfFicGener();
        //$fichierPdf->generepdfStat($date_deb, $date_fin, $etablissement, $tab_stat_param['groupe_stat'], $tab_stat_param['groupe_stat_nom'],$tab_stat_param['communaute_commune'], $tab_stat_param['communaute_commune_nom']  );
        
        //test
        $fichierPdf->generepdfStat($date_deb, $date_fin, $etablissement, $tab_stat_param['groupe_stat'], $tab_stat_param['groupe_stat_nom'],$tab_stat_param['communaute_commune'], $tab_stat_param['communaute_commune_nom']  );
        //$fichierPdf->generePdfTest();
        
        //$this->setTemplate('index');
    }

    /*
     * génération du CSV de statistique
     */

    public function executeStatAccueilCsv(sfWebRequest $request) {
        //récupération des éléments passés par argument  

        if ($request->getParameter('datedeb') != '0000-00-00' && $request->getParameter('datedeb') != '' && $request->getParameter('datefin') != '0') {
            $dateDeb = $request->getParameter('datedeb');
        } else {
            $dateDeb = null;
        }

        if ($request->getParameter('datefin') != '0000-00-00' && $request->getParameter('datefin') != '' && $request->getParameter('datefin') != '0') {
            $dateFin = $request->getParameter('datefin');
        } else {
            $dateFin = null;
        }
        
        //tableau de la liste des établissements et initialisation

        $tab_etablissement = array();
        $etab_nom = '';
        
        $libelle_etab_titre = '';

        //récupération des id etabliseemnt appartenant également à une société    
        if ($request->getParameter('etablissement') != '' && $request->getParameter('etablissement') != '0') {

            //recuperation de l'id (si il existe)
            $outil = new Util();
            $id = $outil->extractIdEtablissement($request->getParameter('etablissement'));
            
            //Récuperation du nom de l'etablissement
            $etab_nom = $outil->extractCpLibelle($request->getParameter('etablissement'));
            
            $libelle_etab_titre = " pour l\'etablissement ".$etab_nom;

            if ($id != 0) {
                //recuperation de la liste des id etablissement
                $tab_etablissement = array();
                $etablissement = new CpEtablissement();
                $tab_etablissement = $etablissement->getListeEtablissementSociete($id);
                
            }
        }

        //tableau des parametres passés par le formulaire et initialisation
        $tab_stat_param = array();
        $tab_stat_param['etablissement'] = '';
        $tab_stat_param['date_debut'] = null;
        $tab_stat_param['date_fin'] = null;
        $tab_stat_param['groupe_stat'] = null;
        $tab_stat_param['communaute_commune'] = null;
        $tab_stat_param['groupe_stat_nom'] = null;
        $tab_stat_param['communaute_commune_nom'] = null;

         //extraction des éléments des groupes
                if ( $request->getParameter('groupe_stat') != 0 && $request->getParameter('groupe_stat') != null) {
                    //récupération des éléments du groupe_stat (tableau de villes liées)
                    $this->forward404Unless($groupe_stat = Doctrine_Core::getTable('GroupeStat')->find(array($request->getParameter('groupe_stat'))), sprintf('Object groupe_stat does not exist (%s).', $request->getParameter('groupe_stat')));

                    $this->groupe = $groupe_stat->getParametres();

                    $tab_stat_param['groupe_stat'] = $groupe_stat->extractIdSerialiseGroupe();
                    //$this->extrait = print_r($this->tab_stat_param['groupe_stat']);

                    //extraction des noms de ville pour les covoitureurs
                    $tab_stat_param['groupe_stat_nom'] = $groupe_stat->extractNomVilleTab();
                }

                //extraction des éléments des CC
                if ( $request->getParameter('communaute_commune') != 0 && $request->getParameter('communaute_commune') != null) {
                    //récupération des éléments du communaute_commune (tableau de villes liées)
                    $this->forward404Unless($communaute_commune = Doctrine_Core::getTable('CommunauteCommune')->find(array($request->getParameter('communaute_commune'))), sprintf('Object groupe_stat does not exist (%s).', $request->getParameter('communaute_commune')));

                    $tab_stat_param['communaute_commune'] = $communaute_commune->getListeVilleLieeTabCdIn();

                    //extraction des noms de ville pour les covoitureurs
                    $tab_stat_param['communaute_commune_nom'] = $communaute_commune->getListeVilleLieeTabNom();
                }
        
        


        /*         * ***************************************************** */
        /*     COVOITUREURS                               * */
        /*         * ***************************************************** */
        
        //tableau de résultat statistique
        $tab_result_stat_covoit = array();
        
        $Stat = new statistiqueClass();
        $tab_result_stat_covoit = $Stat->covoitureurStat($dateDeb, $dateFin, $tab_etablissement, $tab_stat_param['groupe_stat_nom'], $tab_stat_param['communaute_commune_nom']);




        /*         * ***************************************************** */
        /*     TRAJETS                               * */
        /*         * ***************************************************** */
        //tableau de résultat statistique
        $tab_result_stat_trajet = array();
        
        $tab_result_stat_trajet = $Stat->trajetStat($dateDeb, $dateFin, $tab_etablissement, $tab_stat_param['groupe_stat'], $tab_stat_param['communaute_commune']);




        /*         * ***************************************************** */
        /*     MISES EN RELATION                              * */
        /*         * ***************************************************** */
        //tableau de résultat statistique
        $tab_result_stat_mer = array();
        
        $tab_result_stat_mer = $Stat->merStat($dateDeb, $dateFin, $tab_etablissement, $tab_stat_param['groupe_stat_nom'], $tab_stat_param['communaute_commune_nom']);


        





        /*         * ***************************************************** */
        /*     MISE EN FORME             CSV                 * */
        /*         * ***************************************************** */

        // Create new PHPExcel object
        //echo date('H:i:s') . " Create new PHPExcel object\n";
        $objPHPExcel = new sfPhpExcel();

// Set properties
        //echo date('H:i:s') . " Set properties\n";
        $objPHPExcel->getProperties()->setCreator("Covoiturage Plus");
        $objPHPExcel->getProperties()->setLastModifiedBy("Covoiturage Plus");
        $objPHPExcel->getProperties()->setTitle("Covoiturage Plus - Statistique");
        $objPHPExcel->getProperties()->setSubject("Covoiturage Plus");
        $objPHPExcel->getProperties()->setDescription("Statistiques.");
        $objPHPExcel->getProperties()->setKeywords("Covoiturage Plus");
        $objPHPExcel->getProperties()->setCategory("Statistiques");
        
        $objPHPExcel->getActiveSheet()->setTitle('Statistiques'.$etab_nom);


/*****************************************************************/        
// Ajout des données Covoitureurs
/*****************************************************************/

        //compteur permettant de gérer l'indice de la ligne
        $i = 0;

        //indicatuer de ligne
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;

        //echo date('H:i:s') . " Add some data\n";
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Covoitureurs');
        $i = 1;
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Informations sur les covoitureurs'.$libelle_etab_titre);

        $i = 2;
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de covoitureurs');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_covoit['nbCovoitureur']);

        $i = 3;
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de covoitureurs femmes');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_covoit['covoitureurNbF']);

        $i = 4;
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de covoitureurs Hommes');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_covoit['covoitureurNbH']);

        $i = 5;
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de bénéficiaires du RSA');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_covoit['covoitureurNbRsa']);

        $i = 7;
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de covoitureurs Peugeot');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_covoit['covoitureurNbPgt']);

        $i = 8;
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Répartition par secteur');

        
        /********************************************************/
        /* Répartition par secteur  */
        
        $i = 8;
        foreach ( $tab_result_stat_covoit['tabEqPsa'] as $key => $value) {
            $tab_A = 'A' . $i;
            $tab_B = 'B' . $i;
            $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $key);
            $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($value, 2) . "%");
            $i++;
        }
        
        /********************************************************/
        /* Répartition par horaire  */

        $i = $i + 1;
        $tab_A = 'A' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Répartition par horaire');

        $i = $i + 1;
        foreach ( $tab_result_stat_covoit['tabHrPsa'] as $key => $value) {
            $tab_A = 'A' . $i;
            $tab_B = 'B' . $i;
            $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $key);
            $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($value, 2) . "%");
            $i++;
        }
        
        /********************************************************/
        /* Répartition par CSP  */

        $i = $i + 1;
        $tab_A = 'A' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Répartition par fonctions');

        $i = $i + 1;
        foreach ( $tab_result_stat_covoit['tabFct'] as $key => $value) {
            $tab_A = 'A' . $i;
            $tab_B = 'B' . $i;
            $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $key);
            $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($value, 2) . "%");
            $i++;
        }
        
        /********************************************************/
        /* connaissance de l'association  */

        $i = $i + 1;
        $tab_A = 'A' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Connaissance de l\'association');

        $i = $i + 1;
        foreach ($tab_result_stat_covoit['tabLienSite'] as $key => $value) {
            $tab_A = 'A' . $i;
            $tab_B = 'B' . $i;
            $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $key);
            $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($value, 2) . "%");
            $i++;
        }
        
        /********************************************************/
        /* Répartition par tranche d\'age  */

        $i = $i + 1;
        $tab_A = 'A' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Répartition par tranche d\'age');
        $i++;
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $tab_result_stat_covoit['trancheAge1'] );
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($tab_result_stat_covoit['nbPourCentTrAg1'], 2) . "%");
        $i++;
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $tab_result_stat_covoit['trancheAge2']);
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($tab_result_stat_covoit['nbPourCentTrAg2'], 2) . "%");
        $i++;
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $tab_result_stat_covoit['trancheAge3']);
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($tab_result_stat_covoit['nbPourCentTrAg3'], 2) . "%");
        $i++;
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $tab_result_stat_covoit['trancheAge4']);
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($tab_result_stat_covoit['nbPourCentTrAg4'], 2) . "%");

        /********************************************************/
        /* Répartition par domiciliation  */
        
        $i = $i + 1;
        $tab_A = 'A' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Répartition par domiciliation');

        $i = $i + 1;
        foreach ($tab_result_stat_covoit['tabDomicile'] as $key => $value) {
            $tab_A = 'A' . $i;
            $tab_B = 'B' . $i;
            $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $key);
            $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($value, 2) . "%");
            $i++;
        }

        
        /*****************************************************************/        
        // Ajout des données Trajets
        /*****************************************************************/

        $objPHPExcel->getActiveSheet()->setTitle('Trajets');
        
        $i = $i + 5;
        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Informations sur les Trajets'.$libelle_etab_titre);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de trajets');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_trajet['trajetNb']);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de trajets Occasionnels conducteur');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_trajet['trajetNbCondOcc']);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de trajets Occasionnels passager');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_trajet['trajetNbPassOcc']);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de trajets Réguliers conducteur');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_trajet['trajetNbCondReg']);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de trajets Réguliers passager');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_trajet['trajetNbPassReg']);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de trajets sur un évènement');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_trajet['trajetNbEvenmt']);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Nombre de trajets sur une zone Industrielle');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_trajet['trajetNbZi']);
        
        /********************************************************/
        /* Top des villes de départ  */
        
        $i = $i + 1;
        $tab_A = 'A' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Top des villes de départ');

        $i = $i + 1;
        foreach ($tab_result_stat_trajet['topDepartVille'] as $key => $value) {
            $tab_A = 'A' . $i;
            $tab_B = 'B' . $i;
            $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $key);
            $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($value, 2) . "%");
            $i++;
        }
        
        /********************************************************/
        /* Top des villes de destination  */
        
        $i = $i + 1;
        $tab_A = 'A' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Top des villes de destination');

        $i = $i + 1;
        foreach ($tab_result_stat_trajet['topDestVille'] as $key => $value) {
            $tab_A = 'A' . $i;
            $tab_B = 'B' . $i;
            $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $key);
            $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($value, 2) . "%");
            $i++;
        }
        
        /********************************************************/
        /* Top des lieux de départ  */
        /*
        $i = $i + 1;
        $tab_A = 'A' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Top des lieux de départ');

        $i = $i + 1;
        foreach ($tab_result_stat_trajet['topLieuDepart'] as $key => $value) {
            $tab_A = 'A' . $i;
            $tab_B = 'B' . $i;
            $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $key);
            $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($value, 2) . "%");
            $i++;
        }
         * 
         */
        
        /********************************************************/
        /* Top des lieux de destination  */
        /*
        $i = $i + 1;
        $tab_A = 'A' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Top des lieux de destination');

        $i = $i + 1;
        foreach ($tab_result_stat_trajet['topLieuDest'] as $key => $value) {
            $tab_A = 'A' . $i;
            $tab_B = 'B' . $i;
            $objPHPExcel->getActiveSheet()->setCellValue($tab_A, $key);
            $objPHPExcel->getActiveSheet()->setCellValue($tab_B, number_format($value, 2) . "%");
            $i++;
        }
         * 
         */
        
        
        /*****************************************************************/        
        // Ajout des données MER (mise en relation)
        /*****************************************************************/

        $objPHPExcel->getActiveSheet()->setTitle('MER');
        
        $i = $i + 5;
        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'Informations sur les MER'.$libelle_etab_titre);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'nombre de Mer déposées (actifs)');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_mer['trajetMerNb']);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'nombre de Mer validées');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_mer['trajetMerVldNb']);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'nombre de Mer refusées');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_mer['trajetMerRefNb']);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'nombre de Mer annulées');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_mer['trajetMerAnnNb']);
        
        $i = $i + 1;        
        $tab_A = 'A' . $i;
        $tab_B = 'B' . $i;
        $objPHPExcel->getActiveSheet()->setCellValue($tab_A, 'nombre de Mer sans réponse');
        $objPHPExcel->getActiveSheet()->setCellValue($tab_B, $tab_result_stat_mer['trajetMerSsRepNb']);


// Rename sheet
        //echo date('H:i:s') . " Rename sheet\n";
        //$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


// Save CSV file
        //echo date('H:i:s') . " Write to Excel2007 format\n";
        $this->fichier_sortie = sfConfig::get('app_rep_fic_csv').sfConfig::get('app_fic_stat_csv')."_".date('Y_m_d').".csv";
        //$this->fichier_sortie = sfConfig::get('app_rep_fic_csv') . "stat.csv";
        $fic_sortie = "stat";
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


    }

}
