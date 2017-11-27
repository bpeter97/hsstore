<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <!-- Include our fonts -->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Open+Sans+Condensed:300" rel="stylesheet"> 

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="<?php echo base_url().'assets/js/jquery-3.2.1.min.js'; ?>"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Store CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    
</head>
<body style="background-color:lightslategrey;">

    <div class="container-fluid" style="height:45px;background-color:white;">
        <div class="col-xs-4">
            <h4 class="pull-left">The Head Shot Shop</h4>
        </div>
        <div class="col-xs-4">
            <div class="col-xs-11">
                <label class="form-input">
                    <input type="text" id="person_name" required />
                    <span class="label">Search our store!</span>
                    <span class="underline"></span>
                </label>
            </div>
            <div class="col-xs-1">
                <a class="btn btn-primary" href="http://" style="border:none;margin-top:5px;"><span class="glyphicon glyphicon-search"></span></a>
            </div>
        </div>
        <div class="col-xs-4">
            <h4 class="pull-right">Questions? Call 1 (800) Call-Now</h4>
        </div>
    </div>

    <nav class="navbar navbar-default" data-spy="affix" data-offset-top="45">
        <div class="pull-left">
            <a class="brand" href="#">
                        <!-- UNCOMMENT THE CSS VALUES TO TEST OTHER DIMENTIONS -->
                        <!-- <img src="http://placehold.it/150x80&text=Logo" alt=""> -->
                        <img src="http://placehold.it/150x50&text=Logo" alt="">
            </a>
        </div>
        <ul class="nav navbar-nav" id="center-nav">
            <li class="center-nav active"><a href="#">Home</a></li>
            <li class="center-nav"><a href="#">Link</a></li>
            <li class="center-nav"><a href="#">Link</a></li>
            <li class="center-nav dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Dropdown
                <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                </ul>
            </li>
            <!-- #################################################### -->

            <!-- ACCOUNT -->

            <!-- #################################################### -->
            <li class="pull-right">
                <ul class="nav navbar-nav pull-right" style="margine-left:15px;">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> 
                            <strong><?= $user->getUsername(); ?></strong>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="text-center">
                                                <span class="glyphicon glyphicon-user icon-size"></span>
                                            </p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="text-left"><strong>Nombre Apellido</strong></p>
                                            <p class="text-left small">correoElectronico@email.com</p>
                                            <p class="text-left">
                                                <a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>
                                                <a href="#" class="btn btn-danger btn-block">Cerrar Sesion</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- #################################################### -->

            <!-- CART -->

            <!-- #################################################### -->
            <li class="pull-right">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> 7 - Items<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-cart" role="menu">
                            <li>
                                <span class="item" id="cart" style="display:block;">
                                    <span class="item-left">
                                        <img src="http://lorempixel.com/50/50/" alt="" />
                                        <span class="item-info">
                                            <span>Item name</span>
                                            <span>23$</span>
                                        </span>
                                    </span>
                                    <span class="item-right">
                                        <button class="btn btn-xs btn-danger pull-right">x</button>
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="item">
                                    <span class="item-left">
                                        <img src="http://lorempixel.com/50/50/" alt="" />
                                        <span class="item-info">
                                            <span>Item name</span>
                                            <span>23$</span>
                                        </span>
                                    </span>
                                    <span class="item-right">
                                        <button class="btn btn-xs btn-danger pull-right">x</button>
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="item">
                                    <span class="item-left">
                                        <img src="http://lorempixel.com/50/50/" alt="" />
                                        <span class="item-info">
                                            <span>Item name</span>
                                            <span>23$</span>
                                        </span>
                                    </span>
                                    <span class="item-right">
                                        <button class="btn btn-xs btn-danger pull-right">x</button>
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="item">
                                    <span class="item-left">
                                        <img src="http://lorempixel.com/50/50/" alt="" />
                                        <span class="item-info">
                                            <span>Item name</span>
                                            <span>23$</span>
                                        </span>
                                    </span>
                                    <span class="item-right">
                                        <button class="btn btn-xs btn-danger pull-right">x</button>
                                    </span>
                                </span>
                            </li>
                            <li class="divider"></li>
                            <li><a class="text-center" href="">View Cart</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <?php $this->load->view($main_view); ?>
        
</body>