<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('equipage/'.($form->getObject()->isNew() ? 'createNomMail' : 'updateNomMail').(!$form->getObject()->isNew() ? '?id_equipage='.$form->getObject()->getIdEquipage() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('equipage/index') ?>">Back to list</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'equipage/delete?id_equipage='.$form->getObject()->getIdEquipage(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      
      <tr>
        <th><?php echo $form['nom_equipage']->renderLabel() ?></th>
        <td>
          <?php echo $form['nom_equipage']->renderError() ?>
          <?php echo $form['nom_equipage'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mail_covoitureur']->renderLabel() ?></th>
        <td>
          <?php echo $form['mail_covoitureur']->renderError() ?>
          <?php echo $form['mail_covoitureur'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
