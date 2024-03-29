<?php

/** Include form fields */
require_once(CYZ_LIB.'/form/main.php');

/** Include session token */
require_once(CYZ_LIB.'/security/main.php');

/** Include validator to validate input */
require_once(CYZ_LIB.'/validator/input.php');

/** Include validator to validate character set */
require_once(CYZ_LIB.'/validator/character.php');


// Create new user session object
$user_session = new cyz_usm('SU', true);

if($user_session->verify_session()){
  // Redirect to SU Panel Dashboard
  header("Location: ".get_home_url().'/su-panel');
  exit;
}


/** Form Name - Used to identify form*/
$form = 'su_login_form';

/** Form Action - Used to avoid action conflict */
$form_action = 'su_login';

/** Store error while processing form */
global $form_error;
$form_error = array();

/** Process the POST request submitted using form after
 *  session token verification */
if(verify_form_token($form, $form_action)):

  /** Validate: name of the database username */ 
  $valid = cyz_input_validate('username', $_POST['username']);
  /** If valid store the username */
  if($valid[0]) $su_username = $_POST['username'];
  /** If not valid then push the error to form error */
  else array_push($form_error, 'Username "'.$valid[1].'"');


  /** Validate: name of the database password */ 
  $valid = cyz_check_valid_utf8($_POST['password']);
  /** If valid store the database password */
  if($valid) $su_password = $_POST['password'];

  
  /** Check for remember me */
  if('yes' == $_POST['remember-me']) $remember_me = true;
  else $remember_me = false;


  /** Return form error */
  if(count((array)($form_error)) > 0) return $form_error;
  
  /** All fields are set */
  else {

    $login_response = $user_session->create_session($su_username, $su_password, $remember_me);

    if($login_response['status']){
      // Redirect to SU Panel
      header("Location: ".get_home_url().'/su-panel');
      exit;
    }

    array_push($form_error, $login_response['description']);    
  }


/** Close if statement */
endif;
