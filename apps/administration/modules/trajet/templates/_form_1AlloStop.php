<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('trajet/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_trajet=' . $form->getObject()->getIdTrajet() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />    
    <?php endif; ?>
	<div class="trajet-form">
    <table class="partie1">    
       
        <tbody>    
            <?php echo $form->renderGlobalErrors() ?>

            <tr>            
                <th>Covoitureur</th>            
                <td>            
                    <?php //echo $form['cle']->renderError() ?>
                    <?php if ($tab_ville_autoc['covoitureur'] && $tab_ville_autoc['covoitureur'] != ''): ?>
                        <?php echo $tab_ville_autoc['covoitureur'] ?>
                    <?php else: ?>
                       <?php if ($form->getObject()->isNew()): ?>
                          <?php echo $form['covoitureur']->renderError() ?>

                          <?php
                             echo jq_input_auto_complete_tag(
                                'trajet[covoitureur]', $tab_ville_autoc['covoitureur'], url_for1('covoitureur/autocompleteCovoitureurId', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                           ?>
                       <?php else: ?>
                          <?php echo $covoitureur ?>
                      <?php endif; ?>  
                    <?php endif; ?>
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
                <th><?php echo $form['actif']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['actif']->renderError() ?>
                    <?php echo $form['actif'] ?>
                </td>            
            </tr>            
   


            <tr>            
                <th><?php echo $form['depart_ville']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['depart_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[depart_ville]', $tab_ville_autoc['depart_ville'], url_for1('trajet/autocomplete?target=depville', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                    ?>

                </td>            
            </tr>     
            <tr>            
                <th><?php echo $form['depart_adresse']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['depart_adresse']->renderError() ?>
                    <?php echo $form['depart_adresse'] ?>
                </td>            
            </tr>
 
            <tr>            
                <th><?php echo $form['depart_autre_lieu']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['depart_autre_lieu']->renderError() ?>
                    <?php echo $form['depart_autre_lieu'] ?>
                </td>            
            </tr>

            <tr>            
                <th><?php echo $form['destination_ville']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['destination_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[destination_ville]', $tab_ville_autoc['destination_ville'], url_for1('trajet/autocomplete?target=destville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </td>            
            </tr>    
            <tr>            
                <th><?php echo $form['destination_adresse']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['destination_adresse']->renderError() ?>
                    <?php echo $form['destination_adresse'] ?>
                </td>            
            </tr>

            <tr>            
                <th><?php echo $form['destination_autre_lieu']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['destination_autre_lieu']->renderError() ?>
                    <?php echo $form['destination_autre_lieu'] ?>
                </td>            
            </tr>

			<tr>
				<th><label> Desirez vous rajouter des villes &eacute;tapes </label></th>
							<td><ul class="radio_list">
								<li><input id="ville-etape-non" type="radio" value="0" name="partageFrais">
									<label>non</label></li>
								<li><input id="ville-etape-oui" type="radio" value="1" name="partageFrais">
									<label>oui</label></li>
							</ul></td>			
			</tr>
            <tr class="etape">            
                <th><?php echo $form['etape1_ville']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['etape1_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[etape1_ville]', $tab_ville_autoc['etape1_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </td>            

            </tr>            
            <tr class="etape">            
                <th><?php echo $form['etape2_ville']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['etape2_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[etape2_ville]', $tab_ville_autoc['etape2_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </td>            
            </tr>            
            <tr class="etape">            
                <th><?php echo $form['etape3_ville']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['etape3_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[etape3_ville]', $tab_ville_autoc['etape3_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </td>            
            </tr>            
            <tr class="etape">            
                <th><?php echo $form['etape4_ville']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['etape4_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[etape4_ville]', $tab_ville_autoc['etape4_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </td>            
            </tr>            
            <tr class="etape">            
                <th><?php echo $form['etape5_ville']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['etape5_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[etape5_ville]', $tab_ville_autoc['etape5_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </td>            
            </tr>            

      
            <tr>            
                <th><?php echo $form['id_zone_entreprise']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['id_zone_entreprise']->renderError() ?>
                    <?php echo $form['id_zone_entreprise'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['id_evenement']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['id_evenement']->renderError() ?>
                    <?php echo $form['id_evenement'] ?>
                </td>            
            </tr>            

			</tbody>
			</table>
			
			
			<div class="occasionnel">
			<table>
			<tbody>
			<tr>            
                <th><?php echo $form['jour_unique_type_cov']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['jour_unique_type_cov']->renderError() ?>
                    <?php echo $form['jour_unique_type_cov'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['jour_unique_date']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['jour_unique_date']->renderError() ?>
                    <?php echo $form['jour_unique_date'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['jour_unique_heure']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['jour_unique_heure']->renderError() ?>
                    <?php echo $form['jour_unique_heure'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['jour_unique_type_cov_retour']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['jour_unique_type_cov_retour']->renderError() ?>
                    <?php echo $form['jour_unique_type_cov_retour'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['jour_unique_date_retour']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['jour_unique_date_retour']->renderError() ?>
                    <?php echo $form['jour_unique_date_retour'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['jour_unique_heure_retour']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['jour_unique_heure_retour']->renderError() ?>
                    <?php echo $form['jour_unique_heure_retour'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['jour_unique_retour']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['jour_unique_retour']->renderError() ?>
                    <?php echo $form['jour_unique_retour'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['jour_unique_description']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['jour_unique_description']->renderError() ?>
                    <?php echo $form['jour_unique_description'] ?>
                </td>            
            </tr>  
				</tbody>
			</table>
			</div> 
				
			
            <div class="regulier">                 
				<table id="semaine-covoit">
					<thead>
						<tr>
							<th>&nbsp;</th>
							<th><strong>Statut</strong></th>
							<th><strong>Etat</strong></th>
							<th><strong>Depart</strong></th>
							<th><strong>Retour</strong></th>
						</tr>
					</thead>
					<tbody>
						<tr class="lundi">
							<td><strong>Lundi</strong></td>
							<td><?php echo $form['lundi_type_cov']->renderError() ?>
								<?php echo $form['lundi_type_cov'] ?></td>
							<td><?php echo $form['lundi_etat']->renderError() ?>
								<?php echo $form['lundi_etat'] ?></td>
							<td><?php echo $form['lundi_heure_depart']->renderError() ?>
								<?php echo $form['lundi_heure_depart'] ?></td>
							<td><?php echo $form['lundi_heure_retour']->renderError() ?>
								<?php echo $form['lundi_heure_retour'] ?></td>
						</tr>
						<tr class="mardi">
							<td><strong>Mardi</strong></td>
							<td><?php echo $form['mardi_type_cov']->renderError() ?>
								<?php echo $form['mardi_type_cov'] ?></td>
							<td><?php echo $form['mardi_etat']->renderError() ?>
								<?php echo $form['mardi_etat'] ?></td>
							<td><?php echo $form['mardi_heure_depart']->renderError() ?>
								<?php echo $form['mardi_heure_depart'] ?></td>
							<td><?php echo $form['mardi_heure_retour']->renderError() ?>
								<?php echo $form['mardi_heure_retour'] ?></td>
						</tr>
						<tr class="mercredi">
							<td><strong>Mercredi</strong></td>
							<td><?php echo $form['mercredi_type_cov']->renderError() ?>
								<?php echo $form['mercredi_type_cov'] ?></td>
							<td><?php echo $form['mercredi_etat']->renderError() ?>
								<?php echo $form['mercredi_etat'] ?></td>
							<td><?php echo $form['mercredi_heure_depart']->renderError() ?>
								<?php echo $form['mercredi_heure_depart'] ?></td>
							<td><?php echo $form['mercredi_heure_retour']->renderError() ?>
								<?php echo $form['mercredi_heure_retour'] ?></td>
						</tr>
						<tr class="jeudi">
							<td><strong>Jeudi</strong></td>
							<td><?php echo $form['jeudi_type_cov']->renderError() ?>
								<?php echo $form['jeudi_type_cov'] ?></td>
							<td><?php echo $form['jeudi_etat']->renderError() ?>
								<?php echo $form['jeudi_etat'] ?></td>
							<td><?php echo $form['jeudi_heure_depart']->renderError() ?>
								<?php echo $form['jeudi_heure_depart'] ?></td>
							<td><?php echo $form['jeudi_heure_retour']->renderError() ?>
								<?php echo $form['jeudi_heure_retour'] ?></td>
						</tr>
						<tr class="vendredi">
							<td><strong>Vendredi</strong></td>
							<td><?php echo $form['vendredi_type_cov']->renderError() ?>
								<?php echo $form['vendredi_type_cov'] ?></td>
							<td><?php echo $form['vendredi_etat']->renderError() ?>
								<?php echo $form['vendredi_etat'] ?></td>
							<td><?php echo $form['vendredi_heure_depart']->renderError() ?>
								<?php echo $form['vendredi_heure_depart'] ?></td>
							<td><?php echo $form['vendredi_heure_retour']->renderError() ?>
								<?php echo $form['vendredi_heure_retour'] ?></td>
						</tr>
						<tr class="samedi">
							<td><strong>Samedi</strong></td>
							<td><?php echo $form['samedi_type_cov']->renderError() ?>
								<?php echo $form['samedi_type_cov'] ?></td>
							<td><?php echo $form['samedi_etat']->renderError() ?>
								<?php echo $form['samedi_etat'] ?></td>
							<td><?php echo $form['samedi_heure_depart']->renderError() ?>
								<?php echo $form['samedi_heure_depart'] ?></td>
							<td><?php echo $form['samedi_heure_retour']->renderError() ?>
								<?php echo $form['samedi_heure_retour'] ?></td>
						</tr>
						<tr class="dimanche">
							<td><strong>Dimanche</strong></td>
							<td><?php echo $form['dimanche_type_cov']->renderError() ?>
								<?php echo $form['dimanche_type_cov'] ?></td>
							<td><?php echo $form['dimanche_etat']->renderError() ?>
								<?php echo $form['dimanche_etat'] ?></td>
							<td><?php echo $form['dimanche_heure_depart']->renderError() ?>
								<?php echo $form['dimanche_heure_depart'] ?></td>
							<td><?php echo $form['dimanche_heure_retour']->renderError() ?>
								<?php echo $form['dimanche_heure_retour'] ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br class="clear"/>
			
		
		<div>
			<table>
			<tbody>
            <tr>            
                <th><?php //echo $form['date_creation']->renderLabel()    ?></th>
                <td>            
                    <?php //echo $form['date_creation']->renderError()  ?>
                    <?php //echo $form['date_creation'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['date_depublication']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['date_depublication']->renderError() ?>
                    <?php echo $form['date_depublication'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php //echo $form['date_modification']->renderLabel()    ?></th>
                <td>            
                    <?php //echo $form['date_modification']->renderError()  ?>
                    <?php //echo $form['date_modification'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['date_verification']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['date_verification']->renderError() ?>
                    <?php echo $form['date_verification'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['nombre_de_place']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['nombre_de_place']->renderError() ?>
                    <?php echo $form['nombre_de_place'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['mobilite_r']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['mobilite_r']->renderError() ?>
                    <?php echo $form['mobilite_r'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['description']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['description']->renderError() ?>
                    <?php echo $form['description'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['trajet_etudiant']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['trajet_etudiant']->renderError() ?>
                    <?php echo $form['trajet_etudiant'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['nombre_visualisation']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['nombre_visualisation']->renderError() ?>
                    <?php echo $form['nombre_visualisation'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['nombre_demande']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['nombre_demande']->renderError() ?>
                    <?php echo $form['nombre_demande'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['cout']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['cout']->renderError() ?>
                    <?php echo $form['cout'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['cout_passager']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['cout_passager']->renderError() ?>
                    <?php echo $form['cout_passager'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['autoroute']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['autoroute']->renderError() ?>
                    <?php echo $form['autoroute'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['autoroute_cout']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['autoroute_cout']->renderError() ?>
                    <?php echo $form['autoroute_cout'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['autoroute_text']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['autoroute_text']->renderError() ?>
                    <?php echo $form['autoroute_text'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['vehicule']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['vehicule']->renderError() ?>
                    <?php echo $form['vehicule'] ?>
                    <?php //echo $vehicule   ?>
                </td>            
            </tr>            

            <tr>            
                <th><?php echo $form['tolerance_0']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['tolerance_0']->renderError() ?>
                    <?php echo $form['tolerance_0'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['tolerance_1']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['tolerance_1']->renderError() ?>
                    <?php echo $form['tolerance_1'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['tolerance_2']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['tolerance_2']->renderError() ?>
                    <?php echo $form['tolerance_2'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['url_retour']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['url_retour']->renderError() ?>
                    <?php echo $form['url_retour'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['technique']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['technique']->renderError() ?>
                    <?php echo $form['technique'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['visible_uniquement_partenaire']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['visible_uniquement_partenaire']->renderError() ?>
                    <?php echo $form['visible_uniquement_partenaire'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['id_type_vehicule']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['id_type_vehicule']->renderError() ?>
                    <?php echo $form['id_type_vehicule'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['volume_bagage']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['volume_bagage']->renderError() ?>
                    <?php echo $form['volume_bagage'] ?>
                </td>            
            </tr>            
            <tr>            
                <th><?php echo $form['covoiturage_solidaire']->renderLabel() ?></th>
                <td>            
                    <?php echo $form['covoiturage_solidaire']->renderError() ?>
                    <?php echo $form['covoiturage_solidaire'] ?>
                </td>
            </tr>
        </tbody>
    </table>
	</div>
	
</div>
	
  
                    <?php echo $form->renderHiddenFields(false) ?>
                    <p class="retour-liste"><a href="<?php echo url_for('trajet/index') ?>">Retour &agrave; la liste</a></p>
                    <?php if (!$form->getObject()->isNew()): ?>
                    <p class="supprimer"><?php echo link_to('Supprimer', 'trajet/delete?id_trajet=' . $form->getObject()->getIdTrajet(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></p>
                    <?php endif; ?>
                    <input type="submit" value="Sauver" />    
   
</form>

<br>
<?php
//print_r($form['depart_ville'])  ?>