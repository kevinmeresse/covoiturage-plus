<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of utilClass
 *
 * bibliothèque d'outils servant à la fois au frontoffice et backoffice
 *
 * @author Christophe Vignaud, Emmanuel Bellamy
 */
class Util {
    /*
     * génération de la clé utilisée dans les chmaps cle de la base de données
     * $d : correspond à la chaine de début de la clé (par défaut : user)
     * $f : coorespond à la chaine de milieu de clé (par défaut : eser)
     */

    public static function genereCle($d, $f) {

        if (empty($d))
            $d = 'user';
        if (empty($f))
            $f = 'eser';

        //création de la date du jour
        $date_du_jour = date("dYm");

        //création d'un nombre aléatoire
        $nombre_aleatoire = (rand()) * 28;

        //création de la clé
        $cle = $d . $nombre_aleatoire . $f . $date_du_jour;

        return $cle;
    }

    /*
     * suppression de la chaine de caractere entre parenthes et des parentheses
     * dans la chaine fournie (avec la chaine parenthésée en fin de chaine)
     * ex : en entrée => string = "voici une chaine (avec des parentheses)"
     *      en sortie => string = "voici une chaine"
     * $libelle : correspond à la chaine passée
     */

    public static function extractCpLibelle($libelle) {

        $chaineExtract = '';

        if ($libelle == '') {
            return $chaineExtract;
        }

        //verifie que la chaine passée possède des ()       
        //récupère la chaine avant la parenthese
        $posPar = stripos($libelle, '(');
        if ($posPar === false) {
            return $libelle;
        }

        $chaineExtract = substr($libelle, 0, $posPar);
        if ($chaineExtract === false) {
            return '';
        }

        //supprime les espaces de fin
        $chaineExtract = trim($chaineExtract);


        return $chaineExtract;
    }
    
    /**
     * Parse the input string and extract the name of the city, and the postal code (if it's inside parenthesis)
     * 
     * @param string $string The string to parse
     * @return array An array with 2 string objects: the name of the city, and the postal code (empty string if not found)
     * 
     * Example:
     * Input 'Brest (29200)' and you'll have array('Brest', '29200') in return
     * 
     * @author Kevin Meresse
     */
    public static function splitCityAndPostalCode($string) {
        $result = array();
        $result[0] = '';
        $result[1] = '';
        
        if ($string != '') {
            $leftParenthesisPosition = stripos($string, '(');
            if ($leftParenthesisPosition == false) {
                $result[0] = $string;
            } else {
                $result[0] = trim(substr($string, 0, $leftParenthesisPosition));
                $rightParenthesisPosition = stripos($string, ')');
                if ($rightParenthesisPosition == false) {
                    $postalCode = trim(substr($string, $leftParenthesisPosition+1));
                    if ($postalCode != '') {
                        $result[1] = $postalCode;
                    }
                } else {
                    $result[1] = trim(substr($string, $leftParenthesisPosition+1, $rightParenthesisPosition-$leftParenthesisPosition-1));
                }
            }
        }
        
        return $result;
    }
    


    /*
     * récupération de l'id cp-etablissement 
     * 
     * dans la chaine fournie (avec la chaine parenthésée en fin de chaine)
     * retourne un id
     * ex : en entrée => string = "la poste (id=1752)"
     *      en sortie => string = 1752
     * $libelle : correspond à la chaine passée
     */

    public static function extractIdCpEtablissement($libelle) {
        $chaineExtract = 0;

        if ($libelle == '') {
            return $chaineExtract;
        }

        //récupère la chaine avant la parenthese
        $posPar1 = stripos($libelle, '(id=');
        if ($posPar1 === false) {
            return $chaineExtract;
        }
        $posPar1 = $posPar1 + 4;

        $posPar2 = strrpos($libelle, ')');
        if ($posPar2 === false) {
            return $chaineExtract;
        }


        //récupération du prénom
        $lgChaine = $posPar2 - $posPar1;
        $id = substr($libelle, $posPar1, $lgChaine);
        if ($id === false) {
            return $chaineExtract;
        }

        if($id != '' && !is_null($id)){
            $chaineExtract = $id;
        }else{
            $chaineExtract = 0;
        }
        

        return $chaineExtract;
    }

