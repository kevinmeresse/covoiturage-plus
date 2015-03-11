<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery'); ?>

<form action="<?php echo url_for('groupe_stat/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_groupe_stat='.$form->getObject()->getIdGroupeStat() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td colspan="3">
                    <?php echo $form->renderHiddenFields(false) ?>
                    &nbsp;<p class="retour-liste"><a href="<?php echo url_for('groupe_stat/index') ?>">Retour à la liste</a></p>
                    <?php if (!$form->getObject()->isNew()): ?>

                    &nbsp;<p class="supprimer"><?php echo link_to('Supprimer', 'groupe_stat/delete?id_groupe_stat='.$form->getObject()->getIdGroupeStat(), array('method' => 'delete', 'confirm' => 'Etes vous sûr?')) ?></p>

                    <?php endif; ?>
                    <input type="submit" value="Sauvegarder" />
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th>Intitulé</th>
                <td colspan="2">
                    <?php echo $form['intitule']->renderError() ?>
                    <?php echo $form['intitule'] ?>
                </td>

            </tr>


            <tr>
                <th><?php echo $form['etat']->renderLabel() ?></th>
                <td colspan="2">
                    <?php echo $form['etat']->renderError() ?>
                    <?php echo $form['etat'] ?>
                </td>

            </tr>

            <tr>
                <th>Ville à associer</th>
                <td>
                    <?php echo $form['ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                    'groupe_stat[ville]', $tab_ville_autoc['ville'], url_for1('ville_fr/autocomplete', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                    ?>
                    <?php echo jq_link_to_remote('ajouter la ville', array(
                    'update' => 'ajout_ville',
                    'url'    => 'groupe_stat/addDelVille',
                    'with' => "'ville=' + \$('#groupe_stat_ville').val() + '&tab_param=' + \$('#groupe_stat_tab_param').val()+ '&sens=add' ",
                    )) ?>

                </td>
                <td>
                    <fieldset>
                    <legend>Villes associées</legend>
                    <div id="ajout_ville">
                    <?php if($form->getObject()->isNew()):?>
                    <input id="groupe_stat_tab_param" type="hidden" name="groupe_stat[tab_param]" value="">
                    <?php endif; ?>
                    <?php include_component('groupe_stat', 'addDelVille', array('tab_param' => $tab_param)) ?>
                    </div>
                    </fieldset>
                </td>

            </tr>


        </tbody>
    </table>
</form>
