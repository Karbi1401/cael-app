<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main>
  <div class="container-fluid">
    <div class="col-md-12">

      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-box"></i> Add Products</h5>
      <div class="card">
        <div class="card-body">
          <form action="<?php echo URLROOT; ?>/products/add" method="POST" id="formProduct" enctype="multipart/form-data">

            <div class="row">

              <div class="col-md-8">
                <div class="md-form md-outline">
                  <input type="text" id="productName" class="form-control <?php echo (!empty($data['product_name_err'])) ? 'is-invalid' : ''; ?>" name="product_name" value="<?php echo $data['product_name']; ?>">
                  <label for="productName" class="form-label">Product Name</label>
                  <span class="invalid-feedback"><?php echo $data['product_name_err']; ?></span>
                </div>
              </div>

              <div class="col-md-4">
                <div class="md-form md-outline">
                  <input type="text" id="productPrice" class="form-control <?php echo (!empty($data['product_price_err'])) ? 'is-invalid' : ''; ?>" name="product_price" value="<?php echo $data['product_price']; ?>">
                  <label for="productPrice" class="form-label">Product Price</label>
                  <span class="invalid-feedback"><?php echo $data['product_price_err']; ?></span>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col">
                <div class="md-form md-outline">
                  <textarea type="text" id="productDescription" class="md-textarea form-control <?php echo (!empty($data['product_description_err'])) ? 'is-invalid' : ''; ?>" rows="3" name="product_description"><?php echo $data['product_description']; ?></textarea>
                  <label for="productDescription" class="form-label">Product Description</label>
                  <span class="invalid-feedback"><?php echo $data['product_description_err']; ?></span>
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col">
                <div class="md-form">
                  <div class="file-field">
                    <div class="btn btn-primary btn-sm float-left">
                      <span>Choose file</span>
                      <input type="file" name="image" class="<?php echo isset($data['product_image_err']) ? 'is-invalid' : '' ?>">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Product Image" id="file-path">
                    </div>
                  </div>
                </div>
                <small>
                  <?php echo isset($data['product_image_err']) ? '<div class="text-danger">' . $data['product_image_err'] . '</div>' : '' ?>
                </small>
              </div>

            </div>

            <div class="row">

              <div class="col">
                <select class="mdb-select colorful-select dropdown-primary md-form" action="formProduct" name="category_id">
                  <?php foreach ($data['categories'] as $category) : ?>
                    <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
                  <?php endforeach; ?>
                </select>
                <label class="mdb-main-label">Product Category</label>
              </div>

            </div>

            <div class="d-grid gap-2 d-md-block">
              <input class="btn btn-success btn-rounded" type="submit" value="Add Product"></input>
              <a href="<?php echo URLROOT; ?>/products" class="btn btn-danger btn-rounded" role="button">Cancel</a>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>