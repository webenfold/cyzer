<?php
/**
 * Name:            Cyzer Starts
 * Version:         1.0.0
 * Description:     Cyzer starts the Cyzer environment or
 *                  takes the user to installation screen
 *                  if Cyzer is not configured. This act
 *                  as a first junction.
 * 
 * @package:        Cyzer Core
 */



/**
 * Defining Execution Start as a  Global Variable
 * 
 * Store the micro time from the moment Cyzer starts. This
 * micro time stamp will be used for performance monitoring
 * and optimization */
$EXE_START = microtime(true);
GLOBAL $EXE_START;



/** Require - Global Path Definitions */
require_once(ABSPATH.'/cyz-inc/routing/cyz-dir.php');



/** Require - URL Modding - to construct request URL */
require_once(CYZ_ROUTE.'/cyz-url-rewrite.php');



/** Re-write Completed - Setting Up App Started Flag */
if(!defined('APP_STARTED')) define('APP_STARTED', true);



/** Start Object buffer */
ob_start();



/** Include URL Fetcher to fetch URLs */
require_once(CYZ_ROUTE.'/cyz-url-fetch.php');



/** Include Templating Engine */
require_once(CYZ_COMPONENTS.'/templating/hooks.php');



/** Check if Cyzer is configured */
if(file_exists(CYZ_CONFIG.'/cyz-config.php') && file_exists(CYZ_CONFIG.'/db-config.php')):


  /** 
   * Check Pre prerequisite
   * Include CYZER Configuration File */
  require_once(CYZ_CONFIG.'/cyz-config.php');


  /** Require - Main Routing File */
  require_once(CYZ_ROUTE.'/cyz-routing.php');


  /** Require Cyzer DB */
  require_once(CYZ_CONFIG.'/db-config.php');


  /** Include database script for DB operation */
  require_once(CYZ_COMPONENTS.'/database/main.php');


  /** Require - shutdown script */
  require_once(CYZ_INC.'/boot/cyz-shutdown.php');


  /** Include Junction PHP to start corresponding CYZER Application Parts */
  require_once(CYZ_ROUTE.'/cyz-junction.php');


/** If Cyzer is not configured */
else:


  /** 
   * If Cyzer is not configured Start Cyzer setup
   * Start Cyzer Framework Installation 
   * 
   * Require Install View */
  require_once(CYZ_VIEWS.'/instances/setup/install.php');


/** End If Statement */
endif;
