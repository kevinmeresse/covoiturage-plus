<h1>Paramétrage des fonctions</h1>

<?php include_partial('covoitureur_fonction/list', array('covoitureur_fonctions' => $pager->getResults())) ?>






  <?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('covoitureur_fonction/index/page/1') ?>">
      <img src="/images/first.png" alt="First page" title="First page" />
    </a>

    <a href="<?php echo url_for('covoitureur_fonction/index?page=') ?><?php echo $pager->getPreviousPage() ?>">
      <img src="/images/previous.png" alt="Previous page" title="Previous page" />
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('covoitureur_fonction/index?page=') ?><?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('covoitureur_fonction/index?page=') ?><?php echo $pager->getNextPage() ?>">
      <img src="/images/next.png" alt="Next page" title="Next page" />
    </a>

    <a href="<?php echo url_for('covoitureur_fonction/index?page=') ?><?php echo $pager->getLastPage() ?>">
      <img src="/images/last.png" alt="Last page" title="Last page" />
    </a>
  </div>
<?php endif; ?>

<p class="nouveau"><a href="<?php echo url_for('covoitureur_fonction/new') ?>">Nouveau</a></p>
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> Fonctions

  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>
<br class="clear"/>



