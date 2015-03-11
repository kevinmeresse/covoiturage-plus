<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('LogTypeProvenance', 'dbrmv3');

/**
 * BaseLogTypeProvenance
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_log_type_provenance
 * @property string $type_provenance
 * @property LogSite $LogSite
 * 
 * @method integer           getIdLogTypeProvenance()    Returns the current record's "id_log_type_provenance" value
 * @method string            getTypeProvenance()         Returns the current record's "type_provenance" value
 * @method LogSite           getLogSite()                Returns the current record's "LogSite" value
 * @method LogTypeProvenance setIdLogTypeProvenance()    Sets the current record's "id_log_type_provenance" value
 * @method LogTypeProvenance setTypeProvenance()         Sets the current record's "type_provenance" value
 * @method LogTypeProvenance setLogSite()                Sets the current record's "LogSite" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLogTypeProvenance extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('log_type_provenance');
        $this->hasColumn('id_log_type_provenance', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('type_provenance', 'string', 255, array(
             'type' => 'string',
             'fixed' => 1,
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
        $this->hasOne('LogSite', array(
             'local' => 'id_log_type_provenance',
             'foreign' => 'id_log_type_provenance'));
    }
}