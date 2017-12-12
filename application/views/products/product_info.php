<!-- PRODUCT SECTION -->
<section id="product-info-section">
    <div class="container p-3">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?= base_url(); ?>uploads/<?= $product->get_image(); ?>" alt="" class="img-fluid">              
            </div>
            <div class="col-sm-6 px-md-3">
                <h4 class="pt-2 pt-md-0"><?= $product->get_name(); ?></h4>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i> 

                <?php if($product->get_featured() == 'on'): ?>
                <span class="badge badge-primary">Featured</span>
                <?php endif; ?>
                
                <h5 class="display-md-5 pt-md-5">$<?= $product->get_price(); ?></h5>
                <div class="row pt-1 pt-lg-5">
                    <div class="col" id="large-buttons">
                        <button type="button" onclick="javascript:history.back()" class="btn btn-danger">Go Back</button>
                        <button type="button" class="btn btn-success">Add to Cart</button>
                    </div>
                    <div class="col" id="small-buttons">
                        <button type="button" onclick="javascript:history.back()" class="btn btn-sm btn-danger">Go Back</button>
                        <button type="button" class="btn btn-sm btn-success">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Reviews</a>
                    </li>
                </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <p class="p-3"><?= $product->get_description(); ?></p>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    ...
                </div>
            </div>
        </div>
    </div>
</section>    