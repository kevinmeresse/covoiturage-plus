<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('livre_or/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div id="livre-or-form">
  <table>
    
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nom']->renderLabel() ?></th>
        <td>
          <?php echo $form['nom']->renderError() ?>
          <?php echo $form['nom'] ?>
        </td>
      </tr>
      <tr>
        <th>Prénom</th>
        <td>
          <?php echo $form['prenom']->renderError() ?>
          <?php echo $form['prenom'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['message']->renderLabel() ?></th>
        <td>
          <?php echo $form['message']->renderError() ?>
          <?php echo $form['message'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mail']->renderLabel() ?></th>
        <td>
          <?php echo $form['mail']->renderError() ?>
          <?php echo $form['mail'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etat']->renderLabel() ?></th>
        <td>
          <?php echo $form['etat']->renderError() ?>
          <?php echo $form['etat'] ?>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
  

          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('livre_or/index') ?>">Retour &agrave; la liste</a>
          <?php if (!$form->getObject()->isNew()): ?>
          <p class="supprimer"><?php echo link_to('Supprimer', 'livre_or/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Etes vous sûr?')) ?>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />

<br class="clear"/>		  
</form>
