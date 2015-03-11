<?php

/**
 * Covoitureur form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurMdpModifForm extends BaseCovoitureurForm {

    public function configure() {

        $this->useFields(array('mot_de_passe'));

        $this->widgetSchema['mot_de_passe'] = new sfWidgetFormInputText();
        $this->widgetSchema['mot_de_passe']->setLabel('Saisissez votre mot de passe actuel');
        $this->validatorSchema['mot_de_passe'] = new sfValidatorString(array('required' => 'Le champ mot de passe est obligatoire.'), array('invalid' => 'vous devez saisir votre mail'));

        $this->widgetSchema['mot_de_passe_new'] = new sfWidgetFormInputText();
        $this->widgetSchema['mot_de_passe_new']->setLabel('Saisissez votre nouveau mot de passe ');
        $this->validatorSchema['mot_de_passe_new'] = new sfValidatorString(array('required' => 'Le champ mot de passe est obligatoire.'), array('invalid' => 'vous devez saisir votre mail'));

        $this->widgetSchema['valid_mot_de_passe_new'] = new sfWidgetFormInputText();
        $this->widgetSchema['valid_mot_de_passe_new']->setLabel('Re-saisissez votre nouveau mot de passe ');
        $this->validatorSchema['valid_mot_de_passe_new'] = new sfValidatorString(array('required' => 'Le champ mot de passe est obligatoire.'), array('invalid' => 'vous devez saisir votre mail'));

        $this->validatorSchema->setPostValidator(
                new sfValidatorSchemaCompare('mail', sfValidatorSchemaCompare::EQUAL, 'valid_mail ',
                        array('throw_global_error' => true),
                        array('invalid' => 'Les deux saisies de mail doivent être identiques)')
                )
        );

        //gestion de la postvalidation pour vérification que le mail existe bien en base        
        $this->validatorSchema->setPostValidator(
                new sfValidatorAnd(array(
                    new sfValidatorCallback(
                            array(
                                'callback' => array($this, 'checkMdp'),
                                'arguments' => array('isNew' => $this->isNew, 'id_utilisateur' => $this->getObject()->getIdUtilisateur()),
                            )
                    ),
                    new sfValidatorSchemaCompare('mot_de_passe_new', sfValidatorSchemaCompare::EQUAL, 'valid_mot_de_passe_new',
                            array('throw_global_error' => true),
                            array('invalid' => 'Les deux saisies de nouveau mot de passe doivent être identiques')
                    )
                ))
        );

        $this->widgetSchema->setNameFormat('covoitureurmdp[%s]');
    }

    //test de vérification du mot de passe 
    // si le formulaire est en creation (nouveau covoitureur)
    //  et si le champ ss_mail n'est pas activé

    public function checkMdp($validator, $values, $arguments) {
        $errors = array();


        if ($values['mot_de_passe'] != '') {
            //$exit_covoit = Doctrine_Core::getTable('Covoitureur')->findByMail($values['mail']);
            $exit_covoit = Doctrine_Core::getTable('Covoitureur')->getCovoitureurProfilVerifMdp($values['mot_de_passe'], $arguments['id_utilisateur']);
            $text_erreur = 'NOK';
            if ($exit_covoit == 0) {
                $error = new sfValidatorError($validator, 'Vous vous êtes trompé dans la saisie du mot de passe actuel.');
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
