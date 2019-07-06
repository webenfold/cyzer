<?php

/** Check if Cyzer DB is configured */
if(file_exists(CYZ_APP.'/controllers/integrate.php')){
  /** Include Watcher Scripts */
  require_once(CYZ_COMPONENTS.'/integration/app/watcher/view.watcher.php');


  // Get App integration file for configuration
  require_once(CYZ_APP.'/controllers/integrate.php');

  
  /** Include Compiler Scripts */
  require_once(CYZ_COMPONENTS.'/integration/app/compiler/view.compiler.php');
}
