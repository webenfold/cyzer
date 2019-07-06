<?php

function read_header_comment($loc, $fields){
  // Open file for reading
  $fp = fopen($loc, 'r');

  // Read only 100 KB of Data from the file
  // Assuming header comments will be in top
  $file_data = fread($fp, 102400);

  // Closing file
  fclose($fp);

  // Catching CR-only line endings
  $file_data = str_replace("\r", "\n", $file_data);

  // Creating empty array
  $result = array();

  /**
   * Looping thorough fields
   * Matching and returning matched header comment fields
   */
  foreach($fields as $key => $regex){
    // Matching using regex
    if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( $regex, '/' ) . ':(.*)$/mi', $file_data, $match ) && $match[1] ) {
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

function read_comment($data, $fields){

  // Catching CR-only line endings
  $file_data = str_replace("\r", "\n", $data);

  // Creating empty array
  $result = array();

  /**
   * Looping thorough fields
   * Matching and returning matched header comment fields
   */
  foreach($fields as $key => $regex){
    // Matching using regex
    if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( $regex, '/' ) . ':(.*)$/mi', $file_data, $match ) && $match[1] ) {
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
