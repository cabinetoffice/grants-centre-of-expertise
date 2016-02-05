<?php

// Simple logging function
function _log( $message ) {
	error_log( print_r( $message, true ) );
}

// Require files
foreach( glob( STYLESHEETPATH . '/../app/*.php' ) as $filename ) require_once $filename;
foreach( glob( STYLESHEETPATH . '/../app/posts/*.php' ) as $filename ) require_once $filename;
foreach( glob( STYLESHEETPATH . '/../app/theme/*.php' ) as $filename ) require_once $filename;
