<?php

define('URL_PROTOCOL', '//');
// define('URL_PROTOCOL', 'https://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL', URL_PROTOCOL . URL_DOMAIN . DIRECTORY_SEPARATOR);

define('DB_HOST', "localhost");
define('DB_PORT', "3306");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_NAME', "pmb_its");
define('DB_CONNECTION', 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME);
// define('DB_CONNECTION', 'pgsql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';');
