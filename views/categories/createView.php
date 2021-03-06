<main>
  <div class="container">
    <section class="tipografy col-lg-6 col-md-8">
      <h1>New category</h1>
      <p class="text-danger"><?php echo $systemMessage; ?></p>
    </section>

    <?php
    if (!$insertStatus) {
      ?>
      <section class="form-elements col-lg-6 col-md-8">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="<?php echo isset($formData["name"]) ? htmlspecialchars($formData["name"]) : ""; ?>">
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
          </div>

          <!--ISKOPIRATI ZA INPUT TYPE SUBMIT-->
          <input type="submit" class="btn btn-primary" name="submit" value="Save">

        </form>
      </section>
      <?php
    }
    ?>
  </div>
</main><!--main end-->
<br>