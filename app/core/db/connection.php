<?php

try {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);
} catch (PDOException $e) {
  die("Terjadi masalah: " . $e->getMessage());
}
