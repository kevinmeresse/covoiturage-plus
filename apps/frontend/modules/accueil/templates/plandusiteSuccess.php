

<div id="sitemap">
    <h1>Plan du site</h1>
    <ul  class="liste-niveau-un">


        <li class="niveau-un"><a href="<?php echo url_for('@homepage') ?>">Accueil</a></li>

        <!-- liste des pages liées à une rubrique -->

        <?php
        foreach ($rubriques as $rubrique):
            $contenusLies = $rubrique->getListeContenuLie();
            //compteur du nombre de résultat retourné pour la  liste des contenus liés
            $comptContenusLies = count($contenusLies);
            $lienPrimaire = "";
            if ($comptContenusLies == 0) {
                if ($rubrique->getLienUrl() != "") {
                    $lien = $rubrique->getLienUrl();
                } else {
                    //$lien= url_for('/accueil/page?id_contenu=' . $rubrique->getIdContenu());
                }
            }
            ?>
            <li class="niveau-un"><a href="<?php echo $rubrique->getLienUrl(); ?>"><?php echo $rubrique->getFrTitre(); ?></a>
                <?php if ($comptContenusLies != 0): ?>
                    <ul class="niveau-deux">
                        <?php foreach ($contenusLies as $contenuLie): ?>
                            <?php
                            if ($contenuLie->getLienUrl() != "") {
                                $lien = $contenuLie->getLienUrl();
                            } else {
                                $lien = url_for('/accueil/page?id_contenu=' . $contenuLie->getIdContenu());
                            }
                            ?>
                            <li><a href="<?php echo $lien ?>"><?php echo $contenuLie->getFrTitre(); ?></a></li>
                        <?php endforeach; ?>

                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>


        <!-- liste des pages non liées à une rubrique -->

        
        <?php if (count($contenus) != 0): ?>
            <li class="niveau-un"><a href=""><?php echo $rubNonLiee; ?></a>

                    <ul class="niveau-deux">
                        <?php foreach ($contenus as $contenu): ?>
                            <?php
                            if ($contenu->getLienUrl() != "") {
                                $lien = $contenu->getLienUrl();
                            } else {
                                $lien = url_for('/accueil/page?id_contenu=' . $contenu->getIdContenu());
                            }
                            ?>
                            <li><a href="<?php echo $lien ?>"><?php echo $contenu->getFrTitre(); ?></a></li>
                        <?php endforeach; ?>

                    </ul>

            </li>
        <?php endif; ?>
            
        
            <!-- lien vers page actualités -->
            <li class="niveau-un"><a href="<?php echo url_for('actualite/index') ?>"><?php echo sfConfig::get('app_nom_cat_page_actu'); ?></a></li>


    </ul>
</div>