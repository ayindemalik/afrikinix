<?php
// user to validate users information
function validateUser($user) // $user will replace $_POST
{
  // Check if the provided values are empty or not
  $errors = array();
  if (empty($user["firstname"])){
    array_push($errors, 'Firstname is required');
  }
  if (empty($user["lastname"])){
    array_push($errors, 'Lastname is required');
  }
  if (empty($user["username"])){
    array_push($errors, 'username is required');
  }
  if (empty($user["email"])){
    array_push($errors, 'email is required');
  }
  if (empty($user["password"])){
    array_push($errors, 'password is required');
  }
  // Check both password
  if ($user["passwordConf"] !== $user["password"]){
    array_push($errors, 'password not match');
  }
  // Add ckeck for user role in admin adding user
  if (isset($user["admin_create_user"]) && empty($user["role"])){
    array_push($errors, 'role selection is required');
  }

  // Check if the email already exist
  $existingUserUsername = selectOne('users', ['username'=>$user['username']]);
  // if($existingUserUsername){
  //   array_push($errors, 'Username already exists');
  // }
  if($existingUserUsername){
    if (isset($_POST["userRegist"]) ){
      array_push($errors, 'Username already exists');
    }

    if (isset($_POST["admin-save-user-update"]) && $existingUserUsername["user_id"] != $user["user_id"]){
      array_push($errors, 'Username already exists');
    }

    if (isset($_POST["admin_create_user"])){
      array_push($errors, 'Username already exists');
    }
  }


  $existingUserEmail = selectOne('users', ['email'=>$user['email']]);
  // if($existingUserEmail){
  //   array_push($errors, 'Email already exists');
  // }
  if($existingUserEmail){
    if (isset($_POST["userRegist"]) ){
      array_push($errors, 'User email already exists');
    }

    if (isset($_POST["admin-save-user-update"]) && $existingUserEmail["user_id"] != $user["user_id"]){
      array_push($errors, 'User email already exists');
    }

    if (isset($_POST["admin_create_user"])){
      array_push($errors, 'User email already exists');
    }
  }

  return $errors;
}

function validateLogin($user) // $user will replace $_POST
{
  $errors = array();
  if (empty($user["username"])){
    array_push($errors, 'username is required');
  }

  if (empty($user["password"])){
    array_push($errors, 'password is required');
  }
  return $errors;
}
