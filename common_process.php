<?php include("path.php");?>
<?php
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/helpers/middleware.php");
// For user validation
include(ROOT_PATH."/app/helpers/validateUser.php");

$tb_theses = "theses";
$theses = selectAll($tb_theses);
$total_theses = count($theses);

$tb_article = "articles";
$articles = selectAll($tb_article);
$total_articles = count($articles);

$tb_projects = "projects";
$projects = selectAll($tb_projects);
$total_projects = count($projects);

$tb_blog_posts = 'blog_posts';
$blog_posts = selectAll($tb_blog_posts);
$total_blog_posts = count($blog_posts);

$tb_dom_field = "domain_fields";
$domain_fields = selectAll($tb_dom_field);
$total_domain_fields = count($domain_fields);

$tb_topics = "blog_topics";
$blog_topics = selectAll($tb_dom_field);
$total_blog_topicss = count($blog_topics);

// ARICLES SEARCH
if (isset($_POST['_article_query'])) {
  $sterm = trim($_POST['_article_query']);
  $art_search_rslt = pdoGetAllDataRow(
    'SELECT * FROM articles as art
      WHERE art.article_title LIKE :title
      OR art.abstract LIKE :abstract
      OR art.art_keywords LIKE :keyword',
      ['title' => '%' . $sterm . '%',
        'abstract' => '%' . $sterm . '%',
        'keyword' => '%' . $sterm . '%'
      ]);

  $output = '';
  $output .='
  <div class="section-title pb-2" >
    <h2>Articles found</h2>
  </div>';

  $output .='
    <div class="content" style="height: 720px" >';
  if(is_array($art_search_rslt) && count($art_search_rslt)>0){
      foreach($art_search_rslt as $key => $artic){
        $val = $key + 1;

          $output .='
          <div class="col-md-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <i class="bi bi-newspaper"></i>
              <h4><a href="article_page.php?art_id='.$artic['article_id'].'">
                '.$artic['article_title'].'
              </a></h4>
              <p id="abstract_'.$val.'">'.html_entity_decode(substr($artic['abstract'], 0, 100)).'</p>
              <div class="entry-meta mt-2">
                <ul>
                  <li class="d-flex align-items-center">
                    <i class="fa fa-calendar-alt"></i>'.$artic['year'].'</li>
                  <li class="d-flex align-items-center">
                    <i class="fas fa-book-reader"></i>'.$artic['no_read'].' reads</li>
                  <li class="d-flex align-items-center">
                    <i class="fas fa-eye"></i>'.$artic['no_view'].' views</li>
                  <li class="d-flex align-items-center">
                     <a>|<strong>Abstract</strong></a>&nbsp;&nbsp; <i type ="button" class="fas fa-book-open  view_abstract"
                    id="v_abstract'. $artic['article_id'].'">
                    </i></li>
                </ul>
              </div>
              <div class="">
                 |<b><u>Authors:</u></b>'.$artic['authors'].'
              </div>
            </div>
          </div>
          ';
      }
  }
  else{
      $output .= '<div class="alert alert-info">No article found</div>';
  }
  $output .='
    </div>';
  echo $output;

}

// THESES SEARCH
if (isset($_POST['_thesis_query'])) {
  $sterm = trim($_POST['_thesis_query']);
  $art_search_rslt = pdoGetAllDataRow(
    'SELECT th.*, u.username
          FROM theses AS th
          JOIN users AS u
          ON th.user_id = u.user_id
          WHERE th.thesis_title LIKE :title
          OR th.abstract LIKE :abstract
          OR th.thes_keywords LIKE :keyword',
          ['title' => '%' . $sterm . '%',
            'abstract' => '%' . $sterm . '%',
            'keyword' => '%' . $sterm . '%'
          ]);

  $output = '';
  $output .='
  <div class="section-title pb-2" >
    <h2>Theses found</h2>
  </div>';

  $output .='
    <div class="content" style="height: 720px" >';
  if(is_array($art_search_rslt) && count($art_search_rslt)>0){
      foreach($art_search_rslt as $key => $thesis){
        $val = $key + 1;
          $output .='
          <div class="col-md-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <i class="bi bi-book"></i>
              <h4><a href="article_page.php?art_id='.$thesis['thesis_id'].'">
                '.$thesis['thesis_title'].'
              </a></h4>
              <p id="abstract_'.$val.'">'.html_entity_decode(substr($thesis['abstract'], 0, 100)).'</p>
              <div class="entry-meta mt-2">
                <ul>
                  <li class="d-flex align-items-center">
                    <i class="fa fa-calendar-alt"></i>'.$thesis['year'].'</li>
                  <li class="d-flex align-items-center">
                    <i class="fas fa-book-reader"></i>'.$thesis['no_read'].' reads</li>
                  <li class="d-flex align-items-center">
                    <i class="fas fa-eye"></i>'.$thesis['no_view'].' views</li>
                  <li class="d-flex align-items-center">
                     <a>|<strong>Abstract</strong></a>&nbsp;&nbsp; <i type ="button" class="fas fa-book-open  view_abstract"
                    id="v_abstract'. $thesis['article_id'].'">
                    </i></li>
                </ul>
              </div>
              <div class="">
                 |<b><u>Authors:</u></b>'.$thesis['authors'].'
              </div>
            </div>
          </div>
          ';
      }
  }
  else{
      $output .= '<div class="alert alert-info">No thesis found</div>';
  }
  $output .='
    </div>';
  echo $output;

}

