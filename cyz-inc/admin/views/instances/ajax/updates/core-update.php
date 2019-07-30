<?php

ignore_user_abort(true);

/** Include URL Fetcher to fetch URLs */
require_once(CYZ_COMPONENTS.'/update/main.php');

function echo_error($desc){
  echo json_encode(array(
    'status'        => 'failed',
    'description'   => $desc
  ));

  exit;
}


function echo_result($desc, $result){
  echo json_encode(array(
    'status'        => 'success',
    'description'   => $desc,
    'response'      => $result
  ));

  exit;
}


if(!empty($_POST['key']) && !empty($_POST['action'])){

  // Check For Update
  if('check-core-update' == $_POST['action']){

    $response = check_cyzer_update();

    if($response[0]){
      echo_result('update-available', $response[1]);
    } else {
      echo_result('update-to-date', $response[1]);
    }
  }
  
  // Check Update Status
  else if('check-core-update-stats' == $_POST['action']){
    $cyzer_up_db = new CYZ_JDB(CYZ_GEN.'/jdb/');

    $cyzer_up_db->db_init('cyz_update');

    // get all super user data
    $cur_upd_status = $cyzer_up_db->get_column_data('core_updates', 0, 'update-status');

    if($cur_upd_status){
      echo_result($cur_upd_status, 'blank');
    } else {
      echo_result('not-started', 'blank');
    }
  }

  // Download Core Update
  else if('download-core-update' == $_POST['action']){
    if(download_cyzer_update()){
      $cyzer_up_db = new CYZ_JDB(CYZ_GEN.'/jdb/');

      $cyzer_up_db->db_init('cyz_update');

      // Create Table
      $cyzer_up_db->add_table('core_updates');

      $cyzer_up_db->update_column_data('core_updates', 0, 'update-status', 'core-update-downloaded');

      echo_result('core-update-downloaded', 'blank');
    }
  }

  // Backup Core
  else if('backup-core' == $_POST['action']){

    if(backup_core_cyz()){
      $cyzer_up_db = new CYZ_JDB(CYZ_GEN.'/jdb/');

      $cyzer_up_db->db_init('cyz_update');

      // Create Table
      $cyzer_up_db->add_table('core_updates');

      $cyzer_up_db->update_column_data('core_updates', 0, 'update-status', 'core-backup-completed');

      echo_result('Core Backup Completed', 'blank');
    }
  }

  // Backup Core
  else if('install-update' == $_POST['action']){

    if(backup_core_cyz()){
      $cyzer_up_db = new CYZ_JDB(CYZ_GEN.'/jdb/');

      $cyzer_up_db->db_init('cyz_update');

      // Create Table
      $cyzer_up_db->add_table('core_updates');

      $cyzer_up_db->update_column_data('core_updates', 0, 'update-status', 'core-backup-completed');

      echo_result('Core Backup Completed', 'blank');
    }
  }
}

else echo_error('Error Occurred');
