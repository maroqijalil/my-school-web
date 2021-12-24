<?php

define("STUDENT_IMAGE_PATH", 'assets/img/siswa' . DIRECTORY_SEPARATOR);

if (!file_exists(ROOT . STUDENT_IMAGE_PATH)) {
  mkdir(ROOT . STUDENT_IMAGE_PATH, 0777, true);
}

function getStudentModels()
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "SELECT * FROM students";
  $stmt = $db->prepare($sql);

  $stmt->execute();

  return $stmt->fetchAll();
}

function storeStudentModel($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "INSERT INTO students (nis, name, address, gender, religion, school, class, photo) 
          VALUES (:nis, :name, :address, :gender, :religion, :school, :class, :photo)";
  $stmt = $db->prepare($sql);

  return $stmt->execute($params);
}

function deleteStudentModelById($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "DELETE FROM students WHERE student_id=:student_id";
  $stmt = $db->prepare($sql);

  return $stmt->execute($params);
}

function updateStudentModel($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "UPDATE students
        SET nis=:nis,
        name=:name,
        address=:address,
        gender=:gender,
        religion=:religion,
        school=:school,
        class=:class,
        photo=:photo
        WHERE student_id=:student_id";
  $stmt = $db->prepare($sql);

  $stmt->execute($params);
  return $stmt;
}
