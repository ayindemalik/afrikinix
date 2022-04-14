<?php include("../path.php");
include(ROOT_PATH."/app/database/db.php");
include(ROOT_PATH."/app/helpers/middleware.php");
memberOnly();
$member_articles = selectAll("articles", ['user_id'=>$_SESSION['user_id']]);
$mem_blog_posts = selectAll("blog_posts", ['user_id'=>$_SESSION['user_id']]);
$mem_projects = selectAll("projects", ['user_id'=>$_SESSION['user_id']]);
$member_theses = selectAll("theses", ['user_id'=>$_SESSION['user_id']]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Member Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include(ROOT_PATH."/member/design_includes/member_sidebar.php")?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <!-- Top bar -->
        <?php include(ROOT_PATH."/member/design_includes/member_topbar.php")?>
      <!-- Top bar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">My Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">My total thesis</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($member_theses)?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">My Total articles</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($member_articles)?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book-reader fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Totol Projects</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($mem_projects)?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">My Totol Blogs</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($mem_blog_posts)?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-rss fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->


          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">My Operations</h6>
                </div>
              </div>
              <div class="row">

                <div class="col-lg-6 mb-4">
                  <a href="<?php echo BASE_URL."/member/theses/index.php"?>">
                    <div class="card bg-success text-white shadow">
                      <div class="card-body">
                        Manage my thesis
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-6 mb-4">
                  <a href="<?php echo BASE_URL."/member/articles/index.php"?>">
                    <div class="card bg-info text-white shadow">
                      <div class="card-body">
                        Manage my articles
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-6 mb-4">
                  <a href="<?php echo BASE_URL."/member/projects/index.php"?>">
                    <div class="card bg-warning text-white shadow">
                      <div class="card-body">
                        Manage my projects
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-6 mb-4">
                  <a href="<?php echo BASE_URL."/member/blogs/index.php"?>">
                    <div class="card bg-danger text-white shadow">
                      <div class="card-body">
                        Manage my blogs
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-lg-6 mb-4">
                  <a href="">
                    <div class="card bg-light text-black shadow">
                      <div class="card-body">
                        Other
                      </div>
                    </div>
                  </a>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo BASE_URL.'/logout.php'?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
