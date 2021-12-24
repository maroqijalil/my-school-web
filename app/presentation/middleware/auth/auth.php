<?php

function authenticate() {
  session_start();

  if (!isset($_SESSION['user'])) {
    header("Location: /masuk");
  } else {
    return false;
  }
}

function redirectIfAuthenticate() {
  session_start();

  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

    if ($user['role'] == 2) {
      header("Location: /siswa");
    } else {
      header("Location: /");
    }
  } else {
    return false;
  }
}
