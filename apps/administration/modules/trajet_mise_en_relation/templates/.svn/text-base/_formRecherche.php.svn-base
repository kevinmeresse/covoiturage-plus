<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div class="form-tri">
    <form action="<?php echo url_for('trajet_mise_en_relation/index') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

        <table class="mer">
            <tfoot>
                <tr>
                    <td colspan="2">
                        <?php echo $form->renderHiddenFields(false) ?>

                        <input type="submit" value="Rechercher" />
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php echo $form->renderGlobalErrors() ?>


                <tr>
                    <th><?php echo $form['etat']->renderLabel() ?></th>
                    <td>
                        <?php echo $form['etat']->renderError() ?>
                        <?php echo $form['etat'] ?>
                    </td>
                </tr>


            </tbody>
        </table>
    </form>
</div>
