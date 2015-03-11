<h1>Visualisation de l'inscrit</h1>


<?php include_partial('show', array( 'covoitureur' => $covoitureur)) ?>





<?php if (isset($popup) && $popup == 1): ?>

    <p>
    <FORM>
        <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
    </FORM>
    </p>
    <p class="modifier">
    <?php
                echo link_to('Modifier', 'covoitureur/edit?popup=1&id_utilisateur=' . $covoitureur->getIdUtilisateur(), array(
                    'popup' => array('Covoiturage_Plus_Visualisation_covoitureur', 'width=' . sfConfig::get('app_larg_popup_covoit') . ',height=' . sfConfig::get('app_haut_popup_covoit') . ',left=320,top=0,scrollbars=yes'),
                    'target' => '_blank'
                ))
                ?>
        </p>
        <p class="nouveau">
        <?php
            echo link_to('Nouvelle action', 'cp_action_cv/new?popup=1&id_utilisateur=' . $covoitureur->getIdUtilisateur(), array(
                'popup' => array('Covoiturage_Plus_Visualisation_actionCv', 'width=' . sfConfig::get('app_larg_popup_action') . ',height=' . sfConfig::get('app_haut_popup_action') . ',left=320,top=0'),
                'target' => '_blank'
            ))
        ?>
        </p>

        <p class="nouveau">
        <?php
            echo link_to('Nouveau trajet', 'trajet/newCovoitureurTrajet?popup=1&id_utilisateur=' . $covoitureur->getIdUtilisateur(), array(
                'popup' => array('Covoiturage_Plus_Visualisation_NewTrajet', 'width=' . sfConfig::get('app_larg_popup_trajet') . ',height=' . sfConfig::get('app_haut_popup_trajet') . ',left=320,top=0,scrollbars=yes'),
                'target' => '_blank'
            ))
        ?>
        </p>


    <p class="supprimer"><?php echo link_to('Supprimer', 'covoitureur/delete?popup=1&id_utilisateur=' . $covoitureur->getIdUtilisateur(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
<?php else: ?>
    <p class="retour-liste"><a href="<?php echo url_for('covoitureur/index') ?>">Retour &agrave; la liste</a></p>
    <p class="modifier"><a href="<?php echo url_for('covoitureur/edit?popup=1&id_utilisateur='.$covoitureur->getIdUtilisateur()) ?>">Modifier</a></p>
    <p class="nouveau"><a href="<?php echo url_for('trajet/new?id_utilisateur='.$covoitureur->getIdUtilisateur()) ?>">Nouveau trajet</a></p>

    <p class="supprimer"><?php echo link_to('Supprimer', 'covoitureur/delete?id_utilisateur=' . $covoitureur->getIdUtilisateur(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>
<?php endif; ?>


<br class="clear"/>
<hr />
<table class="ss-tab">
    <tr>
        <td class="partage2"><?php include_component('trajet','listeTrajetCovoitureur', array('id_utilisateur' => $covoitureur->getIdUtilisateur(),'popup' => isset($popup) ? $popup : 0)) ?></td>
        <td>&nbsp;</td>
        <td class="partage2"><?php include_component('cp_action_cv','listeActionCovoitureur', array('id_utilisateur' => $covoitureur->getIdUtilisateur(),'popup' => isset($popup) ? $popup : 0)) ?></td>
    </tr>
</table>

