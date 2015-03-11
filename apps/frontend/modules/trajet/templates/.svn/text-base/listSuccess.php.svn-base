<?php use_helper('jQuery'); ?>
<h1>Liste des résultats</h1>



<?php include_component('trajet', 'formRecherche', array('tab_ville_autoc' => $tab_ville_autoc)) ?>

<?php include_partial('trajet/list', array('trajets' => $pager->getResults(), 'tab_ville_autoc' => $tab_ville_autoc,'formAlerte' => $formAlerte)) ?>


<?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
        <a href="<?php echo url_for('trajet/list?page=1') ?>">
            <img src="/images/first.png" alt="First page" title="First page" />
        </a>

        <a href="<?php echo url_for('trajet/list?page=') ?><?php echo $pager->getPreviousPage() ?>">

            <img src="/images/previous.png" alt="Previous page" title="Previous page" />
        </a>

        <?php foreach ($pager->getLinks() as $page): ?>
            <?php if ($page == $pager->getPage()): ?>
                <?php echo $page ?>
            <?php else: ?>
                <a href="<?php echo url_for('trajet/list?page=') ?><?php echo $page ?>"><?php echo $page ?></a>
            <?php endif; ?>
        <?php endforeach; ?>

        <a href="<?php echo url_for('trajet/list?page=') ?><?php echo $pager->getNextPage() ?>">
            <img src="/images/next.png" alt="Next page" title="Next page" />
        </a>

        <a href="<?php echo url_for('trajet/list?page=') ?><?php echo $pager->getLastPage() ?>">
            <img src="/images/last.png" alt="Last page" title="Last page" />
        </a>
    </div>
<?php endif; ?>

<div class="pagination_desc">
    <strong><?php echo count($pager) ?></strong> trajets

    <?php if ($pager->haveToPaginate()): ?>
        - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>
</div>