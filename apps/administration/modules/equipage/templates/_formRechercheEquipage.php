<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="form-tri">
    <form action="<?php echo url_for('equipage/list') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>

        <table>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <?php echo $form->renderHiddenFields(false) ?>


                        <input type="submit" value="Rechercher" />
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php echo $form->renderGlobalErrors() ?>


                <tr>
                    <th>Nom de l'équipage</th>
                    <td colspan="3">
                        <?php echo $form['nom_equipage']->renderError() ?>
                        <?php echo $form['nom_equipage'] ?>
                    </td>
                </tr>

                <tr>
                    <th>Initiales du créateur</th>
                    <td colspan="3">
                        <?php echo $form['id_profil']->renderError() ?>
                        <?php echo $form['id_profil'] ?>
                    </td>
                </tr>
                <tr>
                    <th>Ville de départ</th>
                    <td>
                        <?php echo $form['depart_ville']->renderError() ?>
                        <?php
                        echo jq_input_auto_complete_tag(
                        'equipagerecherche[depart_ville]', $tab_equipage_autoc['depart_ville'], url_for1('trajet/autocomplete?target=depville', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                        ?>

                    </td>
                    <td>&nbsp;</td>
                    <th>Ville de destination</th>
                    <td>
                        <?php echo $form['dest_ville']->renderError() ?>
                        <?php
                        echo jq_input_auto_complete_tag(
                        'equipagerecherche[dest_ville]', $tab_equipage_autoc['dest_ville'], url_for1('trajet/autocomplete?target=destville', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                        ?>

                    </td>
                </tr>

                <tr>
                    <th>Nom du covoitureur</th>
                    <td>
                        <?php echo $form['covoitureur']->renderError() ?>
                        <?php
                        echo jq_input_auto_complete_tag(
                        'equipagerecherche[covoitureur]', $tab_equipage_autoc['covoitureur'], url_for1('covoitureur/autocompleteCovoitureur', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                        ?>

                    </td>
                    <td>&nbsp;</td>
                    <th>Statut</th>
                    <td >
                        <?php echo $form['action_statut_id']->renderError() ?>
                        <?php echo $form['action_statut_id'] ?>
                    </td>
                </tr>

            </tbody>
        </table>
    </form>
</div>