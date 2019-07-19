<?php

require_once(CYZ_COMPONENTS.'/update/functions.php');

function check_cyzer_update(){
  $version =  get_cyzer_updated_version();
  $update_version = explode('.', $version);

  $current_version = explode('.', CYZ_VERSION);

  // Version
  if((int)$update_version[0] > (int)$current_version[0]) return array(
    true,
    $version
  );

  // Sub Version
  if((int)$update_version[1] > (int)$current_version[1]) return array(
    true,
    $version
  );

  // Build Version
  if((int)$update_version[2] > (int)$current_version[2]) return array(
    true,
    $version
  );

  return array(
    true,
    $version
  );
}
