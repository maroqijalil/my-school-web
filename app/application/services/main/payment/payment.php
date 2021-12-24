<?php

require_once APP . 'core/models/payment.php';

function getAllPayment() {
  return getPaymentModels();
}

function getPayment($id) {
  return getPaymentModelById($id);
}

function insertPayment() {
  $student_id = filter_input(INPUT_POST, 'student_id', FILTER_SANITIZE_STRING);
  $payment_date = filter_input(INPUT_POST, 'payment_date', FILTER_DEFAULT);
  $total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_STRING);
  $photo = "";

  if ($student_id && $total && $payment_date) {
    $pass_image = true;
    $photo_check = getimagesize($_FILES['photo']['tmp_name']);
    if ($photo_check) {
      $photo_name = PAYMENT_IMAGE_PATH . time() . '_' . basename($_FILES['photo']['name']);
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
      ":student_id" => $student_id,
      ":payment_date" => $payment_date,
      ":total" => $total,
      ":photo" => $photo,
    );

    if ($pass_image) {
      if (storepaymentModel($params)) {
        header("Location: /daftar-pembayaran");
      };
    }
  }
}

function deletePayment()
{
  $id = filter_input(INPUT_POST, 'payment_id', FILTER_VALIDATE_INT);

  $params = array(
    ":payment_id" => $id,
  );

  if (deletepaymentModelById($params)) {
    header("Location: /daftar-pembayaran");
  };
}

function updatePayment() {
  $id = filter_input(INPUT_POST, 'payment_id', FILTER_VALIDATE_INT);
  $student_id = filter_input(INPUT_POST, 'student_id', FILTER_SANITIZE_STRING);
  $payment_date = filter_input(INPUT_POST, 'payment_date', FILTER_SANITIZE_STRING);
  $total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_STRING);
  $photo_ori = filter_input(INPUT_POST, 'photo_ori', FILTER_SANITIZE_STRING);
  $photo = "";

  if ($student_id && $total && $payment_date) {
    $pass_image = true;
    $photo_check = getimagesize($_FILES['photo']['tmp_name']);
    if ($photo_check) {
      $photo_name = PAYMENT_IMAGE_PATH . time() . '_' . basename($_FILES['photo']['name']);
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
      ":student_id" => $student_id,
      ":payment_date" => $payment_date,
      ":total" => $total,
      ":photo" => $photo,
      ":payment_id" => $id,
    );

    if ($pass_image) {
      if (updatePaymentModel($params)->rowCount() > 0) {
        header("Location: /daftar-pembayaran");
      };
    }
  }
}
