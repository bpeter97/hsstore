<?php foreach($products as $product): ?>
<div class="card m-3" style="width: 20rem;">
    <?php $hidden = array('id'=>$product->get_id()); ?>
    <?= form_open('products/view', '', $hidden); ?>
    <img class="card-img-top" src="<?= base_url(); ?>uploads/<?= $product->get_image(); ?>" alt="Card image cap">
    <div class="card-body">
        <h4 class="card-title"><?= $product->get_name(); ?></h4>
        <p class="card-text"><?= substr($product->get_description(), 0, 100); ?></p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><h5 class="card-text">$<?= $product->get_price(); ?></h5></li>
        <li class="list-group-item"><button type="submit" class="btn btn-primary">View Product</button></li>
    </ul>
    <?= form_close(); ?>
</div>
<?php endforeach; ?>
