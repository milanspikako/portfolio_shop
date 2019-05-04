<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Featured Products</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">

                    <?php
                    if (count($allProductsForHomepage) > 0) {
                        ?>
                        <?php
                        foreach ($allProductsForHomepage as $value) {
                            ?>

                            <div class="item">
                                <div class="block-4 text-center">
                                    <?php
                                    if (isset($value['image']) && !empty($value['image']) && file_exists($value['image'])) {
                                        ?>
                                        <figure class="block-4-image">
                                            <img href="/public/controllers/frontend/product.php?id=<?php echo $value['id']; ?>" src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>" TITLE="<?php echo $value['title']; ?>" class="img-fluid">
                                        </figure>
                                        <?php
                                    } else {
                                        ?>
                                        <figure class="block-4-image">
                                            <img href="/public/controllers/frontend/product.php?id=<?php echo $value['id']; ?>" src="https://dummyimage.com/350x350/9594a8/0011ff.jpg&text=Random+Product" alt="<?php echo $value['title']; ?>" TITLE="<?php echo $value['title']; ?>" class="img-fluid">
                                        </figure>
                                        <?php
                                    }
                                    ?>

                                    <div class="block-4-text p-4">
                                        <h3><a href="/public/controllers/frontend/product.php?id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></h3>
                                        <p class="mb-0"><?php echo $value['description'] ? substr($value['description'], 0, 20) . " ..." : ""; ?></p>
                                        <p class="text-primary font-weight-bold">
                                            <?php
                                            if (empty($value['discount'])) {
                                                echo $value['price'];
                                            } else {

                                                echo priceWithDiscount($value);
                                            }
                                            ?>




                                        </p>
                                    </div>
                                </div>
                            </div>

        <?php
    }
} else {
    ?>
                        <p>There is no featured products.</p>
                        <?php
                    }
                    ?>


