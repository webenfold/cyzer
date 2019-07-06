<?php


/** Include URL Fetcher to fetch URLs */
require_once(CYZ_LIB.'/jdb/JDB.php');


/** Initialize APP JSON DB Object */
$APP_JSON_DB = new CYZ_JDB(CYZ_GEN.'/jdb/');


$APP_JSON_DB->db_init('app');


/** Setting Global - APP JSON DB Object */
GLOBAL $APP_JSON_DB;


/** Get app data from JSON DB */
function get_app_data($table_name){
  /** Using Global - APP JSON DB Object */
  GLOBAL $APP_JSON_DB;

  return $APP_JSON_DB->get_table($table_name);
}


/** Add app data to JSON DB */
function update_app_data($table_name, $table_data){
  /** Using Global - APP JSON DB Object */
  GLOBAL $APP_JSON_DB;

  $APP_JSON_DB->add_table($table_name);

  return $APP_JSON_DB->update_table($table_name, $table_data);
}
