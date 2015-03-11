<h1>Liste des raisons sociales</h1>
<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?><br></div>
<?php endif ?>


    <br><?php include_partial('formRechercheRS', array('form' => $formRecherche, 'raison_sociale' => $raison_sociale, 'statut' => $statut)) ?></br>

<?php include_partial('cp_etablissement/listSociete', array('cp_etablissements' => $pager->getResults())) ?>

<?php
//gestion du cas de la requete passse dans le pager
    $requetteDsPager = ($ind_valid == 1) ? $pagerRequete : '';
?>


<?php if ($pager->haveToPaginate()): ?>
        <div class="pagination">
            <a href="<?php echo url_for('cp_etablissement/indexSociete/page/1') ?><?php echo $requetteDsPager ?>">
                <img src="/images/first.png" alt="First page" title="First page" />
            </a>

            <a href="<?php echo url_for('cp_etablissement/indexSociete?page=') ?><?php echo $pager->getPreviousPage() ?><?php echo $requetteDsPager ?>">
                <img src="/images/previous.png" alt="Previous page" title="Previous page" />
            </a>

    <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
    <?php echo $page ?>
    <?php else: ?>
                    <a href="<?php echo url_for('cp_etablissement/indexSociete?page=') ?><?php echo $page ?><?php echo $requetteDsPager ?>"><?php echo $page ?></a>
    <?php endif; ?>
    <?php endforeach; ?>

                    <a href="<?php echo url_for('cp_etablissement/indexSociete?page=') ?><?php echo $pager->getNextPage() ?><?php echo $requetteDsPager ?>">
                        <img src="/images/next.png" alt="Next page" title="Next page" />
                    </a>

                    <a href="<?php echo url_for('cp_etablissement/indexSociete?page=') ?><?php echo $pager->getLastPage() ?><?php echo $requetteDsPager ?>">
                        <img src="/images/last.png" alt="Last page" title="Last page" />
                    </a>
                </div>
<?php endif; ?>

                    <div class="pagination_desc">
                        <strong><?php echo count($pager) ?></strong> Société(s)

    <?php if ($pager->haveToPaginate()): ?>
                        - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>

</div>
