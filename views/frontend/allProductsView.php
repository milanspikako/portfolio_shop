

<div class="site-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-md-9 order-2">

                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                        <div class="d-flex">
                            <div class="dropdown mr-1 ml-md-auto">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Latest
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                    <a class="dropdown-item" href="#">Men</a>
                                    <a class="dropdown-item" href="#">Women</a>
                                    <a class="dropdown-item" href="#">Children</a>
                                </div>
                            </div>
                                              <div class="btn-group">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                 
                                    <a class="dropdown-item" href="?order-by=title&order-direction=asc<?php if (isset($filters['priceRangeMin'])) {
    echo "&amp;MinRange =" . $filters['priceRangeMin'];
} ?><?php if (isset($filters['priceRangeMax'])) {
    echo "&maxRange = " . $filters['priceRangeMax'];
} ?>">Name, A to Z</a>
                                    <a class="dropdown-item" href="?order-by=title&order-direction=desc<?php if (isset($filters['priceRangeMin'])) {
    echo "&amp;MinRange = " . $filters['priceRangeMin'];
} ?><?php if (isset($filters['priceRangeMax'])) {
    echo "&amp;MaxRange = " . $filters['priceRangeMax'];
} ?>">Name, Z to A</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="?order-by=price&order-direction=asc<?php if (isset($filters['priceRangeMin'])) {
                    echo "&amp;MinRange = " . $filters['priceRangeMin'];
                } ?> <?php if (isset($filters['priceRangeMax'])) {
                    echo "&amp;MaxRange =" . $filters['priceRangeMax'];
                } ?>">Price, low to high</a>
                                    <a class="dropdown-item" href="?order-by=price&order-direction=desc<?php if (isset($filters['priceRangeMin'])) {
                    echo "&amp;MinRange = " . $filters['priceRangeMin'];
                } ?><?php if (isset($filters['priceRangeMax'])) {
                    echo "&amp;MaxRange = " . $filters['priceRangeMax'];
                } ?>">Price, high to low</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if (count($products) > 0) {
                    ?>

                    <div class="row mb-5">

                        <!--                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                                    <div class="block-4 text-center border">
                                                        <figure class="block-4-image">
                                                            <a href="shop-single.html"><img src="images/cloth_1.jpg" alt="Image placeholder" class="img-fluid"></a>
                                                        </figure>
                                                        <div class="block-4-text p-4">
                                                            <h3><a href="shop-single.html">Tank Top</a></h3>
                                                            <p class="mb-0">Finding perfect t-shirt</p>
                                                            <p class="text-primary font-weight-bold">$50</p>
                                                        </div>
                                                    </div>
                                                </div>-->

                        <?php
                        foreach ($products as $value) {
                            ?>

                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border">

                                    <figure class="block-4-image">
                                        <img href="/public/controllers/frontend/product.php?id=<?php echo $value['id']; ?>" src="<?php echo $value['image']; ?>"  onerror="this.src = 'https://dummyimage.com/350x350/9594a8/0011ff.jpg'"  alt="<?php echo $value['title']; ?>" TITLE="<?php echo $value['title']; ?>" class="img-fluid">
                                    </figure>


                                    <div class="block-4-text p-4">
                                        <h3><a href="/public/controllers/frontend/product.php?id=<?php echo $value['id']; ?>"><?php echo $value['title'] ?></a></h3>
                                        <p class="mb-0"><?php echo $value['description'] ? substr($value['description'], 0, 20) . " ..." : ""; ?></p>
                                        <p class="text-primary font-weight-bold">                                <?php
                                            if (empty($value['discount'])) {
                                                echo $value['price'];
                                            } else {

                                                echo priceWithDiscount($value);
                                            }
                                            ?></p>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                        ?>

                    </div>
                    <div class="row" data-aos="fade-up">
                        <?php
                        if ($numberOfPages > 1) {
                            ?>
                            <div class="col-md-12 text-center">
                                <div class="site-block-27">
                                    <ul>
                                        <?php
                                        for ($i = 1; $i <= $numberOfPages; $i++) {
                                            if ($i == $currentPage) {
                                                ?>


                                                <!--                                    <li><a href="#">&lt;</a></li>-->
                                                <li class="active"><a><?php echo $i; ?></a></li>
                                                <?php
                                            } else {
                                             //proverava da li ima filter
                                              
                                                ?>


             <li><a href="?page=<?php echo $i; ?><?php if (isset($filters['priceRangeMin'])) {
                    echo "&minRange = " . $filters['priceRangeMin'];
                } ?><?php if (isset($filters['priceRangeMax'])) {
                    echo "&maxRange = " . $filters['priceRangeMax'];
                } ?> <?php if (isset($filters['order-by']) && isset($filters['order-direction'])) {
                    echo "&order-by=" . $filters['order-by'] . "&order-direction=" . $filters['order-direction'];
                } ?>"><?php echo $i; ?></a></li>
                                                
                                                <?php
                                                
                                            }
                                        }
                                        ?>
                                        <!--                                    <li><a href="#">&gt;</a></li>-->
                                    </ul>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>

                    <?php
                } else {
                    ?>
                    <p>There are no products!!!</p>
                    <?php
                }
                ?>  


            </div>






            <div class="col-md-3 order-1 mb-5 mb-md-0">


                <div class="border p-4 rounded mb-4">
                    <?php
                    if (count($categoriesForNavigation) > 0) {
                        ?>
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>



                        <ul class="list-unstyled mb-0">
                            <?php
                            foreach ($categoriesForNavigation as $value) {
                                ?>
                                <li class="mb-1"><a href="/public/controllers/frontend/category.php?id=<?php echo $value['id']; ?>" class="d-flex"><span> <?php echo $value['name']; ?> </span> <span class="text-black ml-auto">(<?php echo $value['total']; ?>)</span></a></li>
                                <?php
                            }
                            ?>

                        </ul>

                        <?php
                    }
                    ?>     

                </div>

                <div class="border p-4 rounded mb-4">
                    <div class="mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                        <div id="slider-range" class="border-primary"></div>
                        <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                    <form action="" method="get">
                            
                            <input type="hidden" name="minRange" id="minRange">  
                            <input type="hidden" name="maxRange" id="maxRange">  
                           
