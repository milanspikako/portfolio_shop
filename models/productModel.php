<?php

$homepagePossibleValues = array("1" => "Yes", "0" => "No");

function createProduct($data, $connection) {
    $status = FALSE;

    // check connection, prepare query and execute it and stop script if something was wrong
    // when something was wrong catch error (exception) and show it
    try {
        // Make query string
        $sqlQueryString = "
            INSERT INTO products (title, description, image, price, category_id, sticker_id, homepage, quantity, discount, date_created) 
            VALUES(:title, :description, :image, :price, :category_id, :sticker_id, :homepage, :quantity, :discount, :date_created)
            ";


        // Execute query (with params or without)
        $statement = $connection->prepare($sqlQueryString);

        $params = [
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'sticker_id' => $data['sticker_id'],
            'homepage' => $data['homepage'],
            'quantity' => $data['quantity'],
            'discount' => $data['discount'],
            'date_created' => date('Y-m-d H:i:s'), // 2018-12-28 13:59:00
        ];

        // Execute return TRUE or FALSE
        $status = $statement->execute($params);
    } catch (PDOException $exception) {
        echo "Something went wrong: " . $exception->getMessage() . "<br>";
    }

    return $status;
}

function getAllProducts($connection, $filters) {
    $rows = [];

    try {


        // Make query string
        $sqlQueryString = "
            SELECT products.id, products.title as title, products.price, products.discount, products.quantity, categories.name as category_id, stickers.title as sticker_id  
            FROM products
            LEFT JOIN categories ON categories.id = products.category_id
            LEFT JOIN stickers ON stickers.id = products.sticker_id
            ";
        if(count($filters) > 0) 
            {
        
        
        if (isset($filters['priceRangeMin']) && isset($filters['priceRangeMax'])) {
            $sqlQueryString .= " WHERE products.price > " . $filters['priceRangeMin'] . " AND products.price < " . $filters['priceRangeMax'] . "";
        }
        if (isset($filters['priceRangeMin']) && isset($filters['priceRangeMax']) ) {
            $sqlQueryString .= " AND products.price > " . $filters['priceRangeMin'] . " AND products.price < " . $filters['priceRangeMax'] . "";
        }

        if (isset($filters['order-by']) && isset($filters['order-direction'])) {
            $sqlQueryString .= "ORDER BY " . $filters['order-by'] . " " . $filters['order-direction'];
        }
    }


        // Execute query (with params or without)
        $statement = $connection->prepare($sqlQueryString);

        //    $params = [
        //        'naslov' => "%" . $naslov . "%",
        //        'cena' => $cena
        //    ];
        // Execute return TRUE or FALSE
        //$status = $statement->execute($params);
        $status = $statement->execute();

        // get ROWS (ROW SET) (fetchAll - for row set or fetch - for one row)
        if ($status) {
            $rows = $statement->fetchAll();
        }
    } catch (PDOException $exception) {
        echo "Something went wrong: " . $exception->getMessage() . "<br>";
    }

    return $rows;
}

/**
 * This function return one row from product table
 * 
 * @param PDO $connection
 * @param int $id
 * @return mixed
 */
function getOneProduct($connection, $id) {

    $row = FALSE;

    try {
        // Make query string
        $sqlQueryString = "SELECT * FROM products WHERE id = :id";

        // Execute query (with params or without)
        $statement = $connection->prepare($sqlQueryString);

        $params = [
            'id' => $id
        ];


        // Execute return TRUE or FALSE
        $status = $statement->execute($params);
        //$status = $statement->execute();
        // get ROWS (ROW SET) (fetchAll - for row set or fetch - for one row)
        if ($status) {
            $row = $statement->fetch();
        }
    } catch (PDOException $exception) {
        echo "Something went wrong: " . $exception->getMessage() . "<br>";
    }

    return $row;
}

