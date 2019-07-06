<?php
/**
 * Cyzer Apache Setup File
 * Contains Apache Predefined Settings
 *
 * @package Cyzer
 */



/** Include URL Fetcher to fetch URLs */
require_once(CYZ_LIB.'/file-management/main.php');


/** Get Rewrite base */
function get_rewrite_base(){
  /** Current Directory URI
   *  Convert Directory URI to Directory URL */
  $full_root = str_replace('\\', '/', realpath(__DIR__));

  /** Get Document URL */
  $doc_root = rtrim($_SERVER['DOCUMENT_ROOT'].'/', '/').'/';

  /** Removing Document Root from Directory URL */
  $string_array = explode($doc_root, $full_root)[1];

  /** Creating array of path elements present in Directory URL
   *  Reversing the created path array */
  $path_array = array_reverse(explode('/', $string_array));

  /** Removing last three elements of array
   *  Re-Reversing the array to original state */
  $path_array = array_reverse(array_slice($path_array, 5));

  /** Creating Rewrite base variable starting with forward slash '/' */
  $rewrite_base = '/';

  /** looping through the array and creating final rewrite base */
  foreach($path_array as $slug) if($slug) $rewrite_base = $rewrite_base.$slug.'/';

  /** Return the final rewrite base */
  return $rewrite_base;
}



/** Function returns htaccess content */
function cyz_get_htaccess_content(){
  /** Get the Rewrite base for Apache */
  $rewrite_base = get_rewrite_base();

  /** Formatting Variable */
  $nl = "\r\n";
  $nls = "\r\n ";

  /** Apache Configuration */
  $apache_content = "# CYZER APACHE CONFIG$nl<IfModule mod_rewrite.c>$nls RewriteEngine On$nl$nls # REWRITE BASE$nls RewriteBase $rewrite_base$nl$nls # REQUEST HANDLING$nls RewriteCond %{REQUEST_FILENAME} !-f$nls RewriteCond %{REQUEST_FILENAME} !-d$nls RewriteRule ^(.*) index.php [NC,L,QSA]$nl</IfModule>";

  return $apache_content;
}



/** Actual function which creates htaccess file */
function cyz_create_htaccess(){
  // Get htaccess dynamic content
  $htaccess_content = cyz_get_htaccess_content();

  /** Directory where apache htaccess resides */
  $apache_dir = '/';

  /** Directory where apache htaccess Filename */
  $apache_filename = '.htaccess';

  /** File Operator Object */
  $file_worker = new cyz_file_operator();

  /** Check write permission */
  $is_dir_writeable = $file_worker->has_write_permission($apache_dir);

  /** Check if directory is writeable */
  if(!$is_dir_writeable['status']) return [
    'status' => false,
    'description' => 'Application directory not writable.'
  ];
  
  /** Create new/update htaccess file */
  $htaccess_updated = $file_worker->cyz_update_file(
    $apache_dir,          // Apache htaccess Default Location
    $apache_filename,     // Htaccess file name
    $htaccess_content     // Htaccess content
  );

  /** Htaccess file has been updated */
  if($htaccess_updated['status']) return [
    'status' => true,
    'description' => ''
  ];

  /** Error updating Htaccess file */
  else return [
    'status' => false,
    'description' => 'Please delete old .htaccess file.'
  ];
}



/** Run Apache Setup */
$setup_apache = cyz_create_htaccess();



/** Once Apache Setup Completes -> Check Status */
if($setup_apache['status']):

  /** Redirect to database setup page */
  header("Location: ".get_home_url().'?setup=db');
  exit;



/** If Apache Setup Fails */
else:

  /** Error description */
  $error = base64_encode(serialize([$setup_apache['description']]));

  // Redirect to error instance URL
  header("Location: ".get_home_url().'?setup=error&desc='.$error.'&url=apache');
  exit;



// End If Statement
endif;
