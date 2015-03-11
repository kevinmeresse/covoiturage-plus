<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<br>

<form action="<?php echo url_for('cp_etablissement/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?cp_etablissement_id=' . $form->getObject()->getCpEtablissementId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <div>

                   <table class="etablissements-edit">
            <tfoot>
                <tr>
                    <td colspan="4">
                        <?php echo $form->renderHiddenFields(false) ?>

                        <?php if (isset($popup)): ?>
                            <?php if ($popup == 1): ?>
                                <p>

                                    <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">

                                </p>
                                <input type="hidden" name="popup" value="1" />
                            <?php endif; ?>
                        <?php else: ?>
                            <p class="retour-liste"><a href="<?php echo url_for('cp_etablissement/indexSociete') ?>">Retour &agrave; la liste</a></p>
                        <?php endif; ?>


                        <?php if (!$form->getObject()->isNew()): ?>
                            <p class="supprimer"><?php echo link_to('Supprimer', 'cp_etablissement/delete?cp_etablissement_id=' . $form->getObject()->getCpEtablissementId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
                        <?php endif; ?>

                        <input type="submit" value="Sauvegarder" />
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php echo $form->renderGlobalErrors() ?>
                <tr>
                    <th>Raison sociale</th>
                    <?php if (!$form->getObject()->isNew() && $form->getObject()->getCpEtablissementTypeSociete() == 1): ?>
                        <td  colspan="3">
                            <?php echo $form->getObject()->getCpEtablissementRaisonSocial(); ?>
                            
                            
                        </td>
                        

                    <?php else: ?>
                        <td  colspan="3">
                            <?php echo $form['cp_etablissement_etablissement_RS']->renderError() ?>
                            <?php
                                    echo jq_input_auto_complete_tag(
                                            'cp_etablissement[cp_etablissement_etablissement_RS]', $raison_sociale , url_for1('cp_etablissement/autocompleteRs', TRUE), array('autocomplete' => 'on'), array('use_style' => true,'max' => sfConfig::get('app_max_etablissement_autcmp_list')))
                                    ?>
                        </td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <th>Nom d'établissement</th>
                    <td>
                        <?php echo $form['cp_etablissement_etablissement_nom']->renderError() ?>
                        <?php echo $form['cp_etablissement_etablissement_nom'] ?>
                    </td>
                    <td rowspan="9" style="width:10%;">&nbsp;</td>
                    <td rowspan="9" style="width:40%;">
                    <div id="map" style="width: 400px; height: 400px"></div>
                </td>
                    
                </tr>

                <tr>
                    <th>Nombre de salariés</th>
                    <td>
                        <?php echo $form['cp_etablissement_nb_salarie']->renderError() ?>
                        <?php echo $form['cp_etablissement_nb_salarie'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Adresse pour géolocalisation</th>
                    <td><input id="addresspicker_map" /></td>
                </tr>
                <tr>
                    <th>Adresse</th>
                    <td>
                        <?php echo $form['cp_etablissement_adresse1']->renderError() ?>
                        <?php echo $form['cp_etablissement_adresse1'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Adresse suite</th>
                    <td>
                        <?php echo $form['cp_etablissement_adresse2']->renderError() ?>
                        <?php echo $form['cp_etablissement_adresse2'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Code postal</th>
                    <td>
                        <?php echo $form['cp_etablissement_code_postal']->renderError() ?>
                        <?php echo $form['cp_etablissement_code_postal'] ?>
                    </td>
                </tr>

                <tr>
                    <th>Ville</th>
                    <td>
                        <?php echo $form['ville']->renderError() ?>
                        <?php echo $form['ville'] ?>

                    </td>
                </tr>
                <tr>
                    <th>ZI -ZA</th>
                    <td>
                        <?php echo $form['cp_etablissement_zone_id']->renderError() ?>
                        <?php echo $form['cp_etablissement_zone_id'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Tel</th>
                    <td>
                        <?php echo $form['cp_etablissement_tel']->renderError() ?>
                        <?php echo $form['cp_etablissement_tel'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Fax</th>
                    <td>
                        <?php echo $form['cp_etablissement_fax']->renderError() ?>
                        <?php echo $form['cp_etablissement_fax'] ?>
                    </td>
                </tr>

                <tr>
                    <th>Mail</th>
                    <td>
                        <?php echo $form['cp_etablissement_mail']->renderError() ?>
                        <?php echo $form['cp_etablissement_mail'] ?>
                    </td>
                </tr>

                <tr>
                    <th>Web</th>
                    <td>
                        <?php echo $form['cp_etablissement_web']->renderError() ?>
                        <?php echo $form['cp_etablissement_web'] ?>
                    </td>
                </tr>


                <tr>
                    <th>Statut</th>
                    <td>
                        <?php echo $form['cp_etablissement_cp_etablissement_statut_id']->renderError() ?>
                        <?php echo $form['cp_etablissement_cp_etablissement_statut_id'] ?>
                    </td>
                </tr>

                <tr>
                    <th>Description (BO)</th>
                    <td  colspan="3">
                        <?php echo $form['cp_etablissement_commentaire']->renderError() ?>
                        <?php echo $form['cp_etablissement_commentaire'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Infos pour annuaire</th>
                    <td  colspan="3">
                        <?php echo $form['cp_etablissement_infos']->renderError() ?>
                        <?php echo $form['cp_etablissement_infos'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Actions (en faveur de la mobilité) pour annuaire</th>
                    <td  colspan="3">
                        <?php echo $form['cp_etablissement_actions']->renderError() ?>
                        <?php echo $form['cp_etablissement_actions'] ?>
                    </td>
                </tr>


            </tbody>
        </table> 


    </div>    
</form>
