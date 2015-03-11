<h1>Liste des inscrits</h1>
<?php //echo $test ?>
<?php include_partial('formCovoitureurRecherche', array('form' => $form, 'tab_covoitureur_autoc' => $tab_covoitureur_autoc)) ?>

<?php include_partial('covoitureur/list', array('covoitureurs' => $pager->getResults())) ?>



  <p class="nouveau">
  <?php
            echo link_to('Nouveau', 'covoitureur/new?popup=1', array(
                'popup' => array('Covoiturage_Plus_Creation_nouvel_inscrit', 'width=' . sfConfig::get('app_larg_popup_covoit') . ',height=' . sfConfig::get('app_haut_popup_covoit') . ',left=320,top=0,scrollbars=yes'),
                'target' => '_blank'
            ))
        ?>
  </p>
<br class="clear"/>

  <?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('covoitureur/list/page/1') ?>">
      <img src="/images/first.png" alt="First page" title="First page" />
    </a>

    <a href="<?php echo url_for('covoitureur/list?page=') ?><?php echo $pager->getPreviousPage() ?>">
      <img src="/images/previous.png" alt="Previous page" title="Previous page" />
    </a>

    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('covoitureur/list?page=') ?><?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>

    <a href="<?php echo url_for('covoitureur/list?page=') ?><?php echo $pager->getNextPage() ?>">
      <img src="/images/next.png" alt="Next page" title="Next page" />
    </a>

    <a href="<?php echo url_for('covoitureur/list?page=') ?><?php echo $pager->getLastPage() ?>">
      <img src="/images/last.png" alt="Last page" title="Last page" />
    </a>
  </div>
<?php endif; ?>

<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> inscrits

  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>
<p class="lien-csv">
        <?php
        echo link_to('lien vers csv', 'covoitureur/exportCsvListe', 
                array(
                    'query_string' => $lien_to,
            'class' => 'foobar',
            'target' => '_blank'
        ))
        ?>
    <p>

