<?php

// by Tong
// not finished

require_once "inc/Utilities/LoginManager.php";
require_once "inc/Utilities/Page.class.php";

session_start();

if (!LoginManager::verifyLogin()){
    header('Location: pro.corona.php');
}

Page::$_title = "Admin page";
Page::header();
echo 'Welcome, ' . ($_SESSION['loggedin']['username']);


?>
<a href="editAdmin.php" class="btn btn-primary">Edit Admin Info</a>
<a href="loggedout.php" class="btn btn-primary">Log out</a>
<?php

Page::footer();


?>