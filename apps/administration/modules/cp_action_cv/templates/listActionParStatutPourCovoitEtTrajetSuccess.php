<?php include_component('cp_action_cv','listActionParStatutPourCovoitEtTrajet', 
                                    array('idComposantForm' => 'cp_action_cv_cp_action_cv_cp_type_action_id',
                                        'nomComposantForm' => 'cp_action_cv[cp_action_cv_cp_type_action_id]',
                                        'idstatut' => $id_statut,
                                        'idcovoitureur' => $id_utilisateur,
                                        'idtrajet' => $id_trajet,
                                        'last_action' => $last_action
                                        )) ?>
