<?php


/** Include URL Fetcher to fetch URLs */
include_once(CYZ_LIB.'/file-op/file-op.php');


/** Get Config File Content */
function cyz_get_db_config_file_content(){
  /** Formatting Variable */
  $nl   = "\r\n";
  $nls  = "\r\n ";
  $ss   = " ";

  /** Config File content as a string */
  $config_comment = "/**$nls* The Database configuration file for Cyzer$nls*$nls* @link https://cyzer.io/db-setup/$nls* @package Cyzer_app$nls*/$nl$nl$nl";
  $config_content = "/**$nls* [FLAG: DB_SETUP]$nls*$nls* MySQL settings - You can get this info from your web host.$nls* Change the details below to modify DB details.$nls*";

  /** Database Name */
  $config_content .= "$nls* MySQL database name */$nl"."define('DB_NAME', '".DB_NAME."');$nl";

  /** Database Username */
  $config_content .= "/** MySQL database user name */$nl"."define('DB_USERNAME', '".DB_USERNAME."');$nl";

  /** Database Username */
  $config_content .= "/** MySQL database password */$nl"."define('DB_PASSWORD', '".DB_PASSWORD."');$nl";

  /** Database Host Name */
  $config_content .= "/** MySQL database hostname */$nl"."define('DB_HOST', '".DB_HOST."');$nl";

  /** Database Characterset */
  $config_content .= "/** MySQL Database Charset to use in creating database tables. */$nl"."define('DB_CHARSET', '".DB_CHARSET."');$nl";

  /** Return database content */
  return '<?php'.$nl .$config_comment.$config_content;
}


function cyz_create_db_config_file(){
  // Get htaccess dynamic content
  $config_content = cyz_get_db_config_file_content();

  /** Directory where apache htaccess resides */
  $config_dir = '/cyz-gen/';

  // Create Directory if does not exists
  if(!is_dir(ABSPATH.$config_dir)) mkdir(ABSPATH.$config_dir);

  /** Directory where apache htaccess resides */
  $config_dir = '/cyz-gen/config/';

  // Create Directory if does not exists
  if(!is_dir(ABSPATH.$config_dir)) mkdir(ABSPATH.$config_dir);

  /** Directory where apache htaccess Filename */
  $config_filename = 'db-config.php';

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
    'description' => 'success'
  ];

  /** Error updating Htaccess file */
  else return [
    'status' => false,
    'description' => 'Please delete old config file.'
  ];
}
