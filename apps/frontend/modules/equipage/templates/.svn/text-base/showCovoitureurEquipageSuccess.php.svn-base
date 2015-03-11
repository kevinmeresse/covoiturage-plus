<h2>Equipage <i><?php echo $equipage->getNomEquipage() ?></i></h2>

<h3>Mes informations</h3>
<table class="mon_equipage">

    <tr>
        <th>Nombre de places</th>
        <td><?php echo $monTrajet->getNombreDePlace() ?></td>
    </tr>
    <tr>
        <th>Mon statut</th>
        <td><?php echo $monTrajet->getMonStatutCovoitureur() ?></td>
    </tr>
    <tr>
        <th>Mon état</th>

        <?php if ($monTrajet->getEtat() == 0): ?>
            <td>
                désactivé <a href="<?php echo url_for('equipage/mActiver?id_trajet=' . $monTrajet->getIdTrajet().'&id_equipage='.$equipage->getIdEquipage()) ?>">Me rendre actif</a>
            </td>
        <?php elseif ($monTrajet->getEtat() == 1): ?>
            <td>
                actif <a href="<?php echo url_for('equipage/meDesactiver?id_trajet=' . $monTrajet->getIdTrajet().'&id_equipage='.$equipage->getIdEquipage()) ?>">Me désactiver</a>
            </td>
        <?php endif; ?>
    </tr>
</table>
<br>
<?php include_partial('listTrajetEquipage', array('trajets' => $trajets)) ?>


