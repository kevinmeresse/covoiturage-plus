<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CovoitureurVehicule', 'dbrmv3');

/**
 * BaseCovoitureurVehicule
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_vehicule
 * @property string $cle
 * @property integer $etat
 * @property timestamp $date_creation
 * @property integer $id_utilisateur
 * @property integer $id_marque
 * @property integer $id_modele
 * @property integer $id_motorisation
 * @property string $annee
 * @property string $couleur
 * @property Covoitureur $Covoitureur
 * @property VehiculeMarque $VehiculeMarque
 * @property VehiculeModele $VehiculeModele
 * @property VehiculeMotorisation $VehiculeMotorisation
 * @property Trajet $Trajet
 * 
 * @method integer              getIdVehicule()           Returns the current record's "id_vehicule" value
 * @method string               getCle()                  Returns the current record's "cle" value
 * @method integer              getEtat()                 Returns the current record's "etat" value
 * @method timestamp            getDateCreation()         Returns the current record's "date_creation" value
 * @method integer              getIdUtilisateur()        Returns the current record's "id_utilisateur" value
 * @method integer              getIdMarque()             Returns the current record's "id_marque" value
 * @method integer              getIdModele()             Returns the current record's "id_modele" value
 * @method integer              getIdMotorisation()       Returns the current record's "id_motorisation" value
 * @method string               getAnnee()                Returns the current record's "annee" value
 * @method string               getCouleur()              Returns the current record's "couleur" value
 * @method Covoitureur          getCovoitureur()          Returns the current record's "Covoitureur" value
 * @method VehiculeMarque       getVehiculeMarque()       Returns the current record's "VehiculeMarque" value
 * @method VehiculeModele       getVehiculeModele()       Returns the current record's "VehiculeModele" value
 * @method VehiculeMotorisation getVehiculeMotorisation() Returns the current record's "VehiculeMotorisation" value
 * @method Trajet               getTrajet()               Returns the current record's "Trajet" value
 * @method CovoitureurVehicule  setIdVehicule()           Sets the current record's "id_vehicule" value
 * @method CovoitureurVehicule  setCle()                  Sets the current record's "cle" value
 * @method CovoitureurVehicule  setEtat()                 Sets the current record's "etat" value
 * @method CovoitureurVehicule  setDateCreation()         Sets the current record's "date_creation" value
 * @method CovoitureurVehicule  setIdUtilisateur()        Sets the current record's "id_utilisateur" value
 * @method CovoitureurVehicule  setIdMarque()             Sets the current record's "id_marque" value
 * @method CovoitureurVehicule  setIdModele()             Sets the current record's "id_modele" value
 * @method CovoitureurVehicule  setIdMotorisation()       Sets the current record's "id_motorisation" value
 * @method CovoitureurVehicule  setAnnee()                Sets the current record's "annee" value
 * @method CovoitureurVehicule  setCouleur()              Sets the current record's "couleur" value
 * @method CovoitureurVehicule  setCovoitureur()          Sets the current record's "Covoitureur" value
 * @method CovoitureurVehicule  setVehiculeMarque()       Sets the current record's "VehiculeMarque" value
 * @method CovoitureurVehicule  setVehiculeModele()       Sets the current record's "VehiculeModele" value
 * @method CovoitureurVehicule  setVehiculeMotorisation() Sets the current record's "VehiculeMotorisation" value
 * @method CovoitureurVehicule  setTrajet()               Sets the current record's "Trajet" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCovoitureurVehicule extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('covoitureur_vehicule');
        $this->hasColumn('id_vehicule', 'integer', 4, array(
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
        $this->hasColumn('id_utilisateur', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_marque', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_modele', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_motorisation', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('annee', 'string', 4, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '2000',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('couleur', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Covoitureur', array(
             'local' => 'id_utilisateur',
             'foreign' => 'id_utilisateur'));

        $this->hasOne('VehiculeMarque', array(
             'local' => 'id_marque',
             'foreign' => 'id_marque'));

        $this->hasOne('VehiculeModele', array(
             'local' => 'id_modele',
             'foreign' => 'id_modele'));

        $this->hasOne('VehiculeMotorisation', array(
             'local' => 'id_motorisation',
             'foreign' => 'id_motorisation'));

        $this->hasOne('Trajet', array(
             'local' => 'id_vehicule',
             'foreign' => 'vehicule'));
    }
}