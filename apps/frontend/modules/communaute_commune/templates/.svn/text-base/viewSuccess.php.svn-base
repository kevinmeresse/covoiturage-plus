<div id="fiche-ville">
    <h1><?php echo $communaute_commune->getNom() ?></h1>


    <div id="detailfiche">
        <ul>
            <li><a href="#tabs-1">Ville</a></li>
            <li><a href="#tabs-2">Informations complémentaires</a></li>
            <li><a href="#tabs-3">Actions en faveur de la mobilité</a></li>

        </ul>
        <div id="tabs-1">
            <p class="chapo"><?php echo $communaute_commune->getContact(ESC_RAW) ?></p>
            <?php if ($comptVillesLiees != 0) { ?>
                <h4>Villes reliées</h4>
                <ul class="villes">
                    <?php foreach ($villesLiees as $villeLiee): ?>
                        <li><?php echo $villeLiee->get("nom_ville") ?>(<?php echo $villeLiee->get("code_postal") ?>)</li>
                    <?php endforeach; ?>
                </ul>
                <?php
            }
            ?>

            <p class="trajets"> 
                <a href="<?php echo url_for('trajet/listComntCom?type_trajet=dest&id_communaute=') ?><?php echo $communaute_commune->getIdCommunaute() ?>">Trajets vers <?php echo $communaute_commune->getNom() ?></a>
                <a href="<?php echo url_for('trajet/listComntCom?type_trajet=depart&id_communaute=') ?><?php echo $communaute_commune->getIdCommunaute() ?>">Trajets &agrave; partir <?php echo $communaute_commune->getNom() ?></a>
            </p>

        </div>
        <div id="tabs-2">
            <h4>Informations compl&eacute;mentaires</h4>
            <p class="chapo"><?php echo $communaute_commune->getInformations(ESC_RAW) ?></p>
            <p>Ville de Ref Nom : <?php echo $communaute_commune->getVilleFr()->getNomVille() ?><br /></p>            
        </div>
        <div id="tabs-3">
            <h4>Actions en faveur de la mobilité</h4>
            <p><?php echo $communaute_commune->getAction(ESC_RAW) ?><br /></p>            
        </div>

    </div>
    <p class="retour-liste"><a href="<?php echo url_for('communaute_commune') ?>">Retour</a></p>
</div>