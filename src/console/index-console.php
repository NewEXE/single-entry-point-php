<?php

if (!defined('ROOT')) {
    _printUsageExample();
}

if (PHP_SAPI !== 'cli') {
    var_dump('Must be executed from console');
    _printUsageExample();
}

$scriptName = empty($argv[1]) ? '' : $argv[1];
$scriptName = trim($scriptName);

if (empty($scriptName)) {
    _printUsageExample();
}

$scriptFile = ROOT . '/src/console/scripts/' . $scriptName;

if (!file_exists($scriptFile) || !is_file($scriptFile)) {
    die("File $scriptFile is not exists");
}

require_once $scriptFile;

function _printUsageExample() {
    die('Usage example: php public/index.php example.php');
}