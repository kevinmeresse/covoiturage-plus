<h1>Liste des lieux</h1>

<table>
  <thead>
    <tr>
      <th>Id lieu</th>
      <th>Bascule insee</th>
      <th>Id site</th>
      <th>Id site site</th>
      <th>Id pour partenaire</th>
      <th>Libelle lieu</th>
      <th>Id lieu type</th>
      <th>Code insee</th>
      <th>Date creation</th>
      <th>Date modification</th>
      <th>Date publication</th>
      <th>Date depublication</th>
      <th>Date evenement</th>
      <th>Visible dans liste</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Adresse</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lieus as $lieu): ?>
    <tr>
      <td><a href="<?php echo url_for('lieu/edit?id_lieu='.$lieu->getIdLieu()) ?>"><?php echo $lieu->getIdLieu() ?></a></td>
      <td><?php echo $lieu->getBasculeInsee() ?></td>
      <td><?php echo $lieu->getIdSite() ?></td>
      <td><?php echo $lieu->getIdSiteSite() ?></td>
      <td><?php echo $lieu->getIdPourPartenaire() ?></td>
      <td><?php echo $lieu->getLibelleLieu() ?></td>
      <td><?php echo $lieu->getIdLieuType() ?></td>
      <td><?php echo $lieu->getCodeInsee() ?></td>
      <td><?php echo $lieu->getDateCreation() ?></td>
      <td><?php echo $lieu->getDateModification() ?></td>
      <td><?php echo $lieu->getDatePublication() ?></td>
      <td><?php echo $lieu->getDateDepublication() ?></td>
      <td><?php echo $lieu->getDateEvenement() ?></td>
      <td><?php echo $lieu->getVisibleDansListe() ?></td>
      <td><?php echo $lieu->getLatitude() ?></td>
      <td><?php echo $lieu->getLongitude() ?></td>
      <td><?php echo $lieu->getAdresse() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <p class="new"><a href="<?php echo url_for('lieu/new') ?>">Nouveau</a></p>

  <br class="clear"/>