<?php //include_component('trajet','listVehiculeModeleParMarque',array('idmarque' => $idmarque,'idComposantForm' => $idComposantForm,'nomComposantForm' => $nomComposantForm)) ?>
<select id="<?php echo $idComposantForm ?>" name="<?php echo $nomComposantForm ?>" onchange="$('#trajet_vehicule_modele_id').val(this.options[this.selectedIndex].value)">
    <?php foreach ($tab_modele as $id => $name): ?>
        <option value="<?php echo $id ?>"><?php echo $name ?></option>
    <?php endforeach; ?>
</select>
