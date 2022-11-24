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
              <div class="col mb-3">
                <label for="categoryName">Category Name</label>
                <input type="text" id="categoryName" class="form-control <?php echo (!empty($data['category_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['category_name']; ?>" name="category_name">
                <span class="invalid-feedback"><?php echo $data['category_name_err']; ?></span>
              </div>
            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-success w-100" type="submit" value="Add Category">Add Category</button>
              <a class="btn btn-danger w-100" href="<?php echo URLROOT; ?>/categories" role="button">Cancel</a>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>