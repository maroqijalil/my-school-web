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
    header("Location: /");
  } else {
    return false;
  }
}
