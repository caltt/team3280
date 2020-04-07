<?php

// Tong

require_once "inc/config.inc.php";

require_once "inc/Entities/Admin.class.php";
require_once "inc/Entities/AdminLogin.class.php";

require_once "inc/Utilities/PDOService.class.php";
require_once "inc/Utilities/AdminDAO.class.php";
require_once "inc/Utilities/AdminLoginDAO.class.php";
require_once "inc/Utilities/AdminRestClient.php";
require_once "inc/Utilities/Page.class.php";

session_start();

if (!LoginManager::verifyLogin()){
    header('Location: pro.corona.php');
}


Page::$_title = 'Manager the company';
Page::header();

$admin = AdminRestClient::call('GET', $SESSION['loggedin']['username']);

Page::editAdmin();

Page::footer();