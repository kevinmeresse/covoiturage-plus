<select id="<?php echo $idComposantForm ?>" name="<?php echo $nomComposantForm ?>">
    <?php foreach ($tab_action as $i => $value ): ?>
        <option value="<?php echo $value[0] ?>" class="<?php echo $value[2] ?>" <?php echo $value[5] ?> ><?php echo $value[1] ?></option>
    <?php endforeach; ?>
</select>