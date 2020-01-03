<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . '../vendor/autoload.php');

use Black\Dispatcher;

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>