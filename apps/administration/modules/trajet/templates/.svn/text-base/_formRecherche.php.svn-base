<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('autocompletion'); ?>


<div class="form-tri-trajet">
    <form action="<?php echo url_for('trajet/list') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <?php if (!$form->getObject()->isNew()): ?>
            <input type="hidden" name="sf_method" value="put" />                            
        <?php endif; ?>
    
        <?php echo $form->renderHiddenFields(false) ?>
    
    
        <?php echo $form->renderGlobalErrors() ?>
    
            <input id="trajet_form_type" type="hidden" value="avnc" name="trajet[form_type]">
            
            <div id="trajet_form_part1">
                <div class="trajet_form_part1_inclu">
                    <label>Départ</label>
                    <?php echo $form['depart_ville']->renderError() ?>
                    <?php echo rm_input_autocomplete($form, 'trajet[depart_ville]', $tab_ville_autoc['depart_ville'], url_for1('trajet/autocomplete?target=depville', TRUE), array('autocomplete' => 'off'), array('use_style' => true), 'div_depart_autre_lieu', 'depart_autre_lieu', url_for('outils/listLocationsFromCityName'), 'DepotTrajet'); ?>
                    <?php echo $form['depart_ville_rayon'] ?>
                </div>
                <div class="clear"></div>
                
                <div class="trajet_form_part1_inclu">
                    <label class="interne">Ou</label>
                    <div id="div_depart_autre_lieu">
                        <?php echo $form['depart_autre_lieu']->renderError() ?>
                        <?php echo $form['depart_autre_lieu'] ?>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
                
                <div class="trajet_form_part1_inclu">
                    <label>Arrivée</label>
                    <?php echo $form['destination_ville']->renderError() ?>
                    <?php echo rm_input_autocomplete($form, 'trajet[destination_ville]', $tab_ville_autoc['destination_ville'], url_for1('trajet/autocomplete?target=destville', TRUE), array('autocomplete' => 'off'), array('use_style' => true), 'div_destination_autre_lieu', 'destination_autre_lieu', url_for('outils/listLocationsFromCityName'), 'DepotTrajet'); ?>
                    <?php echo $form['destination_ville_rayon'] ?>
                </div>
                <div class="clear"></div>
                
                <div class="trajet_form_part1_inclu">
                    <label class="interne">Ou</label>
                    <div id="div_destination_autre_lieu">
                        <?php echo $form['destination_autre_lieu']->renderError() ?>
                        <?php echo $form['destination_autre_lieu'] ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                
                <div class="trajet_form_part1_inclu">
                    <label>Evénement</label>
                    <?php echo $form['id_evenement'] ?>
                </div>
                <div class="clear"></div>
                
                <div class="trajet_form_part1_inclu">
                    <label>Ville étape</label>
                    <?php
                        echo jq_input_auto_complete_tag(
                                'trajet[ville_etape]', $tab_ville_autoc['ville_etape'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off', 'id' => 'ville_etape_id'), array('use_style' => true))
                        ?>
                </div>
                <div class="clear"></div>
                
                
            </div>
            
            <div id="trajet_form_part2">
                <div class="trajet_form_part2_inclu">
                    <label>Inscrit</label>
                    <?php echo $form['inscrit'] ?>
                    <?php echo $form['type_cov'] ?>
                </div>
                <div class="clear"></div>
                
                <div class="trajet_form_part2_inclu">
                    <label>Type de trajet</label>
                    <?php echo $form['id_type_trajet'] ?>
                </div>
                <div class="clear"></div>
                
                
                
                <div id="trajet_form_part2_inclu_regulier">
                    <div class="trajet_form_part2_inclu">
                        <label>Entreprise</label>
                            <?php if (sfContext::getInstance()->getUser()->getAttribute('Psa') == '1'): ?>
                                PSA
                            <?php else: ?>    
                                <?php
                                echo jq_input_auto_complete_tag(
                                        'trajet[etablissement]', $tab_ville_autoc['etablissement'], url_for1('cp_etablissement/autocompleteCovoit', TRUE), array('autocomplete' => 'on', 'size' => '50'), array('use_style' => true,'max' => sfConfig::get('app_max_etablissement_autcmp_list')))
                                ?>
                            <?php endif; ?> 

                    </div>
                    <div class="clear"></div>
                    
                    <div class="trajet_form_part2_inclu">
                        <label>Prise de service</label>
                        min <?php echo $form['heure_prise_min'] ?>
                        &nbsp;&nbsp;&nbsp;
                        max <?php echo $form['heure_prise_max'] ?>
                    </div>
                    <div class="clear"></div>

                    <div class="trajet_form_part2_inclu">
                        <label>Fin de service</label>
                        min <?php echo $form['heure_fin_min'] ?>
                        &nbsp;&nbsp;&nbsp;
                        max <?php echo $form['heure_fin_max'] ?>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div id="trajet_form_part2_inclu_psa">
                    <div class="trajet_form_part2_inclu">
                        <label>Horaires</label>
                        <?php echo $form['horaire_id'] ?>
                    </div>
                    <div class="clear"></div>

                    <div class="trajet_form_part2_inclu">
                        <label>Secteur</label>
                        <?php echo $form['secteur_id'] ?>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div id="trajet_form_part2_inclu_ponctuel">
                    <div class="trajet_form_part2_inclu">
                        <label>date</label>
                        <?php echo $form['date_creation'] ?>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="trajet_form_part2_inclu">
                    <label>Statut du trajet</label>
                    <?php echo $form['cp_type_action_statut_id'] ?>
                </div>
                <div class="clear"></div>
                
                
                
            </div>
            <div class="clear"></div>
            
            <div id="trajet_form_part3">
            <div class="trajet_form_part3_inclu">
                    <label>Date de création entre</label>
                         <?php echo $form['date_creation_deb'] ?>
                        &nbsp;&nbsp;&nbsp;et&nbsp;&nbsp;&nbsp;
                         <?php echo $form['date_creation_fin'] ?>
                </div>
                <div class="clear"></div>
            </div>
            <br class="clear">
            
 

        <p class="recherchestandard"><input type="submit" value="OK"></p>
    </form>
    <br class="clear">
</div>