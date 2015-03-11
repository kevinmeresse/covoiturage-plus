<h3>Liste des inscrits associés &agrave; l'établissement <?php echo $etablissement_nom ?></h3>


<?php include_partial('covoitureur/listeInscritsEtbInclude', array('covoitureurs' => $pager->getResults())) ?>


<?php if ($pager->haveToPaginate()): ?>
<?php $compl_pager = "/cp_etablissement_id/".$cp_etablissement_id ?>
    <div class="pagination">
        <a href="<?php echo url_for('covoitureur/listeInscritsEtb/page/1').$compl_pager ?>">
            <img src="/images/first.png" alt="First page" title="First page" />
        </a>

        <a href="<?php echo url_for('covoitureur/listeInscritsEtb?popup=1&page=') ?><?php echo $pager->getPreviousPage() ?><?php echo $compl_pager ?>">
            <img src="/images/previous.png" alt="Previous page" title="Previous page" />
        </a>

    <?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($page == $pager->getPage()): ?>
    <?php echo $page ?>
    <?php else: ?>
                <a href="<?php echo url_for('covoitureur/listeInscritsEtb?popup=1&page=') ?><?php echo $page ?><?php echo $compl_pager ?>"><?php echo $page ?></a>
    <?php endif; ?>
    <?php endforeach; ?>

                <a href="<?php echo url_for('covoitureur/listeInscritsEtb?popup=1&page=') ?><?php echo $pager->getNextPage() ?><?php echo $compl_pager ?>">
                    <img src="/images/next.png" alt="Next page" title="Next page" />
                </a>

                <a href="<?php echo url_for('covoitureur/listeInscritsEtb?popup=1&page=') ?><?php echo $pager->getLastPage() ?><?php echo $compl_pager ?>">
                    <img src="/images/last.png" alt="Last page" title="Last page" />
                </a>
            </div>
<?php endif; ?>

                <div class="pagination_desc">
                    <strong><?php echo count($pager) ?></strong> inscrits(s)

    <?php if ($pager->haveToPaginate()): ?>
                    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>
                </div>

<?php if (isset($popup) && $popup == 1): ?>

    <p>
    <FORM>
        <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
    </FORM>
    </p>
    
    <p class="nouveau">
        <?php
            echo link_to('Nouveau', 'covoitureur/new?popup=1&cp_etablissement_id='.$cp_etablissement_id, array(
                'popup' => array('Covoiturage_Plus_Creation_nouvel_inscrit', 'width=' . sfConfig::get('app_larg_popup_covoit') . ',height=' . sfConfig::get('app_haut_popup_covoit') . ',left=320,top=0,scrollbars=yes'),
                'target' => '_blank'
            ))
        ?>
    </p>
<?php else: ?>
    <p class="nouveau"><a href="<?php echo url_for('covoitureur/new?cp_etablissement_id='.$cp_etablissement_id) ?>">Nouveau</a></p>
<?php endif; ?>