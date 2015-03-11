<?php use_helper('jQuery'); ?>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<div id="fiche-resultat">
    <h1>Trajet <?php echo $trajet->getDepartVille() ?> - <?php echo $trajet->getDestinationVille() ?></h1>


    <div id="detailfiche">
        <ul>
            <li><a href="#tabs-1">Covoitureur</a></li>
            <li><a href="#tabs-2">Informations complémentaires</a></li>
            <li><a href="#tabs-3">Contactez covoitureur</a></li>
            <li><a href="#map_tab">Itinéraire</a></li>
        </ul>
        <div id="tabs-1">
            <h4>
                <?php if ($trajet->getCovoitureur()->getAnonymat() != 1): ?>
                    <?php if ($trajet->getCovoitureur()->getSexe() == 2): ?>
                        <span id="femme"></span>
                    <?php else: ?>
                        <span id="homme"></span>
                    <?php endif; ?>
                    <p class="nom"><?php echo $trajet->getCovoitureur()->getIdentiteReduiteEtEntreprise() ?></p>
                <?php else: ?>
                    Ce covoitureur souhaite rester anonyme.
                <?php endif; ?>

            </h4>
            <!--

            <ul id="commande">
                <li><a title="Lien vers la page impression d'une fiche" target="_blank" href="#"><img src="/images/picto/imprimer.png" alt="imprimer"></a></li>
            </ul>
            <div id="note">
                <ul class="rating fivestar" id="note-stars">
            <?php
            for ($i = 0; $i <= 5; $i++) {
                $style = "";
                if ($trajet->getCovoitureur()->getNote() < $i) {
                    $style = "desactive";
                }
                ?>
                                                        <li  class="<?php print($style); ?>" id="<?php print($i); ?>"><a title="<?php print($i); ?> Star" href="#"></a></li>
                <?php
            }
            ?>
                </ul> 
                <br class="clear" />
                <p>votre avis</p>
            </div>-->

            <br class="clear" />
            <label>Départ</label><p><?php echo $trajet->getDepartVille() ?></p>
            <?php if ($trajet->getDepartLieu() != "" || $trajet->getDepartAdresse() != ""): ?>
                <div class="dashed">
                    <?php if ($trajet->getDepartLieu() != ""): ?>
                        <label>Lieu départ</label><p><?php echo $trajet->getDepartLieu() ?></p>
                    <?php endif; ?>
                    <?php if ($trajet->getDepartAdresse() != ""): ?>
                        <label>Adresse départ</label><p><?php echo $trajet->getDepartAdresse() ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <label>Destination</label><p><?php echo $trajet->getDestinationVille() ?></p>
            <?php if ($trajet->getDestinationLieu() != "" || $trajet->getDestinationAdresse() != ""): ?>
                <div class="dashed">
                    <?php if ($trajet->getDestinationLieu() != ""): ?>
                        <label>Lieu destination</label><p><?php echo $trajet->getDestinationLieu() ?></p>
                    <?php endif; ?>
                    <?php if ($trajet->getDestinationAdresse() != ""): ?>
                        <label>Adresse destination</label><p><?php echo $trajet->getDestinationAdresse() ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if ($trajet->getEtape1Ville() != '' || $trajet->getEtape2Ville() != '' || $trajet->getEtape3Ville() != '' || $trajet->getEtape4Ville() != '' || $trajet->getEtape5Ville() != ''): ?>
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
            
            <?php if ($trajet->getIdTypeTrajet() == 1): ?> 
                <label>Type trajet</label><p>Régulier</p>

                <table id="tableDate"><thead>
                        <tr>
                            <th>Date</th>
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
            <label>Description</label><p class="indented"><?php echo $trajet->getDescription() ?></p>

            <label>Participation aux frais</label>
            <p>
                <?php if ($trajet->getCoutPassager() != 0 && $trajet->getCoutPassager() != null): ?>
                    <?php echo $trajet->getCoutPassager(); ?>&nbsp;&euro;
                <?php else: ?>
                    Non
                <?php endif; ?>
            </p>
            
            <label>Nombre de places</label><p><?php echo $trajet->getNombreDePlace() ?></p>
            
            <div class="dashed">
                <label>Véhicule</label><p><?php echo $trajet->getCovoitureurVehicule()->getCovoitVehicule() ?></p>
                <label>Distance</label><p><?php echo $trajet->getKm() ?> Km</p>
                <label>Émissions de CO<sub>2</sub></label><p><?php echo $CO2 ?> Kg</p>
            </div>
            
            <br class="clear" />
            <?php if ($trajet->getIdTypeTrajet() != 1): ?>
                <label>J'accepte pour ce trajet</label><?php echo $trajet->getToleranceAccepte(ESC_RAW) ?>
                <br class="clear" />
                <?php if ($trajet->getToleranceBagage() == 1): ?>
                    <p>
                        <label>Volume maximum de bagages accepté</label>
                        <?php if ($trajet->getVolumeBagage() == 1): ?>
                            <span id="petit-bagage-ok"></span><span id="moyen-bagage"></span><span id="gros-bagage"></span>
                        <?php elseif ($trajet->getVolumeBagage() == 2): ?>
                            <span id="petit-bagage"></span><span id="moyen-bagage-ok"></span><span id="gros-bagage"></span>
                        <?php elseif ($trajet->getVolumeBagage() == 3): ?>
                            <span id="petit-bagage"></span><span id="moyen-bagage"></span><span id="gros-bagage-ok"></span>
                        <?php else: ?>
                            <span id="petit-bagage-ok"></span><span id="moyen-bagage"></span><span id="gros-bagage"></span>
                        <?php endif; ?>
                    </p>
                    <br class="clear" />
                <?php endif; ?>
                <br class="clear" />
            <?php endif; ?>
            
            <br class="clear" />
            <label>Partager sur </label>
            <p>
                <a href="http://www.facebook.com/share.php?u=http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>&t=Participez au trajet de covoiturage entre <?php echo $trajet->getDepartVille() ?> et <?php echo $trajet->getDestinationVille() ?>" target="_blank" title="Partager sur facebook" ><img src="http://www.facebook.com/images/connect_favicon.png" border="0" /></a>
                <a href="http://twitthis.com/twit?url=http://<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>&title=Participez au trajet de covoiturage entre <?php echo $trajet->getDepartVille() ?> et <?php echo $trajet->getDestinationVille() ?>" target="_blank"  title="Partager sur twitter"  ><img src="/images/picto/twitter.gif" border="0" /></a>
                <a href="" title="Recommander ce trajet par email"  ><img src="/images/picto/mail.jpg" border="0" id="sendMail" onclick="window.open('<?php echo url_for('trajet/MailRecommandationTrajetForm?id_trajet='.$trajet->getIdTrajet()) ?>', 'Envoyer par mail', 'width=600, height=500'); return false;" /></a>
            </p>
        </div>
        
        <div id="tabs-3">
            <?php
                $displayInfo = 'none';
                $displayIdent = 'block';
                if ($sf_user->hasAttribute('id_covoitureur') && $sf_user->getAttribute('id_covoitureur') != 0) {
                    $displayInfo = 'block';
                    $displayIdent = 'none';
                }    
            ?>
            <?php if ($trajet->getNombreDePlace() < 1): ?>
                <p>Quel succès !<br/>
                Nous sommes désolés, ce trajet est déjà complet...</p>
            <?php else: ?>
                <div id="userIdentified" style="display: <?php echo $displayInfo; ?>">
                    <form action="<?php echo url_for('trajet/CovoitureurEnvoiMailTrajet?id_trajet=' . $trajet->getIdTrajet()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
                        <?php echo $form->renderHiddenFields(false) ?>
                        <?php echo $form->renderGlobalErrors() ?>
                        <?php if ($trajet->getCovoitureur()->getTelephoneVisible() == 1): ?>
                            <label>Téléphone du conducteur :</label><?php echo $trajet->getCovoitureur()->getTelephone() ?>
                            <br class="clear" />
                            <br class="clear" />
                        <?php endif; ?>

                        <label>Nombre de places demandées :</label>
                        <?php echo $form['nb_places_demandees']->renderError() ?>
                        <?php echo $form['nb_places_demandees'] ?>

                        <label>Votre message :</label>
                        <br class="clear" />
                        <?php echo $form['message']->renderError() ?>
                        <?php echo $form['message'] ?>
                        <p class="valide"><input type="submit" value="Valider"></p>

                    </form>
                    <br class="clear"/>
                    <br class="clear"/>
                    <br class="clear"/>
                    Ou contactez Covoiturage+ :
                    <br class="clear"/>
                    <br class="clear"/>
                    <div class="dashed_contact">
                        <label>Email :</label><a href="mailto: <?php echo sfConfig::get('sf_mail_contact_site') ?>"><?php echo sfConfig::get('sf_mail_contact_site') ?></a>
                        <br class="clear" />
                        <label>Téléphone : </label><?php echo sfConfig::get('sf_tel_contact_site') ?>
                        <br class="clear" />
                        <br class="clear" />
                    </div>
                </div>  
                <div id="userNotIdentified" style="display: <?php echo $displayIdent; ?>">
                    <p>Pour contacter ce covoitureur vous devez être identifié. <br>

                        </br>Merci d'utiliser le formulaire pour vous identifier.</p>
                    <div style="display: none;" id="retourErreur"></div>

                </div>
            <?php endif; ?>
        </div>

        <div id="map_tab">
            <ul id="commande">
                <li><a title="Afficher l'itinéraire" target="_blank" href="#" id="itineraire"><img src="/images/picto/itineraire.png" alt="itineraire"></a></li>
                <li><a title="Imprimer l'itinéraire" href="#" id="itineraire" onclick="window.print();"><img src="/images/picto/imprimer.png" alt="Imprimer"></a></li>
            </ul>
            <div id="map" style="width:512px;height:400px;"></div>
            <div id="map-direction" style="width:512px; display: none;" ></div>
            <script type='text/javascript'>
                //<![CDATA[
      
                var directionDisplay;
                var directionsService = new google.maps.DirectionsService();
                var map = null;

                function initialize() {
                    directionsDisplay = new google.maps.DirectionsRenderer();
                    var centre = new google.maps.LatLng(<?php print($gmapCentre["lat"] . "," . $gmapCentre["long"]) ?>);
                    var myOptions = {
                        zoom:7,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        center: centre
                    }
                    map = new google.maps.Map(document.getElementById("map"), myOptions);
                    directionsDisplay.setMap(map);
                    directionsDisplay.setPanel(document.getElementById('map-direction'));
                    var waypts = [];
<?php
foreach ($gmapItineraireEtapes as $etape) {
    if ($etape != "") {
        print('waypts.push({location:"' . $etape . '",stopover:true});');
    }
}
?>
                            
        var request = {
            origin: new google.maps.LatLng(<?php print($gmapItineraireDepart["long"] . "," . $gmapItineraireDepart["lat"]) ?>), 
            destination: new google.maps.LatLng(<?php print($gmapItineraireDestination["long"] . "," . $gmapItineraireDestination["lat"]) ?>),
            waypoints: waypts,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function(response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            }
        });
    }
  
                
    //]]>
            </script>

        </div>
    </div>
    <?php if ($fromPage == 'pref'): ?>
        <p class="retour-liste"><a href="<?php echo url_for('trajet/listeTrajetCovoitureur') ?>">Retour à la liste</a></p>
    <?php else: ?>
        <p class="retour-liste"><a href="<?php echo url_for('trajet/list') ?>">Retour à la liste</a></p>
    <?php endif; ?>
</div>