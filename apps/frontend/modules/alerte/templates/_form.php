<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('alerte/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_trajet_alerte=' . $form->getObject()->getIdTrajetAlerte() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields(false) ?>
                    &nbsp;<a href="<?php echo url_for('alerte/index') ?>">Back to list</a>
                    <?php if (!$form->getObject()->isNew()): ?>
                        &nbsp;<?php echo link_to('Delete', 'alerte/delete?id_trajet_alerte=' . $form->getObject()->getIdTrajetAlerte(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                    <?php endif; ?>
                    <input type="submit" value="Save" />
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th><?php echo $form['id_site']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_site']->renderError() ?>
                    <?php echo $form['id_site'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['cle']->renderLabel() ?></th>
                <td>
                    <?php echo $form['cle']->renderError() ?>
                    <?php echo $form['cle'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['etat']->renderLabel() ?></th>
                <td>
                    <?php echo $form['etat']->renderError() ?>
                    <?php echo $form['etat'] ?>
                </td>
            </tr>

            <tr>
                <th><?php echo $form['mail_utilisateur']->renderLabel() ?></th>
                <td>
                    <?php echo $form['mail_utilisateur']->renderError() ?>
                    <?php echo $form['mail_utilisateur'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['tel_utilisateur']->renderLabel() ?></th>
                <td>
                    <?php echo $form['tel_utilisateur']->renderError() ?>
                    <?php echo $form['tel_utilisateur'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['id_type_trajet']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_type_trajet']->renderError() ?>
                    <?php echo $form['id_type_trajet'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['id_depart']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_depart']->renderError() ?>
                    <?php echo $form['id_depart'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['id_depart2']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_depart2']->renderError() ?>
                    <?php echo $form['id_depart2'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['id_depart_pays']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_depart_pays']->renderError() ?>
                    <?php echo $form['id_depart_pays'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['depart_type']->renderLabel() ?></th>
                <td>
                    <?php echo $form['depart_type']->renderError() ?>
                    <?php echo $form['depart_type'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['depart_autre_lieu']->renderLabel() ?></th>
                <td>
                    <?php echo $form['depart_autre_lieu']->renderError() ?>
                    <?php echo $form['depart_autre_lieu'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['id_destination']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_destination']->renderError() ?>
                    <?php echo $form['id_destination'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['id_destination2']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_destination2']->renderError() ?>
                    <?php echo $form['id_destination2'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['id_destination_pays']->renderLabel() ?></th>
                <td>
                    <?php echo $form['id_destination_pays']->renderError() ?>
                    <?php echo $form['id_destination_pays'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['destination_type']->renderLabel() ?></th>
                <td>
                    <?php echo $form['destination_type']->renderError() ?>
                    <?php echo $form['destination_type'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['destination_autre_lieu']->renderLabel() ?></th>
                <td>
                    <?php echo $form['destination_autre_lieu']->renderError() ?>
                    <?php echo $form['destination_autre_lieu'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['date_creation']->renderLabel() ?></th>
                <td>
                    <?php echo $form['date_creation']->renderError() ?>
                    <?php echo $form['date_creation'] ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['bascule']->renderLabel() ?></th>
                <td>
                    <?php echo $form['bascule']->renderError() ?>
                    <?php echo $form['bascule'] ?>
                </td>
            </tr>
        </tbody>
    </table>
</form>
