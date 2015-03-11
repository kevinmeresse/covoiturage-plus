<?php

/**
 * CpActionCtc form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpActionCtcForm extends BaseCpActionCtcForm
{
  public function configure()
  {
      //gestion du format des dates
        $this->widgetSchema['cp_action_ctc_date_echeance'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));

        //affichage des utilisateurs du site uniquement

        $this->widgetSchema['cp_action_ctc_user_id'] = new sfWidgetFormDoctrineChoice(array(
                'model' => 'sfGuardUser',
                'query' => sfGuardUserTable::getListUserSite(),
            ));
        
        
  }
}
