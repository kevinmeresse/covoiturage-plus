<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('covoitureur_centre_interet/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('covoitureur_centre_interet/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'covoitureur_centre_interet/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['id_centre_interet']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_centre_interet']->renderError() ?>
          <?php echo $form['id_centre_interet'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_utilisateur']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_utilisateur']->renderError() ?>
          <?php echo $form['id_utilisateur'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
