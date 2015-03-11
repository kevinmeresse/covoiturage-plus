
<h1>Equipage</h1>


<table>

        <tbody>
            <tr>
                <th>Nom équipage</th>
                <td>
                    <?php echo $equipage->getNomEquipage() ?>

                </td>
            </tr>

            <tr>
                <th>Initiales du créateur</th>
                <td>
                    <?php if($equipage->getIdProfil() != 0): ?>
                        <?php echo $equipage->getProfile()->getInitiales() ?>
                    <?php else: ?>
                        FO
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <th>Affichage sur site</th>
                <td>
                    <?php if($equipage->getEtat() != 0): ?>
                        visible
                    <?php else: ?>
                        non visible
                    <?php endif; ?>
                </td>
            </tr>



                <tr> 
                    <th>Date de Modification</th>
                    <td>
                        <?php echo date("d-m-Y", strtotime($equipage->getDateModification())) ?>
                    </td>
                </tr>      
            

            
            
            <tr>
                <th>Commentaire</th>
                <td>
                    <?php echo $equipage->getCommentaires(ESC_RAW) ?>

                </td>
            </tr>
        </tbody>
    </table>


<?php include_component('trajet','listeTrajetAssocEquipage', array('id_equipage' => $id_equipage)) ?>
<br>

<p class="modifier"><a href="<?php echo url_for('equipage/edit?id_equipage=' . $equipage->getIdEquipage()) ?>">Modifier</a></p>
<br class="clear"/>



