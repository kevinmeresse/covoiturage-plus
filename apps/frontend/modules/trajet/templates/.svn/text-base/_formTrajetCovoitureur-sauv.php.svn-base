<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery'); ?>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="/js/gmap3.js"></script>


<div id="depot-trajet">
    <h3><span>1</span>Lieux de départ et de destination</h3>

    <div class="etape1"> 
        <form action="<?php echo url_for('trajet/' . ($form->getObject()->isNew() ? 'createTrajetCovoitIdent' : 'updateTrajetCovoitIdent') . (!$form->getObject()->isNew() ? '?id_trajet=' . $form->getObject()->getIdTrajet() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
            <?php echo $form->renderGlobalErrors() ?>

            <div class="form-depot-trajet">                 
                <label>Ville de départ*</label>
                <?php echo $form['depart_ville']->renderError() ?>
                <?php
                echo jq_input_auto_complete_tag(
                        'trajet[depart_ville]', $tab_ville_autoc['depart_ville'], url_for1('trajet/autocomplete?target=depville', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                ?>
            </div>
            <br class="clear"/>
            <div id="infos-depart">
                <div class="form-depot-trajet">                 
                    <label>Précisez l'adresse</label>
                    <?php echo $form['depart_adresse']->renderError() ?>
                    <?php echo $form['depart_adresse'] ?>
                </div>
                <br class="clear"/>
                <p> ou</p>
                <br class="clear"/>
                <div class="form-depot-trajet">                 
                    <label>Selectionnez un lieu</label>
                    <?php echo $form['depart_autre_lieu']->renderError() ?>
                    <?php echo $form['depart_autre_lieu'] ?>
                </div>
                <br class="clear"/>
            </div>
            <br class="clear"/>
            <div class="form-depot-trajet">                 
                <label>Ville de destination*</label>
                <?php echo $form['destination_ville']->renderError() ?>
                <?php
                echo jq_input_auto_complete_tag(
                        'trajet[destination_ville]', $tab_ville_autoc['destination_ville'], url_for1('trajet/autocomplete?target=destville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                ?>
            </div>
            <br class="clear"/>
            <div id="infos-arrive">


                <div class="form-depot-trajet">                 
                    <label>Précisez l'adresse</label>
                    <?php echo $form['destination_adresse']->renderError() ?>
                    <?php echo $form['destination_adresse'] ?>
                </div>
                <br class="clear"/>
                <p> ou</p>
                <br class="clear"/>
                <div class="form-depot-trajet">                 
                    <label>Selectionnez un lieu</label>
                    <?php echo $form['destination_autre_lieu']->renderError() ?>
                    <?php echo $form['destination_autre_lieu'] ?>
                </div>
                <br class="clear"/>

            </div>
            <br class="clear"/>
            <div class="form-depot-trajet">
                <label> Voulez-vous préciser des étapes? </label>
                <ul class="radio-list">
                    <li><input id="ville-etape-non" type="radio" value="0" name="partageFrais">
                        <label>non</label></li>
                    <li><input id="ville-etape-oui" type="radio" value="1" name="partageFrais">
                        <label>oui</label></li>
                </ul>
            </div>
            <br class="clear"/>
            <br/>
            <div id="ville-etape">
                <p> Villes de passage</p>
                <div class="form-depot-trajet">                 
                    <label>Etape 1</label>
                    <?php echo $form['etape1_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[etape1_ville]', $tab_ville_autoc['etape1_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </div>
                <br class="clear"/>
                <div class="form-depot-trajet">                 
                    <label>Etape 2</label>
                    <?php echo $form['etape2_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[etape2_ville]', $tab_ville_autoc['etape2_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </div>
                <br class="clear"/>
                <div class="form-depot-trajet">                 
                    <label>Etape 3</label>
                    <?php echo $form['etape3_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[etape3_ville]', $tab_ville_autoc['etape3_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </div>
                <br class="clear"/>
                <div class="form-depot-trajet">                 
                    <label>Etape 4</label>
                    <?php echo $form['etape4_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[etape4_ville]', $tab_ville_autoc['etape4_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </div>
                <br class="clear"/>
                <div class="form-depot-trajet">                 
                    <label>Etape 5</label>
                    <?php echo $form['etape5_ville']->renderError() ?>
                    <?php
                    echo jq_input_auto_complete_tag(
                            'trajet[etape5_ville]', $tab_ville_autoc['etape5_ville'], url_for1('trajet/autocomplete?target=etapville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                    ?>
                </div>
                <br class="clear"/>
            </div>		
            <p class="etape-suivante" id="goto-etape-deux">Étape suivante</p>
            <br class="clear"/>
    </div>	

    <h3><span>2</span>Dates et type de trajets</h3>	
    <div class="etape2">

        <br class="clear"/>

        <div id="trajet-regulier" class="ten columns">
            <h4>Trajet regulier</h4>
            <div class="form-depot-trajet">                 
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


        <br class="clear"/>

        <p class="etape-suivante" id="goto-etape-trois">Étape suivante</p>
        <br class="clear"/>
    </div>

    <h3><span>3</span>Informations suppl&eacute;mentaires</h3>	
    <div class="etape3">




        <div class="form-depot-trajet">                 
            <label>Marque</label>
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
        </div>
        <br class="clear"/>

        <div class="form-depot-trajet">                 
            <label>Modèle</label>
            <?php echo $form['vehicule_modele']->renderError() ?>

            <div id="modele">

                <?php echo $form['vehicule_modele'] ?>
            </div>
        </div>
        <br class="clear"/>

        <div class="form-depot-trajet">                 
            <label>Nombre de place(s) disponible(s)</label>
            <?php echo $form['nombre_de_place']->renderError() ?>
            <?php echo $form['nombre_de_place'] ?>
        </div>
        <br />
        <br class="clear"/>

        <div class="form-depot-trajet"  id="description">                 
            <?php echo $form['description']->renderLabel() ?>
            <?php echo $form['description']->renderError() ?>
            <?php echo $form['description'] ?>
        </div>
        <br class="clear"/>


        <div class="form-depot-trajet">
            <label> Participation aux frais </label>
            <ul class="radio-list">
                <li><input id="partage-frais-non" type="radio" value="0" name="partageFrais">
                    <label>non</label></li>
                <li><input id="partage-frais-oui" type="radio" value="1" name="partageFrais">
                    <label>oui</label></li>
            </ul>
        </div>
        <br class="clear"/>
        <div id="cout-trajet">

            <br class="clear"/>
            <div class="form-depot-trajet">                 
                <label>Passage par autoroute</label>
                <?php echo $form['autoroute']->renderError() ?>
                <ul class="radio-list">
                    <li><input id="autoroute-non" type="radio"  value="0" name="autoroute">
                        <label>non</label></li>
                    <li><input id="autoroute-oui" type="radio" value="1" name="autoroute">
                        <label>oui</label></li>
                </ul>
            </div>
            <br class="clear"/>
            <div  id="cout-peage" class="form-depot-trajet" style="display: none;">                 
                <label>Coût du péage(&euro;)</label>
                <?php echo $form['autoroute_cout']->renderError() ?>
                <?php echo $form['autoroute_cout'] ?>
            </div>
            <br class="clear"/>
            <div id="calcul-prix" >   
                Calculer
            </div>
            <br class="clear"/>
            <div class="form-depot-trajet">                 
                <label>Prix demandé par passagers(&euro;)</label>
                <?php echo $form['cout_passager']->renderError() ?>
                <?php echo $form['cout_passager'] ?>
            </div>
            <br class="clear"/>
        </div>
        <br class="clear"/>
        <br />
        <div id="tolerances">
            <label> J'accepte pour ce trajet :</label>

            <div id="jaccepte" class="form-depot-trajet">
                <div id="animaux"><img class="non" src="/images/picto/animaux-no.png" alt="je n'accepte pas les animaux"/><img class="oui" src="/images/picto/animaux-orange.png" alt="j'accepte les animaux"/></div>
                <div id="fumeur"><img class="non" src="/images/picto/cigarette-no.png" alt="je n'accepte pas la fumée en voiture"/><img class="oui" src="/images/picto/cigarette-orange.png" alt="je accepte la fumée en voiture"/></div>
                <div id="musique"><img class="non" src="/images/picto/music-no.png" alt="je n'accepte pas la musique"/><img class="oui" src="/images/picto/music-orange.png" alt="j'accepte la musique"/></div>
                <div id="discu"><img class="non" src="/images/picto/discu-no.png" alt="je n'accepte pas les discussions"/><img class="oui" src="/images/picto/discu-orange.png" alt="j'accepte les discussions"/></div>
                <br class="clear"/>

            </div>
        </div>
        <br class="clear"/>
        <br />
        <div class="form-depot-trajet">
            <label>J'accepte les bagages</label>
            <?php echo $form['tolerance_2'] ?>
        </div>
        <br class="clear"/>
        <div id="taille-bagage">
            <div id="petit" class="bagages"><img class="non" src="/images/picto/petit-bagage-no.png" alt="je n'accepte pas les petits bagages"/><img class="oui" src="/images/picto/petit-bagage-orange.png" alt="j'accepte les petits bagages"/> </div>  	
            <div id="moyen" class="bagages"><img class="non" src="/images/picto/moyen-bagage-no.png" alt="je n'accepte pas les bagages de taille moyenne"/><img class="oui" src="/images/picto/moyen-bagage-orange.png" alt="j'accepte les bagages de taille moyenne"/></div>
            <div id="gros" class="bagages"><img class="non" src="/images/picto/gros-bagage-no.png" alt="je n'accepte pas les gros bagages"/><img class="oui" src="/images/picto/gros-bagage-orange.png" alt="j'accepte les gros bagages"/></div>

        </div>
        <br class="clear"/>

        <?php echo $form->renderHiddenFields(false) ?>
        <p class="retour"><a href="<?php echo url_for('trajet/index') ?>">Retour</a></p>
        <input type="submit" value="Valider" />  


    </div>
</form>


</div>
