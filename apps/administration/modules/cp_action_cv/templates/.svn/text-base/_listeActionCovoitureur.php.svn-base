<h3>Liste des actions de l'inscrit</h3>

<table class="liste action-assoc-covoit">
    <thead>
        <tr>

            <th>Type action</th>
            <th>Echéance</th>
            <th>Création</th>
            <th>Créateur</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($cp_action_cvs as $cp_action_cv): ?>
        <?php $outil = new Util(); ?>
            <tr>
                <td>
                <?php
                    echo link_to($outil->coupe_texte($cp_action_cv->getCpTypeAction(), 20) , 'cp_action_cv/visuCv?popup=1&cp_action_cv_id=' . $cp_action_cv->getCpActionCvId(), array(
                        'popup' => array('Covoiturage_Plus_Visualisation_actionCv', 'width=' . sfConfig::get('app_larg_popup_action') . ',height=' . sfConfig::get('app_haut_popup_action') . ',left=320,top=0'),
                        'target' => '_blank',
                        'title' => $cp_action_cv->getCpTypeAction()
                    ))
                ?>

                </td>
                <td>
                    <?php if (is_null($cp_action_cv->getCpActionCvDateEcheance()) ): ?>
                        Date échéance non renseignée
                    <?php else: ?>
                        <?php echo date("d-m-Y", strtotime($cp_action_cv->getCpActionCvDateEcheance())) ?>
                    <?php endif; ?>
                </td>
                <td><?php echo date("d-m-Y", strtotime($cp_action_cv->getCpActionCvDateCreation())) ?></td>
                <td><?php echo $cp_action_cv->getUser()->getProfile()->getInitiales() ?></td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if (isset($popup) && $popup == 1): ?>
<p class="nouveau">
        <?php
            echo link_to('Nouveau', 'cp_action_cv/new?popup=1&id_utilisateur=' . $id_utilisateur, array(
                'popup' => array('Covoiturage_Plus_Visualisation_actionCv', 'width=' . sfConfig::get('app_larg_popup_action') . ',height=' . sfConfig::get('app_haut_popup_action') . ',left=320,top=0'),
                'target' => '_blank'
            ))
        ?>
    </p>
<?php else: ?>
<p class="nouveau"><a href="<?php echo url_for('cp_action_cv/new?id_utilisateur=') . $id_utilisateur ?>">Nouveau</a></p>
<?php endif; ?>

<br class="clear"/>
