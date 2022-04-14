<!-- <header id="header" class="fixed-top d-flex align-items-center "> -->

  <div class="container d-flex align-items-center justify-content-between">
      <!-- <h1 class="logo"><a href="<?php //echo BASE_URL.'/'?>">Afrikinix</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="<?php echo BASE_URL.'/'?>" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="<?php echo BASE_URL.'/'?>">Home</a></li>
          <li><a class="nav-link scrollto" href="<?php echo BASE_URL.'/about.php'?>">About us</a></li>
          <li><a class="nav-link scrollto" href="<?php echo BASE_URL.'/team.php'?>">Our Team</a></li>
          <li class="dropdown">
            <a href="#"><span>Modules</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo BASE_URL.'/articles.php'?>">Articles</a></li>
              <li><a href="<?php echo BASE_URL.'/theses.php'?>">Theses</a></li>
              <li><a href="<?php echo BASE_URL.'/projects.php'?>">Projects</a></li>
              <li><a href="<?php echo BASE_URL.'/blogs.php'?>">Blogs</a></li>
            </ul>
          </li>
          <li><a href="forum.php">Forum</a></li>
          <li><a class="nav-link scrollto" href="<?php echo BASE_URL.'/contact.php'?>">Contact us</a></li>
          <li class="dropdown">
            <a href="#">
              <span>
                <i class="bi bi-person-circle"></i>
                    <?php
                       if(isset($_SESSION['user_id'])) {
                           echo '<span>'.$_SESSION['username'].'('.$_SESSION['role'].')</span>';
                      }
                      else {
                        echo '<span>Account(Guess)</span>';
                      }
                    ?>
              </span>
              <i class="bi bi-chevron-down"></i></a>
              <ul>
                <?php
                  if(isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
                     if($_SESSION['role'] === "Member"){
                       echo '<li><a href="'.BASE_URL.'/member/index.php">
                                <i class="bi bi-speedometer pr-1"></i>My dashboard</a></li>';
                     }
                     elseif ($_SESSION['role'] === "Admin") {
                       echo '<li><a href="'.BASE_URL.'/admin/index.php">
                                <i class="bi bi-speedometer pr-1"></i>My dashboard</a></li>';
                     }
                     echo '<li><a href="logout.php">
                      <i class="fas fa-sign-out-alt"></i>logout</a></li>';
                     }
                     else {
                       // echo '<a class="dropdown-item" href="login.php"><i class="fas fa-sign-in-alt pr-2"></i>login</a>';
                       echo '<li><a href=""  data-toggle="modal" data-target="#userAccountModal">
                              <i class="fas fa-sign-in-alt"></i>Login</a></li>';
                     }

                ?>
                <!-- <li><a href="#">Login</a></li>
                <li><a href="">Logout</a></li>
                <li><a href="#">Dashboard</a></li> -->
              </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  <!-- </header> -->
