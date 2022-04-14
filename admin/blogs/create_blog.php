<?php include("../../path.php");?>
<?php include(ROOT_PATH."/app/controllers/blog_posts.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Blogs - create blog post</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/extra_style.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      <?php include(ROOT_PATH."/Admin2/design_includes/admin_sidebar.php")?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include(ROOT_PATH."/Admin2/design_includes/admin_topbar.php")?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php include(ROOT_PATH."/app/includes/messages.php");?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">create new blog</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
              <a class="collapse-item btn btn-info" href="create_blog.php">Create new blog</a>
              <a class="collapse-item btn btn-info" href="index.php">Manage blogs</a>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-8 text-align-center">
                  <?php include(ROOT_PATH."/app/helpers/formErrors.php");?>

                  <form action="create_blog.php" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                      <label>Title</label>
                      <input type="text" name="blog_title" value="<?php echo $blog_title?>" class="text-input">
                    </div>
                    <div class="input-group">
                      <label>Body</label>
                      <textarea class="text-input" name="blog_body" id="blog_body"><?php echo $blog_body?></textarea>
                    </div>
                    <div class="input-group">
                      <label>Image</label>
                      <input type="file" name="blog_post_image" id="blog_post_image" class="text-input">
                    </div>
                    <div class="input-group">
                      <label>Topic</label>
                      <select id="topic_id" class="text-input" name="topic_id">
                        <option value="">Select the topic</option>
                        <?php foreach ($blog_topics as $key => $topic): ?>
                          <?php if (!empty($topic_id) && $topic_id == $topic['topic_id']):?>
                          <option selected value="<?php echo $topic['topic_id'] ?>"><?php echo $topic['topic_name'] ?></option>
                          <?php else: ?>
                          <option value="<?php echo $topic['topic_id'] ?>"><?php echo $topic['topic_name'] ?></option>
                          <?php endif;?>
                        <?php endforeach; ?>
                        <!-- <option>Poetry</option>
                        <option>Inspiration</option>
                        <option>Life Lessons</option> -->
                      </select>
                    </div>
                    <div class="input-group">
                    <?php if (empty($publish_status)):?>
                      <label>
                        <input type="checkbox" name="publish_status" /> Publish
                      </label>
                    <?php else:?>
                      <label>
                        <input type="checkbox" name="publish_status" checked/> Publish
                      </label>
                    <?php endif;?>
                    </div>
                    <div class="input-group">
                      <button type="submit" name="add-blog-post" class="btn">Save Post</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Modal-->
  <?php include(ROOT_PATH."/app/includes/modals.php");?>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
