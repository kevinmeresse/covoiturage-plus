<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_helper('jQuery'); ?>



<div id="modif-profil">
    <h3><span>1</span>Votre accès au compte</h3>

    <div class="etape1"> 
        <form action="<?php echo url_for('covoitureur/covoitureurUpdateProfil') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
            <?php echo $form->renderGlobalErrors() ?>

            <div class="form-modif-profil" id="jai-mail">                 
                <label>Je dispose d'un mail *</label>
                <?php echo $form['mail']->renderError() ?>
                <?php echo $form['mail'] ?>
            </div>
            <br class="clear"/>
            <div class="form-modif-profil">                 
                <label>Je souhaite pouvoir être contacté directement par les covoitureurs</label>

                <?php echo $form['ss_contact_covoit'] ?>
            </div>
            <br class="clear"/>
            <div class="form-modif-profil">                 
                <label>Je souhaite être connecté automatiquement</label>

                <?php echo $form['permanente_connexion'] ?>
            </div>
            <br class="clear"/>

            <a href="<?php echo url_for('covoitureur/formMdpModif') ?>">Modifier mon mot de passe ?</a></p>
            <br class="clear"/>
            <p class="etape-suivante"id="goto-etape-deux">Étape suivante</p>
            <br class="clear"/>
    </div>	

    <h3><span>2</span>Votre profil</h3>	
    <div class="etape2">	
        <p class="annotations"> Aucune coordonnée n'est publiée sur le site sauf votre accord et après connexion (téléphone).</p>
        <p class="annotations">Seuls votre prénom et l'initiale de votre nom sont susceptibles d'être affichés. Si toutefois vous ne souhaitez pas indiquer votre prénom, précisez le ci-dessous.</p>
        <br/>
        <br/>
        <div class="form-modif-profil">                 
            <label>Je souhaite rester anonyme</label>

            <?php echo $form['anonymat'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil" id="nom">                 
            <label>Nom *</label>
            <?php echo $form['nom']->renderError() ?>
            <?php echo $form['nom'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil" id="prenom">                 
            <label>Prénom *</label>
            <?php echo $form['prenom']->renderError() ?>
            <?php echo $form['prenom'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil" id="sexe">                 
            <label>Sexe *</label>
            <?php echo $form['sexe']->renderError() ?>
            <?php echo $form['sexe'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil" id="annee">                 
            <label>Année de naissance *</label>
            <?php echo $form['annee_naissance']->renderError() ?>
            <?php echo $form['annee_naissance'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil" id="majeur">                 
            <label>Déclare être majeur(e) *</label>
            <?php echo $form['isMajeur']->renderError() ?>
            <?php echo $form['isMajeur'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil" id="adresse">                 
            <label>Adresse *</label>
            <?php echo $form['adresse']->renderError() ?>
            <?php echo $form['adresse'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil" id="cp-ville">                 
            <label>Code postal *</label>
            <?php echo $form['code_postal']->renderError() ?>
            <?php echo $form['code_postal'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil" id="ville">                 
            <label>Ville *</label>
            <?php echo $form['ville']->renderError() ?>
            <?php
            echo jq_input_auto_complete_tag(
                    'covoitureurFront[ville]', $tab_covoitureur_autoc['ville'], url_for1('covoitureur/autocompleteVille', TRUE), array('autocomplete' => 'on'), array('use_style' => true))
            ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil" id="tel">                 
            <label>Téléphone *</label>
            <?php echo $form['telephone']->renderError() ?>
            <?php echo $form['telephone'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Téléphone secondaire</label>
            <?php echo $form['telephone_mobile']->renderError() ?>
            <?php echo $form['telephone_mobile'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Téléphone autre</label>
            <?php echo $form['telephone_autre']->renderError() ?>
            <?php echo $form['telephone_autre'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Rendre visible mon numéro de téléphone</label>

            <?php echo $form['telephone_visible'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Ma photo</label>

            <?php echo $form['file_photo'] ?>
        </div>
        <div class="form-modif-profil">    

            <?php if ($covoitureur->getFilePhoto() != ''): ?>
                <img src="<?php echo $covoitureur->getCheminPhotoCovoitureur1(ESC_RAW) ?>" height="100px" title="image covoitureur" />
                <br>
            <?php endif; ?>

            <label>Supprimer ma photo</label>

            <?php echo $form['supp_photo'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Travaillez-vous dans un de ces organismes ? </label>

            <?php
                echo jq_input_auto_complete_tag(
                                'covoitureurFront[etablissement]', $tab_ville_autoc['etablissement'], url_for1('cp_etablissement/autocompleteCovoit', TRUE), array('autocomplete' => 'on', 'size' => '100'), array('use_style' => true))
            ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Si votre entreprise n'apparaît pas dans la liste merci de la renseigner ici : </label>

            <?php echo $form['societe'] ?>
        </div>
        <br class="clear"/>
        <div id="psa">
            <div class="form-modif-profil">                 
                <label>Quel est votre régime horaire ? *</label>

                <?php echo $form['cp_etablissement_horaire_id'] ?>
            </div>
            <br class="clear"/>
            <div class="form-modif-profil">                 
                <label>Secteur de travail *</label>

                <?php echo $form['cp_etablissement_secteur_id'] ?>
            </div>
            <br class="clear"/>
        </div>
        <div class="form-modif-profil">                 
            <label>Fonction **</label>

            <?php echo $form['id_covoitureur_fonction'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Connaissance de Covoiturage+ ? **</label>

            <?php echo $form['id_covoitureur_lien_site'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Bénéficiaire du RSA ? **</label>

            <?php echo $form['rsa'] ?>
        </div>
        <br class="clear"/>		
        <p class="etape-suivante" id="goto-etape-trois">Étape suivante</p> 
        <br class="clear"/>
        <p class="annotations">* Champs obligatoires </p>
        <p class="annotations">** Ces informations ne seront pas communiquées, elles sont collectées uniquement à des fins de gestion ou de statistiques </p> 

    </div>	

    <h3><span>3</span>Vos préférences</h3>	
    <div class="etape3">


        <br/>
        <br/>
        <div class="form-modif-profil">                 
            <label>Tolère fumeurs</label>

            <?php echo $form['tolere_fumeur'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Tolère animaux</label>

            <?php echo $form['tolere_animaux'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Tolère bagages</label>

            <?php echo $form['tolere_bagage'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Tolère musique</label>

            <?php echo $form['tolere_musique'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <label>Tolère discussions</label>

            <?php echo $form['tolere_discussion'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <?php echo $form['newsletter']->renderLabel() ?>

            <?php echo $form['newsletter'] ?>
        </div>
        <br class="clear"/>
        <div class="form-modif-profil">                 
            <?php //echo $form['mise_en_relation_sms']->renderLabel() ?>
            <?php //echo $form['mise_en_relation_sms']->renderError() ?>
            <?php //echo $form['mise_en_relation_sms'] ?>
        </div>
        <br class="clear"/>



        <?php echo $form->renderHiddenFields(false) ?>
        <p class="retour"><a href="<?php echo url_for('homepage') ?>">Retour</a></p>
        <input type="submit" value="Sauvegarder" />  



        </form>
    </div>	

</div>
