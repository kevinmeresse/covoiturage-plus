<?php

/**
 * CpActionEtb
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    roulezmailn_v3
 * @subpackage model
 * @author     RoulezMalin
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class CpActionEtb extends BaseCpActionEtb
{
    /*
    *récupération des initiales du createur site associé
    */
     public function getIntervenantCp($id_user = null) {

        $user = Doctrine_Query::create()
                ->select('initiales')
                ->from('sfGuardUserProfile')
                ->where('id_user = ?',$this->getCpActionEtbUserId() )
                ->fetchOne();

        $results = "";



        return $user['initiales'];
    }

}