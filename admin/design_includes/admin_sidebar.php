<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo BASE_URL."/admin/index.php"?>">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo BASE_URL."/admin/index.php"?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <!-- <hr class="sidebar-divider"> -->
  <hr class="sidebar-divider my-0">

  <li class="nav-item">
    <a class="nav-link" href="<?php echo BASE_URL.""?>">
      <i class="fas fa-globe"></i>
      <strong>Go to Afrikinix.com</strong></a>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Heading -->

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo BASE_URL."/admin/users/index.php"?>"
      data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-user"></i>
      <span>User Operations</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Users Management</h6>
        <a class="collapse-item" href="<?php echo BASE_URL."/admin/users/create_user.php"?>">Create User</a>
        <a class="collapse-item" href="<?php echo BASE_URL."/admin/users/index.php"?>">Manage User</a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Theses -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo BASE_URL."/admin/theses/index.php"?>"
        data-toggle="collapse" data-target="#collapseTheses" aria-expanded="true" aria-controls="collapseTheses">
        <i class="fas fa-fw fa-folder"></i>
        <span>Thesis Operations</span>
      </a>
      <div id="collapseTheses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Theses</h6>
          <a class="collapse-item" href="<?php echo BASE_URL."/admin/theses/add_thesis.php"?>">Add thesis</a>
          <a class="collapse-item" href="<?php echo BASE_URL."/admin/theses/index.php"?>">Manage Theses</a>
        </div>
      </div>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Articles -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo BASE_URL."/admin/articles/index.php"?>"
      data-toggle="collapse" data-target="#collapseArticles" aria-expanded="true" aria-controls="collapseArticles">
      <i class="fas fa-fw fa-folder"></i>
      <span>Articles Operations</span>
    </a>
    <div id="collapseArticles" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Manage Articles</h6>
        <a class="collapse-item" href="<?php echo BASE_URL."/admin/articles/index.php"?>">Manage articles</a>
        <a class="collapse-item" href="<?php echo BASE_URL."/admin/articles/add_article.php"?>">Add article</a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - projects -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo BASE_URL."/admin/projects/index.php"?>"
      data-toggle="collapse" data-target="#collapseProjects" aria-expanded="true" aria-controls="collapseProjects">
      <i class="fas fa-fw fa-folder"></i>
      <span>Projects Operations</span>
    </a>
    <div id="collapseProjects" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Manage Projects</h6>
        <a class="collapse-item" href="<?php echo BASE_URL."/admin/projects/index.php"?>">Manage project</a>
        <a class="collapse-item" href="<?php echo BASE_URL."/admin/projects/add_project.php"?>">Add project</a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider my-0">

  <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo BASE_URL."/admin/domain_fields/index.php"?>"
        data-toggle="collapse" data-target="#collapseDomainField" aria-expanded="true" aria-controls="collapseDomainField">
        <i class="fas fa-fw fa-folder"></i>
        <span>Domain F. Operations</span>
      </a>
      <div id="collapseDomainField" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Domain fields</h6>
          <a class="collapse-item" href="<?php echo BASE_URL."/admin/domain_fields/index.php"?>">Manage Domain fields</a>
          <a class="collapse-item" href="<?php echo BASE_URL."/admin/domain_fields/add_domain_field.php"?>">Add Domain field</a>
        </div>
      </div>
  </li>

  <hr class="sidebar-divider my-0">

  <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo BASE_URL."/admin/blogs/index.php"?>"
        data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseBlog">
        <i class="fas fa-fw fa-folder"></i>
        <span>Blog Operations</span>
      </a>
      <div id="collapseBlog" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Blogs</h6>
          <a class="collapse-item" href="<?php echo BASE_URL."/admin/blogs/index.php"?>">Manage Blogs</a>
          <a class="collapse-item" href="<?php echo BASE_URL."/admin/blogs/create_blog.php"?>">Add Blogs</a>
        </div>
      </div>
  </li>

  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTopic" aria-expanded="true" aria-controls="collapseTopic">
        <i class="fas fa-fw fa-folder"></i>
        <span>Topic Operations</span>
      </a>
      <div id="collapseTopic" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Manage Topics</h6>
          <a class="collapse-item" href="<?php echo BASE_URL."/admin/topics/index.php"?>">Manage Topics</a>
          <a class="collapse-item" href="<?php echo BASE_URL."/admin/topics/add_topic.php"?>">Add Topic</a>

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
