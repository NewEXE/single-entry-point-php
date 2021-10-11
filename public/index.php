<?php

define('ROOT', dirname(__FILE__, 2));

require_once ROOT . '/src/helpers/functions.php';

$_requestUri = filterInputString(INPUT_SERVER, 'REQUEST_URI');
$_requestUri = uriWithoutGetPart($_requestUri);

$_routes = require ROOT . '/src/config/routes.php';

if (isset($_routes[$_requestUri])) {
    require_once ROOT . '/src/' . $_routes[$_requestUri];
} else {
    die('Error 404');
}