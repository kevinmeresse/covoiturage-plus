
<?php if (isset($prov) && $prov == 'rs'): ?>
        <h1>Modification de l'action pour la raison sociale <i><?php echo $etb_name ?></i></h1> 
     <?php else: ?>
        <h1>Modification de l'action pour l'établissement <i><?php echo $etb_name ?></i></h1>
     <?php endif; ?>

<?php include_partial('form1', array('form' => $form, 'etb_name' => $etb_name,'etb_id' => $etb_id,'popup' => $popup, 'prov' => isset($prov) ? $prov : 'etb')) ?>
