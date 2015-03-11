<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery'); ?>

<?php if ($tab_ville_autoc['evenement'] == 0): ?>
    <form action="<?php echo url_for('lieu/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_lieu=' . $form->getObject()->getIdLieu() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php else: ?>
        <form action="<?php echo url_for('lieu/' . ($form->getObject()->isNew() ? 'createEvenement' : 'updateEvenement') . (!$form->getObject()->isNew() ? '?id_lieu=' . $form->getObject()->getIdLieu() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <?php endif; ?>
        <?php if (!$form->getObject()->isNew()): ?>
            <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>
        <div id="lieu-form">
            <table class="lieu-edit">

                <tbody>
                    <?php echo $form->renderGlobalErrors() ?>


                    <tr>
                        <th>Nom</th>
                        <td>
                            <?php echo $form['libelle_lieu']->renderError() ?>
                            <?php echo $form['libelle_lieu'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>
                            <?php echo $form['id_lieu_type']->renderError() ?>
                            <?php echo $form['id_lieu_type'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Adresse pour géolocalisation</th>
                        <td><input id="addresspicker_map" /></td>
                    </tr>
                    <tr>
                        <th>Ville</th>
                        <td>
                            <?php echo $form['ville']->renderError() ?>
                            <?php echo $form['ville'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Code postal</th>
                        <td>
                            <?php echo $form['code_postal']->renderError() ?>
                            <?php echo $form['code_postal'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Adresse</th>
                        <td>
                            <?php echo $form['adresse']->renderError() ?>
                            <?php echo $form['adresse'] ?>
                        </td>
                    </tr>
     
                    <tr>
                        <th>Date de publication</th>
                        <td>
                            <?php echo $form['date_publication']->renderError() ?>
                            <?php echo $form['date_publication'] ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Visible dans la liste ?</th>
                        <td>
                            <?php echo $form['visible_dans_liste']->renderError() ?>
                            <?php echo $form['visible_dans_liste'] ?>
                        </td>
                    </tr>


                </tbody>
            </table>
            <div id="map" style="width: 400px; height: 400px"></div>
        </div>

        <?php echo $form->renderHiddenFields(true) ?>
        <?php if ($tab_ville_autoc['evenement'] == 0): ?>
            <p class="retour-liste"><a href="<?php echo url_for('lieu/index') ?>">Retour &agrave; la liste</a></p>
            <?php if (!$form->getObject()->isNew()): ?>
                &nbsp;<p class="supprimer"><?php echo link_to('Supprimer', 'lieu/delete?id_lieu=' . $form->getObject()->getIdLieu(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></p>
            <?php endif; ?>
        <?php else: ?>
            <p class="retour-liste"><a href="<?php echo url_for('lieu/listEvenement') ?>">Retour &agrave; la liste</a></p>
            <?php if (!$form->getObject()->isNew()): ?>
                &nbsp;<p class="supprimer"><?php echo link_to('Supprimer', 'lieu/deleteEvenement?id_lieu=' . $form->getObject()->getIdLieu(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></p>
            <?php endif; ?>       
        <?php endif; ?>
        <input type="submit" value="Sauvegarder" />

        <br class="clear"/>
    </form>
