<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_action_cv/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cp_action_cv_id='.$form->getObject()->getCpActionCvId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <div id="covoitureur-action-form">
        <table>

            <tbody>
                <?php echo $form->renderGlobalErrors() ?>
                <tr>
                    <th>Action relative à l'inscrit</th>
                    <td>

                        <?php echo $form->getObject()->getCovoitureur() ?>
                    </td>
                </tr>
                <tr>
                    <th>Détail</th>
                    <td>
                        <?php echo $form['cp_action_cv_detail']->renderError() ?>
                        <?php echo $form['cp_action_cv_detail'] ?>
                    </td>
                </tr>
                
                <tr>
                    <th>Date échéance</th>
                    <td>
                        <?php echo $form['cp_action_cv_date_echeance']->renderError() ?>
                        <?php echo $form['cp_action_cv_date_echeance'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Type d'action</th>
                    <td>
                        <?php echo $form['cp_action_cv_cp_type_action_id']->renderError() ?>
                        <?php echo $form['cp_action_cv_cp_type_action_id'] ?>
                    </td>
                </tr>

                <tr>
                    <th>Emetteur</th>
                    <td>
                        <?php echo $form['cp_action_cv_user_id']->renderError() ?>
                        <?php echo $form['cp_action_cv_user_id'] ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php echo $form->renderHiddenFields(false) ?>


    <?php if (isset($popup) && $popup == 1): ?>

        <p>

            <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">

        </p>
        <input type="hidden" name="popup" value="1" />

        <?php if (!$form->getObject()->isNew()): ?>
           <p class="supprimer"><?php echo link_to('Supprimer', 'cp_action_cv/delete?popup=1&cp_action_cv_id=' . $form->getObject()->getCpActionCvId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
        <?php endif; ?>
    <?php else: ?>
        <p class="retour-liste"><a href="<?php echo url_for('covoitureur/edit?id_utilisateur='.$form->getObject()->getCovoitureur()->getIdUtilisateur()) ?>">Retour &agrave; la fiche</a></p>
        <?php if (!$form->getObject()->isNew()): ?>
            <p class="supprimer"><?php echo link_to('Supprimer', 'cp_action_cv/delete?cp_action_cv_id='.$form->getObject()->getCpActionCvId(), array('method' => 'delete', 'confirm' => 'Etes vous sûr?')) ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <input type="submit" value="Sauvegarder" />
    <br class="clear"/>
</form>
