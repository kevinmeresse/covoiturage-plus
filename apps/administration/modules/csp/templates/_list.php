<table class="liste csp-list">
  <thead>
    <tr>
      <th>Libellé</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($csps as $csp): ?>
    <tr>
      <td><?php echo $csp->getIntitule() ?></td>

      <td class="edit"><a href="<?php echo url_for('csp/edit?id_csp='.$csp->getIdCsp()) ?>">Editer</a></td>
      <td class="suppr"><?php echo link_to('Supprimer', 'csp/delete?id_csp='.$csp->getIdCsp(), array('method' => 'delete', 'confirm' => 'Etes vous sûr?')) ?></td> 
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


