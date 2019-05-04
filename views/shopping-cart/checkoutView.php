

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="/public/">Home</a> <span class="mx-2 mb-0">/</span> <a href="/public/controllers/shopping-cart/index.php">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="border p-4 rounded" role="alert">
                    <p><?php echo $systemMessage; ?></p>
                    <?php
                    if (isset($formErrors["name"])) {
                        foreach ($formErrors["name"] as $errorMessage) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errorMessage; ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <?php
                    if (isset($formErrors["address"])) {
                        foreach ($formErrors["address"] as $errorMessage) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errorMessage; ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <?php
                    if (isset($formErrors["email"])) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php
                            foreach ($formErrors["email"] as $errorMessage) {
                                echo $errorMessage . '<br>';
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($formErrors["phone"])) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php
                            foreach ($formErrors["phone"] as $errorMessage) {
                                echo $errorMessage . '<br>';
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($formErrors["notes"])) {
                        foreach ($formErrors["notes"] as $errorMessage) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errorMessage; ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        if (!$checkoutStatus) {
            ?>
            <form action="" method="post">
                <div class="row">

                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>
                        <div class="p-3 p-lg-5 border">


                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_companyname" class="text-black">Full name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="name" value="<?php echo isset($formData["name"]) ? htmlspecialchars($formData["name"]) : ""; ?>" id="c_companyname">
                                </div>

                            </div>


                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="address" value="<?php echo isset($formData["address"]) ? htmlspecialchars($formData["address"]) : ""; ?>" id="c_address" placeholder="Address with city included">
                                </div>

                            </div>


                            <div class="form-group row mb-5">
                                <div class="col-md-6">
                                    <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" value="<?php echo isset($formData["email"]) ? htmlspecialchars($formData["email"]) : ""; ?>" id="c_email_address">


                                </div>
                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo isset($formData["phone"]) ? htmlspecialchars($formData["phone"]) : ""; ?>" id="c_phone" placeholder="Phone Number">

                                </div>
                            </div>

                            <!--              <div class="form-group">
                                            <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Create an account?</label>
                                            <div class="collapse" id="create_an_account">
                                              <div class="py-2">
                                                <p class="mb-3">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                                <div class="form-group">
                                                  <label for="c_account_password" class="text-black">Account Password</label>
                                                  <input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
                                                </div>
                                              </div>
                                            </div>
                                          </div>-->




                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea class="form-control" id="c_order_notes" cols="30" rows="5" name="notes"><?php echo isset($formData["notes"]) ? htmlspecialchars($formData["notes"]) : ""; ?></textarea> 

                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">


                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Your Order</h2>
                                <div class="p-3 p-lg-5 border">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                        <th>Product</th>
                                        <th>Total</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($cart as $value) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $value['title'] ?> <strong class="mx-2">x</strong> <?php echo $value['quantity']; ?></td>
                                                    <td><?php echo $value['price'] * $value['quantity']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>

                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                                <td class="text-black font-weight-bold"><strong><?php echo totalPrice($cart); ?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!--                  <div class="border p-3 mb-3">
                                                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>
                                    
                                                        <div class="collapse" id="collapsebank">
                                                          <div class="py-2">
                                                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                          </div>
                                                        </div>
                                                      </div>
                                    
                                                      <div class="border p-3 mb-3">
                                                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>
                                    
                                                        <div class="collapse" id="collapsecheque">
                                                          <div class="py-2">
                                                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                          </div>
                                                        </div>
                                                      </div>
                                    
                                                      <div class="border p-3 mb-5">
                                                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>
                                    
                                                        <div class="collapse" id="collapsepaypal">
                                                          <div class="py-2">
                                                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                          </div>
                                                        </div>
                                                      </div>-->

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-lg py-3 btn-block" name="submit" value="Place Order">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <?php
                }
                ?>
            </div>
        </form>
