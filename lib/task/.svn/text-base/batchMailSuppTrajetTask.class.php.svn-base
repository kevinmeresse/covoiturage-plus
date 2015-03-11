<?php
/*
 * batch realisant le suivi de covoiturage lors de la suppression d'un trajet
 * Ce batch doit etre lancé tous les  jours
 * 
 * Process :
 *   lecture des trajets modifiés ce jour et dont le champ etat est passé à 0 ou le champ actif est passé à 0
 *   pour chaque trajet si faisant partie d'un équipage
 *      envoi d'un mail  aux covoitureurs
 *      creation d'une action au niveau du covoitureur
 */
class batchMailSuppTrajetTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'administration'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'prod'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'dbrmv3'),
      // add your own options here
    ));

    $this->namespace        = '';
    $this->name             = 'batchMailSuppAlerte';
    $this->briefDescription = 'batch realisant la liste des trajets supprimés et prevenant les covoitureurs associés => doit etre lance tous les jours';
    $this->detailedDescription = <<<EOF
    The [batchMailSuppTrajet|INFO] task does things.
    Process :
        lecture de la liste des trajets supprimés et prevenant les covoitureurs associés
        pour chaque demande
        envoi d'un mail d'information au covoitureur associé
        creation d'une action au niveau du covoitureur
        
    [php symfony batchMailAlerte|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    // add your code here
    require_once(dirname(__FILE__).'/../../config/ProjectConfiguration.class.php');
     $configuration = ProjectConfiguration::getApplicationConfiguration('administration', $options['env'], true);

    // Remove the following lines if you don't use the database layer
     //$databaseManager = new sfDatabaseManager($configuration);
     sfContext::createInstance($configuration);
     $cetObjet = sfContext::getInstance();

     //log de début de batch
     $this->logBlock('Batch Mail sur suppression trajet - debut de traitement', 'INFO');
     
     //compteur servant à compter le nombre de cas traités
     $cmpTrairement = 0;
     $compteurMailEnvoye = 0; //compteur pour les mails envoyés
     
     //récupération de la date du jour
     //$dateDuJour = now();
     $now = date("Y-m-d H:i:s");
     
     //récupération des demandes de MER du jour - 15jours et non deja éxécutées (non loggée)
     $trajetSupps = Doctrine::getTable('Trajet')->getListeTrajetSupprimeDuJour();
     
     //pour chaque trajet
     //     -> recuperation des covoitureurs associes
     //         -> envoi mail
     //         -> ecriture d'une action
     //         -> log en table log_site
     
     if($trajetSupps->count() != 0){
         foreach ($trajetSupps as $i => $trajetSupp) {
                    
              //recuperation des trajets et covoitureurs associés à ce trajet
              $trajetAssocs = Doctrine::getTable('Trajet')->getListeTrajetAssocEquipage($trajetSupp->getIdEquipage(), $trajetSupp->getIdTrajet());
              
              if($trajetAssocs->count() != 0){
                  
                  foreach ($trajetAssocs as $i => $trajetAssoc) {
                      //réalisation des étapes suivantes uniquement le covoituruer possede un mail
                      if($trajetAssoc->getCovoitureur()->getMail() != '' && !is_null($trajetAssoc->getCovoitureur()->getMail()) ){
                          //préparation du mail
                            $params['subject'] = sfConfig::get('sf_batch_alerte_trajet_supp_objet');
                            $params['to'] = $trajetAssoc->getCovoitureur()->getMail();
                            //$params['to'] = "contact@seve-informatique.com";
                            $params['from'] = sfConfig::get('sf_mail_cp_contact_trajet');
                            $params["message"] = "Traitement batch realise";
                            $params["depart"] = $trajetAssoc->getDepartVille();
                            $params["destination"] = $trajetAssoc->getDestinationVille();


                            //envoi mail
                            $outil = New Util();
                            $outil->envoiMailBatch( $cetObjet,"BatchMailAlerteTrajetSupp", $params);

                         //ecriture de l'action
                            $actionCv = new CpActionCv();
                            $actionCv->setCpActionCvDetail(sfConfig::get('sf_batch_alerte_trajet_supp_action_detail'));
                            $actionCv->setCpActionCvDateCreation($now);
                            $actionCv->setCpActionCvDateModification($now);
                            $actionCv->setCpActionCvDateEcheance($now);
                            $actionCv->setCpActionCvCpTypeActionId(sfConfig::get('sf_batch_alerte_trajet_supp_type_prov'));
                            $actionCv->setCpActionCvCovoitureurId($trajetAssoc->getIdUtilisateur());
                            $actionCv->setCpActionCvUserId(sfConfig::get('sf_batch_suivi_mer_user'));
                            $actionCv->save();

                         //ecriture du log
                            $enregLog = new LogSite();
                            $enregLog->setIdProvenance($alerte->getTaIdTrajetAlerte());  // provenance du log => id_mer
                            $enregLog->setIdLogTypeProvenance(sfConfig::get('sf_batch_alerte_trajet_supp_type_prov')); //type de la provenance
                            $enregLog->setCreated($now);
                            $enregLog->setIdSite(sfConfig::get('sf_id_site_client'));
                            $enregLog->setIdUser(sfConfig::get('sf_batch_suivi_mer_user'));
                            $enregLog->setMessage(sfConfig::get('sf_batch_alerte_trajet_supp_action_detail'));
                            $enregLog->save();

                            $compteurMailEnvoye ++;
                      }

                  }
              }
          }
     }
      

   
      
      $this->logBlock('nombre de mail envoye : '.$compteurMailEnvoye, 'INFO');
     
      $this->logBlock('Batch Mail sur suppression trajet - FIN de traitement', 'INFO');
     
  }
}
