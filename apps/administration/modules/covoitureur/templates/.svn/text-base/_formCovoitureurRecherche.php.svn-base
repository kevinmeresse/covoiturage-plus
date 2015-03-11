<div class="form-tri">

    <?php use_stylesheets_for_form($form) ?>
    <?php use_javascripts_for_form($form) ?>
    <?php use_helper('jQuery'); ?>


    <form action="<?php echo url_for('covoitureur/list') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <?php if (!$form->getObject()->isNew()): ?>
            <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>  


        <?php echo $form->renderGlobalErrors() ?>

        <?php //echo $tab_covoitureur_autoc['date_fin']; ?>

        <div class="covoitureur-search">
            <p class="label">Date d'inscription entre</p>
            <p>
                <?php echo $form['date_debut']->renderError() ?>
                <?php echo $form['date_debut'] ?></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;et&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <p>
                <?php echo $form['date_arret']->renderError() ?>
                <?php echo $form['date_arret'] ?></p>
        </div>

        <br class="clear"/>

        <div class="covoitureur-search covoit-info">		
            <?php echo $form['ville']->renderLabel() ?>
            <?php echo $form['ville']->renderError() ?>
            <?php //echo $form['ville'] ?>
            <?php
            echo jq_input_auto_complete_tag(
                    'covoitureurrechercheNew[ville]', $tab_covoitureur_autoc['ville'], url_for1('ville_fr/autocomplete', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
            ?>

            <br class="clear"/>
            <br/>

            <?php echo $form['mail']->renderLabel() ?>
            <?php echo $form['mail']->renderError() ?>
            <?php echo $form['mail'] ?>

            <br class="clear"/>
            <br/>

            <?php echo $form['nom']->renderLabel() ?>
            <?php echo $form['nom']->renderError() ?>
            <?php echo $form['nom'] ?>
            
            <br class="clear"/>
            <br/>
            
            <?php echo $form['prenom']->renderLabel() ?>
            <?php echo $form['prenom']->renderError() ?>
            <?php echo $form['prenom'] ?>
        </div>





        <div class="covoitureur-search covoit-radio"> 
            <p><?php echo $form['rsa']->renderLabel() ?></p>
            <?php echo $form['rsa']->renderError() ?>
            <?php echo $form['rsa'] ?>	 

            <br class="clear"/>

            <p>Equipagé ?</p>
            <?php echo $form['equipage']->renderError() ?>
            <?php echo $form['equipage'] ?>

            <br class="clear"/>

            <p><?php echo $form['newsletter']->renderLabel() ?></p>
            <?php echo $form['newsletter']->renderError() ?>
            <?php echo $form['newsletter'] ?>

            <br class="clear"/>

            <p>Trajet déposé ?</p>
            <?php echo $form['trajet']->renderError() ?>
            <?php echo $form['trajet'] ?>
            
            <br class="clear"/>

            
        </div>

        <br class="clear"/>	

        <div class="covoitureur-search">	
            <?php echo $form->renderHiddenFields(false) ?>
            <input type="submit" value="Rechercher" />    
            <?php echo button_to('Réinitialiser', 'covoitureur/listCancel', array('cancel' => 'cancel')); ?>
        </div>

        <br class="clear">
    </form>
</div>