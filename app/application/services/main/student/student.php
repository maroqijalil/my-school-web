<?php

require_once APP . 'core/models/student.php';

function getAllStudent() {
  return getStudentModels();
}

function insertStudent() {
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
  $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
  $religion = filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING);
  $school = filter_input(INPUT_POST, 'school', FILTER_SANITIZE_STRING);
  $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);
  $photo = "";

  if ($name && $address && $gender && $religion && $school && $department) {
    $pass_image = true;
    $photo_check = getimagesize($_FILES['photo']['tmp_name']);
    if ($photo_check) {
      $photo_name = STUDENT_IMAGE_PATH . time() . '_' . basename($_FILES['photo']['name']);
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
      if (storeStudentModel($params)) {
        header("Location: /");
      };
    }
  }
}

function deleteStudent()
{
  $id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);

  $params = array(
    ":student_id" => $id,
  );

  if (deleteStudentModelById($params)) {
    header("Location: /");
  };
}

function updateStudent() {
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
    $pass_image = true;
    $photo_check = getimagesize($_FILES['photo']['tmp_name']);
    if ($photo_check) {
      $photo_name = STUDENT_IMAGE_PATH . time() . '_' . basename($_FILES['photo']['name']);
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
      if (updateStudentModel($params)->rowCount() > 0) {
        header("Location: /");
      };
    }
  }
}
