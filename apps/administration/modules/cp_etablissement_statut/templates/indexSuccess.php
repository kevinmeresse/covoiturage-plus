<h1>Paramétrage des statuts d'établissement</h1>

<table class="liste etab-status">
    <thead>
        <tr>

            <th>Type de statut</th>
            <th>Ordre d'affichage</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cp_etablissement_statuts as $cp_etablissement_statut): ?>
            <tr>
                <td><?php echo $cp_etablissement_statut->getCpEtablissementStatutNom() ?></td>
                <td><?php echo $cp_etablissement_statut->getCpEtablissementStatutOrdre() ?></td>
                <td class="edit"><a href="<?php echo url_for('cp_etablissement_statut/edit?cp_etablissement_statut_id=' . $cp_etablissement_statut->getCpEtablissementStatutId()) ?>"><?php echo $cp_etablissement_statut->getCpEtablissementStatutId() ?></a></td>


            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p class="nouveau"><a href="<?php echo url_for('cp_etablissement_statut/new') ?>">Nouveau</a></p>

<br class="clear"/>