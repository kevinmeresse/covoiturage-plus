<br>
<h3>Liste des actions  

<?php if (isset($listeIntegre) && $listeIntegre == 0): ?>
     <?php if (isset($prov) && $prov == 'rs'): ?>
        associés à la raison sociale 
     <?php else: ?>
        associés à l'établissement
     <?php endif; ?>
<?php echo $etablissement_nom != '' ? $etablissement_nom : '' ?>
<?php endif; ?>
</h3>

<?php 
    if (isset($prov)){
        $destProv = $prov;
    }else{
        $destProv = 'etb';
    }

?>

<?php if ($liste_vide != 0): ?>
<?php include_partial('cp_action_etb/formlisteActionEtb', array('cp_action_etbs' => $cp_action_etbs, 'popup' => isset($popup) ? $popup : 0, 'prov' => $destProv)) ?>
<?php else: ?>
        <div> Pas d'enregistrements</div>
<?php endif; ?>


    <p class="nouveau">
        
        <?php
            echo link_to('Nouvelle action', 'cp_action_etb/newEtb?popup=1&etb=' . $etb.'&prov='.$destProv, array(
                'popup' => array('Covoiturage_Plus_Creation_action', 'width=' . sfConfig::get('app_larg_popup_action') . ',height=' . sfConfig::get('app_haut_popup_action') . ',left=320,top=0'),
                'target' => '_blank'
            ))
        ?>
    </p>

<?php if (isset($popup) && $popup == 1): ?>

    <?php if (isset($listeIntegre) && $listeIntegre == 0): ?>
        <p>
        <FORM>
            <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
        </FORM>
        </p>
    <?php endif; ?>
<?php endif; ?>
<br class="clear"/>
