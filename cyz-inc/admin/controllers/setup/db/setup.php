<?php

/** Include form fields */
require_once(CYZ_LIB.'/form/main.php');

/** Include session token */
require_once(CYZ_LIB.'/security/main.php');

/** Include validator to validate input */
require_once(CYZ_LIB.'/validator/input.php');

/** Include validator to validate character set */
require_once(CYZ_LIB.'/validator/character.php');

/** Include database config-constructor script to setup permanent
 *  Database connection using configuration file "app-config" */
require_once(CYZ_ADMIN_CTRL.'/setup/db/config-constructor.php');

/** Include database script to make DB connection */
require_once(CYZ_COMPONENTS.'/database/base.php');



/** Form Name - Used to identify form*/
$form = 'db_setup_form';

/** Form Action - Used to avoid action conflict */
$form_action = 'db_setup';

/** Store error while processing form */
$form_error = array();

/** Process the POST request submitted using form after
 *  session token verification */
if(verify_form_token($form, $form_action)):


  /** Validate: name of the database */
  $valid = cyz_input_validate('db-name', $_POST['database-name']);
  /** If valid store the database name */
  if($valid[0]) $db_name = $_POST['database-name'];
  /** If not valid then push the error to form error */
  else array_push($form_error, 'Database Name: '.$valid[1]);


  /** Validate: name of the database username */ 
  $valid = cyz_input_validate('username', $_POST['username']);
  /** If valid store the username */
  if($valid[0]) $db_username = $_POST['username'];
  /** If not valid then push the error to form error */
  else array_push($form_error, 'Database Username: '.$valid[1]);


  /** Validate: name of the database password */ 
  $valid = cyz_check_valid_utf8($_POST['password']);
  /** If valid store the database password */
  if($valid) $db_password = $_POST['password'];


  /** Validate: name of the database host */
  $valid = cyz_check_valid_utf8($_POST['db-host']);
  /** If valid store the database host name */
  if($valid) $db_host = $_POST['db-host'];

  
  /** If valid store the database table prefix */
  $valid = cyz_input_validate('db-name', $_POST['tb-prefix']);
  /** If valid store the database table prefix */
  if($valid[0]) $tb_prefix = $_POST['tb-prefix'];
  /** If not valid then push the error to form error */
  else array_push($form_error, 'Database Name: '.$valid[1]);


  /** If all the fields are defined then defined the variables
   *  globally.
   *  DB_HOST: Database host */
  if(!defined('DB_HOST')) define('DB_HOST', $db_host);

  /** DB_NAME: Database name */
  if(!defined('DB_NAME')) define('DB_NAME', $db_name);

  /** DB_USERNAME: Database Username */
  if(!defined('DB_USERNAME')) define('DB_USERNAME', $db_username);

  /** DB_PASSWORD: Database Password */
  if(!defined('DB_PASSWORD')) define('DB_PASSWORD', $db_password);

  /** DB_CHARSET: Database Character set
   *  utf8mb4: default */
  if(!defined('DB_CHARSET')) define('DB_CHARSET', 'utf8mb4');


  /** Connect to
   *  Database using Cyzer Database Test Object */
  $db_obj =  new cyz_db;


  /** if Cyzer Database Test Object is connected successfully
   *  using the provided data by the user,
   *  then save it to the config file */
  if($db_obj->is_connected()){
    $config_file = cyz_create_db_config_file();

    if($config_file['status']){
      /** Redirect to database setup page */
      header("Location: ".get_home_url().'?setup=su');
      exit;
    }
    
    else array_push($form_error, $config_file['description']);
  }
  
  else array_push($form_error, 'Unable to connect! Please check database details');


  /** After testing connection and config file setup
   *  Disconnect the database */
  $db_obj = null;


  /** Return form error */
  if(count($form_error) > 0){
    $error = base64_encode(serialize($form_error));
    
    // Redirect to error instance URL
    header("Location: ".get_home_url().'?setup=error&desc='.$error.'&url=db');
    exit;
  }


/** Close if statement */
endif;
