<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery'); ?>
<?php use_helper('autocompletion'); ?>
<?php //echo jq_add_plugins_by_name(array('ui')) ?>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="/js/gmap3.js"></script>
<form action="<?php echo url_for('trajet/' . ($form->getObject()->isNew() ? 'create' : 'update') . (!$form->getObject()->isNew() ? '?id_trajet=' . $form->getObject()->getIdTrajet() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <div class="trajet-form">
        <table class="partie1">    

            <tbody>    
                <?php echo $form->renderGlobalErrors() ?>

                <tr>            
                    <th>Inscrit</th>            
                    <td>            
                        <?php echo $tab_ville_autoc['covoitureur'] ?>

                    </td>            
                </tr>            


                <tr>            
                    <th>Affichage sur site</th>
                    <td>            
                        <?php echo $form['etat']->renderError() ?>
                        <?php echo $form['etat'] ?>
                    </td>            
                </tr>            
                <tr>            
                    <th>Validité du trajet</th>
                    <td>            
                        <?php echo $form['actif']->renderError() ?>
                        <?php echo $form['actif'] ?>
                    </td>            
                </tr>            



                <tr>            
                    <th>Ville de départ</th>
                    <td>            
                        <?php echo $form['depart_ville']->renderError() ?>   
                        <?php echo rm_input_autocomplete($form, 'trajet[depart_ville]', $tab_ville_autoc['depart_ville'], url_for1('trajet/autocomplete?target=depville', TRUE), array('autocomplete' => 'off'), array('use_style' => true), 'div_depart_autre_lieu', 'depart_autre_lieu', url_for('outils/listLocationsFromCityName'), 'DepotTrajet'); ?>                    

                    </td>            
                </tr>     
                <tr>            
                    <th>Adresse</th>
                    <td>            
                        <?php echo $form['depart_adresse']->renderError() ?>
                        <?php echo $form['depart_adresse'] ?>
                    </td>            
                </tr>

                <tr>            
                    <th>Lieu</th>
                    <td>
                        <div id="div_depart_autre_lieu">
                        <?php echo $form['depart_autre_lieu']->renderError() ?>
                        <?php echo $form['depart_autre_lieu'] ?>
                        </div>
                    </td>            
                </tr>

                <tr>            
                    <th>Ville de destination</th>
                    <td>            
                        <?php echo $form['destination_ville']->renderError() ?>

                        <?php echo rm_input_autocomplete($form, 'trajet[destination_ville]', $tab_ville_autoc['destination_ville'], url_for1('trajet/autocomplete?target=destville', TRUE), array('autocomplete' => 'off'), array('use_style' => true), 'div_destination_autre_lieu', 'destination_autre_lieu', url_for('outils/listLocationsFromCityName'), 'DepotTrajet'); ?>                    

                    </td>            
                </tr>    
                <tr>            
                    <th>Adresse</th>
                    <td>            
                        <?php echo $form['destination_adresse']->renderError() ?>
                        <?php echo $form['destination_adresse'] ?>
                    </td>            
                </tr>

                <tr>            
                    <th>Lieu</th>
                    <td>            
                        <div id="div_destination_autre_lieu">
                            <?php echo $form['destination_autre_lieu']->renderError() ?>
                            <?php echo $form['destination_autre_lieu'] ?>
                        </div>
                    </td>            
                </tr>

                <tr>
                    <th><label>Précisez des villes &eacute;tapes </label></th>
                    <td><ul class="radio_list">
                            <li><input id="ville-etape-non" type="radio" value="0" name="partageFrais" checked>
                                <label>non</label></li>
                            <li><input id="ville-etape-oui" type="radio" value="1" name="partageFrais">
                                <label>oui</label></li>
                        </ul></td>			
                </tr>
                <tr class="etape">            
                    <th>Etape 1</th>
                    <td>            
                        <?php echo $form['etape1_ville']->renderError() ?>
                        <?php echo rm_input_autocomplete($form, 'trajet[etape1_ville]', $tab_ville_autoc['etape1_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true), 'div_etape1_lieu', 'etape1_lieu_id', url_for('outils/listLocationsFromCityName'), 'DepotTrajet'); ?>
                    </td>            

                </tr>        
                <tr class="etape">            
                    <th>Lieu</th>
                    <td>            
                        <div id="div_etape1_lieu">
                            <?php echo $form['etape1_lieu_id'] ?>
                        </div>
                    </td>            
                </tr>
                <tr class="etape">            
                    <th>Etape 2</th>
                    <td>            
                        <?php echo $form['etape2_ville']->renderError() ?>
                        <?php echo rm_input_autocomplete($form, 'trajet[etape2_ville]', $tab_ville_autoc['etape2_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true), 'div_etape2_lieu', 'etape2_lieu_id', url_for('outils/listLocationsFromCityName'), 'DepotTrajet'); ?>
                    </td>            
                </tr>  
                <tr class="etape">            
                    <th>Lieu</th>
                    <td>            
                        <div id="div_etape2_lieu">
                            <?php echo $form['etape2_lieu_id'] ?>
                        </div>
                    </td>            
                </tr>
                <tr class="etape">            
                    <th>Etape 3</th>
                    <td>            
                        <?php echo $form['etape3_ville']->renderError() ?>
                        <?php echo rm_input_autocomplete($form, 'trajet[etape3_ville]', $tab_ville_autoc['etape3_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true), 'div_etape3_lieu', 'etape3_lieu_id', url_for('outils/listLocationsFromCityName'), 'DepotTrajet'); ?>
                    </td>            
                </tr>
                <tr class="etape">            
                    <th>Lieu</th>
                    <td>            
                        <div id="div_etape3_lieu">
                            <?php echo $form['etape3_lieu_id'] ?>
                        </div>
                    </td>            
                </tr>
                <tr class="etape">            
                    <th>Etape 4</th>
                    <td>            
                        <?php echo $form['etape4_ville']->renderError() ?>
                        <?php echo rm_input_autocomplete($form, 'trajet[etape4_ville]', $tab_ville_autoc['etape4_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true), 'div_etape4_lieu', 'etape4_lieu_id', url_for('outils/listLocationsFromCityName'), 'DepotTrajet'); ?>
                    </td>            
                </tr> 
                <tr class="etape">            
                    <th>Lieu</th>
                    <td>            
                        <div id="div_etape4_lieu">
                            <?php echo $form['etape4_lieu_id'] ?>
                        </div>
                    </td>            
                </tr>
                <tr class="etape">            
                    <th>Etape 5</th>
                    <td>            
                        <?php echo $form['etape5_ville']->renderError() ?>
                        <?php echo rm_input_autocomplete($form, 'trajet[etape5_ville]', $tab_ville_autoc['etape5_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true), 'div_etape5_lieu', 'etape5_lieu_id', url_for('outils/listLocationsFromCityName'), 'DepotTrajet'); ?>
                    </td>            
                </tr> 
                <tr class="etape">            
                    <th>Lieu</th>
                    <td>            
                        <div id="div_etape5_lieu">
                            <?php echo $form['etape5_lieu_id'] ?>
                        </div>
                     </td> 
                </tr>
                        
                    

    <tr>
        <th>Précisez le type de trajet</th>
        <td>
          <?php echo $form['id_type_trajet']->renderError() ?>
          <?php echo $form['id_type_trajet'] ?>
        </td>
      </tr>
            </tbody>
        </table>
        
      
         <br class="clear"/>

        <div id="trajet-regulier" class="ten columns">
            <h4>Trajet regulier</h4>
            <div class="form-depot-trajet">        
                
                
                    <?php echo $form['CpTrajet']->renderHiddenFields(false) ?>
                
                
                
                <table id="semaine-covoit">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th><strong>Statut</strong></th>
                            <th>&nbsp;</th>
                            <th><strong>Prise de service</strong></th>
                            <th><strong>Fin de service</strong></th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr class="lundi">
                            <td rowspan="2"><?php echo $form['lundi_etat']->renderError() ?>
                                <?php echo $form['lundi_etat'] ?> <strong>Lundi</strong><br />
                            <a href="" id="jour_ouvrable">Appliquer aux jours ouvrables </a>
                            </td>
                            <td rowspan="2"><?php echo $form['lundi_type_cov']->renderError() ?>
                                <?php echo $form['lundi_type_cov'] ?></td>
                            
                            <td>min</td>
                            <td class="min"> <?php echo $form['CpTrajet']['lundi_prise_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['lundi_prise_service_min'] ?></td>
                            
                            <td class="min"> <?php echo $form['CpTrajet']['lundi_fin_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['lundi_fin_service_min'] ?></td>
                            
                        </tr>
                        
                        <tr>
                            <td>max</td>
                            <td class="max"><?php echo $form['CpTrajet']['lundi_prise_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['lundi_prise_service_max'] ?></td>
                            <td class="max"><?php echo $form['CpTrajet']['lundi_fin_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['lundi_fin_service_max'] ?></td>
                        </tr>
                        
                        <tr class="mardi">
                            <td rowspan="2"><?php echo $form['mardi_etat']->renderError() ?>
                                <?php echo $form['mardi_etat'] ?> <strong>Mardi</strong></td>
                            <td rowspan="2"><?php echo $form['mardi_type_cov']->renderError() ?>
                                <?php echo $form['mardi_type_cov'] ?></td>
                            <td>min</td>
                            <td class="min"><?php echo $form['CpTrajet']['mardi_prise_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['mardi_prise_service_min'] ?></td>
                            
                            <td class="min"><?php echo $form['CpTrajet']['mardi_fin_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['mardi_fin_service_min'] ?></td>
                            
                        </tr>
                        <tr>
                            <td>max</td>
                            <td class="max"><?php echo $form['CpTrajet']['mardi_prise_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['mardi_prise_service_max'] ?></td>
                            <td class="max"><?php echo $form['CpTrajet']['mardi_fin_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['mardi_fin_service_max'] ?></td>
                        </tr>
                        
                        <tr class="mercredi">
                            <td rowspan="2"><?php echo $form['mercredi_etat']->renderError() ?>
                                <?php echo $form['mercredi_etat'] ?> <strong>Mercredi</strong></td>
                            <td rowspan="2"><?php echo $form['mercredi_type_cov']->renderError() ?>
                                <?php echo $form['mercredi_type_cov'] ?></td>
                            <td>min</td>
                            <td class="min"><?php echo $form['CpTrajet']['mercredi_prise_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['mercredi_prise_service_min'] ?></td>
                            
                            <td class="min"><?php echo $form['CpTrajet']['mercredi_fin_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['mercredi_fin_service_min'] ?></td>
                            
                        </tr>
                        <tr>
                            <td>max</td>
                            <td class="max"><?php echo $form['CpTrajet']['mercredi_prise_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['mercredi_prise_service_max'] ?></td>
                            <td class="max"><?php echo $form['CpTrajet']['mercredi_fin_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['mercredi_fin_service_max'] ?></td>
                        </tr>
                        
                        <tr class="jeudi">
                            <td rowspan="2"><?php echo $form['jeudi_etat']->renderError() ?>
                                <?php echo $form['jeudi_etat'] ?> <strong>Jeudi</strong></td>
                            <td rowspan="2"><?php echo $form['jeudi_type_cov']->renderError() ?>
                                <?php echo $form['jeudi_type_cov'] ?></td>
                            <td>min</td>
                            <td class="min"><?php echo $form['CpTrajet']['jeudi_prise_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['jeudi_prise_service_min'] ?></td>
                            
                            <td class="min"><?php echo $form['CpTrajet']['jeudi_fin_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['jeudi_fin_service_min'] ?></td>
                            
                        </tr>
                        <tr>
                            <td>max</td>
                            <td class="max"><?php echo $form['CpTrajet']['jeudi_prise_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['jeudi_prise_service_max'] ?></td>
                            <td class="max"><?php echo $form['CpTrajet']['jeudi_fin_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['jeudi_fin_service_max'] ?></td>
                        </tr>
                        
                        <tr class="vendredi">
                            <td rowspan="2"><?php echo $form['vendredi_etat']->renderError() ?>
                                <?php echo $form['vendredi_etat'] ?> <strong>Vendredi</strong></td>
                            <td rowspan="2"><?php echo $form['vendredi_type_cov']->renderError() ?>
                                <?php echo $form['vendredi_type_cov'] ?></td>
                            <td>min</td>
                            <td class="min"><?php echo $form['CpTrajet']['vendredi_prise_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['vendredi_prise_service_min'] ?></td>
                            
                            <td class="min"><?php echo $form['CpTrajet']['vendredi_fin_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['vendredi_fin_service_min'] ?></td>
                            
                        </tr>
                        <tr>
                            <td>max</td>
                            <td class="max"><?php echo $form['CpTrajet']['vendredi_prise_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['vendredi_prise_service_max'] ?></td>
                            <td class="max"><?php echo $form['CpTrajet']['vendredi_fin_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['vendredi_fin_service_max'] ?></td>
                        </tr>
                        
                        <tr class="samedi">
                            <td rowspan="2"><?php echo $form['samedi_etat']->renderError() ?>
                                <?php echo $form['samedi_etat'] ?> <strong>Samedi</strong></td>
                            <td rowspan="2"><?php echo $form['samedi_type_cov']->renderError() ?>
                                <?php echo $form['samedi_type_cov'] ?></td>
                            <td>min</td>
                            <td class="min"><?php echo $form['CpTrajet']['samedi_prise_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['samedi_prise_service_min'] ?></td>                            
                            <td class="min"><?php echo $form['CpTrajet']['samedi_fin_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['samedi_fin_service_min'] ?></td>
                            
                        </tr>
                        <tr>
                            <td>max</td>
                            <td class="max"><?php echo $form['CpTrajet']['samedi_prise_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['samedi_prise_service_max'] ?></td>
                            <td class="max"><?php echo $form['CpTrajet']['samedi_fin_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['samedi_fin_service_max'] ?></td>
                        </tr>
                        
                        <tr class="dimanche">
                            <td rowspan="2"><?php echo $form['dimanche_etat']->renderError() ?>
                                <?php echo $form['dimanche_etat'] ?> <strong>Dimanche</strong></td>
                            <td rowspan="2"><?php echo $form['dimanche_type_cov']->renderError() ?>
                                <?php echo $form['dimanche_type_cov'] ?></td>
                            <td>min</td>
                            <td class="min"><?php echo $form['CpTrajet']['dimanche_prise_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['dimanche_prise_service_min'] ?></td>                            
                            <td class="min"><?php echo $form['CpTrajet']['dimanche_fin_service_min']->renderError() ?>
                                <?php echo $form['CpTrajet']['dimanche_fin_service_min'] ?></td>
                            
                        </tr>
                        <tr>
                            <td>max</td>
                            <td class="max"><?php echo $form['CpTrajet']['dimanche_prise_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['dimanche_prise_service_max'] ?></td>
                            <td class="max"><?php echo $form['CpTrajet']['dimanche_fin_service_max']->renderError() ?>
                                <?php echo $form['CpTrajet']['dimanche_fin_service_max'] ?></td>
                        </tr>
                        


                    </tbody>
                </table>


            </div>
            <br class="clear"/>
        </div>



         <div id="trajet-occasionnel" class="ten columns">
            <h4>Trajet occasionnel</h4>  
            
            <div class="form-depot-trajet">        
                
                <label>Précisez (le retour est facultatif ) :</label>
                
                <?php echo $form['jour_unique_retour']->renderError() ?>
                <?php echo $form['jour_unique_retour'] ?>
            </div>
            <br class="clear"/>
            <div class="form-depot-trajet">                 
                <label>Rôle</label>
                
                <?php echo $form['jour_unique_type_cov']->renderError() ?>
                <?php echo $form['jour_unique_type_cov'] ?>
            </div>
            <br class="clear"/>
            <div class="form-depot-trajet" id="date-depart">                 
                <label>Départ le </label>
                <?php echo $form['jour_unique_date']->renderError() ?>
                <p class="calendrier"><?php echo $form['jour_unique_date'] ?></p>
            </div>
            <br class="clear"/>
            <div class="form-depot-trajet">                 
                <label>À</label>
                <?php echo $form['jour_unique_heure']->renderError() ?>
                <?php echo $form['jour_unique_heure'] ?>
            </div>
            <br class="clear"/>
            
            <div id="form-depot-trajet-retour">
                <div class="form-depot-trajet" id="date-retour">                 
                    <label>Retour le</label>
                    <?php echo $form['jour_unique_date_retour']->renderError() ?>
                    <p class="calendrier"><?php echo $form['jour_unique_date_retour'] ?></p>
                </div>
                <br class="clear"/>
                <div class="form-depot-trajet">                 
                    <label>À</label>
                    <?php echo $form['jour_unique_heure_retour']->renderError() ?>
                    <?php echo $form['jour_unique_heure_retour'] ?>
                </div>
                <br class="clear"/>
                <div class="form-depot-trajet">                 
                    <label>Rôle</label>
                    <?php echo $form['jour_unique_type_cov_retour']->renderError() ?>
                    <?php echo $form['jour_unique_type_cov_retour'] ?>
                </div>
                <br class="clear"/>
            </div>
            
            <table>
                <tbody>
            <tr>
                        <td colspan="2">
                            &nbsp;
                        </td>
                    </tr>

                    <tr>
                        <th colspan="2">
                            Accepte pour ce trajet :
                        </th>
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
                        <th><?php echo $form['tolerance_3']->renderLabel() ?></th>
                        <td>
                            <?php echo $form['tolerance_3']->renderError() ?>
                            <?php echo $form['tolerance_3'] ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo $form['tolerance_4']->renderLabel() ?></th>
                        <td>
                            <?php echo $form['tolerance_4']->renderError() ?>
                            <?php echo $form['tolerance_4'] ?>
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
                        <th>Volume bagages</th>
                        <td>
                            <?php echo $form['volume_bagage']->renderError() ?>
                            <?php echo $form['volume_bagage'] ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <br class="clear"/>
        </div>


        

        <div id="trajet-psa" class="ten columns">
           <h4>Trajet PSA</h4>
          <div>
                 <label>Horaire</label>
                 <?php echo $form['CpTrajet']['cp_etablissement_horaire_id']->renderError() ?>
                 <?php echo $form['CpTrajet']['cp_etablissement_horaire_id'] ?>
          </div>
          <div>
                 <label>Secteur</label>
                 <?php echo $form['CpTrajet']['cp_etablissement_secteur_id']->renderError() ?>
                 <?php echo $form['CpTrajet']['cp_etablissement_secteur_id'] ?>
          </div>
           <br class="clear"/>
      </div>


         
         <div id="presence-vehicule">
             <table class="partie1">
                 <tr>
                     <th>Véhicule</th>
                     <td>            
                        <?php echo $form['presence_vehicule']->renderError() ?>
                        <?php echo $form['presence_vehicule'] ?>
                    </td> 
                </tr>
             </table>
         </div>
         
         <div id="trajet-regulier-alt-veh" class="ten columns">
             <table class="partie1">
                 <tr>
                     <th>Alternance de véhicule</th>
                     <td>            
                        <?php echo $form['CpTrajet']['alternance_vehicule']->renderError() ?>
                        <?php echo $form['CpTrajet']['alternance_vehicule'] ?>
                    </td> 
                </tr>
             </table>
         </div>

         <div id="trajet-regulier-part-frais" class="ten columns">
             <table class="partie1">
                 <tr>
                     <th>Participation aux frais</th>
                     <td>            
                        <?php echo $form['cout']->renderError() ?>
                        <?php echo $form['cout'] ?>
                    </td> 
                </tr>
             </table>
         </div>
                
         <div id="trajet-occas-cout-global" class="ten columns">
             <table class="partie1">

                <tr>
                     <th>Autoroute</th>
                     <td>            
                        <?php echo $form['autoroute']->renderError() ?>
                        <?php echo $form['autoroute'] ?>
                    </td> 
                </tr>

             </table>
             
             <div id="trajet-occas-cout-global-autoroute" class="ten columns">

                     <th>Coût autoroute</th>
          
                        <?php echo $form['autoroute_cout']->renderError() ?>
                        <?php echo $form['autoroute_cout'] ?>

             </div>
             
             <div id="calcul-prix"> Calculer </div>
             
             <table class="partie1">
                 <tr>
                     <th>Coût passager</th>
                     <td>            
                        <?php echo $form['cout_passager']->renderError() ?>
                        <?php echo $form['cout_passager'] ?>
                    </td> 
                </tr>
                
             </table>
         </div>


        
            <table>
                <tbody>

    
                    <tr>            
                        <th>Nombre de places</th>
                        <td>            
                            <?php echo $form['nombre_de_place']->renderError() ?>
                            <?php echo $form['nombre_de_place'] ?>
                        </td>            
                    </tr>            
                 </tbody>
            </table>
        
       <div id="trajet-affich-vehicule" class="ten columns">

           <table>
                <tbody>
                    <tr>            
                        <th>Marque</th>
                        <td>            
                            <?php echo $form['vehicule_marque']->renderError() ?>
                            <?php //echo $form['vehicule_marque'] ?>
                            <?php
                            echo $form['vehicule_marque']->render(array(
                            'onchange' => jq_remote_function(array(
                            'update' => 'modele',
                            'url' => 'trajet/listVehiculeModeleParMarque',
                            'with' => "'idmarque='+value+'&idComposantForm=trajet_vehicule_modele&nomComposantForm=trajet[vehicule_modele]'"))
                            ))
                            ?>
                        </td>            
                    </tr> 
                    <tr>            
                        <th>Modèle</th>
                        <td>            
                            <div id="modele">
                                <?php //if ($form->getObject()->getIdModele()): ?>
                                <?php //echo $form->getObject()->getVehiculeModele(); ?>

                                <?php //endif; ?>
                                <?php echo $form['vehicule_modele'] ?>
                            </div>
                        </td> 
                    </tr> 
                 </tbody>
            </table>
           </div>

            <table>
                <tbody>          
                    <tr>            
                        <td colspan="2">            
                            &nbsp;
                        </td>            
                    </tr> 
                    <tr>            
                        <th><?php echo $form['description']->renderLabel() ?></th>
                        <td>            
                            <?php echo $form['description']->renderError() ?>
                            <?php echo $form['description'] ?>
                        </td>            
                    </tr>
                    <tr class="desc_spec_cp">
                        <th>Commentaires pour C+ </th>
                        <td>
                            <?php echo $form['technique']->renderError() ?>
                            <?php echo $form['technique'] ?>
                        </td>
                    </tr>
                    <tr>            
                        <th>Date dépublication</th>
                        <td>            
                            <?php echo $form['date_depublication']->renderError() ?>
                            <?php echo $form['date_depublication'] ?>
                        </td>            
                    </tr>  

                </tbody>
            </table>
        

    </div>

    <?php echo $form->renderHiddenFields(false) ?>

    <?php if (isset($popup)): ?>
            <?php if ($popup == 1): ?>
                <p>
                    <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
                </p>
                <input type="hidden" name="popup" value="1" />

                <?php if (!$form->getObject()->isNew()): ?>
                    <p class="supprimer"><?php echo link_to('Supprimer', 'trajet/delete?popup=1&id_trajet=' . $form->getObject()->getIdTrajet(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
                <?php endif; ?>
            <?php endif; ?>
        <?php else: ?>

            <p class="retour-liste"><a href="<?php echo url_for('trajet/index') ?>">Retour &agrave; la liste</a></p>

            <?php if (!$form->getObject()->isNew()): ?>
                <p class="supprimer"><?php echo link_to('Supprimer', 'trajet/delete?id_trajet=' . $form->getObject()->getIdTrajet(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
            <?php endif; ?>
        <?php endif; ?>

    
    
    
    <input type="submit" value="Sauvegarder" />

</form>

<br>
