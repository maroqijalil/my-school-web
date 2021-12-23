<?php

require_once APP . 'presentation/middleware/auth/auth.php';

require_once APP . 'presentation/controllers/auth/auth.php';
require_once APP . 'presentation/controllers/main/student/student.php';

switch ($_SERVER['REQUEST_URI']) {
  case '/':
    if (!authenticate()) {
      $students = getAllStudent();

      require APP . 'presentation/views/main/student/halamanUtama.php';
    }
    break;

  case '/masuk':
    if (!redirectIfAuthenticate()) {
      require APP . 'presentation/views/auth/login.php';
    }
    break;

  case '/daftar':
    if (!redirectIfAuthenticate()) {
      require APP . 'presentation/views/auth/register.php';
    }
    break;

    case '/user':
      if (!authenticate()) {
        $students = getAllStudent();
        require APP . 'presentation/views/main/student/index.php';
      }
      break;

  default:
    http_response_code(404);
    break;
}
