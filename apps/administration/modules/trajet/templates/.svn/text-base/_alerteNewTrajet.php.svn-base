<div>
    <h3>Derniers trajets enregistrés</h3>

    <table class="liste trajet-date">
        <thead>
            <tr>
                <th>Ville départ</th>
                <th>Ville destination</th>
                <th>Date création</th>
                <th>Inscrit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php foreach ($trajets as $i => $trajet): ?>
            <tr >

                <td class="location">
                    <?php echo $trajet->getDepartVille() ?>
                </td>

                <td class="company">
                    <?php echo $trajet->getDestinationVille() ?>
                </td>
                <td class="company">
                    <?php echo date("d-m-Y", strtotime($trajet->getDateCreation())) ?>
                </td>
                <td class="company">
                    <?php echo $trajet->getCovoitureur() ?>
                </td>
                <td class="position edit">
                    <a href="<?php echo url_for('trajet/edit?id_trajet=' . $trajet->getIdTrajet()) ?>" title="Edition">Modifier</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>