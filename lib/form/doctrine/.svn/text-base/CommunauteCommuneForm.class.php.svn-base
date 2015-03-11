<?php

/**
 * CommunauteCommune form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommunauteCommuneForm extends BaseCommunauteCommuneForm {

    public function configure() {
        //suppression des champs inutilisés pour le formulaire 
        /*/
        unset(
                $this['id_ville_ref']
        );
         * *
         */

        $this->widgetSchema['id_ville_ref'] = new sfWidgetFormInputHidden();
        $this->validatorSchema['id_ville_ref'] = new sfValidatorInteger(array('required' => false));

        //nouveau widget pour la ville
        $this->widgetSchema['ville_ref'] = new sfWidgetFormInputText();
        
        $this->validatorSchema['ville_ref'] = new sfValidatorString(array('max_length' => 255));

        /*
        $this->widgetSchema['informations'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        $this->widgetSchema['contact'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        $this->widgetSchema['action'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
         * *
         */

        $this->widgetSchema['informations'] = new sfWidgetFormTextarea(array());
        $this->widgetSchema['contact'] = new sfWidgetFormTextarea(array());
        $this->widgetSchema['action'] = new sfWidgetFormTextarea(array());
        
    }

}
