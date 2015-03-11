<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Pays', 'dbrmv3');

/**
 * BasePays
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_pays
 * @property string $nom
 * @property Region $Region
 * 
 * @method integer getIdPays()  Returns the current record's "id_pays" value
 * @method string  getNom()     Returns the current record's "nom" value
 * @method Region  getRegion()  Returns the current record's "Region" value
 * @method Pays    setIdPays()  Sets the current record's "id_pays" value
 * @method Pays    setNom()     Sets the current record's "nom" value
 * @method Pays    setRegion()  Sets the current record's "Region" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePays extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pays');
        $this->hasColumn('id_pays', 'integer', 4, array(
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Region', array(
             'local' => 'id_pays',
             'foreign' => 'id_pays'));
    }
}