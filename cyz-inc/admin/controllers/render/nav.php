<?php

function echo_cyz_nav_menu(){
  /** Set table name */
  $table_name = 'app_view';

  // Get App View Data
  $view_data = get_app_data($table_name);

  if(empty($view_data)) return null;

  foreach($view_data as $view_name => $view_type){
    $formatted_name = str_replace('_', ' ', $view_name);
    
    echo '<a id="'.$view_name.'-link" href="'.get_home_url().'/'.SU_SLUG.'/app-view/?type='.$view_name.'" class="sub-menu-item '.$view_type.'">'.$formatted_name.'</a>';
  }
}
