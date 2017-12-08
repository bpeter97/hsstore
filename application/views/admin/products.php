<section id="admin-section">
    <div class="container-fluid">
        <div class="row">

            <main role="main" class="col-sm-12 ml-sm-auto pt-3">
            <h1>Products</h1>
            
            <section id="mini-navigation">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url(); ?>admin/products">All Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url(); ?>admin/products/create">New Product</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </section>

            <section id="product-table" class="pt-4">
                <table class="table table-hover table-dark text-center">
                    <thead>
                        <tr>
                            <th scope="col">Featured</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Tools</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php foreach($products as $product): ?>
                        <tr>
                            <td>
                                <div data-toggle="buttons">
                                    <label class="btn btn-sm btn-dark <?php if( ! $product->get_featured() == "on"){echo 'active';}else{echo '';} ?>" id="feature_checked">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </label>
                                    <label class="btn btn-sm btn-dark <?php if( ! $product->get_featured() == "on"){echo '';}else{echo 'active';} ?>">
                                        <input type="radio" name="options" id="option2" autocomplete="off">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </label>   
                                </div>
                            </td>
                            <th scope="row"><?= $product->get_id(); ?></th>
                            <td><?= $product->get_name(); ?></td>
                            <td><?= $product->get_quantity(); ?></td>
                            <td><?= $product->get_price(); ?></td>
                            <td>
                                <button type="button" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                <button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

            </main>
        </div>
    </div>
</section>