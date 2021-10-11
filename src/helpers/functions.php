<?php

/**
 * Strip HTML and PHP tags from a string and
 * convert all applicable characters to HTML entities.
 *
 * Source: @link https://www.oreilly.com/library/view/learning-php-mysql/9781491979075/
 *
 * @param $str
 * @return string
 */
function sanitizeString($str): string
{
    $str = (string) $str;

    return htmlentities(strip_tags($str));
}

/**
 * Gets a specific external variable by name and filters it as string.
 * @link https://php.net/manual/en/function.filter-input.php
 *
 * @param int $type
 * One of INPUT_GET, INPUT_POST,
 * INPUT_COOKIE, INPUT_SERVER, or
 * INPUT_ENV.
 *
 * @param string $varName
 * Name of a variable to get.
 */
function filterInputString(int $type, string $varName): string
{
    $input = filter_input($type, $varName, FILTER_SANITIZE_STRING);
    $input = sanitizeString($input);

    return trim($input);
}

/**
 * Get part before GET-params in URI.
 * So from "https://site.com/page?p1=v1&p2=v2"
 * "https://site.com/page" was returned.
 *
 * @param string $uri
 * @return string
 */
function uriWithoutGetPart(string $uri): string
{
    return strtok($uri, '?');
}
