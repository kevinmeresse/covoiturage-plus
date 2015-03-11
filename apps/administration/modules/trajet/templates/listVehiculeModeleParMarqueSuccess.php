<?php //include_component('trajet','listVehiculeModeleParMarque',array('idmarque' => $idmarque,'idComposantForm' => $idComposantForm,'nomComposantForm' => $nomComposantForm)) ?>
<select id="<?php echo $idComposantForm ?>" name="<?php echo $nomComposantForm ?>">
    <?php foreach ($tab_modele as $i => $value): ?>
        <option value="<?php echo $i ?>"><?php echo $value ?></option>
    <?php endforeach; ?>
</select>