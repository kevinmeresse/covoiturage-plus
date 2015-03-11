<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('csp/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_csp='.$form->getObject()->getIdCsp() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>

    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Intitulé</th>
        <td>
          <?php echo $form['intitule']->renderError() ?>
          <?php echo $form['intitule'] ?>
        </td>
      </tr>
    </tbody>
  </table>
<?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('csp/index') ?>">Retour &agrave; la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
          <p class="supprimer"><?php echo link_to('Supprimer', 'csp/delete?id_csp='.$form->getObject()->getIdCsp(), array('method' => 'delete', 'confirm' => 'Etes vous sûr?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauver" />
<br class="clear"/>
</form>
