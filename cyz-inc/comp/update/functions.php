<?php

function get_cyzer_updated_version(){
  $repository_url = 'https://raw.githubusercontent.com/webenfold/cyzer/master/';

  // Get file content of index.php
  $content = cyz_curl::get_content($repository_url.'index.php');

  // Incase error or no content found
  if(false === $content) return false;

  // Phrase the comment
  $result = CYZ_phrase::comments($content, array('Version'));

  // Returning the results
  if(empty($result)) return false;
  else return $result['Version'];
}


function download_cyzer_update(){
  // Updated File Loc
  $url = "https://github.com/webenfold/cyzer/archive/master.zip";

  // Local Zip File Path
  $zip_file_loc = "/updates/cyzer.zip";

  // Return  Result
  return cyz_curl::download_file($url, $zip_file_loc);
}
