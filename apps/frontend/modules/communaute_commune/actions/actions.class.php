<?php

/**
 * communaute_commune actions.
 *
 * @package    roulezmailn_v3
 * @subpackage communaute_commune
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class communaute_communeActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        //Permet l'acces aux helpers
        $this->getContext()->getConfiguration()->loadHelpers(array('Url'));

        $communaute_communes = Doctrine_Core::getTable('CommunauteCommune')
                ->createQuery('a')
                ->execute();

        $this->communaute_communes = $communaute_communes;
        //Gestion de GM Api
        $this->gMap = new GMap();
        foreach ($communaute_communes as $communaute_commune) {
            $gMapMarker = new GMapMarker($communaute_commune->getVilleFr()->getLatitude(), $communaute_commune->getVilleFr()->getLongitude());
            $info_window = new GMapInfoWindow("<div><b>" . $communaute_commune->getNom() . "</b><br /><a href=\"" . url_for('communaute_commune/view?id_communaute=' . $communaute_commune->getIdCommunaute()) . "\" >Voir la fiche</a></div>");
            $gMapMarker->addHtmlInfoWindow($info_window);
            $this->gMap->addMarker($gMapMarker);
        }

        $this->gMap->centerAndZoomOnMarkers();
    }

    //Affichage de la fiche communaute de commune

    public function executeView(sfWebRequest $request) {
        $this->forward404Unless($communaute_commune = Doctrine_Core::getTable('CommunauteCommune')->find(array($request->getParameter('id_communaute'))), sprintf('Object communaute_commune does not exist (%s).', $request->getParameter('id_communaute')));
        $this->communaute_commune = $communaute_commune;
        $this->villesLiees = $communaute_commune->getListeVilleLiee();
        //compteur du nombre de résultat retourné pour la  liste des villes liées
        $this->comptVillesLiees = count($this->villesLiees);
    }

}
