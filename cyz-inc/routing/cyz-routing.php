<?php
/**
 * Name:            Cyzer Routing
 * Version:         1.0.0
 * Description:     This file routes the defined URL and
 *                  associates with the corresponding view
 *                  instance
 * 
 * @package:        Cyzer Core
 */



/** Application Routing */
function add_route($defined_slug, $instance){
  $current_slug = get_current_slug();

  if($defined_slug == $current_slug){
    require_once(CYZ_APP.$instance);
  }
}



/** Super User Panel Page Routing */
function add_route_su($defined_slug, $instance){
  $current_slug = get_current_slug();

  if($defined_slug == $current_slug){
    require_once(CYZ_VIEWS.$instance);
  }
}
