
<div id="guestbook">

    <h1>Livre d'or </h1>

    <div class="guestbook-outil">

        <a href="#laisser-message">Signer le livre d'or</a>

    </div>
    <?php if ($sf_user->hasFlash('notice')): ?>
      <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?><br></div>
    <?php endif ?>
    <?php include_partial('livredor/list', array('livre_ors' => $pager->getResults())) ?>
<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('livredor/index?page=1') ?>">
      <img src="/images/first.png" alt="First page" title="First page" />
    </a>

    <a href="<?php echo url_for('livredor/index?page=') ?><?php echo $pager->getPreviousPage() ?>">
        
      <img src="/images/previous.png" alt="Previous page" title="Previous page" />
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('livredor/index?page=') ?><?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('livredor/index?page=') ?><?php echo $pager->getNextPage() ?>">
      <img src="/images/next.png" alt="Next page" title="Next page" />
    </a>

    <a href="<?php echo url_for('livredor/index?page=') ?><?php echo $pager->getLastPage() ?>">
      <img src="/images/last.png" alt="Last page" title="Last page" />
    </a>
  </div>
<?php endif; ?>

<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> messages

  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>
    <br><br>
    <div id="laisser-message">

        <h3>Laisser un message </h3>
        <?php include_partial('form', array('form' => $form)) ?>

    </div>    


</div>
