<br>
<h3>Liste des contacts
<?php if (isset($listeIntegre) && $listeIntegre == 0): ?>
    <?php if (isset($prov) && $prov == 'rs'): ?>
        associés à la raison sociale 
     <?php else: ?>
        associés à l'établissement
     <?php endif; ?>
<?php echo $etablissement_nom !='' ? $etablissement_nom : '' ?>
<?php endif; ?>
</h3>

<?php //echo "test : ".$test ?>

<?php if ($liste_vide != 0): ?>
    <?php include_partial('cp_contact/formlisteContactEtb', array('cp_contacts' => $cp_contacts, 'prov' => isset($prov)?$prov:'etb')) ?>
<?php else: ?>
    <div> Pas d'enregistrements</div>
<?php endif; ?>


<?php if (isset($popup) && $popup == 1): ?>
    <?php if (isset($listeIntegre) && $listeIntegre == 0): ?>
    <p>
    <FORM>
        <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
    </FORM>
    </p>
    <?php endif; ?>

    <p class="nouveau">
        <?php 
        if (isset($prov)){
            $destProv = $prov;
        }else{
            $destProv = 'etb';
        }

        ?>
        <?php
            echo link_to('Nouveau contact', 'cp_contact/newEtb?popup=1&etb=' . $etb.'&prov='.$destProv, array(
                'popup' => array('Covoiturage_Plus_Creation_contact', 'width=' . sfConfig::get('app_larg_popup') . ',height=' . sfConfig::get('app_haut_popup') . ',left=320,top=0'),
                'target' => '_blank'
            ))
        ?>
    </p>
<?php else: ?>
    <p class="nouveau"><a href="<?php echo url_for('cp_contact/newEtb?etb='.$etb) ?>">Nouveau contact</a></p>
<?php endif; ?>

<br class="clear"/>
