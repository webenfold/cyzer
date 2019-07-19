<?php
/**
 * Name:            Cyzer URL Fetch
 * Description:     This fetches Most Used URLs
 * 
 * @package:        Cyzer Core
 */



/** 
 * Setting HOME URL
 * 
 * Run this IF Statement - If home URL 
 * is not set or not defined */
if(!defined('HOME_URL')){



  /** Defining local home url variable */
  $home_url = '';



  /** Get directory of this executing file */
  $dir = __DIR__;



  /**
   * Get Current directory and change backward slash 
   * to forward slash */
  $dir_uri = str_replace('\\', '/', realpath($dir));



  /** 
   * Get the current domain from Global Current
   * Domain Variable */
  $domain = CURR_DOMAIN;



  /** Get currently executing directory */
  $doc_root = rtrim($_SERVER['DOCUMENT_ROOT'].'/', '/').'/';



  /**
   * Combine domain with document root
   * to create absolute path
   * 
   * Execution: substr('.../dir/cyz-inc/comp/routing', (strlen(.../dir/) - 1));
   * Result:    https://cyzer.io/cyz-inc/comp/routing */
  $domain .= substr($dir_uri, (strlen($doc_root) - 1));



  /** Removing extra sub directories */
  $path_array = array_reverse(explode('/', $domain));
  $path_array = array_reverse(array_slice($path_array, 2));



  /** Creating final home URL */
  foreach($path_array as $slug) $home_url .= $slug.'/';



  /** Removing trailing forward slash */
  $home_url = rtrim($home_url, '/');



  /** Define home URL */
  define('HOME_URL', $home_url);
}




/**
 * Function Get Home URL
 * 
 * @return
 *    -> URL as a String
 *    -> False - Incase HOME_URL is not set*/
function get_home_url(){
  if(defined('HOME_URL')) return HOME_URL;
  return false;
}



/**
 * Function Get Current URL
 * 
 * @return
 *    -> URL as a String
 *    -> False - Incase HOME_URL and REQUEST_URI is not set*/
function get_current_url(){
  return CURR_DOMAIN.REQUEST_URI;
}




function get_current_slug(){
  $home_url = get_home_url();


  $current_url = get_current_url();


  return str_replace($home_url, '', $current_url);
}




/**
 * Function Get Super User Panel URL
 * 
 * @return
 *    -> URL as a String
 *    -> False - Incase HOME_URL and SU_SLUG is not set*/
function get_su_panel_url(){
  if(defined('HOME_URL') && defined('SU_SLUG')) return HOME_URL.'/'.SU_SLUG;
  return false;
}



/**
 * Function Get Admin Assets Directory URL
 * 
 * @return
 *    -> URL as a String
 *    -> False - Incase HOME_URL is not set*/
function get_admin_assets_dir_url(){
  if(defined('HOME_URL')) return HOME_URL.'/cyz-inc/admin/assets';
  return false;
}



/**
 * Function Get App Assets Directory URL
 * 
 * @param
 *    -> Folder name where assets directory is stored
 * 
 * @return
 *    -> URL as a String
 *    -> False - Incase HOME_URL is not set*/
function get_app_assets_dir_url($folder_name = null){
  /** 
   * If folder name is set - return assets dir URL
   * which is inside that folder. */
  if(!empty($folder_name) && is_dir(CYZ_APP.'/'.$folder_name))
  return get_home_url().'/cyz-app'.$folder_name;
  /** 
   * If folder name is not set - return default assets
   * dir URL. */
  return get_home_url().'/cyz-app/assets';
}
