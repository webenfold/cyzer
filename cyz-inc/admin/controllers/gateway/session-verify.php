<?php


// Create new user session object
$user_session = new cyz_usm('SU', true);

// var_dump($user_session->verify_session());


/** 
 *  If verification fails
 *  Logout User and redirect it to Login Page */
if(false === $user_session->verify_session()) $user_session->logout('/su-panel/login');
