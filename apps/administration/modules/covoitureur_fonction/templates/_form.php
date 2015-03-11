<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('covoitureur_fonction/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_covoitureur_fonction='.$form->getObject()->getIdCovoitureurFonction() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div id="fonction-covoit-form">
  <table>
    
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nom']->renderLabel() ?></th>
        <td>
          <?php echo $form['nom']->renderError() ?>
          <?php echo $form['nom'] ?>
        </td>
      </tr>
      
    </tbody>
  </table>
  
 </div>
          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('covoitureur_fonction/index') ?>">Retour &agrave; la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
            <p class="supprimer"><?php echo link_to('Supprimer', 'covoitureur_fonction/delete?id_covoitureur_fonction='.$form->getObject()->getIdCovoitureurFonction(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />
		<br class="clear"/>
</form>
