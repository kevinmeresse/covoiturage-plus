<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('OffreCovoiturage', 'dbrmv3');

/**
 * BaseOffreCovoiturage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $etat
 * @property timestamp $date_creation
 * @property timestamp $date_modification
 * @property integer $id_partenaire
 * @property integer $id_trajet_partenaire
 * @property integer $id_personne
 * @property integer $depart_id
 * @property integer $depart_insee
 * @property string $depart_nom
 * @property integer $destination_id
 * @property integer $destination_insee
 * @property string $destination_nom
 * @property integer $type_covoiturage
 * @property timestamp $date_unique
 * @property string $frequence
 * @property string $heure_regulier
 * @property integer $nb_place
 * @property string $information
 * @property string $cout
 * @property string $url_retour
 * 
 * @method integer          getId()                   Returns the current record's "id" value
 * @method integer          getEtat()                 Returns the current record's "etat" value
 * @method timestamp        getDateCreation()         Returns the current record's "date_creation" value
 * @method timestamp        getDateModification()     Returns the current record's "date_modification" value
 * @method integer          getIdPartenaire()         Returns the current record's "id_partenaire" value
 * @method integer          getIdTrajetPartenaire()   Returns the current record's "id_trajet_partenaire" value
 * @method integer          getIdPersonne()           Returns the current record's "id_personne" value
 * @method integer          getDepartId()             Returns the current record's "depart_id" value
 * @method integer          getDepartInsee()          Returns the current record's "depart_insee" value
 * @method string           getDepartNom()            Returns the current record's "depart_nom" value
 * @method integer          getDestinationId()        Returns the current record's "destination_id" value
 * @method integer          getDestinationInsee()     Returns the current record's "destination_insee" value
 * @method string           getDestinationNom()       Returns the current record's "destination_nom" value
 * @method integer          getTypeCovoiturage()      Returns the current record's "type_covoiturage" value
 * @method timestamp        getDateUnique()           Returns the current record's "date_unique" value
 * @method string           getFrequence()            Returns the current record's "frequence" value
 * @method string           getHeureRegulier()        Returns the current record's "heure_regulier" value
 * @method integer          getNbPlace()              Returns the current record's "nb_place" value
 * @method string           getInformation()          Returns the current record's "information" value
 * @method string           getCout()                 Returns the current record's "cout" value
 * @method string           getUrlRetour()            Returns the current record's "url_retour" value
 * @method OffreCovoiturage setId()                   Sets the current record's "id" value
 * @method OffreCovoiturage setEtat()                 Sets the current record's "etat" value
 * @method OffreCovoiturage setDateCreation()         Sets the current record's "date_creation" value
 * @method OffreCovoiturage setDateModification()     Sets the current record's "date_modification" value
 * @method OffreCovoiturage setIdPartenaire()         Sets the current record's "id_partenaire" value
 * @method OffreCovoiturage setIdTrajetPartenaire()   Sets the current record's "id_trajet_partenaire" value
 * @method OffreCovoiturage setIdPersonne()           Sets the current record's "id_personne" value
 * @method OffreCovoiturage setDepartId()             Sets the current record's "depart_id" value
 * @method OffreCovoiturage setDepartInsee()          Sets the current record's "depart_insee" value
 * @method OffreCovoiturage setDepartNom()            Sets the current record's "depart_nom" value
 * @method OffreCovoiturage setDestinationId()        Sets the current record's "destination_id" value
 * @method OffreCovoiturage setDestinationInsee()     Sets the current record's "destination_insee" value
 * @method OffreCovoiturage setDestinationNom()       Sets the current record's "destination_nom" value
 * @method OffreCovoiturage setTypeCovoiturage()      Sets the current record's "type_covoiturage" value
 * @method OffreCovoiturage setDateUnique()           Sets the current record's "date_unique" value
 * @method OffreCovoiturage setFrequence()            Sets the current record's "frequence" value
 * @method OffreCovoiturage setHeureRegulier()        Sets the current record's "heure_regulier" value
 * @method OffreCovoiturage setNbPlace()              Sets the current record's "nb_place" value
 * @method OffreCovoiturage setInformation()          Sets the current record's "information" value
 * @method OffreCovoiturage setCout()                 Sets the current record's "cout" value
 * @method OffreCovoiturage setUrlRetour()            Sets the current record's "url_retour" value
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOffreCovoiturage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('offre_covoiturage');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('etat', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('date_creation', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('date_modification', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('id_partenaire', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_trajet_partenaire', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_personne', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('depart_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('depart_insee', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('depart_nom', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('destination_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('destination_insee', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('destination_nom', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('type_covoiturage', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('date_unique', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('frequence', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('heure_regulier', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('nb_place', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('information', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('cout', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
        $this->hasColumn('url_retour', 'string', 250, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 250,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}