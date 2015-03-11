<?php

/**
 * CpActionCv form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpActionCvTrajetForm extends BaseCpActionCvForm
{
  public function configure()
  {
       //suppression des champs inutilisés pour le formulaire 
        unset(
                 
                $this['cp_action_cv_date_creation'], 
                $this['cp_action_cv_date_modification'],
                $this['cp_action_cv_detail'], 
                $this['cp_action_cv_date_echeance'],
                //$this['cp_action_cv_covoitureur_id'], 
                $this['cp_action_cv_user_id']
 
            );
        
        $this->widgetSchema['cp_action_cv_covoitureur_id']  = new sfWidgetFormInputHidden(); 
        $this->widgetSchema['cp_action_cv_trajet_id']  = new sfWidgetFormInputHidden();

        
        //gestion du composant statut avec gestion de l'ordre
      $this->widgetSchema['cp_type_action_statut_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => 'CpTypeActionStatut',
                    'query' => Doctrine::getTable('CpTypeActionStatut')->getStatutParOrdre(),
                    'add_empty' => false,
                ));
      
        
        //gestion du composant action en fonction du statut avec gestion de l'ordre

      if($this->getOption('id_statut') != null){
          $id_statut = $this->getOption('id_statut') ;
          $this->widgetSchema['cp_type_action_statut_id']->setDefault($this->getOption('id_statut'));
      }else{
          $id_statut = 1 ;
      }
      
        $this->widgetSchema['cp_action_cv_cp_type_action_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('CpTypeAction'),
                    'query' => Doctrine::getTable('CpTypeAction')->getActionParStatutParOrdre(null,$id_statut,1),
                    'add_empty' => false,
                ));
        if($this->getOption('last_action') != 0){
            $this->widgetSchema['cp_action_cv_cp_type_action_id']->setDefault($this->getOption('last_action'));
        }

        
        //valeur de champ permettant de retourner sur la page équipage
        $this->widgetSchema['id_equipage']  = new sfWidgetFormInputHidden(); 
        $this->widgetSchema['id_equipage']->setDefault($this->getOption('id_equipage'));
        
        //valeur du staut initial du trajet
        $this->widgetSchema['id_statut_init']  = new sfWidgetFormInputHidden(); 
        $this->widgetSchema['id_statut_init']->setDefault($this->getOption('id_statut'));

  }
}
