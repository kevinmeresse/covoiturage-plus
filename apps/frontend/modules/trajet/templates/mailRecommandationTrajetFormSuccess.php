<html>
    <body>
        <h1>Envoyer par mail</h1><br> 
        <h4>Pour partager ce trajet, veuillez compléter le formulaire suivant.</h4>

        <form action="<?php echo url_for('trajet/EnvoiMailRecommandationTrajet') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

            <?php echo $form->renderHiddenFields(false) ?>
            <?php echo $form->renderGlobalErrors() ?>

            <?php echo $form['sender_name']->renderLabel() ?><?php echo $form['sender_name'] ?>
            <?php echo $form['sender_name']->renderError() ?>

            <?php echo $form['sender_mail']->renderLabel() ?><?php echo $form['sender_mail'] ?>
            <?php echo $form['sender_mail']->renderError() ?>

            <?php echo $form['destination_mail']->renderLabel() ?><?php echo $form['destination_mail'] ?>
            <?php echo $form['destination_mail']->renderError() ?>


            <p class="valide"><input type="submit" value="Envoyer"><br class="clear"/></p>

        </form>
    </body>
</html>

