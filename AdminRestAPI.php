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

AdminDAO::initialize();
AdminLoginDAO::initialize();

// get and decode request data
$requestData = json_decode(file_get_contents('php://input'));

// when requested source is admin
$hasExisted = false;

if ($requestData->resource == 'admin') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // check if adminId already existed
        $admins = AdminDAO::getAdmins();
        foreach ($admins as $admin){
            if ($requestData->adminId == $admin->getAdminUserId()){
                $hasExisted = true;
                header('Content-Type: application/json');
                echo json_encode('Admin Id already exists');  
            }
        }

        // if adminId doesn't exist, insert data to adminLogin
        if (!$hasExisted){
                        
            $newAdmin = new Admin();
            $newAdmin->setAdminUserId($requestData->adminId);
            $newAdmin->setFirstName($requestData->firstName);
            $newAdmin->setLastName($requestData->lastName);
            $newAdmin->setEmail($requestData->email);
            $newAdmin->setPhone($requestData->phone);
            $newAdmin->setCompanyName($requestData->companyName);
            // insert to admin
            $result = AdminDAO::createAdmin($newAdmin);

            header('Content-Type: application/json');
            echo json_encode($result);  
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        if (isset($requestData->adminId)){
            // get one
            $admin = AdminDAO::getAdmin($requestData->adminId);

            header('Content-Type: application/json');
            echo json_encode($admin->jsonSerialize());  
        }else{
            // get all
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if (isset($requestData->adminId)){
            // only when an id is provided
            // if (!isset)
            $newAdmin = new Admin();
            $newAdmin->setAdminUserId($requestData->adminId);
            $newAdmin->setFirstName($requestData->firstName);
            $newAdmin->setLastName($requestData->lastName);
            $newAdmin->setEmail($requestData->email);
            $newAdmin->setPhone($requestData->phone);
            $newAdmin->setCompanyName($requestData->companyName);
            $result = AdminDAO::updateAdmin($newAdmin);

            header('Content-Type: application/json');
            echo json_encode($result);  
        }
    }
}

if ($requestData->resource == 'adminLogin'){
    if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $newAdminLogin = new AdminLogin();
        $newAdminLogin->setAdminUserId($requestData->adminId);
        $newAdminLogin->setAdminPassword($requestData->password);
        // insert to adminLogin
        $result = AdminLoginDAO::createAdmin($newAdminLogin);

        header('Content-Type: application/json');
        echo json_encode($result);  
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        if (isset($requestData->adminId)){
            // get one
            $adminLogin = AdminLoginDAO::getAdmin($requestData->adminId);

            header('Content-Type: application/json');
            echo json_encode($adminLogin->jsonSerialize());  
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
        if (isset($requestData->adminId)){
            $newAdminLogin = new AdminLogin();
            $newAdminLogin->setAdminUserId($requestData->adminId);
            $newAdminLogin->setAdminPassword($requestData->password);
            $result = AdminLoginDAO::updateAdmin($newAdminLogin);

            header('Content-Type: application/json');
            echo json_encode($result);  
        }
    }
}
?>