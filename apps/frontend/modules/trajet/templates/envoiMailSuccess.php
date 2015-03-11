<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2>Votre mail a bien été envoyé</h2>
<br> 

<a href="<?php echo url_for('trajet/list?form_type=smpl&depart_ville='.$depart_ville.'&destination_ville='.$destination_ville ) ?>">Retour à la liste</a>