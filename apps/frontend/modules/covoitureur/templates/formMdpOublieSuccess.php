<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<h2>Mot de passe oublié</h2>
<form action="<?php echo url_for('covoitureur/envoiMdpOublie') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>


<?php echo $form->renderHiddenFields(true) ?>
    <?php echo $form->renderGlobalErrors() ?>

    <p><?php echo $form['mail']->renderLabel() ?></p>
    <?php echo $form['mail']->renderError() ?>
    <?php echo $form['mail'] ?>


    <input type="submit" value="Envoyer" />

</form>





