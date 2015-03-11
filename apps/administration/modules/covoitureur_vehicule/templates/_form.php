<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<form action="<?php echo url_for('covoitureur_vehicule/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_vehicule=' . $form->getObject()->getIdVehicule() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
        <div>
            <b>Covoitureur</b>
            <?php echo $form->getObject()->getCovoitureur() ?>
        </div>
        <br class="clear"/>
    <div id="covoitureur-vehicule-form">
        <?php echo $form->renderGlobalErrors() ?>
        <?php //echo $form['cle']->renderLabel()  ?>
        <?php //echo $form['cle']->renderError() ?>
        <?php //echo $form['cle'] ?>
        <div>  
            <?php echo $form['etat']->renderLabel() ?>
            <?php echo $form['etat']->renderError() ?>
            <?php echo $form['etat'] ?>

            <?php //echo $form['date_creation']->renderLabel()  ?>
            <?php //echo $form['date_creation']->renderError() ?>
            <?php //echo $form['date_creation'] ?>
        </div>



        <div>

            <?php echo $form['id_marque']->renderLabel('Marque') ?>
            <?php echo $form['id_marque']->renderError() ?>
            <?php
            echo $form['id_marque']->render(array(
                'onchange' => jq_remote_function(array(
                    'update' => 'modele',
                    'url' => 'vehicule_modele/listModeleParMarque',
                    'with' => "'idmarque='+value+'&idComposantForm=covoitureur_vehicule_id_modele&nomComposantForm=covoitureur_vehicule[id_modele]'"))
            ))
            ?>
        </div>

        <div>
            <?php echo $form['id_modele']->renderLabel('Modèle') ?>
            <?php echo $form['id_modele']->renderError() ?>


            <div id="modele">
                <?php if ($form->getObject()->getIdModele()): ?>
                    <?php echo $form->getObject()->getVehiculeModele(); ?>

                <?php endif; ?>
            </div>
        </div>
        <br class="clear"/>
        <div>
            <?php echo $form['id_motorisation']->renderLabel('Motorisation') ?>
            <?php echo $form['id_motorisation']->renderError() ?>
            <?php echo $form['id_motorisation'] ?>
        </div>

        <div>
            <?php echo $form['annee']->renderLabel('Année') ?>						   
            <?php echo $form['annee']->renderError() ?>
            <?php echo $form['annee'] ?>
        </div>

        <div>
            <?php echo $form['couleur']->renderLabel('Couleur') ?>
            <?php echo $form['couleur']->renderError() ?>
            <?php echo $form['couleur'] ?>
        </div>
        <br class="clear"/>
    </div>
    <?php echo $form->renderHiddenFields() ?>
    <p class="retour-liste"><a href="<?php echo url_for('covoitureur_vehicule/list') ?>">Retour &agrave; la liste</a></p>
    <?php if (!$form->getObject()->isNew()): ?>
        <p class="supprimer"><?php echo link_to('Supprimer', 'covoitureur_vehicule/delete?id_vehicule=' . $form->getObject()->getIdVehicule(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></p>
    <?php endif; ?>
    <input type="submit" value="Sauver" />
    <br class="clear"/>
    <br/>

</form>
