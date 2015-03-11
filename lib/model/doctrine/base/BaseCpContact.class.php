<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CpContact', 'dbcvp');

/**
 * BaseCpContact
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $cp_contact_id
 * @property string $cp_contact_nom
 * @property string $cp_contact_prenom
 * @property string $cp_contact_tel
 * @property string $cp_contact_tel_autre
 * @property string $cp_contact_mail
 * @property string $cp_contact_mail_autre
 * @property string $cp_contact_fonction
 * @property string $cp_contact_commentaire
 * @property integer $cp_contact_contact_principal
 * @property timestamp $cp_contact_date_creation
 * @property timestamp $cp_contact_date_modification
 * @property integer $cp_contact_cp_etablissement_id
 * @property integer $cp_contact_statut_id
 * @property CpEtablissement $CpEtablissement
 * @property CpContactStatut $CpContactStatut
 * @property Doctrine_Collection $CpActionCtc
 * @property Doctrine_Collection $CpActionEtb
 * 
 * @method integer             getCpContactId()                    Returns the current record's "cp_contact_id" value
 * @method string              getCpContactNom()                   Returns the current record's "cp_contact_nom" value
 * @method string              getCpContactPrenom()                Returns the current record's "cp_contact_prenom" value
 * @method string              getCpContactTel()                   Returns the current record's "cp_contact_tel" value
 * @method string              getCpContactTelAutre()              Returns the current record's "cp_contact_tel_autre" value
 * @method string              getCpContactMail()                  Returns the current record's "cp_contact_mail" value
 * @method string              getCpContactMailAutre()             Returns the current record's "cp_contact_mail_autre" value
 * @method string              getCpContactFonction()              Returns the current record's "cp_contact_fonction" value
 * @method string              getCpContactCommentaire()           Returns the current record's "cp_contact_commentaire" value
 * @method integer             getCpContactContactPrincipal()      Returns the current record's "cp_contact_contact_principal" value
 * @method timestamp           getCpContactDateCreation()          Returns the current record's "cp_contact_date_creation" value
 * @method timestamp           getCpContactDateModification()      Returns the current record's "cp_contact_date_modification" value
 * @method integer             getCpContactCpEtablissementId()     Returns the current record's "cp_contact_cp_etablissement_id" value
 * @method integer             getCpContactStatutId()              Returns the current record's "cp_contact_statut_id" value
 * @method CpEtablissement     getCpEtablissement()                Returns the current record's "CpEtablissement" value
 * @method CpContactStatut     getCpContactStatut()                Returns the current record's "CpContactStatut" value
 * @method Doctrine_Collection getCpActionCtc()                    Returns the current record's "CpActionCtc" collection
 * @method Doctrine_Collection getCpActionEtb()                    Returns the current record's "CpActionEtb" collection
 * @method CpContact           setCpContactId()                    Sets the current record's "cp_contact_id" value
 * @method CpContact           setCpContactNom()                   Sets the current record's "cp_contact_nom" value
 * @method CpContact           setCpContactPrenom()                Sets the current record's "cp_contact_prenom" value
 * @method CpContact           setCpContactTel()                   Sets the current record's "cp_contact_tel" value
 * @method CpContact           setCpContactTelAutre()              Sets the current record's "cp_contact_tel_autre" value
 * @method CpContact           setCpContactMail()                  Sets the current record's "cp_contact_mail" value
 * @method CpContact           setCpContactMailAutre()             Sets the current record's "cp_contact_mail_autre" value
 * @method CpContact           setCpContactFonction()              Sets the current record's "cp_contact_fonction" value
 * @method CpContact           setCpContactCommentaire()           Sets the current record's "cp_contact_commentaire" value
 * @method CpContact           setCpContactContactPrincipal()      Sets the current record's "cp_contact_contact_principal" value
 * @method CpContact           setCpContactDateCreation()          Sets the current record's "cp_contact_date_creation" value
 * @method CpContact           setCpContactDateModification()      Sets the current record's "cp_contact_date_modification" value
 * @method CpContact           setCpContactCpEtablissementId()     Sets the current record's "cp_contact_cp_etablissement_id" value
 * @method CpContact           setCpContactStatutId()              Sets the current record's "cp_contact_statut_id" value
 * @method CpContact           setCpEtablissement()                Sets the current record's "CpEtablissement" value
 * @method CpContact           setCpContactStatut()                Sets the current record's "CpContactStatut" value
 * @method CpContact           setCpActionCtc()                    Sets the current record's "CpActionCtc" collection
 * @method CpContact           setCpActionEtb()                    Sets the current record's "CpActionEtb" collection
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCpContact extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cp_contact');
        $this->hasColumn('cp_contact_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('cp_contact_nom', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('cp_contact_prenom', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('cp_contact_tel', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('cp_contact_tel_autre', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('cp_contact_mail', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('cp_contact_mail_autre', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('cp_contact_fonction', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('cp_contact_commentaire', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('cp_contact_contact_principal', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('cp_contact_date_creation', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('cp_contact_date_modification', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('cp_contact_cp_etablissement_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('cp_contact_statut_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'default' => 0,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('CpEtablissement', array(
             'local' => 'cp_contact_cp_etablissement_id',
             'foreign' => 'cp_etablissement_id'));

        $this->hasOne('CpContactStatut', array(
             'local' => 'cp_contact_statut_id',
             'foreign' => 'cp_contact_statut_id'));

        $this->hasMany('CpActionCtc', array(
             'local' => 'cp_contact_id',
             'foreign' => 'cp_action_ctc_cp_contact_id'));

        $this->hasMany('CpActionEtb', array(
             'local' => 'cp_contact_id',
             'foreign' => 'cp_action_etb_cp_contact_id'));
    }
}