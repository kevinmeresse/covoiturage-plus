<h1>Listes des actions pour les contacts</h1>

<table class="liste action-assoc-contact-detail">
  <thead>
    <tr>
      <th>Cp action ctc</th>
      <th>Cp action ctc detail</th>
      <th>Cp action ctc date creation</th>
      <th>Cp action ctc date modification</th>
      <th>Cp action ctc date echeance</th>
      <th>Cp action ctc cp type action</th>
      <th>Cp action ctc cp contact</th>
      <th>Cp action ctc user</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cp_action_ctcs as $cp_action_ctc): ?>
    <tr>
      <td class="edit"><a href="<?php echo url_for('cp_action_ctc/edit?cp_action_ctc_id='.$cp_action_ctc->getCpActionCtcId()) ?>"><?php echo $cp_action_ctc->getCpActionCtcId() ?></a></td>
      <td><?php echo $cp_action_ctc->getCpActionCtcDetail() ?></td>
      <td><?php echo $cp_action_ctc->getCpActionCtcDateCreation() ?></td>
      <td><?php echo $cp_action_ctc->getCpActionCtcDateModification() ?></td>
      <td><?php echo $cp_action_ctc->getCpActionCtcDateEcheance() ?></td>
      <td><?php echo $cp_action_ctc->getCpActionCtcCpTypeActionId() ?></td>
      <td><?php echo $cp_action_ctc->getCpActionCtcCpContactId() ?></td>
      <td><?php echo $cp_action_ctc->getCpActionCtcUserId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <p class="nouveau"><a href="<?php echo url_for('cp_action_ctc/new') ?>">Nouveau</a></p>

  <br class="clear"/>