<?php

function randomPassword($length = 6)
{
  $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $pass = array();
  $alphaLength = strlen($alphabet) - 1;
  for ($i = 0; $i < $length; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
  }
  return implode($pass);
}

function getUserModelByEmail($email)
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "SELECT * FROM users WHERE email=:email";
  $stmt = $db->prepare($sql);

  $params = array(":email" => $email);

  $stmt->execute($params);

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

function storeUserModel($params)
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "INSERT INTO users (name, email, password, role) 
          VALUES (:name, :email, :password, :role)";
  $stmt = $db->prepare($sql);

  return $stmt->execute($params);
}

function storeUserModelWithId($params)
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "INSERT INTO users (name, email, password, role) 
          VALUES (:name, :email, :password, :role)";
  $stmt = $db->prepare($sql);

  if ($stmt->execute($params)) {
    return $db->lastInsertId();
  } else {
    return NULL;
  }
}
