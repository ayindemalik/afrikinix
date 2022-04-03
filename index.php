<?php include("path.php");?>
<?php include(ROOT_PATH."/app/controllers/common_process.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Afrikinix Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php include("assets/includes/head_links.php");?>
</head>
<body>
  <!-- ======= Top Bar ======= -->
  <?php //include ROOT_PATH."/Layouts/Master/_top_bar.php"?>
  <!-- ! TOP BAR -->

  <!-- ======= HEADER ======= -->
  <!-- <header class="header"> -->
  <?php //include(ROOT_PATH."/Layouts/Master/_header.php")?>
  <!-- </header> -->
  <!-- END HEADER -->
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
    <?php include ROOT_PATH."/Layouts/Master/_top_bar.php"?>
  </div>

  <!-- ======= HEADER ======= -->
  <header id="header" class="fixed-top d-flex align-items-center " style="background: rgba(5, 87, 158, 0.9);">
    <?php include ROOT_PATH."/Layouts/Master/_header.php" ?>
  </header>

  <?php include ROOT_PATH."/Layouts/Home/_banner_hero.php"?>

  <main id="main">
    <?php include ROOT_PATH."/Layouts/Home/_modules.php"?>

    <?php include ROOT_PATH."/Layouts/Home/_article_thesis.php"?>

    <?php include ROOT_PATH."/Layouts/Home/_projects.php"?>

    <?php include ROOT_PATH."/Layouts/Home/_blogs.php"?>
  </main>

  <?php include ROOT_PATH."/Layouts/Master/_footer.php"?>

  <?php include(ROOT_PATH."/app/includes/modals.php");?>

  <?php include("assets/includes/script_links.php");?>
  <script type="text/javascript" src="common_scripts.js"></script>

</body>

</html>
