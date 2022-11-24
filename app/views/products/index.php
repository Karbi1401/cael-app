<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main>
  <div class="container-fluid">
    <div class="col-md-12">
      <?php success('product_message'); ?>
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-box mr-2"></i> Products</h5>
      <div class="card">
        <div class="card-body">
          <a href="<?php echo URLROOT; ?>/products/add" class="btn btn-primary btn-rounded btn-sm mb-3" role="button"><i class="fas fa-plus mr-2"></i> Add Product</a>
          <div class="table-responsive">
            <table id="myTable" class="table table-striped display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($data['products'] as $product) : ?>
                  <tr>
                    <td><?php echo $product->product_id; ?></td>
                    <td><?php echo $product->product_name; ?></td>
                    <td><?php echo $product->product_price; ?></td>
                    <td><?php echo $product->product_description; ?></td>
                    <td>
                      <img class='img-fluid' src='<?php echo URLROOT; ?>/public/img/<?php echo $product->product_image; ?>' alt='image' width='100'>
                    </td>
                    <td><?php echo $product->categoryName; ?></td>
                    <td>
                      <?php if ($product->product_status == 1) : ?>
                        <a class="btn btn-success btn-rounded btn-sm" href="<?php echo URLROOT; ?>/products/changeProductStatusInactive/<?php echo $product->product_id; ?>" role="button">
                          Active
                        </a>
                      <?php elseif ($product->product_status == 0) : ?>
                        <a class="btn btn-danger btn-rounded btn-sm" href="<?php echo URLROOT; ?>/products/changeProductStatusActive/<?php echo $product->product_id; ?>" role="button">
                          Inactive
                        </a>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="d-flex justify-content-around">
                        <a href="<?php echo URLROOT; ?>/products/edit/<?php echo $product->product_id; ?>"><i class="fa-solid fa-pen-to-square teal-text" data-toggle="tooltip" data-placement="top" title="Update Product"></i>
                        </a>
                        <a onclick="deleteProduct()" href="<?php echo URLROOT; ?>/products/delete/<?php echo $product->product_id; ?>"><i class="fa-solid fa-trash red-text" data-toggle="tooltip" data-placement="top" title="Delete Product"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>