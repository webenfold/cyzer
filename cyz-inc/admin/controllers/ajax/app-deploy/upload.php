<?php
/**
 * AJAX Endpoint
 * Cyzer Application Deployment
 *
 * @package Cyzer
 */


/** Include form fields */
require_once(CYZ_LIB.'/form/main.php');

/** Include session token */
require_once(CYZ_LIB.'/security/main.php');

/** Include URL Fetcher to fetch URLs */
require_once(CYZ_LIB.'/file-upload/main.php');


/** Form Name - Used to identify form */
$form = 'app_deployment_form';

/** Form Action - Used to avoid identify form action and avoid conflict */
$form_action = 'app_deployment';

// Stores form status
$form_status = array();
global $form_status;

/** Process the POST request submitted using form after
 *  session token verification */
if(verify_ajax_token($form, $form_action)):

  $cyz_upload = new cyz_upload($_FILES['file']);

  $upload_arg = array(
    'file-type-allowed'  => 'application',
    'extensions-allowed' => 'zip',
    'save-as'            => 'cyz-app',
    'save-location'      => '/cyz-gen/app-deployment/'
  );

  $form_status = $cyz_upload->upload_file($upload_arg);

/** Close if statement */
endif;
