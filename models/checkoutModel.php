<?php

function totalPrice($cart) {
  $total = 0;
  foreach ($cart as $value) {
    $total += $value['price'] * $value['quantity'];
  }
  return $total;
}

function createOrders($data, $totalPrice, $connection) {
  $status = FALSE;

  try {
    // Make query string
    $sqlQueryString = "
            INSERT INTO orders (name, address, email, phone, notes, created_at, status, total_price) 
            VALUES(:name, :address, :email, :phone, :notes, :created_at, :status, :total_price)
            ";


    // Execute query (with params or without)
    $statement = $connection->prepare($sqlQueryString);

    $params = [
      'name' => $data['name'],
      'address' => $data['address'],
      'email' => $data['email'],
      'phone' => $data['phone'],
      'notes' => $data['notes'],
      'status' => "New",
      'total_price' => $totalPrice,
      'created_at' => date('Y-m-d H:i:s'), // 2018-12-28 13:59:00
    ];

    // Execute return TRUE or FALSE
    $status = $statement->execute($params);
    if ($status) {
      $lastInsertedId = $connection->lastInsertId();
    }
  } catch (PDOException $exception) {
    echo "Something went wrong: " . $exception->getMessage() . ' in ' .
    $exception->getFile() . ': ' . $exception->getLine() . "<br>";
  }

  return $lastInsertedId;
}

function InsertProductsInOrder($cart, $lastInsertedId, $connection) {
  $status = FALSE;

  foreach ($cart as $value) {

    try {
      // Make query string
      $sqlQueryString = "
            INSERT INTO order_items (product_id, title, image, quantity, price, order_id) 
            VALUES(:product_id, :title, :image, :quantity, :price, :order_id)
            ";


      // Execute query (with params or without)
      $statement = $connection->prepare($sqlQueryString);

      $params = [
        'product_id' => $value['id'],
        'title' => $value['title'],
        'image' => $value['image'],
        'quantity' => $value['quantity'],
        'price' => $value['price'],
        'order_id' => $lastInsertedId
      ];

      // Execute return TRUE or FALSE
      $status = $statement->execute($params);
      
    } catch (PDOException $exception) {
      echo "Something went wrong: " . $exception->getMessage() . ' in ' .
      $exception->getFile() . ': ' . $exception->getLine() . "<br>";
    }
    
  }
  
  return $status;
  
}
