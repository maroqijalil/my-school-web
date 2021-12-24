<?php

require_once APP . 'application/services/main/teacher/teacher.php';

if (isset($_POST['add_teacher'])) {
  insertTeacher();
} else if (isset($_POST['delete_teacher'])) {
  deleteTeacher();
} else if (isset($_POST['update_teacher'])) {
  updateTeacher();
} else {
  $url = parse_url($_SERVER['REQUEST_URI']);

  parse_str($url['query'], $params);
  if (isset($params['page'])) {
    if ($params['page'] == 'guru') {
      if (isset($params['teacher_id'])) {
        if (!authenticate()) {
          $teacher = getTeacher($_GET['teacher_id']);
    
          require APP . 'presentation/views/main/admin/teacher/edit.php';
        }
      } else {
        echo "Data guru tidak ditemukan";
      }
    }
  }
}
