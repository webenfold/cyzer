<?php

ignore_user_abort(true);

// 300 seconds = 5 minutes
ini_set('max_execution_time', 300);

// 	256M
ini_set('memory_limit', '256M');


/** Define ABSPATH as this file's directory */
if(!defined('ABSPATH')) define('ABSPATH', dirname(__FILE__));

require_once ABSPATH.'/cyz-inc/comp/maintenance/main.php';
require_once ABSPATH.'/cyz-inc/lib/file-op/file-op.php';

enable_maintenance();

$file_op = new cyz_file_op;

$dir = ABSPATH.'/cyz-inc/';

$result = $file_op->delete_dir($dir);

if($result['status']){

  $zip = new ZipArchive;

  $res = $zip->open(ABSPATH.'/cyz-gen/updates/cyzer.zip');

  if ($res === TRUE) {
    $zip->extractTo(ABSPATH.'/');
    $zip->close();

    // Success
  } else {
    
    // Error
  }
}

disable_maintenance();

unlink(ABSPATH.'/update.php');
exit;
