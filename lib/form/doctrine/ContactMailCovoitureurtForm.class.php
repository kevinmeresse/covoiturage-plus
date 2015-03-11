<?php

/**
 * ContactMailCovoitureurt form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactMailCovoitureurtForm extends sfForm
{
  //public function configure()
    public function setup()
  {
      /*
      unset ($this['demande_renseignement_date_insert']);
      unset ($this['demande_renseignement_id_site_client']);
      unset ($this['demande_renseignement_fonction']);
      unset ($this['demande_renseignement_fax']);
      
      $this->widgetSchema['demande_renseignement_civilite'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array('Madame' => 'Madame', 'Mademoiselle' => 'Mademoiselle', 'Monsieur' => 'Monsieur'),
                    
                ),
              array('id' => 'contact_civilite')
              );
      
      $this->widgetSchema['demande_renseignement_type'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array('' => 'Donner un avis sur le site', '0' => 'Contacter notre équipe commerciale', '1' => 'Créer un partenariat', '2' => 'Signaler un problème technique','3'=>'Signaler un abus','4'=>'Signaler un abus','5'=>'Autre'),
                    
                ),
              array('id' => 'contact_sujet'));
      
      $this->widgetSchema['demande_renseignement_nom']->setAttributes(array('id' => 'contact_nom'));
      
      $this->widgetSchema['demande_renseignement_prenom']->setAttributes(array('id' => 'contact_prenom'));
      $this->widgetSchema['demande_renseignement_societe']->setAttributes(array('id' => 'contact_societe'));
      $this->widgetSchema['demande_renseignement_adresse']->setAttributes(array('id' => 'contact_nom'));
      $this->widgetSchema['demande_renseignement_cp']->setAttributes(array('id' => 'contact_cp'));
      $this->widgetSchema['demande_renseignement_ville']->setAttributes(array('id' => 'contact_ville'));
      $this->widgetSchema['demande_renseignement_telephone']->setAttributes(array('id' => 'contact_telephone'));
      $this->widgetSchema['demande_renseignement_email']->setAttributes(array('id' => 'contact_email'));
      $this->widgetSchema['contact_mail_covoitureur_texte']->setAttributes(array('id' => 'contact_demande'));
*/
      $this->widgetSchema['texte'] = new sfWidgetFormTextarea();
      //$this->validatorSchema['texte'] = new sfValidatorString(array('required'=> 'merci de saisir un message'));
      $this->validatorSchema['texte'] = new sfValidatorString(array('required'=> false));
      
      $this->widgetSchema['id_trajet'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['id_trajet']->setDefault($this->getOption('id_trajet'));
      //$this->setDefault('id_trajet', 1);
      $this->validatorSchema['id_trajet'] = new sfValidatorInteger(array('required'=> false));
      
      $this->widgetSchema['depart_ville'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['depart_ville'] = new sfValidatorString(array('required'=> false));
      
      $this->widgetSchema['destination_ville'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['destination_ville'] = new sfValidatorString(array('required'=> false));
      
      //gestion du nombre de places de mandées en fonction du nombre maximum de places proposé
      $choix_place = array();
      
      if($this->getOption('nb_passager_max') > 1){
          for($i=1; $i<=$this->getOption('nb_passager_max');$i++){
          $choix_place[$i] = $i;
      }
      }else{
          $choix_place[1] = 1;
      }      
      
      $this->widgetSchema['nb_place'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $choix_place,

                ));
        $this->setDefault('nb_place', 1);
        $this->validatorSchema['nb_place'] = new sfValidatorInteger(array('required'=> false));
      
      $this->widgetSchema->setNameFormat('contactmailcovoitureur[%s]');
  }
}
