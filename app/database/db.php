<?php
require('connect.php');

function displ($value)
{
 echo "<pre>".print_r($value, true)."</pre>";
 die();
}
// EXECUTION QUERY TO BE USE FOR ALL TO PREVENT REDUDANT CODE
// function executeQuery($sql, $data){
//   global $conn;
//   $stmt = $conn->prepare($sql);
//   // displ($data);
//   $values = array_values($data); // extract condition values
//   // print_r($values);
//   $types = str_repeat('s', count($values)); // to extract repeatted values from the condition array
//   $stmt->bind_param($types, ...$values); // bind each type with corresponded values
//   $stmt->execute();
//   return $stmt;
// }

function executeQuery1($sql, $data){
  global $conn;
  $stmt = $conn->prepare($sql);
  // echo $stmt;
  if($stmt = $conn->prepare($sql)){
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    // displ($stmt);
    $stmt->execute();
    // displ($stmt);
  } else{
    $error = $conn->errno . ' ' . $conn->error;
    echo $error;
  }

  return $stmt;
}
// For all type of Query Excecute
function queryExecute($sql){
  global $conn;
  $stmt = $conn->prepare($sql);
  if($stmt = $conn->prepare($sql)){
    // displ($stmt);
    $stmt->execute();
    // displ($stmt);
  } else{
    $error = $conn->errno . ' ' . $conn->error;
    echo $error;
  }
  return $stmt;
}

//----- FOR SELECTING MORE RECORDS WITH OR WITHOUT CONFITIONS
function selectAll($table, $conditions = []){
      // [] means the $conditions parameter is optional
    // call the connection vaiable as global to make it availale in function
    global $conn;
    // preapare sql query string
    $sql = "SELECT * FROM $table";
    if(empty($conditions)){ // if the $conditions parameter in not set
      // pass the sql string to the db connection variable
      $stmt = $conn->prepare($sql);
      // execute the statment through the connection
      $stmt->execute();
      // get and fetch the result to a variable
      $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
      return $records;
    }
    else{
      // if the $conditions parameter is set
      // return the record that match the $conditions
      // traditional sql query with where clause
      // $sql = "SELECT * FROM $table WHERE username='' AND password ='';";
      // but here use the foreach to go through each condition
      $i = 0;
      foreach ($conditions as $key => $value) {
        if($i === 0){ // use to add where with the first condition
          // $sql = $sql. " WHERE $key = $value";
          $sql = $sql. " WHERE $key = ?";//? to prevent sql injection
        }
        else{ // use to add the remaining conditions with AND ... AND
          $sql = $sql. " AND $key = ?";
        }
        $i++;
      }
      $stmt = executeQuery1($sql, $conditions);
      $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
      return $records;
    }
  }