    /*
     * récupération du nom de la ville et du code postal
     * retourne sous forme de tableau
     * ex : en entrée => string = "lyon (69000)"
     *      en sortie => array = ('ville' => 'lyon', 'cp' => '69000', 'error' => '')
     * $libelle : correspond à la chaine passée
     */

    public static function recupCpLibelle($libelle) {

        $tab_result = array('ville' => '', 'cp' => '', 'error_type' => 0, 'error_msg' => '');

        if ($libelle == '') {
            $tab_result['error_type'] = 1;
            $tab_result['error_msg'] = 'pas de libelle';
            return $tab_result;
        }

        //verifie que la chaine passée possède des ()       
        //récupère la chaine avant la parenthese
        $posPar = stripos($libelle, '(');
        if ($posPar === false) {
            $tab_result['ville'] = $libelle;
            $tab_result['error_type'] = 2;
            $tab_result['error_msg'] = 'pas de code postal';
            return $tab_result;
        }

        $ville = trim(substr($libelle, 0, $posPar));
        $cp_ville = substr($libelle, $posPar + 1, 5);
        if ($ville === false) {
            $tab_result['ville'] = $ville;
            $tab_result['error_type'] = 3;
            $tab_result['error_msg'] = 'probleme de récupération du libelle';
            return $tab_result;
        }


        $tab_result['ville'] = $ville;
        $tab_result['cp'] = $cp_ville;


        return $tab_result;
    }

    /*
     * récupération de la chaine de caractere apres le fr-  
     * pour récupération de l'id de la ville

     * ex : en entrée => string = "fr-6600"
     *      en sortie => string = 6600
     * $libelle : correspond à la chaine passée
     */

    public static function extractIdVille($libelle) {
        $tabRetour = array();

        $chaineExtract = 0;

        $îd = 0;

        if ($libelle == '') {
            return $chaineExtract;
        }

        //verification que la chaine est superieur à fr-
        if (strlen($libelle) <= 3) {
            return $chaineExtract;
        }

        //récupère la positiondu -
        $posPar1 = stripos($libelle, '-');
        if ($posPar1 === false) {
            return $chaineExtract;
        }

        return substr($libelle, $posPar1 + 1);
    }

    /*
     * récupération de la chaine de caractere avant parenthese et entre parenthes 
     * pour génération d'un copule nom - prénom
     * dans la chaine fournie (avec la chaine parenthésée en fin de chaine)
     * retourne un tableau
     * ex : en entrée => string = "Dupont (Louis)"
     *      en sortie => tab = (Dupont, Louis)
     * $libelle : correspond à la chaine passée
     */

    public static function extractNomPrenom($libelle) {
        $tabRetour = array();
        $tabRetour['nom'] = '';
        $tabRetour['prenom'] = '';

        $chaineExtract = '';

        if ($libelle == '') {
            return $tabRetour;
        }

        //verifie qu'il y a des parentheses
        $posPar1 = stripos($libelle, '(');

        if ($posPar1 === false) { //la parenthèse est absenet => seul le nom a été saisi
            $tabRetour['nom'] = trim($libelle);
            $tabRetour['prenom'] = '';

            return $tabRetour;
        } else { // la parenthese existe, on verifie que la seconde existe aussi
            $posPar2 = stripos($libelle, ')');

            if ($posPar2 === false) {//la seconde parenthèse est absente, on considfere qu'il y a uniquement le nom
                $tabRetour['nom'] = trim($libelle);
                $tabRetour['prenom'] = '';

                return $tabRetour;
            } else { // la seconde parenthèse est présente => on retourne le nom et le prénom
                //récupération du nom
                $nom = substr($libelle, 0, $posPar1);
                if ($nom === false) {
                    return $tabRetour;
                }

                //récupération du prénom
                $lgChaine = $posPar2 - $posPar1 - 1;
                $prenom = substr($libelle, $posPar1 + 1, $lgChaine);
                if ($prenom === false) {
                    return $tabRetour;
                }
                $tabRetour['nom'] = $nom;
                $tabRetour['prenom'] = $prenom;

                return $tabRetour;
            }
        }


    }

    /*
     * récupération de l'id utilisateur 
     * 
     * dans la chaine fournie (avec la chaine parenthésée en fin de chaine)
     * retourne un id
     * ex : en entrée => string = "Dupont Louis (id=1752)"
     *      en sortie => string = 1752
     * $libelle : correspond à la chaine passée
     */

