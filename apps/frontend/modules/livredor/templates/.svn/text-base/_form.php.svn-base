<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('livredor/create'); ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php echo $form->renderGlobalErrors() ?>
    <p><?php echo $form['prenom']->renderError() ?>
        <?php echo $form['prenom'] ?></p>
    <p><?php echo $form['nom']->renderError() ?>
        <?php echo $form['nom'] ?></p>

    <p><?php echo $form['mail']->renderError() ?>
        <?php echo $form['mail'] ?></p>
    <p>
        <?php echo $form['message']->renderError() ?>
        <?php echo $form['message'] ?></p>
    <p><input type="submit" value="OK"></p>    
</form>
