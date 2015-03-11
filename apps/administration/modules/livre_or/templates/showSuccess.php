<h2>Visualisation du message du livre d'or</h2>
<div id="livre-or-view">
<table>
  <tbody>
    
    <tr>
      <th>Nom:</th>
      <td><?php echo $livre_or->getNom() ?></td>
    </tr>
    <tr>
      <th>Prenom:</th>
      <td><?php echo $livre_or->getPrenom() ?></td>
    </tr>
    <tr>
      <th>Message:</th>
      <td><?php echo $livre_or->getMessage() ?></td>
    </tr>
    <tr>
      <th>Mail:</th>
      <td><?php echo $livre_or->getMail() ?></td>
    </tr>
    <tr>
      <th>Date création:</th>
      <td><?php echo date("d-m-Y",  strtotime($livre_or->getDateCreation())) ?></td>
    </tr>

    <tr>
      <th>Etat:</th>
      <td>
          <?php if ($livre_or->getEtat() == 1): ?>
            Validé
          <?php else: ?>  
            Non validé
          <?php endif; ?>  
      </td>
    </tr>

  </tbody>
</table>
</div>


<p class="nouveau"><a href="<?php echo url_for('livre_or/edit?id='.$livre_or->getId()) ?>">Modifier</a></p>

<p class="retour-liste"><a href="<?php echo url_for('livre_or/index') ?>">Retour &agrave; la liste</a></p>

<br class="clear"/>
