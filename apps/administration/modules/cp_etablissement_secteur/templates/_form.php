<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_etablissement_secteur/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cp_etablissement_secteur_id='.$form->getObject()->getCpEtablissementSecteurId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div id="etablissement-secteur-form">
  <table>
  
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Secteur</th>
        <td>
          <?php echo $form['cp_etablissement_secteur_nom']->renderError() ?>
          <?php echo $form['cp_etablissement_secteur_nom'] ?>
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
          <p class="retour-liste"><a href="<?php echo url_for('cp_etablissement_secteur/index') ?>">Retour à la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
          <p class="supprimer"><?php echo link_to('Supprimer', 'cp_etablissement_secteur/delete?cp_etablissement_secteur_id='.$form->getObject()->getCpEtablissementSecteurId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />

		  <br class="clear"/>
</form>
