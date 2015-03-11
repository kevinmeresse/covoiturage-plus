<h3>Liste des covoitureurs associés &agrave; l'équipage</h3>


<div>
  <table class="liste covoit-associes">
  <thead>
    <tr>
      
      <th>Nom Prénom</th>
      <th>Mail</th>
      <th>Tél.</th>
      <th>Domiciliation</th>
      <th>Entreprise</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($covoitureurEquipages as $covoitureurEquipage): ?>
    <tr>
      <td><?php echo $covoitureurEquipage->getCovoitureur()->getNom()." ".$covoitureurEquipage->getCovoitureur()->getPrenom() ?></td>
      <td><?php echo $covoitureurEquipage->getCovoitureur()->getMail() ?></td>
      <td><?php echo $covoitureurEquipage->getCovoitureur()->getTelephone() ?></td>
      <td><?php echo $covoitureurEquipage->getCovoitureur()->getVille() ?></td>
      <td><?php echo $covoitureurEquipage->getCovoitureur()->getSociete()  ?></td>
      <td><?php echo link_to('supprimer', 'covoitureur/covoitureurEquipageDelete?id_covoitureur='.$covoitureurEquipage->getIdCovoitureur()."&id_equipage=".$covoitureurEquipage->getIdEquipage()) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div>
