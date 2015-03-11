<?php

/**
 * Covoitureur Identification form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurIdentificationForm extends BaseCovoitureurForm {

    public function configure() {

        //utilisatuion de certains champs      
        $this->useFields(array('mail', 'mot_de_passe'));
        
        $this->widgetSchema['mail'] = new sfWidgetFormInputText();
        $this->widgetSchema['mail']->setDefault('Entrez votre mail');
        
        $this->widgetSchema['mot_de_passe'] = new sfWidgetFormInputPassword();
        $this->widgetSchema['mot_de_passe']->setDefault('Mot de passe');
        $this->validatorSchema['mot_de_passe'] = new sfValidatorString(array('required' => true));

        $this->widgetSchema->setNameFormat('CovoitureurIdentification[%s]');
        
    }

    
}
