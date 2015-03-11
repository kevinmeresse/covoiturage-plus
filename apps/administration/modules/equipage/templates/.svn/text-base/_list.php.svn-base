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
      <th>Nb équipiers</th>
      <th>Créateur</th>
      <th>Date de création</th>
      <th>Date de modification</th>


    </tr>
  </thead>
  <?php foreach ($equipages as $i => $equipage): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td class="location">

          <?php
                echo link_to($equipage->getNomEquipage(), 'equipage/show?popup=1&id_equipage=' . $equipage->getIdEquipage(), array(
                    'popup' => array('Covoiturage_Plus_Visualisation_equipage', 'width=' . sfConfig::get('app_larg_popup_equipage') . ',height=' . sfConfig::get('app_haut_popup_equipage') . ',left=320,top=0,scrollbars=yes'),
                    'target' => '_blank'
                ))
            ?>
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
    <td><?php echo date("d-m-Y",  strtotime($equipage->getDateModification())) ?></td>
</tr>


  <?php endforeach; ?>
</table>