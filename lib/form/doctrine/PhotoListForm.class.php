<?php

/**
 * Covoitureur form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotoListForm extends sfForm {

    public function configure() {
        
        
        //amènagement des widget
        //
        //gestion du champ sélection générale
        $this->widgetSchema['etat_general'] = new sfWidgetFormChoice(array(
                        'expanded' => true,
                        'multiple' => false,
                        'choices' => array( 1 => 'désactivée', 2 => 'activée'),
                        'default' => 2,
                    ));

        $this->widgetSchema['etat_general']->setLabel(' ');
        
        $this->validatorSchema['etat_general'] = new sfValidatorChoice(array('choices' => array(1,2)));
        
        
        
        
        
        $this->widgetSchema->setNameFormat('photo[%s]');
    }

}
