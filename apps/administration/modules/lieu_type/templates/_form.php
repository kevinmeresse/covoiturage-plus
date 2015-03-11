<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('lieu_type/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_lieu_type='.$form->getObject()->getIdLieuType() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div id="type-lieu-form">
  <table>


    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Libellé</th>
        <td>
          <?php echo $form['libelle_lieu_type']->renderError() ?>
          <?php echo $form['libelle_lieu_type'] ?>
        </td>
      </tr>


    </tbody>
  </table>
 </div> 
  
   
          <?php echo $form->renderHiddenFields(false) ?>
          <?php if($form->getDefault('evenement') == 0): ?>
            <p class="retour-liste"><a href="<?php echo url_for('lieu_type/index') ?>">Retour &agrave; la liste</a></p>
          <?php else: ?>
            <p class="retour-liste"><a href="<?php echo url_for('lieu_type/indexEvenement') ?>">Retour &agrave; la liste</a></p>
          <?php endif; ?>
          <?php if (!$form->getObject()->isNew()): ?>
            <p class="supprimer"><?php echo link_to('Supprimer', 'lieu_type/delete?evenement='.$form->getDefault('evenement').'&id_lieu_type='.$form->getObject()->getIdLieuType(), array('method' => 'delete', 'confirm' => 'Etes vous sur?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauver" />
		  <br class="clear"/>
</form>
