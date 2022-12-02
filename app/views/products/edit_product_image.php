<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-6 offset-md-3">
      <?php success('product_message'); ?>
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-box mr-2"></i> Edit Product Image</h5>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 mb-3">
              <div class="text-center">
                <img src="<?php echo URLROOT; ?>/img/<?php echo $data['product']; ?>" class="rounded-circle z-depth-1 img-fluid" width="150px">
              </div>
            </div>

            <div class="col-md-12 mb-3">

              <form action="<?php echo URLROOT; ?>/products/editProductImage/<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">

                <div class="input-group p-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>

                <small>
                  <?php echo isset($data['product_image_err']) ? '<div class="text-danger">' . $data['product_image_err'] . '</div>' : '' ?>
                </small>

                <div class="d-flex gap-2">
                  <button class="btn btn-success w-100" type="submit" value="Edit Product Image">Edit Product Image</button>
                  <a class="btn btn-danger w-100" href="<?php echo URLROOT; ?>/products" role="button">Cancel</a>
                </div>

              </form>

            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>