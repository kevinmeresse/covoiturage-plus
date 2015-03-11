<?php


/**
 * Description of pdfFicGenerClass
 *
 * bibliothèque de méthode de génération de fichiers pdf
 *
 * @author Christophe Vignaud, Emmanuel Bellamy
 */
class PdfFicGener {
    /*
     * génération du fichier pdf de statistique
     * @param   date    $dateDeb                    correspond à la date de debut pour le filtrage des stats)
     * @param   date    $dateFin                    correspond à la date de fin pour le filtrage des stats)
     * @param   string  $etablissement              libelle de l'etablissement
     * @param   array   $groupe_stat                tableau des id des villes (issues des groupes de stat)
     * @param   array   $groupe_stat_nom            tableau des noms des villes (issues des groupes de stat)
     * @param   array   $communaute_commune         tableau des id des villes (issues des Communaute de communes)
     * @param   array   $communaute_commune_nom     tableau des noms des villes (issues des Communaute de communes)
     *
     * @return fichier pdf
     */
    public static function generePdfStat($dateDeb = null, $dateFin = null, $etablissement = null, $groupe_stat = null, $groupe_stat_nom = null, $communaute_commune = null, $communaute_commune_nom = null) {
        
        //tableau de la liste des établissements
        $tab_etablissement = array();
        
        //nom de l'établissement
        $etab_nom = null;
        
        //indicateur indiquant si une liste (d'id) d'atblissement est founie
        $ind_etabl = 0;


        //récupération des id etabliseemnt appartenant également à une société
        if ($etablissement != '' && $etablissement != null) {

            //recuperation de l'id (si il existe)
            $outil = new Util();
            $id = $outil->extractIdEtablissement($etablissement);
            
            //Récuperation du nom de l'etablissement
            $etab_nom = $outil->extractCpLibelle($etablissement);
            
            if ($id != 0) {
                //recuperation de la liste des id etablissement
                $tab_etablissement = array();
                $etablissement_new = new CpEtablissement();
                $tab_etablissement = $etablissement_new->getListeEtablissementSociete($id);
                
            }
        }
        
        
        //mise en forme de résultats
        $htmlcontent  = "";
        
        
        if($etab_nom != null){
            $htmlcontent  .= "<h1>Statistiques sur la société/entreprise $etab_nom </h1>";
        }else{
            $htmlcontent  .= "<h1>Statistiques générales </h1>";
        }
        
        /****************************************************** */
        /*     COVOITUREURS                               * */
        /****************************************************** */
        
        //tableau de résultat statistique
        $tab_result_stat_covoit = array();
        
        $Stat = new statistiqueClass();
        $tab_result_stat_covoit = $Stat->covoitureurStat($dateDeb, $dateFin, $tab_etablissement, $groupe_stat_nom, $communaute_commune_nom);


        
        $htmlcontent  .= "<h2>Informations sur les covoitureurs</h2>";
        $htmlcontent  .= "Nombre de covoitureurs : ".$tab_result_stat_covoit['nbCovoitureur']."<br/>";
        $htmlcontent  .= "Nombre de covoitureurs femmes : ".$tab_result_stat_covoit['covoitureurNbF']."<br/>";
        $htmlcontent  .= "Nombre de covoitureurs hommes : ".$tab_result_stat_covoit['covoitureurNbH']."<br/>";
        $htmlcontent  .= "<br/>";
        $htmlcontent  .= "Nombre de bénéficiaires du RSA : ".$tab_result_stat_covoit['covoitureurNbRsa']."%<br/>";
        $htmlcontent  .= "<br/>";
        $htmlcontent  .= "Nombre de covoitureurs Peugeot : ".$tab_result_stat_covoit['covoitureurNbPgt']."<br/>";
        $htmlcontent  .= "   Répartition par secteur : <br/>";
        foreach($tab_result_stat_covoit['tabEqPsa'] as $key => $value ){
            $htmlcontent  .= "       ".$key." ".number_format($value, 2)."%<br/>";                    
        }

        
        $htmlcontent  .= "   Répartition par horaire : <br/>";
        foreach($tab_result_stat_covoit['tabHrPsa'] as $key => $value ){
            $htmlcontent  .= "       ".$key." ".number_format($value, 2)."%<br/>";                    
        }
        $htmlcontent  .= "<br/>";
        
        $htmlcontent  .= "Répartion par fonction <br/>";
        foreach($tab_result_stat_covoit['tabFct'] as $key => $value ){
            $htmlcontent  .= "       ".$key." ".number_format($value, 2)."%<br/>";                    
        }
        $htmlcontent  .= "<br/>";
        
        $htmlcontent  .= "Connaissance de l'association <br/>";
        foreach($tab_result_stat_covoit['tabLienSite'] as $key => $value ){
            $htmlcontent  .= "       ".$key." ".number_format($value, 2)."%<br/>";                    
        }
        $htmlcontent  .= "<br/>";
        
        $htmlcontent  .= "Répartition par tranche d'age<br/>";
        $htmlcontent  .= "       ".$tab_result_stat_covoit['trancheAge1']." ".number_format($tab_result_stat_covoit['nbPourCentTrAg1'], 2)."%<br/>";
        $htmlcontent  .= "       ".$tab_result_stat_covoit['trancheAge2']." ".number_format($tab_result_stat_covoit['nbPourCentTrAg2'], 2)."%<br/>";
        $htmlcontent  .= "       ".$tab_result_stat_covoit['trancheAge3']." ".number_format($tab_result_stat_covoit['nbPourCentTrAg3'], 2)."%<br/>";
        $htmlcontent  .= "       ".$tab_result_stat_covoit['trancheAge4']." ".number_format($tab_result_stat_covoit['nbPourCentTrAg4'], 2)."%<br/>";
        $htmlcontent  .= "<br/>";
        
        $htmlcontent  .= "Répartion Domiciliation <br/>";
        foreach($tab_result_stat_covoit['tabDomicile'] as $key => $value ){
            $htmlcontent  .= "       ".$key." ".number_format($value, 2)."<br/>";                    
        }
        $htmlcontent  .= "<br/>";
        
        /********************************************************/
        /*     TRAJETS                               **/
        /********************************************************/

        //tableau de résultat statistique
        $tab_result_stat_trajet = array();
        
        $tab_result_stat_trajet = $Stat->trajetStat($dateDeb, $dateFin, $tab_etablissement, $groupe_stat, $communaute_commune);

       
        //mise en forme de résultats
        $htmlcontent  .= "<h2>Informations sur les trajets</h2>";
        $htmlcontent  .= "Nombre de trajets : ".$tab_result_stat_trajet['trajetNb']."<br/>";
        $htmlcontent  .= "Nombre de trajets Occasionnels conducteur : ".$tab_result_stat_trajet['trajetNbCondOcc']."<br/>";
        $htmlcontent  .= "Nombre de trajets Occasionnels passager : ".$tab_result_stat_trajet['trajetNbPassOcc']."<br/>";
        $htmlcontent  .= "Nombre de trajets Réguliers conducteur : ".$tab_result_stat_trajet['trajetNbCondReg']."<br/>";
        $htmlcontent  .= "Nombre de trajets Réguliers passager : ".$tab_result_stat_trajet['trajetNbPassReg']."<br/>";
        $htmlcontent  .= "Nombre de trajets sur un évènement : ".$tab_result_stat_trajet['trajetNbEvenmt']."<br/>";
        $htmlcontent  .= "Nombre de trajets sur une zone Industrielle : ".$tab_result_stat_trajet['trajetNbZi']."<br/>";
        
        $htmlcontent  .= "Top des villes de départ <br/>";
        foreach($tab_result_stat_trajet['topDepartVille'] as $key => $value ){
            $htmlcontent  .= "       ".$key." ".number_format($value, 2)."%<br/>";                    
        }
        $htmlcontent  .= "<br/>";
        
        $htmlcontent  .= "Top des villes de destination <br/>";
        foreach($tab_result_stat_trajet['topDestVille'] as $key => $value ){
            $htmlcontent  .= "       ".$key." ".number_format($value, 2)."%<br/>";                    
        }
        $htmlcontent  .= "<br/>";
        
        /*
        $htmlcontent  .= "Top des lieux de départ <br/>";
        foreach($tab_result_stat_trajet['topLieuDepart'] as $key => $value ){
            $htmlcontent  .= "       ".$key." ".number_format($value, 2)."%<br/>";                    
        }
        $htmlcontent  .= "<br/>";
        
        $htmlcontent  .= "Top des lieux de destination <br/>";
        foreach($tab_result_stat_trajet['topLieuDest'] as $key => $value ){
            $htmlcontent  .= "       ".$key." ".number_format($value, 2)."%<br/>";                    
        }
        $htmlcontent  .= "<br/>";
         * 
         */
        
        

        
        /********************************************************/
        /*     MISES EN RELATION                              **/
        /********************************************************/

        //tableau de résultat statistique
        $tab_result_stat_mer = array();
        
        $tab_result_stat_mer = $Stat->merStat($dateDeb, $dateFin, $tab_etablissement, $groupe_stat_nom, $communaute_commune_nom);
 
        //mise en forme de résultats
        $htmlcontent  .= "<h2>Informations sur les mises en relations</h2>";
        $htmlcontent  .= "Nombre de Mise en relation : ".$tab_result_stat_mer['trajetMerNb']."<br/>";
        $htmlcontent  .= "Nombre de Mise en relation validées : ".$tab_result_stat_mer['trajetMerVldNb']."<br/>";
        $htmlcontent  .= "Nombre de Mise en relation refusées : ".$tab_result_stat_mer['trajetMerRefNb']."<br/>";
        $htmlcontent  .= "Nombre de Mise en relation annulées : ".$tab_result_stat_mer['trajetMerAnnNb']."<br/>";
        $htmlcontent  .= "Nombre de Mise en relation sans réponse : ".$tab_result_stat_mer['trajetMerSsRepNb']."<br/>";
        

        
        
        
        /********************************************************/
        /*     MISE EN FORME                              **/
        /********************************************************/

//appel au methodes de statistiques
/*
        $htmlcontent  = "<h2>Informations sur les Trajets</h2>";
        $htmlcontent  .= "Nombre de trajets : ".Doctrine_Core::getTable('Trajet')->getStatTrajetNb($dateDeb,$dateFin)."<br/>";
        $htmlcontent  .= "Nombre de trajets conducteurs : ".Doctrine_Core::getTable('Trajet')->getStatTrajetNbCond($dateDeb,$dateFin)."<br/>";
        $htmlcontent  .= "Nombre de trajets passagers : ".Doctrine_Core::getTable('Trajet')->getStatTrajetNbPass($dateDeb,$dateFin)."<br/>";
        */
        
        //génération des informations de base du PDF
        $config = sfTCPDFPluginConfigHandler::loadConfig('pdf_configs');
          //sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

          $doc_title    = "Covoiturage Plus - Statistiques";
          $doc_subject  = "Statistiques générales";
          $doc_keywords = "Statistiques";
          

          //create new PDF document (document units are set by default to millimeters)
          $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

          // set document information
          $pdf->SetCreator(PDF_CREATOR);
          $pdf->SetAuthor(PDF_AUTHOR);
          $pdf->SetTitle($doc_title);
          $pdf->SetSubject($doc_subject);
          $pdf->SetKeywords($doc_keywords);
          
          //generation de la date du jour
          $now = date("d/m/Y");
          
          //ajout de la date au header
          $enTete = PDF_HEADER_STRING;
          $enTete .= "                      ".$now;

          //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
          $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, $enTete);

          //set margins
          $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

          //set auto page breaks
          $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
          $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
          $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
          $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor

          $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
          $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

          //initialize document
          $pdf->AliasNbPages();
          $pdf->AddPage();

        // output some HTML code
          $pdf->writeHTML($htmlcontent , true, 0);
          
          //print_r($htmlcontent);
          
           // Close and output PDF document
          $pdf->Output('statistique-covoituragePlus.pdf', 'I');

          // Stop symfony process
          throw new sfStopException();
    }
    

}
