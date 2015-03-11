                                                                            <?php

/**                                                                      
 * accueil actions.
 *
 * @package    roulezmailn_v3
 * @subpackage accueil
 * @author     RoulezMalin
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class accueilActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('statistique', 'statAccueil');
  }
  
  /**
  * Executes edition des paes staitques
  *
  * @param sfRequest $request page statique avec id
  */
  public function executePage(sfWebRequest $request)
  {
    $this->contenu = Doctrine_Core::getTable('Contenu')->find(array($request->getParameter('id_contenu')));
    $this->forward404Unless($this->contenu);
  }
  
  /**
  * Executes gestion des erreur 404
  *
  * @param sfRequest $request page statique avec id
  */
  public function executeError404(sfWebRequest $request)
  {
      $this->setLayout(false);
  }
  
  /**
  * Executes gestion des erreur 404
  *
  * @param sfRequest $request page statique avec id
  */
  public function executePlandusite(sfWebRequest $request)
  {
      //génération du plan du site
        // réalisé à partir du CMS du Backoffice
        
        /***************************************************/
        /*     pages liées    */
        /***************************************************/
        //récupération des rubriques (menu) et pages liées
        $rubriques = Doctrine_Core::getTable('ContenuRubrique')
                ->createQuery('cr')
                //->leftJoin('cr.Contenu c')
                ->where('cr.id_site = ?', sfConfig::get('sf_id_site_client'))
                ->andWhere('cr.etat = 1')
                ->orderBy('cr.priorite')
                ->execute();

        $this->rubriques = $rubriques; 
        
        /***************************************************/
        /*     pages non liées    */
        /***************************************************/
        
        //récupération des  pages non liées à une rubrique
        $this->contenus = Doctrine_Core::getTable('Contenu')->getContenuNonLieRub();
        
        //nom du paragraphe regroupant les pages non liées
        $this->rubNonLiee = sfConfig::get('app_nom_cat_page_uniq');
        
        /***************************************************/
        /*     Actualités    */
        /***************************************************/
        //nom du paragraphe regroupant les actualités
        //$this->rubNonLiee = sfConfig::get('app_nom_cat_page_actu');
  }
}
