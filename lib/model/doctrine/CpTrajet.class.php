<?php

/**
 * CpTrajet
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class CpTrajet extends BaseCpTrajet {
    /*
     * récupération des horaires min et max
     */

    public  function getHorairesPriseMinMax($jour = null) {

        $horaire_prise_min = '';
        $horaire_prise_max = '';


        switch (strtolower($jour)) {

            case "lundi":
                $horaire_prise_min = date("H:i", strtotime($this->getLundiPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getLundiPriseServiceMax()));

                break;
            case "mardi":
                $horaire_prise_min = date("H:i", strtotime($this->getMardiPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getMardiPriseServiceMax()));

                break;
            case "mercredi":
                $horaire_prise_min = date("H:i", strtotime($this->getMercrediPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getMercrediPriseServiceMax()));

                break;
            case "jeudi":
                $horaire_prise_min = date("H:i", strtotime($this->getJeudiPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getJeudiPriseServiceMax()));

                break;
            case "vendredi":
                $horaire_prise_min = date("H:i", strtotime($this->getVendrediPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getVendrediPriseServiceMax()));

                break;
            case "samedi":
                $horaire_prise_min = date("H:i", strtotime($this->getSamediPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getSamediPriseServiceMax()));

                break;
            case "dimanche":
                $horaire_prise_min = date("H:i", strtotime($this->getDimanchePriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getDimanchePriseServiceMax()));

                break;
        }
        
        $result_min = $horaire_prise_min." / ".$horaire_prise_max;

        return $result_min;
    }
    
    public  function getHorairesFinMinMax($jour = null, $minMax = null) {

        $horaire_fin_min = '';
        $horaire_fin_max = '';



        switch (strtolower($jour)) {

            case "lundi":

                $horaire_fin_min = date("H:i", strtotime($this->getLundiFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getLundiFinServiceMax()));
                break;
            case "mardi":

                $horaire_fin_min = date("H:i", strtotime($this->getMardiFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getMardiFinServiceMax()));
                break;
            case "mercredi":

                $horaire_fin_min = date("H:i", strtotime($this->getMercrediFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getMercrediFinServiceMax()));
                break;
            case "jeudi":

                $horaire_fin_min = date("H:i", strtotime($this->getJeudiFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getJeudiFinServiceMax()));
                break;
            case "vendredi":

                $horaire_fin_min = date("H:i", strtotime($this->getVendrediFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getVendrediFinServiceMax()));
                break;
            case "samedi":

                $horaire_fin_min = date("H:i", strtotime($this->getSamediFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getSamediFinServiceMax()));
                break;
            case "dimanche":

                $horaire_fin_min = date("H:i", strtotime($this->getDimancheFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getDimancheFinServiceMax()));
                break;
        }

        
        $result_min = $horaire_fin_min." / ".$horaire_fin_max;
        

        return $result_min;
    }
    
    
    
    
    /*
     * récupération des horaires min et max pour affichage formulaire
     */

    public  function getHorairesPriseMinMaxForm($jour = null, $minMax = null) {

        $horaire_prise_min = '';
        $horaire_prise_max = '';


        switch (strtolower($jour)) {

            case "lundi":
                $horaire_prise_min = date("H:i", strtotime($this->getLundiPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getLundiPriseServiceMax()));

                break;
            case "mardi":
                $horaire_prise_min = date("H:i", strtotime($this->getMardiPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getMardiPriseServiceMax()));

                break;
            case "mercredi":
                $horaire_prise_min = date("H:i", strtotime($this->getMercrediPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getMercrediPriseServiceMax()));

                break;
            case "jeudi":
                $horaire_prise_min = date("H:i", strtotime($this->getJeudiPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getJeudiPriseServiceMax()));

                break;
            case "vendredi":
                $horaire_prise_min = date("H:i", strtotime($this->getVendrediPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getVendrediPriseServiceMax()));

                break;
            case "samedi":
                $horaire_prise_min = date("H:i", strtotime($this->getSamediPriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getSamediPriseServiceMax()));

                break;
            case "dimanche":
                $horaire_prise_min = date("H:i", strtotime($this->getDimanchePriseServiceMin()));
                $horaire_prise_max = date("H:i", strtotime($this->getDimanchePriseServiceMax()));

                break;
        }
        
        if($minMax == 'min'){
            $result = $horaire_prise_min;
        }else{
            $result = $horaire_prise_max;
        }
        

        return $result;
    }
    
    public  function getHorairesFinMinMaxForm($jour = null, $minMax = null) {

        $horaire_fin_min = '';
        $horaire_fin_max = '';



        switch (strtolower($jour)) {

            case "lundi":

                $horaire_fin_min = date("H:i", strtotime($this->getLundiFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getLundiFinServiceMax()));
                break;
            case "mardi":

                $horaire_fin_min = date("H:i", strtotime($this->getMardiFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getMardiFinServiceMax()));
                break;
            case "mercredi":

                $horaire_fin_min = date("H:i", strtotime($this->getMercrediFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getMercrediFinServiceMax()));
                break;
            case "jeudi":

                $horaire_fin_min = date("H:i", strtotime($this->getJeudiFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getJeudiFinServiceMax()));
                break;
            case "vendredi":

                $horaire_fin_min = date("H:i", strtotime($this->getVendrediFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getVendrediFinServiceMax()));
                break;
            case "samedi":

                $horaire_fin_min = date("H:i", strtotime($this->getSamediFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getSamediFinServiceMax()));
                break;
            case "dimanche":

                $horaire_fin_min = date("H:i", strtotime($this->getDimancheFinServiceMin()));
                $horaire_fin_max = date("H:i", strtotime($this->getDimancheFinServiceMax()));
                break;
        }
        

        if($minMax == 'min'){
            $result = $horaire_fin_min;
        }else{
            $result = $horaire_fin_max;
        }
        

        return $result;
    }

}