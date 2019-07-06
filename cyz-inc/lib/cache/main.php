<?php


// Include composer autoloader
require __DIR__ . '/../../vendor/autoload.php';


use Phpfastcache\CacheManager;
use Phpfastcache\Config\Config;
use Phpfastcache\Core\phpFastCache;


// Setup File Path on your config files
CacheManager::setDefaultConfig(new Config([
    "path" => CYZ_GEN.'/cache/',
    "itemDetailedDate" => false
]));


// In your class, function, you can call the Cache
$cyz_cache_obj = CacheManager::getInstance('files');
