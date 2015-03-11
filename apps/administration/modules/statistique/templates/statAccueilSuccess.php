<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php //echo "tab_stat : ".$tab_stat_param['etablissement'] ?>

<?php include_partial('formTriStat', array('form' => $form, 'tab_stat_param' => $tab_stat_param)) ?>

<div class="content-container">



    <?php include_component('covoitureur', 'statCovoitureurRap', array('tab_stat_param' => $tab_stat_param)) ?>


    <?php include_component('trajet', 'statTrajetStatut', array('tab_stat_param' => $tab_stat_param)) ?>


    <?php include_component('trajet_mise_en_relation', 'statTrajetMerStatut', array('tab_stat_param' => $tab_stat_param)) ?>

    <br class="clear" />
    <p class="lien-pdf">
        <a href="<?php
    echo url_for(array(
        'module' => 'statistique',
        'action' => 'statAccueilPdf',
        'datedeb'               => (is_null($tab_stat_param['pdf_date_debut'])?0:$tab_stat_param['pdf_date_debut']),
        'datefin'               => (is_null($tab_stat_param['pdf_date_fin'])?0:$tab_stat_param['pdf_date_fin']),
        'etablissement'         => ((is_null($tab_stat_param['etablissement']) || $tab_stat_param['etablissement'] == '')?0:$tab_stat_param['etablissement']),
        'groupe_stat'           => (is_null($tab_stat_param['groupe_stat_exp'])?0:$tab_stat_param['groupe_stat_exp']),
        'communaute_commune'    => (is_null($tab_stat_param['communaute_commune_exp'])?0:$tab_stat_param['communaute_commune_exp']),

    ))
    ?>">lien vers pdf</a>
    <p class="lien-csv">
        <?php
        
        echo link_to('lien vers csv', 'statistique/statAccueilCsv?datedeb=' . (is_null($tab_stat_param['pdf_date_debut'])?0:$tab_stat_param['pdf_date_debut']) .
                '&datefin=' .               (is_null($tab_stat_param['pdf_date_fin'])?0:$tab_stat_param['pdf_date_fin']) .
                '&etablissement=' .         ((is_null($tab_stat_param['etablissement']) || $tab_stat_param['etablissement'] == '')?0:$tab_stat_param['etablissement']) .
                '&groupe_stat=' .           (is_null($tab_stat_param['groupe_stat_exp'])?0:$tab_stat_param['groupe_stat_exp']) .
                '&communaute_commune=' .    (is_null($tab_stat_param['communaute_commune_exp'])?0:$tab_stat_param['communaute_commune_exp'])
                , array(
            'class' => 'foobar',
            'target' => '_blank'
        ))

        ?>
    <p>
</div>