<?php

// by Tong
// not finished

require_once "inc/config.inc.php";

require_once "inc/Utilities/AdminRestClient.php";
require_once "inc/Utilities/LoginManager.php";
require_once "inc/Utilities/Page.class.php";

session_start();

if (!LoginManager::verifyLogin()){
    header('Location: pro.corona.php');
}

Page::$_title = "Admin page";
Page::header();
$data = [
    'resource' => 'admin',
    'adminId' => $_SESSION['loggedin']['username'],
];

$currentAdmin = AdminRestClient::call('GET', $data);
Page::showAdminInfo($currentAdmin);


Page::footer();


?>