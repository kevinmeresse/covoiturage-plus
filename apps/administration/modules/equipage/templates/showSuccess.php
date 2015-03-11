<?php use_helper('jQuery'); ?>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

<h1>Equipage</h1>

<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?>

<table>
    <tr>
        <td style="width: 400px;">
    <table>
        <tbody>
            <tr>
                <th>Nom équipage</th>
                <td>
                    <?php echo $equipage->getNomEquipage() ?>

                </td>
            </tr>

            <tr>
                <th>Initiales du créateur</th>
                <td>
                    <?php if($equipage->getIdProfil() != 0): ?>
                        <?php echo $equipage->getProfile()->getInitiales() ?>
                    <?php else: ?>
                        FO
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <th>Affichage sur site</th>
                <td>
                    <?php if($equipage->getEtat() != 0): ?>
                        visible
                    <?php else: ?>
                        non visible
                    <?php endif; ?>
                </td>
            </tr>

                <tr> 
                    <th>Date de Création</th>
                    <td>
                        <?php echo date("d-m-Y", strtotime($equipage->getDateCreation())) ?>
                    </td>
                </tr>    
                
                <tr> 
                    <th>Date de Modification</th>
                    <td>
                        <?php echo date("d-m-Y", strtotime($equipage->getDateModification())) ?>
                    </td>
                </tr> 

            <tr>
                <th>Commentaire<br>visible par C+ uniquement</th>
                <td>
                    <?php echo $equipage->getCommentaires(ESC_RAW) ?>

                </td>
            </tr>
        </tbody>
    </table>
        </td>
        <td style="width: 50px;">&nbsp; &nbsp; &nbsp; &nbsp; </td>
        <td style="width: 400px;">
            <div id="map_tab">

            <div id="map" style="width:400px;height:300px;"></div>
            <div id="map-direction" style="width:400px; display: none;" ></div>
            <script type='text/javascript'>
                //<![CDATA[
      
                var directionDisplay;
                var directionsService = new google.maps.DirectionsService();
                var map = null;

                function initialize() {
                    //directionsDisplay = new google.maps.DirectionsRenderer();
                    var centre = new google.maps.LatLng(<?php print($gmapCentre["lat"] . "," . $gmapCentre["long"]) ?>);
                    
                    //map = new google.maps.Map(document.getElementById("map"), myOptions);
                    //directionsDisplay.setMap(map);
                    //directionsDisplay.setPanel(document.getElementById('map-direction'));
                    var waypts = [];
                    
                    var myOptions = {
                        zoom:7,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        center: centre
                    }
                    
                <?php
                /*
                foreach ($gmapItineraireEtapes as $etape) {
                    if ($etape != "") {
                        print('waypts.push({location:"' . $etape . '",stopover:true});');
                    }
                }
                
                $i = 0;
                foreach ($tabTrajetMaps as $tabTrajetMap) {
                    
                    //print('waypts.push({location:"' . $etape . '",stopover:true});');

                         $affiche =   'var request'.$i.' = {';
                         $affiche .=   'origin: new google.maps.LatLng('.$gmapItineraireDepart["long"] . ',' . $gmapItineraireDepart["lat"].'), ';
                         $affiche .=   '   destination: new google.maps.LatLng('.$gmapItineraireDestination["long"] . ',' . $gmapItineraireDestination["lat"].'),';
                         $affiche .=   '   waypoints: waypts,';
                         $affiche .=   '   travelMode: google.maps.DirectionsTravelMode.DRIVING';
                         $affiche .=   '   };';
                         $affiche .=   '   directionsService.route(request, function(response, status) {';
                         $affiche .=   '   if (status == google.maps.DirectionsStatus.OK) {';
                         $affiche .=   '       directionsDisplay.setDirections(response);';
                         $affiche .=   '      }';
                         $affiche .=   '   }';
                         $affiche .=   ' );';

                         print($affiche);
                    
                         $i++;
                }
                */
                ?>
                    map = new google.maps.Map(document.getElementById("map"), myOptions);
                            
                  //compteur
                  i = 0;
                  
                  var resultService = [], renderArray = [];
                  
                  

                <?php foreach ($tabTrajetMaps as $i => $tabTrajetMap): ?>            
                    
                    i = <?php print($i) ?>;
                    
                    
                    
                    var request = {
                        origin: new google.maps.LatLng(<?php print($tabTrajetMap["gmapItineraireDepart"]["long"] . "," . $tabTrajetMap["gmapItineraireDepart"]["lat"]) ?>), 
                        destination: new google.maps.LatLng(<?php print($tabTrajetMap["gmapItineraireDestination"]["long"] . "," . $tabTrajetMap["gmapItineraireDestination"]["lat"]) ?>),
                        waypoints: waypts,
                        travelMode: google.maps.DirectionsTravelMode.DRIVING
                    };
                    
                    //map = new google.maps.Map(document.getElementById("map"), myOptions);
                    //directionsDisplay.setMap(map);
                    //directionsDisplay.setPanel(document.getElementById('map-direction'));
                    
                    directionsService.route(request, function(response, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            //directionsDisplay.setDirections(response);
                            renderArray[i] = new google.maps.DirectionsRenderer();
                          renderArray[i].setMap(map);
                          renderArray[i].setDirections(response);
                        }
                    });
                                        

                 <?php endforeach; ?>
                     
                     
            }
           // map = initialize();
           initialize();


            //]]>
            </script>

        </div>
            
        </td>
  </table>
  
  
  


<?php include_component('trajet','listeTrajetAssocEquipage', array('id_equipage' => $id_equipage, 'id_trajet_origine' => $id_trajet_origine, 'popup' => isset($popup)?$popup:0)) ?>
<br>

<?php if (isset($popup) && $popup == 1): ?>

    <p>
    <FORM>
        <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
    </FORM>
    </p>
    
    <p class="modifier"><a href="<?php echo url_for('equipage/edit?popup=1&id_equipage=' . $equipage->getIdEquipage()) ?>">Modifier</a></p>
    
    <p class="supprimer"><?php echo link_to('Supprimer', 'equipage/delete?popup=1&id_equipage=' . $equipage->getIdEquipage(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
<?php else: ?>
    <p class="modifier"><a href="<?php echo url_for('equipage/edit?id_equipage=' . $equipage->getIdEquipage()) ?>">Modifier</a></p>
    <p class="retour-liste"><a href="<?php echo url_for('equipage/index') ?>">Retour &agrave; la liste</a></p>
    <p class="supprimer"><?php echo link_to('Supprimer', 'equipage/delete?id_equipage=' . $equipage->getIdEquipage(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
<?php endif; ?>



<br class="clear"/>



