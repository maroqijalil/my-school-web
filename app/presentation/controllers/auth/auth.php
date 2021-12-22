<?php

if (isset($_POST['login'])) {
  login();
} else if (isset($_POST['register'])) {
  register();
} else if (isset($_POST['logout'])) {
  logout();
}
