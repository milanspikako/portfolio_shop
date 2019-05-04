
<div class="site-section">
    <div class="container">
        <?php
        if (count($cart) > 0) {
            $totalAmount = 0;
            ?>

            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($cart as $value) {
                                    $totalAmount += $value['price'] * $value['quantity'];
                                    ?>

                                    <tr>
                                        <td class="product-thumbnail">
                                            <img style="max-width: 100px;" src="<?php echo $value['image'] ?>" 
                                                 onerror="this.src = 'https://dummyimage.com/350x350/9594a8/0011ff.jpg'" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black" href="/controllers/frontend/product.php?id=<?php echo $value['id'] ?>">
                                                <?php echo $value['title'] ?></h2>
                                        </td>
                                        <td><?php echo $value['price']; ?></td>
                              
                                    <td>
                                        <div class="input-group mb-3" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                               <a href="<?php echo productCartUrl($value['id'], 'minus')?>" class="btn btn-outline-primary btn-minus" type="button">&minus;</a>
                                            </div>
                                            <input type="text" name="quantity" class="form-control text-center" value="<?php echo $value['quantity']; ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                                <a href="<?php echo productCartUrl($value['id'], 'plus')?>" class="btn btn-outline-primary btn-plus" type="button">&plus;</a>
                                            </div>
                                        </div>

                                    </td>
                                    <td><?php echo $value['price'] * $value['quantity']; ?></td>
                                    <td><a href="<?php echo productCartUrl($value['id'], 'remove') ?>" class="btn btn-primary btn-sm">X</a></td>

                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
<!--                        <div class="col-md-6 mb-3 mb-md-0">
                            <input type="submit" name="submit" class="btn btn-primary btn-sm btn-block" value="Update Cart">
                        </div>-->
                        <div class="col-md-6">
                            <a href="/public/controllers/frontend/allProducts.php" class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</a>
                        </div>
                    </div>
                                                   

                    <!--            <div class="row">
                                  <div class="col-md-12">
                                    <label class="text-black h4" for="coupon">Coupon</label>
                                    <p>Enter your coupon code if you have one.</p>
                                  </div>
                                  <div class="col-md-8 mb-3 mb-md-0">
                                    <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                                  </div>
                                  <div class="col-md-4">
                                    <button class="btn btn-primary btn-sm">Apply Coupon</button>
                                  </div>
                                </div>-->
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <!--                <div class="row mb-3">
                                              <div class="col-md-6">
                                                <span class="text-black">Subtotal</span>
                                              </div>
                                              <div class="col-md-6 text-right">
                                                <strong class="text-black">$230.00</strong>
                                              </div>
                                            </div>-->
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black"><?php echo $totalAmount; ?></strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location = '/public/controllers/shopping-cart/checkout.php'">Proceed To Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        } else {
            ?>

            <p>Your cart is empty!!!</p>

            <?php
        }
        ?>


    </div>
</div>

