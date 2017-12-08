<section id="admin-section">
    <div class="container-fluid">
        <div class="row">

        <main role="main" class="col-sm-12 ml-sm-auto pt-3">
            <h1>New Product</h1>
            
            <section id="mini-navigation">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url(); ?>admin/products">All Products</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url(); ?>admin/products/create">New Product</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </section>

            <section id="new-product-form">
                <div class="row pt-4">
                    <div class="container">
                        <div class="col-md-12">
                            <?= form_open_multipart('admin/products/create'); ?>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" placeholder="Product Name">
                                    </div>
                                </div>
                                <?php if(form_error('name')): ?>
                                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                                        <small><?= form_error('name', '<div class="p-0 m-0">', '</div>'); ?></small>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control" name="price" placeholder="Product Price">
                                        </div>
                                    </div>
                                </div>
                                <?php if(form_error('price')): ?>
                                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                                        <small><?= form_error('price', '<div class="p-0 m-0">', '</div>'); ?></small>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="pr-5" id="quantity-slider-label"><span id="quantity-slider-value">0</span></span>
                                            <input id="quantity-slider" name="quantity" data-slider-id='quantity-slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="0"/>
                                        </div>
                                    </div>
                                </div>
                                <?php if(form_error('quantity')): ?>
                                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                                        <small><?= form_error('quantity', '<div class="p-0 m-0">', '</div>'); ?></small>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" name="description" placeholder="Product description..." rows="5"></textarea>
                                    </div>
                                </div>
                                <?php if(form_error('description')): ?>
                                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                                        <small><?= form_error('description', '<div class="p-0 m-0">', '</div>'); ?></small>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <label for="featured" class="col-sm-2 col-form-label">Featured</label>
                                    <div class="col-sm-2">
                                        <div class="featured">
                                            <input type="checkbox" name="featured" class="featured-checkbox" id="featured">
                                            <label class="featured-label" for="featured">
                                                <span class="featured-inner"></span>
                                                <span class="featured-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label for="image-upload" class="col-sm-2 col-form-label">Image Upload</label>
                                    <div class="col-sm-6" id="image-upload">
                                        <div class="input-group image-preview">
                                            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                                                <!-- image-preview-clear button -->
                                                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                                </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                    <span class="image-preview-input-title">Browse</span>
                                                    <?= form_upload('image'); ?>
                                                </div>
                                            </span>
                                        </div><!-- /input-group image-preview [TO HERE]--> 
                                    </div>
                                </div>
                                <?php if(form_error('featured')): ?>
                                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                                        <small><?= form_error('featured', '<div class="p-0 m-0">', '</div>'); ?></small>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row text-right">
                                    <div class="col-sm-12" id="submit-button">
                                        <button type="submit" class="btn btn-labeled btn-success">
                                            <span class="btn-label"><i class="fa fa-check"></i></span>Create</button>
                                        </button>
                                    </div>
                                </div>
                                <br>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        </div>
    </div>
</section>