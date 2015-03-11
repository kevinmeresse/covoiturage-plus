<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_contact/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?cp_contact_id='.$form->getObject()->getCpContactId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          <p class="retour-liste"><a href="<?php echo url_for('cp_contact/index') ?>">Retour &agrave; la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
          <p class="supprimer"><?php echo link_to('Supprimer', 'cp_contact/delete?cp_contact_id='.$form->getObject()->getCpContactId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Nom</th>
        <td>
          <?php echo $form['cp_contact_nom']->renderError() ?>
          <?php echo $form['cp_contact_nom'] ?>
        </td>
      </tr>
      <tr>
        <th>Prénom</th>
        <td>
          <?php echo $form['cp_contact_prenom']->renderError() ?>
          <?php echo $form['cp_contact_prenom'] ?>
        </td>
      </tr>
      <tr>
        <th>Tél.</th>
        <td>
          <?php echo $form['cp_contact_tel']->renderError() ?>
          <?php echo $form['cp_contact_tel'] ?>
        </td>
      </tr>
      <tr>
        <th>Mail</th>
        <td>
          <?php echo $form['cp_contact_mail']->renderError() ?>
          <?php echo $form['cp_contact_mail'] ?>
        </td>
      </tr>
      <tr>
        <th>Fonction</th>
        <td>
          <?php echo $form['cp_contact_fonction']->renderError() ?>
          <?php echo $form['cp_contact_fonction'] ?>
        </td>
      </tr>
      <tr>
        <th>Commentaire</th>
        <td>
          <?php echo $form['cp_contact_commentaire']->renderError() ?>
          <?php echo $form['cp_contact_commentaire'] ?>
        </td>
      </tr>
      <tr>
        <th>Contact Principal ?</th>
        <td>
          <?php echo $form['cp_contact_contact_principal']->renderError() ?>
          <?php echo $form['cp_contact_contact_principal'] ?>
        </td>
      </tr>
      <tr>
        <th>Date de création</th>
        <td>
          <?php echo $form['cp_contact_date_creation']->renderError() ?>
          <?php echo date(sfConfig::get('app_fr_format_date_court_horaire'),  strtotime($form->getObject()->getCpContactDateCreation())) ?>
        </td>
      </tr>
      <tr>
        <th>date de modification</th>
        <td>
          <?php echo $form['cp_contact_date_modification']->renderError() ?>
          <?php echo date(sfConfig::get('app_fr_format_date_court_horaire'),  strtotime($form->getObject()->getCpContactDateModification())) ?>
        </td>
      </tr>
      <tr>
        <th>Etablissement</th>
        <td>
          <?php echo $form['cp_contact_cp_etablissement_id']->renderError() ?>
          <?php echo $form['cp_contact_cp_etablissement_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
