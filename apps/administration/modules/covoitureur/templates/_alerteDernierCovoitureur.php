<div>
    <h3>Derniers inscrits enregistrés et non validés</h3>


    <table class="liste action-assoc-etab">
        <thead>
            <tr>      
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date inscription</th>    
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($covoitureurs as $covoitureur): ?>
                <tr>
                    <td><?php echo $covoitureur->getNom() ?></td>
                    <td><?php echo $covoitureur->getPrenom() ?></td>
                    <td><?php echo date("d-m-Y", strtotime($covoitureur->getDateCreation())) ?></td>
                    <td class="edit"><a href="<?php echo url_for('covoitureur/edit?id_utilisateur=' . $covoitureur->getIdUtilisateur()) ?>" title="Edition">Edition</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p>Nombre d'inscrits sur le site : <?php echo $nbCovoitureurs ?></p>


</div>