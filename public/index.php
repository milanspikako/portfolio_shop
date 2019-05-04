<?php
include_once '../models/connection.php';
include_once '../models/productModel.php';
include_once '../models/categoryModel.php';
include_once '../models/stickerModel.php';
include_once '../models/userModel.php';


$allProductsForHomepage = getAllProductsForHomepage($connection);


require_once '../views/headView.php';
//header.php must be required before navigationView.php
require_once '../views/headerView.php';
require_once '../views/navigationView.php';
// Savio sam samo kao PLACEHOLDER da vidim da lsa msve dobro povezao
// kasnije cemo da obrisemo ovo
require_once '../views/indexView.php';

include_once '../views/footerView.php';
