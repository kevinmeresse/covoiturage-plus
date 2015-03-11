<?php
/*
 * batch realisant le suivi des alertes sur trajet
 * Ce batch doit etre lancé tous jours
 * 
 * Process :
 *   lecture des alertes 
 *   pour chaque alerte
 *      -> verification si existence depot trajet ce jour et si oui
 *             -> envoi mail
 *             -> ecriture d'une action
 *             -> log en table log_site
 */
class batchMailAlerteTask extends sfBaseTask
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
    $this->name             = 'batchMailAlerte';
    $this->briefDescription = 'batch realisant la liste de alertes actives et envoyant un mail => doit etre lance tous les jours';
    $this->detailedDescription = <<<EOF
    The [batchMailAlerte|INFO] task does things.
    Process :
        lecture de la liste des alertes et des trajets déposé le jour meme
        pour chaque demande
        envoi d'un mail d'information au covoitureur ayant deposé l'alerte
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
    /*
     $message = sfContext::getInstance()->getMailer()->compose();
     $message->setSubject('complex email');
     $message->setTo('to@example.com');
     $message->setFrom('from@example.com');

     $html = sfContext::getInstance()->getController()->getAction('action', 'actionName')->getPartial('module/email_partial');
     $message->setBody($html, 'text/html');
     sfContext::getInstance()->getMailer()->send($message);
     * 
     */
     
     //log de début de batch
     $this->logBlock('Batch Mail sur alerte - debut de traitement', 'INFO');
     
     //compteur servant à compter le nombre de cas traités
     $cmpTrairement = 0;
     $compteurMailEnvoye = 0; //compteur pour les mails envoyés
     
     //récupération de la date du jour
     //$dateDuJour = now();
     $now = date("Y-m-d H:i:s");
     
     //récupération des demandes de MER du jour - 15jours et non deja éxécutées (non loggée)
     $alertes = Doctrine::getTable('TrajetAlerte')->getListeAlerteTrajetDuJour();
     
     //pour chaque alerte
     //     -> verification si existence depot trajet ce jour et si oui
     //         -> envoi mail
     //         -> ecriture d'une action
     //         -> log en table log_site
     
      foreach ($alertes as $i => $alerte) {
          

            //envoi du mail si le covoituruer possede un mail
          
          if($alerte->getCdMail() != '' || !is_null($alerte->getCdMail()) || $alerte->getTaMailUtilisateur() != '' || !is_null($alerte->getTaMailUtilisateur())){
              
              $mailCovoitureur = '';
              if($alerte->getTaMailUtilisateur() != '' || !is_null($alerte->getTaMailUtilisateur())){
                  $mailCovoitureur = $alerte->getTaMailUtilisateur();
              }elseif($alerte->getCdMail() != '' || !is_null($alerte->getCdMail())){
                  $mailCovoitureur = $alerte->getCdMail();
              }
              
              //verification de l'existence de trajets déposés ce jour
                $trajets = Doctrine::getTable('Trajet')->getListeTrajetDuJour($villeDepart,$villeDestination);
                
                //réalisation des étapes suivantes uniquement si des trajets sont déposés
                if($trajets->count() != 0){
                    
                    //tableau des trajet pour le mail
                    $tabTrajet = array();
                    $cmptTrajet = 0;
                    foreach ($trajets as $i => $trajet) {
                        $tabTrajet[$cmptTrajet] = array($trajet->getIdTrajet(),$trajet->getDepartVille(),$trajet->getDestinationVille());
                    }
                    
                    
                    //préparation du mail
                    $params['subject'] = sfConfig::get('sf_batch_alerte_trajet_objet');
                    $params['to'] = $mailCovoitureur;
                    $params['from'] = sfConfig::get('sf_mail_cp_contact_trajet');
                    $params["message"] = "Traitement batch realise";
                    $params["trajets"] = $tabTrajet;
                    

                    //envoi mail
                    $outil = New Util();
                    $outil->envoiMailBatch( $cetObjet,"BatchMailAlerteTrajet", $params);

                 //ecriture de l'action
                    $actionCv = new CpActionCv();
                    $actionCv->setCpActionCvDetail(sfConfig::get('sf_batch_alerte_trajet_action_detail'));
                    $actionCv->setCpActionCvDateCreation($now);
                    $actionCv->setCpActionCvDateModification($now);
                    $actionCv->setCpActionCvDateEcheance($now);
                    $actionCv->setCpActionCvCpTypeActionId(sfConfig::get('sf_batch_alerte_trajet_type_prov'));
                    $actionCv->setCpActionCvCovoitureurId($alerte->getCdIdUtilisateur());
                    $actionCv->setCpActionCvUserId(sfConfig::get('sf_batch_suivi_mer_user'));
                    $actionCv->save();

                 //ecriture du log
                    $enregLog = new LogSite();
                    $enregLog->setIdProvenance($alerte->getTaIdTrajetAlerte());  // provenance du log => id_mer
                    $enregLog->setIdLogTypeProvenance(sfConfig::get('sf_batch_alerte_trajet_type_prov')); //type de la provenance
                    $enregLog->setCreated($now);
                    $enregLog->setIdSite(sfConfig::get('sf_id_site_client'));
                    $enregLog->setIdUser(sfConfig::get('sf_batch_suivi_mer_user'));
                    $enregLog->setMessage(sfConfig::get('sf_batch_alerte_trajet_action_detail'));
                    $enregLog->save();

                    $compteurMailEnvoye ++;
                }
            
              
          }
          
          //incrémentation du compteur
          $cmpTrairement ++;
          
          //echo "IdMER : ".$Mer->getIdMer();
      
      }
      
     
     //echo "test";
      
      $this->logBlock('nombre de traitements realise : '.$cmpTrairement, 'INFO');
      
      $this->logBlock('nombre de mail envoye : '.$compteurMailEnvoye, 'INFO');
     
      $this->logBlock('Batch Mail sur alerte - FIN de traitement', 'INFO');
     
  }
}
