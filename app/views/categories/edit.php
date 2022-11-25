<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-list mr-2"></i> Edit Category</h5>
      <div class="card">
        <div class="card-body">
          <form action="<?php echo URLROOT; ?>/categories/edit/<?php echo $data['id']; ?>" method="POST">
            <div class="row">
              <div class="col mb-3">
                <label for="categoryName">Category Name</label>
                <input type="text" id="categoryName" class="form-control <?php echo (!empty($data['category_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['category_name']; ?>" name="category_name">
                <span class="invalid-feedback"><?php echo $data['category_name_err']; ?></span>
              </div>
            </div>

            <div class="d-flex gap-2">
              <button class="btn btn-success w-100" type="submit" value="Edit Category">Add Category</button>
              <a class="btn btn-danger w-100" href="<?php echo URLROOT; ?>/categories" role="button">Cancel</a>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>