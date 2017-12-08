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
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-slider.min.css">
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
                        <a href="<?= base_url(); ?>" class="nav-link">Main Website</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>admin" class="nav-link active">Admin Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="<?= base_url(); ?>admin/products" class="nav-link">Products</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if($this->session->has_userdata('logged_in')): ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?= $this->session->userdata('username'); ?></a>
                        <div class="dropdown-menu">
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

    <!-- JavaScript -->
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap-slider.min.js"></script>

    <script>
        $(document).on('click', '#close-preview', function(){ 
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                function () {
                $('.image-preview').popover('show');
                }, 
                function () {
                $('.image-preview').popover('hide');
                }
            );    
        });

        $(function() {
            // Create the close button
            var closebtn = $('<button/>', {
                type:"button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class","close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger:'manual',
                html:true,
                title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
                content: "There's no image",
                placement:'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function(){
                $('.image-preview').attr("data-content","").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Browse"); 
            }); 
            // Create the preview image
            $(".image-preview-input input:file").change(function (){     
                var img = $('<img/>', {
                    id: 'dynamic',
                    width:250,
                    height:200
                });      
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("Change");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);            
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
                }        
                reader.readAsDataURL(file);
            });  
        });
    </script>

    <script>
        // With JQuery
        $('#ex1').slider({
            formatter: function(value) {
                return 'Current value: ' + value;
            }
        });

        $("#quantity-slider").slider();
        $("#quantity-slider").on("slide", function(slideEvt) {
            $("#quantity-slider-value").text(slideEvt.value);
        });
    </script>

</body>
</html>