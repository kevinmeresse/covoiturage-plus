<?php

/**
 * Lieu form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LieuFrontForm extends BaseLieuForm {

    public function configure() {
        unset(
                $this['id_lieu'], 
                $this['id_site_site'], 
                $this['id_pour_partenaire'], 
                $this['bascule_insee'], 
                $this['date_creation'], 
                $this['date_modification']
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

        //adaptation des dates au format francais
        //$this->widgetSchema['date_publication'] = new sfWidgetFormI18nDateTime(array('culture' => 'fr'));
        //$this->widgetSchema['date_depublication'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        //$this->widgetSchema['date_evenement'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        //$this->widgetSchema['date_modification'] = new sfWidgetFormI18nDateTime(array('culture' => 'fr'));
        
        $this->widgetSchema['date_publication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        
        $this->widgetSchema['date_depublication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        
        $this->widgetSchema['date_evenement'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        
        //nouvel widget pour l'autocompletion dde laville  => pour code _insee
        $this->widgetSchema['ville'] = new sfWidgetFormInputText();
        $this->validatorSchema['ville'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
    }

}
