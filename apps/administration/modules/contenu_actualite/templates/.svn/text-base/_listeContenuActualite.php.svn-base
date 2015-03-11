

<?php if ( $ind_include == 1): ?>
    <h2>Liste des pages d'actualité</h2>
    <div class="cms">
        <span class="file"><a href="<?php echo url_for('contenu_actualite/new?ind_include='.$ind_include) ?>">Nouvelle actualité</a></span>
    </div>
<?php endif; ?>

<table class=" liste actualite-list">
  <thead>
    <tr>

      <th>Etat</th>
      <th>Intitulé</th>
      <th>En première page</th>
      <th>Date publication</th>
      <th>Date dépublication</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contenuactualites as $contenuactualite): ?>
    <tr>
     
        <?php if ( $contenuactualite->getEtat() != 0): ?>
            <td>Actif</td>
        <?php else: ?>
            <td>Inactif</td>
        <?php endif; ?>
                
      <td> <?php echo $contenuactualite->getFrTitre(); ?> </td>   
      
      <?php if ( $contenuactualite->getEnPremierePage() != 0): ?>
            <td class="prem-page">X</td>
        <?php else: ?>
            <td>&nbsp;</td>
        <?php endif; ?>
            <td> <?php echo date("d-m-Y",  strtotime($contenuactualite->getDatePublication())); ?> </td> 
            <td> <?php echo date("d-m-Y",  strtotime($contenuactualite->getDateDepublication())); ?> </td> 

      <td class="view">
      <?php
                        echo link_to('Visualiser', 'contenu_actualite/show?id_actualite=' . $contenuactualite->getIdActualite(), array(
                            'popup' => array('Covoiturage Plus', 'width=' . sfConfig::get('app_larg_popup') . ',height=' . sfConfig::get('app_haut_popup') . ',left=320,top=0')
                        ))
                        ?>
      </td>
      <td class="edit"><a href="<?php echo url_for('contenu_actualite/edit?id_actualite='.$contenuactualite->getIdActualite()) ?>">Editer</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


