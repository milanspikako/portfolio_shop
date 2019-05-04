<?php

// session start
if (!isset($_SESSION)) {
  session_start();
}

//u promenljivu $formData stavljate $_GET ili $_POST u zavisnosti od forme
$formData = $_POST; // $_GET ili $_POST

if (isset($formData["submit"]) && $formData["submit"] == "back") {
  header('Location: /controllers/shopping-cart/index.php');
  die();
}

$checkoutStatus = FALSE;
$systemMessage = "Please fill the form below and finish your order";
$lastInsertedId = "";
$totalPrice = 0;



include_once '../../../models/connection.php';
include_once '../../../models/productModel.php';
include_once '../../../models/categoryModel.php';
include_once '../../../models/stickerModel.php';
include_once '../../../models/userModel.php';
include_once '../../../models/checkoutModel.php';

// Calcucating the total Price
if (isset($_SESSION['cart'])) {
  // ima nesto u korpi
  $cart = $_SESSION['cart'];
  if (count($cart) > 0) {
    $totalPrice = totalPrice($cart);
  }

}

//ovde se smestaju greske koje imaju polja u formi
$formErrors = array();

//uvek se prosledjuje jedno polje koje je indikator da su podaci poslati sa forme
//odnosno da je korisnik pokrenuo neku akciju
//kod nas to polje ce biti SUBMIT dugme
if (isset($formData["submit"]) && $formData["submit"] == "Place Order") {

  /*   * ********* filtriranje i validacija polja NAME *************** */
  if (isset($formData["name"])) {
    //Filtering 1
    $formData["name"] = trim($formData["name"]);
    $formData["name"] = strip_tags($formData["name"]);

    //Validation - if required
    if ($formData["name"] === "") {
      $formErrors["name"][] = "Field name is required";
    }
  } else {
    //if required
    $formErrors["name"][] = "Field name is required in request";
  }

  /*   * ********* filtriranje i validacija polja ADDRESS *************** */
  if (isset($formData["address"])) {
    //Filtering 1
    $formData["address"] = trim($formData["address"]);
    $formData["address"] = strip_tags($formData["address"]);

    //Validation - if required
    if ($formData["address"] === "") {
      $formErrors["address"][] = "Field address is required";
    }
  } else {
    //if required
    $formErrors["address"][] = "Field address is required in request";
  }

  /*   * ********* filtriranje i validacija polja EMAIL *************** */
  if (isset($formData["email"])) {
    // Filtering 1
    $formData["email"] = trim($formData["email"]);
    // Filtering 2
    $formData["email"] = strip_tags($formData["email"]);

    // Validation - if required
    if ($formData["email"] === "") {
      $formErrors["email"][] = "- Field email is required.";
    }

    // Validation 2
    if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
      $formErrors["email"][] = "- Field email must be valid email address.";
    }
  } else {
    // if required
    $formErrors["email"][] = "- Field email must be in request.";
  }

  /*   * ********* filtriranje i validacija polja PHONE *************** */
  if (isset($formData["phone"])) {
    //Filtering 1
    $formData["phone"] = trim($formData["phone"]);
    $formData["phone"] = strip_tags($formData["phone"]);

    //Validation - if required
    if ($formData["phone"] === "") {
      $formErrors["phone"][] = "Field phone is required";
    } else {

      if (!is_numeric($formData['phone'])) {
        $formErrors["phone"][] = "Field phone must be numeric";
      }
    }
  } else {
    //if required
    $formErrors["phone"][] = "Field phone is required in request";
  }

  /*   * ********* filtriranje i validacija polja NOTES *************** */
  if (isset($formData["notes"])) {
    //Filtering 1
    $formData["notes"] = trim($formData["notes"]);
    $formData["notes"] = strip_tags($formData["notes"], '<br><a><p><strong><em><div>');

    //Validation - if required
    if ($formData["notes"] === "") {
      //$formErrors["notes"][] = "Field notes is required";
    }
  } else {
    //if required
    $formErrors["notes"][] = "Field notes is required in request";
  }
  
  

  //Ukoliko nema gresaka 
  if (empty($formErrors)) {
    //Uradi akciju koju je korisnik trazio
    // dohvatamo sliku iz tmp foldera i smestamo tamo gde nam treba
    $lastInsertedId = createOrders($formData, $totalPrice, $connection);
    
    if (is_numeric($lastInsertedId) && $lastInsertedId > 0) {
      $checkoutStatus = InsertProductsInOrder($cart, $lastInsertedId, $connection);
    }
    
    if ($checkoutStatus) {
      $systemMessage = "Order successful.";
      unset($_SESSION['cart']);
    } else {
      $systemMessage = "Something was wrong with the order.";
    }
  }
}


include_once '../../../views/headView.php';
include_once '../../../views/headerView.php';
include_once '../../../views/navigationView.php';
include_once '../../../views/shopping-cart/checkoutView.php';
include_once '../../../views/footerView.php';
