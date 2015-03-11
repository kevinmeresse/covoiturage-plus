<?php

/**
 * ContenuActualite form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContenuActualiteForm extends BaseContenuActualiteForm {

    public function configure() {
        //désactivation de certains champs
        unset(
                $this['date_creation'], 
                $this['date_modification'], 
                $this['cle'], 
                $this['id_createur'], 
                $this['id_site'],
                $this['id_rubrique'],
                $this['date_debut_evenement'],
                $this['date_fin_evenement']
        );

        //modification des widgets du formulaire
        $this->widgetSchema['etat'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'désactivée', 1 => 'activée'),
                    'default' => 1,
                ));

        //etat indiquant si l'actualite peut etre visible en première page
        $this->widgetSchema['en_premiere_page'] = new sfWidgetFormChoice(array(
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array(0 => 'Non', 1 => 'Oui'),
                    'default' => 0,
                ));
        $this->widgetSchema['en_premiere_page']->setLabel('Visible en première page ?');

        //gestion du format des dates
        $this->widgetSchema['date_publication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        
        $this->widgetSchema['date_depublication'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        
        /*
        $this->widgetSchema['date_debut_evenement'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        
        $this->widgetSchema['date_fin_evenement'] = new sfWidgetFormJQueryDate(array(
                    'culture' => 'fr_FR',
                    'image' => '/images/calendar.png',
                    'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'fr_FR')),
                    'config' => array('firstDay' => '1')
                ));
        
         * 
         */
  
        //positionnement de la priorité (ordre d'affichage)
        //récupération de la priorite max utilisé
        $q = Doctrine_Query::create()
        ->select('Max(ca.position) AS max_position')
        ->from('ContenuActualite ca')
        ->where('ca.id_site = ?', sfConfig::get('sf_id_site_client'));
   
        $contenuactua = $q->fetchArray();

        $max_position =  $contenuactua[0]['max_position'];

        $choix = array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10);
        $this->widgetSchema['position'] = new sfWidgetFormChoice(array(
                    'choices' => $choix,
                ));
        
        //positionnement par défaut sur la max + 1
        $max_position = $max_position + 1;

        $this->setDefault('position', $max_position);
        
        $this->validatorSchema['position'] = new sfValidatorChoice(array('choices' => $choix));
        
        //desactivation de ckEditor sur les textarea
        $this->widgetSchema['fr_resume_html'] = new sfWidgetFormTextarea(array(), array('class' => 'no-editor'));
        
        


        //widget d'ajout de photo
        $this->widgetSchema['photo_resume'] = new sfWidgetFormInputFile();

        //champ desactivé en création
        if ($this->getObject()->isNew()) {
            $this->widgetSchema['photo_resume']->setDefault('');
            $this->widgetSchema['photo_resume']->setAttribute('disabled', 'disabled');
        }

        $this->validatorSchema['photo_resume'] = new sfValidatorFile(array('required' => false));
        $this->widgetSchema['photo_resume']->setLabel('Photo');

        //widget de demande de suppression de photo
        $this->widgetSchema['supp_photo'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => array(0 => 'Non', 1 => 'Oui'),
          'default' => 0,
          ));
        $this->widgetSchema['supp_photo']->setLabel('Suppresion de la photo?');

        $this->validatorSchema['supp_photo'] = new sfValidatorInteger();
        
        /*
          if($this->getObject()->getEtatPhoto() == 0){
          $this->widgetSchema['supp_photo'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => array(0 => 'Non', 1 => 'Oui'),
          'default' => 0,
          ));
          $this->widgetSchema['supp_photo']->setAttribute('disabled', 'disabled');
          }else{
          $this->widgetSchema['supp_photo'] = new sfWidgetFormChoice(array(
          'expanded' => true,
          'multiple' => false,
          'choices' => array(0 => 'Non', 1 => 'Oui'),
          'default' => 0,
          ));
          }
         * 
         
        if ($this->getObject()->getEtatPhoto() == 0) {
            $this->widgetSchema['supp_photo'] = new sfWidgetFormChoice(array(
                        'expanded' => true,
                        'multiple' => false,
                        'choices' => array(0 => 'Non'),
                        'default' => 0,
                    ));
        } else {
            $this->widgetSchema['supp_photo'] = new sfWidgetFormChoice(array(
                        'expanded' => true,
                        'multiple' => false,
                        'choices' => array(0 => 'Non', 1 => 'Oui'),
                        'default' => 0,
                    ));
        }

        $this->widgetSchema['supp_photo']->setLabel('Suppresion de la photo?');

        $this->validatorSchema['supp_photo'] = new sfValidatorInteger();
         * 
         */
    }

    /*
     * surcharge de la méthode save pour enregistrer l'image acyualite
     */

    public function save($con = null) {
//gestion des erreur
        $erreur = 0;

//un fichier photo est proposé en téléchargement
        if (!is_null($this->getValue('photo_resume'))) {
            $file = $this->getValue('photo_resume');

            $actualite = Doctrine_Core::getTable('ContenuActualite')->find(array($this->getValue('id_actualite')));
            
            //verification si une photo existe deja et suppression avant enregistrement de la nouvelle
            if($actualite->getPhotoResume() != ''){
                //suppression de la photo
                    if (!$actualite->deletePhotoActualite()) {
                        $erreur = 1;
                    }
            }
            
            $filename =  $actualite->setCheminPhotoActualite();
            $thumbfilename =  $actualite->setThumbnailPhotoActualite();

            $file->save($filename);
            //$outil = new Util();
            //$outil->thumbnailPhotoEtEnreg($this->getValue('photo_resume'), $thumbfilename);

            //$actualite->setPhotoExt(sfConfig::get('sf_extension_fichier_image'));
            //$actualite->setEtatPhoto('1');
            $actualite->save();
            //$this->setDefault('etat_photo ', '1');
        } else {//pas de fichier photo proposé en téléchargement

                //gestion de la suppression de la photo  et du thumbnail      
                if (($this->getValue('supp_photo')) == 1) {
                    $actualite = Doctrine_Core::getTable('ContenuActualite')->find(array($this->getValue('id_actualite')));

                    //suppression de la photo
                    if (!$actualite->deletePhotoActualite()) {
                        $erreur = 1;
                    }

                    //suppression du thumnail de la photo
                    /*
                    if (!$actualite->deleteThumnailPhotoActualite()) {
                        $erreur = 1;
                    }
                     * 
                     */

                    $actualite->setPhotoResume('');
                    $actualite->save();

            }else{
                
            }
        }

        return parent::save($con);
    }

}
