<table class="liste covoit-1-fonction">
  <tbody>

    <tr>
      <th>Nom:</th>
      <td><?php echo $covoitureur_fonction->getNom() ?></td>
    </tr>
    <tr>
      <th>Date creation:</th>
      <td><?php echo $covoitureur_fonction->getDateCreation() ?></td>
    </tr>

  </tbody>
</table>

<p class="modifier"><a href="<?php echo url_for('covoitureur_fonction/edit?id_covoitureur_fonction='.$covoitureur_fonction->getIdCovoitureurFonction()) ?>">Modifier</a></p>

<p class="retour-liste"><a href="<?php echo url_for('covoitureur_fonction/index') ?>">Retour &agrave; la liste</a></p>

<br class="clear"/>