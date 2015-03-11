<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_etablissement_horaire/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cp_etablissement_horaire_id='.$form->getObject()->getCpEtablissementHoraireId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div id="etablissement-horaire-form">
  <table>
    
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Nom du régime</th>
        <td>
          <?php echo $form['cp_etablissement_horaire_nom']->renderError() ?>
          <?php echo $form['cp_etablissement_horaire_nom'] ?>
        </td>
      </tr>
      <tr>
        <th>Etablissement</th>
        <td>
          <?php echo $form['cp_etablissement_cp_etablissement_id']->renderError() ?>
          <?php echo $form['cp_etablissement_cp_etablissement_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
  
          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('cp_etablissement_horaire/index') ?>">Retour &agrave; la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
          <p class="supprimer"><?php echo link_to('Supprimer', 'cp_etablissement_horaire/delete?cp_etablissement_horaire_id='.$form->getObject()->getCpEtablissementHoraireId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />
		<br class="clear"/>
</form>
