<div class="block-stat">

    <h2>Informations sur les trajets</h2>

    <table class="stat-covoitureur">
        <tr>
            <td colspan="2" class="label">Nombre de trajets</td>
            <td>&nbsp;</td>
            <td class="value"><?php echo $tab_result_stat_trajet['trajetNb'] ?></td>
        </tr>

        <tr>
            <td colspan="2" class="label">Nombre de trajets occasionnels conducteur</td>
            <td>&nbsp;</td>
            <td class="value"><?php echo $tab_result_stat_trajet['trajetNbCondOcc'] ?></td>
        </tr>

        <tr>
            <td colspan="2" class="label">Nombre de trajets occasionnels passager</td>
            <td>&nbsp;</td>
            <td class="value"><?php echo $tab_result_stat_trajet['trajetNbPassOcc'] ?></td>
        </tr>

        <tr>
            <td colspan="2" class="label">Nombre de trajets réguliers conducteur</td>
            <td>&nbsp;</td>
            <td class="value"><?php echo $tab_result_stat_trajet['trajetNbCondReg'] ?></td>
        </tr>

        <tr>
            <td colspan="2" class="label">Nombre de trajets réguliers passager</td>
            <td>&nbsp;</td>
            <td class="value"><?php echo $tab_result_stat_trajet['trajetNbPassReg'] ?></td>
        </tr>

        <tr>
            <td colspan="2" class="label">Nombre de trajets sur un évènement</td>
            <td>&nbsp;</td>
            <td class="value"><?php echo $tab_result_stat_trajet['trajetNbEvenmt'] ?></td>
        </tr>

        <tr>
            <td colspan="2" class="label">Nombre de trajets sur une zone industrielle</td>
            <td>&nbsp;</td>
            <td class="value"><?php echo $tab_result_stat_trajet['trajetNbZi'] ?></td>
        </tr>

        <tr>
            <td colspan="4" class="label-titre">Top des villes de départ</td>

        </tr>
        <?php foreach ($tab_result_stat_trajet['topDepartVille'] as $key => $value): ?>
            <tr>
                <td>&nbsp;</td>
                <td class="label"><?php echo $key ?></td>
                <td>&nbsp;</td>
                <td class="value"><?php echo number_format($value, 2) ?>%</td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan="4" class="label-titre">Top des villes de destination</td>

        </tr>
        <?php foreach ($tab_result_stat_trajet['topDestVille'] as $key => $value): ?>
            <tr>
                <td>&nbsp;</td>
                <td class="label"><?php echo $key ?></td>
                <td>&nbsp;</td>
                <td class="value"><?php echo number_format($value, 2) ?>%</td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan="4" class="label-titre">Top des lieux de départ</td>

        </tr>
 <?php
 /*
        <?php foreach ($tab_result_stat_trajet['topLieuDepart'] as $key => $value): ?>
            <tr>
                <td>&nbsp;</td>
                <td class="label"><?php echo $key ?></td>
                <td>&nbsp;</td>
                <td class="value"><?php echo number_format($value, 2) ?>%</td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan="4" class="label-titre">Top des lieux de destination</td>

        </tr>
        <?php foreach ($tab_result_stat_trajet['topLieuDest'] as $key => $value): ?>
            <tr>
                <td>&nbsp;</td>
                <td class="label"><?php echo $key ?></td>
                <td>&nbsp;</td>
                <td class="value"><?php echo number_format($value, 2) ?>%</td>
            </tr>
        <?php endforeach; ?>

*/
            ?>


    </table>
</p>

<h2>Bilan environnemental</h2>

<p>
    <table class="stat-covoitureur">
        <tr>
            <td colspan="2" class="label">Km proposés</td>
            <td>&nbsp;</td>
            <td class="value"><?php echo ($tab_result_stat_trajet['trajetSomKmRegulA'] + 2 * $tab_result_stat_trajet['trajetSomKmRegulAR'])." km "?></td>
        </tr>

        <tr>
            <td colspan="2" class="label">CO2 généré</td>
            <td>&nbsp;</td>
            <td class="value"><?php echo ($tab_result_stat_trajet['CoParcourCo2Evite']['nb_co2_genere'] ) ?> tonnes</td>
        </tr>

        <tr>
            <td colspan="2" class="label">Km covoituré</td>
            <td>&nbsp;</td>
            <td class="value"><?php echo ($tab_result_stat_trajet['CoParcourCo2Evite']['compt_total_covoit'] ) ?> Km</td>
        </tr>

        <tr>
            <td colspan="2" class="label">CO2 évité</td>
            <td>&nbsp;</td>
            <td class="value"><?php echo ($tab_result_stat_trajet['CoParcourCo2Evite']['nb_co2_evite'] ) ?> tonnes</td>
        </tr>

    </table>
</p>

</div>