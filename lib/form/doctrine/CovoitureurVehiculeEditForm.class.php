<?php

/**
 * CovoitureurVehicule form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CovoitureurVehiculeEditForm extends BaseCovoitureurVehiculeForm
{
  public function configure()
  {
      /*
      unset(
        $this['cle']
      );
       *
       * unset($this->validatorSchema['created_at']);
       * 
       */
/*
      unset(
        $this['id_utilisateur']
      );
 * 
 */

      //$this->widgetSchema->setNameFormat('covoitureurvehicule[%s]');

      $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
