    <!-- WELCOME SECTION -->
    <section id="welcome-section" class="bg-light ">
        <div class="dark-overlay">
            <div class="welcome-inner">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1 class="display-4 text-center d-none d-md-block">Welcome to the One-Shot Shop!</h1>
                            <h1 class="display-5 text-center d-block d-none d-md-none">Welcome!</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURED (LARGE+) SECTION -->
    <section id="featured-section-lg" class="bg-light pb-5 d-none d-lg-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3 class="display-5 py-3">Featured Products</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="featuredCarousel" class="carousel slide" data-ride="carousel" style="min-height: 420px; max-height:420px;">
                        <div class="carousel-inner">
                            <?php 
                                $i = 1;
                                $x = 0;
                                $start = [0, 4, 8];
                                $end = [3, 7, 11];
                                $total = 0;
                                foreach($end as $k => $c)
                                {
                                    if(count($featured_products) < $c)
                                    {
                                        $total = $k+1;
                                        break;
                                    }
                                }
                            ?>
                            <?php while ($i != $total): ?>
                            <div class="carousel-item <?php if($i == 1) echo 'active'; ?>">
                                <div class="d-flex flex-row justify-content-center">
                                    <?php foreach($featured_products as $k => $featured_product): ?>
                                    <?php if($k < $start[$x]) continue; ?>
                                    <div class="card mx-3" style="width: 20rem;">
                                    <?php $hidden = array('id'=>$featured_product->get_id()); ?>
                                    <?= form_open('products/view', '', $hidden); ?>
                                        <img class="card-img-top img-responsive" src="<?= base_url(); ?>uploads/<?= $featured_product->get_image(); ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $featured_product->get_name(); ?></h4>
                                            <p class="card-text"><?= substr($featured_product->get_description(), 0, 75).'...'; ?></p>
                                            <button type="submit" class="btn btn-primary">More Info</button>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>
                                    <?php if($k >= $end[$x]) break; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php $i++; ?>
                            <?php $x++; ?>
                            <?php endwhile; ?>
                        </div>
                        <a class="carousel-control-prev" href="#featuredCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#featuredCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURED (Medium -> Large) SECTION -->
    <section id="featured-section-md" class="bg-light pb-5 d-none d-sm-block d-lg-none d-xl-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3 class="display-5 py-3">Featured Products</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="featuredCarouselMedium" class="carousel slide" data-ride="carousel" style="min-height: 420px; max-height:420px;">
                        <div class="carousel-inner">
                            <?php 
                                $i = 1;
                                $x = 0;
                                $start = [0, 2, 4, 6, 8, 10];
                                $end = [1, 3, 5, 7, 9, 11];
                                $total = 0;
                                foreach($end as $k => $c)
                                {
                                    if(count($featured_products) < $c)
                                    {
                                        $total = $k+1;
                                        break;
                                    }
                                }
                            ?>
                            <?php while ($i != $total): ?>
                            <div class="carousel-item <?php if($i == 1) echo 'active'; ?>">
                                <div class="d-flex flex-row justify-content-center">
                                    <?php foreach($featured_products as $k => $featured_product): ?>
                                    <?php if($k < $start[$x]) continue; ?>
                                    <div class="card mx-3" style="width: 20rem;">
                                    <?php $hidden = array('id'=>$featured_product->get_id()); ?>
                                    <?= form_open('products/view', '', $hidden); ?>
                                        <img class="card-img-top" src="<?= base_url(); ?>uploads/<?= $featured_product->get_image(); ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $featured_product->get_name(); ?></h4>
                                            <p class="card-text"><?= substr($featured_product->get_description(), 0, 75).'...'; ?></p>
                                            <button type="submit" class="btn btn-primary">More Info</button>
                                        </div>
                                    <?= form_close(); ?>
                                    </div>
                                    <?php if($k >= $end[$x]) break; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php 
                                $i++;
                                $x++;
                            ?>
                            <?php endwhile; ?>
                        </div>
                        <a class="carousel-control-prev" href="#featuredCarouselMedium" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#featuredCarouselMedium" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURED (LARGE+) SECTION -->
    <section id="featured-section-sm" class="bg-light pb-5 d-block d-sm-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3 class="display-5 py-3">Featured Products</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="featuredCarouselSmall" class="carousel slide" data-ride="carousel" style="min-height: 420px; max-height:420px;">
                        <div class="carousel-inner">
                            <?php $x = 1; ?>
                            <?php foreach($featured_products as $k => $featured_product): ?>
                            <div class="carousel-item <?php if($x == 1) echo 'active'; ?>">
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="card mx-3" style="width: 20rem;">
                                    <?php $hidden = array('id'=>$featured_product->get_id()); ?>
                                    <?= form_open('products/view', '', $hidden); ?>
                                        <img class="card-img-top img-responsive" src="<?= base_url(); ?>uploads/<?= $featured_product->get_image(); ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $featured_product->get_name(); ?></h4>
                                            <p class="card-text"><?= substr($featured_product->get_description(), 0, 75).'...'; ?></p>
                                            <button type="submit" class="btn btn-primary">More Info</button>
                                        </div>
                                    <?= form_close(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php $x++; ?>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#featuredCarouselSmall" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#featuredCarouselSmall" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NRA SECTION -->
    <section id="nra-section" class="bg-light">
        <div class="dark-overlay">
            <div class="nra-inner">
                <div class="container">
                    <div class="row d-none d-md-block">
                        <div class="col">
                            <div class="d-flex flex-row nra-inner-cell">
                                <div class="align-self-center text-center">
                                    <img src="<?= base_url(); ?>assets/img/nra-logo.png" alt="" class="img-responsive w-50">
                                </div>
                                <div class="align-self-center text-center">
                                    <a href="#">
                                        <img src="<?= base_url(); ?>assets/img/nra-ad.png" alt="" class="img-responsive w-75">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-sm-block d-md-none">
                        <div class="col">
                            <div class="text-center nra-inner-cell" id="nra-small-inner">
                                <span class="h3">
                                    <a href="https://membership.nra.org/Join/Annuals/prospect?gclid=CjwKCAiAu4nRBRBKEiwANms5W4K_2OELrWGQb3QUnH0RlsQ68DDMt0v0ru6F-FPSaKuOLQpYaycnahoCSQwQAvD_BwE"><span>Join the NRA!</span><br><img src="<?= base_url(); ?>assets/img/nra-logo.png" alt=""></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUCT TYPE SECTION -->
    <!-- This will be 4 boxes of images that allow selection for auto filter on other page -->
    <section id="product-section" class="pb-3 bg-dark text-muted">
            <div class="container">
                <div class="d-flex flex-row justify-content-center">
                    <div class="">
                        <h3 class="display-5 py-3">Our Inventory</h3>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-center">
                    <div class="p-3">
                        <div class="imghvr-push-down">
                            <img src="<?= base_url(); ?>assets/img/long-gun.png" class="img-responsive">
                            <figcaption>
                                <h1>Long Guns</h1>
                                <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm mt-1">View Inventory</button>
                                </div>
                            </figcaption>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="imghvr-push-down">
                            <img src="<?= base_url(); ?>assets/img/pistols.jpg" class="img-responsive">
                            <figcaption>
                                <h1>Pistols</h1>
                                <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm mt-1">View Inventory</button>
                                </div>
                            </figcaption>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-center">
                    <div class="p-3">
                        <div class="imghvr-push-down">
                            <img src="<?= base_url(); ?>assets/img/shotgun.jpg" class="img-responsive">
                            <figcaption>
                                <h1>Shotguns</h1>
                                <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm mt-1">View Inventory</button>
                                </div>
                            </figcaption>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="imghvr-push-down">
                            <img src="<?= base_url(); ?>assets/img/accessories.jpg" class="img-responsive">
                            <figcaption>
                                <h1>Accessories</h1>
                                <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm mt-1">View Inventory</button>
                                </div>
                            </figcaption>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LOCATION SECTION -->
    <!-- Google maps -->
    <section id="map-section">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col text-center bg-dark text-muted">
                    <h3 class="p-3">Location</h3>
                </div>
            </div> -->
            <div class="row">
                <div class="col" id="map"></div>
            </div>
        </div>
    </section>

    <!-- NEWSLETTER SECTION -->
    <section id="newsletter-section" class="bg-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <h3 class="display-5 py-3">Newsletter</h3>
                </div>
            </div>
            <div class="container text-center">
                <div class="row divider-row mx-auto"></div>
            </div>
            <div class="d-flex flex-row justify-content-center">
            <div class="col-sm-6 p-4 text-center">
                <p>Sign up for a monthly newsletter!</p>
                    <form>
                        <div class="input-group">
                            <input type="text" name="newsletter-email" class="form-control" placeholder="Type your email!">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Sign up!</button>
                            </span>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </section>

    <script>
            function initMap() {
    
                var myLatLng = {
                    lat: 36.359011,
                    lng: -119.331300
                };
    
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: myLatLng,
                    zoom: 13
                });
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'One-Shot Shop'
                });
    
            }
    </script>