<table class="covoit-com liste">
  <thead>
    <tr>
      <th>Sur</th>
      <th>De</th>
      <th>Commentaire</th>
      <th>Note</th>
      <th>Date insert</th>
      <th>Validation</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($covoitureur_amiss as $i => $covoitureur_amis): ?>
      <?php  //$resultt = print_r($covoitureur_amis);
        //echo $resultt;
      ?>
    <tr>
      <td><?php echo $covoitureur_amis->getNomc1()." ".$covoitureur_amis->getPrenomc1() ?></td>
      <td><?php echo $covoitureur_amis->getNomc2()." ".$covoitureur_amis->getPrenomc2() ?></td>
      <td><?php echo substr($covoitureur_amis->getCommentaire(),0,50) ?></td>
      <td><?php echo $covoitureur_amis->getNote() ?></td>
      <td><?php echo date(sfConfig::get('app_fr_format_date_court'),  strtotime($covoitureur_amis->getDateInsert())) ?></td>
      <td><?php echo $covoitureur_amis->getValideMessage() ?></td>
      <td>
          <a href="<?php echo url_for('covoitureur_amis/show?id_covoitureur='.$covoitureur_amis->getIdutilc1().'&id_covoitureur_amis='.$covoitureur_amis->getIdutilc2()) ?>">Visualiser</a>
          <a href="<?php echo url_for('covoitureur_amis/edit?id_covoitureur='.$covoitureur_amis->getIdutilc1().'&id_covoitureur_amis='.$covoitureur_amis->getIdutilc2()) ?>">Modifier</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
