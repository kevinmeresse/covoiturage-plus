<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SiteClient', 'dbrmv3');

/**
 * BaseSiteClient
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_site_client
 * @property integer $id_site_parent
 * @property integer $id_filiale
 * @property string $cle
 * @property integer $etat
 * @property integer $visible
 * @property timestamp $date_creation
 * @property timestamp $date_publication
 * @property timestamp $date_depublication
 * @property string $societe
 * @property string $url_application
 * @property string $dossier_application
 * @property string $identifiant
 * @property string $mot_de_passe
 * @property string $identifiant2
 * @property string $mot_de_passe2
 * @property string $mail_referent2
 * @property integer $confidentiel
 * @property integer $validation_compte
 * @property string $adresse
 * @property integer $code_postal
 * @property integer $id_ville
 * @property string $ville
 * @property string $logo
 * @property string $bandeau
 * @property string $html_header
 * @property string $html_haut
 * @property string $html_bas
 * @property string $html_gauche
 * @property string $html_droit
 * @property string $couleur1
 * @property string $couleur2
 * @property string $couleur3
 * @property float $carte_position_latitude
 * @property float $carte_position_longitude
 * @property string $carte_position_hauteur
 * @property string $cle_googlemaps
 * @property string $nom_referent
 * @property string $prenom_referent
 * @property string $mail_referent
 * @property string $telephone
 * @property string $fax
 * @property timestamp $date_derniere_connexion
 * @property integer $nombre_connexion
 * @property integer $version
 * @property integer $admin_v2
 * @property SiteClient $SiteClient
 * @property Contenu $Contenu
 * @property ContenuActualite $ContenuActualite
 * @property ContenuActualiteRubrique $ContenuActualiteRubrique
 * @property Covoitureur $Covoitureur
 * @property CovoitureurAmis $CovoitureurAmis
 * @property CovoitureurEquipages $CovoitureurEquipages
 * @property Doctrine_Collection $CovoitureurFonction
 * @property Doctrine_Collection $CovoitureurLienSite
 * @property Doctrine_Collection $DemandeRenseignement
 * @property Equipage $Equipage
 * @property EquipageCovoitureur $EquipageCovoitureur
 * @property Evenement $Evenement
 * @property HistoriqueBascule $HistoriqueBascule
 * @property Lieu $Lieu
 * @property LieuTest $LieuTest
 * @property LieuType $LieuType
 * @property LivreOr $LivreOr
 * @property PaysSite $PaysSite
 * @property StatistiqueCovoitureur $StatistiqueCovoitureur
 * @property Trajet $Trajet
 * @property TrajetAlerte $TrajetAlerte
 * @property TrajetMiseEnRelation $TrajetMiseEnRelation
 * @property Profile $Profile
 * 
 * @method integer                  getIdSiteClient()             Returns the current record's "id_site_client" value
 * @method integer                  getIdSiteParent()             Returns the current record's "id_site_parent" value
 * @method integer                  getIdFiliale()                Returns the current record's "id_filiale" value
 * @method string                   getCle()                      Returns the current record's "cle" value
 * @method integer                  getEtat()                     Returns the current record's "etat" value
 * @method integer                  getVisible()                  Returns the current record's "visible" value
 * @method timestamp                getDateCreation()             Returns the current record's "date_creation" value
 * @method timestamp                getDatePublication()          Returns the current record's "date_publication" value
 * @method timestamp                getDateDepublication()        Returns the current record's "date_depublication" value
 * @method string                   getSociete()                  Returns the current record's "societe" value
 * @method string                   getUrlApplication()           Returns the current record's "url_application" value
 * @method string                   getDossierApplication()       Returns the current record's "dossier_application" value
 * @method string                   getIdentifiant()              Returns the current record's "identifiant" value
 * @method string                   getMotDePasse()               Returns the current record's "mot_de_passe" value
 * @method string                   getIdentifiant2()             Returns the current record's "identifiant2" value
 * @method string                   getMotDePasse2()              Returns the current record's "mot_de_passe2" value
 * @method string                   getMailReferent2()            Returns the current record's "mail_referent2" value
 * @method integer                  getConfidentiel()             Returns the current record's "confidentiel" value
 * @method integer                  getValidationCompte()         Returns the current record's "validation_compte" value
 * @method string                   getAdresse()                  Returns the current record's "adresse" value
 * @method integer                  getCodePostal()               Returns the current record's "code_postal" value
 * @method integer                  getIdVille()                  Returns the current record's "id_ville" value
 * @method string                   getVille()                    Returns the current record's "ville" value
 * @method string                   getLogo()                     Returns the current record's "logo" value
 * @method string                   getBandeau()                  Returns the current record's "bandeau" value
 * @method string                   getHtmlHeader()               Returns the current record's "html_header" value
 * @method string                   getHtmlHaut()                 Returns the current record's "html_haut" value
 * @method string                   getHtmlBas()                  Returns the current record's "html_bas" value
 * @method string                   getHtmlGauche()               Returns the current record's "html_gauche" value
 * @method string                   getHtmlDroit()                Returns the current record's "html_droit" value
 * @method string                   getCouleur1()                 Returns the current record's "couleur1" value
 * @method string                   getCouleur2()                 Returns the current record's "couleur2" value
 * @method string                   getCouleur3()                 Returns the current record's "couleur3" value
 * @method float                    getCartePositionLatitude()    Returns the current record's "carte_position_latitude" value
 * @method float                    getCartePositionLongitude()   Returns the current record's "carte_position_longitude" value
 * @method string                   getCartePositionHauteur()     Returns the current record's "carte_position_hauteur" value
 * @method string                   getCleGooglemaps()            Returns the current record's "cle_googlemaps" value
 * @method string                   getNomReferent()              Returns the current record's "nom_referent" value
 * @method string                   getPrenomReferent()           Returns the current record's "prenom_referent" value
 * @method string                   getMailReferent()             Returns the current record's "mail_referent" value
 * @method string                   getTelephone()                Returns the current record's "telephone" value
 * @method string                   getFax()                      Returns the current record's "fax" value
 * @method timestamp                getDateDerniereConnexion()    Returns the current record's "date_derniere_connexion" value
 * @method integer                  getNombreConnexion()          Returns the current record's "nombre_connexion" value
 * @method integer                  getVersion()                  Returns the current record's "version" value
 * @method integer                  getAdminV2()                  Returns the current record's "admin_v2" value
 * @method SiteClient               getSiteClient()               Returns the current record's "SiteClient" value
 * @method Contenu                  getContenu()                  Returns the current record's "Contenu" value
 * @method ContenuActualite         getContenuActualite()         Returns the current record's "ContenuActualite" value
 * @method ContenuActualiteRubrique getContenuActualiteRubrique() Returns the current record's "ContenuActualiteRubrique" value
 * @method Covoitureur              getCovoitureur()              Returns the current record's "Covoitureur" value
 * @method CovoitureurAmis          getCovoitureurAmis()          Returns the current record's "CovoitureurAmis" value
 * @method CovoitureurEquipages     getCovoitureurEquipages()     Returns the current record's "CovoitureurEquipages" value
 * @method Doctrine_Collection      getCovoitureurFonction()      Returns the current record's "CovoitureurFonction" collection
 * @method Doctrine_Collection      getCovoitureurLienSite()      Returns the current record's "CovoitureurLienSite" collection
 * @method Doctrine_Collection      getDemandeRenseignement()     Returns the current record's "DemandeRenseignement" collection
 * @method Equipage                 getEquipage()                 Returns the current record's "Equipage" value
 * @method EquipageCovoitureur      getEquipageCovoitureur()      Returns the current record's "EquipageCovoitureur" value
 * @method Evenement                getEvenement()                Returns the current record's "Evenement" value
 * @method HistoriqueBascule        getHistoriqueBascule()        Returns the current record's "HistoriqueBascule" value
 * @method Lieu                     getLieu()                     Returns the current record's "Lieu" value
 * @method LieuTest                 getLieuTest()                 Returns the current record's "LieuTest" value
 * @method LieuType                 getLieuType()                 Returns the current record's "LieuType" value
 * @method LivreOr                  getLivreOr()                  Returns the current record's "LivreOr" value
 * @method PaysSite                 getPaysSite()                 Returns the current record's "PaysSite" value
 * @method StatistiqueCovoitureur   getStatistiqueCovoitureur()   Returns the current record's "StatistiqueCovoitureur" value
 * @method Trajet                   getTrajet()                   Returns the current record's "Trajet" value
 * @method TrajetAlerte             getTrajetAlerte()             Returns the current record's "TrajetAlerte" value
 * @method TrajetMiseEnRelation     getTrajetMiseEnRelation()     Returns the current record's "TrajetMiseEnRelation" value
 * @method Profile                  getProfile()                  Returns the current record's "Profile" value
 * @method SiteClient               setIdSiteClient()             Sets the current record's "id_site_client" value
 * @method SiteClient               setIdSiteParent()             Sets the current record's "id_site_parent" value
 * @method SiteClient               setIdFiliale()                Sets the current record's "id_filiale" value
 * @method SiteClient               setCle()                      Sets the current record's "cle" value
 * @method SiteClient               setEtat()                     Sets the current record's "etat" value
 * @method SiteClient               setVisible()                  Sets the current record's "visible" value
 * @method SiteClient               setDateCreation()             Sets the current record's "date_creation" value
 * @method SiteClient               setDatePublication()          Sets the current record's "date_publication" value
 * @method SiteClient               setDateDepublication()        Sets the current record's "date_depublication" value
 * @method SiteClient               setSociete()                  Sets the current record's "societe" value
 * @method SiteClient               setUrlApplication()           Sets the current record's "url_application" value
 * @method SiteClient               setDossierApplication()       Sets the current record's "dossier_application" value
 * @method SiteClient               setIdentifiant()              Sets the current record's "identifiant" value
 * @method SiteClient               setMotDePasse()               Sets the current record's "mot_de_passe" value
 * @method SiteClient               setIdentifiant2()             Sets the current record's "identifiant2" value
 * @method SiteClient               setMotDePasse2()              Sets the current record's "mot_de_passe2" value
 * @method SiteClient               setMailReferent2()            Sets the current record's "mail_referent2" value
 * @method SiteClient               setConfidentiel()             Sets the current record's "confidentiel" value
 * @method SiteClient               setValidationCompte()         Sets the current record's "validation_compte" value
 * @method SiteClient               setAdresse()                  Sets the current record's "adresse" value
 * @method SiteClient               setCodePostal()               Sets the current record's "code_postal" value
 * @method SiteClient               setIdVille()                  Sets the current record's "id_ville" value
 * @method SiteClient               setVille()                    Sets the current record's "ville" value
 * @method SiteClient               setLogo()                     Sets the current record's "logo" value
 * @method SiteClient               setBandeau()                  Sets the current record's "bandeau" value
 * @method SiteClient               setHtmlHeader()               Sets the current record's "html_header" value
 * @method SiteClient               setHtmlHaut()                 Sets the current record's "html_haut" value
 * @method SiteClient               setHtmlBas()                  Sets the current record's "html_bas" value
 * @method SiteClient               setHtmlGauche()               Sets the current record's "html_gauche" value
 * @method SiteClient               setHtmlDroit()                Sets the current record's "html_droit" value
 * @method SiteClient               setCouleur1()                 Sets the current record's "couleur1" value
 * @method SiteClient               setCouleur2()                 Sets the current record's "couleur2" value
 * @method SiteClient               setCouleur3()                 Sets the current record's "couleur3" value
 * @method SiteClient               setCartePositionLatitude()    Sets the current record's "carte_position_latitude" value
 * @method SiteClient               setCartePositionLongitude()   Sets the current record's "carte_position_longitude" value
 * @method SiteClient               setCartePositionHauteur()     Sets the current record's "carte_position_hauteur" value
 * @method SiteClient               setCleGooglemaps()            Sets the current record's "cle_googlemaps" value
 * @method SiteClient               setNomReferent()              Sets the current record's "nom_referent" value
 * @method SiteClient               setPrenomReferent()           Sets the current record's "prenom_referent" value
 * @method SiteClient               setMailReferent()             Sets the current record's "mail_referent" value
 * @method SiteClient               setTelephone()                Sets the current record's "telephone" value
 * @method SiteClient               setFax()                      Sets the current record's "fax" value
 * @method SiteClient               setDateDerniereConnexion()    Sets the current record's "date_derniere_connexion" value
 * @method SiteClient               setNombreConnexion()          Sets the current record's "nombre_connexion" value
 * @method SiteClient               setVersion()                  Sets the current record's "version" value
 * @method SiteClient               setAdminV2()                  Sets the current record's "admin_v2" value
 * @method SiteClient               setSiteClient()               Sets the current record's "SiteClient" value
 * @method SiteClient               setContenu()                  Sets the current record's "Contenu" value
 * @method SiteClient               setContenuActualite()         Sets the current record's "ContenuActualite" value
 * @method SiteClient               setContenuActualiteRubrique() Sets the current record's "ContenuActualiteRubrique" value
 * @method SiteClient               setCovoitureur()              Sets the current record's "Covoitureur" value
 * @method SiteClient               setCovoitureurAmis()          Sets the current record's "CovoitureurAmis" value
 * @method SiteClient               setCovoitureurEquipages()     Sets the current record's "CovoitureurEquipages" value
 * @method SiteClient               setCovoitureurFonction()      Sets the current record's "CovoitureurFonction" collection
 * @method SiteClient               setCovoitureurLienSite()      Sets the current record's "CovoitureurLienSite" collection
 * @method SiteClient               setDemandeRenseignement()     Sets the current record's "DemandeRenseignement" collection
 * @method SiteClient               setEquipage()                 Sets the current record's "Equipage" value
 * @method SiteClient               setEquipageCovoitureur()      Sets the current record's "EquipageCovoitureur" value
 * @method SiteClient               setEvenement()                Sets the current record's "Evenement" value
 * @method SiteClient               setHistoriqueBascule()        Sets the current record's "HistoriqueBascule" value
 * @method SiteClient               setLieu()                     Sets the current record's "Lieu" value
 * @method SiteClient               setLieuTest()                 Sets the current record's "LieuTest" value
 * @method SiteClient               setLieuType()                 Sets the current record's "LieuType" value
 * @method SiteClient               setLivreOr()                  Sets the current record's "LivreOr" value
 * @method SiteClient               setPaysSite()                 Sets the current record's "PaysSite" value
 * @method SiteClient               setStatistiqueCovoitureur()   Sets the current record's "StatistiqueCovoitureur" value
 * @method SiteClient               setTrajet()                   Sets the current record's "Trajet" value
 * @method SiteClient               setTrajetAlerte()             Sets the current record's "TrajetAlerte" value
 * @method SiteClient               setTrajetMiseEnRelation()     Sets the current record's "TrajetMiseEnRelation" value
 * @method SiteClient               setProfile()                  Sets the current record's "Profile" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSiteClient extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('site_client');
        $this->hasColumn('id_site_client', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_site_parent', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_filiale', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('cle', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('etat', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('visible', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('date_creation', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('date_publication', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('date_depublication', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('societe', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('url_application', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('dossier_application', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('identifiant', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('mot_de_passe', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('identifiant2', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('mot_de_passe2', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('mail_referent2', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('confidentiel', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('validation_compte', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('adresse', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('code_postal', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_ville', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('ville', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('logo', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('bandeau', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('html_header', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('html_haut', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('html_bas', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('html_gauche', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('html_droit', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('couleur1', 'string', 6, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 6,
             ));
        $this->hasColumn('couleur2', 'string', 6, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 6,
             ));
        $this->hasColumn('couleur3', 'string', 6, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 6,
             ));
        $this->hasColumn('carte_position_latitude', 'float', 14, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 14,
             ));
        $this->hasColumn('carte_position_longitude', 'float', 14, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 14,
             ));
        $this->hasColumn('carte_position_hauteur', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('cle_googlemaps', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('nom_referent', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('prenom_referent', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('mail_referent', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('telephone', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('fax', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('date_derniere_connexion', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('nombre_connexion', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('version', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('admin_v2', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('SiteClient', array(
             'local' => 'id_site_parent',
             'foreign' => 'id_site_client'));

        $this->hasOne('Contenu', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));

        $this->hasOne('ContenuActualite', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));

        $this->hasOne('ContenuActualiteRubrique', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));

        $this->hasOne('Covoitureur', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site_site'));

        $this->hasOne('CovoitureurAmis', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));

        $this->hasOne('CovoitureurEquipages', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));

        $this->hasMany('CovoitureurFonction', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site_client'));

        $this->hasMany('CovoitureurLienSite', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site_client'));

        $this->hasMany('DemandeRenseignement', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site_client'));

        $this->hasOne('Equipage', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));

        $this->hasOne('EquipageCovoitureur', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));

        $this->hasOne('Evenement', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));

        $this->hasOne('HistoriqueBascule', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site_client'));

        $this->hasOne('Lieu', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site_site'));

        $this->hasOne('LieuTest', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site_site'));

        $this->hasOne('LieuType', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site_client'));

        $this->hasOne('LivreOr', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site_client'));

        $this->hasOne('PaysSite', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));

        $this->hasOne('StatistiqueCovoitureur', array(
             'local' => 'id_site_client',
             'foreign' => 'site_client'));

        $this->hasOne('Trajet', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site_site'));

        $this->hasOne('TrajetAlerte', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));

        $this->hasOne('TrajetMiseEnRelation', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));

        $this->hasOne('Profile', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site'));
    }
}