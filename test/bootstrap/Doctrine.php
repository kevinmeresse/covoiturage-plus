<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include(dirname(__FILE__).'/unit.php');

$configuration =
    ProjectConfiguration::getApplicationConfiguration('frontend', 'test', true);

new sfDatabaseManager($configuration);
?>
