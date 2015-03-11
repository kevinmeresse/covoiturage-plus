<?php

/**
 * cp_type_action actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cp_type_action
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cp_type_actionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->cp_type_actions = Doctrine_Core::getTable('CpTypeAction')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CpTypeActionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CpTypeActionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cp_type_action = Doctrine_Core::getTable('CpTypeAction')->find(array($request->getParameter('cp_type_action_id'))), sprintf('Object cp_type_action does not exist (%s).', $request->getParameter('cp_type_action_id')));
    $this->form = new CpTypeActionForm($cp_type_action);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($cp_type_action = Doctrine_Core::getTable('CpTypeAction')->find(array($request->getParameter('cp_type_action_id'))), sprintf('Object cp_type_action does not exist (%s).', $request->getParameter('cp_type_action_id')));
    $this->form = new CpTypeActionForm($cp_type_action);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cp_type_action = Doctrine_Core::getTable('CpTypeAction')->find(array($request->getParameter('cp_type_action_id'))), sprintf('Object cp_type_action does not exist (%s).', $request->getParameter('cp_type_action_id')));
    $cp_type_action->delete();

    $this->redirect('cp_type_action/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {              
        $cp_type_action = $form->save();
        
        //gestion de l'indicateur 	cp_type_action_cible
        if($form->getValue('cp_type_action_statut_id') != ''){
            $cp_type_action->setCpTypeActionCible(1);
        }
        
        if ($form->getObject()->isNew()) {
            $newInd = 1;
        }
        
        //gestion de la date de modification et de la date de création            
        $now = date("Y-m-d H:i:s");
        
        if ($newInd == 1) {
            $cp_type_action->setCpTypeActionDateCreation($now);
        }
        $cp_type_action->setCpTypeActionDateModification($now);
        
        $cp_type_action->save();

      $this->redirect('cp_type_action/edit?cp_type_action_id='.$cp_type_action->getCpTypeActionId());
    }
  }
}
