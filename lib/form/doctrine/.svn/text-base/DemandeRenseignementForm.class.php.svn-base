<?php

/**
 * DemandeRenseignement form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DemandeRenseignementForm extends BaseDemandeRenseignementForm
{
  public function configure()
  {
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
                    'choices' => array('0' => 'Donner un avis sur le site', '1' => 'Contacter l\'équipe de Covoiturage+', '2' => 'Créer un partenariat', '3' => 'Signaler un problème technique', '4' => 'Signaler un abus', '5' => 'Autre'),
                    
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
      $this->widgetSchema['demande_renseignement_texte']->setAttributes(array('id' => 'contact_demande'));
      
      
        $this->validatorSchema['demande_renseignement_nom'] = new sfValidatorString(array('required' => true));
        $this->validatorSchema['demande_renseignement_prenom'] = new sfValidatorString(array('required' => true));
        $this->validatorSchema['demande_renseignement_email'] = new sfValidatorEmail(array('required' => true));
        $this->validatorSchema['demande_renseignement_email']->setMessages(array ('required' => 'Champ obligatoire' ,'invalid'=>'Vérifiez l\'adresse mail'));
        $this->validatorSchema['demande_renseignement_texte'] = new sfValidatorString(array('required' => true));
  }
}
