
<h1>Equipage</h1>


<table class="liste equipage">
    <thead>
        <tr>
            <th>Nom équipage</th>
            <th>Créateur</th>
            <th>Date de Modification</th>
            <th>Commentaire</th>
        </tr>
    </thead>
        <tbody>
            <tr>
                
                <td>
                    <?php
                        echo link_to($equipage->getNomEquipage(), 'equipage/show?popup=1&id_equipage=' . $equipage->getIdEquipage(), array(
                            'popup' => array('Covoiturage_Plus_Visualisation_Equipage', 'width=' . sfConfig::get('app_larg_popup_equipage') . ',height=' . sfConfig::get('app_haut_popup_equipage') . ',left=320,top=0,scrollbars=yes'),
                            'target' => '_blank'
                        ))
                        ?>

                </td>

                
                <td>
                    <?php if($equipage->getIdProfil() != 0): ?>
                        <?php echo $equipage->getProfile()->getInitiales() ?>
                    <?php else: ?>
                        FO
                    <?php endif; ?>
                </td>

                    
                    <td>
                        <?php echo date("d-m-Y", strtotime($equipage->getDateModification())) ?>
                    </td>

                
                <td>
                    <div style="white-space: pre-line; ">
                        <?php echo $equipage->getCommentaires(ESC_RAW) ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>


<br class="clear"/>



