<h2>Vidualisation du commentaire</h2>
<table class="liste covoit-1-com">
  <tbody>
    <tr>
      <th>Id covoitureur:</th>
      <td><?php echo $covoitureur_amis->getNomc1()." ".$covoitureur_amis->getPrenomc1() ?></td>
    </tr>
    <tr>
      <th>Id covoitureur amis:</th>
      <td><?php echo $covoitureur_amis->getNomc2()." ".$covoitureur_amis->getPrenomc2() ?></td>
    </tr>

    <tr>
      <th>Commentaire:</th>
      <td><?php echo $covoitureur_amis->getCommentaire() ?></td>
    </tr>
    <tr>
      <th>Note:</th>
      <td><?php echo $covoitureur_amis->getNote() ?></td>
    </tr>
    <tr>
      <th>Date insert:</th>
      <td><?php echo date("d-m-Y",  strtotime($covoitureur_amis->getDateInsert())) ?></td>
    </tr>
    <tr>
      <th>Valide message:</th>
      <td><?php echo $covoitureur_amis->getValideMessage() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<p class="modifier"><a href="<?php echo url_for('covoitureur_amis/edit?id_covoitureur='.$covoitureur_amis->getIdutilc1().'&id_covoitureur_amis='.$covoitureur_amis->getIdutilc2()) ?>">Modifier</a></p>
&nbsp;
<p class="retour-liste"><a href="<?php echo url_for('covoitureur_amis/index') ?>">Retour à la liste</a></p>

<br class="clear"/>