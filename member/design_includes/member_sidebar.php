<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo BASE_URL."/member"?>">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Member</div>
    </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo BASE_URL."/member"?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>My Dashboard</span></a>
  </li>

  <hr class="sidebar-divider my-0">

  <li class="nav-item">
    <a class="nav-link" href="<?php echo BASE_URL.""?>">
      <i class="fas fa-globe"></i>
      <strong>Go to Afrikinc.com</strong></a>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Theses -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo BASE_URL."/member/theses/index.php"?>"
        data-toggle="collapse" data-target="#collapseTheses" aria-expanded="true" aria-controls="collapseTheses">
        <i class="fas fa-fw fa-folder"></i>
        <span>Theses Operations</span>
      </a>
      <div id="collapseTheses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Theses</h6>
          <a class="collapse-item" href="<?php echo BASE_URL."/member/theses/index.php"?>">Manage my theses</a>
          <a class="collapse-item" href="<?php echo BASE_URL."/member/theses/add_thesis.php"?>">Add new thesis</a>
        </div>
      </div>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Articles -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo BASE_URL."/member/articles/index.php"?>"
      data-toggle="collapse" data-target="#collapseArticles" aria-expanded="true" aria-controls="collapseArticles">
      <i class="fas fa-fw fa-folder"></i>
      <span>Articles Operations</span>
    </a>
    <div id="collapseArticles" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Manage Articles</h6>
        <a class="collapse-item" href="<?php echo BASE_URL."/member/articles/index.php"?>">Manage articles</a>
        <a class="collapse-item" href="<?php echo BASE_URL."/member/articles/add_article.php"?>">Add new article</a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - projects -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo BASE_URL."/member/projects/index.php"?>"
      data-toggle="collapse" data-target="#collapseProjects" aria-expanded="true" aria-controls="collapseProjects">
      <i class="fas fa-fw fa-folder"></i>
      <span>Projects Operations</span>
    </a>
    <div id="collapseProjects" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Manage Projects</h6>
        <a class="collapse-item" href="<?php echo BASE_URL."/member/projects/index.php"?>">Manage project</a>
        <a class="collapse-item" href="<?php echo BASE_URL."/member/projects/add_project.php"?>">Add new project</a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider my-0">

  <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo BASE_URL."/member/blogs/index.php"?>"
        data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseBlog">
        <i class="fas fa-fw fa-folder"></i>
        <span>Blog Operations</span>
      </a>
      <div id="collapseBlog" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Blogs</h6>
          <a class="collapse-item" href="<?php echo BASE_URL."/member/blogs/index.php"?>">Manage blogs</a>
          <a class="collapse-item" href="<?php echo BASE_URL."/member/blogs/create_blog.php"?>">Add new blogs</a>
        </div>
      </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
