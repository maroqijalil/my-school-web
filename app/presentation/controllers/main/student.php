<?php

if (isset($_POST['add_student'])) {
  studentInsert();
} else if (isset($_POST['delete_student'])) {
  studentDelete();
} else if (isset($_POST['update_student'])) {
  studentUpdate();
}
