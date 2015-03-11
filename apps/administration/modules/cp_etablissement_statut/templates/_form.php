<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_etablissement_statut/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?cp_etablissement_statut_id=' . $form->getObject()->getCpEtablissementStatutId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>

        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th>Type de statut</th>
                <td>
                    <?php echo $form['cp_etablissement_statut_nom']->renderError() ?>
                    <?php echo $form['cp_etablissement_statut_nom'] ?>
                </td>
            </tr>
            <tr>
                <th>Ordre d'affichage</th>
                <td>
                    <?php echo $form['cp_etablissement_statut_ordre']->renderError() ?>
                    <?php echo $form['cp_etablissement_statut_ordre'] ?>
                </td>
            </tr>

        </tbody>
    </table>
    <?php echo $form->renderHiddenFields(false) ?>
    <p class="retour-liste"><a href="<?php echo url_for('cp_etablissement_statut/index') ?>">Retour &agrave; la liste</a></p>
    <?php if (!$form->getObject()->isNew()): ?>
        <p class="supprimer"><?php echo link_to('Supprimer', 'cp_etablissement_statut/delete?cp_etablissement_statut_id=' . $form->getObject()->getCpEtablissementStatutId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></p>
    <?php endif; ?>
    <input type="submit" value="Sauvegarder" />
    <br class="clear"/>
</form>
