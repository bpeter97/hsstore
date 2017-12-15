<!-- PRODUCT HEADER SECTION -->
<section id="product-header-section" class="bg-light ">
    <div class="dark-overlay">
        <div class="welcome-inner">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="display-4 text-center d-none d-md-block">Products</h1>
                        <h1 class="display-5 text-center d-block d-none d-md-none">Products</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRODUCT SECTION -->
<section id="product-section">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" id="midNavbar" style="top:50px;">
        <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#midNavbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="midNavbarCollapse">
                <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Weapons</a>
                            <div class="dropdown-menu">
                                <a href="<?= base_url(); ?>products/" class="dropdown-item">All Weapons</a>
                                <a href="<?= base_url(); ?>products/index/3" class="dropdown-item">Long Guns</a>
                                <a href="<?= base_url(); ?>products/index/4" class="dropdown-item">Pistols</a>
                                <a href="<?= base_url(); ?>products/index/5" class="dropdown-item">Shotguns</a>
                            </div>
                        </li> 
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>products/index/2" class="nav-link">Accessories</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center" id="post-data">
            <?php $this->load->view('products/product_listing', $products); ?>
        </div>
    </div>

    <section id="alert-section">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="products-finished" style="display:none">
            There are no more results.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </div>
    </section>

    <div class="ajax-load text-center" style="display:none">

	    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>

    </div>

</section>