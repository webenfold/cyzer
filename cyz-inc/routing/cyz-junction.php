<?php
/**
 * Name:            Cyzer Redirect Junction
 * Description:     Separating URL for su panel and application
 *
 * @package:        Cyzer Core
 */


// Get Slug Array From Request URI
$slug_array_raw = explode('/', get_current_slug());


// Create Blank Slug Array
$slug_array = array();


// ReCreate Slug Array using For Loop
foreach($slug_array_raw as $val){
	if($val) array_push($slug_array, $val);
}


// Define Slug Array
if(!defined('SLUG_ARRAY')) define('SLUG_ARRAY', $slug_array);


// Load App Start
if(empty($slug_array[0]) || SU_SLUG != $slug_array[0]) {

	/** Check if Cyzer DB is configured */
	if(file_exists(CYZ_APP)) require_once(CYZ_INC.'/boot/start-app.php');

	else {
		/** Show No App Page */
    require_once(CYZ_VIEWS.'/utils/no-app.php');
	}
}


// Load SU Panel Start
elseif(SU_SLUG == $slug_array[0]) require_once(CYZ_INC.'/boot/start-su-panel.php');
