<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('trajet_mise_en_relation/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_trajet_mise_en_relation='.$form->getObject()->getIdTrajetMiseEnRelation() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="mer">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?> 
          <p class="retour-liste"><a href="<?php echo url_for('trajet_mise_en_relation/index') ?>">Retour &agrave; la liste</a></p>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<p class="supprimer"><?php echo link_to('Supprimer', 'trajet_mise_en_relation/delete?id_trajet_mise_en_relation='.$form->getObject()->getIdTrajetMiseEnRelation(), array('method' => 'delete', 'confirm' => 'Etes vous sûr?')) ?></p>
          <?php endif; ?>
          <input type="submit" value="Sauvegarder" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>

      <tr>
        <th>Trajet</th>
        <td>
          <?php echo $form->getObject()->getTrajet()->getVilleDepartDestTrajet() ?>          
        </td>
      </tr>
      <tr>
        <th>Dépositaire</th>
        <td>
          <?php echo $form->getObject()->getCreateurIdentite() ?>
        </td>
      </tr>
      <tr>
        <th>Demandeur</th>
        <td>
          <?php echo $form->getObject()->getDemandeurIdentite() ?>
        </td>
      </tr>
      <tr>
        <th>Date création</th>
        <td>
          <?php echo date("d-m-Y", strtotime($form->getObject()->getDateCreation())) ?>
        </td>
      </tr>
      <tr>
        <th>Date envoi</th>
        <td>
          <?php echo date("d-m-Y", strtotime($form->getObject()->getDateEnvoi())) ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['etat']->renderLabel() ?></th>
        <td>
          <?php echo $form['etat']->renderError() ?>
          <?php echo $form['etat'] ?>
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
        <th>Nb de places demandées</th>
        <td>
          <?php echo $form['nb_places_demandees']->renderError() ?>
          <?php echo $form['nb_places_demandees'] ?>
        </td>
      </tr>

    </tbody>
  </table>
</form>
