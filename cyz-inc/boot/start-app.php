<?php
/**
 * Name:            Cyzer App Start
 * Version:         1.0.0
 * Description:     This is the app startup file. It is
 *                  responsible to start Cyzer Application.
 * 
 * @package:        Cyzer Core
 */




/** 
 * Check if App Main Functions File
 * Exits. Include it if it does. */
if(file_exists(CYZ_APP.'/controllers/functions.php')){
  require_once(CYZ_APP.'/controllers/functions.php');
}




/** 
 * Check if App Routing File
 * Exits. Include it if it does. */
if(file_exists(CYZ_APP.'/controllers/routing.php')){
  require_once(CYZ_APP.'/controllers/routing.php');
}
