<?php

/** Create and returns session token
 *  @return unique token
 *  Token will be saved on session */
function get_form_token($form){
  /** Generate token */
  $unique_token = md5(uniqid(microtime(), true));

  /** Start session if not started */
  if(session_status() == PHP_SESSION_NONE) session_start();

  /** Store form token in session */
  $_SESSION[$form.'_token'] = $unique_token;

  /** Return unique token variable */
  return $unique_token;
}

/** Verify Session Token
 *  @return boolean */
function verify_form_token($form, $form_action){
  /** Check if request method is post and post action is defined */
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])){

    /** Check post action is same as defined */
    if($_POST['action'] == $form_action){

      /** Start session if not started */
      if (session_status() == PHP_SESSION_NONE) session_start();

      /** Check session token and post token is set */
      if(isset($_SESSION[$form.'_token']) && isset($_POST['token'])){

        // if session token matches with post token
        if($_SESSION[$form.'_token'] == $_POST['token']){

          /** Consume token and return true */
          $_SESSION[$form.'_token'] = null;
          return true;
        } else return false;
      } else return false;
    } else return false;
  } else return false;
}


function get_ajax_token($form){
  /** Start session if not started */
  if(session_status() == PHP_SESSION_NONE) session_start();

  /** Try to retrieve token from the session */
  $unique_token = $_SESSION['ajax_'.$form.'_token'];

  if(empty($unique_token)) {
    /** Generate token */
    $unique_token = md5(uniqid(microtime(), true));

    /** Store form token in session */
    $_SESSION['ajax_'.$form.'_token'] = $unique_token;
  }

  /** Return unique token variable */
  return $unique_token;
}


function verify_ajax_token($form, $form_action){
  /** Check if request method is post and post action is defined */
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])){

    /** Check post action is same as defined */
    if($_POST['action'] == $form_action){

      /** Start session if not started */
      if (session_status() == PHP_SESSION_NONE) session_start();

      /** Check session token and post token is set */
      if(isset($_SESSION['ajax_'.$form.'_token']) && isset($_POST['token'])){

        // if session token matches with post token
        if($_SESSION['ajax_'.$form.'_token'] == $_POST['token']){

          /** Consume token and return true */
          // $_SESSION['ajax_'.$form.'_token'] = null;
          return true;
        } else return false;
      } else return false;
    } else return false;
  } else return false;
}
