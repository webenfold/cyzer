<?php

class cyz_file_operator{
  /** Initialized Flag */
  private $initialized = false;

  /** Set Flag */
  function __construct(){
    if('APP_STARTED') $this->initialized = true;
  }



  function get_file_permission($abs_path){
    clearstatcache();
    return substr(sprintf('%o', fileperms($abs_path)), -4);
  }


  /** Check function is safe to execute */
  private function safe_to_execute(){
    if(!$this->initialized) return [
      'status' => false,
      'description' => 'Unauthorised Access'
    ];
  }

  /** Write file method actually creates new file and replace
   *  the old one if present.
   *  @return boolean */
  private function write_file($absolute_file, $content){
    /** Check if this function is safe to execute */
    $this->safe_to_execute();

    /** Open file in memory */
    $file_to_update = @fopen($absolute_file, "w");

    /** Check file is valid */
    if($file_to_update){
      @fwrite($file_to_update, $content);
      @fclose($file_to_update);

      /** File updated successfully => return true */
      return true;
    }
    
    /** File not updated => return false */
    else return false;
  }

  /** Check file exits 
   *  @return array
   *  --> Status boolean
   *  --> Description */
  function is_file_exists($dir_path, $file_name){
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
  function is_dir_exists($dir_path){
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

  /** Check directory / file is writeable
   *  @return array
   *  --> Status boolean
   *  --> Description */
  function has_write_permission($dir_path, $file_name = null){
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

  // function cyz_create_file($dir_path, $file_name, $content){
  //   $this->safe_to_execute();

  //   // if($file_path == '/') $absolute_file = $file_name;
  //   $abs_file_path = ABSPATH.$dir_path.$file_name;

  //   if($this->is_file_exists($dir_path, $file_name)['status']){
  //     $this->cyz_update_file($dir_path, $file_name, $content);
  //   }

  //   else{

  //   }
  // }

  /** Update File */
  public function cyz_update_file($dir_path, $file_name, $content){
    $this->safe_to_execute();

    // if($file_path == '/') $absolute_file = $file_name;
    $absolute_file = ABSPATH.$dir_path.$file_name;
    
    /** Write file and check response. 
     *  If file written successfully => return true */
    if($this->write_file($absolute_file, $content)) return [
      'status' => true,
      'description' => 'File "'.$absolute_file.'" has been updated!'
    ];

    /** Error writing file => return false */
    else return [
      'status' => false,
      'description' => 'Operation Failed! File "'.$absolute_file.'" has not been updated!'
    ];
  }

  /** Update File */
  public function copy_file($source, $destination){
    $this->safe_to_execute();

    $source = ABSPATH.$source;

    $destination = ABSPATH.$destination;
    
    /** Write file and check response.
     *  If file written successfully => return true */
    if($this->has_write_permission($destination)){
      if (true === copy($source, $destination)) return [
        'status' => true,
        'description' => 'File successfully backed up at loc: "'.$destination
      ];
      else return [
        'status' => false,
        'description' => 'File "'.$absolute_file.'" has been updated!'
      ];
    } 

    /** Error writing file => return false */
    else return [
      'status' => false,
      'description' => 'Operation Failed! No write permission!'
    ];
  }

  /** Delete File */
  public function delete_file($absolute_path){

    $absolute_path = ABSPATH.$absolute_path;

    if(!unlink($absolute_path)) return [
      'status' => true,
      'description' => 'File "'.$absolute_path.'" successfully deleted'
    ];

    else return [
      'status' => false,
      'description' => 'Operation Failed!'
    ];
  }
}
