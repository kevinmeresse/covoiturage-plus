<?php use_helper('jQuery'); ?>
<div class="form-tri">
    <?php use_stylesheets_for_form($form) ?>
    <?php use_javascripts_for_form($form) ?>

    <form action="<?php echo url_for('cp_etablissement/indexSociete') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
        <?php if (!$form->getObject()->isNew()): ?>
            <input type="hidden" name="sf_method" value="put" />
        <?php endif; ?>        

        <?php echo $form->renderGlobalErrors() ?>
        <div class="etab-search">
            <?php echo $form['cp_etablissement_raison_social']->renderLabel('Raison sociale') ?>
            <?php echo $form['cp_etablissement_raison_social']->renderError() ?>
            <?php
                    echo jq_input_auto_complete_tag(
                            'CpEtablissementRechercheRs[cp_etablissement_raison_social]', $raison_sociale , url_for1('cp_etablissement/autocompleteRs', TRUE), array('autocomplete' => 'on'), array('use_style' => true,'max' => sfConfig::get('app_max_etablissement_autcmp_list')))
                    ?>
        </div>



        <div class="etab-search">
            <?php echo $form['cp_etablissement_cp_etablissement_statut_id']->renderLabel('Statut') ?>
            <?php echo $form['cp_etablissement_cp_etablissement_statut_id']->renderError() ?>
            <?php echo $form['cp_etablissement_cp_etablissement_statut_id'] ?>
        </div>



        <?php echo $form->renderHiddenFields(false) ?>          
        <input type="submit" value="Rechercher" />

        <br class="clear"/>
    </form>
</div>