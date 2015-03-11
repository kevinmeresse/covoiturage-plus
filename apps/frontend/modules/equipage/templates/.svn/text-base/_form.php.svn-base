<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('equipage/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_equipage='.$form->getObject()->getIdEquipage() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('equipage/index') ?>">Back to list</a>
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
        <th><?php echo $form['etat']->renderLabel() ?></th>
        <td>
          <?php echo $form['etat']->renderError() ?>
          <?php echo $form['etat'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['nom_equipage']->renderLabel() ?></th>
        <td>
          <?php echo $form['nom_equipage']->renderError() ?>
          <?php echo $form['nom_equipage'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_profil']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_profil']->renderError() ?>
          <?php echo $form['id_profil'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['commentaires']->renderLabel() ?></th>
        <td>
          <?php echo $form['commentaires']->renderError() ?>
          <?php echo $form['commentaires'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_utilisateur']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_utilisateur']->renderError() ?>
          <?php echo $form['id_utilisateur'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ville_origine']->renderLabel() ?></th>
        <td>
          <?php echo $form['ville_origine']->renderError() ?>
          <?php echo $form['ville_origine'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ville_destination']->renderLabel() ?></th>
        <td>
          <?php echo $form['ville_destination']->renderError() ?>
          <?php echo $form['ville_destination'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
