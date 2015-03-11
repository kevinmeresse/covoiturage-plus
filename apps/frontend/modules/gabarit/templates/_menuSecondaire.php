
<div class="one-third column">
    <div id="espacepersonnel">
        <?php include_component('covoitureur', 'covoitureurIdentification') ?>
        <?php //include_partial('covoitureur/covoitureurIdentification') ?>
    </div>  
    <?php
        $displayDeposerTrajetsmall = 'none';
        if ($sf_user->hasAttribute('id_covoitureur') && $sf_user->getAttribute('id_covoitureur') != 0) {
            $displayDeposerTrajetsmall = 'block';
        }
    ?>
    <div id="deposerTrajetsmall" style="display: <?php echo $displayDeposerTrajetsmall ?>">
        <p>
            <label></label>
            <input type="button" onclick="document.location.href='<?php echo url_for('trajet/newTrajetCovoitIdent') ?>';" value="Déposer un trajet">
        </p>
    </div>

    <br class="clear">
    <div id="contacteznous">
        <p>contactez-nous !<br/><span>02 99 35 10 77</span></p>
    </div>
    <br class="clear">
    <div id="outil">
        <ul>
            <li class="acces-psa"><span class="psa"></span><a href="<?php echo url_for('covoitureur/psa') ?>">Accès PSA</a></li>
            <li><span class="partenariat"></span><a href="<?php echo url_for('accueil/page?id_contenu=1176') ?>">Partenariat</a></li>
            <li><span class="allostop"></span><a href="<?php echo url_for('accueil/page?id_contenu=1195') ?>">Allo-Stop</a></li>
            <li><span class="chiffrescles"></span><a href="<?php echo url_for('accueil/page?id_contenu=1180') ?>">Chiffres clés</a></li>
        </ul>
    </div>
    <div id="chiffrecles">
        <ul>
            <?php
            $chaineInscrits = "";
            foreach ($tabInscrits as $inscrit) {
                $chaineInscrits .="<li>" . $inscrit . "</li>";
            }
            echo esc_raw($chaineInscrits);
            ?><li>INSCRITS</li>
        </ul>
    </div>
</div>