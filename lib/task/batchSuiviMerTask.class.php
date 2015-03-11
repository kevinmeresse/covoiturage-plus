<?php
/*
 * batch realisant le suivi des MER (Mise En Relation)
 * Ce batch doit etre lancé tous les  jours
 * 
 * Process :
 *   lecture des demandes de MER  de la date du jour - 15 j
 *   pour chaque demande
 *      envoi d'un mail de demande de l'etat de la MER au covoitureur
 *      creatiuon d'une action au niveau du covoitureur
 */
class batchSuiviMerTask extends sfBaseTask
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
    $this->name             = 'batchSuiviMer';
    $this->briefDescription = 'batch realisant le suivi des MER (Mise En Relation) => doit etre lance tous les jours';
    $this->detailedDescription = <<<EOF
    The [batchSuiviMer|INFO] task does things.
    Process :
        lecture des demandes de MER  de la date du jour - 15 j
        pour chaque demande
        envoi d'un mail de demande de l'etat de la MER au covoitureur
        creatiuon d'une action au niveau du covoitureur
        
    [php symfony batchSuiviMer|INFO]
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
     $this->logBlock('Batch suivi MER - debut de traitement', 'INFO');
     
     //compteur servant à compter le nombre de cas traités
     $cmpTrairement = 0;
     
     //récupération de la date du jour
     //$dateDuJour = now();
     $now = date("Y-m-d H:i:s");
     
     //récupération des demandes de MER du jour - 15jours et non deja éxécutées (non loggée)
     $Mers = Doctrine::getTable('TrajetMiseEnRelation')->getListeMerA15Jours();
     
     //pour chaque MER
     //     -> envoi mail
     //     -> ecriture d'une action
     //     -> log en table log_site
     
      foreach ($Mers as $i => $Mer) {
          //envoi du mail si le covoituruer possede un mail
          
          if($Mer->getCdMail() != '' &&!is_null($Mer->getCdMail())){

              //préparation du mail
              $params['subject'] = sfConfig::get('sf_batch_suivi_mer_objet');
                $params['to'] = $Mer->getCdMail();
                $params['from'] = sfConfig::get('sf_mail_cp_contact_trajet');
                $params["message"] = "Traitement batch realise";
                $params["cc_nom"] = $Mer->getCcNom();
                $params["cc_prenom"] = $Mer->getCcPrenom();
                $params["depart_ville"] = $Mer->getDepartVille();
                $params["destination_ville"] = $Mer->getDestinationVille();
                $params["urlApplication"] = sfConfig::get('sf_url_site');
                

                //envoi mail
                $outil = New Util();
                $outil->envoiMailBatch( $cetObjet,"BatchMailSuiviMer", $params);

             //ecriture de l'action
                $actionCv = new CpActionCv();
                $actionCv->setCpActionCvDetail(sfConfig::get('sf_batch_suivi_mer_action_detail'));
                $actionCv->setCpActionCvDateCreation($now);
                $actionCv->setCpActionCvDateModification($now);
                $actionCv->setCpActionCvDateEcheance($now);
                $actionCv->setCpActionCvCpTypeActionId(sfConfig::get('sf_batch_suivi_mer_type_action'));
                $actionCv->setCpActionCvCovoitureurId($Mer->getCdIdUtilisateur());
                $actionCv->setCpActionCvUserId(sfConfig::get('sf_batch_suivi_mer_user'));
                $actionCv->save();

             //ecriture du log
                $enregLog = new LogSite();
                $enregLog->setIdProvenance($Mer->getIdMer());  // provenance du log => id_mer
                $enregLog->setIdLogTypeProvenance(sfConfig::get('sf_batch_suivi_mer_type_prov')); //type de la provenance
                $enregLog->setCreated($now);
                $enregLog->setIdSite(sfConfig::get('sf_id_site_client'));
                $enregLog->setIdUser(sfConfig::get('sf_batch_suivi_mer_user'));
                $enregLog->setMessage(sfConfig::get('sf_batch_suivi_mer_action_detail'));
                $enregLog->save();
          }
          
          //incrémentation du compteur
          $cmpTrairement ++;
          
          //echo "IdMER : ".$Mer->getIdMer();
      
      }
      
     
     //echo "test";
      
      $this->logBlock('nombre de traitements realises : '.$cmpTrairement, 'INFO');
     
      $this->logBlock('Batch suivi MER - FIN de traitement', 'INFO');
     
  }
}
