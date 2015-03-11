<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('contenu_actualite/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_actualite=' . $form->getObject()->getIdActualite() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
	<div id="contenu-actualite-form">
    <table>
       
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>

            <tr>
                <th><?php echo $form['etat']->renderLabel() ?></th>
                <td>
                    <?php echo $form['etat']->renderError() ?>
                    <?php echo $form['etat'] ?>
                </td>
            </tr>
            <tr>
            <tr>
                <th><?php echo $form['en_premiere_page']->renderLabel() ?></th>
                <td>
                    <?php echo $form['en_premiere_page']->renderError() ?>
                    <?php echo $form['en_premiere_page'] ?>
                </td>
            </tr>
            <tr>
                <th>Hiérarchie</th>
                <td>
                    <?php echo $form['position']->renderError() ?>
                    <?php echo $form['position'] ?>
                </td>
            </tr>
            <tr>
                <th><?php //echo $form['nombre_visualisation']->renderLabel()  ?></th>
                <td>
                    <?php //echo $form['nombre_visualisation']->renderError() ?>
                    <?php //echo $form['nombre_visualisation'] ?>
                </td>
            </tr>
            <tr>
                <th>Titre</th>
                <td>
                    <?php echo $form['fr_titre']->renderError() ?>
                    <?php echo $form['fr_titre'] ?>
                </td>
            </tr>
            <tr>
                <th>Brève en Une  (et liste)</th>
                <td>
                    <?php echo $form['fr_resume_html']->renderError() ?>
                    <?php echo $form['fr_resume_html'] ?>
                </td>
            </tr>
            <tr>
                <th>Contenu détaillé</th>
                <td>
                    <?php echo $form['fr_contenu_html']->renderError() ?>
                    <?php echo $form['fr_contenu_html'] ?>
                </td>
            </tr>

            <tr>
                <th>Date publication</th>
                <td>
                    <?php echo $form['date_publication']->renderError() ?>
                    <?php echo $form['date_publication'] ?>
                </td>
            </tr>
            <tr>
                <th>Date dépublication</th>
                <td>
                    <?php echo $form['date_depublication']->renderError() ?>
                    <?php echo $form['date_depublication'] ?>
                </td>
            </tr>


            <tr>
                <th>Visuel</th>
                <td>
                    <?php if (!$form->getObject()->isNew()): ?>
                        <?php //if ($contenu_actualite->getCheminPhotoActualite(ESC_RAW) != ''): ?>
                        <?php if ($contenu_actualite->getPhotoResume() != ''): ?>
                            <?php echo $contenu_actualite->getCheminPhotoActualite(ESC_RAW) ?>
                            <br>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php echo $form['photo_resume']->renderError() ?>
                    <?php echo $form['photo_resume'] ?>

                </td>
            </tr>

            <tr>
                <th>Suppression du visuel</th>
                <td>
                    <?php echo $form['supp_photo'] ?>
                </td>
            </tr>

        </tbody>
    </table>
	</div>
                    <?php echo $form->renderHiddenFields(false) ?>
                        <?php if ($ind_include == 1): ?>
                            <p class="retour-liste"><a href="<?php echo url_for('cms/index')?>">Retour &agrave; la liste</a></p>
                        <?php else: ?>
                            <p class="retour-liste"><a href="<?php echo url_for('contenu_actualite/index') ?>">Retour &agrave; la liste</a></p>
                        <?php endif; ?>
                    
                    <?php if (!$form->getObject()->isNew()): ?>
                        <p class="supprimer"><?php echo link_to('Supprimer', 'contenu_actualite/delete?id_actualite=' . $form->getObject()->getIdActualite(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
                    <?php endif; ?>
                    <input type="submit" value="Sauvegarder" />
					
			<br class="clear"/>
               
</form>

