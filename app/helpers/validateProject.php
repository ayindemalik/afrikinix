<?php
// $project_post replace $_POST array
function validateProject($project_post)
{
  // displ($_POST);
  $errors = array();
  // if (empty($project_post["article_id"])){
  //   array_push($errors, 'Article is required');
  // }
  if (empty($project_post["project_name"])){
    array_push($errors, 'Project name is required');
  }
  if (empty($project_post["authors"])){
    array_push($errors, "Project's authors are required");
  }
  if (empty($project_post["domain_field"])){
    array_push($errors, "Major domain of the project is not selected");
  }
  if (empty($project_post["year"])){
    array_push($errors, "Year is required");
  }
  if (empty($project_post["description"])){
    array_push($errors, "Description of the project is required");
  }
  if (empty($project_post["project_owner"])){
    array_push($errors, "Owner of the project sould be selected");
  }

  $existingProjectName = selectOne('projects', ['project_name'=>$project_post['project_name']]);
  if($existingProjectName){
    if (isset($_POST["save_up_project"]) && $existingProjectName["project_id"] != $project_post["project_id"]){
      array_push($errors, 'Project name already exist');
    }

    if (isset($_POST["mem_save_up_project"]) && $existingProjectName["project_id"] != $project_post["project_id"]){
      array_push($errors, 'Project name already exist');
    }

    if (isset($_POST["add_project"])){
      array_push($errors, 'Project name already exist');
    }
  }

  return $errors;
}
