<?php

/**
 * CpActionEtb form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpActionEtb1Form extends BaseCpActionEtbForm {

    public function configure() {
        /*
         * gestion de l'étblissement passé en paramètre
         */
        $this->widgetSchema['cp_action_etb_cp_etablissement_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['cp_action_etb_date_creation'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['cp_action_etb_date_modification'] = new sfWidgetFormInputHidden();

        //gestion du format des dates
        $this->widgetSchema['cp_action_etb_date_echeance'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));

        //affichage des utilisateurs du site uniquement
       /*
        $this->widgetSchema['cp_action_etb_user_id'] = new sfWidgetFormDoctrineChoice(array(
                'model' => 'sfGuardUserProfile',
                'query' => sfGuardUserProfileTable::getComboInitProfil(),
            ));
        * SELECT su.id , sp.id 
FROM `sf_guard_user` su
LEFT JOIN `sf_guard_user_profile` sp ON su.id = sp.id_user
        */
        $this->widgetSchema['cp_action_etb_user_id'] = new sfWidgetFormDoctrineChoice(array(
                'model' => 'sfGuardUser',
                'query' => sfGuardUserTable::getListUserSite(),
            ));
        /*
         *  $this->setWidgets(array(
            'folders' => new sfWidgetFormDoctrineChoice(array(
                'model' => 'FolderItem',
                'order_by' => array('name', 'asc'),
                'multiple' => true,
                'query' => FolderItemTable::getUserInstance($user),
            ))
        ));
         */
        
        //gestion des contacts liés à l'établissement
        $this->widgetSchema['cp_action_etb_cp_contact_id'] = new sfWidgetFormDoctrineChoice(array(
                'model' => 'CpContact',
                'query' => CpContactTable::getContactEtb($this->getObject()->getCpActionEtbCpEtablissementId()),
            ));
        
        $this->widgetSchema['cp_action_etb_detail'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        
        //affichage des type action non lies à un statut
        $this->widgetSchema['cp_action_etb_cp_type_action_id'] = new sfWidgetFormDoctrineChoice(array(
                'model' => 'CpTypeAction',
                //'query' => CpTypeAction::getListeNonLieeStatut()
                'query' => Doctrine::getTable('CpTypeAction')->getListeNonLieeStatut()
            ));
    }

}
