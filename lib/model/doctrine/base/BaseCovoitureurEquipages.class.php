<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CovoitureurEquipages', 'dbrmv3');

/**
 * BaseCovoitureurEquipages
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_equipage
 * @property integer $id_utilisateura
 * @property integer $id_trajet
 * @property integer $id_site
 * @property string $cle
 * @property integer $etat
 * @property timestamp $date_creation
 * @property string $nom_equipage
 * @property integer $id_utilisateurb
 * @property Covoitureur $Covoitureur
 * @property Trajet $Trajet
 * @property SiteClient $SiteClient
 * 
 * @method integer              getIdEquipage()      Returns the current record's "id_equipage" value
 * @method integer              getIdUtilisateura()  Returns the current record's "id_utilisateura" value
 * @method integer              getIdTrajet()        Returns the current record's "id_trajet" value
 * @method integer              getIdSite()          Returns the current record's "id_site" value
 * @method string               getCle()             Returns the current record's "cle" value
 * @method integer              getEtat()            Returns the current record's "etat" value
 * @method timestamp            getDateCreation()    Returns the current record's "date_creation" value
 * @method string               getNomEquipage()     Returns the current record's "nom_equipage" value
 * @method integer              getIdUtilisateurb()  Returns the current record's "id_utilisateurb" value
 * @method Covoitureur          getCovoitureur()     Returns the current record's "Covoitureur" value
 * @method Trajet               getTrajet()          Returns the current record's "Trajet" value
 * @method SiteClient           getSiteClient()      Returns the current record's "SiteClient" value
 * @method CovoitureurEquipages setIdEquipage()      Sets the current record's "id_equipage" value
 * @method CovoitureurEquipages setIdUtilisateura()  Sets the current record's "id_utilisateura" value
 * @method CovoitureurEquipages setIdTrajet()        Sets the current record's "id_trajet" value
 * @method CovoitureurEquipages setIdSite()          Sets the current record's "id_site" value
 * @method CovoitureurEquipages setCle()             Sets the current record's "cle" value
 * @method CovoitureurEquipages setEtat()            Sets the current record's "etat" value
 * @method CovoitureurEquipages setDateCreation()    Sets the current record's "date_creation" value
 * @method CovoitureurEquipages setNomEquipage()     Sets the current record's "nom_equipage" value
 * @method CovoitureurEquipages setIdUtilisateurb()  Sets the current record's "id_utilisateurb" value
 * @method CovoitureurEquipages setCovoitureur()     Sets the current record's "Covoitureur" value
 * @method CovoitureurEquipages setTrajet()          Sets the current record's "Trajet" value
 * @method CovoitureurEquipages setSiteClient()      Sets the current record's "SiteClient" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCovoitureurEquipages extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('covoitureur_equipages');
        $this->hasColumn('id_equipage', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_utilisateura', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_trajet', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_site', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
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
        $this->hasColumn('nom_equipage', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('id_utilisateurb', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Covoitureur', array(
             'local' => 'id_utilisateurb',
             'foreign' => 'id_utilisateur'));

        $this->hasOne('Trajet', array(
             'local' => 'id_trajet',
             'foreign' => 'id_trajet'));

        $this->hasOne('SiteClient', array(
             'local' => 'id_site',
             'foreign' => 'id_site_client'));
    }
}