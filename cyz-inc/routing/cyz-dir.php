<?php
/**
 * Name:            Cyzer path definition
 * Description:     Contains global path defined variable
 *
 * @package:        Cyzer Core
 */



if(!defined('CYZ_APP'))
define('CYZ_APP', ABSPATH.'/cyz-app');


if(!defined('CYZ_GEN'))
define('CYZ_GEN', ABSPATH.'/cyz-gen');


if(!defined('CYZ_CONFIG'))
define('CYZ_CONFIG', ABSPATH.'/cyz-gen/config');


if(!defined('CYZ_INC'))
define('CYZ_INC', ABSPATH.'/cyz-inc');


if(!defined('CYZ_ADMIN_CTRL'))
define('CYZ_ADMIN_CTRL', ABSPATH.'/cyz-inc/admin/controllers');


if(!defined('CYZ_COMPONENTS'))
define('CYZ_COMPONENTS', ABSPATH.'/cyz-inc/comp');


if(!defined('CYZ_LIB'))
define('CYZ_LIB', ABSPATH.'/cyz-inc/lib');


if(!defined('CYZ_ROUTE'))
define('CYZ_ROUTE', ABSPATH.'/cyz-inc/routing');


if(!defined('CYZ_VIEWS'))
define('CYZ_VIEWS', ABSPATH.'/cyz-inc/admin/views');
