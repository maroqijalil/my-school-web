<?php

require_once APP . 'core/models/user.php';

function login()
{
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

  if ($email && $password) {
    $user = getUserModelByEmail($email);

    if ($user) {
      if (password_verify($password, $user["password"])) {
        session_start();
        $_SESSION["user"] = $user;

        header("Location: /");
      }
    } else {
      header("Location: /daftar");
    }
  }
}

function register()
{
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  if ($_POST["password"] != $_POST["password_confirmation"]) {
    echo "Password konfirmasi tidak sama!";
  } else {
    if ($email && $password && $name) {

      $params = array(
        ":name" => $name,
        ":password" => $password,
        ":email" => $email
      );

      if (storeUserModel($params)) {
        header("Location: /masuk");
      };
    }
  }
}

function logout()
{
  session_start();
  unset($_SESSION['user']);
  header("Location: /masuk");
}
