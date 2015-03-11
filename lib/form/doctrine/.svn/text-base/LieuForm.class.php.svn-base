<?php

/**
 * Lieu form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LieuForm extends BaseLieuForm {

    public function configure() {
        unset(
                $this['id_lieu'], 
                $this['id_site_site'], 
                $this['id_pour_partenaire'], 
                $this['bascule_insee'], 
                $this['date_creation'], 
                $this['date_evenement'], 
                $this['date_modification'],
                $this['date_depublication']
        );
        
        $this->widgetSchema['visible_dans_liste'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 =>'non', 1 => 'oui'),
                ));

        $this->widgetSchema['id_site'] = new sfWidgetFormInputHidden();

        //tri du lieu_type en fonction de id_site_client
        $this->widgetSchema['id_lieu_type'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('LieuType'),
                    'query' => Doctrine::getTable('LieuType')->getLieuTypeSite(),
                    'add_empty' => true,
                ));
        
        $this->widgetSchema['id_lieu_type']->setDefault($this->getObject()->getIdLieuType());

        //adaptation des dates au format francais
        //$this->widgetSchema['date_publication'] = new sfWidgetFormI18nDateTime(array('culture' => 'fr'));
        //$this->widgetSchema['date_depublication'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        //$this->widgetSchema['date_evenement'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        //$this->widgetSchema['date_modification'] = new sfWidgetFormI18nDateTime(array('culture' => 'fr'));
        
        $this->widgetSchema['date_publication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr')),
                    'config' => array('firstDay' => '1')
                ));
        
        /*
        $this->widgetSchema['date_depublication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr')),
                    'config' => array('firstDay' => '1')
                ));
         * 
         */
        
        /*
        $this->widgetSchema['date_evenement'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
         * 
         */
        
        //nouvel widget pour l'autocompletion de la ville  => pour code _insee
        $this->widgetSchema['ville'] = new sfWidgetFormInputText();
        $this->validatorSchema['ville'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->widgetSchema['code_postal'] = new sfWidgetFormInputText();
        $this->validatorSchema['code_postal'] = new sfValidatorString(array('max_length' => 5, 'required' => false));
        $this->validatorSchema['adresse'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['latitude'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        $this->validatorSchema['longitude'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        
        $this->widgetSchema['longitude'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['latitude'] = new sfWidgetFormInputHidden();
        
        
        //gestion de la postvalidation avec plusieurs postvalidator        
        $this->validatorSchema->setPostValidator(
                

                    new sfValidatorCallback(
                            array(
                                'callback' => array($this, 'checkRequiredFields'),
                                'arguments' => array('isNew' => $this->isNew),
                            )
                    )
                
        );
    }
    
    
    //test de la présence du ville et adresse ou latitude et longitude 
    // si le formulaire est en creation (nouveau covoitureur)


    public function checkRequiredFields($validator, $values, $arguments) {
        $errors = array();

        //vérification des eélément
        if (($values['ville'] != '' ) || ($values['latitude'] != '' && $values['longitude'] != '')) {
            /*
            if ($values['mail'] != '') {
                //$exit_covoit = Doctrine_Core::getTable('Covoitureur')->findByMail($values['mail']);
                $exit_covoit = Doctrine_Core::getTable('Covoitureur')->getCovoitureurProfilVerifMail($values['mail'], $arguments['id_utilisateur']);
                $text_erreur = 'NOK';
                if ($exit_covoit != 0) {
                    $error = new sfValidatorError($validator, 'Ce mail existe deja en base');
                    $errors['mail'] = $error;
                }
                if (isset($arguments['isNew']) && $arguments['isNew'] != null) {
                    if ($values['valid_mail'] != $values['mail']) {
                        $error = new sfValidatorError($validator, 'Les deux saisies de mail doivent etre identiques');
                        $errors['valid_mail'] = $error;
                    }
                }
              }
                */
        
                //$error = new sfValidatorError($validator, 'Ce mail existe deja en base'.$arguments['id_utilisateur']."-".$exit_covoit."mail : ".$values['mail']." ".$values['ss_mail']);
                //$errors['mail'] = $error;
            
        }else{
            $error = new sfValidatorError($validator, 'Il faut saisir  la ville et l\'adresse ');
            $errors['ville'] = $error;
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
