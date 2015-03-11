<div id="fiche-resultat">
    <h1>Trajet <?php echo $trajet->getDepartVille() ?> - <?php echo $trajet->getDestinationVille() ?></h1>


    <div id="detailfiche">
        <ul>
            <li><a href="#tabs-1">Covoitureur</a></li>
            <li><a href="#tabs-2">Informations complémentaires</a></li>
            <li><a href="#tabs-3">Contactez covoitureur</a></li>
        </ul>
        <div id="tabs-1">
            <h4>
                <?php if ($trajet->getCovoitureur()->getSexe() == 2): ?>
                <span id="femme"></span>
                <?php else: ?>
                <span id="homme"></span>
                <?php endif; ?>
                <p class="nom"><?php echo $trajet->getCovoitureur()->getIdentiteReduiteNom() ?></p>
            </h4>
            
            <ul id="commande">
                <li><a title="Lien vers la page impression d'une fiche" target="_blank" href="#"><img src="/images/picto/imprimer.png" alt="imprimer"></a></li>
                <li><a title="Lien vers la page itinéraire" target="_blank" href="#"><img src="/images/picto/itineraire.png" alt="itineraire"></a></li>
            </ul>
			<div id="note">
                <ul class="rating fivestar" id="note-stars">
                    <?php
                    for($i=0;$i<=5;$i++){
                        $style = "";
                        if($trajet->getCovoitureur()->getNote()<$i){
                            $style ="desactive";
                        }
                    ?>
                    <li  class="<?php print($style); ?>" id="<?php print($i); ?>"><a title="<?php print($i); ?> Star" href="#"></a></li>
                    <?php
                    }
                    ?>
                </ul> 
                <br class="clear" />
                <p>votre avis</p>
            </div>
			
			<br class="clear" />
            <label>Départ</label><p><?php echo $trajet->getDepartVille() ?></p>
            <?php
            if ($trajet->getDepartAutreLieu() != "") {
            ?>
            <label>Lieu départ</label><p><?php echo $trajet->getDepartAutreLieu() ?></p>
            <?php
            }
            ?><?php
            if ($trajet->getEtape1Ville() != ''
            || $trajet->getEtape2Ville() != ''
            || $trajet->getEtape3Ville() != ''
            || $trajet->getEtape4Ville() != ''
            || $trajet->getEtape5Ville() != ''
            ):
            ?>
            <label>Villes étapes</label>

            <ul class="etape">
                <?php if ($trajet->getEtape1Ville() != ''): ?>
                <li><?php echo $trajet->getEtape1Ville() ?></li>
                <?php endif; ?>
                <?php if ($trajet->getEtape2Ville() != ''): ?>
                <li><?php echo $trajet->getEtape2Ville() ?></li>
                <?php endif; ?>
                <?php if ($trajet->getEtape3Ville() != ''): ?>
                <li><?php echo $trajet->getEtape3Ville() ?></li>
                <?php endif; ?>
                <?php if ($trajet->getEtape4Ville() != ''): ?>
                <li><?php echo $trajet->getEtape4Ville() ?></li>
                <?php endif; ?>
                <?php if ($trajet->getEtape5Ville() != ''): ?>
                <li><?php echo $trajet->getEtape5Ville() ?></li>
                <?php endif; ?>

            </ul>

          	
            <?php endif; ?>

           <label>Destination</label><p><?php echo $trajet->getDestinationVille() ?></p>



            <?php if ($trajet->getIdTypeTrajet() == 1): ?>
            <label>Type trajet</label><p>Régulier</p>

            <table id="tableDate"><thead>
                    <tr>
                        <th>Date</th>
                        <th>Départ</th>
                        <th>Retour</th>
                        <th>En tant que</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($trajet->getLundiEtat() == 1): ?>
                    <tr>
                        <td>Lundi</td>
                        <td><?php echo $trajet->getLundiHeureDepart() ?></td>
                        <td><?php echo $trajet->getLundiHeureRetour() ?></td>
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
                        <td><?php echo $trajet->getMardiHeureDepart() ?></td>
                        <td><?php echo $trajet->getMardiHeureRetour() ?></td>
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
                        <td><?php echo $trajet->getMercrediHeureDepart() ?></td>
                        <td><?php echo $trajet->getMercrediHeureRetour() ?></td>
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
                        <td><?php echo $trajet->getJeudiHeureDepart() ?></td>
                        <td><?php echo $trajet->getJeudiHeureRetour() ?></td>
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
                        <td><?php echo $trajet->getVendrediHeureDepart() ?></td>
                        <td><?php echo $trajet->getVendrediHeureRetour() ?></td>
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
                        <td><?php echo $trajet->getSamediHeureDepart() ?></td>
                        <td><?php echo $trajet->getSamediHeureRetour() ?></td>
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
                        <td><?php echo $trajet->getDimancheHeureDepart() ?></td>
                        <td><?php echo $trajet->getDimancheHeureRetour() ?></td>
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
            <label>Type trajet</label><p>Ponctuel&nbsp;
                <?php if ($trajet->getJourUniqueRetour() == 1): ?>
                aller retour
                <?php else: ?>
                aller simple 
                <?php endif; ?>
            </p>

            <table id="tableDate"><thead>
                    <tr>
                        <th>Date</th>
                        <th>Départ</th>
                        <th>Retour</th>
                        <th>En tant que</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo date("d-m-Y", strtotime($trajet->getJourUniqueDate())) ?></td>
                        <td><?php echo $trajet->getJourUniqueHeure() ?></td>
                        <td></td>
                        <td>
                            <?php if ($trajet->getJourUniqueTypeCov() == 1): ?>
                            conducteur
                            <?php elseif ($trajet->getJourUniqueTypeCov() == 2): ?>
                            passager
                            <?php else: ?>
                            indifférent
                            <?php endif; ?>

                        </td> 
                    </tr>

                    <?php if ($trajet->getJourUniqueRetour() == 1): ?>
                    <tr>
                        <td><?php echo date("d-m-Y", strtotime($trajet->getJourUniqueDateRetour())) ?></td>                            
                        <td></td>
                        <td><?php echo $trajet->getJourUniqueHeureRetour() ?></td>
                        <td>                                
                            <?php if ($trajet->getJourUniqueTypeCovRetour() == 1): ?>
                            conducteur
                            <?php elseif ($trajet->getJourUniqueTypeCovRetour() == 2): ?>
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

        </div>

        <div id="tabs-2">
            <p><?php echo $trajet->getDescription() ?></p>

            <label>Participation aux frais</label><p>
                <?php if ($trajet->getJourUniqueTypeCovRetour() != ''): ?>
                <?php $trajet->getJourUniqueTypeCovRetour(); ?>
                <?php else: ?>
                Non
                <?php endif; ?>
            </p>
            <br class="clear" />
            <label>Nombre de places disponibles</label><p><?php echo $trajet->getNombreDePlace() ?></p>
            <br class="clear" />
            <label>J'accepte</label><p><?php echo $trajet->getToleranceAccepte(ESC_RAW) ?></p>
	

            <br class="clear" />
            <p><label>Volume maximum de bagages accepté</label>
                <?php if ($trajet->getVolumeBagage() == 1): ?>
                    <span id="petit-bagage-ok"></span><span id="moyen-bagage"></span><span id="gros-bagage"></span>
                <?php elseif($trajet->getVolumeBagage() == 2): ?>
                    <span id="petit-bagage"></span><span id="moyen-bagage-ok"></span><span id="gros-bagage"></span>
                <?php elseif ($trajet->getVolumeBagage() == 3): ?>
                    <span id="petit-bagage"></span><span id="moyen-bagage"><span id="gros_bagage-ok"></span>
                <?php else: ?>
                    <span id="petit-bagage-ok"></span><span id="moyen-bagage"></span><span id="gros-bagage"></span>
                <?php endif; ?>
                </p>

            <br class="clear" />
            <label>Je n'accepte pas</label><p><?php echo $trajet->getToleranceRefus(ESC_RAW) ?></p>

            <br class="clear" />
			<label>Véhicule</label><p><?php echo $trajet->getCovoitureurVehicule()->getCovoitVehicule() ?></p>

        </div>
        <?php if ($sf_user->hasAttribute('id_covoitureur') && $sf_user->getAttribute('id_covoitureur') != 0): ?>
        <div id="tabs-3">


            <form action="<?php echo url_for('trajet/CovoitureurEnvoiMailTrajet?id_trajet=' . $trajet->getIdTrajet()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

                <?php echo $form->renderHiddenFields(false) ?>

                <?php echo $form->renderGlobalErrors() ?>

                <label>Votre message :</label>
                <br class="clear" />
                <?php echo $form['texte']->renderError() ?>
                <?php echo $form['texte'] ?>

                <p class="valide">	<input type="submit" value="Valider"><br class="clear"/></p>

            </form>
        </div>
        <?php else: ?>    

        <div id="tabs-3">
            <p>Pour contacter ce covoitureur vous devez être identifié. <br>

                </br>Merci d'utiliser le formulaire pour vous identifier.</p>
            <div style="display: none;" id="retourErreur"></div>

        </div>


        <?php endif; ?>
    </div>
    <p class="retour-liste"><a href="<?php echo url_for('trajet/list' ) ?>">Retour à la liste</a></p>
</div>




