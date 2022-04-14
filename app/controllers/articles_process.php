<?php
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/helpers/middleware.php");
include(ROOT_PATH."/app/helpers/validateArticle.php");

$tb_article = "articles";
$tb_dom_field = "domain_fields";
$articles = selectAll($tb_article);

if (isset($_SESSION['user_id'])):
$member_articles = selectAll($tb_article, ['user_id'=>$_SESSION['user_id']]);
endif;

$domain_fields = selectAll($tb_dom_field);
// echo "total field ".count($domain_field);
// displ($domain_fields);
// $total_article = count(selectAll($tb_article));
$errors = array();
// Define all input field;
// $article_id = $total_article + 1;
$article_title = "";
$authors = "";
$domain_field = "";
$year = "";
$art_keywords = "";
$abstract = "";

// Create a new Blog post
if(isset($_POST['save_article'])){
  // displ($_POST);
  $errors = validateArticle($_POST);

  if(!empty($_FILES['article_file']['name'])){
    $file_name = time().'_'.$_FILES['article_file']['name']; // to make all image unique
    $destination = ROOT_PATH."/assets/article_files/".$file_name;
    $result = move_uploaded_file($_FILES['article_file']['tmp_name'], $destination); // tem is used by server to save image temporally when uploaded
    if($result){
      $_POST["article_file"] = $file_name;
      $_POST["file_path"] = $_POST["article_file"];
      unset($_POST["article_file"]);
    }
    else{
      array_push($errors, "Failed to upload the image");
    }
  }
  else{
    array_push($errors, "Article file is required");
  }
  if(count($errors) == 0){
    unset($_POST['save_article']);
    $_POST["user_id"] = $_SESSION['user_id']; // form session
    // $_POST["publish_status"] = isset($_POST["publish_status"]) ? 1 : 0; // default for all posts
    // secure the body content by using htmlentities
    $_POST["art_keywords"] = htmlentities($_POST["art_keywords"]);
    $_POST["abstract"] = htmlentities($_POST["abstract"]);
    // $regis_date = new DateTime();
    // echo $regis_date->getTimestamp();
    $_POST["regist_date"] = date("Y-m-d H:i:s");
    $_POST["up_date"] = date("Y-m-d H:i:s");

    // displ($_POST);
    $add_article_id = create($tb_article, $_POST);
    // echo " returned-> ".$add_article_id;
    if ($add_article_id > 0){
      $_SESSION['message'] = 'Acticle added successfully';
      $_SESSION['type'] = 'success';
      // displ($blog_posts_id);
      // header('location: '.BASE_URL.'/admin/articles/index.php');
      // exit();
      art_redirect();
    }
    else{
      echo "Error!!! Article could not be created";
    }

  }
  else {
    $article_id = $_POST["article_id"];
    $article_title  = $_POST["article_title"];
    $authors = $_POST["authors"];
    $domain_field = $_POST["domain_field"];
    $year = $_POST["year"];
    $art_keywords = $_POST["art_keywords"];
    $abstract = $_POST["abstract"];
    $publish_status = isset($_POST["publish_status"]) ? 1 : 0;
  }
}

// GET Data for update
if (isset($_GET['art_id'])){
  $article_array = selectOne($tb_article, ['article_id'=>$_GET['art_id']]);
  // displ($blog_post);
  $article_id = $article_array["article_id"];
  $article_title  = $article_array["article_title"];
  $authors = $article_array["authors"];
  $domain_field = $article_array["domain_field"];
  $year = $article_array["year"];
  $art_keywords = $article_array["art_keywords"];
  $abstract = $article_array["abstract"];
  $no_read = $article_array["no_read"];
  $no_read = $no_read+1;
  // $publish_status = $article_array["publish_status"];
  $sql = "UPDATE articles SET no_read = ? WHERE article_id = ?";
  $result = executeQuery1($sql, ["no_read"=>$no_read, "article_id"=>$article_id]);
}
//  fOR ADMIN
if (isset($_POST['save_up_article'])){
    $errors = validateArticle($_POST);
    if (count($errors) === 0){
      $articles_id = $_POST['art_id'];
      unset($_POST['save_up_thesis'], $_POST['art_id']);
      $thesis_id = update($tb_theses, $thesis_id, "thesis_id", $_POST);
      // $topic_id = update($table, $topic_id, $_POST);
      $_SESSION['message'] = 'Article Updated successfully';
      $_SESSION['type'] = 'success';
      header('location: '.BASE_URL.'/admin/theses/index.php');
      exit();
    }
    else{
      $article_id = $_POST["article_id"];
      $article_title = $_POST["article_title"];
      $authors = $_POST["authors"];
      $domain_field = $_POST["domain_field"];
      $year = $_POST["year"];
      $art_keywords = $_POST["art_keywords"];
      $abstract = $_POST["abstract"];
      // $publish_status = $_POST["publish_status"];
    }
}

//  fOR MEMBER
if (isset($_POST['mem_save_up_article'])){
    $errors = validateArticle($_POST);
    if (count($errors) === 0){
      $articles_id = $_POST['article_id'];
      unset($_POST['mem_save_up_article'], $_POST['article_id']);
      $thesis_id = update($tb_article, $articles_id, "article_id", $_POST);
      // $topic_id = update($table, $topic_id, $_POST);
      $_SESSION['message'] = 'Article Updated successfully';
      $_SESSION['type'] = 'success';
       art_redirect();
    }
    else{
      $article_id = $_POST["article_id"];
      $article_title = $_POST["article_title"];
      $authors = $_POST["authors"];
      $domain_field = $_POST["domain_field"];
      $year = $_POST["year"];
      $art_keywords = $_POST["art_keywords"];
      $abstract = $_POST["abstract"];
      // $publish_status = $_POST["publish_status"];
    }
}

// Delete the blog post
if (isset($_GET['del_art_id'])){
  $count = delete($tb_article, $_GET['del_art_id'], "article_id");
  $_SESSION['message'] = 'Article deleted successfully';
  $_SESSION['type'] = 'success';
  art_redirect();
}

if (isset($_GET['publish_status']) && isset($_GET['art_id'])){
  $publish_status = $_GET['publish_status'];
  $post_id = $_GET['blg_p_id'];
  // Only past the key value pair needed to be updated
  $blog_posts_id = update($tb_article, $post_id, "post_id", ['publish_status'=>$publish_status]);
  $_SESSION['message'] = 'Blog post publish_status changed';
  $_SESSION['type'] = 'success';
  header('location: '.BASE_URL.'/Admine/articles/index.php');
  exit();
}

function art_redirect(){
  if ($_SESSION['role'] === 'Admin'){
    header('location: '.BASE_URL.'/admin/articles');
    exit();
  } elseif ($_SESSION['role'] === 'Member') {
    header('location: '.BASE_URL.'/member/articles');
    exit();
  }
}
