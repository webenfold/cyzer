<?php

/** Include URL Fetcher to fetch URLs */
require_once(CYZ_LIB.'/jdb/JDB.php');


function get_view_db_data($db_name){
  $JSON_DB = new CYZ_JDB(CYZ_GEN.'/jdb/');

  $JSON_DB->db_init($db_name);

  return $JSON_DB->get_table('views');
}


function get_view_instance_code($name, $number){
  $views_from_db = get_view_db_data($name);

  if(empty($views_from_db)) return false;
  
  else {
    foreach($views_from_db as $key => $val){
      if($name.'.'.$number == $views_from_db[$key]['id']){        
        
        $path_of_file = $views_from_db[$key]['abs_location'];

        $full_path = ABSPATH."/$path_of_file";

        $file_data_raw = file_get_contents($full_path);

        return $file_data_raw;
      }
    }
  }

  return false;
}
