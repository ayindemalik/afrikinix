<?php
// user to validate users information
function validatePost($blog_post) // $user will replace $_POST
{
  // displ($_POST);
  // Check if the provided values are empty or not
  $errors = array();
  if (empty($blog_post["blog_title"])){
    array_push($errors, 'Post title is required');
  }
  if (empty($blog_post["blog_body"])){
    array_push($errors, 'Blog body is required');
  }
  if (empty($blog_post["topic_id"])){
    array_push($errors, 'Topic of the blog is required');
  }
  // Check if the blog with this title already exist
  $existingPost = selectOne('blog_posts', ['blog_title'=>$blog_post['blog_title']]);
  if($existingPost){
    if (isset($_POST["update-blog-post"]) && $existingPost["post_id"] != $blog_post["post_id"]){
      array_push($errors, 'A blog with this title is already exist');
    }

    if (isset($_POST["add-blog-post"])){
      array_push($errors, 'A blog with this title is already exist');
    }
  }

  return $errors;
}
