<?php

function getUserModelByEmail($email) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "SELECT * FROM users WHERE email=:email";
  $stmt = $db->prepare($sql);

  $params = array(":email" => $email);

  $stmt->execute($params);

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

function storeUserModel($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "INSERT INTO users (name, email, password) 
          VALUES (:name, :email, :password)";
  $stmt = $db->prepare($sql);

  return $stmt->execute($params);
}
