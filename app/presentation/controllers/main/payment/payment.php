<?php

require_once APP . 'application/services/main/payment/payment.php';

if (isset($_POST['add_payment'])) {
  insertPayment();
} else if (isset($_POST['delete_payment'])) {
  deletePayment();
} else if (isset($_POST['update_payment'])) {
  updatePayment();
} else {
  $url = parse_url($_SERVER['REQUEST_URI']);

  parse_str($url['query'], $params);
  if (isset($params['page'])) {
    if ($params['page'] == 'pembayaran') {
      if (isset($params['payment_id'])) {
        if (!authenticate()) {
          $payment = getpayment($_GET['payment_id']);
    
          require APP . 'presentation/views/main/admin/payment/edit.php';
        }
      } else {
        echo "Data pembayaran tidak ditemukan";
      }
    }
  }
}
