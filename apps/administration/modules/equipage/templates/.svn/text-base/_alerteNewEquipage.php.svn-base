<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<br><?php include_partial('equipage/formRechercheEquipage', array('form' => $form, 'tab_equipage_autoc' => $tab_equipage_autoc)) ?></br>

<table class="liste equipages">
    <thead>
    <tr>
      <th>Equipage</th>
      <th>Ville origine</th>
      <th>Ville destination</th>
      <th>Nb covoitureurs</th>
      <th>Créateur</th>
      <th>Date</th>
      <th colspan="2">Action</th>

    </tr>
  </thead>
  <?php foreach ($equipages as $i => $equipage): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td class="location">
        <?php echo $equipage->getNomEquipage() ?>
      </td>

      <td>
            <?php echo $equipage->getvilleOrigine() ?>
      </td>
      <td>
            <?php echo $equipage->getvilleDest() ?>
      </td>
      <td>
            <?php echo $equipage->getnbCovoitureur() ?>
      </td>

      <td>
          <?php if($equipage->getIdProfil() != 0): ?>
            <?php echo $equipage->getProfile()->getInitiales() ?>

          <?php else: ?>
            FO
          <?php endif; ?>
      </td>



      <td><?php echo date("d-m-Y",  strtotime($equipage->getDateCreation())) ?></td>
      
      <td class="tab-center"><a href="<?php echo url_for('equipage/edit?id_equipage=' . $equipage->getIdEquipage()) ?>">edition</a></td>
    <td class="tab-center"><a href="<?php echo url_for('equipage/show?id_equipage=' . $equipage->getIdEquipage()) ?>">visualiser</a></td>

    </tr>

    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>
  <?php endforeach; ?>
</table>