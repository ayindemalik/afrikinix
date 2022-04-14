<?php
// include the db path to use the ready defined functions
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/helpers/middleware.php");
include(ROOT_PATH."/app/helpers/validateUser.php");
// session_start();
checkLoginStatus();

// Maintain user values for better user experience
$errors = array();
$firstname = '';
$midlename = '';
$lastname = '';
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$role = '';
$table = 'users';

// SElect all the topics
$users = selectAll($table);

function loginUser($user){
  $_SESSION['user_id'] = $user['user_id'];
  $_SESSION['username'] = $user['username'];
  $_SESSION['role'] = $user['role'];
  $_SESSION['message'] = 'You are now logged in';
  $_SESSION['type'] = 'success';
  if ($_SESSION['role'] === 'Admin'){
    // header('location: '.BASE_URL.'/admin/users/index.php');
    header('location: '.BASE_URL.'/admin2/index.php');

  } elseif ($_SESSION['role'] === 'Member') {
    // header('location: '.BASE_URL.'/member/index.php');
    header('location: '.BASE_URL.'/member/index.php');
  } else {
    header('location: '.BASE_URL.'/index.php');
  }
  exit(); // stop the scriptexecution not to go further
}

if (isset($_POST["register-btn"]) || isset($_POST["admin_create_user"]) ){ // Is an array that conntains all values collected form the form
    // use function for validateUser function for all ifs checking

    $errors = validateUser($_POST);// used to display value from error array
    // Chech there is no error
    if (count($errors) == 0){
      if(isset($_POST["register-btn"]) ){  // remove unecessary variables
        unset($_POST['passwordConf'], $_POST['register-btn'], $_POST['create-user']);
        // encrypt the password   // password_hash takes 2 param (string and PHP KEYWORK)
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['role'] = 'Member';
        /// use the create function form db.php file to insert new user into db
        // displ($_POST);
        $user_id = create($table, $_POST); // return last user id creaed
        $user = selectOne($table, ['user_id'=>$user_id]); // select back the created user based on is id
        loginUser($user);
      }
      else{
        unset($_POST['passwordConf'], $_POST['admin_create_user']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create($table, $_POST);
        $user = selectOne($table, ['user_id'=>$user_id]);
        $_SESSION['message'] = 'User created successfully ';
        $_SESSION['type'] = 'success';
        header('location: '.BASE_URL.'/admin2/users/index.php');
        exit();
      }
      // set default value for admin for normal $users
      // $_POST['role'] = 'Member';
      // /// use the create function form db.php file to insert new user into db
      // $user_id = create($table, $_POST);
      // $user = selectOne($table, ['user_id'=>$user_id]); // select back the created user based on is id
      // // displ($_POST);
      // // displ($user);
      // // Log user in
      // loginUser($user);
    }
    else {
    $firstname = $_POST["firstname"];
    $midlename = $_POST["midlename"];
    $lastname =  $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConf = $_POST["passwordConf"];
    }
    // displ($_POST);
  }

if (isset($_POST['login-btn'])){
  // displ($_POST);
  $errors = validateLogin($_POST);
  // displ($errors);
  if (count($errors)  == 0){

    $user = selectOne($table, ['username' => $_POST['username']]);
    // displ($user);
    echo password_verify($_POST['password'], $user['password']);
    if($user && password_verify($_POST['password'], $user['password'])){
      // log in redirect

      loginUser($user);

    } else{
      array_push($errors, 'Wrong credentials');
    }
  }
  $username = $_POST['username'];
  $password = $_POST['password'];
}

// Save update
if (isset($_POST["member-save-update"]) || isset($_POST["admin-save-user-update"]) ){ // Is an array that conntains all values collected form the form
    // displ($_POST);
    $errors = validateUser($_POST);
    if (count($errors) == 0){
      // displ($_POST);
      $user_id = $_POST["user_id"];
      if(isset($_POST["member-save-update"])){
        unset($_POST['passwordConf'], $_POST['member-save-update'], $_POST['user_id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['role'] = 'Member';
        /// use the create function form db.php file to insert new user into db
        $user_id = update($table, $post_id, "user_id", $_POST);
        $user = selectOne($table, ['user_id'=>$user_id]); // select back the created user based on is id
        // displ($_POST); displ($user);
        loginUser($user);
      }
      else{
        // displ($_POST);
        unset($_POST['passwordConf'], $_POST['admin-save-user-update'], $_POST['user_id']);
        // displ($_POST);
        $user_id = update($table, $user_id, "user_id", $_POST);
        $user = selectOne($table, ['user_id'=>$user_id]);
        $_SESSION['message'] = 'User updated successfully';
        $_SESSION['type'] = 'success';
        header('location: '.BASE_URL.'/admin2/users/index.php');
        exit();
        }
      }
      else {
      $user_id = $_POST["user_id"];
      $username = $_POST["username"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $passwordConf = $_POST["passwordConf"];
      $role = $_POST["role"];
    }
    // displ($_POST);
  }

//Edit USer
if (isset($_GET["id"])){
  $user = selectOne($table, ['user_id'=>$_GET['id']]);
  $user_id = $user["user_id"];
  $username = $user["username"];
  $email = $user["email"];
  $password = $user["password"];
  $role = $user["role"];
}

// DElete user
// Delete the blog post
if (isset($_GET['usr_id'])){
  $count = delete($table, $_GET['usr_id'], "user_id");
  $_SESSION['message'] = 'User deleted successfully';
  $_SESSION['type'] = 'success';
  header('location: '.BASE_URL.'/Admin2/users/index.php');
  exit();
}
?>
