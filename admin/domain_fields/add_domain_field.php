<?php include("../../path.php");?>
<?php include(ROOT_PATH."/app/controllers/domain_fields.php");?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Domain Field - Add domain field</title>

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

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Add New domain field</h1>

          <!-- Content Row -->
          <div class="row">

            <!-- First Blog Topics -->
            <div class="col-lg-6">

              <!-- Custom Text Color Utilities -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="index.php" class="btn btn-sm btn-info" >Manage Domain fields</a>
                    <a href="add_topic.php" class="btn btn-sm btn-info">Add new domain field</a>
                </div>
                <div class="card-body">
                    <?php include(ROOT_PATH."/app/helpers/formErrors.php");?>
                    <form action="add_domain_field.php" method="post">
                      <div class="my-2">Domain name</div>
                      <input type="text" name="domain_name" id="domain_name" class="form-control input-sm input"
                            value="<?php echo $domain_name?>" placeholder="Name of the domain field" />

                      <div class="my-2">Description</div>
                      <textarea name="description" id="description" class="form-control"
                      placeholder="Machine learning, Education, Social experimentation etc..."><?php echo $description?></textarea>

                      <div class="my-2"></div>
                      <input type="submit" name="save_domain_field" id="save_domain_field" class="btn btn-secondary btn-icon-split form-control"
                      value="Save Domain">
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
