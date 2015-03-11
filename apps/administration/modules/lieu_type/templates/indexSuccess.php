<h1>Liste des types de Lieu  </h1>

<table class="liste type-lieux">
  <thead>
    <tr>
      
      <th>Type</th>
		<th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lieu_types as $lieu_type): ?>
    <tr>
      <td><?php echo $lieu_type->getLibelleLieuType() ?></td>
      <td class="edit"><a href="<?php echo url_for('lieu_type/edit?id_lieu_type='.$lieu_type->getIdLieuType()) ?>">Editer</a></td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <p class="nouveau"><a href="<?php echo url_for('lieu_type/new?evenement=0') ?>">Nouveau</a></p>
  
 <br class="clear"/>
