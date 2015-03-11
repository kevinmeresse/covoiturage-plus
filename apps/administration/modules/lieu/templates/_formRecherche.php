<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery'); ?>

<div class="form-tri">
<?php if ($tab_ville_autoc['evenement'] == 0): ?>
    <form action="<?php echo url_for('lieu/list') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php else: ?>
    <form action="<?php echo url_for('lieu/listEvenement' ) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php endif; ?>


        <?php echo $form->renderGlobalErrors() ?>


        <div class="etab-search">
            <?php echo $form['id_lieu_type']->renderLabel('Type') ?>
            <?php echo $form['id_lieu_type']->renderError() ?>
            <?php echo $form['id_lieu_type'] ?>
        
        </div>
        
        <div class="etab-search">
            <?php echo $form['ville']->renderLabel('Ville') ?>
            <?php echo $form['ville']->renderError() ?>
            <?php
                echo jq_input_auto_complete_tag(
                    'lieuRecherche[ville]', $tab_ville_autoc['ville'], url_for1('ville_fr/autocomplete', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
            ?>
        
        </div>

        <?php echo $form->renderHiddenFields(false) ?> 
        <input type="submit" value="Valider" />

        <br class="clear"/>
    </form>
</div>