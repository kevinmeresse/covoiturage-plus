<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<table class="liste alerte">
    <thead>
    <tr>
      <th>Ville de départ</th>
      <th>Ville d'arrivée</th>
      <th >Actions</th>
    </tr>
  </thead>

     <?php foreach ($alertes as $i => $alerte): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      
        <td>
        <?php echo $alerte->getDepartNomVille() ?>
      </td>

      <td>
        <?php echo $alerte->getDestinationNomVille() ?>
      </td>
      

      <td class="suppr"><?php echo link_to('Delete', 'alerte/delete?id_trajet_alerte=' . $alerte->getIdTrajetAlerte(), array('method' => 'delete', 'confirm' => 'Êtes-vous sûr de vouloir supprimer cette alerte ?')) ?></td>
    </tr>
  <?php endforeach; ?>

</table>
<br class="clear"/>

<br/>


