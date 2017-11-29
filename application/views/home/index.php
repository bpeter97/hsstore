<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>

    <script>
        function initMap() {

            var myLatLng = {lat: 36.359011, lng: -119.331300};

            var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 13
            });
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });

        }
    </script>

<div class="parallax-one">
<h1>
        Welcome to the One-Shot Shop!
    </h1>
</div>
<div class="container-fluid" id="content"></div>

<!-- First row -->
<div class="row featured_label" style="background-color:white;margin-bottom:-15px;">
<h3>Featured Products</h3>
</div>

<!-- Second row -->
<div class="row padded-30" style="background-color:white;">
<div class="col-xs-1 " id="">

</div>
<div class="col-xs-10">
    <div id="Carousel" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#Carousel" data-slide-to="0" class="active"></li>
            <li data-target="#Carousel" data-slide-to="1"></li>
            <li data-target="#Carousel" data-slide-to="2"></li>
        </ol>
        <!-- TODO Make all sub-text a php substring function. -->
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="row">
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--.row-->
            </div>
            <!--.item-->
            <div class="item">
                <div class="row">
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--.row-->
            </div>
            <!--.item-->
            <div class="item">
                <div class="row">
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#" class="thumbnail fimage">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/imgs/w_image.jpg" alt="Image">
                                </a>
                            </li>
                            <li class="list-group-item">$1999.99</li>
                            <li class="list-group-item">
                                <p>
                                    Featureless CZ 805 Bren S1
                                </p>
                                <p>
                                    (MSRP: $2,149.99)
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--.row-->
            </div>
            <!--.item-->
        </div>
        <!--.carousel-inner--><a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
        <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
    </div>
    <!--.Carousel-->
</div>
<div class="col-xs-1">

</div>
</div>
<!-- End of 2nd row -->
</div>

<div class="parallax-two">
<h1>
    Welcome to the One-Shot Shop!
</h1>
</div>

<!--  -->

<!-- 4th row -->
<div class="row">
<div class="col-xs-12" id="map" style="width:100%;height:400px;background-color:yellow;">
</div>
</div>
<!-- End of 4th row -->


</div>