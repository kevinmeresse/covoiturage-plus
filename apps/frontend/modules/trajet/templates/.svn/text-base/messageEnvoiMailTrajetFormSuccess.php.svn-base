<h1>Contacter un covoitureur</h1><br> 
<h2>pour le trajet <?php echo $depart_ville." => ".$destination_ville. " (N° ".$id_trajet.")" ?> </h2>

<form action="<?php echo url_for('trajet/CovoitureurEnvoiMailTrajet?id_trajet=' . $id_trajet) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

    <?php echo $form->renderHiddenFields(false) ?>

    <?php echo $form->renderGlobalErrors() ?>

    <?php echo $form['texte']->renderLabel() ?>
    <?php echo $form['texte']->renderError() ?>
    <?php echo $form['texte'] ?>

    <p class="valide">	<input type="submit" value="Valider"><br class="clear"/></p>

</form>
