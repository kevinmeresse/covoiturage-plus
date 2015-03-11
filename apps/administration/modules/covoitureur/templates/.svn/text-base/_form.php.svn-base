<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<form action="<?php echo url_for('covoitureur/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_utilisateur=' . $form->getObject()->getIdUtilisateur() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <div id="covoitureur-form">
        <table class="covoit-profil">

            <tbody>
                <?php echo $form->renderGlobalErrors() ?>

                <tr>
                    <th>Etat du compte</th>
                    <td>
                        <?php echo $form['etat']->renderError() ?>
                        <?php echo $form['etat'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Validation Covoiturage Plus</th>
                    <td>
                        <?php echo $form['etat_site_client_validation']->renderError() ?>
                        <?php echo $form['etat_site_client_validation'] ?>
                    </td>
                </tr>

                <tr>

                    <td colspan="3">

                    </td>
                </tr>

                <tr>
                    <th><?php echo $form['ss_mail']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['ss_mail']->renderError() ?>
                        <?php echo $form['ss_mail'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Mail principal</th>
                    <td>
                        <?php echo $form['mail']->renderError() ?>
                        <?php echo $form['mail'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Mail secondaire</th>
                    <td>
                        <?php echo $form['mail_perso']->renderError() ?>
                        <?php echo $form['mail_perso'] ?>
                    </td>
                </tr>
                <tr>

                    <td colspan="3">

                    </td>
                </tr>

                <tr>
                    <th><?php echo $form['nom']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['nom']->renderError() ?>
                        <?php echo $form['nom'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Prénom</th>
                    <td>
                        <?php echo $form['prenom']->renderError() ?>
                        <?php echo $form['prenom'] ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $form['sexe']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['sexe']->renderError() ?>
                        <?php echo $form['sexe'] ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $form['annee_naissance']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['annee_naissance']->renderError() ?>
                        <?php echo $form['annee_naissance'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Déclare être majeur</th>
                    <td>
                        <?php echo $form['isMajeur']->renderError() ?>
                        <?php echo $form['isMajeur'] ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $form['adresse']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['adresse']->renderError() ?>
                        <?php echo $form['adresse'] ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $form['code_postal']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['code_postal']->renderError() ?>
                        <?php echo $form['code_postal'] ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $form['ville']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['ville']->renderError() ?>
                        <?php
                        echo jq_input_auto_complete_tag(
                                'covoitureur[ville]', $tab_ville_autoc['ville'], url_for1('ville_fr/autocomplete', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                        ?>
                    </td>
                </tr>

                <tr>
                    <th>Téléphone portable</th>
                    <td>
                        <?php echo $form['telephone']->renderError() ?>
                        <?php echo $form['telephone'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Téléphone visible</th>
                    <td>
                        <?php echo $form['telephone_visible']->renderError() ?>
                        <?php echo $form['telephone_visible'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Téléphone domicile</th>
                    <td>
                        <?php echo $form['telephone_mobile']->renderError() ?>
                        <?php echo $form['telephone_mobile'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Téléphone travail</th>
                    <td>
                        <?php echo $form['telephone_autre']->renderError() ?>
                        <?php echo $form['telephone_autre'] ?>
                    </td>
                </tr>
                <tr>

                    <td colspan="3">

                    </td>
                </tr>
                <tr>
                    <th>Etablissement</th>
                    <td>
                        <?php echo $form['etablissement']->renderError() ?>
                        
                        <?php
                        echo jq_input_auto_complete_tag(
                                'covoitureur[etablissement]', $tab_ville_autoc['etablissement'], url_for1('cp_etablissement/autocompleteCovoit', TRUE), array('autocomplete' => 'on', 'size' => '100'), array('use_style' => true,'max' => sfConfig::get('app_max_etablissement_autcmp_list')))
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Nom de l'établissement si non mentionné</th>
                    <td>
                        <?php echo $form['societe']->renderError() ?>
                        <?php echo $form['societe'] ?>
                    </td>
                </tr>

                <tr>
                    <th>Fonction</th>
                    <td>
                        <?php echo $form['id_covoitureur_fonction']->renderError() ?>
                        <?php echo $form['id_covoitureur_fonction'] ?>
                    </td>
                </tr>

                <tr>

                    <td colspan="3">

                    </td>
                </tr>

                <tr>
                    <th>Possède un véhicule </th>
                    <td>
                        <?php echo $form['possede_vehicule']->renderError() ?>
                        <?php echo $form['possede_vehicule'] ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $form['etat_photo']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['etat_photo']->renderError() ?>
                        <?php echo $form['etat_photo'] ?>
                    </td>
                </tr>
                <tr>
                    <th><?php echo $form['file_photo']->renderLabel() ?></th>
                    <td>
                        <?php if (!$form->getObject()->isNew()): ?>
                            <?php if ($covoitureur->getEtatPhoto() != 0): ?>                        
                                <?php if ($covoitureur->getCheminPhotoCovoitureur(ESC_RAW) != ''): ?>
                                    <?php echo $covoitureur->getCheminPhotoCovoitureur(ESC_RAW) ?>
                                    <br>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php echo $form['file_photo']->renderError() ?>
                        <?php echo $form['file_photo'] ?>

                    </td>
                </tr>

                <tr>
                    <th>Suppression de la photo ?</th>
                    <td>
                        <?php echo $form['supp_photo']->renderError() ?>
                        <?php echo $form['supp_photo'] ?>
                    </td>
                </tr>

                <tr>
                    <th>Inscription à la newsletter</th>
                    <td>
                        <?php echo $form['newsletter']->renderError() ?>
                        <?php echo $form['newsletter'] ?>
                    </td>
                </tr>                


                <tr>
                    <th><?php echo $form['rsa']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['rsa']->renderError() ?>
                        <?php echo $form['rsa'] ?>
                    </td>
                </tr>


                <tr>
                    <th>Connaissance de l'association</th>
                    <td>
                        <?php echo $form['id_covoitureur_lien_site']->renderError() ?>
                        <?php echo $form['id_covoitureur_lien_site'] ?>
                    </td>
                </tr>
                
                <tr>
                    <th>Peut être contacté par autre inscrit</th>
                    <td>
                        <?php echo $form['ss_contact_covoit']->renderError() ?>
                        <?php echo $form['ss_contact_covoit'] ?>
                    </td>
                </tr>
                
                <tr>
                    <th>Souhaite rester anonyme</th>
                    <td>
                        <?php echo $form['anonymat']->renderError() ?>
                        <?php echo $form['anonymat'] ?>
                        
                    </td>
                </tr>

                <tr>
                    <th>Commentaires</th>
                    <td>
                        <?php echo $form['remarque']->renderError() ?>
                        <?php echo $form['remarque'] ?>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <?php echo $form->renderHiddenFields(false) ?>
        <?php if (isset($popup)): ?>
            <?php if ($popup == 1): ?>
                <p>
                    <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
                </p>
                <input type="hidden" name="popup" value="1" />
                <?php if (!$form->getObject()->isNew()): ?>
                    <p class="supprimer"><?php echo link_to('Supprimer', 'covoitureur/delete?popup=1&id_utilisateur=' . $form->getObject()->getIdUtilisateur(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
                <?php endif; ?>
            <?php endif; ?>
        <?php else: ?>
            <p class="retour-liste"><a href="<?php echo url_for('covoitureur/index') ?>">Retour &agrave; la liste</a></p>
            <?php if (!$form->getObject()->isNew()): ?>
                <p class="supprimer"><?php echo link_to('Supprimer', 'covoitureur/delete?id_utilisateur=' . $form->getObject()->getIdUtilisateur(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
            <?php endif; ?>
        <?php endif; ?>

    
    <input type="submit" value="Sauvegarder" />

    <br class="clear"/>

</form>
