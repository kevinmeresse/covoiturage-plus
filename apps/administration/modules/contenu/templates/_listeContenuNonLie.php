

<h2>Liste des pages non liées à une rubrique</h2>

<div class="cms">
    <span class="file"><a href="<?php echo url_for('contenu/new') ?>">Nouvelle page</a></span>
</div>

<table class="liste contenu-non-lie">
  <thead>
    <tr>

      <th>Etat</th>
      <th>Intitulé</th>
      <th>Date création</th>
      <th>Date publication</th>

      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contenus as $contenu): ?>
    <tr>

        <?php if ( $contenu->getEtat() != 0): ?>
            <td>Actif</td>
        <?php else: ?>
            <td>Inactif</td>
        <?php endif; ?>

      <td> <?php echo $contenu->getFrTitre(); ?> </td>      
      <td><?php echo date("d-m-Y",  strtotime($contenu->getDateCreation())) ?></td>
    
      <td><?php echo date("d-m-Y",  strtotime($contenu->getDatePublication())) ?></td>


      <td class="view">
      <?php
                        echo link_to('Visualiser', 'contenu/visualisation?id_contenu=' . $contenu->getIdContenu(), array(
                            'popup' => array('Covoiturage Plus', 'width=' . sfConfig::get('app_larg_popup') . ',height=' . sfConfig::get('app_haut_popup') . ',left=320,top=0')
                        ))
                        ?>
      </td>
      <td class="edit"><a href="<?php echo url_for('contenu/edit?id_contenu='.$contenu->getIdContenu()) ?>">Editer</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


