<table class="liste">
  <tbody>

    <tr>
      <th>Intitule:</th>
      <td><?php echo $csp->getIntitule() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<p class="modifier"<a href="<?php echo url_for('csp/edit?id_csp='.$csp->getIdCsp()) ?>">Modifier</a></p>

<p class="retour-liste"><a href="<?php echo url_for('csp/index') ?>">Retour &agrave; la liste</a></p>

<br class="clear"/>