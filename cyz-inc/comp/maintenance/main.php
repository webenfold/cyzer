<?php

function enable_maintenance(){
  $file_op = new cyz_file_operator;

  // Backup index.php
  $backup = $file_op->copy_file('/index.php', '/cyz-gen/backup/index.php.back');

  if(false === $backup['status']) return false;

  $copy = $file_op->copy_file('/cyz-inc/admin/views/utils/maintenance.php', '/index.php');

  if(false === $copy['status']) return false;

  return true;
}

function disable_maintenance(){
  $file_op = new cyz_file_operator;

  // Backup index.php
  $copy = $file_op->copy_file('/cyz-gen/backup/index.php.back', '/index.php');

  if(false === $copy['status']) return false;

  $delete = $file_op->delete_file('/cyz-gen/backup/index.php.back');

  return true;
}
