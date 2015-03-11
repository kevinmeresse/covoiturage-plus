<h1>Paramétrage des secteurs PSA</h1>

<table class="liste etab-secteur">
  <thead>
    <tr>
      
      <th>Secteur</th>
      <th>Etablissement</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cp_etablissement_secteurs as $cp_etablissement_secteur): ?>
    <tr>
      <td><?php echo $cp_etablissement_secteur->getCpEtablissementSecteurNom() ?></td>
      <td><?php echo $cp_etablissement_secteur->getCpEtablissement() ?></td>
      <td class="view"><a href="<?php echo url_for('cp_etablissement_secteur/show?cp_etablissement_secteur_id='.$cp_etablissement_secteur->getCpEtablissementSecteurId()) ?>">Visualiser</a></td>
      <td class="edit"><a href="<?php echo url_for('cp_etablissement_secteur/edit?cp_etablissement_secteur_id='.$cp_etablissement_secteur->getCpEtablissementSecteurId()) ?>">Editer</a></td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <p class="nouveau"><a href="<?php echo url_for('cp_etablissement_secteur/new') ?>">Nouveau</a></p>

  <br class="clear"/>