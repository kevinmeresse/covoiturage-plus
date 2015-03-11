<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery'); ?>
<form action="<?php echo url_for('trajet/' . ($form->getObject()->isNew() ? 'createAttachEquipage' : 'updateAttachEquipage') . (!$form->getObject()->isNew() ? '?id_trajet=' . $form->getObject()->getIdTrajet() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
   
        
        <?php if (!$form->getObject()->isNew()): ?>
    <div>L'équipage sera crée automatiquement lors de la sauvegarde de cette page.</div>
        <input type="hidden" name="sf_method" value="put" />    
        
    <?php endif; ?>
        <input id="id_equipage" type="hidden" value="<?php echo $id_equipage ?>" name="trajet[id_equipage]"></input>
        <input id="id_covoitureur_init" type="hidden" value="<?php echo $tab_ville_autoc['id_covoitureur_init'] ?>" name="trajet_equip[id_covoitureur_init]"></input>
        <input id="id_trajet_init" type="hidden" value="<?php echo $tab_ville_autoc['id_trajet_init'] ?>" name="trajet_equip[id_trajet_init]"></input>
        <input id="id_mer" type="hidden" value="<?php echo $tab_ville_autoc['id_mer'] ?>" name="trajet_equip[id_mer]"></input>
    <div class="trajet-form">
        <table class="partie1">    

            <tbody>    
                <?php echo $form->renderGlobalErrors() ?>

                <tr>            
                    <th>Covoitureur</th>            
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
                        <?php
                        echo jq_input_auto_complete_tag(
                                'trajet[depart_ville]', $tab_ville_autoc['depart_ville'], url_for1('trajet/autocomplete?target=depville', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                        ?>

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
                        <?php echo $form['depart_autre_lieu']->renderError() ?>
                        <?php echo $form['depart_autre_lieu'] ?>
                    </td>            
                </tr>

                <tr>            
                    <th>Ville de destination</th>
                    <td>            
                        <?php echo $form['destination_ville']->renderError() ?>
                        <?php
                        echo jq_input_auto_complete_tag(
                                'trajet[destination_ville]', $tab_ville_autoc['destination_ville'], url_for1('trajet/autocomplete?target=destville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                        ?>
                    </td>            
                </tr>    
                <tr>            
                    <th>adresse</th>
                    <td>            
                        <?php echo $form['destination_adresse']->renderError() ?>
                        <?php echo $form['destination_adresse'] ?>
                    </td>            
                </tr>

                <tr>            
                    <th>lieu</th>
                    <td>            
                        <?php echo $form['destination_autre_lieu']->renderError() ?>
                        <?php echo $form['destination_autre_lieu'] ?>
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
                        <?php
                        echo jq_input_auto_complete_tag(
                                'trajet[etape1_ville]', $tab_ville_autoc['etape1_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                        ?>
                    </td>            

                </tr>            
                <tr class="etape">            
                    <th>Etape 2</th>
                    <td>            
                        <?php echo $form['etape2_ville']->renderError() ?>
                        <?php
                        echo jq_input_auto_complete_tag(
                                'trajet[etape2_ville]', $tab_ville_autoc['etape2_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                        ?>
                    </td>            
                </tr>            
                <tr class="etape">            
                    <th>Etape 3</th>
                    <td>            
                        <?php echo $form['etape3_ville']->renderError() ?>
                        <?php
                        echo jq_input_auto_complete_tag(
                                'trajet[etape3_ville]', $tab_ville_autoc['etape3_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                        ?>
                    </td>            
                </tr>            
                <tr class="etape">            
                    <th>Etape 4</th>
                    <td>            
                        <?php echo $form['etape4_ville']->renderError() ?>
                        <?php
                        echo jq_input_auto_complete_tag(
                                'trajet[etape4_ville]', $tab_ville_autoc['etape4_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                        ?>
                    </td>            
                </tr>            
                <tr class="etape">            
                    <th>Etape 5</th>
                    <td>            
                        <?php echo $form['etape5_ville']->renderError() ?>
                        <?php
                        echo jq_input_auto_complete_tag(
                                'trajet[etape5_ville]', $tab_ville_autoc['etape5_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                        ?>
                    </td>            
                </tr>            


            </tbody>
        </table>


        <div class="regulier">
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
                            <?php echo $form['lundi_type_cov'] ?>
                        </td>
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
                            <?php echo $form['mardi_etat'] ?> <strong>Mardi</strong>
                        </td>
                        <td rowspan="2"><?php echo $form['mardi_type_cov']->renderError() ?>
                            <?php echo $form['mardi_type_cov'] ?>
                        </td>
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
                            <?php echo $form['mercredi_etat'] ?> <strong>Mercredi</strong>
                        </td>
                        <td rowspan="2"><?php echo $form['mercredi_type_cov']->renderError() ?>
                            <?php echo $form['mercredi_type_cov'] ?>
                        </td>
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
                            <?php echo $form['jeudi_etat'] ?> <strong>Jeudi</strong>
                        </td>
                        <td rowspan="2"><?php echo $form['jeudi_type_cov']->renderError() ?>
                            <?php echo $form['jeudi_type_cov'] ?>
                        </td>
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
                            <?php echo $form['vendredi_etat'] ?> <strong>Vendredi</strong>
                        </td>
                        <td rowspan="2"><?php echo $form['vendredi_type_cov']->renderError() ?>
                            <?php echo $form['vendredi_type_cov'] ?>
                        </td>
                        <td>min</td>
                        <td class="min" ><?php echo $form['CpTrajet']['vendredi_prise_service_min']->renderError() ?>
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
                            <?php echo $form['samedi_etat'] ?> <strong>Samedi</strong>
                        </td>
                        <td rowspan="2"><?php echo $form['samedi_type_cov']->renderError() ?>
                            <?php echo $form['samedi_type_cov'] ?>
                        </td>
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
                            <?php echo $form['dimanche_etat'] ?> <strong>Dimanche</strong>
                        </td>
                        <td rowspan="2"><?php echo $form['dimanche_type_cov']->renderError() ?>
                            <?php echo $form['dimanche_type_cov'] ?>
                        </td>
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


        <div>
            <table>
                <tbody>

                    <tr>            
                        <th><?php echo $form['nombre_de_place']->renderLabel() ?></th>
                        <td>            
                            <?php echo $form['nombre_de_place']->renderError() ?>
                            <?php echo $form['nombre_de_place'] ?>
                        </td>            
                    </tr>            



                    <tr>            
                        <th>Participation aux frais</th>
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
                        <td>Modèle</td>  
                        <td>            
                            <div id="modele">
                                <?php //if ($form->getObject()->getIdModele()): ?>
                                <?php //echo $form->getObject()->getVehiculeModele(); ?>

                                <?php //endif; ?>
                                <?php echo $form['vehicule_modele'] ?>
                            </div>
                        </td> 
                    </tr> 


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
                        <th><?php echo $form['volume_bagage']->renderLabel() ?></th>
                        <td>            
                            <?php echo $form['volume_bagage']->renderError() ?>
                            <?php echo $form['volume_bagage'] ?>
                        </td>            
                    </tr>    
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
                    <tr>            
                        <th><?php echo $form['date_depublication']->renderLabel() ?></th>
                        <td>            
                            <?php echo $form['date_depublication']->renderError() ?>
                            <?php echo $form['date_depublication'] ?>
                        </td>            
                    </tr>  

                </tbody>
            </table>
        </div>

    </div>


    <?php echo $form->renderHiddenFields(false) ?> 
    <p class="retour-liste"><a href="<?php echo url_for('trajet_mise_en_relation/show?id_trajet_mise_en_relation='.$id_mer) ?>">Retour &agrave; la MER</a></p>

    <input type="submit" value="<?php echo  ($form->getObject()->isNew() ? 'Créer l\'équipage et rattacher le trajet' : 'Rattacher à l\'équipage') ?>" />

</form>

<br>
<?php
//print_r($form['depart_ville'])  ?>