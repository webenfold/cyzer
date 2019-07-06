<?php

function download_cyz_zip(){
  // Updated File Loc
  $url = "https://github.com/webenfold/we-core-fb/archive/master.zip";

  // Local Zip File Path
  $zipFile = CYZ_GEN."/updates/cyz-core.zip";

  $zipResource = fopen($zipFile, "w");

  // Get The Zip File From Server
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FAILONERROR, true);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_AUTOREFERER, true);
  curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
  curl_setopt($ch, CURLOPT_FILE, $zipResource);

  $curl = curl_exec($ch);
  curl_close($ch);

  if(false === $curl) return false;
  else return true;
}
