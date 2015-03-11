<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<table class="covoitureurs liste">
    <thead>
    <tr>
      <th>Covoitureur</th>
      <th>Partenaire</th>
      <th>Nb trajets déposés</th>
      <th>Date</th>
      <th colspan="3">Actions</th>


    </tr>
  </thead>
  <?php foreach ($covoitureurs as $i => $covoitureur): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td class="location">
        <?php echo $covoitureur->getNom() ?>
          &nbsp;
          <?php echo $covoitureur->getPrenom() ?>
          &nbsp;
          (<?php echo $covoitureur->getMail() ?>)
      </td>
      <td><?php echo $covoitureur->getIdPartenaire() ?></td>
      <td></td>
      <td><?php echo date("d-m-Y",  strtotime($covoitureur->getDateCreation())) ?></td>
      <td class="tab-center view"><a href="<?php echo url_for('covoitureur/show?id_utilisateur=' . $covoitureur->getIdUtilisateur()) ?>"  title="visualiser le covoitureurs">Visualiser</a></td>
      <td class="tab-center edit"><a href="<?php echo url_for('covoitureur/edit?id_utilisateur=' . $covoitureur->getIdUtilisateur()) ?>"  title="Modifier le covoitureurs">Editer</a></td>
      <td class="tab-center nouveau-trajet"><a href="<?php echo url_for('trajet/newCovoitureurTrajet?id_utilisateur=' . $covoitureur->getIdUtilisateur()) ?>"  title="nouveau trajet pour le covoitureur">Ajouter un trajet</a></td>

    </tr>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td colspan="1">
            Adresse :<br>
            mail :<br>
            Tél :<br>
            Société :<br>

        </td>
        <td colspan="3">
            <?php echo $covoitureur->getAdresse()." - ".$covoitureur->getCodePostal()." ".$covoitureur->getVille() ?> <br>
            <?php echo $covoitureur->getMail() ?> <br>
            <?php echo $covoitureur->getTelephone() ?> <br>
            <?php echo $covoitureur->getCpEtablissement() ?> <br>

        </td>
        <td colspan="3">
            <?php if($covoitureur->getEtatPhoto() != 0): ?>
                <?php  print($covoitureur->getThumbnailPhotoCovoitureur(ESC_RAW)) ?>
            <?php else: ?>
                &nbsp;
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>
  <?php endforeach; ?>
</table>