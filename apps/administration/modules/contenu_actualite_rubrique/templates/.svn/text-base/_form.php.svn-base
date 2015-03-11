<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<form action="<?php echo url_for('contenu_actualite_rubrique/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_actualite_rubrique='.$form->getObject()->getIdActualiteRubrique() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="rubrique-actu-form">
  <table >

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
        <th>Tite</th>
        <td>
          <?php echo $form['fr_titre']->renderError() ?>
          <?php echo $form['fr_titre'] ?>
        </td>
      </tr>


    </tbody>
  </table>
 </div> 

          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('contenu_actualite_rubrique/index') ?>">Retour &agrave; la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
          <p class="supprimer"><?php echo link_to('Supprimer', 'contenu_actualite_rubrique/delete?id_actualite_rubrique='.$form->getObject()->getIdActualiteRubrique(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />
		  <br class="clear"/>

</form>
