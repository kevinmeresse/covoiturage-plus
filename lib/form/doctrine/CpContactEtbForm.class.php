<?php

/**
 * CpActionEtb form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpContactEtbForm extends BaseCpContactForm
{
  public function configure()
  {
      /*
       * gestion de l'étblissement passé en paramètre
       */
      $this->widgetSchema['cp_contact_cp_etablissement_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['cp_contact_date_creation'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['cp_contact_date_modification'] = new sfWidgetFormInputHidden();
      
      //contact pricipal
        $this->widgetSchema['cp_contact_contact_principal'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));
        $this->widgetSchema['cp_contact_commentaire'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
  }
}
