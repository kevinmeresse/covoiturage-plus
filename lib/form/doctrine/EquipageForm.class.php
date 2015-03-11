<?php

/**
 * Equipage form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Christophe Vignaud, Emmanuel Bellamy
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EquipageForm extends BaseEquipageForm
{
  public function configure()
  {
      unset(
        $this['cle'],
              $this['id_site'],
              $this['id_createur'],
              $this['date_modification'],
              $this['id_trajet'],
              $this['date_creation'],
              $this['id_ville_origine'],
              $this['id_ville_destination']              
        );
      
       
      /*
       * modification des widgets du formulaire
       */
      //récupération des utilisateur lié au site_client uniquement
      $this->widgetSchema['id_utilisateur'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Covoitureur'),
                    'query' => Doctrine::getTable('Covoitureur')->getCovoitureurSite(),
                    'add_empty' => true,

                ));
      

      
      $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non visible', 1 => 'visible'),
                    'default' => 1,
                ));
      
      //récupération des trajets liés au site_client uniquement
      $this->widgetSchema['id_profil'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('Profile'),
                    'query' => Doctrine::getTable('sfGuardUserProfile')->getComboInitProfil(),
                    'add_empty' => true,
                ));
      
      //initialisation des widget particuliers aux champs ville       
        $this->widgetSchema['ville_origine'] = new sfWidgetFormInputText();
        $this->widgetSchema['ville_destination'] = new sfWidgetFormInputText();
        
        //widget particulier au champ trajet initiant l'equipage
        $this->widgetSchema['id_trajet_init'] = new sfWidgetFormInputHidden();

        //initialisation des validateurs
        $this->validatorSchema['ville_origine'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['ville_destination'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        
        $this->validatorSchema['id_trajet_init'] = new sfValidatorInteger(array('required' => false));

        $this->widgetSchema['commentaires'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
       
        
  }
}
