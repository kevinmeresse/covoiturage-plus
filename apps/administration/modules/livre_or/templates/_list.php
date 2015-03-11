<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<table class="livre_or">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Message</th>
      <th>Mail</th>
      <th>Date creation</th>
      <th>Etat</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($livre_ors as $livre_or): ?>
    <tr>
      
      <td><?php echo $livre_or->getNom() ?></td>
      <td><?php echo $livre_or->getPrenom() ?></td>
      <td><?php echo $livre_or->getMessage() ?></td>
      <td><?php echo $livre_or->getMail() ?></td>
      <td><?php echo $livre_or->getDateCreation() ?></td>

      <td><?php echo $livre_or->getEtat() ?></td>

      <td class="view">
          <a href="<?php echo url_for('livre_or/show?id='.$livre_or->getId()) ?>" alt="Visualiser">Visualiser</a></td>
       <td class="edit">   
          <a href="<?php echo url_for('livre_or/edit?id='.$livre_or->getId()) ?>">Editer</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>




