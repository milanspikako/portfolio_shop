<div class="site-wrap">
  <header class="site-navbar" role="banner">
    <div class="site-navbar-top">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
            <form action="" class="site-block-top-search">
              <span class="icon icon-search2"></span>
              <input type="text" class="form-control border-0" placeholder="Search">
            </form>
          </div>

          <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
            <div class="site-logo">
              <a href="/public/index.php" class="js-logo-clone">Portfolio</a>
            </div>
          </div>

          <div class="col-6 col-md-4 order-3 order-md-3 text-right">
            <div class="site-top-icons">
              <ul>
                <!--Atila Start-->
                <?php
                if (loginStatus()) {
                  ?>
                  <li><?php echo $_SESSION['loginUser']; ?>, <a href="/public/controllers/logout.php">Logout</a></li>
                  <?php
                } else {
                  ?>
                  <li><a href="/public/controllers/login.php">Login</a></li>
                  <?php
                }
                ?>
                <!--Atila end-->
                <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                
           
                <li>
                    <a href="/public/controllers/shopping-cart/index.php" class="site-cart">

                    <span class="icon icon-shopping_cart"></span>
                  <?php 
                  
                if(isset($_SESSION['cart'])) {
                ?>

                    <span class="count"><?php echo count($_SESSION['cart']);?></span>
                    
                    <?php
                }
                    ?>
                  </a>
                </li> 
             
                <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
              </ul>
            </div> 
          </div>

        </div>
      </div>
    </div> 