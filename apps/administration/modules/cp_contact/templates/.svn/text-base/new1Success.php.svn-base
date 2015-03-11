
<?php if (isset($prov) && $prov == 'rs'): ?>
        <h1>Nouveau contact pour la raison sociale <?php echo $etb_name ?></h1>
     <?php else: ?>
        <h1>Nouveau contact pour l'établissement  <?php echo $etb_name ?></h1>
     <?php endif; ?>


<?php include_partial('form1', array('form' => $form,'etb_name'=> $etb_name,'etb_id' => $etb_id, 'popup' => $popup, 'prov' => isset($prov) ? $prov : 'etb')) ?>
