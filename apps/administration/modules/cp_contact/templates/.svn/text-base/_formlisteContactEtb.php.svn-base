<div>
    <table class="liste contact-liste">
        <thead>
            <tr>
                <th>Nom prénom</th>
                <th>Téléphone</th>
                <th>Mail</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($cp_contacts as $cp_contact): ?>
                <tr>
                    <td>
                        <?php
                        echo link_to($cp_contact->getCpContactNom() . " " . $cp_contact->getCpContactPrenom(), 'cp_contact/visuEtb?popup=1&cp_contact_id=' . $cp_contact->getCpContactId().'&prov='.$prov, array(
                            'popup' => array('Covoiturage_Plus_Visualisation_contactEtb', 'width=' . sfConfig::get('app_larg_popup_contact') . ',height=' . sfConfig::get('app_haut_popup_contact') . ',left=320,top=0'),
                            'target' => '_blank'
                        ))
                        ?>
                    </td>
                    <td><?php echo $cp_contact->getCpContactTel() ?></td>
                    <td><?php echo $cp_contact->getCpContactMail() ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

