<?php
class cp_action_cvComponents extends sfComponents
{
    /*
     * liste les contenus non liés à une rubrique
     */
    public function executeListeActionCovoitureur()
    {
                
        $this->cp_action_cvs = Doctrine_Core::getTable('CpActionCv')->getActionsCovoitureur($this->id_utilisateur);
        
        
        //passage de l'id du covoitureur
        $this->id_utilisateur = $this->id_utilisateur;
    }
    
    /*
     * génère un formulaire présentant les actions en fonctions du statut
     */
    public function executeStatutActionForm()
    {
                
        //recupération de la dernière action du covoitureur pour le statut
        $last_action = Doctrine_Core::getTable('CpActionCv')->getLastActionsCovoitureurStatut($this->id_utilisateur, $this->id_statut, $this->id_trajet);
        
       $cp_action_cv = new CpActionCv();
       $cp_action_cv->setCpActionCvCovoitureurId($this->id_utilisateur);
       $cp_action_cv->setCpActionCvTrajetId($this->id_trajet);

       $this->form = new CpActionCvTrajetForm($cp_action_cv,array('id_statut' => $this->id_statut, 'id_utilisateur' => $this->id_utilisateur, 'id_equipage' => $this->id_equipage, 'last_action' => $last_action));
       
       //passage de l'id du covoitureur (sert à rendre unique l'id pour le composant ajax
        $this->id_utilisateur = $this->id_utilisateur;
        $this->id_trajet = $this->id_trajet;
        $this->last_action = $last_action;
        $this->id_statut = $this->id_statut;

    }
    
    public function executeListActionParStatutPourCovoitEtTrajet(){
        $typaActions = Doctrine_Core::getTable('CpTypeAction')->getActionParStatutParOrdrePourCovoitEtTrajet(null, 
                            $this->idstatut, 
                            $this->idcovoitureur,
                            $this->idtrajet,
                            1, 
                            $execute = 1);
        //print_r($typaActions);
        
         $this->tab_action = array();
        
         $i = 0;
        
        //variable permettant de sélectionner la dernière action (position sur dernière action)
         $optionSelect = null;
        foreach ($typaActions as $typaAction){
            //print_r($typaAction);
            if($this->last_action != 0 && $typaAction['cp_type_action_id'] == $this->last_action){
                $optionSelect = "selected";
            }else{
                $optionSelect = null;
            }
            if(isset($typaAction['cp_action_cv_id'])){
                //$this->tab_action[$i] = array($typaAction['cp_type_action_id'], $typaAction['cp_type_action_nom'],  "OK") ;
                $this->tab_action[$i] = array("0" => $typaAction['cp_type_action_id'],"1" =>  $typaAction['cp_type_action_nom'], "2" => "dejautilise","4" =>  $typaAction['cp_action_cv_id'],"5" =>  $optionSelect);
                //array_push($this->tab_action,array($typaAction['cp_type_action_id'], $typaAction['cp_type_action_nom'],  "OK"));
            }else{
                //$this->tab_action[$i] = array( $typaAction['cp_type_action_id'],  $typaAction['cp_type_action_nom'],  "NOK");
                $this->tab_action[$i] = array("0" => $typaAction['cp_type_action_id'],"1" =>  $typaAction['cp_type_action_nom'], "2" => "pasutilise","4" =>  $typaAction['cp_action_cv_id'],"5" =>  $optionSelect);
                //array_push($this->tab_action,array($typaAction['cp_type_action_id'], $typaAction['cp_type_action_nom'],  "NOK"));
            }
            $i++;
        }

        
         $this->idComposantForm = $this->idComposantForm;  
         $this->nomComposantForm = $this->nomComposantForm;
        
        //la sortie se fait directement dans le partial
        //return $this->renderPartial('cp_action_cv/listActionParStatutPourCovoitEtTrajet', array('tab_action' => $this->tab_action, 'idComposantForm' => $request->getParameter('idComposantForm'), 'nomComposantForm' => $request->getParameter('nomComposantForm')));
        
    }
}
?>