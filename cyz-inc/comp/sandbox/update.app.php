<?php

/** Define ABSPATH as this file's directory */
if(!defined('ABSPATH')) define('ABSPATH', dirname(__FILE__));

require_once ABSPATH.'/cyz-inc/comp/maintenance/main.php';
require_once ABSPATH.'/cyz-inc/lib/file-management/main.php';

enable_maintenance();

sleep(20);

disable_maintenance();

unlink(ABSPATH.'/update.php');
exit;
