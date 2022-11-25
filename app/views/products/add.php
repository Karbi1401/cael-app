<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">

      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-box"></i> Add Products</h5>
      <div class="card">
        <div class="card-body">
          <form action="<?php echo URLROOT; ?>/products/add" method="POST" id="formProduct" enctype="multipart/form-data">

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

                <label for="inputProductImage">Product Image</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputProductImage">Upload</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input <?php echo isset($data['product_image_err']) ? 'is-invalid' : '' ?>" id="inputProductImageFileGroup" aria-describedby="inputProductImage" name="image">
                    <label class="custom-file-label" for="inputProductImageFileGroup">Choose file</label>
                  </div>
                </div>
                <small>
                  <?php echo isset($data['product_image_err']) ? '<div class="text-danger">' . $data['product_image_err'] . '</div>' : '' ?>
                </small>

              </div>

            </div>

            <div class="row">

              <div class="col mb-3">
                <label for="productCategory">Product Category</label>
                <select class="browser-default custom-select" action="formProduct" id="productCategory" name="category_id">
                  <option selected>Choose product category</option>
                  <?php foreach ($data['categories'] as $category) : ?>
                    <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-success w-100" type="submit" value="Add Product">Add Product</button>
              <a class="btn btn-danger w-100" href="<?php echo URLROOT; ?>/products" role="button">Cancel</a>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>