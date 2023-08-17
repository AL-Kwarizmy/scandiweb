<?php

use app\core\Application;
use app\database\Database;

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once MAIN_DIRECTORY. '/vendor/autoload.php';
include_once MAIN_DIRECTORY. '/app/helpers.php';

$config = require MAIN_DIRECTORY.'/config.php';

$app = new Application();

Database::makeConnection($config['db']);