<?php
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/helpers/middleware.php");
include(ROOT_PATH."/app/helpers/validateTopic.php");
$table = 'blog_topics';
$errors = array();
$topic_id='';
$topic_name='';
$description='';

// SElect all the topics
$topics = selectAll($table);

// use it create topic form is submited
if(isset($_POST['add_topic'])){
  // displ($_POST);
  // Check the validation
  $errors = validateTopic($_POST);
  if (count($errors) === 0){
    unset($_POST['add_topic']);
    $topic_id = create($table, $_POST);
    $_SESSION['message'] = 'Blog topic created successfully';
    $_SESSION['type'] = 'success';
    header('location: '.BASE_URL.'/Admin2/topics/index.php');
    exit();
  }
  else{
    $topic_name = $_POST['topic_name'];
    $description = $_POST['description'];
  }
}

// use to edit the topic
if(isset($_GET['topic_id'])){
  $topic_id = $_GET['topic_id'];
  $topic = selectOne($table, ['topic_id' => $topic_id]);
  $topic_id = $topic['topic_id'];
  $topic_name = $topic['topic_name'];
  $description = $topic['description'];
}
//Delete topic
if(isset($_GET['del_id'])){
  $topic_id = $_GET['del_id'];
  delete($table, $topic_id, "topic_id");
  // $count = delete($table, $topic_id, "topic_id");
  $_SESSION['message'] = 'Blog topic deleted successfully';
  $_SESSION['type'] = 'success';
  header('location: '.BASE_URL.'/Admin2/topics/index.php');
  exit();
}
// to update topic
if (isset($_POST['save_up_topic'])){
  // if (isset($_POST['btn-update-topic'])){
  // save_up_topic
    // displ($_POST);
    $errors = validateTopic($_POST);
    if (count($errors) === 0){
      $topic_id = $_POST['topic_id'];
      unset($_POST['save_up_topic'], $_POST['topic_id']);
      $topic_id = update($table, $topic_id, "topic_id", $_POST);
      // $topic_id = update($table, $topic_id, $_POST);
      $_SESSION['message'] = 'Blog topic Updated successfully';
      $_SESSION['type'] = 'success';
      header('location: '.BASE_URL.'/Admin2/topics/index.php');
      exit();
    }else{
      $topic_id = $_POST['topic_id'];
      $topic_name = $_POST['topic_name'];
      $description = $_POST['description'];
    }
}