function editProduct($connection, $id, $data) {
    try {
        // Make query string
        $sqlQueryString = "UPDATE products 
            SET 
            title = :title,
            description = :description, 
            image = :image, 
            price = :price, 
            category_id = :category_id, 
            sticker_id = :sticker_id, 
            homepage = :homepage, 
            quantity = :quantity, 
            discount = :discount
            WHERE id = :id";

        // Execute query (with params or without)
        $statement = $connection->prepare($sqlQueryString);

        $params = [
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['image'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'sticker_id' => $data['sticker_id'],
            'homepage' => $data['homepage'],
            'quantity' => $data['quantity'],
            'discount' => $data['discount'],
            'id' => $id
        ];

        // Execute return TRUE or FALSE
        return $status = $statement->execute($params);
    } catch (PDOException $exception) {
        echo "Something went wrong: " . $exception->getMessage() . "<br>";
    }
}

function deleteProduct($connection, $id) {
    $status = FALSE;

    try {
        // Make query string
        $sqlQueryString = "DELETE FROM products WHERE id = :id";

        // Execute query (with params or without)
        $statement = $connection->prepare($sqlQueryString);

        $params = [
            'id' => $id
        ];

        // Execute return TRUE or FALSE
        $status = $statement->execute($params);
    } catch (PDOException $exception) {
        echo "Something went wrong: " . $exception->getMessage() . "<br>";
    }

    return $status;
}

function getAllProductsForHomepage($connection) {
    $rows = [];

    try {


        // Make query string
        $sqlQueryString = "
            SELECT products.id, products.title as title, products.price, products.description, products.discount, products.quantity, products.image as image, stickers.image as icon  
            FROM products
            LEFT JOIN categories ON categories.id = products.category_id
            LEFT JOIN stickers ON stickers.id = products.sticker_id
            WHERE products.homepage = 1
            ";



        // Execute query (with params or without)
        $statement = $connection->prepare($sqlQueryString);

        //    $params = [
        //        'naslov' => "%" . $naslov . "%",
        //        'cena' => $cena
        //    ];
        // Execute return TRUE or FALSE
        //$status = $statement->execute($params);
        $status = $statement->execute();

        // get ROWS (ROW SET) (fetchAll - for row set or fetch - for one row)
        if ($status) {
            $rows = $statement->fetchAll();
        }
    } catch (PDOException $exception) {
        echo "Something went wrong: " . $exception->getMessage() . "<br>";
    }

    return $rows;
}

function priceWithDiscount($product) {
    return $product['price'] * (100 - $product['discount']) / 100;
}

function insertIntoViewedProduct($id) {
    $viewedProducts = "";

    // provera da li vec imamo pregledane proizvode
    if (isset($_COOKIE) && isset($_COOKIE['viewedProducts'])) {
        $viewedProducts = $_COOKIE['viewedProducts'];

        $viewedProducts = explode(',', $viewedProducts);

        // ubaci u niz ako ga vec nemamo 
        // tj. ako ranije nije pregledan
        if (!in_array($id, $viewedProducts)) {
            sort($viewedProducts);
            $viewedProducts[] = $id;
        }

        $viewedProducts = implode(",", $viewedProducts);
    } else {
        // prvi put punimo cookies
        $viewedProducts = $id;
    }


    setcookie('viewedProducts', $viewedProducts, time() + 10 * 24 * 60 * 60, '/');
}

function getAllProductsForPagination($connection, $filters, $currentPage, $numberOfRowsPerPage, $categoryId = NULL) {
    $rows = [];

    try {


        // Make query string
        $sqlQueryString = "
            SELECT products.id, products.title as title, products.price, products.image, products.description, products.discount, products.quantity, categories.name as category_id, stickers.title as sticker_id  
            FROM products
            LEFT JOIN categories ON categories.id = products.category_id
            LEFT JOIN stickers ON stickers.id = products.sticker_id
            ";

        if (!empty($categoryId)) {
            $sqlQueryString .= " WHERE products.category_id = :category";
        }



        if (count($filters) > 0) {
            if (isset($filters['priceRangeMin']) && isset($filters['priceRangeMax']) && empty($categoryId)) {
                $sqlQueryString .= " WHERE products.price > " . $filters['priceRangeMin'] . " AND products.price < " . $filters['priceRangeMax'] . "";
            }
            if (isset($filters['priceRangeMin']) && isset($filters['priceRangeMax']) && !empty($categoryId)) {
                $sqlQueryString .= " AND products.price > " . $filters['priceRangeMin'] . " AND products.price < " . $filters['priceRangeMax'] . "";
            }
            if (isset($filters['order-by']) && isset($filters['order-direction'])) {

                $sqlQueryString .= " ORDER BY " . $filters['order-by'] . " " . $filters['order-direction'];
            }
        }


        $sqlQueryString .= " LIMIT " . $numberOfRowsPerPage . " OFFSET " . ($currentPage - 1 ) * $numberOfRowsPerPage;


        // Execute query (with params or without)
        $statement = $connection->prepare($sqlQueryString);

        if (!empty($categoryId)) {
            $params = [
                'category' => $categoryId
            ];

            $status = $statement->execute($params);
        } else {
            $status = $statement->execute();
        }



        // get ROWS (ROW SET) (fetchAll - for row set or fetch - for one row)
        if ($status) {
            $rows = $statement->fetchAll();
        }
    } catch (PDOException $exception) {
        echo "Something went wrong: " . $exception->getMessage() . "<br>";
    }

    return $rows;
}

function productCartUrl($id, $type) {

    return '/public/controllers/shopping-cart/change-product.php?id=' . $id . '&type=' . $type;
}
