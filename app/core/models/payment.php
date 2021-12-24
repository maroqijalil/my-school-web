<?php

define("PAYMENT_IMAGE_PATH", 'assets/img/pembayaran' . DIRECTORY_SEPARATOR);

if (!file_exists(ROOT . PAYMENT_IMAGE_PATH)) {
  mkdir(ROOT . PAYMENT_IMAGE_PATH, 0777, true);
}

function getPaymentModels()
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "SELECT * FROM payments";
  $stmt = $db->prepare($sql);

  $stmt->execute();

  return $stmt->fetchAll();
}

function getPaymentModelById($id)
{
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "SELECT * FROM payments WHERE payment_id=:payment_id";
  $stmt = $db->prepare($sql);

  $params = array(":payment_id" => $id);

  $stmt->execute($params);

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

function storePaymentModel($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "INSERT INTO payments (student_id, payment_date, total, photo) 
          VALUES (:student_id, :payment_date, :total, :photo)";
  $stmt = $db->prepare($sql);

  return $stmt->execute($params);
}

function deletePaymentModelById($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "DELETE FROM payments WHERE payment_id=:payment_id";
  $stmt = $db->prepare($sql);

  return $stmt->execute($params);
}

function updatePaymentModel($params) {
  $db = new PDO(DB_CONNECTION, DB_USER, DB_PASS);

  $sql = "UPDATE payments
        SET student_id=:student_id,
        payment_date=:payment_date,
        total=:total,
        photo=:photo
        WHERE payment_id=:payment_id";
  $stmt = $db->prepare($sql);

  $stmt->execute($params);
  return $stmt;
}
