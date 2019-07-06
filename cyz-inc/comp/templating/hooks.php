<?php
/**
 * Name:            Cyzer Hooks
 * Version:         1.0.0
 * Description:     This contains commonly used hooks
 * 
 * @package:        Cyzer Core
 */



/**
 * Add Action Hook
 * 
 * This hook act as a queue of functions stored in
 * associated global variable which is based  on
 * action type
 * 
 * @param
 *    -> action_type  => Set of predefined actions.
 *    -> function     => Name of function to be
 *                       executed.
 * 
 * @return
 *    -> Void */
function add_action($action_type, $function_name){
  /** 
   * Set of predefined actions */
  $pre_actions_type = array(
    'on-startup',
    'on-shutdown'
  );

  /** Loop Through Action */
  foreach($pre_actions_type as $pre_action){

    /** If predefined action matches with action type */
    if($action == $action_type){

      /** Define a global variable of action type */
      $GLOBALS[$action_type];

      /** 
       * If global variable of action type is empty
       * set this variable as a blank array. */
      if(empty($GLOBALS[$action_type])) $GLOBALS[$action_type] = array();

      /** 
       * Push function names as a function identifier 
       * into the global variable of action array */
      array_push($GLOBALS[$action_type], $function_name);
    }
  }
}



/**
 * Include Library Scripts
 * 
 * This hook is used to include Cyzer library scripts 
 * 
 * To Do - check if it exists and then include */
function cyz_lib($file_path){
  /**
   * Require library file once. */
  require_once(CYZ_LIB.$file_path);
}



/** 
 * Attach controller Hook
 * 
 * This hook is used to attach controller
 * with view instance */
function attach_controller($file_path, $container = null){

  /** 
   * Attach Controller from Cyzer Library */
  if('cyz_lib' == $container) require_once(CYZ_LIB.$file_path);

  /** 
   * Attach Controller from Cyzer Admin Libraries*/
  elseif('cyz_admin' == $container) require_once(CYZ_ADMIN_CTRL.$file_path);

  /** 
   * Attach Controller from Cyzer Core Components */
  elseif('cyz_comp' == $container) require_once(CYZ_COMPONENTS.$file_path);

  /** 
   * Attach Controller from Cyzer App 
   * when container is defined */
  elseif(!empty($container)) require_once(CYZ_APP.$container.$file_path);

  /** 
   * Attach Controller from Cyzer Core Components */
  else require_once(CYZ_APP.'/controllers'.$file_path);
}



/** 
 * Insert Template Hook
 * 
 * This hook is used to attach view templates
 * with view instance */
function insert_template($file_path, $container = null, $cyz_core = false){
  /** 
   * View from cyzer core */
  if(true === $cyz_core){
    /**
     * Attach view from Cyzer Includes */
    include(CYZ_VIEWS.$file_path);
  }
  /** 
   * View from cyzer app */
  else{
    /** 
     * Attach view from Cyzer app
     * when container is defined */
    if(empty($container)) require_once(CYZ_APP.$container.$file_path);
    /**
     * Attach view from Cyzer Includes */
    else include(CYZ_APP.$file_path);
  }
}
