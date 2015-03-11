<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('trajet/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_trajet='.$form->getObject()->getIdTrajet() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-list"><a href="<?php echo url_for('trajet/index') ?>">Retour &agrave; la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Supprimer', 'trajet/delete?id_trajet='.$form->getObject()->getIdTrajet(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?>
          <?php endif; ?>
          <input type="submit" value="Sauver" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['bascule']->renderLabel() ?></th>
        <td>
          <?php echo $form['bascule']->renderError() ?>
          <?php echo $form['bascule'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cle']->renderLabel() ?></th>
        <td>
          <?php echo $form['cle']->renderError() ?>
          <?php echo $form['cle'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etat']->renderLabel() ?></th>
        <td>
          <?php echo $form['etat']->renderError() ?>
          <?php echo $form['etat'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['actif']->renderLabel() ?></th>
        <td>
          <?php echo $form['actif']->renderError() ?>
          <?php echo $form['actif'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etat_avant_bascule']->renderLabel() ?></th>
        <td>
          <?php echo $form['etat_avant_bascule']->renderError() ?>
          <?php echo $form['etat_avant_bascule'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['site_confidentiel']->renderLabel() ?></th>
        <td>
          <?php echo $form['site_confidentiel']->renderError() ?>
          <?php echo $form['site_confidentiel'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_utilisateur']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_utilisateur']->renderError() ?>
          <?php echo $form['id_utilisateur'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_partenaire']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_partenaire']->renderError() ?>
          <?php echo $form['id_partenaire'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_offre_sur_site_partenaire']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_offre_sur_site_partenaire']->renderError() ?>
          <?php echo $form['id_offre_sur_site_partenaire'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_site']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_site']->renderError() ?>
          <?php echo $form['id_site'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_site_site']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_site_site']->renderError() ?>
          <?php echo $form['id_site_site'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_type_trajet']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_type_trajet']->renderError() ?>
          <?php echo $form['id_type_trajet'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_nature_trajet']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_nature_trajet']->renderError() ?>
          <?php echo $form['id_nature_trajet'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_frequence']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_frequence']->renderError() ?>
          <?php echo $form['id_frequence'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_depart']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_depart']->renderError() ?>
          <?php echo $form['id_depart'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_depart2']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_depart2']->renderError() ?>
          <?php echo $form['id_depart2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_depart_pays']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_depart_pays']->renderError() ?>
          <?php echo $form['id_depart_pays'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depart_insee']->renderLabel() ?></th>
        <td>
          <?php echo $form['depart_insee']->renderError() ?>
          <?php echo $form['depart_insee'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depart_libelle']->renderLabel() ?></th>
        <td>
          <?php echo $form['depart_libelle']->renderError() ?>
          <?php echo $form['depart_libelle'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depart_adresse']->renderLabel() ?></th>
        <td>
          <?php echo $form['depart_adresse']->renderError() ?>
          <?php echo $form['depart_adresse'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depart_adresse_numero']->renderLabel() ?></th>
        <td>
          <?php echo $form['depart_adresse_numero']->renderError() ?>
          <?php echo $form['depart_adresse_numero'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depart_code_postal']->renderLabel() ?></th>
        <td>
          <?php echo $form['depart_code_postal']->renderError() ?>
          <?php echo $form['depart_code_postal'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depart_ville']->renderLabel() ?></th>
        <td>
          <?php echo $form['depart_ville']->renderError() ?>
          <?php echo $form['depart_ville'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depart_pays']->renderLabel() ?></th>
        <td>
          <?php echo $form['depart_pays']->renderError() ?>
          <?php echo $form['depart_pays'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depart_latitude']->renderLabel() ?></th>
        <td>
          <?php echo $form['depart_latitude']->renderError() ?>
          <?php echo $form['depart_latitude'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depart_longitude']->renderLabel() ?></th>
        <td>
          <?php echo $form['depart_longitude']->renderError() ?>
          <?php echo $form['depart_longitude'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depart_type']->renderLabel() ?></th>
        <td>
          <?php echo $form['depart_type']->renderError() ?>
          <?php echo $form['depart_type'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['depart_autre_lieu']->renderLabel() ?></th>
        <td>
          <?php echo $form['depart_autre_lieu']->renderError() ?>
          <?php echo $form['depart_autre_lieu'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_destination']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_destination']->renderError() ?>
          <?php echo $form['id_destination'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_destination2']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_destination2']->renderError() ?>
          <?php echo $form['id_destination2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_destination_pays']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_destination_pays']->renderError() ?>
          <?php echo $form['id_destination_pays'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination_insee']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination_insee']->renderError() ?>
          <?php echo $form['destination_insee'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination_libelle']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination_libelle']->renderError() ?>
          <?php echo $form['destination_libelle'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination_adresse']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination_adresse']->renderError() ?>
          <?php echo $form['destination_adresse'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination_adresse_numero']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination_adresse_numero']->renderError() ?>
          <?php echo $form['destination_adresse_numero'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination_code_postal']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination_code_postal']->renderError() ?>
          <?php echo $form['destination_code_postal'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination_ville']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination_ville']->renderError() ?>
          <?php echo $form['destination_ville'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination_pays']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination_pays']->renderError() ?>
          <?php echo $form['destination_pays'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination_latitude']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination_latitude']->renderError() ?>
          <?php echo $form['destination_latitude'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination_longitude']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination_longitude']->renderError() ?>
          <?php echo $form['destination_longitude'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination_type']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination_type']->renderError() ?>
          <?php echo $form['destination_type'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['destination_autre_lieu']->renderLabel() ?></th>
        <td>
          <?php echo $form['destination_autre_lieu']->renderError() ?>
          <?php echo $form['destination_autre_lieu'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape1_ville']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape1_ville']->renderError() ?>
          <?php echo $form['etape1_ville'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape1_insee']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape1_insee']->renderError() ?>
          <?php echo $form['etape1_insee'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape_departement1']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape_departement1']->renderError() ?>
          <?php echo $form['etape_departement1'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape2_ville']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape2_ville']->renderError() ?>
          <?php echo $form['etape2_ville'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape2_insee']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape2_insee']->renderError() ?>
          <?php echo $form['etape2_insee'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape_departement2']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape_departement2']->renderError() ?>
          <?php echo $form['etape_departement2'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape3_ville']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape3_ville']->renderError() ?>
          <?php echo $form['etape3_ville'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape3_insee']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape3_insee']->renderError() ?>
          <?php echo $form['etape3_insee'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape_departement3']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape_departement3']->renderError() ?>
          <?php echo $form['etape_departement3'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape4_ville']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape4_ville']->renderError() ?>
          <?php echo $form['etape4_ville'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape4_insee']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape4_insee']->renderError() ?>
          <?php echo $form['etape4_insee'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape_departement4']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape_departement4']->renderError() ?>
          <?php echo $form['etape_departement4'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape5_ville']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape5_ville']->renderError() ?>
          <?php echo $form['etape5_ville'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape5_insee']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape5_insee']->renderError() ?>
          <?php echo $form['etape5_insee'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etape_departement5']->renderLabel() ?></th>
        <td>
          <?php echo $form['etape_departement5']->renderError() ?>
          <?php echo $form['etape_departement5'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['trajet_organisme']->renderLabel() ?></th>
        <td>
          <?php echo $form['trajet_organisme']->renderError() ?>
          <?php echo $form['trajet_organisme'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['km']->renderLabel() ?></th>
        <td>
          <?php echo $form['km']->renderError() ?>
          <?php echo $form['km'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_zone_entreprise']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_zone_entreprise']->renderError() ?>
          <?php echo $form['id_zone_entreprise'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_evenement']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_evenement']->renderError() ?>
          <?php echo $form['id_evenement'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['zone_entreprise_autre']->renderLabel() ?></th>
        <td>
          <?php echo $form['zone_entreprise_autre']->renderError() ?>
          <?php echo $form['zone_entreprise_autre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jour_unique_type_cov']->renderLabel() ?></th>
        <td>
          <?php echo $form['jour_unique_type_cov']->renderError() ?>
          <?php echo $form['jour_unique_type_cov'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jour_unique_date']->renderLabel() ?></th>
        <td>
          <?php echo $form['jour_unique_date']->renderError() ?>
          <?php echo $form['jour_unique_date'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jour_unique_heure']->renderLabel() ?></th>
        <td>
          <?php echo $form['jour_unique_heure']->renderError() ?>
          <?php echo $form['jour_unique_heure'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jour_unique_type_cov_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['jour_unique_type_cov_retour']->renderError() ?>
          <?php echo $form['jour_unique_type_cov_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jour_unique_date_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['jour_unique_date_retour']->renderError() ?>
          <?php echo $form['jour_unique_date_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jour_unique_heure_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['jour_unique_heure_retour']->renderError() ?>
          <?php echo $form['jour_unique_heure_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jour_unique_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['jour_unique_retour']->renderError() ?>
          <?php echo $form['jour_unique_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jour_unique_description']->renderLabel() ?></th>
        <td>
          <?php echo $form['jour_unique_description']->renderError() ?>
          <?php echo $form['jour_unique_description'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['lundi_type_cov']->renderLabel() ?></th>
        <td>
          <?php echo $form['lundi_type_cov']->renderError() ?>
          <?php echo $form['lundi_type_cov'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['lundi_etat']->renderLabel() ?></th>
        <td>
          <?php echo $form['lundi_etat']->renderError() ?>
          <?php echo $form['lundi_etat'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['lundi_heure_depart']->renderLabel() ?></th>
        <td>
          <?php echo $form['lundi_heure_depart']->renderError() ?>
          <?php echo $form['lundi_heure_depart'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['lundi_heure_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['lundi_heure_retour']->renderError() ?>
          <?php echo $form['lundi_heure_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mardi_type_cov']->renderLabel() ?></th>
        <td>
          <?php echo $form['mardi_type_cov']->renderError() ?>
          <?php echo $form['mardi_type_cov'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mardi_etat']->renderLabel() ?></th>
        <td>
          <?php echo $form['mardi_etat']->renderError() ?>
          <?php echo $form['mardi_etat'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mardi_heure_depart']->renderLabel() ?></th>
        <td>
          <?php echo $form['mardi_heure_depart']->renderError() ?>
          <?php echo $form['mardi_heure_depart'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mardi_heure_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['mardi_heure_retour']->renderError() ?>
          <?php echo $form['mardi_heure_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mercredi_type_cov']->renderLabel() ?></th>
        <td>
          <?php echo $form['mercredi_type_cov']->renderError() ?>
          <?php echo $form['mercredi_type_cov'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mercredi_etat']->renderLabel() ?></th>
        <td>
          <?php echo $form['mercredi_etat']->renderError() ?>
          <?php echo $form['mercredi_etat'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mercredi_heure_depart']->renderLabel() ?></th>
        <td>
          <?php echo $form['mercredi_heure_depart']->renderError() ?>
          <?php echo $form['mercredi_heure_depart'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mercredi_heure_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['mercredi_heure_retour']->renderError() ?>
          <?php echo $form['mercredi_heure_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jeudi_type_cov']->renderLabel() ?></th>
        <td>
          <?php echo $form['jeudi_type_cov']->renderError() ?>
          <?php echo $form['jeudi_type_cov'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jeudi_etat']->renderLabel() ?></th>
        <td>
          <?php echo $form['jeudi_etat']->renderError() ?>
          <?php echo $form['jeudi_etat'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jeudi_heure_depart']->renderLabel() ?></th>
        <td>
          <?php echo $form['jeudi_heure_depart']->renderError() ?>
          <?php echo $form['jeudi_heure_depart'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['jeudi_heure_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['jeudi_heure_retour']->renderError() ?>
          <?php echo $form['jeudi_heure_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['vendredi_type_cov']->renderLabel() ?></th>
        <td>
          <?php echo $form['vendredi_type_cov']->renderError() ?>
          <?php echo $form['vendredi_type_cov'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['vendredi_etat']->renderLabel() ?></th>
        <td>
          <?php echo $form['vendredi_etat']->renderError() ?>
          <?php echo $form['vendredi_etat'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['vendredi_heure_depart']->renderLabel() ?></th>
        <td>
          <?php echo $form['vendredi_heure_depart']->renderError() ?>
          <?php echo $form['vendredi_heure_depart'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['vendredi_heure_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['vendredi_heure_retour']->renderError() ?>
          <?php echo $form['vendredi_heure_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['samedi_type_cov']->renderLabel() ?></th>
        <td>
          <?php echo $form['samedi_type_cov']->renderError() ?>
          <?php echo $form['samedi_type_cov'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['samedi_etat']->renderLabel() ?></th>
        <td>
          <?php echo $form['samedi_etat']->renderError() ?>
          <?php echo $form['samedi_etat'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['samedi_heure_depart']->renderLabel() ?></th>
        <td>
          <?php echo $form['samedi_heure_depart']->renderError() ?>
          <?php echo $form['samedi_heure_depart'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['samedi_heure_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['samedi_heure_retour']->renderError() ?>
          <?php echo $form['samedi_heure_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['dimanche_type_cov']->renderLabel() ?></th>
        <td>
          <?php echo $form['dimanche_type_cov']->renderError() ?>
          <?php echo $form['dimanche_type_cov'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['dimanche_etat']->renderLabel() ?></th>
        <td>
          <?php echo $form['dimanche_etat']->renderError() ?>
          <?php echo $form['dimanche_etat'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['dimanche_heure_depart']->renderLabel() ?></th>
        <td>
          <?php echo $form['dimanche_heure_depart']->renderError() ?>
          <?php echo $form['dimanche_heure_depart'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['dimanche_heure_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['dimanche_heure_retour']->renderError() ?>
          <?php echo $form['dimanche_heure_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date_creation']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_creation']->renderError() ?>
          <?php echo $form['date_creation'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date_depublication']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_depublication']->renderError() ?>
          <?php echo $form['date_depublication'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date_modification']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_modification']->renderError() ?>
          <?php echo $form['date_modification'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date_verification']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_verification']->renderError() ?>
          <?php echo $form['date_verification'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre_de_place']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre_de_place']->renderError() ?>
          <?php echo $form['nombre_de_place'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mobilite_r']->renderLabel() ?></th>
        <td>
          <?php echo $form['mobilite_r']->renderError() ?>
          <?php echo $form['mobilite_r'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['trajet_etudiant']->renderLabel() ?></th>
        <td>
          <?php echo $form['trajet_etudiant']->renderError() ?>
          <?php echo $form['trajet_etudiant'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre_visualisation']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre_visualisation']->renderError() ?>
          <?php echo $form['nombre_visualisation'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nombre_demande']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre_demande']->renderError() ?>
          <?php echo $form['nombre_demande'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cout']->renderLabel() ?></th>
        <td>
          <?php echo $form['cout']->renderError() ?>
          <?php echo $form['cout'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cout_passager']->renderLabel() ?></th>
        <td>
          <?php echo $form['cout_passager']->renderError() ?>
          <?php echo $form['cout_passager'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['autoroute']->renderLabel() ?></th>
        <td>
          <?php echo $form['autoroute']->renderError() ?>
          <?php echo $form['autoroute'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['autoroute_cout']->renderLabel() ?></th>
        <td>
          <?php echo $form['autoroute_cout']->renderError() ?>
          <?php echo $form['autoroute_cout'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['autoroute_text']->renderLabel() ?></th>
        <td>
          <?php echo $form['autoroute_text']->renderError() ?>
          <?php echo $form['autoroute_text'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['vehicule']->renderLabel() ?></th>
        <td>
          <?php echo $form['vehicule']->renderError() ?>
          <?php echo $form['vehicule'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['tolerance']->renderLabel() ?></th>
        <td>
          <?php echo $form['tolerance']->renderError() ?>
          <?php echo $form['tolerance'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['url_retour']->renderLabel() ?></th>
        <td>
          <?php echo $form['url_retour']->renderError() ?>
          <?php echo $form['url_retour'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['technique']->renderLabel() ?></th>
        <td>
          <?php echo $form['technique']->renderError() ?>
          <?php echo $form['technique'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['visible_uniquement_partenaire']->renderLabel() ?></th>
        <td>
          <?php echo $form['visible_uniquement_partenaire']->renderError() ?>
          <?php echo $form['visible_uniquement_partenaire'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_type_vehicule']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_type_vehicule']->renderError() ?>
          <?php echo $form['id_type_vehicule'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['volume_bagage']->renderLabel() ?></th>
        <td>
          <?php echo $form['volume_bagage']->renderError() ?>
          <?php echo $form['volume_bagage'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['covoiturage_solidaire']->renderLabel() ?></th>
        <td>
          <?php echo $form['covoiturage_solidaire']->renderError() ?>
          <?php echo $form['covoiturage_solidaire'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
