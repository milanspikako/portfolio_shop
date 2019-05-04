
<main>
  <div class="container">
    <section class="tipografy  col-lg-8">
      <h1>All categories</h1>
    </section>

    <section class="include-table col-lg-8">
      <div class="table-responsive">
          <?php
          if (count($categories) > 0) {
            ?>
          <table class="table  table-bordered table-hover text-center">
            <thead>
              <tr>
                <th>
                  Name
                  <a href="/public/controllers/categories/all.php?order-by=name&order-direction=asc"><span class="fa fa-arrow-up"></span></a>
                  <a href="/public/controllers/categories/all.php?order-by=name&order-direction=desc"><span class="fa fa-arrow-down"></span></a>
                </th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>

              <?php
              foreach ($categories as $value) {
                ?>
                <tr>
                  <td><?php echo $value['name'] ?></td>
                  <td>
                    <a href="/public/controllers/categories/edit.php?id=<?php echo $value['id']; ?>">Edit</a>
                    <span>/</span>
                    <a href="/public/controllers/categories/delete.php?id=<?php echo $value['id']; ?>">Delete</a>
                  </td>
                </tr>
                <?php
              }
              ?>

            </tbody>
          </table> 
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