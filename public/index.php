<?php

define("ROOT", __DIR__ . DIRECTORY_SEPARATOR);
define("APP", ROOT . '../app/');

require APP . 'core/config/config.php';

require APP . 'core/db/connection.php';

require APP . 'presentation/views/route.php';
