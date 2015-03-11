<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('covoitureur_amis/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_covoitureur='.$tabCovoitureur['idcovoitureur1'] .'&id_covoitureur_amis='.$tabCovoitureur['idcovoitureur2'] : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('covoitureur_amis/index') ?>">Retour à la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Supprimer', 'covoitureur_amis/delete?id_covoitureur='.$tabCovoitureur['idcovoitureur1'].'&id_covoitureur_amis='.$tabCovoitureur['idcovoitureur2'], array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Sauver" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Covoitureur emetteur</th>
        <td>
          <?php echo $tabCovoitureur['covoitureur1'] ?>

        </td>
      </tr>
      <tr>
        <th>Avis sur Covoitureur </th>
        <td>
          <?php echo $tabCovoitureur['covoitureur2'] ?>

        </td>
      </tr>
      <tr>
        <th><?php echo $form['commentaire']->renderLabel() ?></th>
        <td>
          <?php echo $form['commentaire']->renderError() ?>
          <?php echo $form['commentaire'] ?>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['note']->renderLabel() ?></th>
        <td>
          <?php //echo $form['note']->renderError() ?>
          <?php //echo $form['note'] ?>
        </td>
      </tr>
      <tr>
        <th><?php //echo $form['date_insert']->renderLabel() ?></th>
        <td>
          <?php //echo $form['date_insert']->renderError() ?>
          <?php //echo $form['date_insert'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['valide_message']->renderLabel() ?></th>
        <td>
          <?php echo $form['valide_message']->renderError() ?>
          <?php echo $form['valide_message'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
