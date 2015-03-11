<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_etablissement/'.($form->getObject()->isNew() ? 'createSociete' : 'updateSociete').(!$form->getObject()->isNew() ? '?cp_etablissement_id='.$form->getObject()->getCpEtablissementId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="etablissementRS-edit">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
         

         <?php if (isset($popup)): ?>
                            <?php if ($popup == 1): ?>
                                <p>

                                    <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">

                                </p>
                                <input type="hidden" name="popup" value="1" />
                            <?php endif; ?>
                        <?php else: ?>
                            <p class="retour-liste"><a href="<?php echo url_for('cp_etablissement/indexSociete') ?>">Retour &agrave; la liste</a></p>
                        <?php endif; ?>

          <?php if (!$form->getObject()->isNew()): ?>
            <p class="supprimer"><?php echo link_to('Supprimer', 'cp_etablissement/deleteSociete?cp_etablissement_id='.$form->getObject()->getCpEtablissementId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th>Raison sociale</th>
        <td>
          <?php echo $form['cp_etablissement_raison_social']->renderError() ?>
          <?php echo $form['cp_etablissement_raison_social'] ?>
        </td>
      </tr>

      

      <tr>
        <th>Statut</th>
        <td>
          <?php echo $form['cp_etablissement_cp_etablissement_statut_id']->renderError() ?>
          <?php echo $form['cp_etablissement_cp_etablissement_statut_id'] ?>
        </td>
      </tr>

      <tr>
        <th>Commentaires</th>
        <td>
          <?php echo $form['cp_etablissement_commentaire']->renderError() ?>
          <?php echo $form['cp_etablissement_commentaire'] ?>
        </td>
      </tr>



    </tbody>
  </table>
</form>
