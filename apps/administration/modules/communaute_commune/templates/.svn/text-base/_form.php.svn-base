

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('communaute_commune/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_communaute=' . $form->getObject()->getIdCommunaute() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>

    <div id="communaute-modif-form">
        <?php echo $form->renderGlobalErrors() ?>
        <table>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <?php echo $form->renderHiddenFields(false) ?>
                        <p class="retour-liste"><a href="<?php echo url_for('communaute_commune/index') ?>">Retour &agrave; la liste</a></p>
                        <?php if (!$form->getObject()->isNew()): ?>
                            <p class="supprimer"><?php echo link_to('Supprimer', 'communaute_commune/delete?id_communaute=' . $form->getObject()->getIdCommunaute(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
                        <?php endif; ?>
                        <input type="submit" value="Sauvegarder" />
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td><b>Nom</b></td>
                    <td>
                        <?php echo $form['nom']->renderError() ?>
                        <?php echo $form['nom']->render(array('class' => 'nom_cc')) ?>                    
                    </td>
                </tr>
                <tr>
                    <td><b>Ville de référence</b></td>
                    <td>
                        <?php echo $form['ville_ref']->renderError() ?>
                        <?php
                        echo jq_input_auto_complete_tag(
                                'communaute_commune[ville_ref]', $ville_ref, url_for1('trajet/autocomplete?target=depville', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                        ?>                   
                    </td>
                </tr>
                <tr>
                    <td><b>Contact</b></td>
                    <td>
                        <?php echo $form['contact']->renderError() ?>
                        <?php echo $form['contact'] ?>                   
                    </td>
                </tr>
                <tr>
                    <td><b>Présentation de la CC</b></td>
                    <td>
                        <?php echo $form['informations']->renderError() ?>
                        <?php echo $form['informations'] ?>                   
                    </td>
                </tr>
                <tr>
                    <td><b>Actions en faveur de la mobilité</b></td>
                    <td>
                        <?php echo $form['action']->renderError() ?>
                        <?php echo $form['action'] ?>                    
                    </td>
                </tr>
            </tbody>
        </table>


    </div>		  



</form>
<br class="clear"/>
<br/>