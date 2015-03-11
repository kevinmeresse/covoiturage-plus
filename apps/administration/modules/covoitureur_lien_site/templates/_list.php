<table class="liste lien-covoit">
  <thead>
    <tr>
      
      <th>Nom</th>

      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($covoitureur_lien_sites as $covoitureur_lien_site): ?>
    <tr>
      <td><?php echo $covoitureur_lien_site->getNom() ?></td>

      
      <td class="edit"><a href="<?php echo url_for('covoitureur_lien_site/edit?id_covoitureur_lien_site='.$covoitureur_lien_site->getIdCovoitureurLienSite()) ?>">Editer</a></td>      
      <td class="suppr"><?php echo link_to('Supprimer', 'covoitureur_lien_site/delete?id_covoitureur_lien_site='.$covoitureur_lien_site->getIdCovoitureurLienSite(), array('method' => 'delete', 'confirm' => 'Etes vous sûr?')) ?></td> 
          
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


