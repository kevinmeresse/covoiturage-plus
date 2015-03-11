<div>
  <table class="liste action-assoc-etab">
  <thead>
    <tr>
      <th>Type action</th>
      <th>Date d'échéance</th>
      <th>Intervenant C+</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cp_action_etbs as $cp_action_etb): ?>
    <tr>
<?php 
    if (isset($prov)){
        $destProv = $prov;
    }else{
        $destProv = 'etb';
    }

?>
      <td>
                <?php
                    echo link_to($cp_action_etb->getCpTypeAction()->getCpTypeActionNom(), 'cp_action_etb/visuEtb?popup=1&cp_action_etb_id=' . $cp_action_etb->getCpActionEtbId().'&prov='.$destProv, array(
                        'popup' => array('Covoiturage_Plus_Visualisation_actionEtb', 'width=' . sfConfig::get('app_larg_popup_action') . ',height=' . sfConfig::get('app_haut_popup_action') . ',left=320,top=0'),
                        'target' => '_blank'
                    ))
                    ?>
                </td>
      <td>
          <?php if ($cp_action_etb->getCpActionEtbDateEcheance() != '0000-00-00' && !is_null($cp_action_etb->getCpActionEtbDateEcheance())): ?>
            <?php echo date("d-m-Y", strtotime($cp_action_etb->getCpActionEtbDateEcheance())) ?>
          <?php else: ?>
            Pas de date
          <?php endif; ?>
      </td>
      <td><?php echo $cp_action_etb->getIntervenantCp() ?></td>
                  </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

