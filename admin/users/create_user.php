<?php include("../../path.php");?>
<?php include(ROOT_PATH."/app/controllers/users.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin-Users- create user</title>

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

        <div class="card-header py-3">
          <a href="create_user.php" class="btn btn-sm btn-info">Add User</a>
          <a href="index.php" class="btn btn-sm btn-info">Manage Users</a>
        </div>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Create New User Account</h1> -->
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                  <div class="col-lg-7">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create new Account!</h1>
                      </div>
                      <!-- <div class="text-center"> -->

                      <!-- </div> -->
                      <form class="user" action="create_user.php" method="post">
                          <?php include(ROOT_PATH."/app/helpers/formErrors.php");?>
                        <div class="form-group">
                          <!-- <li>sdfdfdsfsdfadf</li>
                          <li>sdfdfdsfsdfadf dsfdsfadf</li> -->
                        </div>
                        <div class="form-group">
                          <input type="username" name="username" class="form-control form-control-user" id="username"
                          value="<?php echo $username?>" placeholder="Username">
                        </div>
                        <div class="form-group">
                          <input type="email" name="email" class="form-control form-control-user" id="email"
                          value="<?php echo $email?>" placeholder="Email Address">
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" name="password" class="form-control form-control-user" id="password"
                            value="<?php echo $password?>" placeholder="Password">
                          </div>
                          <div class="col-sm-6">
                            <input type="password" name="passwordConf" class="form-control form-control-user" id="passwordConf"
                            value="<?php echo $passwordConf?>"  placeholder="Repeat Password">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-6 dropdown no-arrow">
                            <select class="text-input" name="role" class="form-control form-control-user">
                              <option value="">Select role</option>
                              <option value="Admin">Admin</option>
                              <option value="Member">Member</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <button type="submit" name="admin_create_user" class="btn btn-primary btn-user btn-block">
                            Save User</button>
                        </div>
                        <!-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                          Register Account
                        </a> -->
                        <!-- <hr> -->
                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                          <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                          <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a> -->
                      </form>
                      <!-- <hr> -->
                      <!-- <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                      </div>
                      <div class="text-center">
                        <a class="small" href="login.html">Already have an account? Login!</a>
                      </div> -->
                    </div>
                  </div>
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
