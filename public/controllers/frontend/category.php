<?php

// modeli
include_once '../../../models/connection.php';
include_once '../../../models/productModel.php';
include_once '../../../models/categoryModel.php';
include_once '../../../models/stickerModel.php';
include_once '../../../models/userModel.php';



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


// validacija get-a

$status = FALSE;
$systemMessage = "";
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    // go to database and check product
    $categoryId = $_GET['id'];
    $openedRow = getOneCategory($connection, $categoryId);
    if ($openedRow) {
        $status = TRUE;
    } else {
        header('HTTP/1.1 404 Not Found');
        $systemMessage = "Category was not found!!!";
    }
} else {
    $systemMessage = "Not valid ID in request!!!";
}

// dobiti sve produkte za kategoriju
if ($status) {
    $currentPage = 1;



    $numberOfRowsPerPage = 3;

    $totalNumberOfProducts = getCategoriesForNavigation($connection, $categoryId, $filters);
    if(isset($totalNumberOfProducts[0]['total'])) {
    $totalNumberOfProducts = $totalNumberOfProducts[0]['total'];
    } else {
        $totalNumberOfProducts = 0;
    }

    $numberOfPages = ceil($totalNumberOfProducts / $numberOfRowsPerPage);
    print_r($numberOfPages);
    if (isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $numberOfPages) {
        $currentPage = $_GET['page'];
    }

    $productsFromCategory = getAllProductsForPagination($connection, $filters, $currentPage, $numberOfRowsPerPage, $categoryId);
}

// view-ovi
include_once '../../../views/headView.php';
include_once '../../../views/headerView.php';
include_once '../../../views/navigationView.php';
include_once '../../../views/frontend/categoryView.php';
include_once '../../../views/footerView.php';
