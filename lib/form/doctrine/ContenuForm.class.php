<?php

/**
 * Contenu form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContenuForm extends BaseContenuForm {

    public function configure() {
        //désactivation de certains champs
        unset(
                $this['date_creation'], $this['date_modification'],
                $this['date_depublication'],
                $this['cle'], $this['etat'], $this['id_createur'], $this['id_site'], $this['fr_meta_keywords'], $this['fr_contenu_html_col1'], $this['fr_contenu_html_col2'], $this['fr_contenu_html_intermediaire'], $this['fr_contenu_html_col1_intermediaire'], $this['fr_contenu_html_col2_intermediaire'], $this['fr_citation'], $this['en_citation'], $this['bandeau_haut'], $this['colonne_droite'], $this['en_titre'], $this['en_meta_description'], $this['en_meta_keywords'], $this['en_contenu_html'], $this['en_contenu_html_col1'], $this['en_contenu_html_col2'], $this['en_contenu_html_intermediaire'], $this['en_contenu_html_col1_intermediaire'], $this['en_contenu_html_col2_intermediaire'], $this['fr_nom_fichier'], $this['en_nom_fichier'], $this['is_txt_rubrique']
        );


        //rendre caché certains champs
        $this->widgetSchema['nombre_visualisation'] = new sfWidgetFormInputHidden();

        /*
          //modification des widgets du formulaire
          $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => array(0 => 'désactivé', 1 => 'activé'),
          'default' => 1,
          ));
         * 
         */

        $this->widgetSchema['visible'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'invisible', 1 => 'visible'),
                    'default' => 1,
                ));

        //gestion du champ id_rubrique en fonction du site
        $this->widgetSchema['id_rubrique_parente'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('ContenuRubrique'),
                    'query' => Doctrine::getTable('ContenuRubrique')->getRubriqueSite(),
                    'add_empty' => true,
                ));

        //gestion du format des dates
        $this->widgetSchema['date_publication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));

        /*
        $this->widgetSchema['date_depublication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr')),
                    'config' => array('firstDay' => '1'),
                    'image' => '/images/calendar.png',
                ));
        */

        //choix pour la position du menu
        //$choix = array('1', '2','3','4','5','6','7','8','9','10');
        $choix = array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10);
        $this->widgetSchema['priorite'] = new sfWidgetFormChoice(array(
                    'choices' => $choix,
                ));

        $this->validatorSchema['priorite'] = new sfValidatorChoice(array('choices' => $choix));

        //lien vers fichier 
        $this->widgetSchema['lien_url']->setLabel('Lien vers page existante');
    }

}
