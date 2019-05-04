<?php
// session start
if(!isset($_SESSION)){
    session_start();
}
    
include_once '../../../models/connection.php';
include_once '../../../models/productModel.php';
include_once '../../../models/categoryModel.php';
include_once '../../../models/stickerModel.php';
include_once '../../../models/userModel.php';

$status = FALSE;
if(isset($_SESSION['message'])){
    // flash message
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    header('Location: /index.php');
    die();
}



include_once '../../../views/headView.php';
include_once '../../../views/headerView.php';
include_once '../../../views/navigationView.php';
include_once '../../../views/frontend/messageView.php';
include_once '../../../views/footerView.php';
