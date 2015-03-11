<?php use_helper('jQuery'); ?>

    <?php if ($sf_user->hasAttribute('id_covoitureur') && $sf_user->getAttribute('id_covoitureur') != 0): ?>
        <?php include_partial('covoitureur/covoitureurIdentificationActive', array('covoitureur' => $covoitureur)) ?>
    <?php else: ?>    
        <?php include_component('covoitureur', 'formCovoitureurIdentification') ?>
    <?php endif; ?>




