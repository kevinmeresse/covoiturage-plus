<?php

/**
 * ContenuActualiteRubrique form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContenuActualiteRubriqueForm extends BaseContenuActualiteRubriqueForm
{
  public function configure()    
  {
       //désactivation de certains champs
        unset(
                $this['date_creation'], 
                $this['date_modification'], 
                $this['cle'], 
                $this['id_createur'], 
                $this['id_site']
        );
        
        //rendre caché certains champs
        $this->widgetSchema['nombre_visualisation'] = new sfWidgetFormInputHidden();

        //modification des widgets du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'désactivée', 1 => 'activée'),
                    'default' => 1,
                ));
       
        
  }
}