    public static function extractIdUtilisateur($libelle) {
        $chaineExtract = '';

        if ($libelle == '') {
            return $chaineExtract;
        }

        //récupère la chaine avant la parenthese
        $posPar1 = stripos($libelle, '(id=');
        if ($posPar1 === false) {
            return $chaineExtract;
        }
        $posPar1 = $posPar1 + 4;

        $posPar2 = stripos($libelle, ')');
        if ($posPar2 === false) {
            return $chaineExtract;
        }


        //récupération du prénom
        $lgChaine = $posPar2 - $posPar1;
        $id = substr($libelle, $posPar1, $lgChaine);
        if ($id === false) {
            return $chaineExtract;
        }

        $chaineExtract = trim($id);

        return $chaineExtract;
    }

    /**
     * récupération de l'id etablissement 
     * 
     * dans la chaine fournie (avec la chaine parenthésée en fin de chaine)
     * retourne un id
     * ex : en entrée => string = "Dupont Louis (id=1752)"
     *      en sortie => string = 1752
     * $libelle : correspond à la chaine passée
     * @param   string  $libelle    chaine contenant le nom etablissement et id entre paretntehese (ex : monEtab (5) )
     * @return  int     $idRetour   retourne l'id récupéré sinon 0
     */
    public static function extractIdEtablissement($libelle) {
        $idRetour = 0;

        if ($libelle == '') {
            return $idRetour;
        }

        //récupère la chaine avant la parenthese
        $posPar1 = stripos($libelle, '(id=');
        if ($posPar1 === false) {
            return $idRetour;
        }
        $posPar1 = $posPar1 + 4;

        $posPar2 = stripos($libelle, ')');
        if ($posPar2 === false) {
            return $idRetour;
        }


        //récupération de la chaine entre parentheses
        $lgChaine = $posPar2 - $posPar1;
        $id = substr($libelle, $posPar1, $lgChaine);
        if ($id === false) {
            return $idRetour;
        }

        $idRetour = trim($id);

        return $idRetour;
    }

    /**
     * Affiche une URL en vérifiant que http:// est présent
     * Sert pour les champs _url dans les tables.
     * Les gens ne pensent pas toujours à mettre http://.
     */
    public static function make_url($url) {

        $url_temp = "";

        if (strpos($url, "://") === false) {
            $url_temp = "http://" . $url;
        } else {
            $url_temp = $url;
        }

        return $url_temp;
    }

    /**
     * Permet de couper un texte avec un nombre de caractères maximum.
     * Cette fonction coupe le texte avec un espace pas au milieu d'un mot.
     */
    public static function coupe_texte($texte, $nbcaractere) {
        $iwhile = 0;
        $chaine = "";
        $pos_dernier_espace = 0;
        if (strlen($texte) > $nbcaractere) {
            while ($iwhile < $nbcaractere) {
                if (substr($texte, $iwhile, 1) == " ") {
                    $pos_dernier_espace = $iwhile;
                }
                $iwhile++;
            }
        }

        if ($pos_dernier_espace != 0) {
            $chaine = substr($texte, 0, $iwhile) . " ...";
        } elseif (strlen($texte) > $nbcaractere) {
            $chaine = substr($texte, 0, $nbcaractere);
        } else {
            $chaine = $texte;
        }

        return $chaine;
    }

    /**
     * Génére une date
     */
    public static function make_date($annee="", $mois="", $jour="") {
        $date_temp = null;
        if ((trim($annee) != "") && ($annee != "0") && (trim($mois) != "") && ($mois != "0") && (trim($jour) != "") && ($jour != "0")) {
            $date_temp = date("Y-m-d", mktime(0, 0, 0, $mois, $jour, $annee));
        }
        return $date_temp;
    }

    /* fonction qui supprime les accent d'une chaine donnée */

    public static function sans_accent($chaine) {
        $accent = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ";
        $noaccent = "aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby";
        return strtr(trim($chaine), $accent, $noaccent);
    }

    /*     * ********************* */

