<main>
    <div class="container">

        <div class="row">
            <!-- LEVI kontejner -->
            <div class="col-md-9">
                <h1>Message</h1>
                
                <p class="text-danger"><?php echo $message; ?></p>
                
                <?php
                    include_once '../../../views/frontend/viewedProductsView.php';
                ?>
            </div><!-- kraj levog kontejnera-->


            <!-- ASIDE -->
            <div class="col-md-3 aside">
                <section class="contact ">
                    <h3>Adresa:</h3>
                    <p>Bulevar Mihaila Pupina 181</p>
                    <p>11000 Beograd</p>
                    <p class="phone"><span class="fa fa-phone"></span> 011/123-123</p>
                    <p class="email"><span class="fa fa-envelope-o"></span><a href="mailto:example@mail.com">example@mail.com</a></p>
                    <p class="url"><span class="fa fa-globe"></span><a href="http://school.cubes.rs">school.cubes.rs</a></p>
                </section>
            </div><!-- Kraj aside -->

        </div>
    </div>
    </main>
