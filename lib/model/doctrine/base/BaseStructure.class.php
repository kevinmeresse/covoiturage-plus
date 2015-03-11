<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Structure', 'dbrmv3');

/**
 * BaseStructure
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_structure
 * @property integer $id_commune
 * @property string $siret
 * @property string $forme
 * @property string $nom
 * @property string $voie
 * @property integer $code_postal
 * @property string $ville
 * @property string $telephone
 * 
 * @method integer   getIdStructure()  Returns the current record's "id_structure" value
 * @method integer   getIdCommune()    Returns the current record's "id_commune" value
 * @method string    getSiret()        Returns the current record's "siret" value
 * @method string    getForme()        Returns the current record's "forme" value
 * @method string    getNom()          Returns the current record's "nom" value
 * @method string    getVoie()         Returns the current record's "voie" value
 * @method integer   getCodePostal()   Returns the current record's "code_postal" value
 * @method string    getVille()        Returns the current record's "ville" value
 * @method string    getTelephone()    Returns the current record's "telephone" value
 * @method Structure setIdStructure()  Sets the current record's "id_structure" value
 * @method Structure setIdCommune()    Sets the current record's "id_commune" value
 * @method Structure setSiret()        Sets the current record's "siret" value
 * @method Structure setForme()        Sets the current record's "forme" value
 * @method Structure setNom()          Sets the current record's "nom" value
 * @method Structure setVoie()         Sets the current record's "voie" value
 * @method Structure setCodePostal()   Sets the current record's "code_postal" value
 * @method Structure setVille()        Sets the current record's "ville" value
 * @method Structure setTelephone()    Sets the current record's "telephone" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStructure extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('structure');
        $this->hasColumn('id_structure', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('id_commune', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('siret', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('forme', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
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
        $this->hasColumn('voie', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('code_postal', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('ville', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('telephone', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}