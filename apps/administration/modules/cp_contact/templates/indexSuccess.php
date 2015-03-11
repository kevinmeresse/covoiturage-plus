<h1>Liste des contacts</h1>

<table class="liste contact-list-detail">
  <thead>
    <tr>
      <th>Etablissement</th>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Fonction</th>
      <th>Commentaire</th>
      <th>Date creation</th>   
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cp_contacts as $cp_contact): ?>
    <tr>
      <td class="edit"><a href="<?php echo url_for('cp_contact/edit?cp_contact_id='.$cp_contact->getCpContactId()) ?>"><?php echo $cp_contact->getCpContactId() ?></a></td>
      <td><?php echo $cp_contact->getCpContactNom() ?></td>
      <td><?php echo $cp_contact->getCpContactPrenom() ?></td>
      <td><?php echo $cp_contact->getCpContactFonction() ?></td>
      <td><?php echo $cp_contact->getCpContactCommentaire() ?></td>
      <td><?php echo date(sfConfig::get('app_fr_format_date_court'),  strtotime($cp_contact->getCpContactDateCreation())) ?></td>
      <td><?php echo $cp_contact->getCpContactCpEtablissementId() ?></td>
      
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <p class="nouveau"><a href="<?php echo url_for('cp_contact/new') ?>">Nouveau</a></p>
  
  <br class="clear"/>
