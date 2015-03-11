<?php

/**
 * TrajetAlerte form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TrajetAlerteListForm extends BaseTrajetAlerteForm {

    public function configure() {
        //suppression des champs inutilisés pour le formulaire 
        
        unset(
                $this['id_trajet_alerte'] ,
                $this['id_site'] ,
                $this['cle'] ,
                $this['etat'] ,
                $this['id_utilisateur'] ,
                $this['tel_utilisateur'] ,
                $this['id_type_trajet'] ,
                $this['id_depart'] ,
                $this['id_depart2'] ,
                $this['id_depart_pays'] ,
                $this['depart_type'] ,
                $this['depart_autre_lieu'] ,
                $this['id_destination' ] ,
                $this['id_destination2'] ,
                $this['id_destination_pays'] ,
                $this['destination_type'] ,
                $this['destination_autre_lieu'] ,
                $this['date_creation'] ,
                $this['bascule']
        );
        
        $this->widgetSchema['mail_utilisateur'] = new sfWidgetFormInputText();
        $this->widgetSchema['mail_utilisateur']->setAttribute('id', 'creation-alerte');
        
        
        
        //initialisation des widget particuliers aux champs etablissement (en autocompletion)-
        $this->widgetSchema['etablissement'] = new sfWidgetFormInputText();
        $this->validatorSchema['etablissement'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        
        
        
    }

}
