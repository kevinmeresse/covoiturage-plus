<?php

/**
 * LivreOr form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LivreOrFrontForm extends BaseLivreOrForm {

    public function configure() {
        //désactiver certains champs
        unset(
                $this['id_site_client'], $this['date_creation'], $this['cle'], $this['etat']
        );

        //adaptation de widget

        

        $this->setDefaults(array('prenom' => 'Prénom', 'nom' => 'Nom', 'message' => 'Votre message', 'mail' => 'Email'));
        $this->validatorSchema['mail'] = new sfValidatorEmail();
        $this->validatorSchema['mail']->setOption('required', true);
        $this->validatorSchema['mail']->setMessages(array ('required' => 'Champ obligatoire' ,'invalid'=>'Vérifiez l\'adresse mail'));
        
        $this->validatorSchema['prenom'] = new sfValidatorString();
        $this->validatorSchema['prenom']->setOption('required', true);
        $this->validatorSchema['prenom']->setMessages(array ('required' => 'Champ obligatoire','max_length'=>'Maximum 255 caractères'));
        
        $this->validatorSchema['nom'] = new sfValidatorString();
        $this->validatorSchema['nom']->setOption('required', true);
        $this->validatorSchema['nom']->setMessages(array ('required' => 'Champ obligatoire','max_length'=>'Maximum 255 caractères'));
        
        $this->validatorSchema['message'] = new sfValidatorString();
        $this->validatorSchema['message']->setOption('required', true);
        $this->validatorSchema['message']->setMessages(array ('required' => 'Champ obligatoire'));
        
    }

}
