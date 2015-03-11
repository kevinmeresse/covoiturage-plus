<?php

/**
 * equipage actions.
 *
 * @package    roulezmailn_v3
 * @subpackage equipage
 * @author     RoulezMalin <technique@roulezmalin.fr>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class equipageActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->equipages = Doctrine_Core::getTable('Equipage')->getEquipageSite()->execute();
     // ->createQuery('a')
     // ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->equipage = Doctrine_Core::getTable('Equipage')->find(array($request->getParameter('id_equipage')));
    $this->forward404Unless($this->equipage);
  }
  
  
  
  //visuallisation d'un équipage
  public function executeShowCovoitureurEquipage(sfWebRequest $request)
  {
    $this->equipage = Doctrine_Core::getTable('Equipage')->find(array($request->getParameter('id_equipage')));
    $this->monTrajet = Doctrine_Core::getTable('Trajet')->getEquipageMonTrajet($request->getParameter('id_equipage'), $this->getUser()->getAttribute('id_covoitureur'));
    $this->trajets = Doctrine_Core::getTable('Trajet')->getEquipageListeTrajet($request->getParameter('id_equipage'), $this->getUser()->getAttribute('id_covoitureur'));
    $this->forward404Unless($this->equipage);
  }
  

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new EquipageForm();
  }
  
  /*********************************************************************************/
  /* Fonction d'activation et desactivation du covoiturage au niveau de l'équipage */
  /*********************************************************************************/
  
  //le covoitureur se desactive de l'équipage => en fait il désactive son trajet
  public function executeMeDesactiver(sfWebRequest $request)
  {
    //modification de l'ata au niveau du trajet
      $trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet')));
      $trajet->setEtat(0);
      $trajet->save();
      
      
    //redirection vers la page de composition de l'équipage  
    //$this->redirect('equipage/showCovoitureurEquipage',array('id_equipage' => $request->getParameter('id_equipage')));
      $this->redirect($this->generateUrl('default', array('module' => 'equipage','action' => 'showCovoitureurEquipage', 'id_equipage' => $request->getParameter('id_equipage'))));
  }
  
  //le covoitureur s'active de l'équipage => en fait il active son trajet
  public function executeMActiver(sfWebRequest $request)
  {
    //modification de l'ata au niveau du trajet
      $trajet = Doctrine_Core::getTable('Trajet')->find(array($request->getParameter('id_trajet')));
      $trajet->setEtat(1);
      $trajet->save();
      
      
    //redirection vers la page de composition de l'équipage  
    //$this->redirect('equipage/showCovoitureurEquipage',array('id_equipage' => $request->getParameter('id_equipage')));
    $this->redirect($this->generateUrl('default', array('module' => 'equipage','action' => 'showCovoitureurEquipage', 'id_equipage' => $request->getParameter('id_equipage'))));
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EquipageForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($equipage = Doctrine_Core::getTable('Equipage')->find(array($request->getParameter('id_equipage'))), sprintf('Object equipage does not exist (%s).', $request->getParameter('id_equipage')));
    $this->form = new EquipageForm($equipage);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($equipage = Doctrine_Core::getTable('Equipage')->find(array($request->getParameter('id_equipage'))), sprintf('Object equipage does not exist (%s).', $request->getParameter('id_equipage')));
    $this->form = new EquipageForm($equipage);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($equipage = Doctrine_Core::getTable('Equipage')->find(array($request->getParameter('id_equipage'))), sprintf('Object equipage does not exist (%s).', $request->getParameter('id_equipage')));
    $equipage->delete();

    $this->redirect('equipage/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $equipage = $form->save();

      $this->redirect('equipage/edit?id_equipage='.$equipage->getIdEquipage());
    }
  }
}
