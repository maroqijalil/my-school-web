<?php

require_once APP . 'application/services/main/parent/parent.php';

if (isset($_POST['add_parent'])) {
  insertParent();
} else if (isset($_POST['delete_parent'])) {
  deleteParent();
} else if (isset($_POST['update_parent'])) {
  updateParent();
} else {
  $url = parse_url($_SERVER['REQUEST_URI']);

  parse_str($url['query'], $params);
  if (isset($params['page'])) {
    if ($params['page'] == 'ortu') {
      if (isset($params['parent_id'])) {
        if (!authenticate()) {
          $parent = getParent($_GET['parent_id']);
    
          require APP . 'presentation/views/main/admin/parent/edit.php';
        }
      } else {
        echo "Data ortu tidak ditemukan";
      }
    }
  }
}
