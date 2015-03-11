<?php

/**
 * Covoitureur form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurMdpOublieForm extends BaseCovoitureurForm {

    public function configure() {

        $this->useFields(array('mail'));

        $this->widgetSchema['mail'] = new sfWidgetFormInputText();
        $this->widgetSchema['mail']->setLabel('Saisissez votre mail pour recevoir vos identifiants');
        $this->validatorSchema['mail'] = new sfValidatorEmail(array('required' => 'Le champ mail est obligatoire.'), array('invalid' => 'vous devez saisir votre mail'));
    
        
        //gestion de la postvalidation pour vérification que le mail existe bien en base        
        $this->validatorSchema->setPostValidator(
                new sfValidatorAnd(array(

                    new sfValidatorCallback(
                            array(
                                'callback' => array($this, 'checkMail'),
                                'arguments' => array('isNew' => $this->isNew),
                            )
                    )
                ))
        );
        
        $this->widgetSchema->setNameFormat('covoitureurmdpoublie[%s]');
    }
    
    //test de la présence du mail et du champ de verification de mail 
    // si le formulaire est en creation (nouveau covoitureur)
    //  et si le champ ss_mail n'est pas activé

    public function checkMail($validator, $values, $arguments) {
        $errors = array();


            if ($values['mail'] != '') {
                //$exit_covoit = Doctrine_Core::getTable('Covoitureur')->findByMail($values['mail']);
                $exit_covoit = Doctrine_Core::getTable('Covoitureur')->getCovoitureurProfilVerifMail($values['mail'], null);
                $text_erreur = 'NOK';
                if ($exit_covoit == 0) {
                    $error = new sfValidatorError($validator, 'Vous vous êtes trompé dans la saisie du mail');
                    $errors['mail'] = $error;
                }

            }
        
        /**
         * more depency checking here
         */
        /**
         * if there is errors
         */
        if (count($errors)) {
            throw new sfValidatorErrorSchema($validator, $errors);
        }
        //throw new sfValidatorError($validator, array('mail',$error));
        /**
         * dont forget to return values !
         */
        return $values;
    }

}
