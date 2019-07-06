<?php
/**
 * Name:            Cyzer App Start
 * Version:         1.0.0
 * Description:     This is the SU Panel startup file.
 *                  It is responsible to start Cyzer
 *                  Super User Panel.
 * 
 * @package:        Cyzer Core
 */



/** Initialize With Libraries and Components */
require_once(CYZ_ADMIN_CTRL.'/libraries.php');



/** Include app DB main library */
require_once(CYZ_COMPONENTS.'/core/includes/app.db.php');



/** Integrate Application With Cyzer */
require_once(CYZ_COMPONENTS.'/integration/app/main.php');



/** Integrate Application With Cyzer */
require_once(CYZ_ADMIN_CTRL.'/render/nav.php');



/** Get Admin Routing */
require_once(CYZ_ADMIN_CTRL.'/routing.php');
