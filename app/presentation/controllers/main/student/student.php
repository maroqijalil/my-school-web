<?php

require_once APP . 'application/services/main/student/student.php';

if (isset($_POST['add_student'])) {
  insertStudent();
} else if (isset($_POST['delete_student'])) {
  deleteStudent();
} else if (isset($_POST['update_student'])) {
  updateStudent();
} else {
  $url = parse_url($_SERVER['REQUEST_URI']);

  parse_str($url['query'], $params);
  if (isset($params['page'])) {
    if ($params['page'] == 'siswa') {
      if (isset($params['student_id'])) {
        if (!authenticate()) {
          $student = getStudent($_GET['student_id']);
    
          require APP . 'presentation/views/main/admin/student/edit.php';
        }
      } else {
        echo "Data siswa tidak ditemukan";
      }
    }
  }
}
