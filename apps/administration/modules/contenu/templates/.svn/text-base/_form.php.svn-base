<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>



<form action="<?php echo url_for('contenu/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_contenu='.$form->getObject()->getIdContenu() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('cms/index') ?>">Retour à la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
          <p class="supprimer"><?php echo link_to('Supprimer', 'contenu/delete?id_contenu='.$form->getObject()->getIdContenu(), array('method' => 'delete', 'confirm' => 'Etes vous sûr?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
           

      <tr>
        <th><?php echo $form['visible']->renderLabel() ?></th>
        <td>
          <?php echo $form['visible']->renderError() ?>
          <?php echo $form['visible'] ?>
        </td>
      </tr>
      <?php if($sf_user->hasCredential("admin")): ?>
      <tr>
        <th>Permission</th>
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
        <th>Menu parent</th>
        <td>
          <?php echo $form['id_rubrique_parente']->renderError() ?>
          <?php echo $form['id_rubrique_parente'] ?>
        </td>
      </tr>
      <tr>
        <th>Hiérarchie</th>
        <td>
          <?php echo $form['priorite']->renderError() ?>
          <?php echo $form['priorite'] ?>
        </td>
      </tr>
      
      <?php if($sf_user->hasCredential("admin")): ?>
      <tr>
        <th><?php echo $form['lien_url']->renderLabel() ?></th>
        <td>
          <?php echo $form['lien_url']->renderError() ?>
          <?php echo $form['lien_url'] ?>
        </td>
      </tr>
      <?php endif; ?>
      
      <tr>
        <th>Chapô de référencement</th>
        <td>
          <?php echo $form['fr_meta_description']->renderError() ?>
          <?php echo $form['fr_meta_description']->render(array('class' => 'contenu-chapo')) ?>
        </td>
      </tr>
      
      <tr>
        <th>Contenu de la page</th>
        <td>
          <?php echo $form['fr_contenu_html']->renderError() ?>
          <?php echo $form['fr_contenu_html'] ?>
        </td>
      </tr>
      
     
      <tr>
        <th><?php echo $form['date_publication']->renderLabel() ?></th>
        <td>
          <?php echo $form['date_publication']->renderError() ?>
          <?php echo $form['date_publication'] ?>
        </td>
      </tr>

      
    </tbody>
  </table>
</form>

