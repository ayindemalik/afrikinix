<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete operation !</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="deleteModal_body">Select "Delete" below if you are ready to delete the selected topic completely.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary hideModal" type="button" data-dismiss="modal">Cancel</button>
        <!-- <a class="btn btn-primary" href="login.html">Delete</a> -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoModalLabel">Are you sure you want to delete the topic?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="infoModal_body">Select "Delete" below if you are ready to delete the selected topic completely.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary hideModal" type="button" data-dismiss="modal">Cancel</button>
        <!-- <a class="btn btn-primary" href="login.html">Delete</a> -->
      </div>
    </div>
  </div>
</div>
<!-- LOGOUT MODAL -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel"><i class="fas fa-sign-out-alt pr-2"></i>Sign out</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body alert alert-warning " id="logoutModal_body">Are you sure you would like to end your session and sign out ?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary hideModal" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?php echo BASE_URL.'/logout.php'?>"><i class="fas fa-sign-out-alt pr-2">Yes</i></a>
      </div>
    </div>
  </div>
</div>

<!-- ABSTRACT MODAL -->
<div class = "modal fade" id = "AbstractModal" tabindex = "-1" role = "dialog" aria-labelledby="exampleModalLabel" aria-hidden = "true">
    <div class = "modal-dialog" role = "document">
        <div class = "modal-content">
          <div class = "modal-header">
              <h5 class = "modal-title" id = "modalTitle">Abstract</h5>
              <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                <span aria-hidden = "true">×</span>
              </button>
          </div>

          <div class = "modal-body" >
              <div id="result_data">
              </div>
          </div>

          <div class = "modal-footer hideModal">
              <button type = "button" class = "btn btn btn-danger" data-dismiss = "modal">Close</button>
              <!-- <button type = "button" class = "btn btn-success">Save</button> -->
          </div>
        </div>
    </div>
  </div>

<!-- USER ACCOUNT MODAL -->
<div class="modal fade" id="userAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <!-- HEADER -->
      <div class="modal-header">
        <h5 class="modal-title"><i class="fas fa-user-circle">

        </i> <strong>Afrikinix Membership</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- BODY -->
      <div class="modal-body">
        <h6 style="color: #007bff;
        text-transform: capitalize;text-align: center;" class="font-weight-bold pt-0">
          <!-- <strong>Connectez</strong> ou <strong>Inscrivez-vous</strong> et  publier vos connaissances et projects pour l'Afrique</h5> -->
          <strong>Login</strong> Or <strong>Sign Up</strong> And Share Your Theses, articles, And Projects For The benefit of Africa</h6>
        <!-- PORCESS MESSAGE -->
        <div class="form-group" id="accountMessage"></div>
          <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#login" data-toggle="tab"><i class="fa fa-user"></i> Login</a></li>
                  <li class="nav-item"><a class="nav-link " href="#registration" data-toggle="tab"><i class="fa fa-edit"></i> Registration</a></li>
                </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <!-- LOGIN TAB-PANE -->
                <div class="active tab-pane" id="login">
                  <form class="form-horizontal" id="userLoginForm" method="POST" action="" unsubit=false>
                    <!-- username -->
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                      </div>
                      <input type="text" class="form-control" id="login_username" name="login_username"  placeholder="account username" required>
                    </div>

                    <!-- PASS -->
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                      </div>
                      <input type="password" class="form-control" id="login_password" name="login_password"  placeholder="password" required>
                    </div>

                    <!-- SUBMIT -->
                    <div class="form-group">
          						<div class="clearfix">
                        <input type="submit" id="userLogin" name="userLogin" class="btn btn-primary btn-block form-control" value="Login">
          						</div>
          					</div>
                  </form>
                </div>
                <!-- END LOGIN TAB-PANE -->

                <!-- END REGIS TAB-PANE -->
                <div class="tab-pane" id="registration">
                  <form class="form-horizontal" id="userRegistForm" method="POST" action="" unsubit=false>
                    <!-- FIRSTNAME -->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-edit"></i></span>
                        </div>
                        <input type="text" class="form-control" id="reg_firstname" name="firstname"  placeholder="Firstname" required>
                      </div>
                      <!-- MIDDLENAME -->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-edit"></i></span>
                        </div>
                        <input type="text" class="form-control" id="reg_midlename" name="midlename"  placeholder="Middlename">
                      </div>
                      <!-- LASTSTNAME -->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-edit"></i></span>
                        </div>
                        <input type="text" class="form-control" id="reg_lastname" name="lastname"  placeholder="Lastname" required>
                      </div>

                      <!-- USER NAME -->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="reg_username" name="username"  placeholder="username" required>
                      </div>

                      <!-- EMAIL -->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="reg_email" name="email"  placeholder="user@afrinix.com" required>
                      </div>

                      <!-- PASS -->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="reg_password" name="password"  placeholder="password" required>
                      </div>

                      <!-- PASS CONFIRMAION-->
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="reg_passwordConf" name="passwordConf"  placeholder="password confirmation" required>
                      </div>

                      <!-- SUBMIT -->
                      <div class="form-group">
            						<div class="clearfix">
                          <input type="submit" id="userRegBtn" name="userRegist" class="btn btn-primary btn-block form-control" value="Register">
            						</div>
            					</div>
                  </form>
                </div>
                <!-- END REGIS TAB-PANE -->
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
