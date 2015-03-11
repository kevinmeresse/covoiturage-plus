<?php

/**
 * EquipageTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class EquipageTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object EquipageTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Equipage');
    }

    //filtrage des Equipages en fonction du site (id_site)
    public function getEquipageSite(Doctrine_Query $q = null) {
        if (is_null($q)) {
            $q = Doctrine_Query::create()
                            ->from('Equipage e');
        }

        $q->andWhere('e.id_site = ?', sfConfig::get('sf_id_site_client'));

        return $q;
    }

    /*
     *
     */
     public function getListeEquipageTrajet($id_trajet = null) {

        $q = Doctrine_Query::create()
                            ->from('Equipage e');


        $q->andWhere('e.id_site = ?', sfConfig::get('sf_id_site_client'));

        return $q;
    }

    /*
     * filtrage des Equipages en fonction du site (id_site) et récupération
     * du nombre de covoitureurs dans le trajet
     */

    public function getEquipageSiteNbCovoitureur(Doctrine_Query $q = null) {

        $q = Doctrine_Query::create()
                        ->select('*, COUNT(et.id_trajet) AS nb_covoitureur,vo.nom_ville AS ville_origine, vd.nom_ville AS ville_dest')
                        ->from('Equipage e')
                        ->leftJoin('e.Trajet et on et.id_equipage=e.id_equipage')
                        ->leftJoin('e.VilleFr vo on vo.code_insee=e.id_ville_origine')
                        ->leftJoin('e.VilleFr vd on vd.code_insee=e.id_ville_destination')
                        ->where('e.id_site = ?', sfConfig::get('sf_id_site_client'))
                        ->andWhere('et.id_site = ?', sfConfig::get('sf_id_site_client'))
                        ->orderBy('e.date_modification DESC')
                        ->groupBy('e.id_equipage');


        return $q;
    }

    /*
     * création d'une requete à partir des éléments du
     * formulaire de recherche 'EquipageRechercheForm'
     * 
     */

    public function getEquipageRecherche($nomEquipage = null, $villeDepart = null, $villeDest = null, $idProfil = null, $covoitureur = null, $action_statut_id = null) {

        $q = Doctrine_Query::create()
                        ->select('*, COUNT(et.id_utilisateur) AS nb_covoitureur,vo.nom_ville AS ville_origine, vd.nom_ville AS ville_dest')
                        ->from('Equipage e')
                        ->leftJoin('e.Trajet et on et.id_equipage=e.id_equipage')
                        ->leftJoin('e.VilleFr vo on vo.code_insee=e.id_ville_origine')
                        ->leftJoin('e.VilleFr vd on vd.code_insee=e.id_ville_destination')
                        ->where('e.id_site = ?', sfConfig::get('sf_id_site_client'))
                        ->andWhere('et.id_site = ?', sfConfig::get('sf_id_site_client'))        
                        ->orderBy('e.date_modification DESC')
                        ->groupBy('e.id_equipage');

        $alias = $q->getRootAlias();

        //recherche sur le statut du trajet
        if ($action_statut_id != '' && $action_statut_id != null) {
            $q->andWhere('et.cp_type_action_statut_id = ?', $action_statut_id);
        }

        //recherche sur le nom de l'équipage
        if ($nomEquipage != '' && $nomEquipage != null) {
            $aliasNomEquipage = '%' . $nomEquipage . '%';
            $q->andWhere($alias . '.nom_equipage LIKE ?', $aliasNomEquipage);
        }

        //recherche sur le le créatuer (FO ou initiales)
        if ($idProfil != '') {
            $q->andWhere($alias . '.id_profil = ?', $idProfil);
        } else {
            //$q->andWhere($alias . '.id_profil = 0');
        }

        //recherche sur la ville de départ
        if ($villeDepart != '') {
            //récupération de la ville pour recherche sur le trajet
            //extraction des infos entre parentheses
            $outil = new Util();

            //ville départ
            $chaine = $outil->extractCpLibelle($villeDepart);
            $depVille = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine);

            // !!! attention au niveau de la table trajet IdDepart correspond au code Insee de la ville !!!
            //$trajets = Doctrine_Core::getTable('Trajet')->findByIdDepart($depVille->getCodeInsee());
            $trajets = Doctrine_Core::getTable('Trajet')->getEquipageListeTrajetVilleDepart($depVille->getCodeInsee());

            $tabTrajet = array();
            //$trajets->cou


            if (count($trajets) != 0) {
                foreach ($trajets as $trajet) {
                    //$tabTrajet[] = $trajet->getIdTrajet();
                    $tabTrajet[] = $trajet->getIdEquipage();
                }
                //$q->andWhere($alias . '.id_trajet IN ?', $tabTrajet);
                $q->andWhere($alias . '.id_equipage IN ?', array($tabTrajet));
            }
        }
        
        //recherche sur la ville de destination
        if ($villeDest != '') {
            //récupération de la ville pour recherche sur le trajet
            //extraction des infos entre parentheses
            $outil = new Util();

            //ville départ
            $chaine = $outil->extractCpLibelle($villeDest);
            $destVille = Doctrine_Core::getTable('VilleFr')->findOneByNomVille($chaine);

            // !!! attention au niveau de la table trajet IdDepart correspond au code Insee de la ville !!!
            //$trajets = Doctrine_Core::getTable('Trajet')->findByIdDepart($depVille->getCodeInsee());
            $trajets = Doctrine_Core::getTable('Trajet')->getEquipageListeTrajetVilleDest($destVille->getCodeInsee());

            $tabTrajet = array();
            //$trajets->cou


            if (count($trajets) != 0) {
                foreach ($trajets as $trajet) {
                    //$tabTrajet[] = $trajet->getIdTrajet();
                    $tabTrajet[] = $trajet->getIdEquipage();
                }
                //$q->andWhere($alias . '.id_trajet IN ?', $tabTrajet);
                $q->andWhere($alias . '.id_equipage IN ?', array($tabTrajet));
            }
        }

        //recherche sur le nom de covoitureur

        if ($covoitureur != '') {
            //récupération du covoitureur 
            //extraction des infos entre parentheses et regeneration du nom et prenom
            $outil = new Util();

            //récupération du nom et prénom
            $nomPrenom = array();
            $nomPrenom = $outil->extractNomPrenom($covoitureur);

            //verification que le prénom est présent
            if ($nomPrenom['prenom'] == '') { //seul le nom est present
                //récupération des id covoitureurs
                $covoitureurs = Doctrine_Core::getTable('Covoitureur')->getNomPrenomCovoitureurSite($nomPrenom['nom'], null);
            } else { //le nom et le prénom sont présents
                //récupération des id covoitureurs
                $covoitureurs = Doctrine_Core::getTable('Covoitureur')->getNomPrenomCovoitureurSite($nomPrenom['nom'], $nomPrenom['prenom']);
            }



            if (count($covoitureurs) != 0) {
                $tabEquipageCovoitureur = array();
                foreach ($covoitureurs as $covoitureur) {
                    $tabEquipageCovoitureur[] = $covoitureur->getIdUtilisateur();
                }
                $q->andWhereIn('et.id_utilisateur', $tabEquipageCovoitureur);
            }
        }



        return $q;
    }

    /*
     * récupération des informations de l'équipage et des trajets associés
     * et des covoitureurs associés
     */

    public function getEquipageTrajetCovoitureur($id_equipage = null) {

        $q = Doctrine_Query::create()
                        ->from('Equipage e')
                        ->leftJoin('e.Trajet et')
                        ->where('e.id_equipage = ?', $id_equipage)
        ;

        return $q->execute();
    }

    //recuperation des statistiques envirronnementales
    // recuperation du nombre de km parcourus en covoiturage
    // et quantité CO2 évitée
    public function getStatCo2Evite($dateDeb = null, $dateFin = null, $etab = null, $groupeStat = null, $communauteCommune = null) {
        //liste dans les etablissement fournis
        if ($etab != null && count($etab) != 0) {
            $qt = Doctrine_Query::create()
            /*
                            ->select('e.id_equipage, count( t.id_trajet ) as nb_trajet, e.date_creation, t.km, t.lundi_etat, t.mardi_etat, t.mercredi_etat, t.jeudi_etat, t.vendredi_etat, t.samedi_etat, t.dimanche_etat ')
                            ->from('Equipage e, Trajet t, Covoitureur c')
                            ->where('e.id_equipage = t.id_equipage')
                            ->andWhere('t.id_utilisateur = c.id_utilisateur')
             *
             */
                            ->select('e.id_equipage, count( t.id_trajet ) as nb_trajet, e.date_creation, tr.km, tr.lundi_etat, tr.mardi_etat, tr.mercredi_etat, tr.jeudi_etat, tr.vendredi_etat, tr.samedi_etat, tr.dimanche_etat ')
                            ->from('Equipage e')
                            ->leftJoin('e.Trajet tr')
                            ->innerJoin('e.Trajet t ON e.id_equipage = t.id_equipage')
                            ->innerJoin('t.Covoitureur c ON t.id_utilisateur = c.id_utilisateur')
            ;
        } else {
            $qt = Doctrine_Query::create()
                            //->select('e.id_equipage, count( t.id_trajet ) as nb_trajet, e.date_creation, t.km, t.lundi_etat, t.mardi_etat, t.mercredi_etat, t.jeudi_etat, t.vendredi_etat, t.samedi_etat, t.dimanche_etat ')
                            //->select('e.id_equipage, count( t.id_trajet ) as nb_trajet, e.date_creation, tr.km, t.id_equipage ')
                            //->from(' Trajet t, Equipage e')
                            //->leftJoin('e.Trajet tr')
                            //->where('t.id_equipage = e.id_equipage');
                            ->select('e.id_equipage, count( t.id_trajet ) as nb_trajet, e.date_creation, tr.km, tr.lundi_etat, tr.mardi_etat, tr.mercredi_etat, tr.jeudi_etat, tr.vendredi_etat, tr.samedi_etat, tr.dimanche_etat ')
                            ->from('  Equipage e')
                            ->leftJoin('e.Trajet tr')
                            ->innerJoin('e.Trajet t ON e.id_equipage = t.id_equipage')

            //->where('t.id_equipage = e.id_equipage')

            ;
        }

        //$qt->andWhere('jour_unique_date <> \'0000-00-00 00:00:00\'');
        //$qt->andWhere('depart_latitude IS NOT NULL OR depart_longitude IS NOT NULL OR destination_latitude IS NOT NULL OR destination_longitude IS NOT NULL');
        $qt->andWhere('e.etat = 1 ');
        $qt->andWhere('e.id_site = ?', sfConfig::get('sf_id_site_client'));

        //gestion des parametres de filtre passé par le formulaire
        if ($dateDeb != null && $dateFin != null) {
            $qt->andWhere('e.date_creation BETWEEN ? AND ?', array($dateDeb, $dateFin));
        } elseif ($dateDeb != null) {
            $qt->andWhere('e.date_creation >= ? ', array($dateDeb));
        } elseif ($dateFin != null) {
            $qt->andWhere('e.date_creation <= ? ', array($dateFin));
        }

        //liste dans les etablissement fournis
        if ($etab != null && count($etab) != 0) {
            $qt->andWhereIn('c.cp_etablissement_id', $etab);
        }

        //liste dans les villes fournies (par groupe_stat)
        if ($groupeStat != null && count($groupeStat) != 0) {
            //$qt->andWhereIn('t.id_depart', $groupeStat);
            $qt->andWhere('tr.id_depart IN ? OR tr.id_destination IN ? ', array($groupeStat, $groupeStat));
        }

        //liste dans les villes fournies (par communaute de communes)
        if ($communauteCommune != null && count($communauteCommune) != 0) {
            //$qt->andWhereIn('t.id_depart', $groupeStat);
            $qt->andWhere('tr.id_depart IN ? OR tr.id_destination IN ? ', array($communauteCommune, $communauteCommune));
        }

        $qt->groupBy('e.id_equipage');


        //$equipages = $qt->fetchArray();

        $equipages = $qt->execute();

        $tabTrajetCo2 = array();

        //initialisation des valeurs de comptage partielle
        $km_part = 0;
        $compt_trajet_part = 0;
        $km_evite = 0;

        //initialisation du compteur totale (de km)
        $compt_total_km = 0;

        //initialisation du compteur total de kilometres evités
        $km_evite_total = 0;

        //kilo de co2 evite
        $nb_co2_evite = 0;

        //kilo de co2 genere sur parcours realise
        $nb_co2_genere = 0;

        foreach ($equipages as $equipage) {
            //initialisation des compteurs annees et semaines
            $compt_an = 0;
            $compt_semaine = 0;

            //valeur des numeros de semaine et des annees pour les dates
            $num_an_init = 0;
            $num_semaine_init = 0;

            $num_semaine_fin = 0;
            $num_an_fin = 0;

            $km_part = 0;

            //gestion des dates => il faut récupérer le nombre de semaines dans la période
            //grace au filtre de la requete, on sait que la date de creation sera toujours > à la date_deb
            // donc on teste uniquement sur la date_fin
            if ($dateFin != null) {
                $num_an_fin = date("Y", strtotime($dateFin));
                $num_semaine_fin = date("W", strtotime($dateFin));

                $num_an_init = date("Y", strtotime($equipage->getDateCreation()));
                $num_semaine_init = date("W", strtotime($equipage->getDateCreation()));

                //calcul du nombre de semaine separant les deux dates en prenant en compte les annees différentes
                $compt_semaine = ($num_semaine_fin - $num_semaine_init) + ( ($num_an_fin - $num_an_init) * 52);
            } else { // calcul pour la date courante
                $num_an_fin = date("Y");
                $num_semaine_fin = date("W");

                $num_an_init = date("Y", strtotime($equipage->getDateCreation()));
                $num_semaine_init = date("W", strtotime($equipage->getDateCreation()));

                //calcul du nombre de semaine separant les deux dates en prenant en compte les annees différentes
                $compt_semaine = ($num_semaine_fin - $num_semaine_init) + ( ($num_an_fin - $num_an_init) * 52);
            }

            //recuperation du nombre de jour de covoiturage dans la semaine
            $compt_jour = 0;
            if ($equipage->getTrajet()) {
                if ($equipage->getTrajet()->getLundiEtat() == 1) {
                    $compt_jour++;
                };
                if ($equipage->getTrajet()->getMardiEtat() == 1) {
                    $compt_jour++;
                };
                if ($equipage->getTrajet()->getMercrediEtat() == 1) {
                    $compt_jour++;
                };
                if ($equipage->getTrajet()->getJeudiEtat() == 1) {
                    $compt_jour++;
                };
                if ($equipage->getTrajet()->getVendrediEtat() == 1) {
                    $compt_jour++;
                };
                if ($equipage->getTrajet()->getSamediEtat() == 1) {
                    $compt_jour++;
                };
                if ($equipage->getTrajet()->getDimancheEtat() == 1) {
                    $compt_jour++;
                };

                $km_part = $equipage->getTrajet()->getKm() * 2 * $compt_jour * $compt_semaine;
            }


            //le calcul du nombre de kilometre parcouru tient compte
            //  de l'aller et retour (puisque ce sont des trajets réguliers
            //  du nombre de jours dans la semaine ou le trajet est réalisé
            //$km_part = $equipage->getTrajet()->getKm() * 2 * $compt_jour * $compt_semaine;
            //le calcul du nombre de kilometre evite tient compte du kilometrage parcouru * le nombre de covoitureurs - 1
            $km_evite = $km_part * ($equipage->getNbTrajet() - 1);

            // $compt_trajet_part = $trajet->getNbTrajet();
            $compt_total_km += $km_part;

            $km_evite_total += $km_evite;
        }

        //calcul du nombre de kilo de CO2 evite
        $nb_co2_evite = $km_evite_total * sfConfig::get('app_ademe_co2');

        //calcul du nombre de kilo de CO2 genere
        $nb_co2_genere = $compt_total_km * sfConfig::get('app_ademe_co2');


        $tabTrajetCo2['compt_total_covoit'] = $compt_total_km;
        $tabTrajetCo2['nb_co2_evite'] = $nb_co2_evite / 1000;
        $tabTrajetCo2['nb_co2_genere'] = $nb_co2_genere / 1000;

        return $tabTrajetCo2;
    }

}