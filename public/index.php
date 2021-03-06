<?php

/*
 * Front Controller
 * (single entry point for all requests)
 */

define('ROOT', dirname(__FILE__, 2));
define('IS_CONSOLE', in_array(PHP_SAPI, ['cli', 'phpdbg'], true));

// In case of console request, require single handler for such requests
if (IS_CONSOLE) {
    require ROOT . '/src/console/index-console.php';
    die(0);
}

// Enable display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL);

// Safety get $_SERVER['REQUEST_URI']
$_requestUri = _getRequestUri();

// Get part before GET-params in URI.
// Example: get "/page" from "/page?p1=v1&p2=v2"
$_requestUri = strtok($_requestUri, '?');

$_routes = require ROOT . '/src/config/routes.php';

if (isset($_routes[$_requestUri])) {
    require_once ROOT . '/src/' . $_routes[$_requestUri];
} else {
    $_code = 404;
    http_response_code($_code);
    die("Error $_code");
}

function _getRequestUri() {
    $input = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
    $input = htmlentities(strip_tags($input));

    return trim($input);
}