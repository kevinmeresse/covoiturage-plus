<?php use_helper('JavascriptBase', 'GMap') ?>
<?php use_helper('jQuery'); ?>
<h1>Visualisation de l'établissement</h1>

<table >
    <tfoot>
        <tr>
            <td colspan="2">
                <?php if ($popup == 1): ?>
                <p>
                    <FORM>
                        <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
                    </FORM>
                </p>
                <?php else: ?>
                        <p class="retour-liste"><a href="<?php echo url_for('cp_etablissement/indexSociete') ?>">Retour &agrave; la liste</a></p>
                <?php endif; ?>
                
                <p class="modifier"><?php echo link_to('Modifier', 'cp_etablissement/edit?popup=1&cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId(),array(
                        'popup' => array('Covoiturage_Plus', 'width=' . sfConfig::get('app_larg_popup_etb') . ',height=' . sfConfig::get('app_haut_popup_etb') . ',left=320,top=0,scrollbars=yes'))) ?></p>

                <p class="supprimer"><?php echo link_to('Supprimer', 'cp_etablissement/delete?popup=1&cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>

                <p class="liste">
                    <?php
                        echo link_to('Liste des inscrits', 'covoitureur/listeInscritsEtb?popup=1&cp_etablissement_id=' . $cp_etablissement->getCpEtablissementId(), array(
                            'popup' => array('Covoiturage_Plus_liste_inscrit', 'width=' . sfConfig::get('app_larg_popup_etb') . ',height=' . sfConfig::get('app_haut_popup_etb') . ',left=320,top=0'),
                            'target' => '_blank'
                        ))
                    ?>
                    </p>
  
                    </td>
                </tr>
                
        </tfoot>
        <tbody>
            <tr>
                <td>

                    <table class="etablissement-edit">

                        <tbody>

                        <tr>
                            <th>Etablissement</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementEtablissementNom() ?>

                            </td>
                        </tr>
                        
                        <tr>
                                <th>Raison sociale</th>
                                <td>
                                <?php echo $cp_etablissement->getCpEtablissement()->getCpEtablissementRaisonSocial() ?>

                            </td>
                        </tr>

                        <tr>
                            <th>Nombre de salariés</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementNbSalarie() ?>
                                

                            </td>
                        </tr>
                        <tr>
                            <th>Nombre d'inscrits</th>
                            <td>

                                <?php echo $cp_etablissement->getEtablissementNbInscrit() ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Adresse</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementAdresse1() ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Adresse suite</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementAdresse2() ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Code postal</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementCodePostal() ?>

                            </td>
                        </tr>

                        <tr>
                            <th>Ville</th>
                            <td>
                                <?php echo $cp_etablissement->getVilleFr() ?>

                            </td>
                        </tr>
                        <tr>
                            <th>ZI -ZA</th>
                            <td>
                                <?php echo !is_null($cp_etablissement->getCpEtablissementZoneId())? $cp_etablissement->getLieu() : '' ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Tel</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementTel() ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Fax</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementFax() ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Mail</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementMail() ?>

                            </td>
                        </tr>
                        <tr>
                            <th>Web</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementWeb() ?>

                            </td>
                        </tr>

                        
                        <tr>
                            <th>Statut</th>
                            <td>
                                <?php echo ($cp_etablissement->getCpEtablissementCpEtablissementStatutId() != null) ? $cp_etablissement->getCpEtablissementStatut() : '' ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Description (BO)</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementCommentaire() ?>

                            </td>
                        </tr>

                        <tr>
                            <th>Infos pour annuaire</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementInfos() ?>

                            </td>
                        </tr>

                        <tr>
                            <th>Actions pour annuaire</th>
                            <td>
                                <?php echo $cp_etablissement->getCpEtablissementActions() ?>

                            </td>
                        </tr>


                    </tbody>
                </table>
            </td>
            <td>
                <?php if (isset($gMap)): ?>
                <?php include_map($gMap, array('width' => '400px', 'height' => '300px')); ?>

                                    <!-- Javascript included at the bottom of the page -->
                <?php include_map_javascript($gMap); ?>
                <?php echo javascript_tag("
    var get_click_coord = function(overlay,latlng)
    {
      marker.setLatLng(latlng);
      document.getElementById('lieu_latitude').value = latlng.lat();
      document.getElementById('lieu_longitude').value = latlng.lng();
    }

    ") ?>
                <?php endif; ?></td>
        </tr>
    </tbody>
</table>


<br class="clear"/>
<hr />
<table class="ss-tab">
    <tr>
        <td class="partage2"><?php include_component('cp_contact','listeContactEtb', array('etb' => $cp_etablissement->getCpEtablissementId(), 'popup' => isset($popup)?$popup:0, 'listeIntegre' => isset($listeIntegre)?$listeIntegre:0, 'prov' => 'etb')) ?></td>
        <td>&nbsp;</td>
        <td class="partage2"><?php include_component('cp_action_etb','listeActionEtb', array('etb' => $cp_etablissement->getCpEtablissementId(), 'popup' => isset($popup)?$popup:0, 'listeIntegre' => isset($listeIntegre)?$listeIntegre:0, 'prov' => 'etb')) ?></td>
    </tr>
</table>

