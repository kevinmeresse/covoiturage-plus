<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <?php foreach ($livre_ors as $livre_or): ?>
        <div class="un-message">

            <div class="info">
                <p class="nom-guestbook"><?php echo $livre_or->getNom() ?> <?php echo $livre_or->getPrenom() ?></p>
                <p class="date-guestbook"><?php echo date(sfConfig::get('app_fr_format_date_court'), strtotime($livre_or->getDateCreation())) ?></p>                
            </div>

            <p class="le-message">
                <?php echo $livre_or->getMessage() ?>                </p>

        </div> 
    <?php endforeach; ?>