<?php

class cyz_curl{
  static function get_content($url = null){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    $result = curl_exec($ch);
    curl_close($ch);

    if(false === $result) return false;
    else return $result;
  }

  static function download_file($url = null, $abs_file_loc = null){
    if(!$file_loc) return false;

    $abs_file_loc = CYZ_GEN.$abs_file_loc;

    $file = fopen($abs_file_loc, "w");

    // Get The Zip File From Server
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt($ch, CURLOPT_FILE, $file);
    $result = curl_exec($ch);
    curl_close($ch);

    if(false === $result) return false;
    else return true;
  }
}

class CYZ_phrase{
  static function comments($file_data, $fields){
    // Creating empty array
    $result = array();

    // Catching CR-only line endings
    $comment = str_replace("\r", "\n", $file_data);

    /**
     * Looping thorough fields
     * Matching and returning matched header comment fields */
    foreach($fields as $key => $regex){
      // Matching using regex
      if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( $regex, '/' ) . ':(.*)$/mi', $comment, $match ) && $match[1] ) {
          $fields[ $key ] = trim( preg_replace( '/\s*(?:\*\/|\?>).*/', '', $match[1]  ) );
      } else {
          $fields[ $key ] = '';
      }

      // Storing the result to an array
      $result[$regex] = $fields[ $key ];
    }

    // Returning the results
    return $result;
  }

  static function file_comments($file_loc, $fields){
    // Open file for reading
    $fp = fopen($file_loc, 'r');

    /**
     * Read only 100 KB of Data from the file
     * assuming header comments will be in top */
    $file_data = fread($fp, 102400);

    // Closing file
    fclose($fp);

    // Returning the results
    return self::comments($file_data, $fields);
  }
}
