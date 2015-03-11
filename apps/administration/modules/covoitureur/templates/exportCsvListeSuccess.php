<?php echo "date deb ".$lien_export_csv['date_debut']?><br>
<?php echo "date fin ".$lien_export_csv['date_fin']?><br>
<?php echo  "mail ".$lien_export_csv['mail']?><br></br>
<?php echo  "ville ".$lien_export_csv['ville']?><br>
<?php echo  "rsa ".$lien_export_csv['rsa']?><br></br>
<?php echo  "newsletter ".$lien_export_csv['newsletter']?><br>
<?php echo  "trajet ".$lien_export_csv['trajet']?><br></br>
<?php echo  "equipage ".$lien_export_csv['equipage']?><br>
<?php echo  "covoitureur ".$covoitureurs?><br>

<table id="covoitureur" class="covoitureurs liste">
    <thead>
    <tr>
      <th>Covoitureur</th>
      <th>Etablissement</th>
      <th>Nb trajets déposés</th>
      <th>Equipagé</th>
      <th>Date</th>
      <th colspan="5">Actions</th>


    </tr>
  </thead>
  <?php foreach ($covoitureurs as $covoitureur): ?>
    <tr >
      <td class="location">
        <?php $identiteCovoitureur = $covoitureur->getNom()." ".$covoitureur->getPrenom()." (".$covoitureur->getMail().")"; ?>

          <?php
            echo link_to($identiteCovoitureur, 'covoitureur/show?popup=1&id_utilisateur=' . $covoitureur->getIdUtilisateur(), array(
                'popup' => array('Covoiturage_Plus_Visualisation_covoitureur', 'width=' . sfConfig::get('app_larg_popup_covoit') . ',height=' . sfConfig::get('app_haut_popup_covoit') . ',left=320,top=0,scrollbars=yes'),
                'target' => '_blank'
            ))
            ?>
      </td>
      <td><?php echo $covoitureur->getCpEtablissement()->getCpEtablissementEtablissementNom() ?></td>
      <td><?php echo $covoitureur->getNbTrajetCovoitureur() ?></td>
      <td>
      <?php if($covoitureur->getNbTrajetEquipageCovoitureur() != 0): ?>
          Oui&nbsp;(<?php echo $covoitureur->getNbTrajetEquipageCovoitureur() ?>)
            <?php else: ?>
                NON
            <?php endif; ?>
      </td>
      <td><?php echo date("d-m-Y",  strtotime($covoitureur->getDateCreation())) ?></td>
      <td class="tab-center edit"><a href="<?php echo url_for('covoitureur/edit?id_utilisateur=' . $covoitureur->getIdUtilisateur()) ?>" title="Modification du covoitureur"><?php echo $covoitureur->getIdUtilisateur() ?></a></td>
      <td class="tab-center liste-trajet"><a href="<?php echo url_for('trajet/listTrajetCovoitureur?id_utilisateur=' . $covoitureur->getIdUtilisateur()) ?>" title="Liste des trajets"><?php echo $covoitureur->getIdUtilisateur() ?></a></td>
      <td class="tab-center nouveau-trajet"><a href="<?php echo url_for('trajet/newCovoitureurTrajet?id_utilisateur=' . $covoitureur->getIdUtilisateur()) ?>"  title="Nouveau trajet"><?php echo $covoitureur->getIdUtilisateur() ?></a></td>
      <td class="tab-center liste-action"><a href="<?php echo url_for('cp_action_cv/index?id_utilisateur=' . $covoitureur->getIdUtilisateur()) ?>"  title="Liste des actions"><?php echo $covoitureur->getIdUtilisateur() ?></a></td>
      <td class="tab-center liste-vehicule"><a href="<?php echo url_for('covoitureur_vehicule/list?id_utilisateur=' . $covoitureur->getIdUtilisateur()) ?>"  title="Liste des véhicules"><?php echo $covoitureur->getIdUtilisateur() ?></a></td>

    </tr>
    <tr >
        <td colspan="1">
            <i>Adresse :</i> <?php echo $covoitureur->getAdresse()." - ".$covoitureur->getCodePostal()." ".$covoitureur->getVille() ?><br>
            <i>mail :</i> <?php echo $covoitureur->getMail() ?><br>
            <i>Tél :</i> <?php echo $covoitureur->getTelephone() ?><br>


        </td>
        <td colspan="1">



        </td>
        <td colspan="5">
            <?php if($covoitureur->getThumbnailPhotoCovoitureur(ESC_RAW)): ?>
                <?php  print($covoitureur->getThumbnailPhotoCovoitureur(ESC_RAW)) ?>
            <?php else: ?>
                &nbsp;
            <?php endif; ?>
        </td>
    </tr>

  <?php endforeach; ?>
</table>
