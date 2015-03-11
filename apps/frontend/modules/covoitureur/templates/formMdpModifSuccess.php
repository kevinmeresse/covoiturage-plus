<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<h2>Mot de passe oublié</h2>
<form action="<?php echo url_for('covoitureur/updateMdpModif') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>


<?php echo $form->renderHiddenFields(true) ?>
    <?php echo $form->renderGlobalErrors() ?>

    <p><?php echo $form['mot_de_passe']->renderLabel() ?></p>
    <?php echo $form['mot_de_passe']->renderError() ?>
    <?php echo $form['mot_de_passe'] ?>
    <br>
    <p><?php echo $form['mot_de_passe_new']->renderLabel() ?></p>
    <?php echo $form['mot_de_passe_new']->renderError() ?>
    <?php echo $form['mot_de_passe_new'] ?>
    
    <p><?php echo $form['valid_mot_de_passe_new']->renderLabel() ?></p>
    <?php echo $form['valid_mot_de_passe_new']->renderError() ?>
    <?php echo $form['valid_mot_de_passe_new'] ?>


    <input type="submit" value="Envoyer" />

</form>