// PROJECT SEARCH
if (isset($_POST['_project_query'])) {
  $sterm = trim($_POST['_project_query']);
  $proj_search_rslt = pdoGetAllDataRow(
    'SELECT proj.*, u.username
          FROM projects AS proj
          JOIN users AS u
          ON proj.user_id = u.user_id
          WHERE proj.project_name LIKE :title
          OR proj.description LIKE :description',
          ['title' => '%' . $sterm . '%',
            'description' => '%' . $sterm . '%'
          ]);

  $output = '
    <div class="blog_proj">
       <div class="col-md-12" >';
  $output .='
      <div class="section-title pb-2" >
        <h2>Projects found</h2>
      </div>';

  $output .='
    <div class="content entry" style="height: 700px">
       <div class="row">
    ';
  if(is_array($proj_search_rslt) && count($proj_search_rslt)>0){
      foreach($proj_search_rslt as $key => $project){
        $val = $key + 1;
          $output .='
          <div class="col-lg-12 " data-aos="fade-up" data-aos-delay="70">
              <div class="item d-flex align-items-start">
                <div class="pic"><img src="assets/img/project_images/'.$project["image_path"].'"
                  class="img-fluid" alt=""></div>
                <div class="item-info">
                    <h4><a href="project_page.php?proj_id='.$project['project_id'] .'">
                    '.$project["project_name"].'</a></h4>
                  <span>'.$project["project_owner"].'</span>
                  <p id="proj_desc">'.$project["description"].'</p>

                  <div class="entry-meta mt-2" >
                    <ul>
                      <li class="d-flex align-items-center">
                        <i class="fa fa-calendar-alt"></i>
                        '.$project["year"].'</li>
                      <li class="d-flex align-items-center">
                        <i class="fas fa-book-reader"></i>
                          5 reads</li>
                      <li class="d-flex align-items-center">
                        <i class="fas fa-eye"></i>'.$project["no_view"].' views</li>
                    </ul>
                  </div>
                  <div class="read-more">
                    <a href="project_page.php?proj_id='.$project['project_id'] .'">Read More</a>
                  </div>
                </div>
              </div>
          </div>
          ';
      }
  }
  else{
      $output .= '<div class="alert alert-info">No project found</div>';
  }
  $output .='
      </div>
    </div>
    </div>
  </div>
    ';
  echo $output;

}

// PROJECT SEARCH
if (isset($_POST['_blog_query'])) {
  $sterm = trim($_POST['_blog_query']);
  $blog_search_rslt = pdoGetAllDataRow(
    'SELECT blog.*, u.username
          FROM blog_posts AS blog
          JOIN users AS u
          ON blog.user_id = u.user_id
          WHERE blog.blog_title LIKE :title
          OR blog.blog_body LIKE :body',
          ['title' => '%' . $sterm . '%',
            'body' => '%' . $sterm . '%'
          ]);

  $output = '
    <div class="blog_proj">
       <div class="col-md-12" >';
  $output .='
      <div class="section-title pb-2" >
        <h2>Blogs found</h2>
      </div>';

  $output .='
    <div class="content entry" style="height: 700px">
       <div class="row">
    ';
  if(is_array($blog_search_rslt) && count($blog_search_rslt)>0){
      foreach($blog_search_rslt as $key => $blog){
        $val = $key + 1;
        $short_content = substr($blog["blog_body"], 0 , 100);
          $output .='
          <div class="col-lg-12 " data-aos="fade-up" data-aos-delay="70">
              <div class="item d-flex align-items-start">
                <div class="pic"><img src="assets/img/blog_post_images/'.$blog["blog_post_image"].'"
                  class="img-fluid" alt=""></div>
                <div class="item-info">
                    <h4><a href="blog_page.php?blg_post_id='.$blog['post_id'] .'">
                    '.$blog["blog_title"].'</a></h4>
                  <span>'.$blog["topic_id"].'</span>
                  <p id="blog_body">'.$short_content.'</p>

                  <div class="read-more">
                    <a href="blog_page.php?blg_post_id='.$blog['post_id'] .'">Read More</a>
                  </div>
                </div>
              </div>
          </div>
          ';
      }
  }
  else{
      $output .= '<div class="alert alert-info">No blogs found</div>';
  }
  $output .='
      </div>
    </div>
    </div>
  </div>
    ';
  echo $output;

}

