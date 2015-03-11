<h1>Mes équipages </h1>
<br>
<table class="trajets-front liste">
    <thead>
        <tr>

            <th>Equipage</th>            
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($mesTrajets as $i => $trajet): ?>
            <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?> <?php echo ($trajet->getActif() == 0) ? 'inactif' : 'actif' ?>">
                
                
                <td>
                    <?php echo $trajet->getEquipage() ?>
                </td>

                <td class="view">
                    <a href="<?php echo url_for('equipage/showCovoitureurEquipage?id_equipage=' . $trajet->getIdEquipage()) ?>">Détails</a>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br class="clear"/>
<br/>