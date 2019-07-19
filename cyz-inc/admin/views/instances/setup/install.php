<?php
/**
 * Cyzer View
 * Contains Setup View Main File
 *
 * @package Cyzer
 */



/** Attach Install View Header */
insert_template('/templates/general/head.php', null, true);


/** Check Get Parameter
 *  If setup parameter found than attach different views */
if(isset($_GET['setup'])):



  /** Setup Error View */
  if($_GET['setup'] == 'error'):

    /** Get Welcome View Instance Template */
    insert_template('/instances/setup/body/error.php', null, true);



  /** Setup Apache htaccess View */
  elseif($_GET['setup'] == 'apache'):

    /** Include Apache HTACCESS setup file */
    attach_controller('/setup/apache/setup.php', 'cyz_admin');



  /** Setup Database */
  elseif($_GET['setup'] == 'db'):
    /** Include DB Setup script 
     *  DB Script Process POST request
     *  on form submit - during installation */
    attach_controller('/setup/db/setup.php', 'cyz_admin');

    /** Show DB Setup view after processing post request */
    insert_template('/instances/setup/body/db-setup.php', null, true);



  /** Setup Super User Credential */
  elseif($_GET['setup'] == 'su'):
  /** Include Cyzer SU Panel Config Setup */
  attach_controller('/setup/config-constructor.php', 'cyz_admin');

  /** Include SU Setup script 
    * SU Script Process POST request
    * on form submit - during installation */
  attach_controller('/setup/su/setup.php', 'cyz_admin');


  /** Show DB Setup view after processing post request */
  insert_template('/instances/setup/body/su-setup.php', null, true);


   // End If Statement
  endif;


/** If there is no GET parameter */
else:
  
  
  /** Get Welcome View Instance Template */
  insert_template('/instances/setup/body/welcome.php', null, true);


// End If Statement
endif;


/** Get Footer */
insert_template('/templates/general/footer.php', null, true);