    /**
     * Permet d'afficher une date.
     * Ex : Lundi 2 décembre 2005 à 20h30
     */
    public static function affiche_date($date=null, $affiche_jour=false, $langue="fr") {
        $affiche_date_temp = "";
        $tab_jour_fr = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
        $tab_mois_fr = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");

        $tab_jour_en = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $tab_mois_en = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        $tab_jour_es = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $tab_mois_es = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $tab_jour_bzh = array("dilun", "dimeurzh", "dimerc&rsquo;her", "diriao", "digwener", "disadorn", "disul");
        $tab_mois_bzh = array("Genver", "c&rsquo;hwevrer", "Meurzh", "Ebrel", "Mae", "Even", "Gouere", "Eost", "Gwengolo", "Here", "Du", "Kerzu");

        if ($date != null) {
            if ($affiche_jour) {
                //$affiche_date_temp .= strftime("%A", mktime(0, 0, 0, intval(substr($date, 5, 2)), substr($date, 8, 2), substr($date, 0, 4)))." ";
                $mois = intval(substr($date, 5, 2));
                if ($langue == "es") {
                    $affiche_date_temp.= $tab_mois_es[$mois - 1] . " " . substr($date, 0, 4) . " ";
                } elseif ($langue == "fr") {
                    $affiche_date_temp.= $tab_mois_fr[$mois - 1] . " " . substr($date, 0, 4) . " ";
                } elseif ($langue == "en") {
                    $affiche_date_temp.= $tab_mois_en[$mois - 1] . " " . substr($date, 0, 4) . " ";
                } elseif ($langue == "bzh") {
                    $affiche_date_temp.= $tab_mois_fr[$mois - 1] . " " . substr($date, 0, 4) . " ";
                }
            }
            $affiche_date_temp .= substr($date, 8, 2) . " ";
            //$affiche_date_temp .= strftime("%B", mktime(0, 0, 0, intval(substr($date, 5, 2)), substr($date, 8, 2), substr($date, 0, 4)))." ".substr($date, 0, 4);
            $mois = intval(substr($date, 5, 2));
            if ($langue == "es") {
                $affiche_date_temp.= $tab_mois_es[$mois - 1] . " " . substr($date, 0, 4) . " ";
            } elseif ($langue == "fr") {
                $affiche_date_temp.= $tab_mois_fr[$mois - 1] . " " . substr($date, 0, 4) . " ";
            } elseif ($langue == "en") {
                $affiche_date_temp.= $tab_mois_en[$mois - 1] . " " . substr($date, 0, 4) . " ";
            } elseif ($langue == "bzh") {
                $affiche_date_temp.= $tab_mois_fr[$mois - 1] . " " . substr($date, 0, 4) . " ";
            }
            if (strlen($date) > 10) {
                $affiche_date_temp.=" à " . substr($date, 11, 5);
            }
        }

        return $affiche_date_temp;
    }

    /**
     * Permet d'afficher une date.
     * Ex : Lundi 2 décembre 2005
     */
    public static function affiche_date_sans($date=null, $affiche_jour=false) {
        $affiche_date_temp = "";
        $tab_jour_fr = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
        $tab_mois_fr = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");

        $tab_jour_en = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $tab_mois_en = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

        $tab_jour_es = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $tab_mois_es = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $tab_jour_bzh = array("dilun", "dimeurzh", "dimerc&rsquo;her", "diriao", "digwener", "disadorn", "disul");
        $tab_mois_bzh = array("Genver", "c&rsquo;hwevrer", "Meurzh", "Ebrel", "Mae", "Even", "Gouere", "Eost", "Gwengolo", "Here", "Du", "Kerzu");

        if ($date != null) {
            if ($affiche_jour) {
                //$affiche_date_temp .= strftime("%A", mktime(0, 0, 0, intval(substr($date, 5, 2)), substr($date, 8, 2), substr($date, 0, 4)))." ";
                $mois = intval(substr($date, 5, 2));
                if ($langue == "es") {
                    $affiche_date_temp.= $tab_mois_es[$mois - 1] . " " . substr($date, 0, 4) . " ";
                } elseif ($langue == "fr") {
                    $affiche_date_temp.= $tab_mois_fr[$mois - 1] . " " . substr($date, 0, 4) . " ";
                } elseif ($langue == "en") {
                    $affiche_date_temp.= $tab_mois_en[$mois - 1] . " " . substr($date, 0, 4) . " ";
                } elseif ($langue == "bzh") {
                    $affiche_date_temp.= $tab_mois_fr[$mois - 1] . " " . substr($date, 0, 4) . " ";
                }
            }
            $affiche_date_temp .= substr($date, 8, 2) . " ";
            //$affiche_date_temp .= strftime("%B", mktime(0, 0, 0, intval(substr($date, 5, 2)), substr($date, 8, 2), substr($date, 0, 4)))." ".substr($date, 0, 4);
            $mois = intval(substr($date, 5, 2));
            if ($langue == "es") {
                $affiche_date_temp.= $tab_mois_es[$mois - 1] . " " . substr($date, 0, 4) . " ";
            } elseif ($langue == "fr") {
                $affiche_date_temp.= $tab_mois_fr[$mois - 1] . " " . substr($date, 0, 4) . " ";
            } elseif ($langue == "en") {
                $affiche_date_temp.= $tab_mois_en[$mois - 1] . " " . substr($date, 0, 4) . " ";
            } elseif ($langue == "bzh") {
                $affiche_date_temp.= $tab_mois_fr[$mois - 1] . " " . substr($date, 0, 4) . " ";
            }
        }

        return $affiche_date_temp;
    }

