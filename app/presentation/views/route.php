<?php

require_once APP . 'presentation/middleware/auth/auth.php';

require_once APP . 'presentation/controllers/auth/auth.php';
require_once APP . 'presentation/controllers/main/student/student.php';
require_once APP . 'presentation/controllers/main/teacher/teacher.php';
require_once APP . 'presentation/controllers/main/payment/payment.php';
require_once APP . 'presentation/controllers/main/parent/parent.php';

switch ($_SERVER['REQUEST_URI']) {
  case '/':
    if (!authenticate()) {
      $students = getAllStudent();

      require APP . 'presentation/views/main/admin/student/index.php';
    }
    break;

  case '/daftar-siswa':
    if (!authenticate()) {
      $students = getAllStudent();

      require APP . 'presentation/views/main/admin/student/index.php';
    }
    break;

  case '/daftar-siswa/tambah':
    if (!authenticate()) {
      require APP . 'presentation/views/main/admin/student/create.php';
    }
    break;

  case '/daftar-ortu':
    if (!authenticate()) {
      $parents = getAllParent();

      require APP . 'presentation/views/main/admin/parent/index.php';
    }
    break;

  case '/daftar-ortu/tambah':
    if (!authenticate()) {
      require APP . 'presentation/views/main/admin/parent/create.php';
    }
    break;

  case '/daftar-guru':
    if (!authenticate()) {
      $teachers = getAllTeacher();

      require APP . 'presentation/views/main/admin/teacher/index.php';
    }
    break;

  case '/daftar-guru/tambah':
    if (!authenticate()) {
      require APP . 'presentation/views/main/admin/teacher/create.php';
    }
    break;

  case '/daftar-pembayaran':
    if (!authenticate()) {
      $payments = getAllPayment();
      $students = getAllStudent();

      require APP . 'presentation/views/main/admin/payment/index.php';
    }
    break;

  case '/daftar-pembayaran/tambah':
    if (!authenticate()) {
      $students = getAllStudent();

      require APP . 'presentation/views/main/admin/payment/create.php';
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

  case '/siswa':
    if (!authenticate()) {
      $user = $_SESSION['user'];
      $student = getStudent($user['user_id']);

      require APP . 'presentation/views/main/student/index.php';
    }
    break;

  default:
    http_response_code(404);
    break;
}
