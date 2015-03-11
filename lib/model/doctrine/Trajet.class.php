<?php

/**
 * Trajet
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Trajet extends BaseTrajet {

    public function __toString() {
        return $this->getDepartVille() . " - " . $this->getDestinationVille();
    }

    public static function getTrajetById($trajet_id) {
        //Doctrine_Manager::connection('dbrmv3');
        //Doctrine_Manager::getInstance()->setCurrentConnection('dbrmv3');
        //Doctrine_Manager::getInstance()->bindComponent('Trajet', 'dbrmv3');
        $results = array();
        if (!is_numeric($trajet_id)) {
            return $results;
        }
        $results = Doctrine_Query::create()
                ->from('Trajet')
                ->where('id_trajet = ?', $trajet_id)
                ->fetchArray();
        return $results;
    }

    public function addActiveTrajetsQuery(Doctrine_Query $q = null) {
        Doctrine_Manager::getInstance()->setCurrentConnection('dbrmv3');
        if (is_null($q)) {
            $q = Doctrine_Query::create()
                    ->from('Trajet');
        }

        $alias = $q->getRootAlias();

        return $q;
    }

    public function getActiveTrajetsQuery() {
        $q = Doctrine_Query::create()
                ->from('Trajet')
                ->where('id_trajet = ?', $this - getId());
        return Doctrine_Core::getTable('Trajet')->addActiveTrajetsQuery($q);
    }

    //methode pour la realisation de l'affichage du formulaire "tolerance"
    // de type checkbox multiple
    //recupere les infos du format 0[2],1[1],2[2]
    //  0 => 'non acceptés'
    //  1 => 'acceptés'
    //  2 => 'peu importe'

    /*
     * ordre des tolérances (voir bdd)
     * 0 => animaux, 
     * 1 => fumeur, 
     * 2 => bagage
     * 3 => musique
     * 4 => discussion
     */

    public function getCheckboxTolerance() {
        $tolerance = $this->getTolerance();
        $val1 = substr($tolerance, 2, 1);
        $val2 = substr($tolerance, 7, 1);
        $val3 = substr($tolerance, 12, 1);
        if (strlen($tolerance) > 15) {
            $val4 = substr($tolerance, 17, 1);
            $val5 = substr($tolerance, 22, 1);
        } else {
            $val4 = 0;
            $val5 = 0;
        }

        return array($val1, $val2, $val3, $val4, $val5);
    }

    //methode pour affectation du champ "tolerance"
    // à partir de type checkbox multiple
    //génère les infos au format 0[2],1[1],2[2]
    //  0 => 'non acceptés'
    //  1 => 'acceptés'
    //  2 => 'peu importe'

    public function setCheckboxTolerance($val1=null, $val2=null, $val3=null, $val4=null, $val5=null) {
        //génération de l'information pour le champ "tolerance"
        $toleranceText = '';
        $toleranceText = '0[' . $val1 . '],1[' . $val2 . '],2[' . $val3 . '],3[' . $val4 . '],4[' . $val5 . ']';

        return $toleranceText;
    }

    /*
     * Mise en forme de tupe simple texte sans div
     * récupère la liste des options acceptées
     *   0 => 'non acceptés'
     *   1 => 'acceptés'
     *   2 => 'peu importe'
     *
     * ordre des tolérances (voir bdd)
     * 0 => animaux, 
     * 1 => fumeur, 
     * 2 => bagage
     * 3 => musique
     * 4 => discussion

     */

    public function getToleranceAccepteText() {
        $tabTolInit = array();
        //$tabTolReturn = array();

        $txtTolAccept = '';

        $tabTolInit = $this->getCheckboxTolerance();

        //compteur permettant de savoir sur quelle tolerance on se trouve
        $cmpt = 0;

        //indicateur permettant de placer le / de séparation
        $indSlash = 0 ;

        foreach ($tabTolInit as $value) {
            if ($cmpt == 0) {

                if ($value == 1) {
                    //$tabTolReturn[] = 'animaux';
                    $txtTolAccept .= $indSlash != 0 ? '/' : '';
                    $txtTolAccept .= 'animaux';
                    $indSlash = 1 ;
                }
            }
            if ($cmpt == 1) {
                if ($value == 1) {
                    //$tabTolReturn[] = 'fumeur';
                    $txtTolAccept .= $indSlash != 0 ? '/' : '';
                    $txtTolAccept .= 'fumeur';
                    $indSlash = 1 ;
                }
            }
            if ($cmpt == 2) {
                if ($value == 1) {
                    //$tabTolReturn[] = 'bagage';
                    $txtTolAccept .= $indSlash != 0 ? '/' : '';
                    $txtTolAccept .= 'bagage';
                    $indSlash = 1 ;
                }
            }
            if ($cmpt == 3) {
                if ($value == 1) {
                    //$tabTolReturn[] = 'musique';
                    $txtTolAccept .= $indSlash != 0 ? '/' : '';
                    $txtTolAccept .= 'musique';
                    $indSlash = 1 ;
                }
            }
            if ($cmpt == 4) {
                if ($value == 1) {
                    //$tabTolReturn[] = 'discussion';
                    $txtTolAccept .= $indSlash != 0 ? '/' : '';
                    $txtTolAccept .= 'discussion';
                    $indSlash = 1 ;
                }
            }

            $cmpt++;
        }



        return $txtTolAccept;
    }

    
    public function getToleranceAccepte() {
        $tabTolInit = array();
        $txtTolAccept = '';
        $tabTolInit = $this->getCheckboxTolerance();

        if ($tabTolInit[0] == 1) {
            $txtTolAccept .= '<div id="animaux"></div>';
        } else {
            $txtTolAccept .= '<div id="animaux_non"></div>';
        }
        if ($tabTolInit[1] == 1) {
            $txtTolAccept .= '<div id="fumeur"></div>';
        } else {
            $txtTolAccept .= '<div id="fumeur_non"></div>';
        }
        if ($tabTolInit[3] == 1) {
            $txtTolAccept .= '<div id="musique"></div>';
        } else {
            $txtTolAccept .= '<div id="musique_non"></div>';
        }
        if ($tabTolInit[4] == 1) {
            $txtTolAccept .= '<div id="discussion"></div>';
        } else {
            $txtTolAccept .= '<div id="discussion_non"></div>';
        }
        if ($tabTolInit[2] == 1) {
            $txtTolAccept .= '<div id="bagage"></div>';
        } else {
            $txtTolAccept .= '<div id="bagage_non"></div>';
        }

        return $txtTolAccept;
    }

    /*
     * récupère la liste des options refusées
     *   0 => 'non acceptés'
     *   1 => 'acceptés'
     *   2 => 'peu importe'
     *
     * ordre des tolérances (voir bdd)
     * 0 => animaux, 
     * 1 => fumeur, 
     * 2 => bagage
     * 3 => musique
     * 4 => discussion

     */

    public function getToleranceRefus() {
        $tabTolInit = array();
        //$tabTolReturn = array();

        $tabTolInit = $this->getCheckboxTolerance();

        //compteur permettant de savoir sur quelle tolerance on se trouve
        $cmpt = 0;
        $txtTolRefus = '';

        foreach ($tabTolInit as $value) {

            if ($cmpt == 0) {
                if ($value == 0) {
                    //$tabTolReturn[] = 'animaux';
                    $txtTolRefus .= '<div id="animaux_non"></div>';
                }
            }
            if ($cmpt == 1) {
                if ($value == 0) {
                    //$tabTolReturn[] = 'fumeur';
                    $txtTolRefus .= '<div id="fumeur_non"></div>';
                }
            }
            if ($cmpt == 2) {
                if ($value == 0) {
                    //$tabTolReturn[] = 'bagage';
                    $txtTolRefus .= '<div id="bagage_non"></div>';
                }
            }
            if ($cmpt == 3) {
                if ($value == 0) {
                    //$tabTolReturn[] = 'musique';
                    $txtTolRefus .= '<div id="musique_non"></div>';
                }
            }
            if ($cmpt == 4) {
                if ($value == 0) {
                    //$tabTolReturn[] = 'discussion';
                    $txtTolRefus .= '<div id="discussion_non"></div>';
                }
            }

            $cmpt++;
        }
        /*
          $lg = count($tabTolReturn);

          $txtTolRefus = '';

          for($i =0; $i<$lg;$i++){
          if($i ==0){
          $txtTolRefus .= $tabTolReturn[$i];
          }else{
          $txtTolRefus .= " - ".$tabTolReturn[$i];
          }
          }
         * 
         */

        return $txtTolRefus;
    }

    /*
     * recupere l'état de la tolérance bagage
     * 
     */

    public function getToleranceBagage() {
        $etat_bagage = 0;
        //$tabTolReturn = array();

        $tabTolInit = $this->getCheckboxTolerance();

        $etat_bagage = $tabTolInit[2];
        return $etat_bagage;
    }

    /*
     * gestion du type trajet (formulaire)
     *      1 => regulier	=> si jour_unique_date est vide
     *      2 => ponctuel	=> si jour_unique_date n'est pas vide
     *      3 => option 3 utilisée dans V1
     */

    public function getChoixTypeTrajet() {
        $val_retour = 0;
        if (!$this->getJourUniqueDate() || $this->getJourUniqueDate() == '0000-00-00 00:00:00') {
            $val_retour = 1;
        } else {
            $val_retour = 2;
        }
        return $val_retour;
    }

    /*
     * gestion de l'identité du covoitureur
     *      Retourne le prénom de la personne et le premier caractère de son nom de famille
     */

    public function getIdentite() {

        $nom = $this->getCovoitureur()->getNom();
        if ($this->getCovoitureur()->getSexe() == 1) {
            $genre = 'Mr';
        } elseif ($this->getCovoitureur()->getSexe() == 2) {
            $genre = 'Mme/Mlle';
        } else {
            $genre = '';
        }
        $identite = $genre . ' ' . ucfirst($this->getCovoitureur()->getPrenom()) . " " . ucfirst($nom[0]);
        return $identite;
    }

    /*
     * récupération des véhicules liés aux covoitureurs
     */

    public function getVehiculeCovoitureur() {

        $vehiculesListe = Doctrine_Query::create()
                ->from('covoitureur_vehicule cv')
                ->leftJoin('cv.vehicule_marque vma')
                ->leftJoin('cv.vehicule_modele vmo')
                ->where('cv.id_vehicule = ?', $this->getVehicule())
                ->fetchArray();

        return $vehiculesListe;
    }

    /*
     * Récupération du lieu de départ 
     */

    public function getDepartLieu() {
        $departLieu = "";
        $departAutreLieu = $this->getDepartAutreLieu();
        if (!empty($departAutreLieu) && is_numeric($departAutreLieu) && !is_null($departAutreLieu)) {
            $lieu = Doctrine_Core::getTable("Lieu")->find($departAutreLieu);
            return $lieu->getLibelleLieu();
        }
        $departLieu = $departAutreLieu;
        return $departLieu;
    }

    /*
     * Récupération du lieu de destination 
     */

    public function getDestinationLieu() {
        $destinationLieu = "";
        $destinationAutreLieu = $this->getDestinationAutreLieu();
        if (!empty($destinationAutreLieu) && is_numeric($destinationAutreLieu)) {
            $lieu = Doctrine_Core::getTable("Lieu")->find($destinationAutreLieu);
            return $lieu->getLibelleLieu();
        }
        $destinationLieu = $destinationAutreLieu;
        return $destinationLieu;
    }

    /*
     * Récupération du type de trajet 
     */

    public function getTypeTrajet() {
        switch ($this->getIdTypeTrajet()) {
            case 2:
                return "Occasionnel";
                break;

            default:
                return "Régulier";
                break;
        }
    }

    /*
     *  détermination des éléments pour l'autocomplétion des formulaires
     * 
     */

    public function getAutocomplete($type, $value) {

        //gestion de la valeur nulle
        if (is_null($type)) {
            //return null;
        } else {
            //récupération des valeurs en fonction du parametre passé
            switch ($type) {
                case "depville":
                    $ville = new VilleFr;
                    $tabResult = $ville->getVilleAutocomplet($value);
                    break;
                case "destville":
                    $ville = new VilleFr;
                    $tabResult = $ville->getVilleAutocomplet($value);
                    break;
                case "etapville":
                    $ville = new VilleFr;
                    $tabResult = $ville->getVilleAutocomplet($value);
                    break;
            }
        }

        return $tabResult;
    }

    /*
     *  dissocie un trajet d'un équipage en placant id_equipage = 0
     * 
     */

    public function setDissocieTrajetEquipage($id_equipage) {

        $this->setIdEquipage('0');
        $this->save();
    }

    /*
     * indique le nom de la classe à utiliser pour la liste des trajet
     * la classe permet de sélectionner l'icone de conducteur, passager ou indifférent 
     */

    public function getClasseIconeTypeCovoit() {
        //sélection en fonction du type de trajet occasionnel ou régulier
        if ($this->getIdTypeTrajet() == 2) { //trajet occasionnel
            switch ($this->getJourUniqueTypeCov()) {
                case 0:
                    return "indifferent";
                    break;
                case 1:
                    return "conducteur";
                    break;
                case 2:
                    return "passager";
                    break;

                default:
                    return "indifferent";
                    break;
            }
        } else { // trajet régulier
            if ($this->getLundiEtat() == 1) {
                switch ($this->getLundiTypeCov()) {
                    case 0:
                        return "indifferent";
                        break;
                    case 1:
                        return "conducteur";
                        break;
                    case 2:
                        return "passager";
                        break;

                    default:
                        return "indifferent";
                        break;
                }
            }
            if ($this->getMardiEtat() == 1) {
                switch ($this->getMardiTypeCov()) {
                    case 0:
                        return "indifferent";
                        break;
                    case 1:
                        return "conducteur";
                        break;
                    case 2:
                        return "passager";
                        break;

                    default:
                        return "indifferent";
                        break;
                }
            }
            if ($this->getMercrediEtat() == 1) {
                switch ($this->getMercrediTypeCov()) {
                    case 0:
                        return "indifferent";
                        break;
                    case 1:
                        return "conducteur";
                        break;
                    case 2:
                        return "passager";
                        break;

                    default:
                        return "indifferent";
                        break;
                }
            }
            if ($this->getJeudiEtat() == 1) {
                switch ($this->getJeudiTypeCov()) {
                    case 0:
                        return "indifferent";
                        break;
                    case 1:
                        return "conducteur";
                        break;
                    case 2:
                        return "passager";
                        break;

                    default:
                        return "indifferent";
                        break;
                }
            }
            if ($this->getVendrediEtat() == 1) {
                switch ($this->getVendrediTypeCov()) {
                    case 0:
                        return "indifferent";
                        break;
                    case 1:
                        return "conducteur";
                        break;
                    case 2:
                        return "passager";
                        break;

                    default:
                        return "indifferent";
                        break;
                }
            }
            if ($this->getSamediEtat() == 1) {
                switch ($this->getSamediTypeCov()) {
                    case 0:
                        return "indifferent";
                        break;
                    case 1:
                        return "conducteur";
                        break;
                    case 2:
                        return "passager";
                        break;

                    default:
                        return "indifferent";
                        break;
                }
            }
            if ($this->getDimancheEtat() == 1) {
                switch ($this->getDimancheTypeCov()) {
                    case 0:
                        return "indifferent";
                        break;
                    case 1:
                        return "conducteur";
                        break;
                    case 2:
                        return "passager";
                        break;

                    default:
                        return "indifferent";
                        break;
                }
            }

            return "indifferent";
        }
    }

    /*
     * Concaténation des villes de départ et  de destination
     */

    public function getVilleDepartDestTrajet() {

        //extraction des codes postaux entre parenthèse
        $outil = new Util();
        $villeDep = $outil->extractCpLibelle($this->getDepartVille());
        $villeDest = $outil->extractCpLibelle($this->getDestinationVille());

        return $villeDep . " => " . $villeDest;
    }
    
    /*
     * Concaténation des villes étapes pour affichage fiche trajet
     */

    public function getVilleEtapeTrajetConcat() {
        $villeEtapes = "";
        
        $indPresence = 0;
        
        //parcours des villes etapes et extraction des codes postaux entre parenthèse
        $outil = new Util();
        
        if($this->getEtape1Ville() != ""){
            $villeEtapes .= $outil->extractCpLibelle($this->getEtape1Ville());
            $indPresence = 1;
        }
        if($this->getEtape2Ville() != ""){
            if($indPresence == 1){
                $villeEtapes .= " - ";
            }
            $villeEtapes .= $outil->extractCpLibelle($this->getEtape2Ville());
            $indPresence = 1;
        }
        if($this->getEtape3Ville() != ""){
            if($indPresence == 1){
                $villeEtapes .= " - ";
            }
            $villeEtapes .= $outil->extractCpLibelle($this->getEtape3Ville());
            $indPresence = 1;
        }
        if($this->getEtape4Ville() != ""){
            if($indPresence == 1){
                $villeEtapes .= " - ";
            }
            $villeEtapes .= $outil->extractCpLibelle($this->getEtape4Ville());
            $indPresence = 1;
        }
        if($this->getEtape5Ville() != ""){
            if($indPresence == 1){
                $villeEtapes .= " - ";
            }
            $villeEtapes .= $outil->extractCpLibelle($this->getEtape5Ville());
            $indPresence = 1;
        }
        

        return $villeEtapes;
    }
    
     /*
     * Concaténation des villes étapes et lieu associé pour affichage fiche trajet
     */

    public function getVilleEtapeLieuTrajetConcat() {
        $villeEtapes = "";
        
        $indPresence = 0;
        
        //parcours des villes etapes et extraction des codes postaux entre parenthèse
        $outil = new Util();
        
        if($this->getEtape1Ville() != ""){
            $villeEtapes .= $outil->extractCpLibelle($this->getEtape1Ville());
            $indPresence = 1;
            //lieu associé à la ville étape
            if($this->getEtape1LieuId() != 0){
                $villeEtapes .= " (".$this->getEtapeLieuById($this->getEtape1LieuId()).")";
            }
        }
        if($this->getEtape2Ville() != ""){
            if($indPresence == 1){
                $villeEtapes .= " - ";
            }
            $villeEtapes .= $outil->extractCpLibelle($this->getEtape2Ville());
            //lieu associé à la ville étape
            if($this->getEtape2LieuId() != 0){
                $villeEtapes .= " (".$this->getEtapeLieuById($this->getEtape2LieuId()).")";
            }
            $indPresence = 1;
        }
        if($this->getEtape3Ville() != ""){
            if($indPresence == 1){
                $villeEtapes .= " - ";
            }
            $villeEtapes .= $outil->extractCpLibelle($this->getEtape3Ville());
            //lieu associé à la ville étape
            if($this->getEtape3LieuId() != 0){
                $villeEtapes .= " (".$this->getEtapeLieuById($this->getEtape3LieuId()).")";
            }
            $indPresence = 1;
        }
        if($this->getEtape4Ville() != ""){
            if($indPresence == 1){
                $villeEtapes .= " - ";
            }
            $villeEtapes .= $outil->extractCpLibelle($this->getEtape4Ville());
            //lieu associé à la ville étape
            if($this->getEtape4LieuId() != 0){
                $villeEtapes .= " (".$this->getEtapeLieuById($this->getEtape4LieuId()).")";
            }
            $indPresence = 1;
        }
        if($this->getEtape5Ville() != ""){
            if($indPresence == 1){
                $villeEtapes .= " - ";
            }
            $villeEtapes .= $outil->extractCpLibelle($this->getEtape5Ville());
            //lieu associé à la ville étape
            if($this->getEtape5LieuId() != 0){
                $villeEtapes .= " (".$this->getEtapeLieuById($this->getEtape5LieuId()).")";
            }
            $indPresence = 1;
        }
        

        return $villeEtapes;
    }
    
    /*
     * récupération d'un lieu
     */

    public function getEtapeLieuById($id) {
        $libelleLieu = "";
        if ($id != 0 && !is_null($id)) {
            $lieu = Doctrine_Core::getTable("Lieu")->find($id);
            $libelleLieu = $lieu->getLibelleLieu();
        }
        return $libelleLieu;
    }

    /*
     * Récupération du statut du covoitureur en fonction du type de trajet
     */

    public function getMonStatutCovoitureur() {

        $monStatut = "indifférent";
        $etat = 0;

        if ($this->getTypeTrajet() == 2) { // trajet occasionnel
            
            switch ($this->getJourUniqueTypeCov()) {
                case 0:
                    $monStatut = "indifférent";
                    break;
                case 1:
                    $monStatut = "conducteur";
                    break;
                case 2:
                    $monStatut = "passager";
                    break;
                default:
                    $monStatut = "indifférent";
                    break;
            }
        } else { // trajet régulier
            //récupération du type de coitureur
            if($this->getLundiEtat() == 1){
                $etat = $this->getLundiTypeCov();
            }elseif($this->getMardiEtat() == 1){
                $etat = $this->getMardiTypeCov();
            }elseif($this->getMercrediEtat() == 1){
                $etat = $this->getMercrediTypeCov();
            }elseif($this->getJeudiEtat() == 1){
                $etat = $this->getJeudiTypeCov();
            }elseif($this->getVendrediEtat() == 1){
                $etat = $this->getVendrediTypeCov();
            }elseif($this->getSamediEtat() == 1){
                $etat = $this->getSamediTypeCov();
            }elseif($this->getDimancheEtat() == 1){
                $etat = $this->getDimancheTypeCov();
            }
            
            //indication de la légende
            switch ($etat) {
                case 0:
                    $monStatut = "indifférent";
                    break;
                case 1:
                    $monStatut = "conducteur";
                    break;
                case 2:
                    $monStatut = "passager";
                    break;
                default:
                    $monStatut = "indifférent";
                    break;
            }
            
        }

        return $monStatut;
    }

    /*
     * retourne un element css (class) pour affichage couleur de fond relatif
     * à l'etat du trajet (etat de la MER)
     */
    public function getClassEtatTrajetCss() {
        $classCss = "statut_mer";
        if($this->getTrajetMiseEnRelationNb() != 0){
            $classCss .= "_".$this->getTrajetMiseEnRelation()->getEtat();
        }else{
            $classCss .= "_vide";
        }

        return $classCss;
    }

    /*
     * retourne le nb de MER pour le trajet
     *
     */
    public function getTrajetMiseEnRelationNb() {
        $nbMer = 0;

        $nbMer = Doctrine_Core::getTable('TrajetMiseEnRelation')->getNbMerPourTrajet($this->getIdTrajet());

        return $nbMer;
    }
    
    /*
     * Récupération des latitudes et logitude de la ville de départ 
     */

    public function getDepartVilleLatLong() {
        $latLong = array();
        
        $outil = new Util();
        $villeId = $outil->extractIdVille($this->getDepartInsee());
        
        if (!empty($villeId) && is_numeric($villeId)) {
            $ville = Doctrine_Core::getTable("VilleFr")->find($villeId);
            $latLong = array("latitude" => $ville->getLatitude(),"longitude" => $ville->getLongitude() );
            
        }
        
        return $latLong;
    }
    
    /*
     * Récupération des latitudes et logitude de la ville de déstination 
     */

    public function getDestVilleLatLong() {
        $latLong = array();
        
        $outil = new Util();
        $villeId = $outil->extractIdVille($this->getDestinationInsee());
        
        if (!empty($villeId) && is_numeric($villeId)) {
            $ville = Doctrine_Core::getTable("VilleFr")->find($villeId);
            $latLong = array("latitude" => $ville->getLatitude(),"longitude" => $ville->getLongitude() );
            
        }
        
        return $latLong;
    }
    
    
    /*
     * recuperation de la derniere date d'action liée à ce trajet et et inscit (covoitureur)
     */
    public function getLastDateActionCv() {
        $dateLastAction = NULL;
        
        $actionCv = Doctrine_Query::create()
                ->from('CpActionCv ac')
                ->where('ac.cp_action_cv_trajet_id = ?', $this->getIdTrajet())
                ->andWhere('ac.cp_action_cv_covoitureur_id = ?', $this->getIdUtilisateur())
                ->orderBy('ac.cp_action_cv_date_creation DESC')
                ->limit('1')
                ->fetchOne()
                ;
        
        
        $dateLastAction = $actionCv['cp_action_cv_date_creation'];
        
        return $dateLastAction;
        
    }

}