if(isset($_POST["need_action"])) {
  // THESES PROCESS
  if($_POST["need_action"] == "LOAD_HOME_LATEST_THESES"){
    $th_find_rslt = pdoGetAllDataRow('SELECT th.*, u.username
            FROM theses AS th
            JOIN users AS u
            ON th.user_id = u.user_id
            LIMIT 10');
    $output = setHomeThesisItems("Latest Theses", $th_find_rslt);
    echo $output;
  }

  if($_POST["need_action"] == "LOAD_LATEST_THESES"){
    $th_find_rslt = pdoGetAllDataRow(
      'SELECT th.*, u.username
            FROM theses AS th
            JOIN users AS u
            ON th.user_id = u.user_id');
    $output = setThesisItems("Latest Theses found", $th_find_rslt);
    echo $output;
  }
  if($_POST["need_action"] == "LOAD_THESIS_ABSTRACT"){
      // echo "Abstract loading called...";
      $thesis_id = $_POST["thesis_id"];
      // echo "</br >".$theses_id;
      $thesis = selectOne($tb_theses, ['thesis_id'=>$thesis_id]);
      $abstract = $thesis["abstract"];
      $no_vew = $thesis["no_view"];
      $no_vew = $no_vew+1;
      // echo " no_ view = ".$no_vew;

      echo $abstract;
      $sql = "UPDATE theses SET no_view = ? WHERE thesis_id = ?";
      $result = executeQuery1($sql, ["no_view"=>$no_vew, "thesis_id"=>$thesis_id]);
      // $result = executeQuery1($sql, [[]);
  }
  elseif($_POST["need_action"] == "SEARCH_THESIS"){
      // echo "yeaaa";
      $sterm = $_POST["search_term"];
      // echo "ter--> ".$sterm;
      $th_search_rslt = searchThesis($sterm);
      $output = '';
      if(count($th_search_rslt)>0){
          // echo json_encode($result);
          foreach($th_search_rslt as $key => $thesis){
              $output .='
                  <div class="col-sm-12" class="clearfix" style="margin-buttom:10px; margin-top:5px;">
                      <img src="img/user.png" alt="..." class="float-left pull-left mr-2" style="width:45px; hight:45px;" >
                      <a href="thesis_page.php?thes_id='.$thesis['thesis_id'].'"><b><h6>'.$thesis['thesis_title'].'</b></h6></a>
                      <p><i class="fas fa-calendar-alt fa-1x" style="color: #335eea"></i> '.$thesis['year'].'
                      | <i class="fas fa-university fa-1x" style="color: #335eea"></i> '.$thesis['university'].'
                      | <i class="fas fa-graduation-cap fa-1x" style="color: #335eea"></i> '.$thesis['degree_level'].'
                      | <i class="fas fa-user fa-1x" style="color: #335eea"></i> '.$thesis['authors'].'</p>
                  </div>';
              $output .='<hr>';
          }
          echo $output;
      }
      else{
          echo '';
      }
  }
  elseif($_POST["need_action"] == "GET_THESIS_BY_DOMAIN_FIELD"){
      // echo "yeaaa";
      $domain_field_id = $_POST["domain_field_id"];
      $domain_data = pdoGetData(
        'SELECT * from domain_fields
              WHERE domain_id = :_id',
              ['_id' => $domain_field_id]);
      $th_find_rslt = getThesisByDomainField($domain_field_id);
      $title = "Thesis related to ".$domain_data['domain_name']."";
      $output = setThesisItems($title, $th_find_rslt);
      echo $output;
  }

  // ARTICLES PROCESS
  if($_POST["need_action"] == "LOAD_HOME_LATEST_ARTICLES"){
    $th_find_rslt = pdoGetAllDataRow(
      'SELECT art.*, u.username
            FROM articles AS art
            JOIN users AS u
            ON art.user_id = u.user_id
            LIMIT 10');
    $output = setHomeArticleItems("Latest Articles", $th_find_rslt);
    echo $output;
  }
  if($_POST["need_action"] == "LOAD_LATEST_ARTICLES"){
    $th_find_rslt = pdoGetAllDataRow(
      'SELECT art.*, u.username
            FROM articles AS art
            JOIN users AS u
            ON art.user_id = u.user_id');
    $output = setArticleItems("Latest Articles found", $th_find_rslt);
    echo $output;
  }
  elseif($_POST["need_action"] == "LOAD_ARTICLE_ABSTRACT"){
      $article_id = $_POST["article_id"];
      // echo "</br >".$article_id;
      $article = selectOne($tb_article, ['article_id'=>$article_id]);
      $abstract = $article["abstract"];
      $no_vew = $article["no_view"];
      $no_vew = $no_vew+1;
      // echo " no_ view = ".$no_vew;
      echo $abstract;
      $sql = "UPDATE articles SET no_view = ? WHERE article_id = ?";
      $result = executeQuery1($sql, ["no_view"=>$no_vew, "article_id"=>$article_id]);
      // echo "rslt-> ".$result;
  }
  elseif($_POST["need_action"] == "SEARCH_ARTICLE"){
      // echo "yeaaa";
      $sterm = $_POST["search_term"];
      // echo "ter--> ".$sterm;
      $art_search_rslt = searchArticles($sterm);
      $output = '';
      if(count($art_search_rslt)>0){
          // echo json_encode($result);
          foreach($art_search_rslt as $key => $article){
              $output .='
                  <div class="col-sm-12" class="clearfix" style="margin-buttom:10px; margin-top:5px;">
                      <img src="img/user.png" alt="..." class="float-left pull-left mr-2" style="width:45px; hight:45px;" >
                      <a href="article_page.php?art_id='.$article['article_id'].'"><b><h6>'.$article['article_title'].'</b></h6></a>
                      <p><i class="fas fa-calendar-alt fa-1x" style="color: #335eea"></i> '.$article['year'].'
                      | <i class="fas fa-user fa-1x" style="color: #335eea"></i> '.$article['authors'].'</p>
                  </div>';
              $output .='<hr>';
          }
          echo $output;
      }
      else{
          echo '';
      }
  }
  elseif($_POST["need_action"] == "GET_ARTICLE_BY_DOMAIN_FIELD"){

      $domain_field_id = $_POST["domain_field_id"];
      $domain_data = pdoGetData(
        'SELECT * from domain_fields
              WHERE domain_id = :_id',
              ['_id' => $domain_field_id]);
      $art_find_rslt = getArticleByDomainField($domain_field_id);
      $title = "Article related to ".$domain_data['domain_name']."";
      $output = setArticleItems($title, $art_find_rslt);
      echo $output;
  }

  // PROJECT PROCESS
  if($_POST["need_action"] == "LOAD_HOME_LATEST_PROJECTS"){
    $proj_find_rslt = pdoGetAllDataRow(
      'SELECT proj.*, u.username
            FROM projects AS proj
            JOIN users AS u
            ON proj.user_id = u.user_id
            LIMIT 3');
    if(is_array($proj_find_rslt) && count($proj_find_rslt)>0){
        foreach($proj_find_rslt as $key => $project){
          $val = $key + 1;
          $short_content = substr($project["description"], 0 , 100);
            $output .='
              <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <img src="assets/img/project_images/'.$project["image_path"].'" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>'.$project["project_name"].'</h4>
                  <p id="proj_desc">'.$short_content.'</p>
                  <a href="" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3">
                  <i class="bx bx-plus"></i></a>
                  <a href="project_page.php?proj_id='.$project['project_id'] .'" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            ';
        }
    }
    else{
        $output .= '<div class="alert alert-info">No projects found</div>';
    }
    echo $output;
  }

  if($_POST["need_action"] == "LOAD_LATEST_PROJECTS"){
    $proj_find_rslt = pdoGetAllDataRow(
      'SELECT proj.*, u.username
            FROM projects AS proj
            JOIN users AS u
            ON proj.user_id = u.user_id
            ');
    $output = '
      <div class="blog_proj">
         <div class="col-md-12" >';
    $output .='
        <div class="section-title pb-2" >
          <h2>Projects found</h2>
        </div>';

    $output .='
      <div class="content entry" style="height: 700px">
         <div class="row">
      ';
    if(is_array($proj_find_rslt) && count($proj_find_rslt)>0){
        foreach($proj_find_rslt as $key => $project){
          $val = $key + 1;
          $short_content = substr($project["description"], 0 , 100);
            $output .='
            <div class="col-lg-12 " data-aos="fade-up" data-aos-delay="70">
                <div class="item d-flex align-items-start">
                  <div class="pic"><img src="assets/img/project_images/'.$project["image_path"].'"
                    class="img-fluid" alt=""></div>
                  <div class="item-info">
                      <h4><a href="project_page.php?proj_id='.$project['project_id'] .'">
                      '.$project["project_name"].'</a></h4>
                    <span>'.$project["project_owner"].'</span>
                    <p id="proj_desc">'.$short_content.'</p>
                    <div class="entry-meta mt-2" >
                      <ul>
                        <li class="d-flex align-items-center">
                          <i class="fa fa-calendar-alt"></i>
                          '.$project["year"].'</li>
                        <li class="d-flex align-items-center">
                          <i class="fas fa-book-reader"></i>
                            5 reads</li>
                        <li class="d-flex align-items-center">
                          <i class="fas fa-eye"></i>'.$project["no_view"].' views</li>
                      </ul>
                    </div>
                    <div class="read-more">
                      <a href="project_page.php?proj_id='.$project['project_id'] .'">Read More</a>
                    </div>
                  </div>
                </div>
            </div>
            ';
        }
    }
    else{
        $output .= '<div class="alert alert-info">No projects found</div>';
    }
    $output .='
        </div>
      </div>
      </div>
    </div>
      ';
            echo $output;
  }

  elseif($_POST["need_action"] == "SEARCH_PROJECT"){
      // echo "yeaaa";
      $sterm = $_POST["search_term"];
      // echo "ter--> ".$sterm;
      $proj_search_rslt = searchProject($sterm);
      $output = '';
      if(count($proj_search_rslt)>0){
          // echo json_encode($result);
          foreach($proj_search_rslt as $key => $project){
              $output .='
                  <div class="col-sm-12" class="clearfix" style="margin-buttom:10px; margin-top:5px;">
                      <img src="img/user.png" alt="..." class="float-left pull-left mr-2" style="width:45px; hight:45px;" >
                      <a href="project_page.php?proj_id='.$project['project_id'].'"><b><h6>'.$project['project_name'].'</b></h6></a>
                      <p><i class="fas fa-calendar-alt fa-1x" style="color: #335eea"></i> '.$project['year'].'
                      | <i class="fas fa-user fa-1x" style="color: #335eea"></i> '.$project['authors'].'</p>
                  </div>';
              $output .='<hr>';
          }
          echo $output;
      }
      else{
          echo '';
      }
  }
  elseif($_POST["need_action"] == "GET_PROJECT_BY_DOMAIN_FIELD"){
      // echo "yeaaa";
      $domain_field_id = $_POST["domain_field_id"];
      // echo "ter--> ".$sterm;
      $proj_find_rslt =getProjectByDomainField($domain_field_id);
      $output = '';

      if(count($proj_find_rslt)>0){
          // echo json_encode($result);
          foreach($proj_find_rslt as $key => $project){
            $output .='
                <div class="col-sm-12" class="clearfix" style="margin-buttom:10px; margin-top:5px;">
                    <img src="img/user.png" alt="..." class="float-left pull-left mr-2" style="width:45px; hight:45px;" >
                    <a href="project_page.php?proj_id='.$project['project_id'].'"><b><h6>'.$project['project_name'].'</b></h6></a>
                    <p><i class="fas fa-calendar-alt fa-1x" style="color: #335eea"></i> '.$project['year'].'
                    | <i class="fas fa-user fa-1x" style="color: #335eea"></i> '.$project['authors'].'</p>
                </div>';
            $output .='<hr>';
          }
          echo $output;
      }
      else{
          echo '';
      }
  }

  //BLOG_POST
  if($_POST["need_action"] == "LOAD_HOME_LATEST_BLOGS"){
    $blog_find_rslt = pdoGetAllDataRow(
      'SELECT blog.*, u.username
            FROM blog_posts AS blog
            JOIN users AS u
            ON blog.user_id = u.user_id
            LIMIT 3');
    if(is_array($blog_find_rslt) && count($blog_find_rslt)>0){
        foreach($blog_find_rslt as $key => $blog){
          $val = $key + 1;
            $output .='
            <div class="col-lg-4">
              <div class="post-box">
                <div class="post-img">
                  <img src="assets/img/blog_post_images/'.$blog["blog_post_image"].'" class="img-fluid" alt=""></div>
                <span class="post-date">Tue, September 15</span>
                <h3 class="post-title">'.$blog["blog_title"].' </h3>
                <a href="blog_page.php?blg_post_id='.$blog['post_id'] .'"
                class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
            ';
        }
    }
    else{
        $output .= '<div class="alert alert-info">No blogs found</div>';
    }
    echo $output;
  }

  if($_POST["need_action"] == "LOAD_LATEST_BLOGS"){
    $blog_find_rslt = pdoGetAllDataRow(
      'SELECT blog.*, u.username
            FROM blog_posts AS blog
            JOIN users AS u
            ON blog.user_id = u.user_id
            ');
    $output = '
      <div class="blog_proj">
         <div class="col-md-12" >';
    $output .='
        <div class="section-title pb-2" >
          <h2>Projects found</h2>
        </div>';

    $output .='
      <div class="content entry" style="height: 700px">
         <div class="row">
      ';
    if(is_array($blog_find_rslt) && count($blog_find_rslt)>0){
        foreach($blog_find_rslt as $key => $blog){
          $val = $key + 1;
            $short_content = substr($blog["blog_body"], 0 , 100);
            $output .='
              <div class="col-lg-12 " data-aos="fade-up" data-aos-delay="70">
                  <div class="item d-flex align-items-start">
                    <div class="pic"><img src="assets/img/blog_post_images/'.$blog["blog_post_image"].'"
                      class="img-fluid" alt=""></div>
                    <div class="item-info">
                        <h4><a href="blog_page.php?blg_post_id='.$blog['post_id'] .'">
                        '.$blog["blog_title"].'</a></h4>
                      <span>'.$blog["topic_id"].'</span>
                      <p id="blog_body">'.$short_content.'</p>

                      <div class="read-more">
                        <a href="blog_page.php?blg_post_id='.$blog['post_id'] .'">Read More</a>
                      </div>
                    </div>
                  </div>
              </div>
            ';
        }
    }
    else{
        $output .= '<div class="alert alert-info">No blogs found</div>';
    }
    $output .='
        </div>
      </div>
      </div>
    </div>
      ';
            echo $output;
  }

  elseif($_POST["need_action"] == "SEARCH_BLOG_POST"){
      // echo "yeaaa";
      $sterm = $_POST["search_term"];
      // echo "ter--> ".$sterm;
      $blogP_search_rslt = searchBlogPost($sterm);
      $output = '';
      if(count($blogP_search_rslt)>0){
          // echo json_encode($result);
          foreach($blogP_search_rslt as $key => $blog_p){
              $output .='
              <div class="px-2 ">
                  <div class="row mb-3">
                      <div class="col-sm-12"  style="margin-buttom:10px; margin-top:5px;">
                          <img src="images/project1.jpg" alt="..." class="float-left pull-left mr-2" style="width:100px; hight:100px;" >
                          <a href="blog_page.php?blg_p_id='.$blog_p["post_id"].'"><b><h6>'.$blog_p["blog_title"].'</h6></b></a>
                          <i class="fas fa-user fa-1x" style="color: #335eea"></i> uername
                      </div>
                  </div>
                </div>
                <hr>';
          }
          echo $output;
      }
      else{
          echo '';
      }
  }
  elseif($_POST["need_action"] == "GET_BLOG_POST_BY_TOPIC_NAME"){
      // echo "yeaaa";
      $topic_id = $_POST["topic_id"];
      // echo "ter--> ".$sterm;
      $blogP_search_rslt = getPostsByTopicId($topic_id);
      $output = '';
      if(count($blogP_search_rslt)>0){
          // echo json_encode($result);
          foreach($blogP_search_rslt as $key => $blog_p){
              $output .='
              <div class="px-2 ">
                  <div class="row mb-3">
                      <div class="col-sm-12"  style="margin-buttom:10px; margin-top:5px;">
                          <img src="images/project1.jpg" alt="..." class="float-left pull-left mr-2" style="width:100px; hight:100px;" >
                          <a href="blog_page.php?blg_p_id='.$blog_p["post_id"].'"><b><h6>'.$blog_p["blog_title"].'</h6></b></a>
                          <i class="fas fa-user fa-1x" style="color: #335eea"></i> uername
                      </div>
                  </div>
                </div>
                <hr>';
          }
          echo $output;
      }
      else{
          echo '';
      }
  }
}

function setArticleItems($title, $results){
  $output ='';
  $output .='
  <div class="section-title pb-2" ><h2>'.$title.'</h2></div>';
  $output .='
    <div class="content" style="height: 720px" >';
    if(is_array($results) && count($results)>0){
        // foreach($results as $key => $artic){
        //   $val = $key + 1;
        //   $output .='
        //     <div class="col-md-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
        //       <div class="icon-box">
        //         <i class="bi bi-calendar4-week"></i>
        //         <h4><a href="article_page.php?art_id='.$artic['article_id'].'">
        //           '.$artic['article_title'].'
        //         </a></h4>
        //         <p id="abstract_'.$val.'">'.html_entity_decode(substr($artic['abstract'], 0, 100)).'</p>
        //         <div class="entry-meta mt-2">
        //           <ul>
        //             <li class="d-flex align-items-center">
        //               <i class="fa fa-calendar-alt"></i>'.$artic['year'].'</li>
        //             <li class="d-flex align-items-center">
        //               <i class="fas fa-book-reader"></i>'.$artic['no_read'].' reads</li>
        //             <li class="d-flex align-items-center">
        //               <i class="fas fa-eye"></i>'.$artic['no_view'].' views</li>
        //             <li class="d-flex align-items-center">
        //                <a>|<strong>Abstract</strong></a>&nbsp;&nbsp; <i type ="button" class="fas fa-book-open  view_abstract"
        //               id="v_abstract'. $artic['article_id'].'">
        //               </i></li>
        //           </ul>
        //         </div>
        //         <div class="">
        //            |<b><u>Authors:</u></b>'.$artic['authors'].'
        //         </div>
        //       </div>
        //     </div>
        //     ';
        // }
        $output .= setArticleRows($results);
    }
    else{ $output .= '<div class="alert alert-info">No article found</div>';
    }
  $output .='</div>';
  return $output;
}

function setThesisItems($title, $results){
  $output ='';
  $output .='
  <div class="section-title pb-2" ><h2>'.$title.'</h2></div>';
  $output .='
    <div class="content" style="height: 720px" >';
    if(is_array($results) && count($results)>0){
        // foreach($results as $key => $thesis){
        //   $val = $key + 1;
        //   $output .='
        //     <div class="col-md-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
        //       <div class="icon-box">
        //         <i class="bi bi-calendar4-week"></i>
        //         <h4><a href="article_page.php?art_id='.$thesis['thesis_id'].'">
        //           '.$thesis['thesis_title'].'
        //         </a></h4>
        //         <p id="abstract_'.$val.'">'.html_entity_decode(substr($thesis['abstract'], 0, 100)).'</p>
        //         <div class="entry-meta mt-2">
        //           <ul>
        //             <li class="d-flex align-items-center">
        //               <i class="fa fa-calendar-alt"></i>'.$thesis['year'].'</li>
        //             <li class="d-flex align-items-center">
        //               <i class="fas fa-book-reader"></i>'.$thesis['no_read'].' reads</li>
        //             <li class="d-flex align-items-center">
        //               <i class="fas fa-eye"></i>'.$thesis['no_view'].' views</li>
        //             <li class="d-flex align-items-center">
        //                <a>|<strong>Abstract</strong></a>&nbsp;&nbsp; <i type ="button" class="fas fa-book-open  view_abstract"
        //               id="v_abstract'. $thesis['article_id'].'">
        //               </i></li>
        //           </ul>
        //         </div>
        //         <div class="">
        //            |<b><u>Authors:</u></b>'.$thesis['authors'].'
        //         </div>
        //       </div>
        //     </div>
        //     ';
        // }
        $output .= setThesisRows($results);
    }
    else{ $output .= '<div class="alert alert-info">No Theses found</div>';}
  $output .='</div>';
  return $output;
}

// HOME ITEMS
function setHomeArticleItems($title, $results){
  $output ='';
  $output .='
  <div class="section-title pb-2">
    <h2>'.$title.'</h2>
  </div>
  <div class="entry" style="height: 720px; overflow:auto;">
      <div class="artic_thes">
  ';
    if(is_array($results) && count($results)>0){
        $output .= setArticleRows($results);
    }
    else{
        $output .= '<div class="alert alert-info">No article found</div>';
    }
  $output .='
    </div>
  </div>';
  return $output;
}

function setHomeThesisItems($title, $results){
  $output ='';
  $output .='
  <div class="section-title pb-2">
    <h2>'.$title.'</h2>
  </div>
  <div class="entry" style="height: 720px; overflow:auto;">
      <div class="artic_thes">
  ';
    if(is_array($results) && count($results)>0){
        $output .= setThesisRows($results);
    }
    else{
        $output .= '<div class="alert alert-info">No theses found</div>';
    }
  $output .='
    </div>
  </div>';
  return $output;
}

function setArticleRows($results){
  $output ='';
  foreach($results as $key => $artic){
    $val = $key + 1;
    $output .='
      <div class="col-md-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
        <div class="icon-box">
          <i class="bi bi-newspaper"></i>
          <h4><a href="article_page.php?art_id='.$artic['article_id'].'">
            '.$artic['article_title'].'
          </a></h4>
          <p id="abstract_'.$val.'">'.html_entity_decode(substr($artic['abstract'], 0, 100)).'</p>
          <div class="entry-meta mt-2">
            <ul>
              <li class="d-flex align-items-center">
                <i class="fa fa-calendar-alt"></i>'.$artic['year'].'</li>
              <li class="d-flex align-items-center">
                <i class="fas fa-book-reader"></i>'.$artic['no_read'].' reads</li>
              <li class="d-flex align-items-center">
                <i class="fas fa-eye"></i>'.$artic['no_view'].' views</li>
              <li class="d-flex align-items-center">
                 <a>|<strong>Abstract</strong></a>&nbsp;&nbsp; <i type ="button" class="fas fa-book-open  view_abstract"
                id="v_abstract'. $artic['article_id'].'">
                </i></li>
            </ul>
          </div>
          <div class="">
             |<b><u>Authors:</u></b>'.$artic['authors'].'
          </div>
        </div>
      </div>
      ';
  }
  return $output;
}

function setThesisRows($results){
  $output ='';
    foreach($results as $key => $thesis){
      $val = $key + 1;
      $output .='
        <div class="col-md-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
          <div class="icon-box">
            <i class="bi bi-book"></i>
            <h4><a href="thesis_page.php?thes_id='.$thesis['thesis_id'].'">
              '.$thesis['thesis_title'].'
            </a></h4>
            <p id="abstract_'.$val.'">'.html_entity_decode(substr($thesis['abstract'], 0, 100)).'</p>
            <div class="entry-meta mt-2">
              <ul>
                <li class="d-flex align-items-center">
                  <i class="fa fa-calendar-alt"></i>'.$thesis['year'].'</li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-book-reader"></i>'.$thesis['no_read'].' reads</li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-eye"></i>'.$thesis['no_view'].' views</li>
                <li class="d-flex align-items-center">
                   <a>|<strong>Abstract</strong></a>&nbsp;&nbsp; <i type ="button" class="fas fa-book-open  view_abstract"
                  id="v_abstract'. $thesis['article_id'].'">
                  </i></li>
              </ul>
            </div>
            <div class="">
               |<b><u>Authors:</u></b>'.$thesis['authors'].'
            </div>
          </div>
        </div>
        ';
    }
  return $output;
}

//LOGIN
if(isset($_POST['userLogin'])){
  $table = 'users';
  // echo "user Login..";
  // displ($_POST);
  $errors = validateLogin($_POST);// used to display value from error array
  // Chech there is no error
  if (count($errors) === 0){
    try{
      $user = selectOne($table, ['username' => $_POST['username']]);
      // echo password_verify($_POST['password'], $user['password']);
      if($user && password_verify($_POST['password'], $user['password'])){
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION["email"] = $row["email"];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        echo "Login success";
      } else{
        echo '<div class="alert alert-danger">Wrong credentials</div>';
      }
    }
    catch(PDOException $e){
      echo "There is some problem in connection: " . $e->getMessage();
    }
  }
  else {
    echo showErrors($errors);
  }
}

//REGIST
if(isset($_POST['userRegist'])){
  $table = 'users';
  // echo "user regist..";
  // displ($_POST);
  $errors = validateUser($_POST);// used to display value from error array
  // Chech there is no error
  if (count($errors) === 0){
    try{
      // $user = selectOne($table, ['username' => $_POST['username']]);
      unset($_POST['passwordConf'], $_POST['userRegist']);
      $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $_POST['role'] = 'Member';

      $user_id = create($table, $_POST); // return last user id creaed
      if($user_id > 0){
        $user = selectOne($table, ['user_id'=>$user_id]); // select back the created user based on is id
        // if(isset($user) && password_verify($_POST['password'], $user['password'])){
        // if(isset($user)){
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION["email"] = $row["email"];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        echo '<div class=""><span style="color: #007bff; text-align: center;" class="font-weight-bold pt-0">
        <i class="fas fa-check" ></i> <strong>Your registration has been saved successfully</strong>. Now as <strong><a href="'.BASE_URL.'">Afrikinix member start</a></strong> sharing your theses, articles and projects ideas for the benefit of Africa</div>';
      }
      else{
        echo '<div class="alert alert-danger">An error occurred during registration, please try again  </div>';
      }

    }
    catch(PDOException $e){
      echo "There is some problem in connection: " . $e->getMessage();
    }
  }
  else {
    echo showErrors($errors);
  }
}


function showErrors($errors){
  // displ()
  $output = '<ul >';
  foreach ($errors as $error) {
    $output .= '<li class="text-danger">'.$error.'</li>';
  }
  $output .= '<ul>';
  return $output;
}
