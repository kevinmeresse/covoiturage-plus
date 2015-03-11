<table class="liste visualiser-1-secteur">
  <tbody>
    
    <tr>
      <th>secteur :</th>
      <td><?php echo $cp_etablissement_secteur->getCpEtablissementSecteurNom() ?></td>
    </tr>
    <tr>
      <th>etablissement :</th>
      <td><?php echo $cp_etablissement_secteur->getCpEtablissement() ?></td>
    </tr>
  </tbody>
</table>



<p class="modifier"><a href="<?php echo url_for('cp_etablissement_secteur/edit?cp_etablissement_secteur_id='.$cp_etablissement_secteur->getCpEtablissementSecteurId()) ?>">Modifier</a></p>

<p class="retour-liste"><a href="<?php echo url_for('cp_etablissement_secteur/index') ?>">Retour &agrave; la liste</a></p>

<br class="clear"/>