<?php


/** 
 * Include USM script for
 * User Session Management */
cyz_lib('/usm/main.php');
/** 
 * Include file management script for
 * file management operation */
cyz_lib('/file-op/file-op.php');
/** 
 * Include CLI CMD script for
 * command line execution */
cyz_lib('/cmd/main.php');


require_once(CYZ_COMPONENTS.'/sandbox/main.php');


// Cyzer Main Computation File
require_once(CYZ_COMPONENTS.'/core/functions/compute.php');

// Cyzer Base 64 Modified
require_once(CYZ_COMPONENTS.'/base64.mod.php');

// Cyzer Update Functionality
require_once(CYZ_COMPONENTS.'/update/main.php');

// Cyzer Maintenance Page
require_once(CYZ_COMPONENTS.'/maintenance/main.php');
