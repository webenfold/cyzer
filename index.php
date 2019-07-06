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


/** Loads the Cyzer Application Environment */
require_once(ABSPATH.'/cyz-inc/boot/cyz-start.php');
