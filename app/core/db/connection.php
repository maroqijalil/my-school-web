<?php

try {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  require_once APP . 'core/db/model/user.php';
  require_once APP . 'core/db/model/student.php';
} catch (PDOException $e) {
  die("Terjadi masalah: " . $e->getMessage());
}
