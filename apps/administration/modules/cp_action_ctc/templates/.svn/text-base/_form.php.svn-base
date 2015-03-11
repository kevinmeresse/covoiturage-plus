<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_action_ctc/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cp_action_ctc_id='.$form->getObject()->getCpActionCtcId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('cp_action_ctc/index') ?>">Retour &agrave; la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
          <p class="supprimer"><?php echo link_to('Supprimer', 'cp_action_ctc/delete?cp_action_ctc_id='.$form->getObject()->getCpActionCtcId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['cp_action_ctc_detail']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_ctc_detail']->renderError() ?>
          <?php echo $form['cp_action_ctc_detail'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_ctc_date_creation']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_ctc_date_creation']->renderError() ?>
          <?php echo $form['cp_action_ctc_date_creation'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_ctc_date_modification']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_ctc_date_modification']->renderError() ?>
          <?php echo $form['cp_action_ctc_date_modification'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_ctc_date_echeance']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_ctc_date_echeance']->renderError() ?>
          <?php echo $form['cp_action_ctc_date_echeance'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_ctc_cp_type_action_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_ctc_cp_type_action_id']->renderError() ?>
          <?php echo $form['cp_action_ctc_cp_type_action_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_ctc_cp_contact_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_ctc_cp_contact_id']->renderError() ?>
          <?php echo $form['cp_action_ctc_cp_contact_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_ctc_user_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_ctc_user_id']->renderError() ?>
          <?php echo $form['cp_action_ctc_user_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
