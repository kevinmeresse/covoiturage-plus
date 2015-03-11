<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('contenu_rubrique/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_rubrique='.$form->getObject()->getIdRubrique() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div id="rubrique-form">
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
      <?php if($sf_user->hasCredential("admin")): ?>
      <tr>
        <th>Permission de visualisation</th>
        <td>
          <?php echo $form['id_perm']->renderError() ?>
          <?php echo $form['id_perm'] ?>
        </td>
      </tr>
      <?php endif; ?>
      
      
      <tr>
        <th>Titre</th>
        <td>
          <?php echo $form['fr_titre']->renderError() ?>
          <?php echo $form['fr_titre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['lien_url']->renderLabel() ?></th>
        <td>
          <?php echo $form['lien_url']->renderError() ?>
          <?php echo $form['lien_url'] ?>
        </td>
      </tr>
      
      
      <tr>
        <th>Ordre dans le menu</th>
        <td>
          <?php echo $form['priorite']->renderError() ?>
          <?php echo $form['priorite'] ?>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('cms/index') ?>">Retour &agrave; la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
          <p class="supprimer"><?php echo link_to('Supprimer', 'contenu_rubrique/delete?id_rubrique='.$form->getObject()->getIdRubrique(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />
		  <br class="clear"/>

</form>
