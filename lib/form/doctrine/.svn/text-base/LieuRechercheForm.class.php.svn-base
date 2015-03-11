<?php

/**
 * Lieu form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LieuRechercheForm extends BaseLieuForm {

    public function configure() {
        unset(
                $this['id_lieu'], 
                $this['id_site_site'], 
                $this['id_pour_partenaire'], 
                $this['bascule_insee'], 
                $this['date_creation'], 
                $this['date_evenement'], 
                $this['date_modification'],
                $this['date_depublication'],
                $this['date_publication'],
                $this['visible_dans_liste'],
                $this['id_site'],                
                $this['adresse'],
                $this['latitude'],
                $this['longitude'],  
                $this['libelle_lieu'],
                $this['code_insee']
        );


        //tri du lieu_type en fonction de id_site_client
        $this->widgetSchema['id_lieu_type'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('LieuType'),
                    'query' => Doctrine::getTable('LieuType')->getLieuTypeSite(),
                    'add_empty' => true,
                ));
        
        $this->widgetSchema['id_lieu_type']->setDefault($this->getObject()->getIdLieuType());


        //nouvel widget pour l'autocompletion de la ville  => pour code _insee
        $this->widgetSchema['ville'] = new sfWidgetFormInputText();
        $this->validatorSchema['ville'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
        
        
        $this->widgetSchema->setNameFormat('lieuRecherche[%s]');
        
    }


}
