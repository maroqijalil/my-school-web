<?php

require_once APP . 'application/services/main/student/student.php';

if (isset($_POST['add_student'])) {
  insertStudent();
} else if (isset($_POST['delete_student'])) {
  deleteStudent();
} else if (isset($_POST['update_student'])) {
  updateStudent();
}
