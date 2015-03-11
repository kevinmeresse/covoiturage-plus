<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TrajetTypeCovoiturage', 'dbrmv3');

/**
 * BaseTrajetTypeCovoiturage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_type_covoiturage
 * @property integer $etat
 * @property string $libelle
 * @property integer $valeur
 * @property integer $id_site
 * @property Doctrine_Collection $Trajet
 * 
 * @method integer               getIdTypeCovoiturage()   Returns the current record's "id_type_covoiturage" value
 * @method integer               getEtat()                Returns the current record's "etat" value
 * @method string                getLibelle()             Returns the current record's "libelle" value
 * @method integer               getValeur()              Returns the current record's "valeur" value
 * @method integer               getIdSite()              Returns the current record's "id_site" value
 * @method Doctrine_Collection   getTrajet()              Returns the current record's "Trajet" collection
 * @method TrajetTypeCovoiturage setIdTypeCovoiturage()   Sets the current record's "id_type_covoiturage" value
 * @method TrajetTypeCovoiturage setEtat()                Sets the current record's "etat" value
 * @method TrajetTypeCovoiturage setLibelle()             Sets the current record's "libelle" value
 * @method TrajetTypeCovoiturage setValeur()              Sets the current record's "valeur" value
 * @method TrajetTypeCovoiturage setIdSite()              Sets the current record's "id_site" value
 * @method TrajetTypeCovoiturage setTrajet()              Sets the current record's "Trajet" collection
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTrajetTypeCovoiturage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('trajet_type_covoiturage');
        $this->hasColumn('id_type_covoiturage', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
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
        $this->hasColumn('libelle', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('valeur', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'default' => '0',
             'primary' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_site', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'default' => '0',
             'primary' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Trajet', array(
             'local' => 'id_type_covoiturage',
             'foreign' => 'id_type_trajet'));
    }
}