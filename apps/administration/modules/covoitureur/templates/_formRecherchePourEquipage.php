
<div class="form-tri">
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


          <?php echo jq_form_remote_tag(array(
    'update'   => 'item_list',
    'url'      => 'covoitureur/listeCovoitureurPourEquipage?id_equipage='.$id_equipage,
)) ?>
            <?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
            
            
          <input type="submit" value="Recherche" />
        </td>
      </tr>
    </tfoot>
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
        <th><?php echo $form['ville']->renderLabel() ?></th>
        <td>
          <?php echo $form['ville']->renderError() ?>
          <?php echo $form['ville'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mail']->renderLabel() ?></th>
        <td>
          <?php echo $form['mail']->renderError() ?>
          <?php echo $form['mail'] ?>
        </td>
      </tr>
      
    </tbody>
  </table>
</form>
</div>