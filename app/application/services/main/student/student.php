<?php

require_once APP . 'core/models/student.php';
require_once APP . 'core/models/user.php';

function getAllStudent()
{
  return getStudentModels();
}

function getStudent($id)
{
  return getStudentModelById($id);
}

function createUserForStudent($name, $email)
{
  $password = randomPassword(8);

  if ($email && $password) {
    $params = array(
      ":name" => $name,
      ":password" => password_hash($password, PASSWORD_DEFAULT),
      ":email" => $email,
      ":role" => 2,
    );

    $user_id = storeUserModelWithId($params);

    if ($user_id) {
      return array(
        'user_id' => $user_id, 
        'password' => $password, 
      );
    } else {
      return NULL;
    }
  } else {
    return NULL;
  }
}

function insertStudent()
{
  $nis = filter_input(INPUT_POST, 'nis', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
  $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
  $religion = filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING);
  $school = filter_input(INPUT_POST, 'school', FILTER_SANITIZE_STRING);
  $class = filter_input(INPUT_POST, 'class', FILTER_VALIDATE_INT);
  $photo = "";

  if ($nis && $email && $name && $address && $gender && $religion && $school && $class) {
    $user = createUserForStudent($name, $email);

    if ($user) {
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
  
      if ($pass_image) {
        $params = array(
          ":nis" => $nis,
          ":user_id" => $user['user_id'],
          ":password" => $user['password'],
          ":name" => $name,
          ":address" => $address,
          ":gender" => $gender,
          ":religion" => $religion,
          ":school" => $school,
          ":class" => $class,
          ":photo" => $photo,
        );

        if (storeStudentModel($params)) {
          header("Location: /daftar-siswa");
        };
      }
    } else {
      echo "Terjadi kesalahan, pastikan masukkan email dengan benar!";
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
    header("Location: /daftar-siswa");
  };
}

function updateStudent()
{
  $id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);
  $nis = filter_input(INPUT_POST, 'nis', FILTER_SANITIZE_STRING);
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
  $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
  $religion = filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING);
  $school = filter_input(INPUT_POST, 'school', FILTER_SANITIZE_STRING);
  $class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING);
  $photo_ori = filter_input(INPUT_POST, 'photo_ori', FILTER_SANITIZE_STRING);
  $photo = "";

  if ($name && $address && $gender && $religion && $school && $class) {
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
      ":nis" => $nis,
      ":name" => $name,
      ":address" => $address,
      ":gender" => $gender,
      ":religion" => $religion,
      ":school" => $school,
      ":class" => $class,
      ":photo" => $photo,
      ":student_id" => $id,
    );

    if ($pass_image) {
      if (updateStudentModel($params)->rowCount() > 0) {
        header("Location: /daftar-siswa");
      };
    }
  }
}
