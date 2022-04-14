<?php
// $article_post replace $_POST array
function validateFormQuestion($question_form)
{
  // displ($_POST);
  $errors = array();
  // if (empty($article_post["article_id"])){
  //   array_push($errors, 'Article is required');
  // }
  if (empty($question_form["lang"]) || $question_form["lang"]== ""){
    array_push($errors, "Please select the question language");
  }

  if (empty($question_form["tags"]) || $question_form["tags"]== ""){
    array_push($errors, "Please add at least one tag");
  }

  if (empty($question_form["heading"]) || $question_form["heading"]== ""){
    array_push($errors, 'Please provide heading for your question');
  }
  if (empty($question_form["content"]) || $question_form["content"]== ""){
    array_push($errors, "Question's content cannot be empty...");
  }

  return $errors;
}
