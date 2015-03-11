<h2>Trajet <i><?php echo $trajet->getDepartVille()?> - <?php echo $trajet->getDestinationVille() ?></i></h2>

<table>
    <thead>
        <tr>
            <th>Départ</th>
            <th>Destination</th>
            <th>Covoitureur</th>
            <th>Mail</th>
            <th>Ville</th>
            <th>Société</th>
        </tr>
    </thead>
    <tbody>
    <tr>

      <td><?php echo $trajet->getDepartVille()?></td>

      <td><?php echo $trajet->getDestinationVille() ?></td>

      <td><?php echo $trajet->getCovoitureur()->getNom()." ".$trajet->getCovoitureur()->getPrenom() ?></td>

      <td><?php echo $trajet->getCovoitureur()->getMail() ?></td>

      <td><?php echo $trajet->getCovoitureur()->getVille() ?></td>
     
      <td><?php echo $trajet->getCovoitureur()->getSociete() ?></td>
    </tr>
    
  </tbody>
</table>


