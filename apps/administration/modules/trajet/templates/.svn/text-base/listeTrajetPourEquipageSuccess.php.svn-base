<?php use_helper('jQuery'); ?>
<h3>Liste des Trajets correspondant</h3>


<?php include_partial('trajet/listTrajetPourEquipInclude', array('trajets' => $pager->getResults(),'id_equipage' => $id_equipage)) ?>

<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">

      <?php   $passe_url_fp =  'trajet/listeTrajetPourEquipage?id_equipage='.$id_equipage.'&page=1' ?>
      <?php echo jq_link_to_remote(image_tag('first.png', array('title' => 'First page')),array(
    'update'   => 'item_list',
    'url'      => $passe_url_fp,
    'method' => 'get',
    )) ?>


    <?php   $passe_url_pp =  'trajet/listeTrajetPourEquipage?id_equipage='.$id_equipage.'&page='.$pager->getPreviousPage() ?>
      <?php echo jq_link_to_remote(image_tag('previous.png', array('title' => 'Previous page')),array(
    'update'   => 'item_list',
    'url'      => $passe_url_pp,
    'method' => 'get',
    )) ?>

    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>

        <?php   $passe_url_p =  'trajet/listeTrajetPourEquipage?id_equipage='.$id_equipage.'&page='.$page ?>
        <?php echo jq_link_to_remote($page,array(
        'update'   => 'item_list',
        'url'      => $passe_url_p,
        'method' => 'get',
        )) ?>
      <?php endif; ?>
    <?php endforeach; ?>

    <?php   $passe_url_np =  'trajet/listeTrajetPourEquipage?id_equipage='.$id_equipage.'&page='.$pager->getNextPage() ?>
        <?php echo jq_link_to_remote(image_tag('next.png', array('title' => 'Next page')),array(
    'update'   => 'item_list',
    'url'      => $passe_url_np,
    'method' => 'get',
    )) ?>

    
    <?php   $passe_url_lp =  'trajet/listeTrajetPourEquipage?id_equipage='.$id_equipage.'&page='.$pager->getLastPage() ?>
    <?php echo jq_link_to_remote(image_tag('last.png', array('title' => 'Las page')),array(
    'update'   => 'item_list',
    'url'      => $passe_url_lp,
    'method' => 'get',
    )) ?>
  </div>
<?php endif; ?>

<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> trajets

  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>



<br class="clear"/>