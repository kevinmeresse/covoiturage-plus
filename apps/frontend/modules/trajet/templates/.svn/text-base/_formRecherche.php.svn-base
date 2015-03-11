<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('autocompletion'); ?>
<div id="recherche">
    <form action="<?php echo url_for('trajet/list') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> >    
        <div id="gauche">
            <?php if (!$form->getObject()->isNew()): ?>
                <input type="hidden" name="sf_method" value="put" />    
            <?php endif; ?>

            <?php echo $form->renderHiddenFields(false) ?>


            <?php echo $form->renderGlobalErrors() ?>

            <input id="trajet_form_type" type="hidden" value="smpl" name="trajet[form_type]">


            <p>
                <label class="depart">     </label>       
                <?php echo $form['depart_ville']->renderError() ?>
                <?php //echo $form['depart_ville'] ?>
                <?php
                echo jq_input_auto_complete_tag(
                        'trajet[depart_ville]', $tab_ville_autoc['depart_ville'], url_for1('trajet/autocomplete?target=depville', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                ?>

            </p>           
            <p><label class="arrive"></label>

                <?php echo $form['destination_ville']->renderError() ?>
                <?php //echo $form['destination_ville'] ?>
                <?php
                echo jq_input_auto_complete_tag(
                        'trajet[destination_ville]', $tab_ville_autoc['destination_ville'], url_for1('trajet/autocomplete?target=destville', TRUE), array('autocomplete' => 'off'), array('use_style' => true))
                ?>
            </p>
            <p class="avancee"><a class="btnavancee">Recherche avanc&eacute;e</a></p>
        </div>
        <div id="droite">
            <p><input type="submit" value="OK"></p>
        </div>
        <br class="clear">

    </form>
</div>

<div id="rechercheavancee">
    <form action="<?php echo url_for('trajet/list') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <?php if (!$form->getObject()->isNew()): ?>
            <input type="hidden" name="sf_method" value="put" />    
        <?php endif; ?>

        <?php echo $form->renderHiddenFields(false) ?>


        <?php echo $form->renderGlobalErrors() ?>

        <input id="trajet_form_type" type="hidden" value="avnc" name="trajet[form_type]">
        <fieldset>
            <p>
                <label class="left">Départ</label><label class="right">Rayon</label>
                <?php echo $form['depart_ville']->renderError() ?>
                <?php echo rm_input_autocomplete($form, 'trajet[depart_ville]', $tab_ville_autoc['depart_ville'], url_for1('trajet/autocomplete?target=depville', TRUE), array('autocomplete' => 'off', 'id' => 'depart_ville2'), array('use_style' => true), 'div_depart_lieu', 'depart_autre_lieu', url_for('outils/listLocationsFromCityName'), 'Recherche'); ?>
                <?php echo $form['depart_ville_rayon'] ?>
            </p>
            <div id="div_depart_lieu"></div>
            <p>
                <label class="left">Arrivée</label><label class="right">Rayon</label>
                <?php echo $form['destination_ville']->renderError() ?>
                <?php echo rm_input_autocomplete($form, 'trajet[destination_ville]', $tab_ville_autoc['destination_ville'], url_for1('trajet/autocomplete?target=destville', TRUE), array('autocomplete' => 'off', 'id' => 'destination_ville2'), array('use_style' => true), 'div_destination_lieu', 'destination_autre_lieu', url_for('outils/listLocationsFromCityName'), 'Recherche'); ?>
                <?php echo $form['destination_ville_rayon'] ?>
            </p>
            <div id="div_destination_lieu"></div>
            <p>
                <label>Evénement</label>
                <?php echo $form['id_evenement'] ?>
            </p>                      

        </fieldset>
        <fieldset>
            <p>
                <label>Je cherche</label>
                <?php echo $form['type_cov'] ?>
            </p>
            <p>
                <label>Type de trajet</label>
                <?php echo $form['id_type_trajet'] ?>
            </p>
            <div id="regulier">
            <p>
                <label>Entreprise</label>
                <?php
                            echo jq_input_auto_complete_tag(
                                    'trajet[etablissement]', $tab_ville_autoc['etablissement'], url_for1('cp_etablissement/autocompleteCovoit', TRUE), array('autocomplete' => 'on', 'size' => '60'), array('use_style' => true))
                            ?>
            </p>
            
            <p>
                <label>Prise de service</label>
                <?php echo $form['heure_prise_min'] ?>&nbsp;-&nbsp;<?php echo $form['heure_prise_max'] ?>
            </p>
            <p>
                <label>Fin de service</label>
                <?php echo $form['heure_fin_min'] ?>&nbsp;-&nbsp;<?php echo $form['heure_fin_max'] ?>
            </p>
            </div>
            <div id="psa">
                <p>                 
                    <label>Régime horaire</label>

                    <?php echo $form['horaire_id'] ?>
                </p>

                <P>                 
                    <label>Secteur de travail</label>

                    <?php echo $form['secteur_id'] ?>
                </p>
                <br class="clear"/>
            </div>
            <div id="ponctuel">
                 <p>
                <label>Date</label>
                <?php echo $form['jour_unique_date'] ?>
            </p>
            </div>
            <p>&nbsp;</p>
            <p class="recherchestandard"><a class="btnrecherchestandard">Recherche simple</a><input type="submit" value="OK"></p>
        </fieldset>  
    </form>
    <br class="clear">
</div>