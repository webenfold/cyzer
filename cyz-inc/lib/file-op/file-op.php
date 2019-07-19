<?php

class cyz_file_op{
  /** Initialized Flag */
  private $initialized = false;

  // Flag to check errors on recursive operation
  private $rec_errors = array();

  private $dir_tree;

  /** Set Flag */
  function __construct(){
    if('APP_STARTED') $this->initialized = true;
  }

  /** Check function is safe to execute */
  private function safe_to_execute(){
    if(!$this->initialized) return [
      'status' => false,
      'description' => 'Unauthorised Access'
    ];
  }

  /** Get file / directory permission */
  function permission($abs_path){
    clearstatcache();
    return substr(sprintf('%o', fileperms($abs_path)), -4);
  }

  /** Check directory / file is writeable
   *  @return array
   *  --> Status boolean
   *  --> Description */
  function writeable($dir_path, $file_name = null){
    /** Check if this function is safe to execute */
    $this->safe_to_execute();

    /** Return true if dir exits */
    if(is_writable(ABSPATH.$dir_path.$file_name)) return [
      'status' => true,
      'description' => 'Directory/file is writeable'
    ];

    /** Return false if dir does not exits */
    else return [
      'status' => false,
      'code'   => 'CD601',
      'description' => 'Directory/file is not writeable'
    ];
  }

  /** Check file exits 
   *  @return array
   *  --> Status boolean
   *  --> Description */
  function file_exists($dir_path, $file_name){
    /** Check if this function is safe to execute */
    $this->safe_to_execute();

    /** Return true if file exits */
    if(file_exists(ABSPATH.$dir_path.$file_name)) return [
      'status' => true,
      'description' => 'File "'.$dir_path.$file_name.'" exists!'
    ];

    /** Return false if file does not exits */
    else return [
      'status' => false,
      'description' => 'File "'.$dir_path.$file_name.'" does not exists!'
    ];
  }

    /** Check dir exits 
   *  @return array
   *  --> Status boolean
   *  --> Description */
  function dir_exists($dir_path){
    /** Check if this function is safe to execute */
    $this->safe_to_execute();

    /** Return true if dir exits */
    if(is_dir(ABSPATH.$dir_path)) return [
      'status' => true,
      'description' => 'Directory "'.$dir_path.'" exists!'
    ];

    /** Return false if dir does not exits */
    else return [
      'status' => false,
      'description' => 'Directory "'.$dir_path.'" does not exists!'
    ];
  }

  /** Update File */
  function update_file($file, $content){
    $this->safe_to_execute();

    // if($file_path == '/') $absolute_file = $file_name;
    $absolute_file = ABSPATH.$file;

    /** Open file in memory */
    $file_to_update = @fopen($absolute_file, "w");

    /** Check file is valid */
    if($file_to_update){
      @fwrite($file_to_update, $content);
      @fclose($file_to_update);

      /** File updated successfully => return true */
      return [
        'status' => true,
        'description' => 'File "'.$absolute_file.'" has been updated!'
      ];
    }
    
    /** File not updated => return false */
    return [
      'status' => false,
      'description' => 'Operation Failed! File "'.$absolute_file.'" has not been updated!'
    ];
  }

  /** Copy File */
  function copy_file($source_file, $destination_file){
    $this->safe_to_execute();

    $source = ABSPATH.$source_file;

    $path = explode('/', $destination_file);

    $this->dir_tree = '/';

    for($i = 0; $i < (count($path) -1 ); $i++){
      $this->dir_tree =  $this->dir_tree.$path[$i].'/';
      $temp_dir = ABSPATH.$this->dir_tree;
      if(!is_dir($temp_dir)) @mkdir($temp_dir);
    }

    $destination = ABSPATH.$destination_file;

    if (true === copy($source, $destination)) return [
      'status' => true,
      'description' => 'File successfully backed up at loc: "'.$destination
    ];
    
    
    return [
      'status' => false,
      'description' => 'File "'.$source.'" not copied'
    ];
  }

  /** Delete File */
  function delete_file($absolute_path){
    $this->safe_to_execute();

    $absolute_path = ABSPATH.$absolute_path;

    if(!unlink($absolute_path)) return [
      'status' => true,
      'description' => 'File "'.$absolute_path.'" successfully deleted'
    ];

    return [
      'status' => false,
      'description' => 'Operation Failed!'
    ];
  }

  // Recursive Copy
  function copy_dir($src, $dst){
    $this->safe_to_execute();

    // Open Source Directory
    $dir = opendir($src);

    // Make Directory / Suppress Error
    @mkdir($dst);

    // If destination has no write permission, return
    if(false == $this->writeable($dst)['status']){
      array_push($this->rec_errors, $dst.' is not writable!');
    };

    // Loop directories
    while(false !== ($file = readdir($dir))){
      if(($file != '.') && ($file != '..')){
        if(is_dir($src .'/'.$file)) $this->copy_dir($src.'/'.$file,$dst.'/'.$file); 

        else copy($src . '/' . $file, $dst . '/' . $file);
      } 
    } 
    closedir($dir);

    if(!empty($this->recursive_error)) {
      $errors = $this->rec_errors;

      $this->rec_errors = array();

      return [
        'status' => false,
        'description' => $errors
      ];
    }
    
    return [
      'status' => true,
      'description' => 'Source directory "'.$src.'" successfully copied to "'.$dst.'"'
    ];
  }

  // Recursive Delete
  function delete_dir($dir){
    $this->safe_to_execute();

    // If destination has no write permission, return
    if(false == $this->writeable($dst)['status']){
      array_push($this->rec_errors, $dst.' is not writable!');
    };

    // Remove Directory
    if(is_dir($dir)){
      $files = scandir($dir);

      // Remove the files inside this directory
      foreach ($files as $file)
      if($file != "." && $file != "..") $this->delete_dir("$dir/$file");
    
      // Remove this directory
      rmdir($dir);
    }

    // Remove Individual Files
    else if(file_exists($dir)) unlink($dir);

    if(!empty($this->recursive_error)) {
      $errors = $this->rec_errors;

      $this->rec_errors = array();

      return [
        'status' => false,
        'description' => $errors
      ];
    }
    
    return [
      'status' => true,
      'description' => 'Directory "'.$dir.'" successfully deleted'
    ];
  }

  // Recursively Move Directory
  function move_dir($src, $dst){
    $this->safe_to_execute();

    // If destination has no write permission, return
    if(false == $this->writeable($src)['status']){
      array_push($this->rec_errors, $dst.' is not writable!');
    };

    // If destination has no write permission, return
    if(false == $this->writeable($dst)['status']){
      array_push($this->rec_errors, $dst.' is not writable!');
    };

    // copy directory
    $result = $this->copy_dir($src, $dst);

    if($result['status']) $this->delete_dir($src);
    else {
      array_push($this->rec_errors, 'Copy Failed');
    }

    if(!empty($this->recursive_error)) {
      $errors = $this->rec_errors;

      $this->rec_errors = array();

      return [
        'status' => false,
        'description' => $errors
      ];
    }
    
    return [
      'status' => true,
      'description' => 'Source directory "'.$src.'" successfully moved to "'.$dst.'"'
    ];
  }
}
