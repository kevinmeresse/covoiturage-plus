<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CommunauteCommune', 'dbrmv3');

/**
 * BaseCommunauteCommune
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_communaute
 * @property string $nom
 * @property integer $id_ville_ref
 * @property string $informations
 * @property string $contact
 * @property string $action
 * @property VilleFr $VilleFr
 * 
 * @method integer           getIdCommunaute()  Returns the current record's "id_communaute" value
 * @method string            getNom()           Returns the current record's "nom" value
 * @method integer           getIdVilleRef()    Returns the current record's "id_ville_ref" value
 * @method string            getInformations()  Returns the current record's "informations" value
 * @method string            getContact()       Returns the current record's "contact" value
 * @method string            getAction()        Returns the current record's "action" value
 * @method VilleFr           getVilleFr()       Returns the current record's "VilleFr" value
 * @method CommunauteCommune setIdCommunaute()  Sets the current record's "id_communaute" value
 * @method CommunauteCommune setNom()           Sets the current record's "nom" value
 * @method CommunauteCommune setIdVilleRef()    Sets the current record's "id_ville_ref" value
 * @method CommunauteCommune setInformations()  Sets the current record's "informations" value
 * @method CommunauteCommune setContact()       Sets the current record's "contact" value
 * @method CommunauteCommune setAction()        Sets the current record's "action" value
 * @method CommunauteCommune setVilleFr()       Sets the current record's "VilleFr" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCommunauteCommune extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('communaute_commune');
        $this->hasColumn('id_communaute', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nom', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('id_ville_ref', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('informations', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             'length' => '',
             ));
        $this->hasColumn('contact', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             'length' => '',
             ));
        $this->hasColumn('action', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('VilleFr', array(
             'local' => 'id_ville_ref',
             'foreign' => 'id_ville'));
    }
}