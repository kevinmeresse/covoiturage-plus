
<div>
    <h1 class="banniere">Administration backoffice</h1>
    <div class="admin-connect">
        <p><?php echo link_to('Deconnexion', 'sfGuardAuth/signout ') ?></p>
        <p><?php echo $nomuser ?>&nbsp;(<?php echo $initiale ?>) connecté(e)</p>

    </div>

    <div class="admin-nav">

        <ul class="topnav">
            <li><span><?php echo link_to(image_tag('accueil-bo.png', array('border' =>'0')), 'accueil/index') ?></span>

            <li><span><a href="#">RAISONs SOCIALES <br>ETABLISSEMENTS</a></span>

                <ul class="subnav">
                    <li><?php echo link_to('Raisons sociales', 'cp_etablissement/indexSociete') ?></li>
                    <li><?php echo link_to('Etablissements', 'cp_etablissement/index') ?></li>
                    <li><?php echo link_to('Type d\'action', 'cp_type_action/index') ?></li>
                    <li><?php echo link_to('Statut Etablissement', 'cp_etablissement_statut/index') ?></li>
                    <li><?php echo link_to('PSA : Equipes', 'cp_etablissement_horaire/index') ?></li>
                    <li><?php echo link_to('PSA : Secteurs', 'cp_etablissement_secteur/index') ?></li>
                </ul>
            </li>
            
            <li><span><a href="#">INSCRITS <br>TRAJETS</a></span>

                <ul class="subnav">
                    <li><?php echo link_to('Inscrits', 'covoitureur/list') ?></li>
                    <li><?php echo link_to('Trajets', 'trajet/list') ?></li>
                    <?php //if ($sf_user->hasCredential("admin")): ?>
                        <li><?php echo link_to('Mise en relation', 'trajet_mise_en_relation/index') ?></li>
                    <?php //endif; ?>

                </ul>
            </li>    
            <li><span><a href="#">EQUIPAGES</a></span>

                <ul class="subnav">
                    <li><?php echo link_to('Equipage', 'equipage/list') ?></li>

                </ul>

            </li>
            <li><span><a href="#">GESTION DE <br>CONTENU</a></span>

                <ul class="subnav">
                    <li><?php echo link_to('Menus et pages', 'cms/index') ?></li>
                    <?php if ($sf_user->hasCredential("admin")): ?>
                        <li><?php echo link_to('Actualités', 'contenu_actualite/index') ?></li>
                        <li><?php echo link_to('Rubriques actualités', 'contenu_actualite_rubrique/index') ?></li>
                        <li><?php echo link_to('Contenu', 'contenu/index') ?></li>
                        <li><?php echo link_to('Rubriques', 'contenu_rubrique/index') ?></li>
                    <?php endif; ?>
                </ul>

            </li>
            

            <li><span><a href="#">PARAMETRES</a></span>

                <ul class="subnav">

                    <?php if ($sf_user->hasCredential("admin")): ?>
                        <li><?php echo link_to('Modeles de véhicule', 'vehicule_modele') ?></li>
                        <li><?php echo link_to('Marques de véhicule', 'vehicule_marque') ?></li>
                        <li><?php echo link_to('Motorisation de véhicule', 'vehicule_motorisation') ?></li>
                        <li><?php echo link_to('Catégories de véhicule', 'vehicule_categorie') ?></li>
                        <li><?php echo link_to('Site client', 'site_client') ?></li>
                        <li><?php echo link_to('Association site-pays', 'pays_site') ?></li>
                        <li><?php echo link_to('Pays', 'pays') ?></li>
                        <li><?php echo link_to('Régions', 'region') ?></li>
                        <li><?php echo link_to('Départements', 'departement_francais') ?></li>
                        <li><?php echo link_to('Communes', 'commune') ?></li>
                        <li><?php echo link_to('Centres d intérêts', 'centre_interet') ?></li>
                        <li><?php echo link_to('Type de Lieu', 'lieu_type/index') ?></li>
                        <li><?php echo link_to('Type évènement', 'lieu_type/indexEvenement') ?></li>
                    <?php endif; ?>


                    <li><?php echo link_to('Communautés de communes', 'communaute_commune/index') ?></li>                                        
                    <li><?php echo link_to('Livre d\'or', 'livre_or/index') ?></li>
                    <li><?php echo link_to('Lieux', 'lieu/list') ?></li>
                    <li><?php echo link_to('Evènements', 'lieu/listEvenement') ?></li>
                    <li><?php echo link_to('Connaissance de l\'association', 'covoitureur_lien_site/index') ?></li>
                    <li><?php echo link_to('Fonctions des inscrits', 'covoitureur_fonction/index') ?></li>
                    <li><?php echo link_to('Groupes pour statistiques', 'groupe_stat/index') ?></li>
                    <li><?php echo link_to('Fonction des contacts', 'cp_contact_statut/index') ?></li>
                    
                    <?php if ($sf_user->hasCredential("admin")): ?>
                        <li><?php echo link_to('Log du site', 'log_site') ?></li>
                        <li><?php echo link_to('Type provenance pour log', 'log_type_provenance') ?></li>
                    <?php endif; ?>

                </ul>
            </li> 
            <?php if ($sf_user->hasCredential("admin")): ?>
                <li><span><a href="#">GESTION DES DROITS</a></span>
                    <ul class="subnav">
                        <li><?php echo link_to('Gestion des utilisateurs', 'sf_guard_user') ?></li>
                        <li><?php echo link_to('Gestion des profils', 'sf_guard_user_profile') ?></li>
                        <li><?php echo link_to('Gestion des groupes', 'sf_guard_group') ?></li>
                        <li><?php echo link_to('Gestion des permissions', 'sf_guard_permission') ?></li>

                    </ul>
                </li> 
            <?php endif; ?>
            <li><?php echo link_to('Statistiques', 'statistique/statAccueil') ?></li>
        </ul>

    </div>


</div>