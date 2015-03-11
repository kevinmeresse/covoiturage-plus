Bonjour,

La demande de covoiturage ci-dessous a été acceptée :</p>
- Départ : <?php echo $params["depart"] ?>
- Arrivée : <?php echo $params["arrivee"] ?>
- Date ou fréquence: <?php echo $params["date"] ?>
- Nombre de place(s) demandée(s) : <?php echo $params["places"] ?>
- Message : <?php echo $params["message"] ?>
- Dépositaire : <?php echo $params["depositaire"] ?>
- Coordonnées du dépositaire : <?php echo $params["coordonneeDepositaire"] ?></p>
Si vous ne souhaitez plus covoiturer sur ce trajet, cliquez sur  '<a href="http://<?php echo $params["urlAnnule"] ?>">annuler cette demande</a>'.</p>
A bientôt sur <?php echo $params["urlApplication"] ?>.