<?php

/**
 * CpContact form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpContactForm extends BaseCpContactForm
{
  public function configure()
  {
        $this->widgetSchema['cp_contact_date_creation'] = new sfWidgetFormI18nDate(array('culture' => 'fr'));
        
        //contact pricipal
        $this->widgetSchema['cp_contact_contact_principal'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));
  }
}
