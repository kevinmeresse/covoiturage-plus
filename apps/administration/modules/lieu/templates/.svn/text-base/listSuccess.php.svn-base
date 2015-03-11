<h1>Liste des lieux</h1>

<?php include_partial('formRecherche', array('form' => $formRecherche, 'tab_ville_autoc' => $tab_ville_autoc)) ?></br>

<?php include_partial('lieu/list', array('lieux' => $pager->getResults(), 'tab_ville_autoc' => $tab_ville_autoc)) ?>

<?php
    //gestion du cas de la requete passse dans le pager
    $requetteDsPager = ($ind_valid == 1) ? $pagerRequete : '';
?>

  <p class="nouveau"><a href="<?php echo url_for('lieu/new') ?>">Nouveau</a></p>

  <br class="clear"/>

  <?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('lieu/list/page/1') ?><?php echo $requetteDsPager ?>">
      <img src="/images/first.png" alt="First page" title="First page" />
    </a>

    <a href="<?php echo url_for('lieu/list?page=') ?><?php echo $pager->getPreviousPage() ?><?php echo $requetteDsPager ?>">
      <img src="/images/previous.png" alt="Previous page" title="Previous page" />
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('lieu/list?page=') ?><?php echo $page ?><?php echo $requetteDsPager ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('lieu/list?page=') ?><?php echo $pager->getNextPage() ?><?php echo $requetteDsPager ?>">
      <img src="/images/next.png" alt="Next page" title="Next page" />
    </a>

    <a href="<?php echo url_for('lieu/list?page=') ?><?php echo $pager->getLastPage() ?><?php echo $requetteDsPager ?>">
      <img src="/images/last.png" alt="Last page" title="Last page" />
    </a>
  </div>
<?php endif; ?>

<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> lieux

  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>
