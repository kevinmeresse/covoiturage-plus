<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_action_ctc/' . ($form->getObject()->isNew() ? 'create1' : 'update1') . (!$form->getObject()->isNew() ? '?cp_action_ctc_id=' . $form->getObject()->getCpActionCtcId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
        <div id="contact-action-form">
            <table>

                <tbody>
                <?php echo $form->renderGlobalErrors() ?>
                    <?php echo $form->renderHiddenFields(false) ?>
                <tr>
                    <th>Type d'action</th>
                    <td>
                        <?php echo $form['cp_action_ctc_cp_type_action_id']->renderError() ?>
                        <?php echo $form['cp_action_ctc_cp_type_action_id'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Date d'échéance</th>
                    <td>
                        <?php echo $form['cp_action_ctc_date_echeance']->renderError() ?>
                        <?php echo $form['cp_action_ctc_date_echeance'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Intervenant C+</th>
                    <td>
                        <?php echo $form['cp_action_ctc_user_id']->renderError() ?>
                        <?php echo $form['cp_action_ctc_user_id'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Détail</th>
                    <td>
                        <?php echo $form['cp_action_ctc_detail']->renderError() ?>
                        <?php echo $form['cp_action_ctc_detail'] ?>
                    </td>
                </tr>





            </tbody>
        </table>
    </div> 



    <?php if (isset($popup) && $popup == 1): ?>

                            <p>
                           
                                <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
                           
                        </p>
                        <input type="hidden" name="popup" value="1" />
                        
<?php if (!$form->getObject()->isNew()): ?>

                                <p class="supprimer"><?php echo link_to('Supprimer', 'cp_action_ctc/delete?popup=1&cp_action_ctc_id=' . $form->getObject()->getCpActionCtcId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr?')) ?></p>
<?php endif; ?>
<?php else: ?>
                                    <p class="retour-liste"><a href="<?php echo url_for('cp_contact/editEtb?cp_contact_id=' . $ctc_id) ?>">Retour &agrave; la liste</a></p>
<?php if (!$form->getObject()->isNew()): ?>
                                        <p class="supprimer"><?php echo link_to('Supprimer', 'cp_action_ctc/delete?cp_action_ctc_id=' . $form->getObject()->getCpActionCtcId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr?')) ?></p>
<?php endif; ?>
<?php endif; ?>




<input type="submit" value="Sauvegarder" />
<br class="clear"/>
</form>
