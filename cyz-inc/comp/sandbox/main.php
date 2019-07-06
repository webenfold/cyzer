<?php

function initiate_update_app_sandbox(){
  $file_op = new cyz_file_operator;

  $file_op->copy_file('/cyz-inc/comp/sandbox/update.app.php', '/update.php');

  // sleep(20);

  // echo ' File Created ';

  // shell_exec('php update.php > /dev/null 2>/dev/null &');

  // Get the query string separately and redirect to new URL
  // Start PHP Session

  header("Location: ".get_home_url().'update.php');
  exit;
}
