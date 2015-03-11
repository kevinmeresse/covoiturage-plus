<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('cp_action_cv/createAuto') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

    <div >
        <table class="insere">

            <tbody>
                <?php echo $form->renderGlobalErrors() ?>
                <?php echo $form->renderHiddenFields(false) ?>
                <tr>
                    <td>
                        <?php //echo $form['cp_type_action_statut_id'] ?>
                        <?php
                            echo $form['cp_type_action_statut_id']->render(array(
                                'onchange' => jq_remote_function(array(
                                    'update' => 'action'.$id_trajet,
                                    'url' => 'cp_action_cv/listActionParStatutPourCovoitEtTrajet',
                                    'with' => "'idstatut='+value+'&lastaction=0&idcovoitureur=".$id_utilisateur."&idtrajet=".$id_trajet."&idComposantForm=cp_action_cv_cp_action_cv_cp_type_action_id&nomComposantForm=cp_action_cv[cp_action_cv_cp_type_action_id]'"))
                            ))
                            ?>
                    </td>
                    <td>&nbsp;</td>
                    <td>
                        <div id="action<?php echo $id_trajet ?>">
                            <?php //echo $form['cp_action_cv_cp_type_action_id'] ?>
                            <?php include_component('cp_action_cv','listActionParStatutPourCovoitEtTrajet', 
                                    array('idComposantForm' => 'cp_action_cv_cp_action_cv_cp_type_action_id',
                                        'nomComposantForm' => 'cp_action_cv[cp_action_cv_cp_type_action_id]',
                                        'idstatut' => $id_statut,
                                        'idcovoitureur' => $id_utilisateur,
                                        'idtrajet' => $id_trajet,
                                        'last_action' => $last_action
                                        )) ?>
                        </div>
                    </td>
                    <td><input class="integre" type="submit" value="Ok" /></td>
                
                </tr>

            </tbody>
        </table>
    </div>

    



    

</form>
