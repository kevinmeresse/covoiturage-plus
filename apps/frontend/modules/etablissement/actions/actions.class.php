<?php

/**
 * etablissement actions.
 *
 * @package    roulezmailn_v3
 * @subpackage etablissement
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class etablissementActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        //Permet l'acces aux helpers
        $this->getContext()->getConfiguration()->loadHelpers(array('Url'));

        
        $cp_etablissements = Doctrine_Query::create()
                ->from('CpEtablissement')
                ->where('cp_etablissement_cp_etablissement_statut_id = 3')
                ->andWhere('cp_etablissement_ville_id IS NOT NULL')
                ->execute();
        
        $this->cp_etablissements = $cp_etablissements;
        //Gestion de GM Api
        $this->gMap = new GMap();
        foreach ($cp_etablissements as $cp_etablissement) {
            $gMapMarker = new GMapMarker($cp_etablissement->getVilleFr()->getLatitude(), $cp_etablissement->getVilleFr()->getLongitude());
            $info_window = new GMapInfoWindow("<div><b>" . $cp_etablissement->getCpEtablissementEtablissementNom() . "</b><br /><a href=\"" . url_for('etablissement/view?cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId()) . "\" >Voir la fiche</a></div>");
            $gMapMarker->addHtmlInfoWindow($info_window);
            $this->gMap->addMarker($gMapMarker);
        }

        $this->gMap->centerAndZoomOnMarkers();

    }

    //Affichage de la fiche établissement
    public function executeView(sfWebRequest $request) {
        $this->forward404Unless($cp_etablissement = Doctrine_Core::getTable('CpEtablissement')->find(array($request->getParameter('cp_etablissement_id'))), sprintf('Object cp_etablissement does not exist (%s).', $request->getParameter('cp_etablissement_id')));
        $this->form = new CpEtablissementForm($cp_etablissement);
        $this->cp_etablissement = $cp_etablissement;
        $this->etablissementsLies = $cp_etablissement->getListeEtablissementLie();
        //compteur du nombre de résultat retourné pour la  liste des villes liées
        $this->comptEtablissementsLies = count($this->etablissementsLies);
    }

}
