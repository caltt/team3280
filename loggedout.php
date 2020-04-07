<?php

// Tong

require_once "inc/Utilities/LoginManager.php";

if (LoginManager::verifyLogin()) {
    session_destroy();
    
    header('Refresh:3; URL=pro.corona.php');
    echo 'You have logged out. You will be redirected to login page in 3 seconds.';
}else{
    echo 'something wrong';
}
