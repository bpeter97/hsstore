<?php
    $home_active = '';
    $inventory_active = '';
    $about_us_active = '';
    $contact_active = '';

    if($this->uri->segment(1) == 'products') {
        $inventory_active = 'active';
    } else if ($this->uri->segment(1) ==  'about') {
        $about_us_active = 'active';
    } else if ($this->uri->segment(1) ==  'contact') {
        $contact_active = 'active';
    } else {
        $home_active = 'active';
    }

?>


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

    <!-- ALERT SECTION -->
    <?php if($this->session->flashdata('error_msg') || $this->session->flashdata('success_msg')): ?>
    <section id="alert-section">
        <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success_msg'); ?>
        <?php else: ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php
                foreach($this->session->flashdata('error_msg') as $error)
                {
                    echo $error;
                    break;
                }
            ?>
            <?php endif; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </div>
    </section>
    <?php endif; ?>
    
    <!-- CONTACT SECTION -->
    <section id="contact-section" class="py-2 col-md-12 d-none d-md-block">
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
    </section>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top" id="topNavbar">
        <!-- <div class="container-fluid"> -->
            <a href="<?= base_url(); ?>" class="navbar-brand py-0 pl-3">
                <img src="<?= base_url(); ?>assets/img/logo.jpg" alt="">
            </a>
            <a href="<?= base_url(); ?>" class="navbar-brand d-block d-none d-sm-none">
                    One-Shot Shop
                </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>" class="nav-link <?= $home_active; ?>">
                            <span>
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>products" class="nav-link <?= $inventory_active; ?>">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= $about_us_active; ?>">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= $contact_active; ?>">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-shopping-cart"></i>
                            <span>7 - Items</span>
                        </a>
                    </li>
                    <?php if($this->session->has_userdata('logged_in')): ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?= $this->session->userdata('username'); ?></a>
                        <div class="dropdown-menu">
                            <?php if($this->user_model->check_user_type($this->session->userdata('user_id'), 'Admin')): ?>
                                <a href="<?= base_url(); ?>admin" class="dropdown-item">Admin</a>
                            <?php endif; ?>
                            <a href="<?= base_url(); ?>users/logout" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#login-modal">
                            <i class="fa fa-user"></i>
                            <span>Login / Register</span>
                        </a>
                    </li>
                    <?php endif; ?>
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

    <!-- Login / Register Modal -->
    <div id="login-modal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Login or Register</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="lead">Login</p>
                                        <?= form_open('users/login'); ?>
                                            <div class="form-group">
                                                <?php
                                                    $data = array(
                                                        'class'         =>  'form-control',
                                                        'name'          =>  'username',
                                                        'placeholder'   =>  'Enter you username'
                                                    );
                                                    echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    $data = array(
                                                        'class'         =>  'form-control',
                                                        'name'          =>  'password',
                                                        'placeholder'   =>  'Enter your password'
                                                    );
                                                    echo form_password($data);
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <?php 
                                                    $data = array(
                                                        'class' => 'btn btn-primary',
                                                        'name' => 'submit',
                                                        'value' => 'Login'
                                                    );
                                                    echo form_submit($data);
                                                ?>
                                            </div>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 h-100">
                                <div class="card">
                                    <div class="card-body">
                                    <p class="lead">Register now for <span class="text-success">FREE</span></p>
                                        <?= form_open('users/register'); ?>
                                            <div class="form-group">
                                                <?php
                                                    $data = array(
                                                        'class'         =>  'form-control',
                                                        'name'          =>  'username',
                                                        'placeholder'   =>  'Enter you username'
                                                    );
                                                    echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    $data = array(
                                                        'class'         =>  'form-control',
                                                        'name'          =>  'password',
                                                        'placeholder'   =>  'Enter your password'
                                                    );
                                                    echo form_password($data);
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    $data = array(
                                                        'class'         =>  'form-control',
                                                        'name'          =>  'confirm_password',
                                                        'placeholder'   =>  'Re-enter your password'
                                                    );
                                                    echo form_password($data);
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    $data = array(
                                                        'class'         =>  'form-control',
                                                        'name'          =>  'first_name',
                                                        'placeholder'   =>  'Enter your first name'
                                                    );
                                                    echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    $data = array(
                                                        'class'         =>  'form-control',
                                                        'name'          =>  'last_name',
                                                        'placeholder'   =>  'Enter your last name'
                                                    );
                                                    echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <?php
                                                    $data = array(
                                                        'class'         =>  'form-control',
                                                        'name'          =>  'email',
                                                        'placeholder'   =>  'Enter your email address'
                                                    );
                                                    echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group">
                                            <label class="form-check-label">
                                                <?php
                                                    $data = array(
                                                        'name'          =>  'tos',
                                                        'value'         =>  'accept',
                                                        FALSE,
                                                        'class'         =>  'form-check-input',
                                                        'type'          =>  'checkbox',
                                                        'style'         =>  'margin-top: 0.4rem;'
                                                    );
                                                    echo form_checkbox($data);
                                                ?>
                                            I agree to the <a href="#">Terms of Service</a>.
                                            </label>
                                            </div>
                                            <div class="form-group">
                                                <?php 
                                                    $data = array(
                                                        'class' => 'btn btn-primary',
                                                        'name' => 'submit',
                                                        'value' => 'Register'
                                                    );
                                                    echo form_submit($data);
                                                ?>
                                            </div>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                
                </div>
            </div>
        </div>
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

<!-- Infinit scrolling for products page. -->
<script type="text/javascript">

	var page = 1;
    var finished = false;

	$(window).scroll(function() {
        if(!finished){
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                console.log(page);
                loadMoreData(page);
	        }
        } else {
            $('#products-finished').show();
        }
	});

	function loadMoreData(page){

        $.ajax({
            url: '?page=' + page,
            type: "get",
            beforeSend: function()
            {
                $('.ajax-load').show();
            }
        })

        .done(function(data)
        {
            if(data == ''){
                finished = true;
                $('#products-finished').show();
                $('.ajax-load').hide();
                return;

            } else {
                $('.ajax-load').hide();
                $("#post-data").append(data);
            }

        })

        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
                alert('server not responding...');
        });

	}
</script>
<!-- End of infinite scrolling for product page -->

</body>
</html>