<?php

/**
 * LivreOr
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class LivreOr extends BaseLivreOr
{
    /*
     * coupe la phrase au bout de x carateres
*/
    public function coupeMessage($nb_caracteres) {
       
        $outil = new Util();
        
        $chaineCoupee = $outil->coupe_texte($this->getMessage(), $nb_caracteres);
        
        return $chaineCoupee;
    }
}

