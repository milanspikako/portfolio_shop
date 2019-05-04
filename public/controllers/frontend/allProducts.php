<?php

include_once '../../../models/connection.php';
include_once '../../../models/userModel.php';
include_once '../../../models/categoryModel.php';
include_once '../../../models/stickerModel.php';
include_once '../../../models/productModel.php';



$filters = [];

if (isset($_GET['minRange']) && is_numeric($_GET['minRange'])) {
    $filters['priceRangeMin'] = $_GET['minRange'];

}
if (isset($_GET['maxRange']) && is_numeric($_GET['maxRange'])) {
        $filters['priceRangeMax'] = $_GET['maxRange'];
}



// XSS
if (isset($_GET['order-by']) && isset($_GET['order-direction'])) {
  $orderPossibleValues = ['title', 'price', 'discount'];
  if (in_array($_GET['order-by'], $orderPossibleValues)) {
    $filters['order-by'] = $_GET['order-by'];

    if ($_GET['order-direction'] == 'asc' || $_GET['order-direction'] == 'desc') {
      $filters['order-direction'] = $_GET['order-direction'];
    } else {
      $filters['order-direction'] = 'asc';
    }
  }
}



$currentPage = 1;

$numberOfRowsPerPage = 12;

$totalNumberOfProducts = count(getAllProducts($connection, $filters));

$numberOfPages = ceil($totalNumberOfProducts / $numberOfRowsPerPage);

if (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $numberOfPages) {
  $currentPage = $_GET['page'];
}

$products = getAllProductsForPagination($connection, $filters, $currentPage, $numberOfRowsPerPage);

include_once '../../../views/headView.php';
include_once '../../../views/headerView.php';
include_once '../../../views/navigationView.php';
include_once '../../../views/frontend/allProductsView.php';
include_once '../../../views/footerView.php';
