<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Brian L. Peter Jr.">
    <title>One-Shot Shop</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
</head>
<body>
    
    <!-- CONTACT SECTION -->
    <session id="contact-section" class="py-2 col-md-12 d-none d-md-block">
        <div class="container-fluid">
            <div class="d-flex flex-row justify-content-center justify-content-between">
                <div class="p-1 align-self-center">
                    <i class="fa fa-envelope"></i>
                    <span>support@oneshotshop.com</span>
                </div>
                <div class="align-self-center d-none d-sm-block">
                    <a href="#"><i class="px-1 fa fa-2x fa-facebook-official"></i></a>
                    <a href="#"><i class="px-1 fa fa-2x fa-youtube-play"></i></a>
                    <a href="#"><i class="px-1 fa fa-2x fa-twitter"></i></a>
                    <a href="#"><i class="px-1 fa fa-2x fa-instagram"></i></a>
                </div>
                <div class="p-1 align-self-center">
                    <span>Questions? Call 1 (800) Call-Now</span>
                </div>
            </div>
        </div>
    </session>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top" id="topNavbar">
        <!-- <div class="container-fluid"> -->
            <a href="index.html" class="navbar-brand py-0 pl-3">
                <img src="<?= base_url(); ?>assets/imgs/logo.jpg" alt="">
            </a>
            <a href="index.html" class="navbar-brand d-block d-none d-sm-none">
                    One-Shot Shop
                </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <span>
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-shopping-cart"></i>
                            <span>7 - Items</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-user"></i>
                            <span>Username</span>
                        </a>
                    </li>
                </ul>
            </div>
        <!-- </div> -->
    </nav>

    <?php $this->load->view($main_view); ?>

    <!-- FOOTER -->
    <section id="footer-section" class="bg-dark text-muted">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-center">
                <div>
                    <ul class="nav flex-column nav-pills p-4 flex-wrap">
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <strong>Social Media</strong>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#" class="pr-2">
                                <i class="fa fa-facebook-official pr-2" aria-hidden="true"></i>
                                Facebook
                            </a>
                            <span class="badge badge-primary align-middle">
                                <i class="fa fa-thumbs-up"></i>
                                25k
                            </span>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#" class="youtube pr-2">
                                <i class="fa fa-youtube-play pr-2" aria-hidden="true"></i>
                                Youtube
                            </a>
                            <span class="badge badge-primary align-self-center">
                                <i class="fa fa-thumbs-up"></i>
                                45k
                            </span>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#">
                                <i class="fa fa-twitter-square pr-2" aria-hidden="true"></i>
                                Twitter
                            </a>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#">
                                <i class="fa fa-instagram pr-2" aria-hidden="true"></i>
                                Instagram
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="nav flex-column nav-pills p-4">
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <strong>Contact</strong>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#" class="pr-2">
                                <i class="fa fa-envelope pr-2" aria-hidden="true"></i>
                                orders@oneshotshop.com
                            </a>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#" class="youtube pr-2">
                                ATTN: Sales Department
                            </a>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#" class="youtube pr-2">
                                1234 Some Rd.
                            </a>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#">
                                City, State, Zipcode
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="nav flex-column nav-pills p-4">
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <strong>Footer</strong>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#" class="pr-2">
                                <i class="fa fa-file pr-2" aria-hidden="true"></i>
                                Policy
                            </a>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#" class="pr-2">
                                <i class="fa fa-file-o pr-2" aria-hidden="true"></i>
                                Terms of Use
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="nav flex-column nav-pills p-4">
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <strong>Helpful Links</strong>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#" class="pr-2">
                                Firearm Safety Certificate (FSC)
                            </a>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#" class="pr-2">
                                FSC Study Tests
                            </a>
                        </li>
                        <li class="nav-link d-flex justify-content-center justify-content-md-between align-items-center">
                            <a href="#" class="pr-2">
                                Conceal Carry Permit Information
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container text-center d-none d-block d-md-none pb-4">
                    <div class="row divider-row mx-auto"></div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <p>&copy; 2017, One-Shot Shop</p>
                </div>
            </div>
        </div>
    </section>

    <div class="scroll-top-wrapper d-none d-sm-block">
        <span class="scroll-top-inner">
            <i class="fa fa-2x fa-arrow-circle-up"></i>
        </span>
    </div>

    <!-- JavaScript -->
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>

    <!-- Scroll to top -->
    <script>
        //Thanks to: http://www.webtipblog.com/adding-scroll-top-button-website/

        $(document).ready(function(){
            
            $(function(){
            
                $(document).on( 'scroll', function(){
            
                    if ($(window).scrollTop() > 100) {
                        $('.scroll-top-wrapper').addClass('show');
                    } else {
                        $('.scroll-top-wrapper').removeClass('show');
                    }
                });
            
                $('.scroll-top-wrapper').on('click', scrollToTop);
            });
            
            function scrollToTop() {
                verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
                element = $('body');
                offset = element.offset();
                offsetTop = offset.top;
                $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
            }
            
        });
    </script>

</body>
</html>