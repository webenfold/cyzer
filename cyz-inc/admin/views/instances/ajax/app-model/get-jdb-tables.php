<?php


require_once(CYZ_LIB.'/jdb/JDB.php');


// Create new user session object
$user_session = new cyz_usm('SU', true);


/** 
 *  If verification fails
 *  Logout User and redirect it to Login Page */
if(false === $user_session->verify_session()) {
  echo json_encode(array(
    'status'      => 'failed',
    'response'    => null,
    'description' => 'Authentication Failed'
  ));
}


if('get-db-names' == $_POST['action']){
  $jdb = new CYZ_JDB(CYZ_GEN.'/jdb/');


  // Get DB
  $db_names = $jdb->get_db_names();


  echo json_encode(array(
    'status'      => 'success',
    'response'    => $db_names,
    'description' => 'Database names fetched'
  ));
}
