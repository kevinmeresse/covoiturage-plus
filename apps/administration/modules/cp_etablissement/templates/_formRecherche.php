<?php use_helper('jQuery'); ?>
<div class="form-tri">
    <?php use_stylesheets_for_form($form) ?>
    <?php use_javascripts_for_form($form) ?>

    <form action="<?php echo url_for('cp_etablissement/index') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <?php if (!$form->getObject()->isNew()): ?>
            <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>        

        <?php echo $form->renderGlobalErrors() ?>
        <div class="etab-search">
            <?php echo $form['cp_etablissement_etablissement_nom']->renderLabel('Etablissement') ?>
            <?php echo $form['cp_etablissement_etablissement_nom']->renderError() ?>
             <?php
                    echo jq_input_auto_complete_tag(
                            'CpEtablissementRecherche[cp_etablissement_etablissement_nom]', $nom_etb, url_for1('cp_etablissement/autocomplete', TRUE), array('autocomplete' => 'on'), array('use_style' => true,'max' => sfConfig::get('app_max_etablissement_autcmp_list')))
                    ?>
        </div>
            
        <div class="etab-rs-search">
            <?php echo $form['cp_etablissement_raison_social']->renderLabel('Raison Sociale') ?>
            <?php echo $form['cp_etablissement_raison_social']->renderError() ?>
             <?php
                    echo jq_input_auto_complete_tag(
                            'CpEtablissementRecherche[cp_etablissement_raison_social]', $raison_sociale , url_for1('cp_etablissement/autocompleteRs', TRUE), array('autocomplete' => 'on'), array('use_style' => true,'max' => sfConfig::get('app_max_etablissement_autcmp_list')))
                    ?>
        </div>
            
            <br class="clear">


        <div class="etab-search">
            <?php echo $form['cp_etablissement_zone_id']->renderLabel('Zone') ?>
            <?php echo $form['cp_etablissement_zone_id']->renderError() ?>
            <?php echo $form['cp_etablissement_zone_id'] ?>
        </div> 

        <div class="etab-search">
            <?php echo $form['cp_etablissement_cp_etablissement_statut_id']->renderLabel('Statut') ?>
            <?php echo $form['cp_etablissement_cp_etablissement_statut_id']->renderError() ?>
            <?php echo $form['cp_etablissement_cp_etablissement_statut_id'] ?>
        </div>

        <div class="etab-search">
            <?php echo $form['ville']->renderLabel('Ville') ?>
            <?php echo $form['ville']->renderError() ?>
            <?php
                    echo jq_input_auto_complete_tag(
                            'CpEtablissementRecherche[ville]', $ville_autocomp, url_for1('ville_fr/autocomplete', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
                    ?>
        </div>


        <?php echo $form->renderHiddenFields(false) ?>          
        <input type="submit" value="Rechercher" />

        <br class="clear"/>
    </form>
</div>