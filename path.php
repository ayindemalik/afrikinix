<?php
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]."/projects/afrikinix_new");
// var_dump(ROOT_PATH);
// var to the base url
// define('BASE_URL', "http://localhost/projects/Afrikinc-updated");
define('BASE_URL', "http://engmalik.com/projects/afrikinix_new");
// to display the value of defined variables
// var_dump(BASE_URL);
session_start();

define('USERS_PROCESS_PATH', BASE_URL."/app/controllers/common_process.php");
?>
