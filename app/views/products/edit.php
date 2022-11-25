<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">

      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-box"></i> Add Products</h5>
      <div class="card">
        <div class="card-body">
          <form action="<?php echo URLROOT; ?>/products/edit/<?php echo $data['id']; ?>" method="POST" id="formProduct" enctype="multipart/form-data">

            <div class="row">

              <div class="col-md-8 mb-3">
                <label class="form-control-label" for="productName">Product Name</label>
                <input type="text" id="productName" class="form-control <?php echo (!empty($data['product_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['product_name']; ?>" name="product_name">
                <span class="invalid-feedback"><?php echo $data['product_name_err']; ?></span>
              </div>

              <div class="col-md-4 mb-3">
                <label for="productPrice">Product Price</label>
                <input type="text" id="productPrice" class="form-control <?php echo (!empty($data['product_price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['product_price']; ?>" name="product_price">
                <span class="invalid-feedback"><?php echo $data['product_price_err']; ?></span>
              </div>

            </div>

            <div class="row">

              <div class="col mb-3">
                <label for="productDescription">Product Description</label>
                <textarea class="form-control <?php echo (!empty($data['product_description_err'])) ? 'is-invalid' : ''; ?>" id="productDescription" rows="3" name="product_description"><?php echo $data['product_description']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['product_description_err']; ?></span>
              </div>

            </div>

            <div class="row">

              <div class="col mb-3">
                <label for="productCategory">Product Category</label>
                <select class="browser-default custom-select" action="formProduct" id="productCategory" name="category_id">
                  <option value="<?php echo $data['category_id']; ?>" selected>Selected: <?php echo $data['category_name']; ?></option>
                  <?php foreach ($data['categories'] as $category) : ?>
                    <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-success w-100" type="submit" value="Edit Product">Edit Product</button>
              <a class="btn btn-danger w-100" href="<?php echo URLROOT; ?>/products" role="button">Cancel</a>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>