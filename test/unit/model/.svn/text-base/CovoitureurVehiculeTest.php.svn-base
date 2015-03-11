<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once dirname(__FILE__).'/../bootstrap/unit.php';
include(dirname(__FILE__) . '/../../bootstrap/Doctrine.php');

$t = new lime_test(3);
$t->pass('Ca fonctionne!!');

//$t = new lime_test(2);
$t->is(CovoitureurVehicule::getListeVehicule(0), 0);

//$t = new lime_test(3);
$t->is(CovoitureurVehicule::getListeVehicule(2), array(2000, 2001));

//$t->is_deeply(CovoitureurVehicule::getListeVehicule(2),  array (2000,2001));
?>
