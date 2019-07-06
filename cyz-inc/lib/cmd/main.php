<?php

function exec_background($cmd) { 
  if (substr(php_uname(), 0, 7) == "Windows"){ 
    pclose(popen("start /B ". $cmd, "r"));  
  } 
  else { 
    exec($cmd . " > /dev/null &");   
  } 
} 
