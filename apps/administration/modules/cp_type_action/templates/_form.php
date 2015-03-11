<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_type_action/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?cp_type_action_id=' . $form->getObject()->getCpTypeActionId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <div id="type-action-form">

        <?php echo $form->renderGlobalErrors() ?>
        <div class="form-depot-trajet">
            <div class="label">
                <label>Type d'action</label>
            </div>
            <div class="form-input">
                <?php echo $form['cp_type_action_nom']->renderError() ?>
                <?php echo $form['cp_type_action_nom'] ?>
            </div>
        </div>
        <br class="clear"/>

        <div class="form-depot-trajet">
            <div class="label">
                <label>Ordre d'affichage</label>
            </div>
            <div class="form-input">
                <?php echo $form['cp_type_action_ordre']->renderError() ?>
                <?php echo $form['cp_type_action_ordre'] ?>
            </div>
        </div>
        <br class="clear"/>

        <div class="form-depot-trajet">
            <div class="label">
                <label>Association de l'action à</label>
            </div>
            <div class="form-input">
                <?php echo $form['cp_type_action_cible']->renderError() ?>
                <?php echo $form['cp_type_action_cible'] ?>
            </div>
        </div>
        <br class="clear"/>


        <div id="statut-action-form">
            <div class="form-depot-trajet">
                <div class="label">
                    <label>Statut associé</label>
                </div>
                <div class="form-input">
                    <?php echo $form['cp_type_action_statut_id']->renderError() ?>
                    <?php echo $form['cp_type_action_statut_id'] ?>
                </div>
            </div>
            <br class="clear"/>

            <div class="form-depot-trajet">
                <div class="label">
                    <label>Action liée à un envoi de mail</label>
                </div>
                <div class="form-input">
                    <?php echo $form['cp_type_action_type_mail']->renderError() ?>
                    <?php echo $form['cp_type_action_type_mail'] ?>
                </div>
            </div>
            <br class="clear"/>

        </div>
        <br class="clear"/>

    </div>
    <?php echo $form->renderHiddenFields(false) ?>
    <p class="retour-liste"><a href="<?php echo url_for('cp_type_action/index') ?>">Retour &agrave; la liste</a></p>
    <?php if (!$form->getObject()->isNew()): ?>
        <p class="supprimer"><?php echo link_to('Supprimer', 'cp_type_action/delete?cp_type_action_id=' . $form->getObject()->getCpTypeActionId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
    <?php endif; ?>
    <input type="submit" value="Sauvegarder" />
    <br class="clear"/>

</form>
