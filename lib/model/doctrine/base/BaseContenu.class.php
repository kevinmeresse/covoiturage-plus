<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Contenu', 'dbrmv3');

/**
 * BaseContenu
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_contenu
 * @property integer $id_site
 * @property string $cle
 * @property integer $etat
 * @property integer $visible
 * @property timestamp $date_creation
 * @property timestamp $date_modification
 * @property string $fr_titre
 * @property integer $nombre_visualisation
 * @property integer $id_createur
 * @property string $fr_meta_description
 * @property string $fr_meta_keywords
 * @property string $fr_contenu_html
 * @property string $fr_contenu_html_col1
 * @property string $fr_contenu_html_col2
 * @property string $fr_contenu_html_intermediaire
 * @property string $fr_contenu_html_col1_intermediaire
 * @property string $fr_contenu_html_col2_intermediaire
 * @property integer $id_rubrique_parente
 * @property integer $priorite
 * @property date $date_publication
 * @property date $date_depublication
 * @property string $fr_citation
 * @property string $en_citation
 * @property string $bandeau_haut
 * @property string $colonne_droite
 * @property string $en_titre
 * @property string $en_meta_description
 * @property string $en_meta_keywords
 * @property string $en_contenu_html
 * @property string $en_contenu_html_col1
 * @property string $en_contenu_html_col2
 * @property string $en_contenu_html_intermediaire
 * @property string $en_contenu_html_col1_intermediaire
 * @property string $en_contenu_html_col2_intermediaire
 * @property string $fr_nom_fichier
 * @property string $en_nom_fichier
 * @property integer $is_txt_rubrique
 * @property string $lien_url
 * @property integer $id_perm
 * @property SiteClient $SiteClient
 * @property ContenuRubrique $ContenuRubrique
 * @property sfGuardUser $sfGuardUser
 * @property sfGuardPermission $sfGuardPermission
 * 
 * @method integer           getIdContenu()                          Returns the current record's "id_contenu" value
 * @method integer           getIdSite()                             Returns the current record's "id_site" value
 * @method string            getCle()                                Returns the current record's "cle" value
 * @method integer           getEtat()                               Returns the current record's "etat" value
 * @method integer           getVisible()                            Returns the current record's "visible" value
 * @method timestamp         getDateCreation()                       Returns the current record's "date_creation" value
 * @method timestamp         getDateModification()                   Returns the current record's "date_modification" value
 * @method string            getFrTitre()                            Returns the current record's "fr_titre" value
 * @method integer           getNombreVisualisation()                Returns the current record's "nombre_visualisation" value
 * @method integer           getIdCreateur()                         Returns the current record's "id_createur" value
 * @method string            getFrMetaDescription()                  Returns the current record's "fr_meta_description" value
 * @method string            getFrMetaKeywords()                     Returns the current record's "fr_meta_keywords" value
 * @method string            getFrContenuHtml()                      Returns the current record's "fr_contenu_html" value
 * @method string            getFrContenuHtmlCol1()                  Returns the current record's "fr_contenu_html_col1" value
 * @method string            getFrContenuHtmlCol2()                  Returns the current record's "fr_contenu_html_col2" value
 * @method string            getFrContenuHtmlIntermediaire()         Returns the current record's "fr_contenu_html_intermediaire" value
 * @method string            getFrContenuHtmlCol1Intermediaire()     Returns the current record's "fr_contenu_html_col1_intermediaire" value
 * @method string            getFrContenuHtmlCol2Intermediaire()     Returns the current record's "fr_contenu_html_col2_intermediaire" value
 * @method integer           getIdRubriqueParente()                  Returns the current record's "id_rubrique_parente" value
 * @method integer           getPriorite()                           Returns the current record's "priorite" value
 * @method date              getDatePublication()                    Returns the current record's "date_publication" value
 * @method date              getDateDepublication()                  Returns the current record's "date_depublication" value
 * @method string            getFrCitation()                         Returns the current record's "fr_citation" value
 * @method string            getEnCitation()                         Returns the current record's "en_citation" value
 * @method string            getBandeauHaut()                        Returns the current record's "bandeau_haut" value
 * @method string            getColonneDroite()                      Returns the current record's "colonne_droite" value
 * @method string            getEnTitre()                            Returns the current record's "en_titre" value
 * @method string            getEnMetaDescription()                  Returns the current record's "en_meta_description" value
 * @method string            getEnMetaKeywords()                     Returns the current record's "en_meta_keywords" value
 * @method string            getEnContenuHtml()                      Returns the current record's "en_contenu_html" value
 * @method string            getEnContenuHtmlCol1()                  Returns the current record's "en_contenu_html_col1" value
 * @method string            getEnContenuHtmlCol2()                  Returns the current record's "en_contenu_html_col2" value
 * @method string            getEnContenuHtmlIntermediaire()         Returns the current record's "en_contenu_html_intermediaire" value
 * @method string            getEnContenuHtmlCol1Intermediaire()     Returns the current record's "en_contenu_html_col1_intermediaire" value
 * @method string            getEnContenuHtmlCol2Intermediaire()     Returns the current record's "en_contenu_html_col2_intermediaire" value
 * @method string            getFrNomFichier()                       Returns the current record's "fr_nom_fichier" value
 * @method string            getEnNomFichier()                       Returns the current record's "en_nom_fichier" value
 * @method integer           getIsTxtRubrique()                      Returns the current record's "is_txt_rubrique" value
 * @method string            getLienUrl()                            Returns the current record's "lien_url" value
 * @method integer           getIdPerm()                             Returns the current record's "id_perm" value
 * @method SiteClient        getSiteClient()                         Returns the current record's "SiteClient" value
 * @method ContenuRubrique   getContenuRubrique()                    Returns the current record's "ContenuRubrique" value
 * @method sfGuardUser       getSfGuardUser()                        Returns the current record's "sfGuardUser" value
 * @method sfGuardPermission getSfGuardPermission()                  Returns the current record's "sfGuardPermission" value
 * @method Contenu           setIdContenu()                          Sets the current record's "id_contenu" value
 * @method Contenu           setIdSite()                             Sets the current record's "id_site" value
 * @method Contenu           setCle()                                Sets the current record's "cle" value
 * @method Contenu           setEtat()                               Sets the current record's "etat" value
 * @method Contenu           setVisible()                            Sets the current record's "visible" value
 * @method Contenu           setDateCreation()                       Sets the current record's "date_creation" value
 * @method Contenu           setDateModification()                   Sets the current record's "date_modification" value
 * @method Contenu           setFrTitre()                            Sets the current record's "fr_titre" value
 * @method Contenu           setNombreVisualisation()                Sets the current record's "nombre_visualisation" value
 * @method Contenu           setIdCreateur()                         Sets the current record's "id_createur" value
 * @method Contenu           setFrMetaDescription()                  Sets the current record's "fr_meta_description" value
 * @method Contenu           setFrMetaKeywords()                     Sets the current record's "fr_meta_keywords" value
 * @method Contenu           setFrContenuHtml()                      Sets the current record's "fr_contenu_html" value
 * @method Contenu           setFrContenuHtmlCol1()                  Sets the current record's "fr_contenu_html_col1" value
 * @method Contenu           setFrContenuHtmlCol2()                  Sets the current record's "fr_contenu_html_col2" value
 * @method Contenu           setFrContenuHtmlIntermediaire()         Sets the current record's "fr_contenu_html_intermediaire" value
 * @method Contenu           setFrContenuHtmlCol1Intermediaire()     Sets the current record's "fr_contenu_html_col1_intermediaire" value
 * @method Contenu           setFrContenuHtmlCol2Intermediaire()     Sets the current record's "fr_contenu_html_col2_intermediaire" value
 * @method Contenu           setIdRubriqueParente()                  Sets the current record's "id_rubrique_parente" value
 * @method Contenu           setPriorite()                           Sets the current record's "priorite" value
 * @method Contenu           setDatePublication()                    Sets the current record's "date_publication" value
 * @method Contenu           setDateDepublication()                  Sets the current record's "date_depublication" value
 * @method Contenu           setFrCitation()                         Sets the current record's "fr_citation" value
 * @method Contenu           setEnCitation()                         Sets the current record's "en_citation" value
 * @method Contenu           setBandeauHaut()                        Sets the current record's "bandeau_haut" value
 * @method Contenu           setColonneDroite()                      Sets the current record's "colonne_droite" value
 * @method Contenu           setEnTitre()                            Sets the current record's "en_titre" value
 * @method Contenu           setEnMetaDescription()                  Sets the current record's "en_meta_description" value
 * @method Contenu           setEnMetaKeywords()                     Sets the current record's "en_meta_keywords" value
 * @method Contenu           setEnContenuHtml()                      Sets the current record's "en_contenu_html" value
 * @method Contenu           setEnContenuHtmlCol1()                  Sets the current record's "en_contenu_html_col1" value
 * @method Contenu           setEnContenuHtmlCol2()                  Sets the current record's "en_contenu_html_col2" value
 * @method Contenu           setEnContenuHtmlIntermediaire()         Sets the current record's "en_contenu_html_intermediaire" value
 * @method Contenu           setEnContenuHtmlCol1Intermediaire()     Sets the current record's "en_contenu_html_col1_intermediaire" value
 * @method Contenu           setEnContenuHtmlCol2Intermediaire()     Sets the current record's "en_contenu_html_col2_intermediaire" value
 * @method Contenu           setFrNomFichier()                       Sets the current record's "fr_nom_fichier" value
 * @method Contenu           setEnNomFichier()                       Sets the current record's "en_nom_fichier" value
 * @method Contenu           setIsTxtRubrique()                      Sets the current record's "is_txt_rubrique" value
 * @method Contenu           setLienUrl()                            Sets the current record's "lien_url" value
 * @method Contenu           setIdPerm()                             Sets the current record's "id_perm" value
 * @method Contenu           setSiteClient()                         Sets the current record's "SiteClient" value
 * @method Contenu           setContenuRubrique()                    Sets the current record's "ContenuRubrique" value
 * @method Contenu           setSfGuardUser()                        Sets the current record's "sfGuardUser" value
 * @method Contenu           setSfGuardPermission()                  Sets the current record's "sfGuardPermission" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseContenu extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('contenu');
        $this->hasColumn('id_contenu', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_site', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
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
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('date_modification', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('fr_titre', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('nombre_visualisation', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_createur', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fr_meta_description', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('fr_meta_keywords', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('fr_contenu_html', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('fr_contenu_html_col1', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('fr_contenu_html_col2', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('fr_contenu_html_intermediaire', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('fr_contenu_html_col1_intermediaire', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('fr_contenu_html_col2_intermediaire', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('id_rubrique_parente', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('priorite', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('date_publication', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('date_depublication', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('fr_citation', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('en_citation', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('bandeau_haut', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('colonne_droite', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('en_titre', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('en_meta_description', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('en_meta_keywords', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('en_contenu_html', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('en_contenu_html_col1', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('en_contenu_html_col2', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('en_contenu_html_intermediaire', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('en_contenu_html_col1_intermediaire', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('en_contenu_html_col2_intermediaire', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('fr_nom_fichier', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('en_nom_fichier', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('is_txt_rubrique', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('lien_url', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('id_perm', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('SiteClient', array(
             'local' => 'id_site',
             'foreign' => 'id_site_client'));

        $this->hasOne('ContenuRubrique', array(
             'local' => 'id_rubrique_parente',
             'foreign' => 'id_rubrique'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'id_createur',
             'foreign' => 'id'));

        $this->hasOne('sfGuardPermission', array(
             'local' => 'id_perm',
             'foreign' => 'id'));
    }
}