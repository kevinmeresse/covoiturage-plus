<?php

require_once dirname(__FILE__) . '/../lib/vehicule_modeleGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/vehicule_modeleGeneratorHelper.class.php';

/**
 * vehicule_modele actions.
 *
 * @package    roulezmailn_v3
 * @subpackage vehicule_modele
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vehicule_modeleActions extends autoVehicule_modeleActions {

    public function executeListModeleParMarque(sfWebRequest $request) {

        //passage de la marque du véhicule
        $this->idmarque = $request->getParameter('idmarque');

        //passage du nom et id du composant formulaire
        $this->idComposantForm = $request->getParameter('idComposantForm');
        $this->nomComposantForm = $request->getParameter('nomComposantForm');

        $this->setLayout(false);
    }

}
