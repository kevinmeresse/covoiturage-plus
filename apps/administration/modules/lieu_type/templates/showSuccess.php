<h1>Visualisation du type de Lieu</h1>
<table>
  <tbody>

    <tr>
      <th>Libelle :</th>
      <td><?php echo $lieu_type->getLibelleLieuType() ?></td>
    </tr>

  </tbody>
</table>

<hr />

<p class="modifier"><a href="<?php echo url_for('lieu_type/edit?id_lieu_type='.$lieu_type->getIdLieuType()) ?>">Modifier</a></p>

<p class="retour-liste"><a href="<?php echo url_for('lieu_type/index') ?>">Retour &agrave; la liste</a></p>

<br class="clear"/>
