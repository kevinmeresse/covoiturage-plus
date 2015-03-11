<h1>Liste des groupes de statistiques </h1>

<table class=" liste">
  <thead>
    <tr>
      
      <th>Intitulé</th>
      <th>Paramètres</th>
      <th>Visible</th>
      <th>Date création</th>
      <th>Date modification</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($groupe_stats as $groupe_stat): ?>
    <tr>
      
      <td><?php echo $groupe_stat->getIntitule() ?></td>
      <td><?php echo $groupe_stat->getExtractNomVille() ?></td>
      <td><?php echo ($groupe_stat->getEtat()==0 ? 'NON':'OUI') ?></td>
      <td><?php echo  date("d-m-Y", strtotime($groupe_stat->getDateCreation())) ?></td>
      <td><?php echo  date("d-m-Y", strtotime($groupe_stat->getDateModification())) ?></td>
      <td class="edit"><a href="<?php echo url_for('groupe_stat/edit?id_groupe_stat='.$groupe_stat->getIdGroupeStat()) ?>">Editer</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <p class="nouveau"><a href="<?php echo url_for('groupe_stat/new') ?>">Nouveau</a></p>
  <br>
