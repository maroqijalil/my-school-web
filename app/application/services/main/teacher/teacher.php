<?php

require_once APP . 'core/models/teacher.php';

function getAllTeacher() {
  return getTeacherModels();
}

function getTeacher($id) {
  return getTeacherModelById($id);
}

function insertTeacher() {
  $nip = filter_input(INPUT_POST, 'nip', FILTER_SANITIZE_STRING);
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $degree = filter_input(INPUT_POST, 'degree', FILTER_SANITIZE_STRING);
  $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
  $photo = "";

  if ($name && $nip && $gender && $degree) {
    $pass_image = true;
    $photo_check = getimagesize($_FILES['photo']['tmp_name']);
    if ($photo_check) {
      $photo_name = TEACHER_IMAGE_PATH . time() . '_' . basename($_FILES['photo']['name']);
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
      ":nip" => $nip,
      ":name" => $name,
      ":degree" => $degree,
      ":gender" => $gender,
      ":photo" => $photo,
    );

    if ($pass_image) {
      if (storeTeacherModel($params)) {
        header("Location: /daftar-guru");
      };
    }
  }
}

function deleteTeacher()
{
  $id = filter_input(INPUT_POST, 'teacher_id', FILTER_VALIDATE_INT);

  $params = array(
    ":teacher_id" => $id,
  );

  if (deleteTeacherModelById($params)) {
    header("Location: /daftar-guru");
  };
}

function updateTeacher() {
  $id = filter_input(INPUT_POST, 'teacher_id', FILTER_VALIDATE_INT);
  $nip = filter_input(INPUT_POST, 'nip', FILTER_SANITIZE_STRING);
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $degree = filter_input(INPUT_POST, 'degree', FILTER_SANITIZE_STRING);
  $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
  $photo_ori = filter_input(INPUT_POST, 'photo_ori', FILTER_SANITIZE_STRING);
  $photo = "";

  if ($name && $nip && $gender && $degree) {
    $pass_image = true;
    $photo_check = getimagesize($_FILES['photo']['tmp_name']);
    if ($photo_check) {
      $photo_name = TEACHER_IMAGE_PATH . time() . '_' . basename($_FILES['photo']['name']);
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
      ":nip" => $nip,
      ":name" => $name,
      ":degree" => $degree,
      ":gender" => $gender,
      ":photo" => $photo,
      ":teacher_id" => $id,
    );

    if ($pass_image) {
      if (updateTeacherModel($params)->rowCount() > 0) {
        header("Location: /daftar-guru");
      };
    }
  }
}
