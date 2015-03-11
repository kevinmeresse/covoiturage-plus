<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2012/10/11 19:05:43
sfConfig::add(array(
  'sf_error_404_module' => 'accueil',
  'sf_error_404_action' => 'error404',
  'sf_login_module' => 'default',
  'sf_login_action' => 'login',
  'sf_secure_module' => 'default',
  'sf_secure_action' => 'secure',
  'sf_module_disabled_module' => 'default',
  'sf_module_disabled_action' => 'disabled',
  'sf_unavailable_module' => 'maintenance',
  'sf_unavailable_action' => 'unavailable',
  'sf_use_database' => true,
  'sf_i18n' => true,
  'sf_compressed' => false,
  'sf_check_lock' => false,
  'sf_csrf_secret' => 'ab4f84041865d045f560b8314329f43e2594cc03',
  'sf_escaping_strategy' => true,
  'sf_escaping_method' => 'ESC_SPECIALCHARS',
  'sf_no_script_name' => false,
  'sf_cache' => false,
  'sf_etag' => false,
  'sf_web_debug' => false,
  'sf_error_reporting' => 341,
  'sf_file_link_format' => NULL,
  'sf_admin_web_dir' => '/sf/sf_admin',
  'sf_web_debug_web_dir' => '/sf/sf_web_debug',
  'sf_standard_helpers' => array (
  0 => 'Partial',
  1 => 'Cache',
  2 => 'I18N',
),
  'sf_enabled_modules' => array (
  0 => 'default',
),
  'sf_charset' => 'utf-8',
  'sf_logging_enabled' => true,
  'sf_default_culture' => 'fr_FR',
  'sf_jquery_web_dir' => '/sfJqueryReloadedPlugin',
  'sf_jquery_core' => 'jquery-1.4.2.min.js',
  'sf_jquery_ui' => 'jquery-ui-1.7.3.custom.min.js',
  'sf_jquery_autocomplete' => 'jquery.autocomplete.min.js',
  'sf_jquery_path' => NULL,
  'sf_jquery_plugin_paths' => NULL,
  'sf_organization_name' => 'Covoiturage+',
  'sf_site_name' => 'www.covoiturage.asso.fr',
  'sf_extension_fichier_image' => '.jpg',
  'sf_web_dir' => '/home/www/v3/covoiturage-plus/web',
  'sf_rep_commun_photo_covoitureur' => '/images/photos/',
  'sf_rep_ini_photo_covoitureur' => '/images/photos/',
  'sf_rep_thumb_photo_covoitureur' => '/images/photos/thumb/',
  'sf_rep_thumb_photo_covoitureur_spl' => '/images/photos/thumb/',
  'sf_photo_covoitureur_prefixe' => 'photo_covoitureur_',
  'sf_thumb_covoitureur_prefixe' => 'thumb_covoitureur_',
  'sf_rep_commun_photo_actualite' => '/images/actu/',
  'sf_rep_ini_photo_actualite' => '/images/actu/',
  'sf_rep_thumb_photo_actualite' => '/images/actu/thumb/',
  'sf_rep_thumb_photo_actualite_spl' => '/images/actu/thumb/',
  'sf_photo_actualite_prefixe' => 'photo_actualite_',
  'sf_thumb_actualite_prefixe' => 'thumb_actualite_',
  'sf_mail_cp_contact_trajet' => 'covoiturageplus@covoiturage.asso.fr',
  'sf_mail_contact_site' => 'covoiturageplus@covoiturage.asso.fr',
  'sf_tel_contact_site' => '02 99 35 10 77',
  'sf_mail_envoi' => 'covoiturageplus@covoiturage.asso.fr',
  'sf_mail_reply_to' => 'noreply@covoiturage.asso.fr',
  'sf_mail_return-path' => 'noreply@covoiturage.asso.fr',
  'sf_desc_ind__mer_0' => 'initialisée',
  'sf_desc_ind__mer_0_val' => 0,
  'sf_desc_ind__mer_1' => 'validée',
  'sf_desc_ind__mer_1_val' => 1,
  'sf_desc_ind__mer_2' => 'refusée',
  'sf_desc_ind__mer_2_val' => 2,
  'sf_desc_ind__mer_4' => 'sans réponse',
  'sf_desc_ind__mer_4_val' => 4,
  'sf_desc_ind__mer_5' => 'annulée par dépositaire trajet',
  'sf_desc_ind__mer_5_val' => 5,
  'sf_desc_ind__mer_6' => 'annulée par demandeur MER',
  'sf_desc_ind__mer_6_val' => 6,
  'sf_desc_ind__mer_7' => 'équipagée',
  'sf_desc_ind__mer_7_val' => 7,
  'sf_id_defaut_etab' => 14822,
  'sf_message_action_realise' => 'votre action a été enregistrée',
  'sf_message_action_annule' => 'action precedente annulée',
  'sf_message_action_pas_action' => 'aucune action sélectionnée',
  'sf_available' => 'off',
  'sf_url_site' => 'http://www.covoiturage.asso.fr',
  'sf_id_site_client' => 244,
  'sf_id_site_peugeot' => 201,
  'sf_id_etablissement_psa_RS' => 20000,
  'sf_id_lieu_evnmt' => 94,
  'sf_id_lieu_lieu' => 94,
  'sf_id_lieu_zi' => 93,
  'sf_id_lieu_aire' => 92,
  'sf_id_fo_profil' => 5,
  'sf_batch_suivi_mer_nb_jour' => 15,
  'sf_batch_suivi_mer_user' => 0,
  'sf_batch_suivi_mer_type_action' => 0,
  'sf_batch_suivi_mer_objet' => 'suivi de votre demande de mise en relation',
  'sf_batch_suivi_mer_action_detail' => 'batch - envoi mail de suivi demande de mise en relation',
  'sf_batch_suivi_mer_type_prov' => 2,
  'sf_batch_alerte_trajet_objet' => 'alerte sur trajet depose ou modifie',
  'sf_batch_alerte_trajet_action_detail' => 'batch - envoi mail sur alerte sur trajet depose ou modifie',
  'sf_batch_alerte_trajet_type_prov' => 3,
  'sf_batch_alerte_trajet_supp_objet' => 'alerte sur trajet supprime',
  'sf_batch_alerte_trajet_supp_action_detail' => 'batch - envoi mail sur alerte sur trajet supprime',
  'sf_batch_alerte_trajet_supp_type_prov' => 4,
));