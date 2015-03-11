<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_contact/'.($form->getObject()->isNew() ? 'createEtb' : 'updateEtb').(!$form->getObject()->isNew() ? '?cp_contact_id='.$form->getObject()->getCpContactId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="contact">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>

            <?php if (isset($popup) && $popup == 1): ?>

                        <p>
                        
                            <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
                        
                        </p>
                        <input type="hidden" name="popup" value="1" />

                        <?php if (!$form->getObject()->isNew()): ?>
                                <p class="supprimer"><?php echo link_to('Supprimer', 'cp_contact/delete?popup=1&cp_contact_id=' . $form->getObject()->getCpContactId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
                        <?php endif; ?>
                    <?php else: ?>
                                <p class="retour-liste"><a href="<?php echo url_for('cp_etablissement/edit?cp_etablissement_id=' . $etb_id) ?>">Retour &agrave; la liste</a></p>
                        <?php if (!$form->getObject()->isNew()): ?>
                                        <p class="supprimer"><?php echo link_to('Supprimer', 'cp_contact/delete1?cp_contact_id=' . $form->getObject()->getCpContactId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
                        <?php endif; ?>
                    <?php endif; ?>

          <input type="submit" value="Sauvegarder" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <?php if (isset($prov) && $prov == 'rs'): ?>
            <th>Raison Sociale</th>
        <?php else: ?>
            <th>Etablissement</th>
        <?php endif; ?>
        <td>
          <?php echo $form['cp_contact_cp_etablissement_id']->renderError() ?>
          <?php echo $form['cp_contact_cp_etablissement_id'] ?>
            <?php echo $etb_name ?>
        </td>
      </tr>
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
        <th>Téléphone</th>
        <td>
          <?php echo $form['cp_contact_tel']->renderError() ?>
          <?php echo $form['cp_contact_tel'] ?>
        </td>
      </tr>
      <tr>
        <th>Téléphone Autre</th>
        <td>
          <?php echo $form['cp_contact_tel_autre']->renderError() ?>
          <?php echo $form['cp_contact_tel_autre'] ?>
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
        <th>Mail autre</th>
        <td>
          <?php echo $form['cp_contact_mail_autre']->renderError() ?>
          <?php echo $form['cp_contact_mail_autre'] ?>
        </td>
      </tr>
      <tr>
        <th>Fonction</th>
        <td>
          <?php echo $form['cp_contact_statut_id']->renderError() ?>
          <?php echo $form['cp_contact_statut_id'] ?>
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
        <th>Contact principal ?</th>
        <td>
          <?php echo $form['cp_contact_contact_principal']->renderError() ?>
          <?php echo $form['cp_contact_contact_principal'] ?>
        </td>
      </tr>

      
    </tbody>
  </table>
</form>
