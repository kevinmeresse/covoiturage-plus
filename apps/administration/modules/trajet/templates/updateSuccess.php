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
            <th>Covoitureur</th>
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
        <tr>
            <th>Description</th>
            <td><?php echo $trajet->getDescription() ?></td>
        </tr>
        <tr>
            <th>Commentaires C+</th>
            <td><?php echo $trajet->getTechnique() ?></td>
        </tr>


        <?php if ($trajet->getIdEquipage() != 0): ?>
        <tr>
            <th>Equipage </th>
            <td>
                <?php
                    echo link_to($trajet->getEquipage()->getNomEquipage(), 'equipage/show?popup=1&id_equipage=' . $trajet->getIdEquipage(), array(
                        'popup' => array('Covoiturage_Plus_Visualisation_Equipage', 'width=' . sfConfig::get('app_larg_popup_equipage') . ',height=' . sfConfig::get('app_haut_popup_equipage') . ',left=320,top=0,scrollbars=yes'),
                        'target' => '_blank'
                    ))
                ?>
            </td>
        </tr>
        <?php endif; ?>

    </tbody>
</table>

<?php if ($trajet->getIdTypeTrajet() == 1): ?>
<p><label><b>Type trajet</b></label> &nbsp;&nbsp;Régulier</p>

    <table id="tableDate">
        <thead>
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
<?php elseif ($trajet->getIdTypeTrajet() == 2): ?>
<p><label><b>Type trajet</b></label> &nbsp;&nbsp;Occasionnel</p>
<table>
    <tbody>
        
        <tr>
            <th>Départ</th>
            <td>
                <b>le</b>&nbsp; 
            </td>
            <td><?php echo date("d-m-Y", strtotime($trajet->getJourUniqueDate())) ?>&nbsp; &nbsp; <b>à</b>&nbsp; <?php echo date("H:i", strtotime($trajet->getJourUniqueHeure()))  ?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <th>Rôle</th>
            <td>
                <?php if ($trajet->getJourUniqueTypeCov() == 1): ?>
                    conducteur
                <?php elseif ($trajet->getJourUniqueTypeCov() == 2): ?>
                    passager
                <?php else: ?>
                    indifférent
                <?php endif; ?>

            </td>
            <td>&nbsp;</td>
        </tr>

        <?php if ($trajet->getJourUniqueRetour() == 1): ?>
            <tr>
                <th>Retour</th>
                <td>
                    <b>le</b>&nbsp; 
                </td>
                <td><?php echo date("d-m-Y", strtotime($trajet->getJourUniqueDateRetour())) ?>&nbsp; &nbsp; <b>à</b>&nbsp; <?php echo date("H:i", strtotime($trajet->getJourUniqueHeureRetour()))  ?></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <th>Rôle</th>
                <td>
                    <?php if ($trajet->getJourUniqueTypeCovRetour() == 1): ?>
                        conducteur
                    <?php elseif ($trajet->getJourUniqueTypeCovRetour() == 2): ?>
                        passager
                    <?php else: ?>
                        indifférent
                    <?php endif; ?>

                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Nb de places</th>
                <td><?php echo $trajet->getNombreDePlace() ?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Participation aux frais</th>
                <td><?php echo $trajet->getCoutPassager() ?>&nbsp;€</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Véhicule</th>
                <td>
                    <?php if ($trajet->getVehicule() != 0 && !is_null($trajet->getVehicule())): ?>
                        <?php echo  $trajet->getCovoitureurVehicule()->getVehiculeMarque()." - ".$trajet->getCovoitureurVehicule()->getVehiculeModele() ?>
                    <?php endif; ?>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Accepte</th>
                <td colspan="3">
                       <?php echo  $trajet->getToleranceAccepteText() ?>
                </td>

            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php elseif ($trajet->getIdTypeTrajet() == 3): ?>
<p><label><b>Type trajet</b></label> &nbsp;&nbsp;PSA</p>
<table>
    <tbody>
        <tr>
            <th>Horaire</th>
            <td><?php echo $trajet->getCpTrajet()->getCpEtablissementHoraire() ?></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <th>Secteur</th>

            <td><?php echo $trajet->getCpTrajet()->getCpEtablissementSecteur() ?></td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>

<?php endif; ?>


<br class="clear"/>
<?php if (isset($popup) && $popup == 1): ?>

    <p>
    <FORM>
        <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
    </FORM>
    </p>

    <p class="modifier">
    <?php
        echo link_to('Modifier', 'trajet/edit?popup=1&id_trajet=' . $trajet->getIdTrajet(), array(
            'popup' => array('Covoiturage_Plus_Visualisation_trajet', 'width=' . sfConfig::get('app_larg_popup_covoit') . ',height=' . sfConfig::get('app_haut_popup_covoit') . ',left=320,top=0,scrollbars=yes'),
            'target' => '_blank'
        ))
        ?>
    </p>


    <p class="supprimer"><?php echo link_to('Supprimer', 'trajet/delete?popup=1&id_trajet='.$trajet->getIdTrajet(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>

    <p class="nouveau">
    <?php
        echo link_to('Nouvel équipage', 'equipage/newEquipageTrajet?popup=1&id_trajet=' . $trajet->getIdTrajet(), array(
            'popup' => array('Covoiturage_Plus_Visualisation_equipage', 'width=' . sfConfig::get('app_larg_popup_covoit') . ',height=' . sfConfig::get('app_haut_popup_covoit') . ',left=320,top=0,scrollbars=yes'),
            'target' => '_blank'
        ))
        ?>
    </p>
<?php endif; ?>

<br class="clear"/>
<br>
<?php if ($trajet->getIdEquipage() != 0): ?>
    <?php include_component('equipage', 'resumeEquipageTab', array('id_equipage' => $trajet->getIdEquipage())) ?>
<?php else: ?>
    <div> Pas d'équipage lié</div>
<?php endif; ?>
<br class="clear"/>
<br>

<?php if ($trajet->getIdEquipage() != 0): ?>
    <?php include_component('trajet', 'listCovoitureurPourEquipage', array('id_equipage' => $trajet->getIdEquipage())) ?>
<?php endif; ?>
