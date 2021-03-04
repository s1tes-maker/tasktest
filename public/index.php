<?php

session_start();
require_once dirname(__DIR__) . '/config/init.php';
require_once ROOT . '/vendor/mvcsoft/helpers.php';
require_once ROOT . '/vendor/autoload.php';
require_once ROOT . '/config/routes.php';
use vendor\mvcsoft\App;
new App();