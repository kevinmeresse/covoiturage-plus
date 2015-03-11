<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_action_etb/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cp_action_etb_id='.$form->getObject()->getCpActionEtbId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div id="action-contact-form">
  <table class="action-assoc-etab">
    
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['cp_action_etb_detail']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_etb_detail']->renderError() ?>
          <?php echo $form['cp_action_etb_detail'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_etb_date_creation']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_etb_date_creation']->renderError() ?>
          <?php echo $form['cp_action_etb_date_creation'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_etb_date_modification']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_etb_date_modification']->renderError() ?>
          <?php echo $form['cp_action_etb_date_modification'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_etb_date_echeance']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_etb_date_echeance']->renderError() ?>
          <?php echo $form['cp_action_etb_date_echeance'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_etb_cp_type_action_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_etb_cp_type_action_id']->renderError() ?>
          <?php echo $form['cp_action_etb_cp_type_action_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_etb_cp_etablissement_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_etb_cp_etablissement_id']->renderError() ?>
          <?php echo $form['cp_action_etb_cp_etablissement_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_etb_cp_contact_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_etb_cp_contact_id']->renderError() ?>
          <?php echo $form['cp_action_etb_cp_contact_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['cp_action_etb_user_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['cp_action_etb_user_id']->renderError() ?>
          <?php echo $form['cp_action_etb_user_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>		
          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('cp_action_etb/index') ?>">Retour &agrave; la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
          <p class="supprimer"><?php echo link_to('Supprimer', 'cp_action_etb/delete?cp_action_etb_id='.$form->getObject()->getCpActionEtbId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />
		<br class="clear"/>
</form>
