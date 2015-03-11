

<h3>Villes rattachées &agrave; la communauté de communes</h3>
<?php include_partial('addCcForm', array('addCcForm' => $addCcForm,'id_cc' => $id_cc)) ?>

<br class="clear"/>
<div>
  <table class="liste liee">
  <thead>
    <tr>
      
      <th>Ville</th>
      <th>C.P.</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($villeLiees as $villeLiee): ?>
    <tr>
      <td><?php echo $villeLiee->getNomVille() ?></td>
      <td><?php echo $villeLiee->getCodePostal() ?></td>

      <td class="suppr"><?php echo link_to('suppression', 'communaute_commune/deleteVille?id_communaute='.$id_cc.'&id_ville='.$villeLiee->getIdVille(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div>
