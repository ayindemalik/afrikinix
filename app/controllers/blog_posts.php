<?php
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/helpers/middleware.php");
include(ROOT_PATH."/app/helpers/validatePost.php");

$tb_blog_posts = 'blog_posts';
// SElect all the topics
$blog_topics = selectAll('blog_topics');
$blog_posts = selectAll($tb_blog_posts);
if(isset($_SESSION['user_id'])){
  global $mem_blog_posts;
  $mem_blog_posts = selectAll($tb_blog_posts, ['user_id'=>$_SESSION['user_id']]);
}


$errors = array();
$blog_title = "";
$blog_body = "";
$topic_id = "";
$publish_status = "";

// TO SEt the Blog post values for update
if (isset($_GET['blg_post_id'])){
  $blog_post = selectOne($tb_blog_posts, ['post_id'=>$_GET['blg_post_id']]);
  // displ($blog_post);
  $post_id = $blog_post["post_id"];
  $blog_image = $blog_post["blog_post_image"];
  $blog_title = $blog_post["blog_title"];
  $blog_body = $blog_post["blog_body"];
  $topic_id = $blog_post["topic_id"];
  $user_id = $blog_post["user_id"];
  $user = selectOne("users", ['user_id'=>$user_id]);
  $publish_status = $blog_post["publish_status"];
  $topic_related_blog_posts = selectAll($tb_blog_posts, ['topic_id'=>$topic_id]);
}
// Delete the blog post
if (isset($_GET['delet_post_id'])){
  $count = delete($tb_blog_posts, $_GET['delet_post_id'], "post_id");
  $_SESSION['message'] = 'Blog post deleted successfully';
  $_SESSION['type'] = 'success';
  blog_redirect();
}
// publish and Unpublish
// publish_status blg_p_id
if (isset($_GET['publish_status']) && isset($_GET['blg_p_id'])){
  $publish_status = $_GET['publish_status'];
  $post_id = $_GET['blg_p_id'];
  // Only past the key value pair needed to be updated
  $blog_posts_id = update($tb_blog_posts, $post_id, "post_id", ['publish_status'=>$publish_status]);
  $_SESSION['message'] = 'Blog post publish_status changed';
  $_SESSION['type'] = 'success';
  blog_redirect();
}

// Create a new Blog post
if(isset($_POST['add-blog-post'])){
  // displ($_POST);
  // if "file" is on the form FILE[] is used instead of POST
  // displ($_FILES['blog_posts_image']['name']);
  $errors = validatePost($_POST);
  if(!empty($_FILES['blog_post_image']['name'])){
    $image_name = time().'_'.$_FILES['blog_post_image']['name']; // to make all image unique
    $destination = ROOT_PATH."/assets/images/blog_post_images/".$image_name;
    $result = move_uploaded_file($_FILES['blog_post_image']['tmp_name'], $destination); // tem is used by server to save image temporally when uploaded
    if($result){
      $_POST["blog_post_image"] = $image_name;
    }
    else{
      array_push($errors, "Failed to upload the image");
    }
  }else{
    array_push($errors, "Blog post image is required");
  }
  if(count($errors) == 0){
    unset($_POST['add-blog-post']);
    $_POST["user_id"] = $_SESSION['user_id']; // form session
    $_POST["publish_status"] = isset($_POST["publish_status"]) ? 1 : 0; // default for all posts
    // secure the body content by using htmlentities
    $_POST["blog_body"] = htmlentities($_POST["blog_body"]);

    $blog_posts_id = create($tb_blog_posts, $_POST);
    $_SESSION['message'] = 'Blog post created successfully';
    $_SESSION['type'] = 'success';
    // displ($blog_posts_id);
    blog_redirect();
  } else {
    $blog_title = $_POST["blog_title"];
    $blog_body = $_POST["blog_body"];
    $topic_id = $_POST["topic_id"];
    $publish_status = isset($_POST["publish_status"]) ? 1 : 0;;
  }
}
// Update any post based on it post_id
if(isset($_POST['update-blog-post'])){
  $errors = validatePost($_POST);
  if(!empty($_FILES['blog_post_image']['name'])){
    $image_name = time().'_'.$_FILES['blog_post_image']['name']; // to make all image unique
    $destination = ROOT_PATH."/assets/images/blog_post_images/".$image_name;
    $result = move_uploaded_file($_FILES['blog_post_image']['tmp_name'], $destination); // tem is used by server to save image temporally when uploaded
    if($result){
      $_POST["blog_post_image"] = $image_name;
    }
    else{
      array_push($errors, "Failed to upload the image");
    }
  }else{
      array_push($errors, "Blog post image is required");
  }
  if(count($errors) == 0){
    $post_id = $_POST["post_id"];
    unset($_POST['update-blog-post'], $_POST["post_id"]);
    $_POST["user_id"] = $_SESSION["user_id"]; // form session
    $_POST["publish_status"] = isset($_POST["publish_status"]) ? 1 : 0; // default for all posts
    $_POST["blog_body"] = htmlentities($_POST["blog_body"]);

    $blog_posts_id = update($tb_blog_posts, $post_id, "post_id", $_POST);
    $_SESSION['message'] = 'Blog post updated successfully';
    $_SESSION['type'] = 'success';
    // displ($blog_posts_id);
    blog_redirect();
  } else {
    $blog_title = $_POST["blog_title"];
    $blog_body = $_POST["blog_body"];
    $topic_id = $_POST["topic_id"];
    $publish_status = isset($_POST["publish_status"]) ? 1 : 0;
  }
}

if(isset($_POST['mem_save_up_blop'])){
  $errors = validatePost($_POST);
  if(!empty($_FILES['blog_post_image']['name'])){
    $image_name = time().'_'.$_FILES['blog_post_image']['name']; // to make all image unique
    $destination = ROOT_PATH."/assets/images/blog_post_images/".$image_name;
    $result = move_uploaded_file($_FILES['blog_post_image']['tmp_name'], $destination); // tem is used by server to save image temporally when uploaded
    if($result){
      $_POST["blog_post_image"] = $image_name;
    }
    else{
      array_push($errors, "Failed to upload the image");
    }
  }else{
      array_push($errors, "Blog post image is required");
  }
  if(count($errors) == 0){
    $post_id = $_POST["post_id"];
    unset($_POST['mem_save_up_blop'], $_POST["post_id"]);
    $_POST["user_id"] = $_SESSION["user_id"]; // form session
    $_POST["publish_status"] = isset($_POST["publish_status"]) ? 1 : 0; // default for all posts
    $_POST["blog_body"] = htmlentities($_POST["blog_body"]);

    $blog_posts_id = update($tb_blog_posts, $post_id, "post_id", $_POST);
    $_SESSION['message'] = 'Blog post updated successfully';
    $_SESSION['type'] = 'success';
    // displ($blog_posts_id);
    blog_redirect();
  } else {
    $post_id = $_POST["post_id"];
    $blog_title = $_POST["blog_title"];
    $blog_body = $_POST["blog_body"];
  }
}

function blog_redirect(){
  if ($_SESSION['role'] === 'Admin'){
    header('location: '.BASE_URL.'/Admin2/blogs');
    exit();
  } elseif ($_SESSION['role'] === 'Member') {
    header('location: '.BASE_URL.'/member/blogs');
    exit();
  }
}
