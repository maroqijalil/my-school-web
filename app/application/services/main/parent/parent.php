<?php

require_once APP . 'core/models/parent.php';

function getAllParent()
{
  return getParentModels();
}

function getParent($id)
{
  return getParentModelById($id);
}

function insertParent()
{
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $photo = "";
  if ($name && $email) {

    $params = array(
      ":name" => $name,
      ":email" => $email
    );

    if (storeParentModel($params)) {
      header("Location: /daftar-ortu");
    };
  }
}

function deleteParent()
{
  $id = filter_input(INPUT_POST, 'parent_id', FILTER_VALIDATE_INT);

  $params = array(
    ":parent_id" => $id,
  );

  if (deleteParentModelById($params)) {
    header("Location: /daftar-ortu");
  };
}

function updateParent()
{
  $id = filter_input(INPUT_POST, 'parent_id', FILTER_VALIDATE_INT);
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

  if ($name && $email) {

    $params = array(
      ":name" => $name,
      ":email" => $email,
      ":parent_id" => $id
    );

    if (updateParentModel($params)->rowCount() > 0) {
      header("Location: /daftar-ortu");
    };
  }
}
