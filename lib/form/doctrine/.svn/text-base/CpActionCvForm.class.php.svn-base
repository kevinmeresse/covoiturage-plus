<?php

/**
 * CpActionCv form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpActionCvForm extends BaseCpActionCvForm
{
  public function configure()
  {
       //suppression des champs inutilisés pour le formulaire 
        unset(
                 
                $this['cp_action_cv_date_creation'], 
                $this['cp_action_cv_date_modification']
            );

        //gestion du format des dates
        $this->widgetSchema['cp_action_cv_date_echeance'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));

        //affichage des utilisateurs du site uniquement
        $this->widgetSchema['cp_action_cv_user_id'] = new sfWidgetFormDoctrineChoice(array(
                'model' => 'sfGuardUser',
                'query' => sfGuardUserTable::getListUserSite(),
            ));
        
        //affichage des covoitureurs du site uniquement
        /*
        $this->widgetSchema['cp_action_cv_covoitureur_id'] = new sfWidgetFormDoctrineChoice(array(
                'model' => 'Covoitureur',
                'query' => CovoitureurTable::getCovoitureurSite(),
            ));
         * 
         */
        
        //affichage des type action non lies à un statut
        $this->widgetSchema['cp_action_cv_cp_type_action_id'] = new sfWidgetFormDoctrineChoice(array(
                'model' => 'CpTypeAction',
                //'query' => CpTypeAction::getListeNonLieeStatut()
                'query' => Doctrine::getTable('CpTypeAction')->getListeNonLieeStatut()
            ));
        
        $this->widgetSchema['cp_action_cv_detail'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        
        $this->widgetSchema['cp_action_cv_covoitureur_id'] = new sfWidgetFormInputHidden();
  }
}
