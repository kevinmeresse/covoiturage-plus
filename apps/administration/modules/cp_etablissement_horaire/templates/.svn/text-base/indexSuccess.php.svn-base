<h1>Paramétrage des régimes horaires PSA</h1>

<table class="liste etab-horaire">
  <thead>
    <tr>
      
      <th>Horaire</th>
      <th>Etablissement</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cp_etablissement_horaires as $cp_etablissement_horaire): ?>
    <tr>
      <td><?php echo $cp_etablissement_horaire->getCpEtablissementHoraireNom() ?></td>
      <td><?php echo $cp_etablissement_horaire->getCpEtablissement() ?></td>
      <td class="view"><a href="<?php echo url_for('cp_etablissement_horaire/show?cp_etablissement_horaire_id='.$cp_etablissement_horaire->getCpEtablissementHoraireId()) ?>">Visualiser</a></td>
      <td class="edit"><a href="<?php echo url_for('cp_etablissement_horaire/edit?cp_etablissement_horaire_id='.$cp_etablissement_horaire->getCpEtablissementHoraireId()) ?>">Editer</a></td>            
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <p class="nouveau"><a href="<?php echo url_for('cp_etablissement_horaire/new') ?>">Nouveau</a></p>

  <br class="clear"/>