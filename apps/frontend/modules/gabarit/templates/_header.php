<div class="sixteen columns" id="header">
    <div id="logo"><a href="<?php echo url_for('@homepage') ?>" target="_self"><img src="/images/structure/logo-covoiturage-plus.png" border="0"></a></div>
    <div id="message"><ul id="ticker"><li>Sp&eacute;cialiste du covoiturage<br><span>Domicile-travail</span></li><li><span>Un site internet</span><br>+ des personnes à votre service</li><li><span>Moderne, sympa, économique</span></li></ul></div>
    <!-- Génération automatique du menu à partir de la gestion cms en backoffice --> 
    <div id="nav"><ul>
            <?php
            foreach ($rubriques as $rubrique):
                $contenusLies = $rubrique->getListeContenuLie();
                //compteur du nombre de résultat retourné pour la  liste des contenus liés
                $comptContenusLies = count($contenusLies);
                $lienPrimaire = "";
                if($comptContenusLies == 0){
                     if($rubrique->getLienUrl()!=""){
                                $lien=url_for($rubrique->getLienUrl());
                            }else{
                                //$lien= url_for('/accueil/page?id_contenu=' . $rubrique->getIdContenu());
                            }
                }
                
                ?>
                <li class="niveau-un"><a href="<?php if($rubrique->getLienUrl()!="") echo url_for($rubrique->getLienUrl()); else echo '#' ?>"><?php echo $rubrique->getFrTitre(); ?></a>
                    <?php
                    if ($comptContenusLies != 0) {
                        ?>
                        <ul class="liste-niveau-deux cache">
                            <?php foreach ($contenusLies as $contenuLie): ?>
                            <?php
                            if($contenuLie->getLienUrl()!=""){
                                $lien= url_for($contenuLie->getLienUrl());
                            }else{
                                $lien= url_for('accueil/page?id_contenu=' . $contenuLie->getIdContenu());
                            }
                            
                            ?>
                                <li class="niveau-deux"><a href="<?php echo $lien ?>"><?php echo $contenuLie->getFrTitre(); ?></a></li>
                            <?php endforeach; ?>
								<li class="fin-niveau-deux"></li>
                        </ul>
                        <?php
                    }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul></div>
    <!-- fin du menu automatique -->  


</div>