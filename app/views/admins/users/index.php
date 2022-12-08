<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">
      <?php success('rider_message'); ?>
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-user mr-2"></i> Users</h5>
      <div class="card">
        <div class="card-body">
          <a href="<?php echo URLROOT; ?>/admins/addUser" class="btn btn-primary btn-rounded btn-sm mb-3" role="button"><i class="fas fa-plus mr-2"></i> Add User</a>

          <div class="table-responsive">

            <table id="myTable" class="table table-striped display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['users'] as $user) : ?>
                  <tr>
                    <td><?php echo $user->user_id; ?></td>
                    <td>
                      <img class='img-fluid' src='<?php echo URLROOT; ?>/public/img/<?php echo $user->user_image; ?>' alt='image' width='100'>
                    </td>
                    <td><?php echo $user->user_first_name; ?></td>
                    <td><?php echo $user->user_last_name; ?></td>
                    <td><?php echo $user->user_username; ?></td>
                    <td>
                      <div class="d-flex justify-content-between">
                        <a href="<?php echo URLROOT; ?>/orders/details/<?php echo $user->user_id; ?>"><i class="fa-solid fa-info blue-text" data-toggle="tooltip" data-placement="top" title="View User Contact Information"></i>
                        </a>
                        <a href="<?php echo URLROOT; ?>/products/editProductImage/<?php echo $user->user_id; ?>"><i class="fa-solid fa-image teal-text" data-toggle="tooltip" data-placement="top" title="Update User Image"></i>
                        </a>
                        <a href="<?php echo URLROOT; ?>/products/edit/<?php echo $user->user_id; ?>"><i class="fa-solid fa-pen-to-square teal-text" data-toggle="tooltip" data-placement="top" title="Update User Information"></i>
                        </a>
                        <a onclick="deleteProduct()" href="<?php echo URLROOT; ?>/products/delete/<?php echo $user->user_id; ?>"><i class="fa-solid fa-trash red-text" data-toggle="tooltip" data-placement="top" title="Delete User Information"></i></a>
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