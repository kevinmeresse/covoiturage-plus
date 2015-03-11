<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div id="nouveau-vehicule">
    <form action="<?php echo url_for('covoitureur/' . ($form->getObject()->isNew() ? 'createVehicule' : 'updateVehicule') . (!$form->getObject()->isNew() ? '?id_utilisateur=' . $form->getObject()->getIdUtilisateur() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <?php if (!$form->getObject()->isNew()): ?>
            <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>



        <?php echo $form->renderGlobalErrors() ?>


        <div class="vehicule-new five columns">
            <p>
                <?php echo $form['id_marque']->renderLabel('Marque') ?></p>
            <?php echo $form['id_marque']->renderError() ?>
            <?php
            echo $form['id_marque']->render(array(
                'onchange' => jq_remote_function(array(
                    'update' => 'modele',
                    'url' => 'covoitureur/listVehiculeModeleParMarque',
                    'with' => "'idmarque='+value+'&idComposantForm=covoitureur_vehicule_id_modele&nomComposantForm=covoitureur_vehicule[id_modele]'"))
            ))
            ?>

            <br class="clear"/>

            <p><label>Motorisation</label></p>
            <?php echo $form['id_motorisation']->renderError() ?>
            <?php echo $form['id_motorisation'] ?>

            <br class="clear"/>

            <p><?php echo $form['couleur']->renderLabel() ?></p>
            <?php echo $form['couleur']->renderError() ?>
            <?php echo $form['couleur'] ?>


        </div>

        <div class="vehicule-new five columns">

            <p><?php echo $form['id_modele']->renderLabel('Modèle') ?></p>
            <?php echo $form['id_modele']->renderError() ?>

            <div id="modele">
                <?php if ($form->getObject()->getIdModele()): ?>
                    <?php echo $form->getObject()->getVehiculeModele(); ?>
                    <input type="hidden" id="covoitureur_vehicule_id_modele" name="covoitureur_vehicule[id_modele]" value="<?php echo $form->getObject()->getIdModele() ?>" />
                <?php endif; ?>
            </div>
            <br class="clear"/>
            <p><label>Année</label></p>
            <?php echo $form['annee']->renderError() ?>
            <?php echo $form['annee'] ?>				

        </div>

        <br class="clear"/>
        <?php echo $form->renderHiddenFields(false) ?>
        <p class="retour-liste"><a href="<?php echo url_for('covoitureur/monCompteVehicules') ?>">Retour à la liste</a></p>
        <?php if (!$form->getObject()->isNew()): ?>
            <p class="supprimer"><?php echo link_to('Supprimer', 'covoitureur/deleteVehicule?id_vehicule=' . $form->getObject()->getIdVehicule(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></p>
        <?php endif; ?>
        <input type="submit" value="Sauvegarder" />

    </form>
</div>




