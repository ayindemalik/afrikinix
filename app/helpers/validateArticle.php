<?php
// $article_post replace $_POST array
function validateArticle($article_post)
{
  // displ($_POST);
  $errors = array();
  // if (empty($article_post["article_id"])){
  //   array_push($errors, 'Article is required');
  // }
  if (empty($article_post["article_title"])){
    array_push($errors, 'Article title is required');
  }
  if (empty($article_post["authors"])){
    array_push($errors, "Article's authors are required");
  }
  if (empty($article_post["domain_field"])){
    array_push($errors, "Major domain of the article is not selected");
  }
  if (empty($article_post["year"])){
    array_push($errors, "Year is required");
  }
  if (empty($article_post["art_keywords"])){
    array_push($errors, "Keywords of the article are required");
  }
  if (empty($article_post["abstract"])){
    array_push($errors, "Abstract of the article is required");
  }
  // Check if the blog with this title already exist
  // $existingPost = selectOne('articles', ['article_title'=>$article_post['articles']]);
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
