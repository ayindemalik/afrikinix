<?php include("path.php");?>
<?php include(ROOT_PATH."/app/controllers/project_process.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Thesis page</title>
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

        <ol>
          <li><a href="index.html">Home</a></li>
        </ol>
        <h2>Thesis name</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-md-9 pb-5 ">
                <form id="search_product_form" class="" method="post" onsubmit="return false">
                    <div class="input-group ">
                      <div class="input-group">
                        <input type="text" id="project_search" class="form-control"
                          placeholder="project name" aria-describedby="basic-addon2" />
                        <div class="input-group-append">
                          <button class="btn btn-warning" type="button"><i class="bi bi-search"></i></button>
                        </div>
                      </div>
                    </div>
                </form>
            </div>


            <div class="col-lg-8 entries" id="project_result">

             <div class="blog_proj">
                <div class="col-md-12" >
                  <div class="section-title pb-2" >
                    <h2>Projects found</h2>
                  </div>
                  <div class="content entry" style="height: 700px" >
                     <div class="row">
                          <div class="col-lg-12 " data-aos="fade-up" data-aos-delay="100">
                              <div class="item d-flex align-items-start">
                                <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                                <div class="item-info">
                                    <h4><a href="project_page.html">Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia</a></h4>
                                  <span>Chief Executive Officer</span>
                                  <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi Explicabo voluptatem mollitia et repellat  </p>

                                  <div class="entry-meta mt-2" >
                                    <ul>
                                      <li class="d-flex align-items-center">
                                        <i class="fa fa-calendar-alt"></i>
                                        gfghg</li>
                                      <li class="d-flex align-items-center">
                                        <i class="fas fa-book-reader"></i>
                                          5 reads</li>
                                      <li class="d-flex align-items-center">
                                        <i class="fas fa-eye"></i>3 views</li>
                                      <li class="d-flex align-items-center">
                                         <a>|<strong>Abstract</strong></a>&nbsp;&nbsp; <i type ="button" class="fas fa-book-open  view_abstract"
                                        id="v_abstract">
                                        </i></li>
                                    </ul>
                                  </div>
                                  <div class="read-more">
                                    <a href="blog-single.html">Read More</a>
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>


          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Projects' Main Fields</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">Educaion <span>(25)</span></a></li>
                  <li><a href="#">Engineering <span>(12)</span></a></li>
                  <li><a href="#">Economics <span>(5)</span></a></li>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Related Projects</h3>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                  <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-2.jpg" alt="">
                  <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-3.jpg" alt="">
                  <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div>
              <!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>

                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <?php include ROOT_PATH."/Layouts/Master/_footer.php"?>

  <?php include(ROOT_PATH."/app/includes/modals.php");?>

  <?php include("assets/includes/script_links.php");?>
  <!-- SCRIPT LINKS -->
  <script type="text/javascript" src="common_scripts.js"></script>

  <script type="text/javascript">
   $(document).ready(function () {
     console.log("in projects....");
     loadProjects();

     $("#project_search").keyup(function () {
        let searchText = $(this).val();
        console.log("searching....");
        if (searchText != "") {
          $.ajax({
            url: "common_process.php",
            method: "post",
            data: {
              _project_query: searchText,
            },
            success: function (response) {
              console.log(response);
              $("#project_result").html(response);
            },
          });
        } else {
          $("#project_result").html("please type a any word in search box");
        }
      });

       // Searching

     function loadProjects(){
       action = "LOAD_LATEST_PROJECTS";
       console.log("act ->"+action);
       $.ajax({
         url:'common_process.php',
         method:"POST",
         data:{need_action:action},
         success:function(result_data){
           console.log("Result-> "+result_data);
           if(result_data != ""){
             $("#project_result").html(result_data);
           }
           else{
             $("#project_result").html('<div class="alert alert-warning">Sorry unexpected error occured...</div>');
           }
         }
       });
     }
   });
 </script>
</body>

</html>
