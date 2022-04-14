<?php
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/helpers/middleware.php");
include(ROOT_PATH."/app/helpers/validateDomainField.php");
$dom_ftable = 'domain_fields';
$errors = array();
$domain_id='';
$domain_name='';
$description='';

// SElect all the topics
$domain_fields = selectAll($dom_ftable);

// use it create topic form is submited
if(isset($_POST['save_domain_field'])){
  // displ($_POST);
  $errors = validateDomainField($_POST);
  if (count($errors) === 0){
    unset($_POST['save_domain_field']);
    $domain_id = create($dom_ftable, $_POST);
    $_SESSION['message'] = 'Domain Field created successfully';
    $_SESSION['type'] = 'success';
    header('location: '.BASE_URL.'/Admin2/domain_fields/index.php');
    exit();
  }else{
    $domain_name = $_POST['domain_name'];
    $description = $_POST['description'];
  }
}

// use to edit the topic
if(isset($_GET['id'])){
  $domain_id = $_GET['id'];
  $domain_field = selectOne($table, ['domain_id' => $domain_id]);
  $domain_id = $domain_field['domain_id'];
  $domain_name = $domain_field['domain_name'];
  $description = $domain_field['description'];
}
//Delete topic
if(isset($_GET['del_domf_id'])){
  $domain_id = $_GET['del_domf_id'];
  delete($dom_ftable, $domain_id, "domain_id");
  // $count = delete($table, $topic_id, "topic_id");
  $_SESSION['message'] = 'Domain field deleted successfully';
  $_SESSION['type'] = 'success';
  header('location: '.BASE_URL.'/Admin2/domain_fields/index.php');
  exit();
}
// to update topic
if (isset($_POST['update_domain'])){
    // displ($_POST);
    $errors = validateDomainField($_POST);
    if (count($errors) === 0){
      $domain_id = $_POST['domain_id'];
      unset($_POST['update_domain'], $_POST['domain_id']);
      $domain_id = update($table, $domain_id, "domain_id", $_POST);
      // $topic_id = update($table, $topic_id, $_POST);
      $_SESSION['message'] = 'Domain field updated successfully';
      $_SESSION['type'] = 'success';
      header('location: '.BASE_URL.'/admin/topics/index.php');
      exit();
    }else{
      $topic_id = $_POST['domain_id'];
      $topic_name = $_POST['domain_name'];
      $description = $_POST['description'];
    }
}
