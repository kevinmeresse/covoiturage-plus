<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once dirname(__FILE__).'/../bootstrap/unit.php';
include(dirname(__FILE__) . '/../../bootstrap/Doctrine.php');

$t = new lime_test(5, new lime_output_color());
$t->diag('splitCityAndPostalCode()');

$t->is(Util::splitCityAndPostalCode('BREST'), array('BREST', ''), 'BREST');
$t->is(Util::splitCityAndPostalCode('BREST 29200'), array('BREST 29200', ''), 'BREST 29200');
$t->is(Util::splitCityAndPostalCode('BREST (29200'), array('BREST', '29200'), 'BREST (29200');
$t->is(Util::splitCityAndPostalCode('BREST (29200)'), array('BREST', '29200'), 'BREST (29200)');
$t->is(Util::splitCityAndPostalCode('BREST ('), array('BREST', ''), 'BREST (');
?>
