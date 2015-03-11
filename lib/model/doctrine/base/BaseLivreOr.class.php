<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('LivreOr', 'dbrmv3');

/**
 * BaseLivreOr
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nom
 * @property string $prenom
 * @property string $message
 * @property string $mail
 * @property timestamp $date_creation
 * @property integer $id_site_client
 * @property integer $etat
 * @property string $cle
 * @property SiteClient $SiteClient
 * 
 * @method integer    getId()             Returns the current record's "id" value
 * @method string     getNom()            Returns the current record's "nom" value
 * @method string     getPrenom()         Returns the current record's "prenom" value
 * @method string     getMessage()        Returns the current record's "message" value
 * @method string     getMail()           Returns the current record's "mail" value
 * @method timestamp  getDateCreation()   Returns the current record's "date_creation" value
 * @method integer    getIdSiteClient()   Returns the current record's "id_site_client" value
 * @method integer    getEtat()           Returns the current record's "etat" value
 * @method string     getCle()            Returns the current record's "cle" value
 * @method SiteClient getSiteClient()     Returns the current record's "SiteClient" value
 * @method LivreOr    setId()             Sets the current record's "id" value
 * @method LivreOr    setNom()            Sets the current record's "nom" value
 * @method LivreOr    setPrenom()         Sets the current record's "prenom" value
 * @method LivreOr    setMessage()        Sets the current record's "message" value
 * @method LivreOr    setMail()           Sets the current record's "mail" value
 * @method LivreOr    setDateCreation()   Sets the current record's "date_creation" value
 * @method LivreOr    setIdSiteClient()   Sets the current record's "id_site_client" value
 * @method LivreOr    setEtat()           Sets the current record's "etat" value
 * @method LivreOr    setCle()            Sets the current record's "cle" value
 * @method LivreOr    setSiteClient()     Sets the current record's "SiteClient" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLivreOr extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('livre_or');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nom', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('prenom', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('message', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('mail', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('date_creation', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('id_site_client', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('etat', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('cle', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('SiteClient', array(
             'local' => 'id_site_client',
             'foreign' => 'id_site_client'));
    }
}