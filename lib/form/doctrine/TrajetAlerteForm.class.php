<?php

/**
 * TrajetAlerte form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrajetAlerteForm extends BaseTrajetAlerteForm {

    public function configure() {
        //suppression des champs inutilisés pour le formulaire 

        unset(
                $this['id_utilisateur'], $this['trajet_alerte_id_site'], $this['trajet_alerte_cle'], $this['trajet_alerte_etat'], $this['trajet_alerte_tel_utilisateur'], $this['trajet_alerte_id_type_trajet'], $this['trajet_alerte_id_depart']
        );

        $this->widgetSchema['mail_utilisateur'] = new sfWidgetFormInputText();
        $this->widgetSchema['mail_utilisateur']->setDefault('Entrez votre mail');

        //modification des widget du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => false,
                    'multiple' => false,
                    'choices' => array(0 => 'off', 1 => 'on'),
                ));
        
        
    }

}
