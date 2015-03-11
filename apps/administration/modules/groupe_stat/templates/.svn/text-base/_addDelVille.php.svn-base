<?php use_helper('jQuery'); ?>

<?php foreach ($tab_id_ville as $key => $value): ?>
   <?php echo $value ?>&nbsp;
  <?php echo jq_link_to_remote('supprimer la ville', array(
                    'update' => 'ajout_ville',
                    'url'    => 'groupe_stat/addDelVille',
                    'with' => "'idville=". $key ."'+ '&tab_param=' + \$('#groupe_stat_tab_param').val()+ '&sens=del' ",
                    )) ?>
  <br>
<?php endforeach; ?>

<input id="groupe_stat_tab_param" type="hidden" name="groupe_stat[tab_param]" value="<?php echo $tab_param ?>">

