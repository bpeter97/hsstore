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
                <?php if($this->session->has_userdata('logged_in')): ?>
                <div class="row pt-1 pt-lg-5">
                    <div class="col" id="large-buttons">
                        <button type="button" onclick="javascript:history.back()" class="btn btn-danger">Go Back</button>
                        <button type="button" data-toggle="modal" data-target="#contactModal" class="btn btn-success">Contact To Purchase</button>
                    </div>
                    <div class="col" id="small-buttons">
                        <button type="button" onclick="javascript:history.back()" class="btn btn-sm btn-danger">Go Back</button>
                        <button type="button" data-toggle="modal" data-target="#contactModal" class="btn btn-sm btn-success">Contact To Purchase</button>
                    </div>
                </div>
                <?php else: ?>
                <div class="col" id="large-buttons">
                    <button type="button" onclick="javascript:history.back()" class="btn btn-danger">Go Back</button>
                    <button type="button" class="btn btn-success" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="You must be logged in to submit for information.">Contact To Purchase</button>
                </div>
                <div class="col" id="small-buttons">
                    <button type="button" onclick="javascript:history.back()" class="btn btn-sm btn-danger">Go Back</button>
                    <button type="button" class="btn btn-sm btn-success" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="You must be logged in to submit for information.">Contact To Purchase</button>
                </div>
                <?php endif; ?>
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

    <?php if($this->session->has_userdata('logged_in')): ?>
    <!-- Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="contactModalLabel">Contact Request</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('products/contact'); ?>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" required>Full Name</label>
                        <div class="col-sm-10">
                            <input name="name" class="form-control" placeholder="Enter your name." value="<?= $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?>">
                            <small class="form-text text-muted">Your first and last name.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label" required>Email Address</label>
                        <div class="col-sm-10">
                            <input name="email" class="form-control" placeholder="Enter your email address." type="email" value="<?= $this->session->userdata('email'); ?>">
                            <small class="form-text text-muted">Your email address.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label" required>Phone</label>
                        <div class="col-sm-10">
                            <input name="phone" class="form-control" placeholder="Enter your phone number.">
                            <small class="form-text text-muted">Enter the best contact number that we can reach you at.</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="product" class="col-sm-2 col-form-label" required>Phone</label>
                        <div class="col-sm-10">
                            <input name="product" class="form-control" value="<?= $product->get_name(); ?>">
                            <small class="form-text text-muted">This is the product you are interested in.</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="details">Additional Details</label>
                        <textarea name="details" class="form-control" rows="5"></textarea>
                        <small class="form-text text-muted">Enter any extra details you would like us to know before we contact you.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

</section>    