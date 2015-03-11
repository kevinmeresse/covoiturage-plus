<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<table class="liste etablissements-liste">
  <thead>
    <tr>
      <th>Raison sociale</th>
      <th>Statut</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach ($cp_etablissements as $cp_etablissement): ?>
    <tr>
      <td>
          
        <?php
            echo link_to($cp_etablissement->getCpEtablissementRaisonSocial(), 'cp_etablissement/visuSociete?popup=1&listeIntegre=1&cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId(), array(
                'popup' => array('Covoiturage_Plus_Visualisation_RS', 'width=' . sfConfig::get('app_larg_popup_etb') . ',height=' . sfConfig::get('app_haut_popup_etb') . ',left=320,top=0,scrollbars=yes'),
                'target' => '_blank'
            ))
            ?>
      </td>

      <td><?php echo $cp_etablissement->getCpEtablissementStatut()->getCpEtablissementStatutNom() ?></td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <p class="nouveau"><a href="<?php echo url_for('cp_etablissement/newSociete') ?>">Nouveau</a></p>

  
  <br class="clear"/>