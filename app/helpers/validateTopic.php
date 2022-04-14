<?php
// user to validate users information
$table = 'blog_topics';
function validateTopic($topic) // $user will replace $_POST
{
  // Check if the provided values are empty or not
  $errors = array();
  if (empty($topic["topic_name"])){
    array_push($errors, 'Topic name is required');
  }

  // Check if the email already exist
  // $existingTopicName = selectOne('blog_topics', ['topic_name'=>$topic['topic_name']]);
  // if($existingTopicName){
  //   array_push($errors, 'Blog topic already exists');
  // }
  $existingTopicName = selectOne('blog_topics', ['topic_name'=>$topic['topic_name']]);
  if($existingTopicName){
    if (isset($_POST["save_up_topic"]) && $existingTopicName["topic_id"] != $topic["topic_id"]){
      array_push($errors, 'Blog topic already exist');
    }

    if (isset($_POST["add_topic"])){
      array_push($errors, 'Blog topic already exist');
    }
  }

  return $errors;
}
