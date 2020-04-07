<?php

// Tong

require_once "inc/config.inc.php";

require_once "inc/Entities/Admin.class.php";
require_once "inc/Entities/AdminLogin.class.php";

require_once "inc/Utilities/LoginManager.php";
require_once "inc/Utilities/PDOService.class.php";
require_once "inc/Utilities/AdminDAO.class.php";
require_once "inc/Utilities/AdminLoginDAO.class.php";
require_once "inc/Utilities/AdminRestClient.php";
require_once "inc/Utilities/Page.class.php";

session_start();

if (!LoginManager::verifyLogin()){
    header('Location: pro.corona.php');
}

Page::$_title = 'Admin Info';
Page::header();

if (isset($_POST['action']) && $_POST['action'] == 'updateAdmin'){

    // when new password is not blank
    if (isset($_POST['newPassword']) && $_POST['newPassword'] !== ''){

        // verify the old password before going ahead

        // get std object for current admin
        $postData = [
            'resource' => 'adminLogin',
            'adminId' => $_SESSION['loggedin']['username'],
        ];

        // var_dump($postData);
        $stdAdminLogin = AdminRestClient::call('GET', $postData);
        // var_dump($stdAdminLogin);

        // convert to admin object
        $currentAdmin = new AdminLogin();
        $currentAdmin->setAdminUserId($stdAdminLogin->AdminUserId);
        $currentAdmin->setAdminPassword($stdAdminLogin->AdminPassword);
        // var_dump($currentAdmin);

        // verify old password
        if (isset($_POST['oldPassword']) && !$currentAdmin->verifyAdminPassword($_POST['oldPassword'])){
            
            // if old password wrong, report
            echo 'Old password wrong.';
        }else{

            // check if confirmed password matches the new password
            if (isset($_POST['confirmedPassword']) && $_POST['confirmedPassword'] !== $_POST['newPassword']){
                // if no
                echo 'Please confirm two inputs for password are the same.';
            }else{
                // if yes, send PUT for adminLogin
                $postData = [
                    'resource' => 'adminLogin',
                    'adminId' => $_SESSION['loggedin']['username'],
                    'password' => password_hash($_POST['newPassword'], PASSWORD_DEFAULT),
                ];
                if (AdminRestClient::call('PUT', $postData) == 1){
                    // report
                    echo '<br>Password updated.';
                }
            }
        }
    }

    // request PUT for admin
    $postData = [
        'resource' => 'admin',
        'adminId' => $_SESSION['loggedin']['username'],
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'companyName' => $_POST['companyName'],
    ];
    if (AdminRestClient::call('PUT', $postData) == 1){
        // report
        echo '<br>Admin info updated.';
    }
}

$getData = [
    'resource' => 'admin',
    'adminId' => $_SESSION['loggedin']['username'],
];

$admin = AdminRestClient::call('GET', $getData);    // std obj
// var_dump($admin);
Page::updateAdmin($admin);

Page::footer();