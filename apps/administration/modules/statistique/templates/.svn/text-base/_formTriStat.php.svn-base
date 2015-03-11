<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery'); ?>

<div class="form-tri">

    <h2>Tri</h2>
    <br/>
    <form action="<?php echo url_for('statistique/statAccueil') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>





        <table>
            <tr>
                <td>
                    Etablissement/Société
                </td>
                <td>
                    <?php echo $form['etablissement']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                    'statistiquetri[etablissement]', $tab_stat_param['etablissement'], url_for1('cp_etablissement/autocomplete?target=nom', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                    ?>
                </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>
                    <?php echo $form['communaute_commune']->renderLabel() ?>
                </td>
                <td>
                    <?php echo $form['communaute_commune']->renderError() ?>
                    <?php echo $form['communaute_commune'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form['date_debut']->renderLabel() ?>
                </td>
                <td>
                    <?php echo $form['date_debut']->renderError() ?>
                    <?php echo $form['date_debut'] ?>
                </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td>
                    <?php echo $form['groupe_stat']->renderLabel() ?>
                </td>
                <td>
                    <?php echo $form['groupe_stat']->renderError() ?>
                    <?php echo $form['groupe_stat'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form['date_fin']->renderLabel() ?>
                </td>
                <td>
                    <?php echo $form['date_fin']->renderError() ?>
                    <?php echo $form['date_fin'] ?>
                </td>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5">
                    <?php echo $form->renderHiddenFields(false) ?>
                    <?php echo $form->renderGlobalErrors() ?>
                    <input type="submit" value="Rechercher" />
                </td>

            </tr>
        </table>
    </form>
</div>