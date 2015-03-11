<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="liste-resultat">
    <a href="<?php echo url_for('trajet/rss?depart=' . $tab_ville_autoc['depart_ville'] . '&destination=' . $tab_ville_autoc['destination_ville']) ?>" target="_blank" id="rss">RSS selon critères</a>
    <a href="#" id="alerte">alerte selon critères</a>
    <br class="clear"/>

    <br class="clear"/>
    <table id="tableresultat">
        <thead>
            <tr>
                <th>Statut</th>
                <th>Départ</th>
                <th>Destination</th>
                <th>Entreprise</th>
                <th>Date trajet</th>
            </tr>
        </thead>
        <?php foreach ($trajets as $i => $trajet): ?>
            <tr>
                <td class="icon-statut">

                    <a href="<?php echo url_for('trajet/view?id_trajet=' . $trajet->getIdTrajet()) ?>" class="<?php echo $trajet->getClasseIconeTypeCovoit() ?>" ></a>
                </td>
                <td><?php echo $trajet->getDepartVille() ?></td>
                <td><?php echo $trajet->getDestinationVille() ?></td>
                <td><?php echo $trajet->getCovoitureur()->getCpEtablissement()->getCpEtablissementEtablissementNom() ?></td>
                <td>
                    <?php if ($trajet->getIdTypeTrajet() == 1): ?>
                        Régulier
                    <?php elseif ($trajet->getIdTypeTrajet() == 2): ?>
                        <?php echo date("d-m-Y", strtotime($trajet->getJourUniqueDate())) ?>
                        <?php if ($trajet->getJourUniqueDateRetour() != '0000-00-00' && $trajet->getJourUniqueDateRetour() != null): ?>
                            <?php echo date("d-m-Y", strtotime($trajet->getJourUniqueDate())) ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
            </tr>

            <tr><td colspan="6" class="detailtrajet">
                    <?php if ($trajet->getCovoitureur()->getAnonymat() != 1): ?>
                        <h3><?php echo $trajet->getCovoitureur()->getPrenom() . " " . substr($trajet->getCovoitureur()->getNom(), 0, 1) . "." ?></h3>
                    <?php else: ?>
                        Ce covoitureur souhaite rester anonyme.   <br>         
                    <?php endif; ?>

    <!--<p><label>Horaire de travail</label>9h - 12h45 | 13h45 - 16h00</p>-->
                    <?php if ($trajet->getIdEvenement() != 0): ?>
                        <p><label>&Eacute;v&eacute;nement</label><?php echo $trajet->getIdEvenement() ?></p>
                    <?php endif; ?>

                    <p><label>Date de dépot</label><?php echo date("d-m-Y", strtotime($trajet->getDateCreation())) ?></p>
                    <?php if ($sf_user->hasAttribute('id_covoitureur') && $sf_user->getAttribute('id_covoitureur') != 0): ?>
                        <p class="contactez"><a href="<?php echo url_for('trajet/view?id_trajet=' . $trajet->getIdTrajet()) ?>#3">Contactez ce covoitureur</a></p>
                    <?php else: ?>    
                        <p>Pour contacter ce covoitureur vous devez être identifié. <br>
                            Merci d'utiliser le formulaire pour vous identifier.</p>
                        <div style="display: none;" id="retourErreur"></div>

                    <?php endif; ?>
                    <p class="fichedetail"><a href="<?php echo url_for('trajet/view?id_trajet=' . $trajet->getIdTrajet()) ?>">Fiche d&eacute;taill&eacute;e</a>  <br class="clear"/></p>
                    <br class="clear"/>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>

<br class="clear"/>
<br/>