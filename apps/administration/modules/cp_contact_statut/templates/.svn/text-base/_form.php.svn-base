<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_contact_statut/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cp_contact_statut_id='.$form->getObject()->getCpContactStatutId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="contact">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<p class="retour-liste"><a href="<?php echo url_for('cp_contact_statut/index') ?>">Retour à la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
            <p class="supprimer"><?php echo link_to('Supprimer', 'cp_contact_statut/delete?cp_contact_statut_id='.$form->getObject()->getCpContactStatutId(), array('method' => 'delete', 'confirm' => 'Etes vous sur?')) ?></p>
          <?php endif; ?>
            <p><input type="submit" value="Sauvegarder" /></p>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Libellé</th>
        <td>
          <?php echo $form['cp_contact_statut_libelle']->renderError() ?>
          <?php echo $form['cp_contact_statut_libelle'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
