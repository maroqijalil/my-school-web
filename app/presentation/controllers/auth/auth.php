<?php

require_once APP . 'application/services/auth/auth.php';

if (isset($_POST['login'])) {
  login();
} else if (isset($_POST['register'])) {
  register();
} else if (isset($_POST['logout'])) {
  logout();
}
