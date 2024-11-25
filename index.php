<?php
$uri= urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if( preg_match('/public/', $uri) ) {
	header("HTTP/1.1 404 Not Found");
	header("Status: 404 Not Found");
	exit;
}

if ( $uri !== '/' && file_exists(__DIR__.'/public'.$uri) ) {
    return false;
}


require_once __DIR__.'/public/index.php';