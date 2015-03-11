<h1>Livre d'or</h1>

<table class="liste message-livre-or">
    <thead>
        <tr>

            <th>Nom</th>
            <th>Prénom</th>
            <th>Message</th>
            <th>Mail</th>
            <th>Date du message</th>
            <th>Validé</th>
            <th colspan="3">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($livre_ors as $livre_or): ?>
            <tr>

                <td><?php echo $livre_or->getNom() ?></td>
                <td><?php echo $livre_or->getPrenom() ?></td>
                <td><?php echo $livre_or->coupeMessage('50') ?></td>
                <td><?php echo $livre_or->getMail() ?></td>
                <td><?php echo date("d-m-Y", strtotime($livre_or->getDateCreation())) ?></td>
                <td>
                    <?php if ($livre_or->getEtat() == 0): ?>
                        Non
                    <?php else: ?>
                        Oui
                    <?php endif; ?>
                </td>
                <td class="view"><a href="<?php echo url_for('livre_or/show?id=' . $livre_or->getId()) ?>" title="Visualiser">Visualiser</a></td>
                <td class="edit"><a href="<?php echo url_for('livre_or/edit?id=' . $livre_or->getId()) ?>" title="Editer">Editer</a></td>
                <td class="suppr"><?php echo link_to('Supprimer le trajet', 'livre_or/delete?id=' . $livre_or->getId(), array('method' => 'delete', 'confirm' => 'Etes vous sur?', 'title' => 'Supprimer')) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<br class="clear"/>