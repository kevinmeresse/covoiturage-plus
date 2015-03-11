<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_action_etb/' . ($form->getObject()->isNew() ? 'createEtb' : 'updateEtb') . (!$form->getObject()->isNew() ? '?cp_action_etb_id=' . $form->getObject()->getCpActionEtbId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
        <table  class="action-assoc-etab">
            <tfoot>
                <tr>
                    <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>


                    <?php if (isset($popup) && $popup == 1): ?>

                        <p>
                        
                            <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
                        
                        </p>
                        <input type="hidden" name="popup" value="1" />

                        <?php if (!$form->getObject()->isNew()): ?>
                                <p class="supprimer"><?php echo link_to('Supprimer', 'cp_action_etb/delete?popup=1&cp_action_etb_id=' . $form->getObject()->getCpActionEtbId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
                        <?php endif; ?>
                    <?php else: ?>
                                <p class="retour-liste"><a href="<?php echo url_for('cp_etablissement/edit?cp_etablissement_id=' . $etb_id) ?>">Retour &agrave; la liste</a></p>
                        <?php if (!$form->getObject()->isNew()): ?>
                                        <p class="supprimer"><?php echo link_to('Supprimer', 'cp_action_etb/delete1?cp_action_etb_id=' . $form->getObject()->getCpActionEtbId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                                    <input type="submit" value="Sauvegarder" />
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
                            <tr>
                    <th>Etablissement / RS</th>
                    <td>
                        <?php echo $etb_name ?>
                    </td>
                </tr>
                                    <tr>
                                        <th>Type d'action</th>
                                        <td>
                    <?php echo $form['cp_action_etb_cp_type_action_id']->renderError() ?>
                    <?php echo $form['cp_action_etb_cp_type_action_id'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Date d'échéance</th>
                                <td>
                    <?php echo $form['cp_action_etb_date_echeance']->renderError() ?>
                    <?php echo $form['cp_action_etb_date_echeance'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Intervenant C+</th>
                                <td>
                    <?php echo $form['cp_action_etb_user_id']->renderError() ?>
                    <?php echo $form['cp_action_etb_user_id'] ?>
                                </td>
                            </tr>

                            <tr>
                                <th>Contact</th>
                                <td>
                    <?php echo $form['cp_action_etb_cp_contact_id']->renderError() ?>
                    <?php echo $form['cp_action_etb_cp_contact_id'] ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Détail</th>
                                <td>
                    <?php echo $form['cp_action_etb_detail']->renderError() ?>
                    <?php echo $form['cp_action_etb_detail'] ?>
                </td>
            </tr>



        </tbody>
    </table>
</form>
