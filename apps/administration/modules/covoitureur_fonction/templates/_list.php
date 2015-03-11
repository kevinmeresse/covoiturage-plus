<table class="liste covoit-fonction">
  <thead>
    <tr>
      <th>Fonction</th>

      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($covoitureur_fonctions as $covoitureur_fonction): ?>
    <tr>
      
      <td><?php echo $covoitureur_fonction->getNom() ?></td>

    <td class="edit"><a href="<?php echo url_for('covoitureur_fonction/edit?id_covoitureur_fonction='.$covoitureur_fonction->getIdCovoitureurFonction()) ?>" title="Editer">Editer</a></td>
    
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

