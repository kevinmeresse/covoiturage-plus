<h2>Trajet <i><?php echo $trajet->getDepartVille() ?> - <?php echo $trajet->getDestinationVille() ?></i></h2>

<table>
    <tbody>
        <tr>
            <th>Ville de départ</th>
            <td><?php echo $trajet->getDepartVille() ?></td>
        </tr>
        <tr>
            <th>Ville de destination</th>
            <td><?php echo $trajet->getDestinationVille() ?></td>
        </tr>
        <tr>
            <th>Inscrit</th>
            <td><?php echo $trajet->getCovoitureur()->getNom() . " " . $trajet->getCovoitureur()->getPrenom() ?></td>
        </tr>

        <tr>
            <th>Mail</th>
            <td><?php echo $trajet->getCovoitureur()->getMail() ?></td>
        </tr>
        <tr>
            <th>Ville</th>
            <td><?php echo $trajet->getCovoitureur()->getVille() ?></td>
        </tr>
        <tr>
            <th>Société</th>
            <td><?php echo $trajet->getCovoitureur()->getSociete() ?></td>
        </tr>

        <?php if ($trajet->getIdEquipage() != 0): ?>
        <tr>
            <th>Equipage </th>
            <td><?php echo $trajet->getEquipage()->getNomEquipage() ?></td>
        </tr>
        <?php endif; ?>

    </tbody>
</table>

<?php if ($trajet->getIdTypeTrajet() == 1): ?>
<p><label><b>Type trajet</b></label> &nbsp;&nbsp;Régulier</p>

    <table id="tableDate"><thead>
            <tr>
                <th>Jour</th>
                <th>Prise de service</th>
                <th>Fin de service</th>
                <th>En tant que</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($trajet->getLundiEtat() == 1): ?>
                <tr>
                    <td>Lundi</td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesPriseMinMax('lundi') ?></td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesFinMinMax('lundi') ?></td>
                    <td>
                        <?php if ($trajet->getLundiTypeCov() == 1): ?>
                            conducteur
                        <?php elseif ($trajet->getLundiTypeCov() == 2): ?>
                            passager
                        <?php else: ?>
                            indifférent
                        <?php endif; ?>

                    </td> 
                </tr>
            <?php endif; ?>

            <?php if ($trajet->getMardiEtat() == 1): ?>
                <tr>
                    <td>Mardi</td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesPriseMinMax('mardi') ?></td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesFinMinMax('mardi') ?></td>
                    <td>
                        <?php if ($trajet->getMardiTypeCov() == 1): ?>
                            conducteur
                        <?php elseif ($trajet->getMardiTypeCov() == 2): ?>
                            passager
                        <?php else: ?>
                            indifférent
                        <?php endif; ?>

                    </td> 
                </tr>
            <?php endif; ?>

            <?php if ($trajet->getMercrediEtat() == 1): ?>
                <tr>
                    <td>Mercredi</td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesPriseMinMax('mercredi') ?></td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesFinMinMax('mercredi') ?></td>
                    <td>
                        <?php if ($trajet->getMercrediTypeCov() == 1): ?>
                            conducteur
                        <?php elseif ($trajet->getMercrediTypeCov() == 2): ?>
                            passager
                        <?php else: ?>
                            indifférent
                        <?php endif; ?>

                    </td> 
                </tr>
            <?php endif; ?>

            <?php if ($trajet->getJeudiEtat() == 1): ?>
                <tr>
                    <td>Jeudi</td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesPriseMinMax('jeudi') ?></td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesFinMinMax('jeudi') ?></td>
                    <td>
                        <?php if ($trajet->getJeudiTypeCov() == 1): ?>
                            conducteur
                        <?php elseif ($trajet->getJeudiTypeCov() == 2): ?>
                            passager
                        <?php else: ?>
                            indifférent
                        <?php endif; ?>

                    </td> 
                </tr>
            <?php endif; ?>

            <?php if ($trajet->getVendrediEtat() == 1): ?>
                <tr>
                    <td>Vendredi</td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesPriseMinMax('vendredi') ?></td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesFinMinMax('vendredi') ?></td>
                    <td>
                        <?php if ($trajet->getVendrediTypeCov() == 1): ?>
                            conducteur
                        <?php elseif ($trajet->getVendrediTypeCov() == 2): ?>
                            passager
                        <?php else: ?>
                            indifférent
                        <?php endif; ?>

                    </td> 
                </tr>
            <?php endif; ?>

            <?php if ($trajet->getSamediEtat() == 1): ?>
                <tr>
                    <td>Samedi</td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesPriseMinMax('samedi') ?></td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesFinMinMax('samedi') ?></td>
                    <td>
                        <?php if ($trajet->getSamediTypeCov() == 1): ?>
                            conducteur
                        <?php elseif ($trajet->getSamediTypeCov() == 2): ?>
                            passager
                        <?php else: ?>
                            indifférent
                        <?php endif; ?>

                    </td> 
                </tr>
            <?php endif; ?>

            <?php if ($trajet->getDimancheEtat() == 1): ?>
                <tr>
                    <td>Dimanche</td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesPriseMinMax('dimanche') ?></td>
                    <td><?php echo $trajet->getCpTrajet()->getHorairesFinMinMax('dimanche') ?></td>
                    <td>
                        <?php if ($trajet->getDimancheTypeCov() == 1): ?>
                            conducteur
                        <?php elseif ($trajet->getDimancheTypeCov() == 2): ?>
                            passager
                        <?php else: ?>
                            indifférent
                        <?php endif; ?>

                    </td> 
                </tr>
            <?php endif; ?>



        </tbody>
    </table>
<?php endif; ?>


