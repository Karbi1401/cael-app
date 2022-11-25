<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">
      <?php success('category_message'); ?>
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-list mr-2"></i> Categories</h5>
      <div class="card">
        <div class="card-body">
          <a href="<?php echo URLROOT; ?>/categories/add" class="btn btn-primary btn-rounded btn-sm mb-3" role="button"><i class="fas fa-plus mr-2"></i> Add Category</a>
          <div class="table-responsive">
            <table id="myTable" class="table table-striped display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category Name</th>
                  <th>Created At</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['categories'] as $category) : ?>
                  <tr>
                    <td><?php echo $category->category_id; ?></td>
                    <td><?php echo $category->category_name; ?></td>
                    <td><?php echo $category->categoryCreated; ?></td>
                    <td>
                      <?php if ($category->category_status == 1) : ?>
                        <a class="btn btn-success btn-rounded btn-sm" href="<?php echo URLROOT; ?>/categories/changeCategoryStatusInactive/<?php echo $category->category_id; ?>" role="button">
                          Active
                        </a>
                      <?php elseif ($category->category_status == 0) : ?>
                        <a class="btn btn-danger btn-rounded btn-sm" href="<?php echo URLROOT; ?>/categories/changeCategoryStatusActive/<?php echo $category->category_id; ?>" role="button">
                          Inactive
                        </a>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="d-flex justify-content-around">
                        <a href="<?php echo URLROOT; ?>/categories/edit/<?php echo $category->category_id; ?>"><i class="fa-solid fa-pen-to-square teal-text" data-toggle="tooltip" data-placement="top" title="Update Category"></i>
                        </a>
                        <a onclick="deleteCategory()" href="<?php echo URLROOT; ?>/categories/delete/<?php echo $category->category_id; ?>"><i class="fa-solid fa-trash red-text" data-toggle="tooltip" data-placement="top" title="Delete Category"></i></a>
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