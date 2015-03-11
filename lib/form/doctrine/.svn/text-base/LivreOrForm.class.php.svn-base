<?php

/**
 * LivreOr form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LivreOrForm extends BaseLivreOrForm {

    public function configure() {
        //désactiver certains champs
        unset(
                $this['id_site_client'], 
                $this['date_creation'], 
                $this['cle']
        );

        //adaptation de widget
        //modification des widgets du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));
        $this->widgetSchema['etat']->setLabel('Validation');
        

        $this->setDefaults(array('prenom' => 'Prénom', 'nom' => 'Nom', 'message' => 'Votre message', 'mail' => 'Email', 'etat' => 'etat'));
        $this->validatorSchema['mail'] = new sfValidatorEmail();
        $this->validatorSchema['mail']->setOption('required', true);
        $this->validatorSchema['mail']->setMessages(array ('required' => 'Champ obligatoire' ,'invalid'=>'Vérifiez l\'adresse mail'));
        
        $this->validatorSchema['prenom'] = new sfValidatorString();
        $this->validatorSchema['prenom']->setOption('required', true);
        $this->validatorSchema['prenom']->setMessages(array ('required' => 'Champ obligatoire','max_length'=>'Maximum 255 caractères'));
        
        $this->validatorSchema['nom'] = new sfValidatorString();
        $this->validatorSchema['nom']->setOption('required', true);
        $this->validatorSchema['nom']->setMessages(array ('required' => 'Champ obligatoire','max_length'=>'Maximum 255 caractères'));
        
        $this->widgetSchema['message'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        $this->validatorSchema['message'] = new sfValidatorString();
        $this->validatorSchema['message']->setOption('required', true);
        $this->validatorSchema['message']->setMessages(array ('required' => 'Champ obligatoire'));
        
    }

}
