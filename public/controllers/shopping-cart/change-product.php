<?php

// session start
if (!isset($_SESSION)) {
    session_start();
}

// model
include_once '../../../models/connection.php';
include_once '../../../models/productModel.php';

// validate id and find product
$status = FALSE;
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    // go to database and check product
    $productId = $_GET['id'];
    $openedRow = getOneProduct($connection, $productId);
    if ($openedRow) {
        $status = TRUE;
    } else {
        $_SESSION['message'] = "Product was not found!!!";
        //milan changed path here
        header('Location: /public/controllers/frontend/message.php');
        //$systemMessage = "Product was not found!!!";
        die();
    }
} else {
    $_SESSION['message'] = "Not valid ID in request!!!";
    //milan changed path here
    header('Location: /public/controllers/frontend/message.php');
    die();
    //$systemMessage = "Not valid ID in request!!!";
}

// validate type
$typePossibleValues = ['plus', 'minus', 'remove', 'setQuantity'];
if (isset($_GET['type']) && in_array($_GET['type'], $typePossibleValues)) {
    $status = TRUE;
    $type = $_GET['type'];
} else {
    $_SESSION['message'] = "Not valid TYPE in request!!!";
    //milan changed path here
    header('Location: /public/controllers/frontend/message.php');
    die();
}

//validate quantity milan added

if (isset($_GET['quantity'])) {
    if (!is_numeric($_GET['quantity']) && $_GET['quantity'] <= 0) {
        $_SESSION['message'] = "Not valid quantity in request!!!";

        header('Location: /public/controllers/frontend/message.php');
        die();
    }
    $status = TRUE;
    $quantity = $_GET['quantity'];
}



// provera da li korpa vec postoji
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    // vec postoji
    $cart = $_SESSION['cart'];

    if (isset($cart[$productId])) {
        // vec se nalazi u korpi
        // ovo je trenutno stanje u korpi
        $productForCart = $cart[$productId];
    } else {
        // imamo neke proizvode u korpi ali nemamo taj koji se trazi
        $productForCart = [
            'id' => $productId,
            'title' => $openedRow['title'],
            'image' => $openedRow['image'],
            //'price' => $openedRow['price'],
            'quantity' => 0
        ];

        if ($openedRow['discount'] > 0) {
            $productForCart['price'] = $openedRow['price'] * (100 - $openedRow['discount']) / 100;
        } else {
            $productForCart['price'] = $openedRow['price'];
        }
    }
} else {
    // korpa je skroz prazna
    // ne postoji jos uvek nijedan proizvod
    $cart = [];
    $productForCart = [
        'id' => $productId,
        'title' => $openedRow['title'],
        'image' => $openedRow['image'],
        //'price' => $openedRow['price'],
        'quantity' => 0
    ];

    if ($openedRow['discount'] > 0) {
        $productForCart['price'] = $openedRow['price'] * (100 - $openedRow['discount']) / 100;
    } else {
        $productForCart['price'] = $openedRow['price'];
    }
}


switch ($type) {
    case 'plus':

        $productForCart['quantity'] = $productForCart['quantity'] + 1;
        // vrati nazad u korpu uvecano
        $cart[$productId] = $productForCart;

        break;
    case 'minus':
        $productForCart['quantity'] = $productForCart['quantity'] - 1;
        if ($productForCart['quantity'] > 0) {
            // jos ih je ostalo
            $cart[$productId] = $productForCart;
        } else {
            // poslednje obrisan proizvod
            unset($cart[$productId]);
        }

        break;

    case 'setQuantity':
        $productForCart['quantity'] += $quantity;
        if ($productForCart['quantity'] > 0) {
            // jos ih je ostalo
            $cart[$productId] = $productForCart;
        } else {
            // poslednje obrisan proizvod
            unset($cart[$productId]);
        }

        break;

    case 'remove':
        // obrisi proizvod iz korpe skroz
        unset($cart[$productId]);
        break;
}





// vracamo korpu nazad u sesiju
$_SESSION['cart'] = $cart;



//echo "<pre>";
//print_r($cart);
//echo "</pre>";
//milan changed path here
header('Location: /public/controllers/shopping-cart/index.php');