function querySelect($query){
  $stmt = queryExecute($query);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

//----- FOR SELECTING ONLY ONE RECORD
function selectOne($table, $conditions){ // Condition is compolsory sor [] is not required
    global $conn;
    $sql = "SELECT * FROM $table";
    $i = 0;
    foreach ($conditions as $key => $value) {
      if($i === 0){
        $sql = $sql. " WHERE $key = ?";
      }
      else{
        $sql = $sql. " AND $key = ?";
      }
      $i++;
    }
    // limit the record to 1 record found.
    $sql = $sql ." LIMIT 1";
    $stmt = executeQuery1($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
  }

// Create FOR ALL INSERTION
function create($table, $data){
  global $conn;
  // sql = "INSERT INTO users SET username=?, email=?, password=?"
  $sql = "INSERT INTO $table SET ";
  $i = 0;
  foreach ($data as $key => $value) {
    if ($i === 0){
      $sql = $sql." $key=?";
    } else {
      $sql = $sql.", $key=?"; // use , to add remaining attibutes
    }
    $i++;
  }
  // echo $sql;
   // displ($data);
  $stmt = executeQuery1($sql, $data);
  // $stmt = executeQuery1($sql, $conditions);
  $id = $stmt->insert_id;
  $row = $stmt->affected_rows;
  // echo " returned id->".$id;
  return $row;
}

// UPDATE
function update($table, $id, $rel_id, $data){
  // function update($table, $id, $data){
  global $conn;
  // sql = "UPDATE users SET username=?, email=?, password=? WHERE Id=?"
  $sql = "UPDATE $table SET ";
  $i = 0;
  foreach ($data as $key => $value) {
    if ($i === 0){
      $sql = $sql." $key=?";
    } else {
      $sql = $sql.", $key=?"; // use , to add remaining attibutes
    }
    $i++;
  }
  // $sql = $sql ." WHERE user_id = ?";
  // $sql = $sql ." WHERE id = ?";
  // $data["id"] = $id;
  $sql = $sql ." WHERE ".$rel_id." = ?";
  $data[$rel_id] = $id;
  $stmt = executeQuery1($sql, $data);
  $id = $stmt->insert_id;
  return $stmt->affected_rows; // if no rows affected -1 will b returned
}

// DELETE
// function delete($table, $id){
function delete($table, $id, $rel_id){
  global $conn;
  // sql = "UPDATE users SET username=?, email=?, password=? WHERE Id=?"
  // $sql = "DELETE $table WHERE id=?";
  $sql = "DELETE FROM $table WHERE ".$rel_id." =?";
  // $stmt = executeQuery($sql, ['user_id' => $id]);
  $stmt = executeQuery1($sql, [$rel_id => $id]);
  // $id = $stmt->insert_id;
  return $stmt->affected_rows; // if no rows affected -1 will b returned
}

function getPublishedPosts(){
  global $conn;
  $sql = "SELECT bp.*, u.username
          FROM blog_posts as bp
          JOIN users as u
          ON bp.user_id = u.user_id
          WHERE publish_status = ?";
  $stmt = executeQuery1($sql, ['publish_status' => 1]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

//TOPIC
function getBlogTopicsName($topic_id){
  $blog_topics= selectAll("topics");
  foreach ($blog_topics as $key => $topic){
    if($topic_id == $topic['topic_id']){
      return $topic['topic_name'];
      exit();
    }
  }
}

function getPostsByTopicId($topic_id){
  global $conn;
  $sql = "SELECT bp.*, u.username
          FROM blog_posts as bp
          JOIN users as u
          ON bp.user_id = u.user_id
          WHERE publish_status = ?
          AND topic_id =?";
  $stmt = executeQuery1($sql, ['publish_status' => 1, 'topic_id'=>$topic_id]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

function searchBlogPost($sterm){
  global $conn;
  $match = '%' .$sterm. '%';
  $sql = "SELECT bp.*, u.username
          FROM blog_posts AS bp
          JOIN users AS u
          ON bp.user_id = u.user_id
          WHERE publish_status = ?
          -- AND bp.title LIKE '%?%' OR p.blog_body LIKE %?%;
          AND bp.blog_title LIKE ? OR bp.blog_body LIKE ?";
  $stmt = executeQuery1($sql, ['publish_status' => 1, 'blog_title'=>$match, 'blog_body'=>$match]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

//THESIS OPERATION
function searchThesis($sterm){
  global $conn;
  $match = '%' .$sterm. '%';
  $sql = "SELECT th.*, u.username
          FROM theses AS th
          JOIN users AS u
          ON th.user_id = u.user_id
          -- WHERE publish_status = ? AND
          WHERE
          -- AND bp.title LIKE '%?%' OR p.blog_body LIKE %?%;
          --  bp.blog_title LIKE ? OR bp.blog_body LIKE ?;
          th.thesis_title LIKE ? OR th.abstract LIKE ? AND th.thes_keywords LIKE ? ";
  // $stmt = executeQuery($sql, ['publish_status' => 1, 'blog_title'=>$match, 'blog_body'=>$match]);
  $stmt = executeQuery1($sql,['thesis_title'=>$match, 'abstract'=>$match, 'thes_keywords'=>$match]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

function getThesisByDomainField($domain_field_id){
  global $conn;
  $sql = "SELECT th.*, u.username
          FROM theses as th
          JOIN users as u
          ON th.user_id = u.user_id
          -- WHERE publish_status = ?
          WHERE domain_field = ?";
  // $stmt = executeQuery($sql, ['publish_status' => 1, 'domain_field'=>$topic_id]);
  $stmt = executeQuery1($sql, ['domain_field'=>$domain_field_id]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}



//ARTICLES OPERATIONS
function searchArticles($sterm){
  global $conn;
  $match = '%' .$sterm. '%';
  $sql = "SELECT art.*, u.username
          FROM articles AS art
          JOIN users AS u
          ON art.user_id = u.user_id
          WHERE
          art.article_title LIKE ? OR art.abstract LIKE ? AND art.art_keywords LIKE ? ";
  // $stmt = executeQuery($sql, ['publish_status' => 1, 'blog_title'=>$match, 'blog_body'=>$match]);
  $stmt = executeQuery1($sql,['article_title'=>$match, 'abstract'=>$match, 'art_keywords'=>$match]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

function getArticleByDomainField($domain_field_id){
  global $conn;
  $sql = "SELECT art.*, u.username
          FROM articles AS art
          JOIN users AS u
          ON art.user_id = u.user_id
          -- WHERE publish_status = ?
          WHERE domain_field = ?";
  // $stmt = executeQuery($sql, ['publish_status' => 1, 'domain_field'=>$topic_id]);
  $stmt = executeQuery1($sql, ['domain_field'=>$domain_field_id]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

//DOMAIN
function getDomainName($domain_field_id){
  $domain_fields = selectAll("domain_fields");
  foreach ($domain_fields as $key => $domain_f){
    if($domain_field_id == $domain_f['domain_id']){
      return $domain_f['domain_name'];
      exit();
    }
  }
}

//PROJECT
function searchProject($sterm){
  global $conn;
  $match = '%' .$sterm. '%';
  $sql = "SELECT proj.*, u.username
          FROM projects AS proj
          JOIN users AS u
          ON proj.user_id = u.user_id
          -- WHERE publish_status = ? AND
          WHERE
          -- AND bp.title LIKE '%?%' OR p.blog_body LIKE %?%;
          --  bp.blog_title LIKE ? OR bp.blog_body LIKE ?;
          proj.project_name LIKE ? OR proj.description LIKE ? ";
  // $stmt = executeQuery($sql, ['publish_status' => 1, 'blog_title'=>$match, 'blog_body'=>$match]);
  $stmt = executeQuery1($sql,['project_name'=>$match, 'description'=>$match]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

function getProjectByDomainField($domain_field_id){
  global $conn;
  $sql = "SELECT proj.*, u.username
          FROM projects AS proj
          JOIN users AS u
          ON proj.user_id = u.user_id
          -- WHERE publish_status = ?
          WHERE domain_field = ?";
  // $stmt = executeQuery($sql, ['publish_status' => 1, 'domain_field'=>$topic_id]);
  $stmt = executeQuery1($sql, ['domain_field'=>$domain_field_id]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}


//FORUM
function getLanguage(){
  $languages = selectAll("lang");
  // foreach ($languages as $key => $lang){
  //   // if($domain_field_id == $domain_f['domain_id']){
  //     return $lang['domain_name'];
  //     exit();
  //
  // }
}
function getLanguageById($languageId){
  $language = selectOne("lang", ["lang_id"=>$languageId]);;
  return $language;
}
function getTagName($value) {
  $tagName = selectOne("tags", ["tag_id"=>$value]);
  return $tagName["tag_name"];
}

function getAllComments($question_id){
  global $conn;
  $sql = "SELECT fc.*, u.username
          FROM forum_comments AS fc
          JOIN users AS u
          ON fc.user_id = u.user_id
          -- WHERE publish_status = ? AND
          WHERE
          -- AND bp.title LIKE '%?%' OR p.blog_body LIKE %?%;
          --  bp.blog_title LIKE ? OR bp.blog_body LIKE ?;
          fc.question_id = ? ";
  // $stmt = executeQuery($sql, ['publish_status' => 1, 'blog_title'=>$match, 'blog_body'=>$match]);
  $stmt = executeQuery1($sql,['question_id'=>$question_id]);
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}

function getUsernameById($user_id){
  global $conn;

  $user = selectOne("users", ["user_id"=>$user_id]);;
  return $user["username"];
}

// PDO Exceute
function pdoInsertExec($sql, $data=[]){
  // global $conn;
  global $pdo;
  $conn = $pdo->open();
  // $stmt = $conn->prepare($sql);
  // $stmt = $conn->prepare($sql);
  if($stmt = $conn->prepare($sql)){
      if(count($data) != 0){
          $stmt->execute($data);
      }
      else {
          $stmt->execute();
        }
     $table_id = $conn->lastInsertId();
      return $table_id;
  }else{
    $error = $conn->errno . ' ' . $conn->error;
    echo $error;
    exit();
  }
}

function pdoUpdateExec($sql, $data=[]){
  global $pdo;
  $conn = $pdo->open();
  if($stmt = $conn->prepare($sql)){
      if(count($data) != 0){
          $stmt->execute($data);
      }
      else {
          $stmt->execute();
        }
     $returnCount = $stmt->rowCount();
      return $returnCount;
  }else{
    $error = $conn->errno . ' ' . $conn->error;
    echo $error;
    exit();
  }
}

function pdoDeleteExec($sql, $data=[]){
  global $pdo;
  $conn = $pdo->open();
  if($stmt = $conn->prepare($sql)){
      if(count($data) != 0){
          $stmt->execute($data);
      }
      else {
          $stmt->execute();
        }
     $returnCount = $stmt->rowCount();
      return $returnCount;
  }else{
    $error = $conn->errno . ' ' . $conn->error;
    echo $error;
    return $error;
    exit();
  }
}

function pdoGetData($sql, $data=[]){
  global $pdo;
  $conn = $pdo->open();
  $stmt = $conn->prepare($sql);
  if(count($data) != 0){
      $stmt->execute($data);
  }
  else {
      $stmt->execute();
    }
   $record =  $stmt->fetch();
   return $record;
}

function pdoGetAllDataRow($sql, $data=[]){
  global $pdo;
  $conn = $pdo->open();
  $stmt = $conn->prepare($sql);
  $records = '';
  if(count($data) != 0){
    $stmt->execute($data);
    $records =  $stmt->fetchAll();
  }
  else {
     $stmt->execute();
     $records =  $stmt->fetchAll();
    }
   return $records;
}


?>
