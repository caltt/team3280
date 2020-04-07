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

if (!empty($_POST) && $_POST['action'] == 'createAdmin'){
    if ($_POST['password'] != $_POST['confirmedPassword']){
        echo 'Please make sure that you input the same password for confirmation.';
    }else{

        $postData = [
            'resource' => 'admin',  // specify what resource to deal with
            'adminId' => $_POST['adminId'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'companyName' => $_POST['companyName'],
        ];
        $result = AdminRestClient::call('POST', $postData);
        var_dump($result);
        if (is_numeric($result)){
            echo 'Admin ' . $_POST['adminId'] . ' signed up.';
        }else{
            echo $result;
        }
    }
}


Page::$_title = 'Sign up';
Page::header();
Page::signUpForm();
Page::footer();


?>