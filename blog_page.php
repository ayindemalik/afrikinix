<?php include("path.php");?>
<?php  include(ROOT_PATH."/app/controllers/blog_posts.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Afrikinix Blog page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include("assets/includes/head_links.php");?>
</head>

  <main id="main">

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
      <?php include ROOT_PATH."/Layouts/Master/_top_bar.php"?>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center " style="background: rgba(5, 87, 158, 0.9);">
      <?php include ROOT_PATH."/Layouts/Master/_header.php" ?>
    </header>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="blogs.php">Blog</a></li>
        </ol>
        <h2>Blog Details</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 entries">
            <article class="entry entry-single">
              <div class="entry-img">
                <?php echo $blog["blog_post_image"]?>
                <img src="assets/img/blog_post_images/<?php echo $blog_image?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog_page.php?"><?php echo $blog_title;?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> -->
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  <?php
  	              echo html_entity_decode($blog_body);
  	              ?>
                </p>

              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>

            </article><!-- End blog entry -->

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Blogs' Main Topics</h3>
              <div class="sidebar-item categories">
                <ul>
                  <?php foreach ($blog_topics as $key => $topic){?>
                    <li><a class="bTopic" id="bTopic<?php echo $topic['topic_id'] ?>"
                       href="#"><?php echo $topic['topic_name'];?>
                       <span>(25)</span></a></li>
                <?php }?>
                </ul>
              </div>
              <!-- End sidebar categories-->

              <h3 class="sidebar-title">Related Blogs</h3>
              <div class="sidebar-item recent-posts" style="height:200px; overflow:auto;">
                <?php foreach ($topic_related_blog_posts as $key => $blog){?>
                  <div class="post-item clearfix">
                    <img src="assets/img/blog_post_images/<?php echo $blog["blog_post_image"]?>"  alt="">
                    <h4><a href="blog_page.php?blg_post_id=<?php echo $blog["post_id"]?>"><?php echo $blog["blog_title"]?></a></h4>
                    <time datetime="2020-01-01">Nov 2021</time>
                  </div>
	              <?php }?>
              </div>

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Society</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Economy</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ROOT_PATH."/Layouts/Master/_footer.php"?>

  <?php include(ROOT_PATH."/app/includes/modals.php");?>

  <?php include("assets/includes/script_links.php");?>
  <!-- SCRIPT LINKS -->
  <script type="text/javascript" src="common_scripts.js"></script>

  <script type="text/javascript">
   $(document).ready(function () {
   });
 </script>

</body>

</html>
