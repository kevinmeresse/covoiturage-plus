<?php

/**
 * cp_etablissement actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cp_etablissement
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cp_etablissementActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  /*
     * fonction d'autocomplétion pour les établissement
     */

    public function executeAutocomplete(sfWebRequest $request) {

        $cp_etablissement = new CpEtablissement();
        $this->results = $cp_etablissement->getEtablissementAutocomplete($request->getParameter('q'));
        $this->setLayout(false);
    }
    /*
     * fonction d'autocomplétion pour les établissement sur le formulaire covoitureur
     */

    public function executeAutocompleteCovoit(sfWebRequest $request) {

        $cp_etablissement = new CpEtablissement();
        $this->results = $cp_etablissement->getEtablissementAutocompleteCovoit($request->getParameter('q'));
        $this->setLayout(false);
        $this->setTemplate('autocomplete');
    }
}
