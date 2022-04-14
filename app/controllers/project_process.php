<?php
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/helpers/middleware.php");
include(ROOT_PATH."/app/helpers/validateProject.php");

$tb_projects = "projects";
$tb_dom_field = "domain_fields";
$projects = selectAll($tb_projects);

if (isset($_SESSION['user_id'])):
$mem_projects = selectAll($tb_projects, ['user_id'=>$_SESSION['user_id']]);
endif;

$domain_fields = selectAll($tb_dom_field);


// echo "total field ".count($domain_field);
// displ($domain_fields);
// $total_article = count(selectAll($tb_article));
$errors = array();
// Define all input field;
// $project_id = $total_article + 1;
$project_name = "";
$authors = "";
$domain_field = "";
$year = "";
$description = "";
$project_owner = "";

// Create a new Blog post
if(isset($_POST['save_project'])){
  // displ($_POST);
  $errors = validateProject($_POST);

  if(!empty($_FILES['project_image']['name'])){
    $file_name = time().'_'.$_FILES['project_image']['name']; // to make all image unique
    $destination = ROOT_PATH."/assets/project_images/".$file_name;
    $result = move_uploaded_file($_FILES['project_image']['tmp_name'], $destination); // tem is used by server to save image temporally when uploaded
    if($result){
      $_POST["project_image"] = $file_name;
      $_POST["image_path"] = $_POST["project_image"];
      unset($_POST["project_image"]);
    }
    else{
      array_push($errors, "Failed to upload the image");
    }
  }
  else{
    array_push($errors, "Project image is required");
  }
  if(count($errors) == 0){
    unset($_POST['save_project']);
    $_POST["user_id"] = $_SESSION['user_id'];; // form session
    // $_POST["publish_status"] = isset($_POST["publish_status"]) ? 1 : 0; // default for all posts
    // secure the body content by using htmlentities
    $_POST["description"] = htmlentities($_POST["description"]);
    $_POST["regist_date"] = date("Y-m-d H:i:s");
    $_POST["up_date"] = date("Y-m-d H:i:s");
    $_POST["publish_status"] = 1;

    // displ($_POST);
    $add_project = create($tb_projects, $_POST);
    echo " returned-> ".$add_project;
    if ($add_project > 0){
      $_SESSION['message'] = 'Project added successfully';
      $_SESSION['type'] = 'success';
      // header('location: '.BASE_URL.'/admin/projects/index.php');
      // exit();
      proj_redirect();
    }
    else{
      echo "Error!!! Project could not be created";
    }

  }
  else {
    $project_id = $_POST["project_id"];
    $project_name = $_POST["project_name"];
    $authors = $_POST["authors"];
    $domain_field = $_POST["domain_field"];
    $year = $_POST["year"];
    $project_owner = $_POST["project_owner"];
    $description = $_POST["description"];
    $institution = $_POST["institution"];
    $publish_status = isset($_POST["publish_status"]) ? 1 : 0;
  }
}

// GET Data for update
if (isset($_GET['proj_id'])){
  $project = selectOne($tb_projects, ['project_id'=>$_GET['proj_id']]);
  // All ralted projects
  $domain_related_projects = selectAll($tb_projects, ['domain_field'=>$project["domain_field"]]);
  // displ($blog_post);
  $project_id = $project["project_id"];
  $project_name = $project["project_name"];
  $authors = $project["authors"];
  $domain_field = $project["domain_field"];
  $year = $project["year"];
  // $keywords = $project["keywords"];
  $description = $project["description"];
  $project_owner = $project["project_owner"];
  $institution = $project["institution"];
}

if (isset($_POST['save_up_project'])){
    $errors = validateProject($_POST);
    if (count($errors) === 0){
      $project_id = $_POST['project_id'];
      unset($_POST['save_up_project'], $_POST['project_id']);
      $project_id = update($tb_projects, $project_id, "project_id", $_POST);
      // $topic_id = update($table, $topic_id, $_POST);
      $_SESSION['message'] = 'Project Updated successfully';
      $_SESSION['type'] = 'success';
      header('location: '.BASE_URL.'/admin/projects/index.php');
      exit();
    }else{
      $project_id = $_POST["project_id"];
      $project_name = $_POST["project_name"];
      $authors = $_POST["authors"];
      $domain_field = $_POST["domain_field"];
      $year = $_POST["year"];
      // $keywords = $_POST["keywords"];
      $description = $_POST["description"];
      $project_owner = $_POST["project_owner"];
      $institution = $project["institution"];
      // $publish_status = $_POST["publish_status"];
    }
}
// Member update
if (isset($_POST['mem_save_up_project'])){
    $errors = validateProject($_POST);
    if (count($errors) === 0){
      $project_id = $_POST['project_id'];
      unset($_POST['mem_save_up_project'], $_POST['project_id']);
      $project_id = update($tb_projects, $project_id, "project_id", $_POST);
      // $topic_id = update($table, $topic_id, $_POST);
      $_SESSION['message'] = 'Project Updated successfully';
      $_SESSION['type'] = 'success';
      proj_redirect();
    }else{
      $project_id = $_POST["project_id"];
      $project_name = $_POST["project_name"];
      $authors = $_POST["authors"];
      $domain_field = $_POST["domain_field"];
      $year = $_POST["year"];
      // $keywords = $_POST["keywords"];
      $description = $_POST["description"];
      $project_owner = $_POST["project_owner"];
      // $publish_status = $_POST["publish_status"];
    }
}
// Delete the blog post
if (isset($_GET['del_proj_id'])){
  $count = delete($tb_projects, $_GET['del_proj_id'], "project_id");
  $_SESSION['message'] = 'Project deleted successfully';
  $_SESSION['type'] = 'success';
  proj_redirect();
}

if (isset($_GET['publish_status']) && isset($_GET['blg_p_id'])){
  $publish_status = $_GET['publish_status'];
  $post_id = $_GET['blg_p_id'];
  // Only past the key value pair needed to be updated
  $blog_posts_id = update($table, $post_id, "post_id", ['publish_status'=>$publish_status]);
  $_SESSION['message'] = 'Blog post publish_status changed';
  $_SESSION['type'] = 'success';
  header('location: '.BASE_URL.'/admin/posts/index.php');
  exit();
}

function proj_redirect(){
  if ($_SESSION['role'] === 'Admin'){
    header('location: '.BASE_URL.'/admin/projects');
    exit();
  } elseif ($_SESSION['role'] === 'Member') {
    header('location: '.BASE_URL.'/member/projects');
    exit();
  }
}
