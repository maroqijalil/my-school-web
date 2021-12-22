<?php

function studentAll()
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "SELECT * FROM students";
  $stmt = $db->prepare($sql);

  $stmt->execute();

  return $stmt->fetchAll();
}

function studentInsert()
{
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
  $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
  $religion = filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING);
  $school = filter_input(INPUT_POST, 'school', FILTER_SANITIZE_STRING);
  $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);
  $photo = "";

  if ($name && $address && $gender && $religion && $school && $department) {
    $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

    $pass_image = true;
    $photo_check = getimagesize($_FILES['photo']['tmp_name']);
    if ($photo_check) {
      $photo_name = 'assets/img/' . time() . '_' . basename($_FILES['photo']['name']);
      $photo_dir = ROOT . $photo_name;

      if ($_FILES['photo']['size'] > 2000000) {
        echo "File terlalu besar (max 2MB).";

        $pass_image = false;
      } else {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo_dir)) {
          $photo = URL . $photo_name;
        } else {
          echo "Terjadi kesalahan dalam upload file, coba ulangi!";

          $pass_image = false;
        }
      }
    }

    $sql = "INSERT INTO students (name, address, gender, religion, school, department, photo) 
            VALUES (:name, :address, :gender, :religion, :school, :department, :photo)";
    $stmt = $db->prepare($sql);

    $params = array(
      ":name" => $name,
      ":address" => $address,
      ":gender" => $gender,
      ":religion" => $religion,
      ":school" => $school,
      ":department" => $department,
      ":photo" => $photo,
    );

    if ($pass_image) {
      $saved = $stmt->execute($params);

      if ($saved) {
        header("Location: /");
      };
    }
  }
}

function studentDelete()
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);

  $sql = "DELETE FROM students WHERE student_id=:student_id";
  $stmt = $db->prepare($sql);

  $params = array(
    ":student_id" => $id,
  );

  $deleted = $stmt->execute($params);

  if ($deleted) {
    header("Location: /");
  };
}

function studentUpdate()
{
  $id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
  $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
  $religion = filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING);
  $school = filter_input(INPUT_POST, 'school', FILTER_SANITIZE_STRING);
  $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);
  $photo_ori = filter_input(INPUT_POST, 'photo_ori', FILTER_SANITIZE_STRING);
  $photo = "";

  if ($name && $address && $gender && $religion && $school && $department) {
    $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

    $pass_image = true;
    $photo_check = getimagesize($_FILES['photo']['tmp_name']);
    if ($photo_check) {
      $photo_name = 'assets/img/' . time() . '_' . basename($_FILES['photo']['name']);
      $photo_dir = ROOT . $photo_name;

      if ($_FILES['photo']['size'] > 2000000) {
        echo "File terlalu besar (max 2MB).";

        $pass_image = false;
      } else {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $photo_dir)) {
          $photo = URL . $photo_name;
        } else {
          echo "Terjadi kesalahan dalam upload file, coba ulangi!";

          $pass_image = false;
        }
      }
    } else {
      $photo = $photo_ori;
    }

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

    $params = array(
      ":student_id" => $id,
      ":name" => $name,
      ":address" => $address,
      ":gender" => $gender,
      ":religion" => $religion,
      ":school" => $school,
      ":department" => $department,
      ":photo" => $photo,
    );

    if ($pass_image) {
      $stmt->execute($params);

      if ($stmt->rowCount() > 0) {
        header("Location: /");
      };
    }
  }
}
