<?php
mb_internal_encoding('UTF-8');

define('ENVIRONMENT', 'dev');

define('DEFAULT_CONTROLLER', 'Home');
define('DEFAULT_ACTION', 'index');

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mini');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');
define('DB_CHARSET', 'utf8');
