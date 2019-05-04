

<?php
if ($numberOfPages > 1) {
  ?>

  <div class="col-md-12 text-center">
    <div class=" site-block-27 ">
      <ul>
          <?php
          if ($currentPage > 1) {
            ?>
          <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo ($currentPage - 1); ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>">&lt;</a></li>
          <?php
          }
          ?>
          <?php
        
        for ($i = 1; $i <= $numberOfPages; $i++) {


          // Odavde pocinje moja promena za Paginaciju sa tackicama
          if ($numberOfPages <= 7) {

            if ($i == $currentPage) {
              ?>
              <li class="active"><a><?php echo $i; ?></a></li>
              <?php
            } else {
              ?>
              <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php
            }
          }

          if ($numberOfPages > 7) {


            if ($currentPage <= 4) {
              if ($i == $currentPage) {
                ?>
                <li class="active"><a><?php echo $i; ?></a></li>
                <?php
              } else {

                if (($currentPage - $i) == 3) {
                  ?>

                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }

                if (($currentPage - $i) == 2) {
                  ?>

                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                if (($currentPage - $i) == 1) {
                  ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                if (($i - $currentPage) == 1) {
                  ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                if (($i - $currentPage) == 2) {
                  ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <li><a href="#">...</a></li>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $numberOfPages; ?>"><?php echo $numberOfPages; ?></a></li>
                  <?php
                }
              }
            } // if ($currentPage <= 4)




            if (
                    ($currentPage > 4) &&
                    ($numberOfPages - $currentPage > 3)
            ) {

              if ($i == $currentPage) {
                ?>
                <li class="active"><a><?php echo $i; ?></a></li>
                <?php
              } else {
                if (($currentPage - $i) == 2) {
                  ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=1">1</a></li>
                  <li><a href="#">...</a></li>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                if (($currentPage - $i) == 1) {
                  ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                if (($i - $currentPage) == 1) {
                  ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                if (($i - $currentPage) == 2) {
                  ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <li><a href="#">...</a></li>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $numberOfPages; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $numberOfPages; ?></a></li>
                  <?php
                }
              }
            } // if ($currentPage > 4) && ($numberOfPages - $currentPage > 3)


            if ($numberOfPages - $currentPage <= 3) {

              if ($i == $currentPage) {
                ?>
                <li class="active"><a><?php echo $i; ?></a></li>
                    <?php
                  } else {
                    if (($currentPage - $i) == 2) {
                      ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=1">1</a></li>
                  <li><a href="#">...</a></li>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                if (($currentPage - $i) == 1) {
                  ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                if (($i - $currentPage) == 1) {
                  ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                if (($i - $currentPage) == 2) {
                  ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }
                if (($i - $currentPage) == 3) {
                  ?>
                  <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo $i; ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>"><?php echo $i; ?></a></li>
                  <?php
                }
              }
            } // ($numberOfPages - $currentPage < 3)
          }
        }
        ?>
        <?php
        if ($currentPage != $numberOfPages) {
          ?>
          <li><a href="/public/controllers/<?php echo $page; ?>/all.php?page=<?php echo ($currentPage + 1); ?><?php if(isset($filters['order-by']) && isset($filters['order-direction'])) { echo "&amp;order-by=" . $filters['order-by'] . "&amp;order-direction=" . $filters['order-direction']; } ?>">&gt;</a></li>  
        <?php
        }
        ?>
        </ul>
      </div>
    </div>

    <?php
  }
  ?>


