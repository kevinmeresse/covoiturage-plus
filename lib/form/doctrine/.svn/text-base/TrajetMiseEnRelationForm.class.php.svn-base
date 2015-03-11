<?php

/**
 * TrajetMiseEnRelation form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrajetMiseEnRelationForm extends BaseTrajetMiseEnRelationForm {

    public function configure() {
        unset(
                $this['id_site'], 
                $this['cle'], 
                $this['bascule'], 
                $this['date_modification'],
                $this['date_envoi'],
                $this['date_creation']
        );

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
        
        $this->widgetSchema['message'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        
        $this->widgetSchema['id_trajet_createur'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['id_demandeur'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['id_trajet'] = new sfWidgetFormInputHidden();
    }

}
