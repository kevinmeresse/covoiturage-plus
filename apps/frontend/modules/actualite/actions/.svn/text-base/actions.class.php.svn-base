<?php

/**
 * actualite actions.
 *
 * @package    roulezmailn_v3
 * @subpackage actualite
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class actualiteActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        $this->contenu_actualites = Doctrine_Core::getTable('ContenuActualite')->getActualiteActiveSite();
        //->createQuery('a')
        //->execute();

        $this->pager = new sfDoctrinePager(
                        'ContenuActualite',
                        sfConfig::get('app_max_actualite_list')
        );
        $this->pager->setQuery(Doctrine::getTable('ContenuActualite')->getActualiteActiveSite());
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeRss(sfWebRequest $request) {

        $feed = new sfAtom1Feed();
        $feed->setLanguage("fr");
        $feed->setTitle('Covoiturage+');
        $feed->setLink(sfConfig::get('sf_url_site'));
        $feed->setAuthorEmail('contact@covoiturage.asso.fr');
        $feed->setAuthorName('Covoiturage+');

        $feedImage = new sfFeedImage();
        $feedImage->setFavicon(sfConfig::get('sf_url_site').'/images/favicon.ico');
        $feedImage->setImage(sfConfig::get('sf_url_site').'/images/structure/logo-covoiturage-plus.png');
        $feed->setImage($feedImage);


        $contenuActualites = Doctrine_Query::create()
                ->from('ContenuActualite')
                ->where('id_site = ?', sfConfig::get('sf_id_site_client'))
                ->execute();

        foreach ($contenuActualites as $contenuActualite) {
            $item = new sfFeedItem();
            $item->setTitle($contenuActualite->getFrTitre());
            $item->setLink(sfConfig::get('sf_url_site').'/actualite/view?id_actualite=' . $contenuActualite->getIdActualite());
            $item->setDescription($contenuActualite->getFrResumeHtml());
            $feed->addItem($item);
        }

        $this->feed = $feed;
    }

    //Affichage de la fiche actualité
    public function executeView(sfWebRequest $request) {
        $this->forward404Unless($contenu_actualite = Doctrine_Core::getTable('ContenuActualite')->find(array($request->getParameter('id_actualite'))), sprintf('Object contenu_actualite does not exist (%s).', $request->getParameter('id_actualite')));
        $this->contenu_actualite = $contenu_actualite;
    }

}
