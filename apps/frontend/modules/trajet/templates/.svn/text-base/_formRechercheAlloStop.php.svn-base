<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div id="recherche">
    <form action="<?php echo url_for('trajet/listAlloStop') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?> >    
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
            <p class="avancee"><a class="btnavancee">Recherche avanc&eacute;e ?</a></p>
        </div>
        <div id="droite">
            <p><input type="submit" value="OK"></p>
        </div>
        <br class="clear">

    </form>
</div>

<div id="rechercheavancee">
    <form action="<?php echo url_for('trajet/listAlloStop') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
          <?php if (!$form->getObject()->isNew()): ?>
                <input type="hidden" name="sf_method" value="put" />    
            <?php endif; ?>

            <?php echo $form->renderHiddenFields(false) ?>


            <?php echo $form->renderGlobalErrors() ?>

            <input id="trajet_form_type" type="hidden" value="avnc" name="trajet[form_type]">
        <fieldset>
            <p>
                <label>Départ</label>
                <?php echo $form['depart_ville']->renderError() ?>
                <?php
                echo jq_input_auto_complete_tag(
                        'trajet[depart_ville]', $tab_ville_autoc['depart_ville'], url_for1('trajet/autocomplete?target=depville', TRUE), array('autocomplete' => 'on','id'=>'depart_ville2'), array('use_style' => true))
                ?>
                <?php echo $form['depart_ville_rayon'] ?>
            </p>
            <p>
                Ou
                <?php echo $form['depart_autre_lieu'] ?>
            </p>  
            <p>
                <label>Arrivée</label>
                <?php echo $form['destination_ville']->renderError() ?>
                <?php
                echo jq_input_auto_complete_tag(
                        'trajet[destination_ville]', $tab_ville_autoc['destination_ville'], url_for1('trajet/autocomplete?target=destville', TRUE), array('autocomplete' => 'off','id'=>'destination_ville2'), array('use_style' => true))
                ?>
                <?php echo $form['destination_ville_rayon'] ?>
            </p>
            <p>
                Ou
                <?php echo $form['destination_autre_lieu'] ?>
            </p>  

                              
            
        </fieldset>
        <fieldset>
              <p>
                <label>Evénement</label>
                <?php echo $form['id_evenement'] ?>
            </p>  
            <p>
                <label>Je cherche</label>
                <?php echo $form['type_cov'] ?>
            </p>

            <p>&nbsp;</p>
            <p class="recherchestandard"><a class="btnrecherchestandard">Recherche simplifié</a><input type="submit" value="OK"></p>
        </fieldset>  
    </form>
    <br class="clear">
</div>