<?php
// proveri da li ima proizvoda u kukiju
if (isset($_COOKIE['viewedProducts']) && !empty($_COOKIE['viewedProducts'])) {
    $viewedProductsString = $_COOKIE['viewedProducts'];
    $viewedProducts = explode(",", $viewedProductsString);


    if (count($viewedProducts) > 0) {
        ?>

<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Last seen Products</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">

                    <?php
                foreach ($viewedProducts as $key => $value) {
                    $productTemp = getOneProduct($connection, $value);
                    if ($productTemp) {
                        ?>
                    
                    
                    <div class="item">
                        <div class="block-4 text-center">
                   
                                        <figure class="block-4-image">
                                            <img href="/public/controllers/frontend/product.php?id=<?php echo $productTemp['id']; ?>" src="<?php echo $productTemp['image']; ?>" onerror="this.src='https://dummyimage.com/350x350/9594a8/0011ff.jpg&text=Random+Product'" alt="<?php echo $productTemp['title']; ?>" TITLE="<?php echo $productTemp['title']; ?>" class="img-fluid">
                                        </figure>
                              
                                      
                            <div class="block-4-text p-4">
                                <h3><a href="/public/controllers/frontend/product.php?id=<?php echo $productTemp['id']; ?>"><?php echo $productTemp['title'] ?></a></h3>
                                <p class="mb-0"><?php echo $productTemp['description'] ? substr($productTemp['description'], 0, 20) . " ..." : ""; ?></p>
                                <p class="text-primary font-weight-bold">
                                                    <?php
                                            if (empty($productTemp['discount'])) {
                                                echo $productTemp['price'];
                                            } else {

                                                echo priceWithDiscount($productTemp);
                                            }
                                            ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                                     <?php
                    } else {
                        unset($viewedProducts[$key]);
                    }
                }
                ?>
                    
                    
                    <div class="item">
<!--                        <div class="block-4 text-center">
                            <figure class="block-4-image">
                                <img src="images/cloth_1.jpg" alt="Image placeholder" class="img-fluid">
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="#">Tank Top</a></h3>
                                <p class="mb-0">Finding perfect t-shirt</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="block-4 text-center">
                            <figure class="block-4-image">
                                <img src="images/shoe_1.jpg" alt="Image placeholder" class="img-fluid">
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="#">Corater</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>-->
<!--                    <div class="item">
                        <div class="block-4 text-center">
                            <figure class="block-4-image">
                                <img src="images/cloth_2.jpg" alt="Image placeholder" class="img-fluid">
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="#">Polo Shirt</a></h3>
                                <p class="mb-0">Finding perfect products</p>
                                <p class="text-primary font-weight-bold">$50</p>
                            </div>
                        </div>
                    </div>-->




                </div>
            </div>
        </div>
    </div>
</div>

        <?php
    }
}
