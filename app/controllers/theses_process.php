<?php
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/helpers/middleware.php");
include(ROOT_PATH."/app/helpers/validateThesis.php");

$tb_theses = "theses";
$tb_dom_field = "domain_fields";
$theses = selectAll($tb_theses);
if(isset($_SESSION['user_id'])){
  $member_theses = selectAll($tb_theses, ['user_id'=>$_SESSION['user_id']]);
}

$domain_fields = selectAll($tb_dom_field);

$errors = array();

$thesis_title = "";
$authors = "";
$university ="";
$department = "";
$degree_level = "";
$domain_field = "";
$year = "";
$thes_keywords = "";
$abstract = "";


if(isset($_POST['save_thesis'])){
  // displ($_POST);
  $errors = validateThesis($_POST);

  if(!empty($_FILES['thesis_file']['name'])){
    $file_name = time().'_'.$_FILES['thesis_file']['name']; // to make all image unique
    $destination = ROOT_PATH."/assets/theses_files/".$file_name;
    $result = move_uploaded_file($_FILES['thesis_file']['tmp_name'], $destination); // tem is used by server to save image temporally when uploaded
    if($result){
      $_POST["thesis_file"] = $file_name;
      $_POST["file_path"] = $_POST["thesis_file"];
      unset($_POST["thesis_file"]);
    }
    else{
      array_push($errors, "Failed to upload the file");
    }
  }
  else{
    array_push($errors, "Thesis file is required");
  }
  if(count($errors) == 0){
    unset($_POST['save_thesis']);
    $_POST["user_id"] = $_SESSION['user_id']; // form session
    // $_POST["publish_status"] = isset($_POST["publish_status"]) ? 1 : 0; // default for all posts
    // secure the body content by using htmlentities
    $_POST["thes_keywords"] = htmlentities($_POST["thes_keywords"]);
    $_POST["abstract"] = htmlentities($_POST["abstract"]);
    // $regis_date = new DateTime();
    // echo $regis_date->getTimestamp();
    $_POST["regist_date"] = date("Y-m-d H:i:s");
    $_POST["up_date"] = date("Y-m-d H:i:s");

    // displ($_POST);
    $add_thesis_rslt = create($tb_theses, $_POST);
    echo " returned-> ".$add_thesis_rslt;
    if ($add_thesis_rslt > 0){
      $_SESSION['message'] = 'Thesis added successfully';
      $_SESSION['type'] = 'success';
      // displ($blog_posts_id);
      // if ($_SESSION['role'] === 'Admin'){
      //   header('location: '.BASE_URL.'/admin/admin_dashboard.php');
      //   exit();
      // } elseif ($_SESSION['role'] === 'Member') {
      //   header('location: '.BASE_URL.'/member/theses/index.php');
      //   exit();
      // }
      th_redirect();
    }
    else{
      echo "Error!!! Thesis could not be added";
    }

  }
  else {
    // echo "ELSE--- deg->".$_POST["degree_level"]." field->".$_POST["domain_field"];
    $thesis_id = $_POST["thesis_id"];
    $thesis_title  = $_POST["thesis_title"];
    $authors = $_POST["authors"];
    $university = $_POST["university"];
    $department = $_POST["department"];
    $degree_level = $_POST["degree_level"];
    $domain_field = $_POST["domain_field"];
    $year = $_POST["year"];
    $thes_keywords = $_POST["thes_keywords"];
    $abstract = $_POST["abstract"];
    // echo "ELSE--- deg->".$degree_level." field->".$domain_field;
    $publish_status = isset($_POST["publish_status"]) ? 1 : 0;
  }
}

if (isset($_GET['thes_id'])){
  $thesis = selectOne($tb_theses, ['thesis_id'=>$_GET['thes_id']]);
  // $query = "SELECT * from ".$tb_theses." JOIN ".$tb_dom_field.
  // displ($blog_post);

  $thesis_id = $thesis["thesis_id"];
  $thesis_title = $thesis["thesis_title"];
  $authors = $thesis["authors"];
  $university = $thesis["university"];
  $department = $thesis["department"];
  $degree_level = $thesis["degree_level"];
  $domain_field = $thesis["domain_field"];
  $year = $thesis["year"];
  $thes_keywords = $thesis["thes_keywords"];
  $abstract = $thesis["abstract"];
  // $publish_status = $thesis["publish_status"];
  $no_read = $thesis["no_read"];
  $no_read = $no_read+1;
  $sql = "UPDATE theses SET no_read = ? WHERE thesis_id = ?";
  $result = executeQuery1($sql, ["no_read"=>$no_read, "thesis_id"=>$thesis_id]);
}

if (isset($_POST['save_up_thesis'])){
    $errors = validateThesis($_POST);
    if (count($errors) === 0){
      $thesis_id = $_POST['thesis_id'];
      unset($_POST['save_up_thesis'], $_POST['thesis_id']);
      $thesis_id = update($tb_theses, $thesis_id, "thesis_id", $_POST);
      // $topic_id = update($table, $topic_id, $_POST);
      $_SESSION['message'] = 'Thesis Updated successfully';
      $_SESSION['type'] = 'success';

      // if ($_SESSION['role'] === 'Admin'){
      //   header('location: '.BASE_URL.'/admin/admin_dashboard.php');
      //   exit();
      // } elseif ($_SESSION['role'] === 'Member') {
      //   header('location: '.BASE_URL.'/member/theses/index.php');
      //   exit();
      // }
      th_redirect();
    }
    else{
      $thesis_id = $_POST["thesis_id"];
      $thesis_title = $_POST["thesis_title"];
      $authors = $_POST["authors"];
      $university = $_POST["university"];
      $department = $_POST["department"];
      $degree_level = $_POST["degree_level"];
      $domain_field = $_POST["domain_field"];
      $year = $_POST["year"];
      $thes_keywords = $_POST["thes_keywords"];
      $abstract = $_POST["abstract"];
      // $publish_status = $_POST["publish_status"];
    }
}

// Delete the blog post
if (isset($_GET['delet_thes_id'])){
  $count = delete($tb_theses, $_GET['delet_thes_id'], "thesis_id");
  $_SESSION['message'] = 'Thesis deleted successfully';
  $_SESSION['type'] = 'success';
  // header('location: '.BASE_URL.'/admin/theses/index.php');
  // exit();
  th_redirect();
}

function th_redirect(){
  if ($_SESSION['role'] === 'Admin'){
    header('location: '.BASE_URL.'/admin/theses');
    exit();
  } elseif ($_SESSION['role'] === 'Member') {
    header('location: '.BASE_URL.'/member/theses');
    exit();
  }
}
