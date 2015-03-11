<?php

/**
 * cp_etablissement_secteur actions.
 *
 * @package    roulezmailn_v3
 * @subpackage cp_etablissement_secteur
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cp_etablissement_secteurActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->cp_etablissement_secteurs = Doctrine_Core::getTable('CpEtablissementSecteur')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->cp_etablissement_secteur = Doctrine_Core::getTable('CpEtablissementSecteur')->find(array($request->getParameter('cp_etablissement_secteur_id')));
    $this->forward404Unless($this->cp_etablissement_secteur);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CpEtablissementSecteurForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CpEtablissementSecteurForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cp_etablissement_secteur = Doctrine_Core::getTable('CpEtablissementSecteur')->find(array($request->getParameter('cp_etablissement_secteur_id'))), sprintf('Object cp_etablissement_secteur does not exist (%s).', $request->getParameter('cp_etablissement_secteur_id')));
    $this->form = new CpEtablissementSecteurForm($cp_etablissement_secteur);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($cp_etablissement_secteur = Doctrine_Core::getTable('CpEtablissementSecteur')->find(array($request->getParameter('cp_etablissement_secteur_id'))), sprintf('Object cp_etablissement_secteur does not exist (%s).', $request->getParameter('cp_etablissement_secteur_id')));
    $this->form = new CpEtablissementSecteurForm($cp_etablissement_secteur);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cp_etablissement_secteur = Doctrine_Core::getTable('CpEtablissementSecteur')->find(array($request->getParameter('cp_etablissement_secteur_id'))), sprintf('Object cp_etablissement_secteur does not exist (%s).', $request->getParameter('cp_etablissement_secteur_id')));
    $cp_etablissement_secteur->delete();

    $this->redirect('cp_etablissement_secteur/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cp_etablissement_secteur = $form->save();

      $this->redirect('cp_etablissement_secteur/edit?cp_etablissement_secteur_id='.$cp_etablissement_secteur->getCpEtablissementSecteurId());
    }
  }
}
