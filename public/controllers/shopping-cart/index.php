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

if(isset($_SESSION['cart'])){
    // ima nesto u korpi
    $cart = $_SESSION['cart'];
} else {
   // korpa je prazna
    $cart = [];
}



include_once '../../../views/headView.php';
include_once '../../../views/headerView.php';
include_once '../../../views/navigationView.php';
include_once '../../../views/shopping-cart/indexView.php';
include_once '../../../views/footerView.php';
