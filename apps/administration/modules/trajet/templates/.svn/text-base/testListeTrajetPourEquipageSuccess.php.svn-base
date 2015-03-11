<?php use_helper('jQuery'); ?>
<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>



<form action="<?php echo url_for('trajet/listeTrajetPourEquipage' ) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

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
                <th>Ville de départ</th>
                <td>            
                    <?php echo $form['depart_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[depart_ville]', $form->getObject()->getDepartVille(), url_for1('ville_fr/autocomplete', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                    ?>

                </td>   
                <td class="espace">&nbsp;</td>
                <th>Statut </th>
                <td>
                    <?php echo $form['statut_cov']->renderError() ?>
                    <?php echo $form['statut_cov'] ?>
                </td>
            </tr>            

            <tr>            
                <th>Ville de destination</th>
                <td>            
                    <?php echo $form['destination_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[destination_ville]', $form->getObject()->getDestinationVille(), url_for1('ville_fr/autocomplete', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </td>  
                <td class="espace">&nbsp;</td>
                <th>Mail </th>
                <td>
                    <?php echo $form['mail_cov']->renderError() ?>
                    <?php echo $form['mail_cov'] ?>
                </td>
            </tr> 
      
    </tbody>
  </table>
</form>
