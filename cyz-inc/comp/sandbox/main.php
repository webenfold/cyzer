<?php

function initiate_update_app_sandbox(){
  $file_op = new cyz_file_op;

  $file_op->copy_file('/cyz-inc/comp/sandbox/update.app.php', '/update.php');

  // sleep(20);

  // echo ' File Created ';

  // var_dump(shell_exec('php  update.app.php > /dev/null 2>/dev/null &'));

  // echo ABSPATH.'/update.php';
  // echo '<hr>';
  // echo $_SERVER['DOCUMENT_ROOT'];

  // chdir($_SERVER['DOCUMENT_ROOT']);

  // var_dump(exec("cd ..; cd ..; cd ..; php update.php"));
  // var_dump(exec("php update.php"));

  // chdir(getcwd());

  // This function can be used to check disabled functions of PHP
  // function exec_enabled() {
  //   $disabled = explode(',', ini_get('disable_functions'));
  //   return !in_array('exec', $disabled);
  // }

  // Get the query string separately and redirect to new URL
  // Start PHP Session

  header("Location: ".get_home_url().'update.php');
  exit;
}
