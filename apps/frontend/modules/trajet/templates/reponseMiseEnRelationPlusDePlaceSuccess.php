<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2>Demande de mise en relation</h2>
La demande de covoiturage suivante <u>n'a pas été validée</u> car il ne reste plus assez de place dans le véhicule :
<br>Départ : <?php echo $depart_ville ?>
<br>Arrivée : <?php echo $destination_ville ?>
<br>Nombre de place(s) demandée(s) : <?php echo $nb_place ?>
<br>Nombre de place(s) disponible(s) : <?php echo $nb_place_dispo ?>
<br>