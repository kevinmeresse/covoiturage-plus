

<h1>Liste des communautés de communes (CC)</h1>

<table class="liste communaute">
  <thead>
    <tr>
      
      <th>Nom de la CC</th>
      <th>Ville de référence</th>

      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($communaute_communes as $communaute_commune): ?>
    <tr>
      
      <td><?php echo $communaute_commune->getNom() ?></td>
      <td><?php echo $communaute_commune->getVilleFr() ?></td>

      <td class="edit"><a href="<?php echo url_for('communaute_commune/edit?id_communaute='.$communaute_commune->getIdCommunaute()) ?>" title="Editer">Edition</a></td>
      <td class="suppr"><?php echo link_to('Suppression', 'communaute_commune/delete?id_communaute='.$communaute_commune->getIdCommunaute(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?', 'title' => 'supprimer')) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<p class="nouveau">
  <a href="<?php echo url_for('communaute_commune/new') ?>">Nouveau</a>
<p>

<br class="clear"/>

