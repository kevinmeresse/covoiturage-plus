<?php

/**
 * Evenement form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EvenementForm extends BaseEvenementForm
{
  public function configure()
  {
      //désactivation de certains champs
        unset(
                $this['date_creation'], 
                $this['date_modification'],
                $this['id_site'],
                $this['id_commune']
        );



        //modification des widgets du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'désactivé', 1 => 'activé'),
                    'default' => 1,
                ));




        //gestion du format des dates
        $this->widgetSchema['date_publication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));

        $this->widgetSchema['date_depublication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr')),
                    'config' => array('firstDay' => '1'),
                    'image' => '/images/calendar.png',
                ));
        
        //initialisation des widget particuliers aux champs ville       
        $this->widgetSchema['ville'] = new sfWidgetFormInputText();

        //initialisation des validateurs
        $this->validatorSchema['ville'] = new sfValidatorString(array('max_length' => 255, 'required' => true));
        
  }
}
