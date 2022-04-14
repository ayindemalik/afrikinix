<?php include("../../path.php");?>
<?php include(ROOT_PATH."/app/controllers/theses_process.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - theses - update thesis</title>

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
      <?php include(ROOT_PATH."/member/design_includes/member_sidebar.php")?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include(ROOT_PATH."/member/design_includes/member_topbar.php")?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php include(ROOT_PATH."/app/includes/messages.php");?>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Update thesis</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="collapse-item btn btn-info" href="index.php">Manage theses</a>
              <a class="collapse-item btn btn-info" href="add_thesis.php">Add new thesis</a>
            </div>
            <form action="add_thesis.php"  method="post" enctype="multipart/form-data">
              <div class="card-body">
                <?php include(ROOT_PATH."/app/helpers/formErrors.php");?>
                <div class="row">
                  <!-- START CARD 1 -->
                  <div class="col-lg-6">
                        <input type="text" name="thesis_id" id="thesis_id" class="form-control input-sm input"
                              value="<?php echo $thesis_id;?>"
                              placeholder="0123456" readonly/>

                        <div class="my-2">Thesis's title</div>
                        <input type="text" name="thesis_title" id="thesis_title" class="form-control input-sm input"
                            value="<?php echo $thesis_title ?>" placeholder="The title of the of the article" />

                        <div class="my-2">Aurthor(s)</div>
                        <input type="text" name="authors" id="authors" class="form-control input-sm input"
                            value="<?php echo $authors?>" placeholder="Example: Firstname1 LASTNAME1, Firstname2 LASTNAME2, etc.." />

                        <!-- UNIV & DEPART -->
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="my-2">University</div>
                            <input type="text" name="university" id="university" class="form-control input-sm input"
                                value="<?php echo $university?>" placeholder="Name of university study" />
                          </div>
                          <div class="col-sm-6">
                            <div class="my-2">Department</div>
                            <input type="text" name="department" id="department" class="form-control input-sm input"
                                        value="<?php echo $department?>" placeholder="Your department of study" />
                          </div>
                        </div>
                        <!-- DEGREE AND YEAR -->
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="my-2">Degree Level</div>
                            <select id="degree_level" name="degree_level" class="form-control">
                              <?php if (isset($degree_level)):
                                echo '<option value="'.$degree_level.'" selected>'.$degree_level.'</option>';
                               endif ;?>
                              <option value="">Select degree</option>
                              <option value="Doctorat">Doctorat(PhD)</option>
                              <option value="Master">Master</option>
                              <option value="Bachelor">Bachelor</option>
                              <option value="Diploma">Diploma</option>
                            </select>
                          </div>
                          <div class="col-sm-6">
                            <div class="my-2">Achievment Year</div>
                            <input type="number" name="year" id="year" class="form-control input-sm input"
                                value="<?php echo $year?>" placeholder="2020"/>
                          </div>
                        </div>

                  </div>
                  <!-- END CARD 1 -->
                  <!-- START CARD 2 -->
                  <div class="col-lg-6">
                        <div class="my-2">Main Domain Fields of study </div>
                        <div class="my-2">
                          <div class="row">
                            <div class="col-sm-8">
                              <select id="domain_field" name="domain_field" class="form-control">
                                <?php
                                // if (isset($domain_field)):
                                //   echo '<option value="'.$domain_field.'" selected>'.$domain_field.'</option>';
                                //  endif ;
                                 ?>

                                <option value="">Add Domain Field</option>
                                <?php foreach ($domain_fields as $key => $domain_f): ?>
                                  <?php if (!empty($domain_field) && $domain_field == $domain_f['domain_id']):?>
                                  <option selected value="<?php echo $domain_f['domain_id'] ?>">
                                    <?php echo $domain_f['domain_name'] ?></option>
                                  <?php else: ?>
                                  <option value="<?php echo $domain_f['domain_id'] ?>">
                                    <?php echo $domain_f['domain_name'] ?></option>
                                  <?php endif;?>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="col-sm-4">

                            </div>
                          </div>
                        </div>

                        <!-- KEYWORDS -->
                        <div class="my-2">Research keywords</div>
                        <textarea name="thes_keywords" id="thes_keywords" class="form-control" placeholder="Machine learning,
                        Education, Social experimentation etc..."><?php echo $thes_keywords?></textarea>

                        <!-- ABSTRACT -->
                        <div class="my-2">Abstract</div>
                        <textarea name="abstract" id="abstract" class="form-control"><?php echo $abstract?></textarea>

                        <!-- FILE -->
                        <div class="my-2">Upload thesis's file (pdf)</div>
                        <input type="file" name="thesis_file" id="thesis_file" class="form-control input-sm input"
                            value="" placeholder="select file"/>

                        <div class="my-2"></div>
                        <input type="submit" name="save_up_thesis" id="save_up_thesis" class="btn btn-secondary btn-icon-split form-control"
                        value="Save thesis updates">
                  </div>
                  <!-- END CARD -->
                </div>
              </div>
            </form>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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
