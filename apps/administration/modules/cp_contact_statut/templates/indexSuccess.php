<h1>Liste des statuts des contacts</h1>

<table class="liste contact-list-detail">
  <thead>
    <tr>

      <th>Libelle</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cp_contact_statuts as $cp_contact_statut): ?>
    <tr>
      <td><a href="<?php echo url_for('cp_contact_statut/edit?cp_contact_statut_id='.$cp_contact_statut->getCpContactStatutId()) ?>"><?php echo $cp_contact_statut->getCpContactStatutLibelle() ?></a></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  
  <p class="nouveau"><a href="<?php echo url_for('cp_contact_statut/new') ?>">Nouveau</a></p>
  
  <br class="clear"/>
