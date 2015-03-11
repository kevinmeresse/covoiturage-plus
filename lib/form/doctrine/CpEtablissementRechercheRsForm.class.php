<?php

/**
 * CpEtablissement form.
 *
 * @package    roulezmailn_v3
 * @subpackage form
 * @author     RoulezMalin
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CpEtablissementRechercheRsForm extends BaseCpEtablissementForm
{
  public function configure()
  {
    
      //suppression des champs inutilisés pour le formulaire de recherche
      unset(
        $this['cp_etablissement_id'],
        //$this['cp_etablissement_raison_social'],
        $this['cp_etablissement_denomination'],
        $this['cp_etablissement_enseigne'],
        $this['cp_etablissement_adresse1'],
        $this['cp_etablissement_adresse2'],
        $this['cp_etablissement_code_postal'],
        $this['cp_etablissement_nb_salarie'],
        $this['cp_etablissement_ville_id'],
        $this['cp_etablissement_zone'],
        $this['cp_etablissement_statut'],
        $this['cp_etablissement_commentaire'],
        $this['cp_etablissement_etablissement_pere_id'],
        $this['cp_etablissement_date_creation'],
        $this['cp_etablissement_date_modification'],
        $this['cp_etablissement_zone_id']
        //$this['cp_etablissement_cp_etablissement_statut_id']
      );
      

      
       $this->widgetSchema->setNameFormat('CpEtablissementRechercheRs[%s]');
  }
}
