<?php

/**
 * GroupeStat form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GroupeStatForm extends BaseGroupeStatForm
{
  public function configure()
  {
      unset(
                $this['id_site'],
                $this['date_creation'],
                $this['date_modification'],
                $this['parametres']
        );

      $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'non visible', 1 => 'visible'),
          'default' => 1,
                ));


      //widgets spécifiques pour le groupement de ville
        $this->widgetSchema['ville'] = new sfWidgetFormInputText();
        $this->validatorSchema['ville'] = new sfValidatorString(array('max_length' => 255, 'required' => false));

        //widget servant à la serialisation des villes (leur id)
        $this->widgetSchema['tab_param'] = new sfWidgetFormInputText();
        $this->validatorSchema['tab_param'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
  }
}
