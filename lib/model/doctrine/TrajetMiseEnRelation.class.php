<?php

/**
 * TrajetMiseEnRelation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TrajetMiseEnRelation extends BaseTrajetMiseEnRelation
{
    public function __toString() {
        return $this->getEtat();
    }

    /*
     * récupération de l'identification du covoitureu demandeur
     */

    public function getDemandeurIdentite() {

        //récupération du covoitureur
        //$covoitureur = Doctrine_Core::getTable('Covoitureur')->find($this->getIdDemandeur());
        
        //return $covoitureur->getNom()." ".$covoitureur->getPrenom();

        if($covoitureur = Doctrine_Core::getTable('Covoitureur')->find($this->getIdDemandeur())){
            return $covoitureur->getNom()." ".$covoitureur->getPrenom();
        }else{
            return "";
        }
    }
    
    /*
     * récupération de l'identification du covoitureu créateur
     */

    public function getCreateurIdentite() {

        //récupération du covoitureur
        if($covoitureur = Doctrine_Core::getTable('Covoitureur')->find($this->getIdTrajetCreateur())){
            return $covoitureur->getNom()." ".$covoitureur->getPrenom();
        }else{
            return "";
        }
/*
        if($covoitureur->getNom() == '' || $covoitureur->getPrenom() == ''){
            return "";
        } else {
            return $covoitureur->getNom()." ".$covoitureur->getPrenom();
        }
 *
 */
    }
    
    public function getDemandeurIdentiteMail() {

        //récupération du covoitureur

        if($covoitureur = Doctrine_Core::getTable('Covoitureur')->find($this->getIdDemandeur())){
            return $covoitureur->getNom()." ".$covoitureur->getPrenom()." (".$covoitureur->getMail().")";
        }else{
            return "";
        }
    }
    
    /*
     * récupération de l'identification du covoitureu créateur
     */

    public function getCreateurIdentiteMail() {

        //récupération du covoitureur
        
        if($covoitureur = Doctrine_Core::getTable('Covoitureur')->find($this->getIdTrajetCreateur())){
            return $covoitureur->getNom()." ".$covoitureur->getPrenom()." (".$covoitureur->getMail().")";
        }else{
            return "";
        }
        
        
    }
}
