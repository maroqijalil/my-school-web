<?php

function getParentModels()
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "SELECT * FROM parents";
  $stmt = $db->prepare($sql);

  $stmt->execute();

  return $stmt->fetchAll();
}

function getParentModelById($id)
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "SELECT * FROM parents WHERE parent_id=:parent_id";
  $stmt = $db->prepare($sql);

  $params = array(":parent_id" => $id);

  $stmt->execute($params);

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

function storeParentModel($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "INSERT INTO parents (name, email) 
          VALUES (:name, :email)";
  $stmt = $db->prepare($sql);

  return $stmt->execute($params);
}

function deleteParentModelById($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "DELETE FROM parents WHERE parent_id=:parent_id";
  $stmt = $db->prepare($sql);

  return $stmt->execute($params);
}

function updateParentModel($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "UPDATE parents
        SET email=:email,
        name=:name
        WHERE parent_id=:parent_id";
  $stmt = $db->prepare($sql);

  $stmt->execute($params);
  return $stmt;
}
