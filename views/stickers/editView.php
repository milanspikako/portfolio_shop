<main>
  <div class="container">
    <section class="tipografy  col-lg-6 col-md-8">
      <h1>Edit sticker</h1>
      <p class="text-danger"><?php echo $systemMessage; ?></p>
    </section>

    <?php
    if (!$editStatus) {
      ?>
      <section class="form-elements  col-lg-6 col-md-8">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" name="title" value="<?php echo isset($formData["title"]) ? htmlspecialchars($formData["title"]) : ""; ?>">
            <?php
            if (isset($formErrors["title"])) {
              foreach ($formErrors["title"] as $errorMessage) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorMessage; ?>
                </div>
                <?php
              }
            }
            ?>
          </div>


          <div class="form-group">
            <label>Color</label>
            <input class="form-control col-lg-2 col-md-2 col-sm-2 col-2" type="color" name="color" value="<?php echo isset($formData["color"]) ? htmlspecialchars($formData["color"]) : ""; ?>">
            <?php
            if (isset($formErrors["color"])) {
              foreach ($formErrors["color"] as $errorMessage) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorMessage; ?>
                </div>
                <?php
              }
            }
            ?>
          </div>

          <div class="form-group">
            <label>Current image</label>
            <?php
            if (isset($openedRow['image']) && !empty($openedRow['image'])) {
              ?>
            <img class="sticker-image" src="<?php echo $openedRow['image']; ?>">
              <?php
            } else {
              echo "<p>There is no image</p>";
            }
            ?>

          </div>


          <div class="form-group">
            <label>New image</label>
            <input type="file" name="image" value="">
            <?php
            if (isset($formErrors["image"])) {
              foreach ($formErrors["image"] as $errorMessage) {
                ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $errorMessage; ?>
                </div>
                <?php
              }
            }
            ?>
          </div>

          <!--ISKOPIRATI ZA INPUT TYPE SUBMIT-->
          <input type="submit" name="submit" class="btn btn-primary" value="Edit">

        </form>
      </section>
      <?php
    }
    ?>
  </div>
</main><!--main end-->
<br>