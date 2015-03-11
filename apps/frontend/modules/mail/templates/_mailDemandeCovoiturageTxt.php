Bonjour,

Vous avez une demande de covoiturage :
- Départ : <?php echo $params["depart"] ?>
- Arrivée : <?php echo $params["arrivee"] ?>
- Date ou fréquence: <?php echo $params["date"] ?>
- Nombre de place(s) demandée(s) : <?php echo $params["places"] ?>
- Message : <?php echo $params["urlApplication"] ?>
- Demandeur : <?php echo $params["demandeur"] ?>
- Coordonnées du demandeur : <?php echo $params["coordonneeDemandeur"] ?>
&nbsp;
Acceptez-vous cette demande de covoiturage ? <a href="http://<?php echo $params["urlValide1"] ?>">OUI</a> - <a href="http://<?php echo $params["urlValide0"] ?>">NON</a>
A bientôt sur <?php echo $params["urlApplication"] ?>.