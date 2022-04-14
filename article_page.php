<?php include("path.php");?>
<?php include(ROOT_PATH."/app/controllers/articles_process.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Article page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include("assets/includes/head_links.php");?>
</head>

<body>
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
    <?php include ROOT_PATH."/Layouts/Master/_top_bar.php"?>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center " style="background: rgba(5, 87, 158, 0.9);">
    <?php include ROOT_PATH."/Layouts/Master/_header.php" ?>
  </header>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <!-- <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="blog.html">Blog</a></li>
        </ol> -->
        <h2>Article detail</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 entries">
                <article class="entry entry-single">
                  <div class="artic_thes" id="domainBaseResult">
                    <h2 class="entry-title">
                        <a href=""><?php echo $article_title?></a>
                    </h2>
                    <div class="entry-meta">
                        <ul>
                          <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">By user</a></li>
                          <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                          <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                        </ul>
                    </div>

                    <div class="entry-content">
                        <h3>Abstract</h3>
                        <p>
                           <?php echo $abstract ?>
                        </p>
                    </div>
                  </div>
                </article>
                <div class="blog-author align-items-center">
                    <h4 class="comments-count">Article's information</h4>
                    <hr>
                    <u><b>Keywords</b></u> :<?php echo " <i>".$art_keywords."</i>";?>
                    <hr>

                    <u><b>Domain field</b></u> : <?php echo " <i>".getDomainName($domain_field)."</i>";?><br>
                    <hr>

                    <i class="fas fa-user fa-1x" style="color: #335eea"></i> <u><b>Authors</b></u> :  <?php echo " <i>".$authors."</i>";?><br>
                    <hr>

                    <i class="fas fa-calendar-alt fa-1x" style="color: #335eea"></i> <u><b>Year</b></u> : <?php echo $year ." | ";?>
                </div>
            </div>
          <div class="col-lg-4">

            <div class="sidebar">
              <h3 class="sidebar-title">Article's Main Fields</h3>
              <div class="sidebar-item categories">
                <ul>
                  <?php foreach ($domain_fields as $key => $domain){?>
                    <li><a class="domain_field" id="domainF_<?php echo $domain['domain_id'] ?>"
                       href="#"><?php echo $domain['domain_name'];?>
                       <span>(25)</span></a></li>
                <?php }?>
                </ul>
              </div><!-- End sidebar categories-->
              <h3 class="sidebar-title">Related articles</h3>
              <div class="sidebar-item recent-posts">
                <?php $count=0;
								$recent_realted_articles = getArticleByDomainField($domain_field);
                  foreach ($recent_realted_articles as $key => $artic){
                    if($count<=50){ ?>
                      <div class="post-item clearfix">
                        <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                        <h4><a href="article_page.php?art_id=<?php echo $artic['article_id']; ?>">
                          <?php echo $artic['article_title'];$count++;?></a></h4>
                        <time datetime="2020-01-01"><?php echo $artic['year']; ?></time>
                      </div>

                <?php }}?>

              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div>
          <!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ROOT_PATH."/Layouts/Master/_footer.php"?>

  <?php include(ROOT_PATH."/app/includes/modals.php");?>

  <?php include("assets/includes/script_links.php");?>
  <script type="text/javascript" src="common_scripts.js"></script>

  <script type="text/javascript">
   $(document).ready(function () {
       console.log("in artile page....");
     // VARIABLES
     var article_id;
     var index = 0
     var count = 0;
     var action = '';
     var art_input_text = '';

     $(document).on('click', '.domain_field', function(event){
       var domainF_id = event.target.id;
           domainF_id = this.id;
           console.log("dom id->" + domainF_id);
           domainF_id = domainF_id.substring(8);
           console.log("dom id->" + domainF_id);
           // console.log("dom name->" + $('#domainF_NAme'+domainF_id).text());

           // $('#search_result_title').text("Articles realted to * " +$('#domainF_NAme'+domainF_id).text());

           action = "GET_ARTICLE_BY_DOMAIN_FIELD";
           $.ajax({
             url:'common_process.php',
             method:"POST",
             data:{need_action:action,domain_field_id:domainF_id},
             success:function(result_data){
               console.log("Result-> "+result_data);
                 if(result_data != ""){
                   $("#domainBaseResult").html(result_data);
                 }
               else{
                 $("#domainBaseResult").html('<div class="alert alert-warning">Sorry unexpected error occured...</div>');
               }
             }
           })
     });

   });
 </script>

</body>

</html>
