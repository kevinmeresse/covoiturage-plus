<?php

/**
 * EquipageCovoitureur form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StatistiqueTriForm extends BaseForm {

    public function configure() {
        $this->widgetSchema['date_debut'] = new sfWidgetFormI18nDate(array(
                    //'format' => '%month%/%year%',
                    'culture' => 'fr'
                ));

        $this->widgetSchema['date_debut']->setLabel('Date début');
        $this->validatorSchema['date_debut'] = new sfValidatorDate(array('required' => false));


        $this->widgetSchema['date_fin'] = new sfWidgetFormI18nDate(array(
                    //'format' => '%month%/%year%',
                    'culture' => 'fr',
                    'default' => date("Y-m-d")
                ));

        $this->widgetSchema['date_fin']->setLabel('Date fin');
        $this->validatorSchema['date_fin'] = new sfValidatorDate(array('required' => false));

        //validation que la date de fin est bien supérieure à la date de début
        $this->validatorSchema->setPostValidator(
                new sfValidatorSchemaCompare('date_debut', sfValidatorSchemaCompare::LESS_THAN_EQUAL, 'date_fin',
                        array('throw_global_error' => true),
                        array('invalid' => 'La date de départ ("%left_field%") doit etre antérieure à la date d\'arrivée ("%right_field%")')
                )
        );
        
        //tri par établissement/société
        $this->widgetSchema['etablissement'] = new sfWidgetFormInput();
        $this->widgetSchema['etablissement']->setLabel('établissement/société');
        $this->validatorSchema['etablissement'] = new sfValidatorString(array('required' => false));

        //tri sur les  groupes
        $this->widgetSchema['groupe_stat'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => 'GroupeStat',
                    'query' => Doctrine::getTable('GroupeStat')->getGroupeStatSite(),
                    'add_empty' => true,
                ));
        $this->widgetSchema['groupe_stat']->setLabel('Sélectionner un groupe');
        $this->validatorSchema['groupe_stat'] = new sfValidatorDoctrineChoice(array('model' => 'GroupeStat', 'required' => false));

        //tri sur les communauté de commune
        $this->widgetSchema['communaute_commune'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => 'CommunauteCommune',
                    'query' => Doctrine::getTable('CommunauteCommune')->getCCSite(),
                    'add_empty' => true,
                ));
        $this->widgetSchema['communaute_commune']->setLabel('Sélectionner une CC');
        $this->validatorSchema['communaute_commune'] = new sfValidatorDoctrineChoice(array('model' => 'CommunauteCommune', 'required' => false));
        

        $this->widgetSchema->setNameFormat('statistiquetri[%s]');
    }

}
