<?php
/**
 * Name:            Cyzer URL Rewrite
 * Version:         1.0.0
 * Description:     This contains URL Rewrite logic.
 * 
 * @package:        Cyzer Core
 */



/** Get The Domain */
$domain = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'];



/** Define Global Variable Current Domain */
if(!defined('CURR_DOMAIN')) define('CURR_DOMAIN', $domain);



/** Get the URL path without query */
$request_uri = strtok($_SERVER['REQUEST_URI'],'?');



/** Define Global Variable Request URI */
if(!defined('REQUEST_URI')) define('REQUEST_URI', $request_uri);



/** Get Query Parameter if any */
$query = parse_url($domain.$_SERVER['REQUEST_URI'], PHP_URL_QUERY);



/**
 * Regex Expression
 * Pattern for repeating forward slash */
$pattern = '/(\/{2,})/';



/**
 * Check if there is no forward slash at the end
 * o9r hash repeating forward slashes */
if(substr($request_uri, -1) !== '/' || preg_match($pattern, $request_uri)):



  /** Right Trim from forward slash and add 
   * forward slash */
  $request_url = rtrim($request_uri.'/', '/').'/';



  /**
   * Remove forward slash repetition in between
   * the request URL String */
  $request_url = preg_replace($pattern, '/', $request_url);



  /** Create final URL */
  $full_url = $domain.$request_url;



  /** Add Query String */
  if($query) $full_url .= '?'.$query;



  /** Get the query string separately and redirect to new URL */
  header("Location: ".$full_url);
  exit;



/** End If Statement */
endif;
