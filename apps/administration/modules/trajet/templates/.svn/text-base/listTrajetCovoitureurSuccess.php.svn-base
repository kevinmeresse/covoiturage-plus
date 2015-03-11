<h1>Liste des trajets pour le covoitureur <i><?php echo $nomCovoitureur ?>&nbsp;<?php echo $prenomCovoitureur ?> </i></h1>

<br>
 <?php //include_component('trajet', 'listeTrajetCovoitureur', array('id_utilisateur' => $id_utilisateur)) ?>


<?php include_partial('trajet/listeTrajetCovoitureur', array('trajets' => $pager->getResults())) ?>

<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('trajet/listTrajetCovoitureur?page=1&id_utilisateur='.$id_utilisateur) ?>">
      <img src="/images/first.png" alt="First page" title="First page" />
    </a>

    <a href="<?php echo url_for('trajet/listTrajetCovoitureur?page='.$pager->getPreviousPage().'&id_utilisateur='.$id_utilisateur) ?>">
        
      <img src="/images/previous.png" alt="Previous page" title="Previous page" />
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('trajet/listTrajetCovoitureur?page='.$page.'&id_utilisateur='.$id_utilisateur ) ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('trajet/listeTrajetCovoitureur?page='.$pager->getNextPage().'&id_utilisateur='.$id_utilisateur) ?>">
      <img src="/images/next.png" alt="Next page" title="Next page" />
    </a>

    <a href="<?php echo url_for('trajet/listTrajetCovoitureur?page='.$pager->getLastPage().'&id_utilisateur='.$id_utilisateur) ?>">
      <img src="/images/last.png" alt="Last page" title="Last page" />
    </a>
  </div>
<?php endif; ?>

<br class="clear"/>

<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> trajets

  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>

 <p class="nouveau"><?php echo link_to('Nouveau Trajet', 'trajet/newCovoitureurTrajet?id_utilisateur=' . $id_utilisateur) ?></p>
    <br class="clear"/>