<?php

function backup_core_cyz(){
  $file_operator = new cyz_file_op;

  // backup inc folder
  $result = $file_operator->move_dir(ABSPATH.'/cyz-inc/', ABSPATH.'/cyz-gen/core-backup/');

  if($result['status']) return true;
  else return false;
}

function restore_core_cyz($version = 0){
  
}
