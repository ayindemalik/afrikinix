<?php
include("path.php");
//logout.php
session_start();
session_destroy();
header("location:".BASE_URL."/index.php");

?>
