<table class="liste covoitureur-full">

    <tr>
        <th>Identité</th>
        <td>
                <?php echo $covoitureur->getPrenom() ?>&nbsp;<?php echo $covoitureur->getNom() ?>
            </td>
            <td rowspan="4">
                <?php if ($covoitureur->getEtatPhoto() != 0): ?>
                    <?php if ($covoitureur->getCheminPhotoCovoitureur(ESC_RAW) != ''): ?>
                        <?php echo $covoitureur->getCheminPhotoCovoitureur(ESC_RAW) ?>
                            <br>
                    <?php endif; ?>
                <?php else: ?>
                    <?php echo image_tag('photos/photo_covoitureur_base.jpg', array('height' => '50%','width' => '50%')); ?>
                <?php endif; ?>
            </td>
            <td>&nbsp;</td>
            <th>Etat du compte</th>
            <td><?php echo (($covoitureur->getEtat() == 1) ? 'Actif' : 'Inactif') ?></td>
      </tr>
      <tr>
          <th>Adresse</th>
          <td>
            <?php echo $covoitureur->getAdresse() ?><br>
            <?php echo $covoitureur->getCodePostal() ?>&nbsp;<?php echo $covoitureur->getVille() ?>
          </td>
          <td>&nbsp;</td>
          <th>Validation Cov+</th>
           <td><?php echo $covoitureur->getEtatSiteClientValidation() == 1 ? "Validé" : "Non validé" ?></td>
     </tr>
     <tr>
         <th>Année naiss.</th>
         <td>
              <?php echo $covoitureur->getAfficheDateNaissance()  ?><br>

          </td>
          <td>&nbsp;</td>
          <th>Date de création</th>
          <td><?php echo date("d-m-Y", strtotime($covoitureur->getDateCreation())) ?></td>
     </tr>
     <tr>
          <th>Est majeur ?</th>
          <td><?php echo $covoitureur->getIsmajeur() == 1 ? "Oui" : "Non" ?></td>
          <td>&nbsp;</td>
          <th>Statut photo  </th>
            <td>
                <?php if ($covoitureur->getEtatPhoto() != 0): ?>
                <?php echo $covoitureur->getEtatPhoto() == 2 ? "Validé" : "Non validé" ?>
                <?php else: ?>
                <?php echo "Pas de photo" ?>
                <?php endif; ?>
            </td>
     </tr>
     
     <tr>
          <th>Sexe</th>
          <td><?php echo $covoitureur->getSexe() == 2 ? "F" : "M" ?></td>
          <td colspan="3">&nbsp;</td>

     </tr>
    

    <tr>
            <th>Mail principal</th>
            <td><?php echo $covoitureur->getMail() ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <th>Mail secondaire</th>
            <td><?php echo $covoitureur->getMailPerso() ?></td>
      </tr>
      <tr>
            <th>Tél. portable</th>
            <td><?php echo $covoitureur->getTelephone() ?>&nbsp;
                         (<b>Tél. visible ?</b>&nbsp; <?php echo $covoitureur->getTelephoneVisible() == 1 ? "Oui" : "Non" ?>)</td>
            <th>Tél. domicile</th>
            <td><?php echo $covoitureur->getTelephoneMobile() ?></td>
            <th>Tél. travail</th>
            <td><?php echo $covoitureur->getTelephoneAutre() ?></td>
      </tr>
      <tr>
            <th>Etablissement</th>
            
                <?php if($covoitureur->getCpEtablissementId() != 0): ?>
                    <td>
                    <?php
                        echo link_to(substr($covoitureur->getCpEtablissement(),0,40), 'cp_etablissement/visu?popup=1&cp_etablissement_id=' . $covoitureur->getCpEtablissementId(), array(
                            'popup' => array('Covoiturage_Plus_Visualisation_covoit_etablissement', 'width=' . sfConfig::get('app_larg_popup_etb') . ',height=' . sfConfig::get('app_haut_popup_etb') . ',left=320,top=0,scrollbars=yes'),
                            'target' => '_blank'
                        ))
                        ?>
                    </td>
                    <td> (
                        <?php if(!is_null($covoitureur->getCpEtablissement()->getCpEtablissementEtablissementPereId())): ?>          
                        <?php $nomRs = substr(($covoitureur->getCpEtablissement()->getEtablissementRaisonSociale() != ''?$covoitureur->getCpEtablissement()->getEtablissementRaisonSociale():''),0,40) ?>
                            <?php
                            echo link_to($nomRs, 'cp_etablissement/visuSociete?popup=1&cp_etablissement_id=' . $covoitureur->getCpEtablissement()->getCpEtablissementEtablissementPereId(), array(
                                'popup' => array('Covoiturage_Plus_Visualisation_covoit_raison_social', 'width=' . sfConfig::get('app_larg_popup_etb') . ',height=' . sfConfig::get('app_haut_popup_etb') . ',left=320,top=0,scrollbars=yes'),
                                'target' => '_blank'
                            ))
                            ?>
                        <?php else: ?>
                            <?php echo  $covoitureur->getCpEtablissement()->getEtablissementRaisonSociale(); ?> 
                        <?php endif; ?>
                    ) </td>
                <?php else: ?>
                    <td>                
                        <?php echo  ($covoitureur->getSociete() == '' || is_null($covoitureur->getSociete())) ? "Particulier" : $covoitureur->getSociete() ; ?>
                        
                    </td>
                    <td>&nbsp;</td>
                <?php endif; ?>
           
            
            <td>&nbsp;</td>
            <th>Fonction</th>
            <td><?php echo $covoitureur->getCovoitureurFonction() ?></td>
      </tr>
       <tr>
            <th>RSA</th>
            <td><?php echo $covoitureur->getRsa() == 1 ? "Oui" : "Non" ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <th>Possède un véhicule</th>
            <td><?php echo $covoitureur->getPossedeVehicule() == 1 ? "Oui" : "Non"  ?></td>
            
      </tr>
      <tr>
         <th>Connaissance Cov+</th>
        <td><?php echo $covoitureur->getIdCovoitureurLienSite() != 0 ? $covoitureur->getCovoitureurLienSite() : ""  ?></td>
        <th colspan="2">Commentaires</th>
            <td rowspan="4" colspan="2" style="word-wrap: break-word">
                <div style="white-space: pre-line; ">
                <?php //echo $sf_data->getRaw('covoitureur')->getRemarque(ESC_RAW) ?>
                    <?php echo $covoitureur->getRemarque() ?>
                    </div>
            </td>
     </tr>
     <tr>
         <th>Inscription newsletter</th>
        <td><?php echo $covoitureur->getNewsletter() == 1 ? "Oui" : "Non"  ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
     </tr>
     <tr>
         <th>Peut être contacté<br>(par un autre inscrit)</th>
        <td><?php echo $covoitureur->getSsContactCovoit() == 1 ? "Oui" : "Non" ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
     </tr>
     <tr>
         <th>Souhaite rester anonyme </th>
        <td><?php echo $covoitureur->getAnonymat() == 1 ? "Oui" : "Non" ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
     </tr>

             
</table>



