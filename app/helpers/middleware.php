<?php
// Change to member
function userOnly($redirect='/index.php'){
  if (empty($_SESSION['user_id'])){
    $_SESSION['message'] = 'You need to login first';
    $_SESSION['type'] = 'warning';
    header('location: ' . BASE_URL.$redirect);
  }
}

function logedinUserOnly(){
  if (!empty($_SESSION['user_id'])){
    // $_SESSION['message'] = 'You need to login first';
    // $_SESSION['type'] = 'warning';
    return true;
  }
  else {
    return false;
  }
}

function memberOnly($redirect='/index.php'){
  if (empty($_SESSION['user_id'])){
    $_SESSION['message'] = 'You need to login first';
    $_SESSION['type'] = 'warning';
    header('location: ' . BASE_URL.$redirect);
  }
}

function AdminOnly($redirect='/index.php'){
  if (empty($_SESSION['user_id']) || empty($_SESSION['role'])){
    $_SESSION['message'] = 'You are not authorized';
    $_SESSION['type'] = 'error';
    header('location: ' . BASE_URL.$redirect);
    exist(0);
  }
}

function guetsOnly($redirect='/index.php'){
  if (isset($_SESSION['user_id'])){
    $_SESSION['message'] = 'You need to login first';
    $_SESSION['type'] = 'warning';
    header('location: ' . BASE_URL.$redirect);
    exist(0);
    }
}

function checkLoginStatus(){
  if (isset($_SESSION['user_id'])){
    if($_SESSION['role'] === "Admin"){
      $_SESSION['message'] = 'You are already login as '.$_SESSION['username'];
      $_SESSION['type'] = 'success';
      header('location: ' . BASE_URL.'/Admin2');
    }
    elseif ($_SESSION['role'] === "Member") {
      $_SESSION['message'] = 'You are already login as '.$_SESSION['username'];
      $_SESSION['type'] = 'success';
      header('location: ' . BASE_URL.'/member');
    }
    else {
      $_SESSION['message'] = 'Your sussion was finished you can now login ... ';
      $_SESSION['type'] = 'info';
      header('location: ' . BASE_URL.'/login.php');
    }
    // exist(0);
    }
}
