<?php
// $thesis_post replace $_POST array
function validateThesis($thesis_post)
{
  // displ($_POST);
  $errors = array();
  // if (empty($thesis_post["article_id"])){
  //   array_push($errors, 'Article is required');
  // }
  if (empty($thesis_post["thesis_title"])){
    array_push($errors, "Thesis title is required");
  }
  if (empty($thesis_post["authors"])){
    array_push($errors, "Thesis's authors are required");
  }
  if (empty($thesis_post["university"])){
    array_push($errors, "University name is required");
  }
  if (empty($thesis_post["department"])){
    array_push($errors, "Department is required");
  }
  if (empty($thesis_post["degree_level"])){
    array_push($errors, "The degree level is required");
  }
  if (empty($thesis_post["year"])){
    array_push($errors, "Achievment year is required");
  }
  if (empty($thesis_post["domain_field"])){
    array_push($errors, "Major domain of the thesis is not selected");
  }
  if (empty($thesis_post["thes_keywords"])){
    array_push($errors, "Thesis's keywords are required");
  }
  if (empty($thesis_post["abstract"])){
    array_push($errors, "The thesis's abstract is required");
  }
  // Check if the blog with this title already exist
  // $existingPost = selectOne('articles', ['article_title'=>$thesis_post['articles']]);
  // if($existingPost){
  //   if (isset($_POST["update_article"]) && $existingPost["article_id"] != $articles["article_id"]){
  //     array_push($errors, 'An article with this title is already exist');
  //   }
  //
  //   if (isset($_POST["save_article"])){
  //     array_push($errors, 'An article with this title is already exist');
  //   }
  // }

  return $errors;
}
