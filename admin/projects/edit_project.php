<?php include("../../path.php");?>
<?php include(ROOT_PATH."/app/controllers/project_process.php");?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Project - edit project</title>

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
      <?php include(ROOT_PATH."/admin/design_includes/admin_sidebar.php")?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include(ROOT_PATH."/admin/design_includes/admin_topbar.php")?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php include(ROOT_PATH."/app/includes/messages.php");?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit project</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->
          <div class="row">
            <div class="col-lg-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <a class="collapse-item btn btn-info" href="index.php">Manage projects</a>
                  <a class="collapse-item btn btn-info" href="add_project.php">Add new project</a>
                </div>
                <div class="card-body">
                  <form action="add_project.php" method="post" enctype="multipart/form-data">
                  <?php include(ROOT_PATH."/app/helpers/formErrors.php");?>
                  <input type="text" name="project_id" id="project_id" class="form-control input-sm input"
                              value="<?php echo $project_id?>" readonly/>
                  <div class="my-2">Project name</div>
                  <input type="text" name="project_name" id="project_name" class="form-control input-sm input"
                              value="<?php echo $project_name ?>" placeholder="Please type the name of the project" />

                  <div class="my-2">Arthors</div>

                  <input type="text" name="authors" id="authors" class="form-control input-sm input"
                      value="<?php echo $authors?>" placeholder="Example: Firstname1 LASTNAME1, Firstname2 LASTNAME2, etc.." />

                  <div class="my-2">Main Domain or Fields</div>
                  <div class="my-2">
                    <div class="row">
                      <div class="col-sm-8">
                        <select id="domain_field" name="domain_field" class="form-control">

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
                        <input type="number" name="year" id="year" class="form-control input-sm input"
                            value="<?php echo $year?>" placeholder="2020"/>
                      </div>
                    </div>
                  </div>

                  <div class="my-2">Project description</div>
                  <textarea name="description" id="description" class="form-control"><?php echo $description?></textarea>

                  <div class="my-2">Project Owner</div>
                  <div class="my-2">
                    <div class="row">
                      <div class="col-sm-6">
                        <select id="project_owner" name="project_owner" class="form-control">
                          <?php
                            // if (!empty($individual) && $individual != ""){
                            //   echo '<option selected value="'.$individual.'">'.$individual.'</option>';
                            // }
                            if (!empty($project_owner) && $project_owner != ""){
                              echo '<option selected value="'.$project_owner.'">'.$project_owner.'</option>';
                            }
                           ?>
                          <option value="">Select</option>
                          <option value="Institutional" >Institutional</option>
                          <option value="Individual" >Individual</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <input type="text" name="institution" id="institution" class="form-control input-sm input"
                            value="" placeholder="Institution name"/>
                      </div>
                  </div>

                  <div class="my-2">Select project image</div>
                  <input type="file" name="project_image" id="project_image" class="form-control input-sm input"
                      value="" placeholder="select file"/>

                  <div class="my-2"></div>
                  <input type="submit" name="save_up_project" id="save_up_project" class="btn btn-secondary btn-icon-split form-control"
                  value="Save project updates">
                </form>
                </div>
              </div>
            </div>
          </div>
            <!-- </div> -->
          <!-- </div> -->
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
