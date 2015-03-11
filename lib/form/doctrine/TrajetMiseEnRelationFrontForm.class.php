<?php

/**
 * TrajetMiseEnRelation form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrajetMiseEnRelationFrontForm extends BaseTrajetMiseEnRelationForm {

    public function configure() {
        unset(
                $this['id_site'], 
                $this['cle'], 
                $this['bascule'], 
                $this['date_modification'], 
                $this['date_creation'], 
                $this['etat']
        );

        //gestion du nombre de places demandées en fonction du nombre maximum de places proposé
        $choix_place = array();

        if ($this->getOption('nb_passager_max') > 1) {
            for ($i = 1; $i <= $this->getOption('nb_passager_max'); $i++) {
                $choix_place[$i] = $i;
            }
        } else {
            $choix_place[1] = 1;
        }

        $this->widgetSchema['nb_places_demandees'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => $choix_place,
                ), array('style' => 'width: 50px;'));
        $this->setDefault('nb_places_demandees', 1);
        $this->validatorSchema['nb_places_demandees'] = new sfValidatorInteger(array('required' => false));

        //modification des widget du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'en création',
                        1 => sfConfig::get('sf_desc_ind__mer_1'),
                        2 => sfConfig::get('sf_desc_ind__mer_2'),
                        4 => sfConfig::get('sf_desc_ind__mer_4'),
                        5 => sfConfig::get('sf_desc_ind__mer_5'),
                        6 => sfConfig::get('sf_desc_ind__mer_6'),
                        7 => sfConfig::get('sf_desc_ind__mer_7'),
                        ),
                ));


        $this->widgetSchema['message'] = new sfWidgetFormTextarea();
        $this->validatorSchema['message'] = new sfValidatorString(array('required' => false));

        $this->widgetSchema['id_trajet'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['id_trajet']->setDefault($this->getOption('id_trajet'));
        $this->validatorSchema['id_trajet'] = new sfValidatorInteger(array('required' => false));

        //id du covoitureur ayant cree le trajet
        $this->widgetSchema['id_trajet_createur'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['id_trajet_createur']->setDefault($this->getOption('id_trajet'));
        $this->validatorSchema['id_trajet_createur'] = new sfValidatorInteger(array('required' => false));

        //id du covoitureur faisant la demande
        $this->widgetSchema['id_demandeur'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['id_demandeur']->setDefault($this->getOption('id_trajet'));
        $this->validatorSchema['id_demandeur'] = new sfValidatorInteger(array('required' => false));
        
        //indicateur de createur de trajet ne souhaitant pas etre mis 
        //  en relation directemrnt => le mail est adresse à Covoiturage +
        $this->widgetSchema['ind_ss_contact'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['ind_ss_contact']->setDefault($this->getOption('ind_ss_contact'));
        $this->validatorSchema['ind_ss_contact'] = new sfValidatorInteger(array('required' => false));
    }

}
