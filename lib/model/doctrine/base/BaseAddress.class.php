<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Address', 'dbrmv3');

/**
 * BaseAddress
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $address
 * @property blob $address_loc
 * @property ContenuActualite $ContenuActualite
 * 
 * @method string           getAddress()          Returns the current record's "address" value
 * @method blob             getAddressLoc()       Returns the current record's "address_loc" value
 * @method ContenuActualite getContenuActualite() Returns the current record's "ContenuActualite" value
 * @method Address          setAddress()          Sets the current record's "address" value
 * @method Address          setAddressLoc()       Sets the current record's "address_loc" value
 * @method Address          setContenuActualite() Sets the current record's "ContenuActualite" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAddress extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('address');
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('address_loc', 'blob', null, array(
             'type' => 'blob',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ContenuActualite', array(
             'local' => 'id_actualite',
             'foreign' => 'id_actualite'));
    }
}