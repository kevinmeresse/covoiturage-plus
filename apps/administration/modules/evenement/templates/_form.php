<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('evenement/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_evenement='.$form->getObject()->getIdEvenement() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div id="evenement-form">
  <table>
    
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
        <th><?php echo $form['date_publication']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_publication']->renderError() ?>
          <?php echo $form['date_publication'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['date_depublication']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_depublication']->renderError() ?>
          <?php echo $form['date_depublication'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['libelle']->renderLabel() ?></th>
        <td>
          <?php echo $form['libelle']->renderError() ?>
          <?php echo $form['libelle'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['ville']->renderLabel() ?></th>
        <td>
          <?php echo $form['ville']->renderError() ?>
          <?php //echo $form['id_commune'] ?>
            <?php
                    echo jq_input_auto_complete_tag(
                            'evenement[ville]', $tab_ville_autoc['ville'], url_for1('ville_fr/autocomplete', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                    ?>
        </td>
      </tr>

    </tbody>
  </table>
</div>
          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('evenement/index') ?>">Retour &agrave; la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Supprimer', 'evenement/delete?id_evenement='.$form->getObject()->getIdEvenement(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Sauver" />
		<br class="clear"/>
</form>
