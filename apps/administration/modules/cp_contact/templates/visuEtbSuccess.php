<h1>Visualisation des détails du contact </h1>
  <table class="contact-assoc-etab">
    <tfoot>
      <tr>
        <td colspan="2">


            <?php if (isset($popup) && $popup == 1): ?>

                        <p>
                        <FORM>
                            <INPUT TYPE="BUTTON" VALUE="Fermer la fenêtre" ONCLICK="window.close()">
                        </FORM>
                        </p>
                        <input type="hidden" name="popup" value="1" />

                        <?php 
                            if (isset($prov)){
                                $destProv = $prov;
                            }else{
                                $destProv = 'etb';
                            }

                            ?>

                         <p class="modifier"><?php echo link_to('Modifier', 'cp_contact/editEtb?popup=1&cp_contact_id=' . $cp_contact_etb->getCpContactId().'&prov='.$destProv) ?></p>

                        <p class="supprimer"><?php echo link_to('Supprimer', 'cp_contact/delete1?popup=1&cp_contact_id=' . $cp_contact_etb->getCpContactId(), array('method' => 'delete', 'confirm' => 'Etes-vous sûr ?')) ?></p>


                    <?php endif; ?>

        </td>
      </tr>
    </tfoot>
    <tbody>

      <tr>
        
         <?php if (isset($prov) && $prov == 'rs'): ?>
            <th>Raison Sociale</th>
            <td>
                <?php echo $cp_contact_etb->getCpEtablissement()->getCpEtablissementRaisonSocial() ?>
            </td>
         <?php else: ?>
            <th>Etablissement</th>
            <td>
              <?php echo $cp_contact_etb->getCpEtablissement() ?>
            </td>
         <?php endif; ?>
        
      </tr>
        <tr>
        <th>Nom</th>
        <td>
          <?php echo $cp_contact_etb->getCpContactNom() ?>
        </td>
      </tr>
      <tr>
        <th>Prénom</th>
        <td>
          <?php echo $cp_contact_etb->getCpContactPrenom() ?>
        </td>
      </tr>
      <tr>
        <th>Téléphone</th>
        <td>
          <?php echo $cp_contact_etb->getCpContactTel() ?>
        </td>
      </tr>
      <tr>
        <th>Téléphone autre</th>
        <td>
          <?php echo $cp_contact_etb->getCpContactTelAutre() ?>
        </td>
      </tr>
      <tr>
        <th>Mail</th>
        <td>
          <?php echo $cp_contact_etb->getCpContactMail() ?>
        </td>
      </tr>
      <tr>
        <th>Mail autre</th>
        <td>
          <?php echo $cp_contact_etb->getCpContactMailAutre() ?>
        </td>
      </tr>
      <tr>
        <th>Fonction</th>
        <td>            
          <?php echo $cp_contact_etb->getCpContactStatutId() != 0?  $cp_contact_etb->getCpContactStatut() : "Non définie"; ?>
        </td>
      </tr>
      <tr>
        <th>Commentaire</th>
        <td>
          <?php echo nl2br(htmlspecialchars($cp_contact_etb->getCpContactCommentaire(ESC_RAW))) ?>
        </td>
      </tr>
      <tr>
        <th>Contact principal ?</th>
        <td>
          <?php echo $cp_contact_etb->getCpContactContactPrincipal() == 1 ? "Oui" : "Non" ?>
        </td>
      </tr>

      
    </tbody>
  </table>

<hr>
<?php include_component('cp_action_ctc','listeActionCtc', array('ctc' => $ctc, 'popup' => isset($popup) ? $popup : 0, 'prov' => isset($prov) ? $prov : 'etb')) ?>
