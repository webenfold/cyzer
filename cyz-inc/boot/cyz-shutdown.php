<?php
/**
 * Name:            Cyzer Shutdown
 * Version:         1.0.0
 * Description:     This will executes when Cyzer completes
 *                  one request completely and terminates.
 * 
 * @package:        Cyzer Core
 */



/** Save computation resource and time usage for monitoring */
function print_computation(){
    /** Get Execution Start Global Variable */
    GLOBAL $EXE_START;

    /** Get Ram Used */
    $ram_used = round((memory_get_usage(false)/1024/1024), 2, PHP_ROUND_HALF_UP);


    /**
     * At the end of your code, compare the current
     * microtime to the microtime that we stored at the
     * beginning of the script. */
    $EXE_END = microtime(true);

    
    /** The result will be in seconds and milliseconds */
    $seconds = round($EXE_END - $EXE_START, 3, PHP_ROUND_HALF_UP) * 1000;

    // Print it out
    echo "Cyzer took $seconds ms to execute and used $ram_used MB of RAM";
}



// Shutdown Function
function shutdown(){

    // print_computation();

    ob_end_flush();
}



/** Registering Cyzer Shutdown Function */
register_shutdown_function('shutdown');
