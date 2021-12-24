<?php

define("TEACHER_IMAGE_PATH", 'assets/img/guru' . DIRECTORY_SEPARATOR);

if (!file_exists(ROOT . TEACHER_IMAGE_PATH)) {
  mkdir(ROOT . TEACHER_IMAGE_PATH, 0777, true);
}

function getTeacherModels()
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "SELECT * FROM teachers";
  $stmt = $db->prepare($sql);

  $stmt->execute();

  return $stmt->fetchAll();
}

function getTeacherModelById($id)
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "SELECT * FROM teachers WHERE teacher_id=:teacher_id";
  $stmt = $db->prepare($sql);

  $params = array(":teacher_id" => $id);

  $stmt->execute($params);

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

function storeTeacherModel($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "INSERT INTO teachers (nip, name, gender, degree, photo) 
          VALUES (:nip, :name, :gender, :degree, :photo)";
  $stmt = $db->prepare($sql);

  return $stmt->execute($params);
}

function deleteTeacherModelById($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "DELETE FROM teachers WHERE teacher_id=:teacher_id";
  $stmt = $db->prepare($sql);

  return $stmt->execute($params);
}

function updateTeacherModel($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "UPDATE teachers
        SET nip=:nip,
        name=:name,
        gender=:gender,
        degree=:degree,
        photo=:photo
        WHERE teacher_id=:teacher_id";
  $stmt = $db->prepare($sql);

  $stmt->execute($params);
  return $stmt;
}
