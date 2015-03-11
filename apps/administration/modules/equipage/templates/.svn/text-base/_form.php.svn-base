<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('equipage/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_equipage=' . $form->getObject()->getIdEquipage() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
	<div id="equipage">
    <table>
        
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            
            <tr>
                <th>Nom de l'équipage</th>
                <td>
                    <?php echo $form['nom_equipage']->renderError() ?>
                    <?php echo $form['nom_equipage'] ?>
                </td>
            </tr>
            <tr>
                <th>Ville de départ</th>
                <td>
                <?php echo $form['ville_origine']->renderError() ?>
                <?php
                    echo jq_input_auto_complete_tag(
                            'equipage[ville_origine]', $tab_ville_autoc['ville_origine'], url_for1('ville_fr/autocomplete', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                    ?>
                </td>
            </tr>
            
            <tr>
                <th>Ville de destination</th>
                <td>
                <?php echo $form['ville_destination']->renderError() ?>
                <?php
                    echo jq_input_auto_complete_tag(
                            'equipage[ville_destination]', $tab_ville_autoc['ville_destination'], url_for1('ville_fr/autocomplete', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                    ?>
                </td>
            </tr>
            
 
            <tr>
                <th>Initiales du créateur</th>
                <td>
                    <?php echo $form['id_profil']->renderError() ?>
                    <?php echo $form['id_profil'] ?>
                </td>
            </tr>

            <tr>
                <th>Affichage sur site</th>
                <td>
                    <?php echo $form['etat']->renderError() ?>
                    <?php echo $form['etat'] ?>
                </td>
            </tr>

            <?php if (!$form->getObject()->isNew()): ?>

                <tr> 
                    <th>Date de création</th>
                    <td>
                        <?php echo date("d-m-Y", strtotime($form->getObject()->getDateCreation())) ?>
                    </td>
                </tr>
                <tr> 
                    <th>Date de modification</th>
                    <td>
                        <?php echo date("d-m-Y", strtotime($form->getObject()->getDateModification())) ?>
                    </td>
                </tr>      
            <?php endif; ?>            
            
            <tr class="desc_spec_cp">
                <th>Commentaire<br>(visible par C+ uniquement)</th>
                <td>
                    <?php echo $form['commentaires']->renderError() ?>
                    <?php echo $form['commentaires'] ?>
                </td>
            </tr>
        </tbody>
    </table>
	
	</div>
	<tfoot>
            <?php echo $form->renderHiddenFields(false) ?>
           <?php if (isset($popup) && $popup == 1): ?>
             <input type="hidden" value="1" name="popup">       
            <p><INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()"></p>
             <p class="retour-fiche"><a href="<?php echo url_for('equipage/show?popup=1&id_equipage=' . $form->getObject()->getIdEquipage()) ?>">Retour &agrave; la fiche</a></p>

          <?php else: ?>
              <p class="retour-liste"><a href="<?php echo url_for('trajet/list') ?>">Retour &agrave; la liste</a></p>
          <?php endif; ?>    
              <input type="submit" value="Sauvegarder" />
	
              <br class="clear"/>
</form>