    /**
     * Permet d'afficher une date.
     * Ex : 02/12/2005
     */
    public static function affiche_date2($date=null) {
        $affiche_date_temp = "";

        if ($date != null) {
            $affiche_date_temp .= substr($date, 8, 2) . "/" . substr($date, 5, 2) . "/" . substr($date, 0, 4);
        }

        return $affiche_date_temp;
    }
    
    /**
     * transfrome une chaine de type hh:mm en time au format H:I:s.
     * Ex : 07:15 => 07:15:00
     */
    public static function transformeEnTime($horaire = null) {
        $affiche_date_temp = '00:00:00';

        if ($horaire != null) {
            $affiche_date_temp = $horaire . ":00" ;
        }

        return date("H:i:s", strtotime($affiche_date_temp));
    }
    
    

    /*
     * méthode de traitement des images
     * 
     */

    /*
     * retaille une photo covoitureur et l'enregistre dans le répertoire
     */

    public static function rezisePhotoEtEnreg($fileImage=null, $id_utilisateur) {
        $affiche_date_temp = "";

        if (is_null($fileImage) || is_null($id_utilisateur)) {
            return FALSE;
        } else {
            $covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($id_utilisateur));
            $filename = $covoitureur->setCheminPhotoCovoitureur();
            $fileImage->save($filename);

            $img = new sfImage($fileImage, 'image/jpg');


            $img->thumbnail(150, 200);
            $img->setQuality(75);
            $img->saveAs($filename);

            //$file->save($filename);
            return TRUE;
        }
    }

    public static function thumbnailPhotoEtEnreg($fileImage=null, $thumbfilename) {
        $affiche_date_temp = "";

        if (is_null($fileImage)) {
            return FALSE;
        } else {
            //$covoitureur = Doctrine_Core::getTable('Covoitureur')->find(array($id_utilisateur));
            //$filename = $covoitureur->setCheminPhotoCovoitureur();
            //$fileImage->save($filename);

            $img = new sfImage($fileImage, 'image/jpg');

            //$chemin = "thumb/".$fileImage
            $img->thumbnail(75, 100);
            $img->setQuality(75);
            $img->saveAs($thumbfilename);

            //$file->save($filename);
            return TRUE;
        }
    }

    /**
     * Fonction permettant de l'envoi des mails
     *
     * @access public
     * @param objet $objet objet en cours($this)
     * @param string $template nom du template mail
     * @param array $params tableau contenant tous les éléments utilisés pour l'envoi du mail($params['subject'],$params['to'],$params['from'], et parametres personalisés )
     * @return void
     */
    public static function envoi_mail($objet, $template, $params, $noreply = true) {

        //$params[""] = sfConfig::get('sf_id_site_client');
        //$params[""] = $tab['societe'];
        $params["urlApplication"] = $_SERVER["SERVER_NAME"];
        

        $message = sfContext::getInstance()->getMailer()->compose();
        $message->setSubject($params['subject']);
        $message->setTo($params['to']);
        $message->setFrom($params['from']);
        if ($noreply) {
            $message->setReplyTo(sfConfig::get('sf_mail_reply_to'));
            $message->setReturnPath(sfConfig::get('sf_mail_return-path'));
        }

        //chargement du helper Partial
        sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');

        //gestion mail html
        $html = $objet->getPartial('mail/' . $template, array('params' => $params));
        $message->setBody($html, 'text/html');

        //gestion mail txt
        $text = $objet->getPartial('mail/' . $template . 'Txt', array('params' => $params));

        sfContext::getInstance()->getMailer()->send($message);
    }
    
    /**
     * Fonction permettant de l'envoi des mails pour les batchs
     *
     * @access public
     * @param objet $objet objet en cours($this)
     * @param string $template nom du template mail
     * @param array $params tableau contenant tous les éléments utilisés pour l'envoi du mail($params['subject'],$params['to'],$params['from'], et parametres personalisés )
     * @return void
     */
    public static function envoiMailBatch($objet,$template, $params) {

        //$params[""] = sfConfig::get('sf_id_site_client');
        //$params[""] = $tab['societe'];
        $params["urlApplication"] = $_SERVER["SERVER_NAME"];



        $message = $objet->getMailer()->compose();
        $message->setSubject($params['subject']);
        $message->setTo($params['to']);
        $message->setFrom($params['from']);
        $message->setReplyTo(sfConfig::get('sf_mail_reply_to'));
        $message->setReturnPath(sfConfig::get('sf_mail_return-path'));

        //chargement du helper Partial
        $objet->getConfiguration()->loadHelpers('Partial');

        //gestion mail html
        $html = get_partial('mail/' . $template, array('params' => $params));
        $message->setBody($html, 'text/html');

        //gestion mail txt
        $text = get_partial('mail/' . $template . 'Txt', array('params' => $params));

        $objet->getMailer()->send($message);
    }

    /**
     * génération de mot de passe aléatoire de longueur passée en argument
     * @access  public
     * @param   string      $size       longueur du mot de passe
     * @return  string      $password   retourne le mot de passe
     */
    public static function genereMotDePasse($size) {

        //initialisation des variables
        $password = '';

        // Initialisation des caractères utilisables
        $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
            "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"
        );
        for ($i = 0; $i < $size; $i++) {
            $password .= ( $i % 2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
        }
        return $password;
    }

    /**
     * transforme et met en majuscule le nom de la ville pour pouvoir etre recupérée
     * dans la table ville en supprimamnt les tiret et en formattant les villes commencant par saint en st
     * @param   string      $nomVille               nom de la ville (récuypérée par googlemap)
     * @return  string      $nomVilleTransforme     retourne le nom de la ville transformé
     */
    public static function transformeEtUpperVille($nomVille) {


        //recuperatioon du nom de la ville formatté (sans tiret et en majuscule
        $outil = new Util();
        $ville = $outil->transformeStringAccent($nomVille);

        //transforme les saint en st
        $ville = $outil->transformeSaintSt($ville);

        //mise en majusculle
        $ville = strtoupper($ville);

        //supprime les tiret
        $ville = str_replace('-', ' ', $ville);

        return $ville;
    }

    /**
     * transforme les caractères accentue en non accentue
     * 
     * @param   string      $chaine                 chaine accentuée
     * @return  string      $chaine                 retourne la chaine sans accent
     */
    public static function transformeStringAccent($chaine) {
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð',
            'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã',
            'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ',
            'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ',
            'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę',
            'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī',
            'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ',
            'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ',
            'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť',
            'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ',
            'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ',
            'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');

        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O',
            'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c',
            'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u',
            'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D',
            'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g',
            'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K',
            'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o',
            'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S',
            's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W',
            'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i',
            'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
        return str_replace($a, $b, $chaine);
    }

    /**
     * transforme les expressions saint en st (pour les villes)
     * 
     * @param   string      $chaine                 chaine de type Saint
     * @return  string      $chaine                 retourne la chaine sous form st
     */
    public static function transformeSaintSt($chaine) {
        $a = array('Saint ', 'Saint-', 'saint ', 'saint-');

        $b = array('St ', 'St-', 'st ', 'st-');

        return str_replace($a, $b, $chaine);
    }

    /*
     * supprime le 0 en debut de code postal
     */
    public static function suppZeroDevantCp($chaine) {
         $chaineRetour = '';

        //verifie la longueur de la chaine (si chaine égale 5 => traitement (un 0 peut etre present en début de chaine)
        // sinon renvoie de la chaine telle qu'elle)
        if(strlen($chaine) == 4){
            $chaineRetour = $chaine;
        } else{
           //transfrome la chaine en tableau
            $arr1 = str_split($chaine);

            //verifie si le premier caractere est un 0
            if($arr1[0] == '0') {
                $chaineRetour = substr($chaine, 1);
            }

        }

        return $chaineRetour ;
    }
}

?>
