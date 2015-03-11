<?php

/**
 * Covoitureur form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurRechercheNewForm extends BaseCovoitureurForm {

    public function configure() {

        $this->useFields(array(
            //'date_creation', 
            'ville',
            'rsa',
            'newsletter',
            'mail',
            'nom',
            'prenom'
            ));

        
        //amènagement des widget
        //nom et prénom
        $this->widgetSchema['nom'] = new sfWidgetFormInputText();
        $this->validatorSchema['nom'] =  new sfValidatorString(array('required' => false));
        
        $this->widgetSchema['prenom'] = new sfWidgetFormInputText();
        $this->validatorSchema['prenom'] =  new sfValidatorString(array('required' => false));
       
        
        //gestion du champ "bénéficiaire du RSA"
        $this->widgetSchema['rsa'] = new sfWidgetFormChoice(array(
                        'expanded' => true,
                        'multiple' => false,
                        'choices' => array(0 => 'Non', 1 => 'Oui', 2 => 'Indifférent'),
                        'default' => 2,
                    ));

        $this->widgetSchema['rsa']->setLabel('Bénéficiaire du RSA ?');
        
        $this->validatorSchema['rsa'] = new sfValidatorChoice(array('choices' => array(0,1,2), 'required' => false));
        
        
        //widget de Newsletter
        $this->widgetSchema['newsletter'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui', 2 => 'Indifférent'),
                    'default' => 2,
                ));
        $this->widgetSchema['newsletter']->setLabel('Inscrit à la newsletter?');
        
        $this->validatorSchema['newsletter'] = new sfValidatorChoice(array('choices' => array(0,1,2)));
        
        
        
        
        //widgets spécifiques pour la recherche de la date de création
        //$this->widgetSchema['date_debut'] = new sfWidgetFormI18nDate(array('culture' => 'fr_FR','month_format' => 'short_name','default'=> '01/01/2012'));
        $this->widgetSchema['date_debut'] = new sfWidgetFormI18nDate(array('culture' => 'fr_FR'));
        $this->validatorSchema['date_debut'] = new sfValidatorDate(array('required' => false));
        
        $this->widgetSchema['date_arret'] = new sfWidgetFormI18nDate(array('culture' => 'fr_FR'));
        //$this->widgetSchema['date_arret'] = new sfWidgetFormI18nDate(array('culture' => 'fr','month_format' => 'short_name','default'=> '01/01/2012'));
        $now = date("d-m-Y");
        $this->widgetSchema['date_arret']->setDefault($now);
        //$this->widgetSchema['date_fin']->setDefault('01/01/2012');
        $this->validatorSchema['date_arret'] = new sfValidatorDate(array('required' => false));
      /*
        $this->setDefaults(array(

            'date_fin' => '01/01/2012',
            ));
*/
        
        
        //widget pour la recherche sur trajet
        $this->widgetSchema['trajet'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui', 99 => 'Indifférent'),
                    //'default' => 0,
                ));
        $this->widgetSchema['trajet']->setLabel('a déposé un trajet ?');
        $this->widgetSchema['trajet']->setDefault('99');
        
        $this->validatorSchema['trajet'] = new sfValidatorChoice(array('choices' => array(0,1,99)));
        
        //widget pour la recherche sur équipage
        $this->widgetSchema['equipage'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui', 99 => 'Indifférent'),
                    'default' => 99,
                ));
        $this->widgetSchema['equipage']->setLabel('fait partie d\'un équipage ?');
        
        $this->validatorSchema['equipage'] = new sfValidatorChoice(array('choices' => array(0,1,99)));
        
        //initialisation des valeurs par défaut
        $this->setDefaults(array(
            'rsa' => 2,
            'newsletter' => 2
            ));
        
        
        $this->widgetSchema->setNameFormat('covoitureurrechercheNew[%s]');
    }

}
