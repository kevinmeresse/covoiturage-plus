<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('VilleHr', 'dbrmv3');

/**
 * BaseVilleHr
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_ville
 * @property integer $id_pays
 * @property string $nom_ville
 * @property string $nom_ville2
 * @property float $latitude
 * @property float $longitude
 * @property PaysMonde $PaysMonde
 * 
 * @method integer   getIdVille()    Returns the current record's "id_ville" value
 * @method integer   getIdPays()     Returns the current record's "id_pays" value
 * @method string    getNomVille()   Returns the current record's "nom_ville" value
 * @method string    getNomVille2()  Returns the current record's "nom_ville2" value
 * @method float     getLatitude()   Returns the current record's "latitude" value
 * @method float     getLongitude()  Returns the current record's "longitude" value
 * @method PaysMonde getPaysMonde()  Returns the current record's "PaysMonde" value
 * @method VilleHr   setIdVille()    Sets the current record's "id_ville" value
 * @method VilleHr   setIdPays()     Sets the current record's "id_pays" value
 * @method VilleHr   setNomVille()   Sets the current record's "nom_ville" value
 * @method VilleHr   setNomVille2()  Sets the current record's "nom_ville2" value
 * @method VilleHr   setLatitude()   Sets the current record's "latitude" value
 * @method VilleHr   setLongitude()  Sets the current record's "longitude" value
 * @method VilleHr   setPaysMonde()  Sets the current record's "PaysMonde" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVilleHr extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ville_hr');
        $this->hasColumn('id_ville', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_pays', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('nom_ville', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('nom_ville2', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('latitude', 'float', 14, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 14,
             ));
        $this->hasColumn('longitude', 'float', 14, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 14,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('PaysMonde', array(
             'local' => 'id_pays',
             'foreign' => 'id_pays'));
    }
}