<br>
<h3>Liste des actions associées &agrave; un contact</h3>

<?php if ($liste_vide != 0): ?>
<?php include_partial('cp_action_ctc/formlisteActionCtc', array('cp_action_ctcs' => $cp_action_ctcs)) ?>
<?php else: ?>
        <div> Pas d'enregistrements</div>
<?php endif; ?>






<?php if (isset($popup) && $popup == 1): ?>

            <p class="nouveau">            
                <?php
                        echo link_to('Nouvelle action générique', 'cp_action_ctc/newCtc?popup=1&ctc=' . $ctc, array(
                            'popup' => array('Covoiturage_Plus_Creation_action_contact', 'width=' . sfConfig::get('app_larg_popup') . ',height=' . sfConfig::get('app_haut_popup') . ',left=320,top=0'),
                            'target' => '_blank'
                        ))
                ?>
        </p>
<?php else: ?>
                <p class="nouveau"><a href="<?php echo url_for('cp_action_ctc/newCtc?ctc=' . $ctc) ?>">Nouvelle action</a></p>
<?php endif; ?>

<br class="clear"/>