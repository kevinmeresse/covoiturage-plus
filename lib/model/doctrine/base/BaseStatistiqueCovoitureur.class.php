<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('StatistiqueCovoitureur', 'dbrmv3');

/**
 * BaseStatistiqueCovoitureur
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_stat
 * @property integer $id_covoitureur
 * @property string $ip
 * @property string $navigateur_os
 * @property string $navigateur_full
 * @property string $resolution
 * @property integer $nombres_trajets
 * @property integer $site_client
 * @property timestamp $date
 * @property Covoitureur $Covoitureur
 * @property SiteClient $SiteClient
 * 
 * @method integer                getIdStat()          Returns the current record's "id_stat" value
 * @method integer                getIdCovoitureur()   Returns the current record's "id_covoitureur" value
 * @method string                 getIp()              Returns the current record's "ip" value
 * @method string                 getNavigateurOs()    Returns the current record's "navigateur_os" value
 * @method string                 getNavigateurFull()  Returns the current record's "navigateur_full" value
 * @method string                 getResolution()      Returns the current record's "resolution" value
 * @method integer                getNombresTrajets()  Returns the current record's "nombres_trajets" value
 * @method integer                getSiteClient()      Returns the current record's "site_client" value
 * @method timestamp              getDate()            Returns the current record's "date" value
 * @method Covoitureur            getCovoitureur()     Returns the current record's "Covoitureur" value
 * @method SiteClient             getSiteClient()      Returns the current record's "SiteClient" value
 * @method StatistiqueCovoitureur setIdStat()          Sets the current record's "id_stat" value
 * @method StatistiqueCovoitureur setIdCovoitureur()   Sets the current record's "id_covoitureur" value
 * @method StatistiqueCovoitureur setIp()              Sets the current record's "ip" value
 * @method StatistiqueCovoitureur setNavigateurOs()    Sets the current record's "navigateur_os" value
 * @method StatistiqueCovoitureur setNavigateurFull()  Sets the current record's "navigateur_full" value
 * @method StatistiqueCovoitureur setResolution()      Sets the current record's "resolution" value
 * @method StatistiqueCovoitureur setNombresTrajets()  Sets the current record's "nombres_trajets" value
 * @method StatistiqueCovoitureur setSiteClient()      Sets the current record's "site_client" value
 * @method StatistiqueCovoitureur setDate()            Sets the current record's "date" value
 * @method StatistiqueCovoitureur setCovoitureur()     Sets the current record's "Covoitureur" value
 * @method StatistiqueCovoitureur setSiteClient()      Sets the current record's "SiteClient" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStatistiqueCovoitureur extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('statistique_covoitureur');
        $this->hasColumn('id_stat', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_covoitureur', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('ip', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('navigateur_os', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('navigateur_full', 'string', 150, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 150,
             ));
        $this->hasColumn('resolution', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('nombres_trajets', 'integer', 3, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 3,
             ));
        $this->hasColumn('site_client', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('date', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Covoitureur', array(
             'local' => 'id_covoitureur',
             'foreign' => 'id_utilisateur'));

        $this->hasOne('SiteClient', array(
             'local' => 'site_client',
             'foreign' => 'id_site_client'));
    }
}