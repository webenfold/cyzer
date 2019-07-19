<?php


/** Include URL Fetcher to fetch URLs */
include_once(CYZ_LIB.'/file-op/file-op.php');


/** Get Config File Content */
function cyz_get_cyz_config_file_content($su_slug = 'su-panel'){
  /** Formatting Variable */
  $nl   = "\r\n";
  $nls  = "\r\n ";
  $ss   = " ";

  /** Config File content as a string */
  $config_comment = "/**$nls* Cyzer Superuser Panel URL configuration$nls*$nls* @link https://cyzer.io/db-setup/$nls* @package Cyzer_app$nls*/$nl$nl$nl";
  $config_content = "/**$nls* Before changing the Superuser Panel slug$nls*$nls* do check compatibility with any other third party$nls* modules or apps.$nls*";

  /** Database Name */
  $config_content .= "$nls* SU URL Slug */$nl"."define('SU_SLUG', '".$su_slug."');$nl";

  /** Return database content */
  return '<?php'.$nl .$config_comment.$config_content;
}

function cyz_create_cyz_config_file(){
  // Get htaccess dynamic content
  $config_content = cyz_get_cyz_config_file_content();

  /** Directory where apache htaccess resides */
  $config_dir = '/cyz-gen/';

  // Create Directory if does not exists
  if(!is_dir(ABSPATH.$config_dir)) mkdir(ABSPATH.$config_dir);

  /** Directory where apache htaccess resides */
  $config_dir = '/cyz-gen/config/';

  // Create Directory if does not exists
  if(!is_dir(ABSPATH.$config_dir)) mkdir(ABSPATH.$config_dir);

  /** Directory where apache htaccess Filename */
  $config_filename = 'cyz-config.php';

  /** File Operator Object */
  $file_worker = new cyz_file_op();

  /** Check write permission */
  $is_dir_writeable = $file_worker->writeable($config_dir);

  /** Check if directory is writeable */
  if(!$is_dir_writeable['status']) return [
    'status' => false,
    'description' => 'Application directory not writable.'
  ];
  
  /** Create new/update htaccess file */
  $config_file_updated = $file_worker->update_file(
    $config_dir.$config_filename,
    $config_content
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
