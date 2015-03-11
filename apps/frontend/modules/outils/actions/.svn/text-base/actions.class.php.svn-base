<?php

/**
 * outils actions.
 *
 * @package    roulezmailn_v3
 * @subpackage outils
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class outilsActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        //$this->forward('default', 'module');
    }

    public function executeEcocalculateur(sfWebRequest $request) {
        
    }
    
        public function executeFaq(sfWebRequest $request) {
        
    }
    
    public function executeSitemap(sfWebRequest $request) {
        
    }
    
    /**
     * List all locations bound to a specific city
     *
     * @param sfWebRequest $request A symfony request object (the action is retrieving a 'value' from the request)
     * @return array cityTab A JSON array of all the locations (pair key/value is location_id/location_name)
     * 
     * Example: Call the action with a 'value' parameter (GET) containing the name of the city, and eventually the postal code (format: "Paris (75001)")
     * 
     * @author Kevin Meresse
     */
    public function executeListLocationsFromCityName(sfWebRequest $request) {
        $cityName = $request->getParameter('value');
        $this->selectName = $request->getParameter('listToUpdateName');
        $this->selectId = $request->getParameter('listToUpdateId');
        
        $locations = Doctrine_Core::getTable('Lieu')->getLocationsFromCityName($cityName);
        
        $this->selectOptions = array();
        if (!is_null($locations)) {
            foreach ($locations as $location) {
                $this->selectOptions[$location['id_lieu']] = $location['libelle_lieu'].' ('.$location['type_lieu'].')';
            }
        }
        $this->setTemplate('listLocationsFromCityNameFor'.$request->getParameter('template'));
    }

}
