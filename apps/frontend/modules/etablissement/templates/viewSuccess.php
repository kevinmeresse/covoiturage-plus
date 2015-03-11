<div id="fiche-ville">
    <h1><?php echo $cp_etablissement->getCpEtablissementRaisonSocial() ?></h1>


    <div id="detailfiche">
        <ul>
            <li><a href="#tabs-1">Entreprise</a></li>
            <li><a href="#tabs-2">Informations complémentaires</a></li>
            <li><a href="#tabs-3">Actions en faveur de la mobilité</a></li>
        </ul>
        <div id="tabs-1">
            <p class="chapo"><?php echo $cp_etablissement->getCpEtablissementEtablissementNom() ?><br />
            </p>
            <?php if ($comptEtablissementsLies != 0) { ?>
                <h4>Entités</h4>
                <ul class="villes">
                    <?php foreach ($etablissementsLies as $etablissementLie): ?>
                        <li><?php echo $etablissementLie->getCpEtablissementEtablissementNom() ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php
            }
            ?>

            <p class="trajets"> 
                <a href="#">Trajets vers l'entreprise</a>
                <a href="#">Trajets &agrave; partir de l'entreprise</a>
            </p>

        </div>
        <div id="tabs-2">


            <p><?php
            if ($cp_etablissement->getCpEtablissementDenomination() != "") {
                ?>
                    <strong>Dénomination : </strong><?php echo $cp_etablissement->getCpEtablissementDenomination() ?><br />
                    <?php
                }
                if ($cp_etablissement->getCpEtablissementEnseigne() != "") {
                    ?>
                    <strong>Enseigne : </strong><?php echo $cp_etablissement->getCpEtablissementEnseigne() ?><br />
                    <?php
                }
                ?>
                <strong>Adresse : </strong>
                <?php
                if ($cp_etablissement->getCpEtablissementAdresse1() != "") {
                    ?>
                    <?php echo $cp_etablissement->getCpEtablissementAdresse1() ?><br />
                    <?php
                }
                if ($cp_etablissement->getCpEtablissementAdresse2() != "") {
                    ?>
                    <?php echo $cp_etablissement->getCpEtablissementAdresse2() ?><br />
                    <?php
                }
                if ($cp_etablissement->getCpEtablissementCodePostal() != "") {
                    ?>
                    <?php echo $cp_etablissement->getCpEtablissementCodePostal() ?>&nbsp;
                    <?php
                }
                if ($cp_etablissement->getCpEtablissementVilleId() != "") {
                    ?>
                    <?php echo $cp_etablissement->getVilleFr() ?><br />
                    <?php
                }
                ?>
                    <br>
                    
                <strong>Complément d'informations : </strong>
                <?php if ($cp_etablissement->getCpEtablissementInfos() != ""): ?>
                    <?php echo $cp_etablissement->getCpEtablissementInfos(ESC_RAW) ?><br />
                <?php endif; ?>

            </p>            
        
        </div>

        <div id="tabs-3">
            <h4>Actions en faveur de la mobilité</h4>
            <p><?php echo $cp_etablissement->getCpEtablissementActions(ESC_RAW) ?><br /></p>
        </div>

    </div>
</div>