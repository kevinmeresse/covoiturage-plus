<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('VehiculeMotorisation', 'dbrmv3');

/**
 * BaseVehiculeMotorisation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_motorisation
 * @property string $cle
 * @property integer $etat
 * @property timestamp $date_creation
 * @property string $nom_motorisation
 * @property string $description
 * @property CovoitureurVehicule $CovoitureurVehicule
 * 
 * @method integer              getIdMotorisation()      Returns the current record's "id_motorisation" value
 * @method string               getCle()                 Returns the current record's "cle" value
 * @method integer              getEtat()                Returns the current record's "etat" value
 * @method timestamp            getDateCreation()        Returns the current record's "date_creation" value
 * @method string               getNomMotorisation()     Returns the current record's "nom_motorisation" value
 * @method string               getDescription()         Returns the current record's "description" value
 * @method CovoitureurVehicule  getCovoitureurVehicule() Returns the current record's "CovoitureurVehicule" value
 * @method VehiculeMotorisation setIdMotorisation()      Sets the current record's "id_motorisation" value
 * @method VehiculeMotorisation setCle()                 Sets the current record's "cle" value
 * @method VehiculeMotorisation setEtat()                Sets the current record's "etat" value
 * @method VehiculeMotorisation setDateCreation()        Sets the current record's "date_creation" value
 * @method VehiculeMotorisation setNomMotorisation()     Sets the current record's "nom_motorisation" value
 * @method VehiculeMotorisation setDescription()         Sets the current record's "description" value
 * @method VehiculeMotorisation setCovoitureurVehicule() Sets the current record's "CovoitureurVehicule" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVehiculeMotorisation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('vehicule_motorisation');
        $this->hasColumn('id_motorisation', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
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
        $this->hasColumn('nom_motorisation', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 250,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CovoitureurVehicule', array(
             'local' => 'id_motorisation',
             'foreign' => 'id_motorisation'));
    }
}