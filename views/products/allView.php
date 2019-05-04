<style>
  /*  th a {
        color: white;
    }*/
</style>
<main>
  <div class="container">
    <section class="tipografy">
      <h1>All products</h1>
    </section>

    <section class="include-table">
      <div class="table-responsive">
          <?php
          if (count($products) > 0) {
            ?>
          <table class="table  table-bordered table-hover text-center">
            <thead>
              <tr>
                <th>
                  Title
                  <a href="/public/controllers/products/all.php?order-by=title&order-direction=asc"><span class="fa fa-arrow-up"></span></a>
                  <a href="/public/controllers/products/all.php?order-by=title&order-direction=desc"><span class="fa fa-arrow-down"></span></a>
                </th>
                <th>Category</th>
                <th>Sticker</th>
                <th>
                  Price
                  <a href="/public/controllers/products/all.php?order-by=price&order-direction=asc"><span class="fa fa-arrow-up"></span></a>
                  <a href="/public/controllers/products/all.php?order-by=price&order-direction=desc"><span class="fa fa-arrow-down"></span></a>
                </th>
                <th>
                  Discount
                  <a href="/public/controllers/products/all.php?order-by=discount&order-direction=asc"><span class="fa fa-arrow-up"></span></a>
                  <a href="/public/controllers/products/all.php?order-by=discount&order-direction=desc"><span class="fa fa-arrow-down"></span></a>
                </th>
                <th>Quantity</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>

              <?php
              foreach ($products as $value) {
                ?>
                <tr>
                  <td><?php echo $value['title'] ?></td>
                  <td><?php echo $value['category_id'] ?></td>
                  <td><?php echo $value['sticker_id'] ?></td>
                  <td><?php echo $value['price'] ?></td>
                  <td><?php echo $value['discount'] ?></td>
                  <td><?php echo $value['quantity'] ?></td>
                  <td>
                    <!--                    <a href="#">Preview</a>
                                        <span>/</span>-->
                    <a href="/public/controllers/products/edit.php?id=<?php echo $value['id']; ?>">Edit</a>
                    <span>/</span>
                    <a href="/public/controllers/products/delete.php?id=<?php echo $value['id']; ?>">Delete</a>
                  </td>
                </tr>
                <?php
              }
              ?>

            </tbody>
          </table> 

          <!--Need to include the Pagination here:-->
          <?php
            $page = 'products';
            include_once '../../../views/paginationView.php';
          ?>
<!--          <div class="container">
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>-->


        <?php
      } else {
        ?>
        <p>There are no products!!!</p>
        <?php
      }
      ?>


  </div>
</section>
</div>
</main><!--main end-->
<br>