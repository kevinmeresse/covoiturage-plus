<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Region', 'dbrmv3');

/**
 * BaseRegion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_region
 * @property string $nom
 * @property integer $id_pays
 * @property Pays $Pays
 * @property DepartementFrancais $DepartementFrancais
 * 
 * @method integer             getIdRegion()            Returns the current record's "id_region" value
 * @method string              getNom()                 Returns the current record's "nom" value
 * @method integer             getIdPays()              Returns the current record's "id_pays" value
 * @method Pays                getPays()                Returns the current record's "Pays" value
 * @method DepartementFrancais getDepartementFrancais() Returns the current record's "DepartementFrancais" value
 * @method Region              setIdRegion()            Sets the current record's "id_region" value
 * @method Region              setNom()                 Sets the current record's "nom" value
 * @method Region              setIdPays()              Sets the current record's "id_pays" value
 * @method Region              setPays()                Sets the current record's "Pays" value
 * @method Region              setDepartementFrancais() Sets the current record's "DepartementFrancais" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRegion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('region');
        $this->hasColumn('id_region', 'integer', 4, array(
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
        $this->hasColumn('id_pays', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Pays', array(
             'local' => 'id_pays',
             'foreign' => 'id_pays'));

        $this->hasOne('DepartementFrancais', array(
             'local' => 'id_region',
             'foreign' => 'id_region'));
    }
}