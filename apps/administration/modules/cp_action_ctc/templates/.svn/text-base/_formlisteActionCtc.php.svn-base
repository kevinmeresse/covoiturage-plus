<div>
  <table class="liste action-assoc-contact">
  <thead>
    <tr>
      <th>Type action</th>
      <th>Détail</th>
      <th>Date d'échéance</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($cp_action_ctcs as $cp_action_ctc): ?>
    <tr>
      <td><?php //echo $cp_action_ctc->getCpTypeAction()->getCpTypeActionNom() ?>
        <?php
            echo link_to($cp_action_ctc->getCpTypeAction()->getCpTypeActionNom(), 'cp_action_ctc/visuCtc?popup=1&cp_action_ctc_id=' . $cp_action_ctc->getCpActionCtcId(), array(
                'popup' => array('Covoiturage_Plus_Visualisation_actionCtc', 'width=' . sfConfig::get('app_larg_popup_action') . ',height=' . sfConfig::get('app_haut_popup_action') . ',left=320,top=0'),
                'target' => '_blank'
            ))
        ?>
      </td>
        <td><?php echo $cp_action_ctc->getCpActionCtcDetail(ESC_RAW) ?></td>
      <td><?php echo date("d-m-Y", strtotime($cp_action_ctc->getCpActionCtcDateEcheance())) ?></td>
      
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div>

