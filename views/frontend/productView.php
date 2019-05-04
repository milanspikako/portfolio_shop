<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><p><?php echo $systemMessage; ?></p></div>
        </div>
    </div>
</div>  

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
              
                    <img alt="<?php echo $openedRow['title']; ?>"  src="<?php echo $openedRow['image']; ?>" onerror="this.src='https://dummyimage.com/350x350/62679e/0011ff'" class="img-fluid">
            
                  
            </div>  
            <div class="col-md-6">
                <h2 class="text-black"><?php echo $openedRow['title']; ?></h2>
                <p class="mb-4">       <?php
                                                if(isset($openedRow['description']) && !empty($openedRow['description'])){
                                                    ?>
                                                        <?php echo $openedRow['description'] ?></p>
                                                    <?php    
                                                }
                                            ?>
                <p><strong class="text-primary h4">                  <?php
                                            if (empty($openedRow['discount'])) {
                                                echo $openedRow['price'];
                                            } else {

                                                echo priceWithDiscount($openedRow);
                                            }
                                            ?></strong></p>
<!--                <div class="mb-1 d-flex">
                    <label for="option-sm" class="d-flex mr-3 mb-3">
                        <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">Small</span>
                    </label>
                    <label for="option-md" class="d-flex mr-3 mb-3">
                        <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes"></span> <span class="d-inline-block text-black">Medium</span>
                    </label>
                    <label for="option-lg" class="d-flex mr-3 mb-3">
                        <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes"></span> <span class="d-inline-block text-black">Large</span>
                    </label>
                    <label for="option-xl" class="d-flex mr-3 mb-3">
                        <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black"> Extra Large</span>
                    </label>
                </div>-->

                <div class="mb-5">
                    <form action="<?php echo productCartUrl($openedRow['id'], 'setQuantity') ?>" method="get">
                    <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                        </div>
                        <input type="text" name="quantity" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                        </div>
                    </div>
    <input type="hidden" name="id" value="<?php echo $openedRow['id'] ?>">
    <input type="hidden" name="type" value='setQuantity'>
                <p><input type="submit" name="submit" class="buy-now btn btn-sm btn-primary" value="Add To Cart"></a></p>
</form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php  require_once '../../../views/frontend/viewedProductsView.php'; ?>