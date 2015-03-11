<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CpTypeActionStatut', 'dbcvp');

/**
 * BaseCpTypeActionStatut
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cp_type_action_statut_id
 * @property string $cp_type_action_statut_nom
 * @property integer $cp_type_action_statut_ordre
 * @property string $cp_type_action_statut_couleur
 * @property Doctrine_Collection $Trajet
 * @property Doctrine_Collection $CpTypeAction
 * 
 * @method integer             getCpTypeActionStatutId()          Returns the current record's "cp_type_action_statut_id" value
 * @method string              getCpTypeActionStatutNom()         Returns the current record's "cp_type_action_statut_nom" value
 * @method integer             getCpTypeActionStatutOrdre()       Returns the current record's "cp_type_action_statut_ordre" value
 * @method string              getCpTypeActionStatutCouleur()     Returns the current record's "cp_type_action_statut_couleur" value
 * @method Doctrine_Collection getTrajet()                        Returns the current record's "Trajet" collection
 * @method Doctrine_Collection getCpTypeAction()                  Returns the current record's "CpTypeAction" collection
 * @method CpTypeActionStatut  setCpTypeActionStatutId()          Sets the current record's "cp_type_action_statut_id" value
 * @method CpTypeActionStatut  setCpTypeActionStatutNom()         Sets the current record's "cp_type_action_statut_nom" value
 * @method CpTypeActionStatut  setCpTypeActionStatutOrdre()       Sets the current record's "cp_type_action_statut_ordre" value
 * @method CpTypeActionStatut  setCpTypeActionStatutCouleur()     Sets the current record's "cp_type_action_statut_couleur" value
 * @method CpTypeActionStatut  setTrajet()                        Sets the current record's "Trajet" collection
 * @method CpTypeActionStatut  setCpTypeAction()                  Sets the current record's "CpTypeAction" collection
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCpTypeActionStatut extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cp_type_action_statut');
        $this->hasColumn('cp_type_action_statut_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('cp_type_action_statut_nom', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('cp_type_action_statut_ordre', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('cp_type_action_statut_couleur', 'string', 6, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 6,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Trajet', array(
             'local' => 'cp_type_action_statut_id',
             'foreign' => 'cp_type_action_statut_id'));

        $this->hasMany('CpTypeAction', array(
             'local' => 'cp_type_action_statut_id',
             'foreign' => 'cp_type_action_statut_id'));
    }
}