<?php

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

  $sql = "INSERT INTO students (name, address, gender, religion, school, department, photo) 
          VALUES (:name, :address, :gender, :religion, :school, :department, :photo)";
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
        SET name=:name,
        address=:address,
        gender=:gender,
        religion=:religion,
        school=:school,
        department=:department,
        photo=:photo
        WHERE student_id=:student_id";
  $stmt = $db->prepare($sql);

  $stmt->execute($params);
  return $stmt;
}
