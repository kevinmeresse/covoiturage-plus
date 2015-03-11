<?php if (sizeof($selectOptions) > 0): ?>

        <select id="<?php echo $selectId ?>" name="<?php echo $selectName ?>" style="width:<?php echo sfConfig::get('app_long_select_box_lieu') ?>px">
            <option value="" selected="selected"></option>
            <?php foreach ($selectOptions as $i => $value): ?>
                <option value="<?php echo $i ?>"><?php echo $value ?></option>
            <?php endforeach; ?>
        </select>

<?php endif; ?>