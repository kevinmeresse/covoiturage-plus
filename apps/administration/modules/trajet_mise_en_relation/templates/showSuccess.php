<h2>Détail de la mise en relation</h2>

<table class="mise-relation liste">
    <tbody>

        <tr>
            <th>Trajet:</th>
            <td colspan="2"><?php echo $trajet_mise_en_relation->getTrajet()->getVilleDepartDestTrajet() ?></td>
        </tr>
        <tr>
            <th>Dépositaire</th>
            <td><?php echo $trajet_mise_en_relation->getCreateurIdentiteMail() ?></td>
            <td>
                    <?php
                        echo link_to('Mail', 'mail/newMerMail?id_trajet=' . $trajet_mise_en_relation->getIdTrajet() . '&id_covoitureur=' . $trajet_mise_en_relation->getIdTrajetCreateur(). '&mail_covoitureur=' . $trajet_mise_en_relation->getCreateurIdentiteMail(), array(
                            'popup' => array('Covoiturage Plus', 'width=' . sfConfig::get('app_larg_popup') . ',height=' . sfConfig::get('app_haut_popup') . ',left=320,top=0')
                        ))
                        ?>
            </td>
        </tr>
        <tr>
            <th>Demandeur</th>
            <td><?php echo $trajet_mise_en_relation->getDemandeurIdentiteMail() ?></td>
            <td>
                    <?php
                        echo link_to('Mail', 'mail/newMerMail?id_trajet=' . $trajet_mise_en_relation->getIdTrajet() . '&id_covoitureur=' . $trajet_mise_en_relation->getIdDemandeur(). '&mail_covoitureur=' . $trajet_mise_en_relation->getDemandeurIdentiteMail(), array(
                            'popup' => array('Covoiturage Plus', 'width=' . sfConfig::get('app_larg_popup') . ',height=' . sfConfig::get('app_haut_popup') . ',left=320,top=0')
                        ))
                        ?>
            </td>
        </tr>

        <tr>
            <th>Date envoi:</th>
            <td colspan="2"><?php echo date("d-m-Y", strtotime($trajet_mise_en_relation->getDateEnvoi())) ?></td>
        </tr>
        <tr>
            <th>Etat:</th>
            <td colspan="2"><?php
switch ($trajet_mise_en_relation->getEtat()):
            case 0:
                $text = sfConfig::get('sf_desc_ind__mer_0');
                break;
            case 1:
                $text = sfConfig::get('sf_desc_ind__mer_1');
                break;
            case 2:
                $text = sfConfig::get('sf_desc_ind__mer_2');
                break;
            case 4:
                $text = sfConfig::get('sf_desc_ind__mer_4');
                break;
            case 5:
                $text = sfConfig::get('sf_desc_ind__mer_5');
                break;
            case 6:
                $text = sfConfig::get('sf_desc_ind__mer_6');
                break;
            case 7:
                $text = sfConfig::get('sf_desc_ind__mer_7');
                break;
    default:
        $text = "non renseigné";
        break;
endswitch;

echo $text
?></td>
        </tr>
        <tr>
            <th>Message:</th>
            <td colspan="2"><?php echo $trajet_mise_en_relation->getMessage(ESC_RAW) ?></td>
        </tr>

        <tr>
            <th>Nb places demandées:</th>
            <td colspan="2"><?php echo $trajet_mise_en_relation->getNbPlacesDemandees() ?></td>
        </tr>

    </tbody>
</table>

<hr />


<p class="retour-liste"><a href="<?php echo url_for('trajet_mise_en_relation/index') ?>">Retour &agrave; la liste</a></p>

<br class="clear"/>
<br>
<fieldset>
    <legend>Trajet initial</legend>
    <?php if ($trajet_mise_en_relation->getTrajet()->getEquipage()->getIdTrajet() != 0): ?>
    <?php include_component('trajet', 'showTrajetCovoitureurTabService', array('id_trajet' => $trajet_mise_en_relation->getTrajet()->getEquipage()->getIdTrajet())) ?>
    <?php else: ?>
        <?php include_component('trajet', 'showTrajetCovoitureurTabService', array('id_trajet' => $trajet_mise_en_relation->getIdTrajet())) ?>
    <?php endif; ?>
    <br>
    <?php if ($trajet_mise_en_relation->getTrajet()->getIdEquipage() != 0): ?>
        <?php include_component('equipage', 'resumeEquipageTab', array('id_equipage' => $trajet_mise_en_relation->getTrajet()->getIdEquipage())) ?>
    <?php else: ?>
        <p class="mess-equip">Pas d'équipage sur ce trajet</p>
<?php endif; ?>

</fieldset>

<br>
<fieldset>
    <legend>Trajets du demandeur</legend>
<?php include_component('trajet', 'listeTrajetCovoitureurMer', array('id_trajet_init' =>$trajet_mise_en_relation->getIdTrajet(),
                                                                        'id_covoitureur_demandeur' => $trajet_mise_en_relation->getIdDemandeur(),
                                                                        'id_mer' => $trajet_mise_en_relation->getIdTrajetMiseEnRelation(),
                                                                        'id_equipage' => $trajet_mise_en_relation->getTrajet()->getIdEquipage(),
                                                                        'etat_mer' => $trajet_mise_en_relation->getEtat())) ?>
</fieldset>