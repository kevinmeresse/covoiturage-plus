<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Widget', 'dbrmv3');

/**
 * BaseWidget
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_widget
 * @property string $ip
 * @property string $domaine
 * @property timestamp $date_creation
 * 
 * @method integer   getIdWidget()      Returns the current record's "id_widget" value
 * @method string    getIp()            Returns the current record's "ip" value
 * @method string    getDomaine()       Returns the current record's "domaine" value
 * @method timestamp getDateCreation()  Returns the current record's "date_creation" value
 * @method Widget    setIdWidget()      Sets the current record's "id_widget" value
 * @method Widget    setIp()            Sets the current record's "ip" value
 * @method Widget    setDomaine()       Sets the current record's "domaine" value
 * @method Widget    setDateCreation()  Sets the current record's "date_creation" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWidget extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('widget');
        $this->hasColumn('id_widget', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('ip', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('domaine', 'string', 255, array(
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
             'default' => '0000-00-00 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}