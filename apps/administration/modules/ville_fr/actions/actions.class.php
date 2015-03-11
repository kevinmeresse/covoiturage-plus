<?php

/**
 * ville_fr actions.
 *
 * @package    roulezmailn_v3
 * @subpackage ville_fr
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ville_frActions extends sfActions
{
  /*
     * fonction d'autocomplétion pour la ville
     */

    public function executeAutocomplete(sfWebRequest $request) {

        $ville = new VilleFr;
        $this->results = $ville->getVilleAutocomplet($request->getParameter('q'));
        $this->setLayout(false);
    }
}
