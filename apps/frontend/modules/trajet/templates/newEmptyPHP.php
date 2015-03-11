<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>


    <br class="clear">
    
        <h4>Trajet regulier</h4>
        
            <table id="semaine-covoit">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th><strong>Statut</strong></th>
                        <th><strong>Etat</strong></th>
                        <th><strong>Depart</strong></th>
                        <th><strong>Retour</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="lundi">
                        <td><strong>Lundi</strong></td>
                        <td><?php echo $form['lundi_type_cov']->renderError() ?>
                            <?php echo $form['lundi_type_cov'] ?></td>
                        <td><?php echo $form['lundi_etat']->renderError() ?>
                            <?php echo $form['lundi_etat'] ?></td>
                        <td><?php echo $form['lundi_prise_service']->renderError() ?>
                            <?php echo $form['lundi_prise_service'] ?></td>
                        <td><?php echo $form['lundi_fin_service']->renderError() ?>
                            <?php echo $form['lundi_fin_service'] ?></td>
                    </tr>
                    <tr class="mardi">
                        <td><strong>Mardi</strong></td>
                        <td><?php echo $form['mardi_type_cov']->renderError() ?>
                            <?php echo $form['mardi_type_cov'] ?></td>
                        <td><?php echo $form['mardi_etat']->renderError() ?>
                            <?php echo $form['mardi_etat'] ?></td>
                        <td><?php echo $form['mardi_prise_service']->renderError() ?>
                            <?php echo $form['mardi_prise_service'] ?></td>
                        <td><?php echo $form['mardi_fin_service']->renderError() ?>
                            <?php echo $form['mardi_fin_service'] ?></td>
                    </tr>
                    <tr class="mercredi">
                        <td><strong>Mercredi</strong></td>
                        <td><?php echo $form['mercredi_type_cov']->renderError() ?>
                            <?php echo $form['mercredi_type_cov'] ?></td>
                        <td><?php echo $form['mercredi_etat']->renderError() ?>
                            <?php echo $form['mercredi_etat'] ?></td>
                        <td><?php echo $form['mercredi_prise_service']->renderError() ?>
                            <?php echo $form['mercredi_prise_service'] ?></td>
                        <td><?php echo $form['mercredi_fin_service']->renderError() ?>
                            <?php echo $form['mercredi_fin_service'] ?></td>
                    </tr>
                    <tr class="jeudi">
                        <td><strong>Jeudi</strong></td>
                        <td><?php echo $form['jeudi_type_cov']->renderError() ?>
                            <?php echo $form['jeudi_type_cov'] ?></td>
                        <td><?php echo $form['jeudi_etat']->renderError() ?>
                            <?php echo $form['jeudi_etat'] ?></td>
                        <td><?php echo $form['jeudi_prise_service']->renderError() ?>
                            <?php echo $form['jeudi_prise_service'] ?></td>
                        <td><?php echo $form['jeudi_fin_service']->renderError() ?>
                            <?php echo $form['jeudi_fin_service'] ?></td>
                    </tr>
                    <tr class="vendredi">
                        <td><strong>Vendredi</strong></td>
                        <td><?php echo $form['vendredi_type_cov']->renderError() ?>
                            <?php echo $form['vendredi_type_cov'] ?></td>
                        <td><?php echo $form['vendredi_etat']->renderError() ?>
                            <?php echo $form['vendredi_etat'] ?></td>
                        <td><?php echo $form['vendredi_prise_service']->renderError() ?>
                            <?php echo $form['vendredi_prise_service'] ?></td>
                        <td><?php echo $form['vendredi_fin_service']->renderError() ?>
                            <?php echo $form['vendredi_fin_service'] ?></td>
                    </tr>
                    <tr class="samedi">
                        <td><strong>Samedi</strong></td>
                        <td><?php echo $form['samedi_type_cov']->renderError() ?>
                            <?php echo $form['samedi_type_cov'] ?></td>
                        <td><?php echo $form['samedi_etat']->renderError() ?>
                            <?php echo $form['samedi_etat'] ?></td>
                        <td><?php echo $form['samedi_prise_service']->renderError() ?>
                            <?php echo $form['samedi_prise_service'] ?></td>
                        <td><?php echo $form['samedi_fin_service']->renderError() ?>
                            <?php echo $form['samedi_fin_service'] ?></td>
                    </tr>
                    <tr class="dimanche">
                        <td><strong>Dimanche</strong></td>
                        <td><?php echo $form['dimanche_type_cov']->renderError() ?>
                            <?php echo $form['dimanche_type_cov'] ?></td>
                        <td><?php echo $form['dimanche_etat']->renderError() ?>
                            <?php echo $form['dimanche_etat'] ?></td>
                        <td><?php echo $form['dimanche_prise_service']->renderError() ?>
                            <?php echo $form['dimanche_prise_service'] ?></td>
                        <td><?php echo $form['dimanche_fin_service']->renderError() ?>
                            <?php echo $form['dimanche_fin_service'] ?></td>
                    </tr>
                </tbody>
            </table>
        
        <br class="clear">
    
    <br class="clear">
    <p class="etape-suivante" id="goto-etape-trois">&Eacute;tape
        suivante</p>
    <br class="clear">

