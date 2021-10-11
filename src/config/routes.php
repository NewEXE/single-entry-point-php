<?php

/**
 * @var array $routes {
 *     @type string $key Key is URI where user access to:
 *                       for "site.com/other-page" URI is "/other-page".
 *     @type string $value Value is path to file for requiring
 * }
 */
return [
    '/'             => 'pages/homepage.php',
    '/other-page'   => 'pages/other-page.php',
];