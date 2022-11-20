<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main>
  <div class="container-fluid">
    <div class="col-md-12">
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-list mr-2"></i> Add Category</h5>
      <div class="card">
        <div class="card-body">
          <form action="<?php echo URLROOT; ?>/categories/add" method="POST">
            <div class="row">
              <div class="col">
                <div class="md-form md-outline">
                  <input type="text" id="productName" class="form-control <?php echo (!empty($data['category_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['category_name']; ?>" name="category_name">
                  <label for="productName">Category Name</label>
                  <span class="invalid-feedback"><?php echo $data['category_name_err']; ?></span>
                </div>
              </div>
            </div>

            <div class="d-grid gap-2 d-md-block">
              <input class="btn btn-success btn-rounded" type="submit" value="Add Category"></input>
              <a href="<?php echo URLROOT; ?>/categories" class="btn btn-danger btn-rounded" role="button">Cancel</a>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>