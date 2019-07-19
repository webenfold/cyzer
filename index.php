<?php
/**
 * Name:            Index PHP
 * Version:         1.0.0
 * Description:     All the traffic handled through here.
 *                  It doesn't do anything, but loads up
 *                  the application
 * 
 * @package:        Cyzer Core
 */



 /** Define ABSPATH as this file's directory */
if(!defined('ABSPATH')) define('ABSPATH', dirname(__FILE__));



/**
 * Cyzer Framework Version Identifier * 
 * 
 * Purpose:   Defining Global Variable CYZ_VERSION
 *            with the version number */
if(!defined('CYZ_VERSION')) define('CYZ_VERSION', '1.0.0');



/** Loads the Cyzer Application Environment */
require_once(ABSPATH.'/cyz-inc/boot/cyz-start.php');
