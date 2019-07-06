<?php


/** Include URL Fetcher to fetch URLs */
include_once(CYZ_LIB.'/file-management/main.php');


/** Get Config File Content */
function cyz_get_su_config_file_content($su_slug = 'su-panel'){
  /** Formatting Variable */
  $nl   = "\r\n";
  $nls  = "\r\n ";
  $ss   = " ";

  /** Config File content as a string */
  $config_comment = "/**$nls* The Super User Configuration$nls*$nls* @link https://cyzer.io/db-setup/$nls* @package Cyzer_app$nls*/$nl$nl$nl";
  $config_content = "/**$nls* SU Session Management$nls*$nls* Enable/disable session management$nls* options for Superusers.$nls*";

  /** Unique Session */
  $config_content .= "$nls* Enable Unique Session */$nl"."define('SU_UNIQUE_ACTIVE_SESSION', TRUE);$nl";

  /** IP Validation */
  $config_content .= "$nls/** Enable IP Validation */$nl"."define('SU_IP_VALIDATION', TRUE);$nl";

  /** Return database content */
  return '<?php'.$nl .$config_comment.$config_content;
}

function cyz_create_su_config_file(){
  // Get htaccess dynamic content
  $config_content = cyz_get_su_config_file_content();

  /** Directory where apache htaccess resides */
  $config_dir = '/cyz-gen/';

  // Create Directory if does not exists
  if(!is_dir(ABSPATH.$config_dir)) mkdir(ABSPATH.$config_dir);

  /** Directory where apache htaccess resides */
  $config_dir = '/cyz-gen/config/';

  // Create Directory if does not exists
  if(!is_dir(ABSPATH.$config_dir)) mkdir(ABSPATH.$config_dir);

  /** Directory where apache htaccess Filename */
  $config_filename = 'su-config.php';

  /** File Operator Object */
  $file_worker = new cyz_file_operator();

  /** Check write permission */
  $is_dir_writeable = $file_worker->has_write_permission($config_dir);

  /** Check if directory is writeable */
  if(!$is_dir_writeable['status']) return [
    'status' => false,
    'description' => 'Application directory not writable.'
  ];
  
  /** Create new/update htaccess file */
  $config_file_updated = $file_worker->cyz_update_file(
    $config_dir,        // Apache htaccess Default Location
    $config_filename,   // Htaccess file name
    $config_content     // Htaccess content
  );

  /** Htaccess file has been updated */
  if($config_file_updated['status']) return [
    'status' => true,
    'description' => ''
  ];

  /** Error updating Htaccess file */
  else return [
    'status' => false,
    'description' => 'Please delete old config file.'
  ];
}
