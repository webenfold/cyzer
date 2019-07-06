<?php

/** Use Global View Watcher */
GLOBAL $VIEW_WATCHER;


// view watcher data
$view_data_watcher = $VIEW_WATCHER->get_view_record();


/** Set table name */
$table_name = 'app_view';


/** Get view data from local DB */
$view_data_db = get_app_data($table_name);


/** If View data from DB is empty, simply update the DB */
if(!empty($view_data_watcher) && empty($view_data_db)) {
  update_app_data($table_name, $view_data_watcher);

  return null;
}

/** If View data from watcher is empty, simply delete the DB */
elseif(empty($view_data_watcher) && !empty($view_data_db)) {
  delete_table($table_name);

  return null;
}


/** Check if any new view has been added */
$new_view_data = array_diff_key($view_data_watcher, $view_data_db);


/** Check if any new view has been removed */
$removed_view_data = array_diff_key($view_data_db, $view_data_watcher);


/** In case of any difference - update the DB */
if(!empty($new_view_data) || !empty($removed_view_data)){
  update_app_data($table_name, $view_data_watcher);
}
