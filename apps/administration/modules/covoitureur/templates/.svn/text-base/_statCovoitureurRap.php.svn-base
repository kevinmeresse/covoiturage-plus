<div class="block-stat-covoitureur">

<h2>Informations sur les inscrits</h2>


<table class="stat-covoitureur">
    <tr>
        <td colspan="2" class="label">Nombre de inscrits</td>
        <td>&nbsp;</td>
        <td class="value"><?php echo $tab_result_stat['nbCovoitureur'] ?></td>
    </tr>
    
    <tr>
        <td colspan="2" class="label">Nombre de femmes</td>
        <td>&nbsp;</td>
        <td class="value"><?php echo $tab_result_stat['covoitureurNbF'] ?></td>
    </tr>
    <tr>
        <td colspan="2" class="label">Nombre d'hommes</td>
        <td>&nbsp;</td>
        <td class="value"><?php echo $tab_result_stat['covoitureurNbH'] ?></td>
    </tr>
    
    <tr>
        <td colspan="2" class="label">Bénéficiaires du RSA</td>
        <td>&nbsp;</td>
        <td class="value"><?php echo round($tab_result_stat['covoitureurNbRsa'],2) ?> %</td>
    </tr>
    
    <tr>
        <td colspan="2" class="label">Nombre inscrits Peugeot</td>
        <td>&nbsp;</td>
        <td class="value"><?php echo $tab_result_stat['covoitureurNbPgt'] ?></td>
    </tr>
    <tr>
        <td colspan="4" class="label-titre"">Répartition par secteur</td>

    </tr>

<?php foreach($tab_result_stat['tabEqPsa'] as $key => $value ): ?>
    <tr>
        <td>&nbsp;</td>
        <td class="label"><?php echo $key ?></td>
        <td>&nbsp;</td>
        <td class="value"><?php echo number_format($value, 2) ?>%</td>
    </tr>
<?php endforeach; ?>
    
    <tr>
        <td colspan="4" class="label-titre">Répartition par horaire</td>

    </tr>

<?php foreach($tab_result_stat['tabHrPsa'] as $key => $value ): ?>
    <tr>
        <td>&nbsp;</td>
        <td class="label"><?php echo $key ?></td>
        <td>&nbsp;</td>
        <td class="value"><?php echo number_format($value, 2) ?>%</td>
    </tr>
<?php endforeach; ?>
    
    <tr>
        <td colspan="4" class="label-titre">Répartion par fonction</td>

    </tr>

<?php foreach($tab_result_stat['tabFct'] as $key => $value ): ?>
    <tr>
        <td>&nbsp;</td>
        <td class="label"><?php echo $key ?></td>
        <td>&nbsp;</td>
        <td class="value"><?php echo number_format($value, 2) ?>%</td>
    </tr>
<?php endforeach; ?>
    
    
    <tr>
        <td colspan="4" class="label-titre">Connaissance de l'association</td>

    </tr>

<?php foreach( $tab_result_stat['tabLienSite'] as $key => $value ): ?>
    <tr>
        <td>&nbsp;</td>
        <td class="label"><?php echo $key ?></td>
        <td>&nbsp;</td>
        <td class="value"><?php echo number_format($value, 2) ?>%</td>
    </tr>
<?php endforeach; ?>
    
    
    <tr>
        <td colspan="4" class="label-titre">Répartition par tranche d'âge</td>

    </tr>
    <tr>
        <td>&nbsp;</td>
        <td class="label"><?php echo $tab_result_stat['trancheAge1'] ?></td>
        <td>&nbsp;</td>
        <td class="value"><?php echo number_format($tab_result_stat['nbPourCentTrAg1'], 2) ?>%</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td class="label"><?php echo $tab_result_stat['trancheAge2'] ?></td>
        <td>&nbsp;</td>
        <td class="value"><?php echo number_format($tab_result_stat['nbPourCentTrAg2'], 2) ?>%</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td class="label"><?php echo $tab_result_stat['trancheAge3'] ?></td>
        <td>&nbsp;</td>
        <td class="value"><?php echo number_format($tab_result_stat['nbPourCentTrAg3'], 2) ?>%</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td class="label"><?php echo $tab_result_stat['trancheAge4'] ?></td>
        <td>&nbsp;</td>
        <td class="value"><?php echo number_format($tab_result_stat['nbPourCentTrAg4'], 2) ?>%</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td class="label"><?php echo $tab_result_stat['trancheAge5'] ?></td>
        <td>&nbsp;</td>
        <td class="value"><?php echo number_format($tab_result_stat['nbPourCentTrAg5'], 2) ?>%</td>
    </tr>
    
    <tr>
        <td colspan="4">Domiciliation</td>

    </tr>
    <?php foreach($tab_result_stat['tabDomicile'] as $key => $value ): ?>
    <tr>
        <td>&nbsp;</td>
        <td class="label"><?php echo $key ?></td>
        <td>&nbsp;</td>
        <td class="value"><?php echo number_format($value, 2) ?>%</td>
    </tr>
<?php endforeach; ?>
    

</table>

<?php include_component('equipage', 'statRapEquipage') ?>

</div>
