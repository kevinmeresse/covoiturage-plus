<?php

/**
 * ContenuRubrique form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContenuRubriqueForm extends BaseContenuRubriqueForm
{
  public function configure()
  {
      //désactivation de certains champs
        unset(
                $this['date_creation'], 
                $this['date_modification'], 
                $this['id_administrateur'], 
                $this['id_rubrique_mere'], 
                $this['nom_repertoire_fr'], 
                $this['en_titre'], 
                $this['id_site']
        );
        
        //rendre caché certains champs
        $this->widgetSchema['nombre_affichage'] = new sfWidgetFormInputHidden();

        //modification des widgets du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'désactivé', 1 => 'activé'),
                    'default' => 1,
                ));
        
        //gestion du champ id_rubrique en fonction du site
        $this->widgetSchema['id_rubrique_mere'] = new sfWidgetFormDoctrineChoice(array(
                    'model' => $this->getRelatedModelName('ContenuRubrique'),
                    'query' => Doctrine::getTable('ContenuRubrique')->getRubriqueSite(),
                    'add_empty' => true,

                ));
        
        //forcage des validateurs
        $this->validatorSchema['nom_repertoire_fr'] = new sfValidatorString(array('max_length' => 255,'required' => false)) ;
       
        //choix pour la position du menu
        
        //récupération de la priorite max utilisé
        $q = Doctrine_Query::create()
        ->select('Max(cr.priorite) AS max_rubrique')
        ->from('ContenuRubrique cr')
        ->where('cr.id_site = ?', sfConfig::get('sf_id_site_client'));
   
        $contenurubrique = $q->fetchArray();

        $max_rubrique =  $contenurubrique[0]['max_rubrique'];

        
        //$choix = array('1', '2','3','4','5','6','7','8','9','10');
        $choix = array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10);
        $this->widgetSchema['priorite'] = new sfWidgetFormChoice(array(
                    'choices' => $choix,
                ));
        
        //positionnement par défaut sur la max + 1
        $max_rubrique = $max_rubrique + 1;
        //$this->widgetSchema['priorite']->setDefault('4');
        $this->setDefault('priorite', $max_rubrique);
        
        $this->validatorSchema['priorite'] = new sfValidatorChoice(array('choices' => $choix)) ;
        
        //lien vers fichier 
        $this->widgetSchema['lien_url']->setLabel('Lien vers page existante');
  }
}
