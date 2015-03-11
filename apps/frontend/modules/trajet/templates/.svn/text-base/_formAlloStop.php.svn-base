<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('trajet/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_trajet=' . $form->getObject()->getIdTrajet() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
        <table>
            <tfoot>
                <tr>
                    <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                    &nbsp;<a href="<?php echo url_for('trajet/list') ?>">Retour à la liste</a>
                    <?php if (!$form->getObject()->isNew()): ?>
                        &nbsp;<?php echo link_to('Supprimer le trajet', 'trajet/delete?id_trajet=' . $form->getObject()->getIdTrajet(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                    <?php endif; ?>
                        <input type="submit" value="Valider" />
                    </td>
                </tr>
            </tfoot>
            <tbody>
            <?php echo $form->renderGlobalErrors() ?>


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
                    <th><?php echo $form['depart_ville']->renderLabel() ?></th>
                    <td>
                    <?php echo $form['depart_ville']->renderError() ?>
                    <?php echo $form['depart_ville'] ?>
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
