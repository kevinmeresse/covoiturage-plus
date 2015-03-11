<?php

/**
 * VilleFr form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VilleFrAddCcForm extends BaseVilleFrForm
{
  public function configure()
  {
      $this->useFields(array('nom_ville', 'id_communaute'));
      
      //$this->widgetSchema['id_communaute'] = new sfWidgetFormInputHidden();
     
  }
}
