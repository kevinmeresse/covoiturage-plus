<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('LanguePage', 'dbrmv3');

/**
 * BaseLanguePage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_page
 * @property string $libelle_page
 * @property integer $etat
 * @property LangueItem $LangueItem
 * @property LangueItemTrad $LangueItemTrad
 * 
 * @method integer        getIdPage()         Returns the current record's "id_page" value
 * @method string         getLibellePage()    Returns the current record's "libelle_page" value
 * @method integer        getEtat()           Returns the current record's "etat" value
 * @method LangueItem     getLangueItem()     Returns the current record's "LangueItem" value
 * @method LangueItemTrad getLangueItemTrad() Returns the current record's "LangueItemTrad" value
 * @method LanguePage     setIdPage()         Sets the current record's "id_page" value
 * @method LanguePage     setLibellePage()    Sets the current record's "libelle_page" value
 * @method LanguePage     setEtat()           Sets the current record's "etat" value
 * @method LanguePage     setLangueItem()     Sets the current record's "LangueItem" value
 * @method LanguePage     setLangueItemTrad() Sets the current record's "LangueItemTrad" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLanguePage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('langue_page');
        $this->hasColumn('id_page', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('libelle_page', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('etat', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('LangueItem', array(
             'local' => 'id_page',
             'foreign' => 'id_page'));

        $this->hasOne('LangueItemTrad', array(
             'local' => 'id_page',
             'foreign' => 'id_page'));
    }
}