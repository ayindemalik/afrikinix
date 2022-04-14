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

  <title>Admin - Domain index</title>

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
          <h1 class="h3 mb-2 text-gray-800">Manage all domain fieds</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
              <a class="collapse-item btn btn-info" href="index.php">Manage domain fields</a>
              <a class="collapse-item btn btn-info" href="add_domain_field.php">Add new domain field</a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Domain field name</th>
                      <th>Description</th>
                      <th><i class="fas fa-fw fa-edit"></i>Edit</th>
                      <th><i class="fas fa-fw fa-trash"></i>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Domain field name</th>
                      <th>Description</th>
                      <th><i class="fas fa-fw fa-edit"></i></th>
                      <th><i class="fas fa-fw fa-trash"></i></th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php foreach ($domain_fields as $key => $domain_f):?>
                    <tr>
                      <td><?php echo $key +1; ?></td>
                      <td><a href="#"><?php echo $domain_f['domain_name'];?></a></td>
                      <td><?php echo $domain_f['description'];?></td>
                      <td><a href="edit.php?id=<?php echo $domain_f['domain_id'];?>">
                        <i class="fas fa-fw fa-edit"></i></a></td>
                      <td>
                          <button class="domain_delete btn btn-danger" id="<?php echo $domain_f['domain_id'];?>">
                            <i class="fas fa-fw fa-trash"></i></i>
                          </button>
                      </td>

                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
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

  <script type="text/javascript">
    $(document).ready(function () {
      var domain_id;
      $(document).on('click', '.domain_delete', function(event){
        domain_id = event.target.id;
        domain_id = this.id;
        console.log("proj target->"+domain_id);
        var message = '';
        message = '';
        message += 'Click on <a class="btn btn-primary" href="index.php?del_domf_id='+domain_id+'">Delete</a> ';
        message += 'to delete the selected domain field completely.';
        SilmeUyari(message);
      });
    });
    function SilmeUyari(message){
      $('#deleteModal').modal('show');
      $('#modal_body').html(message);
    };
  </script>

</body>

</html>
