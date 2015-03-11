<?php

/**
 * TrajetMiseEnRelation form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrajetMiseEnRelationRechercheForm extends BaseTrajetMiseEnRelationForm {

    public function configure() {
        unset(
                $this['id_site'], 
                $this['cle'], 
                $this['bascule'], 
                $this['date_modification'], 
                $this['date_creation'],
                $this['id_trajet'],
                $this['id_trajet_createur'],
                $this['id_demandeur'],
                $this['date_envoi'],
                $this['message'],
                $this['nb_places_demandees']
        );

        //modification des widget du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array('' => '',
                        0 => sfConfig::get('sf_desc_ind__mer_0'),
                        1 => sfConfig::get('sf_desc_ind__mer_1'),
                        2 => sfConfig::get('sf_desc_ind__mer_2'),
                        4 => sfConfig::get('sf_desc_ind__mer_4'),
                        5 => sfConfig::get('sf_desc_ind__mer_5'),
                        6 => sfConfig::get('sf_desc_ind__mer_6'),
                        7 => sfConfig::get('sf_desc_ind__mer_7'),
                        ),
            
                ));
        

    }

}
