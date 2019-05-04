
<nav class="site-navigation text-right text-md-center" role="navigation">
  <div class="container">
    <ul class="site-menu js-clone-nav d-none d-md-block">
      <li class="active">
        <a href="/public/index.php">Home</a>
      </li>

      <?php
      if (count($categoriesForNavigation) > 0) {
        ?>

        <li class="has-children">
          <a>Categories</a>
          <ul class="dropdown">
              <?php
              foreach ($categoriesForNavigation as $value) {
                ?>
              <li><a href="/public/controllers/frontend/category.php?id=<?php echo $value['id']; ?>">

                  <?php echo $value['name']; ?> (<?php echo $value['total']; ?>)</a></li>
              <?php
            }
            ?>
          </ul>
        </li>

        <?php
      }
      ?>           

      <li><a href="/public/controllers/frontend/allProducts.php">Shop</a></li>
      <li><a href="#">Catalogue</a></li>
      <li><a href="#">New Arrivals</a></li>
      <li><a href="contact.html">Contact</a></li>
      <!--Atila start-->
      <?php
      if (loginStatus()) {
        ?>
        <li class="has-children">
          <a>ADMIN</a>
          <ul class="dropdown">

            <li><a href="/public/controllers/stickers/create.php">New sticker</a></li>
            <li><a href="/public/controllers/stickers/all.php">All stickers</a></li>
            <li><a href="/public/controllers/categories/create.php">New category</a></li>
            <li><a href="/public/controllers/categories/all.php">All categories</a></li>
            <li><a href="/public/controllers/users/create.php">New user</a></li>
            <li><a href="/public/controllers/users/all.php">All users</a></li>
            <li><a href="/public/controllers/products/create.php">New product</a></li>
            <li><a href="/public/controllers/products/all.php">All products</a></li>

          </ul>
        </li>
        <?php
      }
      ?>
      <!--Atila end-->
    </ul>
  </div>
</nav>
</header>