<?php if (isset($_GET['order-by']) && isset($_GET['order-direction'])) { ?>
                                <input type="hidden" name="order-by" value="<?php echo $_GET['order-by']; ?>">  
                                <input type="hidden" name="order-direction" value="<?php echo $_GET['order-direction']; ?>">  

<?php } ?>
                            <input type="submit" class="btn btn-sm btn-primary"  value="Filter price">
                        </form>
                    
                    </div>

                    <!--                    <div class="mb-4">
                                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                                            <label for="s_sm" class="d-flex">
                                                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>
                                            </label>
                                            <label for="s_md" class="d-flex">
                                                <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>
                                            </label>
                                            <label for="s_lg" class="d-flex">
                                                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>
                                            </label>
                                        </div>-->

                    <!--                    <div class="mb-4">
                                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                                            <a href="#" class="d-flex color-item align-items-center" >
                                                <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
                                            </a>
                                            <a href="#" class="d-flex color-item align-items-center" >
                                                <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
                                            </a>
                                            <a href="#" class="d-flex color-item align-items-center" >
                                                <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
                                            </a>
                                            <a href="#" class="d-flex color-item align-items-center" >
                                                <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
                                            </a>
                                        </div>-->

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="site-section site-blocks-2">
                    <div class="row justify-content-center text-center mb-5">
                        <div class="col-md-7 site-section-heading pt-4">
                            <h2>Categories</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                            <a class="block-2-item" href="#">
                                <figure class="image">
                                    <img src="/public/assets/images/women.jpg" alt="" class="img-fluid">
                                </figure>
                                <div class="text">
                                    <span class="text-uppercase">Collections</span>
                                    <h3>Women</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                            <a class="block-2-item" href="#">
                                <figure class="image">
                                    <img src="/public/assets/images/children.jpg" alt="" class="img-fluid">
                                </figure>
                                <div class="text">
                                    <span class="text-uppercase">Collections</span>
                                    <h3>Children</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                            <a class="block-2-item" href="#">
                                <figure class="image">
                                    <img src="/public/assets/images/men.jpg" alt="" class="img-fluid">
                                </figure>
                                <div class="text">
                                    <span class="text-uppercase">Collections</span>
                                    <h3>Men</h3>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php include '../../../views/frontend/viewedProductsView.php'; ?>

    </div>
</div>

