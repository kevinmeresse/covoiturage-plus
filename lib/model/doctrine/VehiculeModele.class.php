<?php

/**
 * VehiculeModele
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class VehiculeModele extends BaseVehiculeModele
{
    public function __toString()
    {
        /* retourne espace en cas  de Id null */
        if($this->getIdModele() == 0)
        {
            return " ";
        } else
        {
            return $this->getNomModele();
        }

    }
    
    
}
