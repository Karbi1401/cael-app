<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">
      <?php success('rider_message'); ?>
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-motorcycle mr-2"></i> Riders</h5>
      <div class="card">
        <div class="card-body">
          <a href="<?php echo URLROOT; ?>/riders/add" class="btn btn-primary btn-rounded btn-sm mb-3" role="button"><i class="fas fa-plus mr-2"></i> Add Rider</a>

          <div class="table-responsive">

            <table id="myTable" class="table table-striped display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['riders'] as $rider) : ?>
                  <tr>
                    <td><?php echo $rider->rider_id; ?></td>
                    <td>
                      <img class='img-fluid' src='<?php echo URLROOT; ?>/public/img/<?php echo $rider->rider_image; ?>' alt='image' width='100'>
                    </td>
                    <td><?php echo $rider->rider_first_name; ?></td>
                    <td><?php echo $rider->rider_last_name; ?></td>
                    <td><?php echo $rider->rider_username; ?></td>
                    <td><?php echo $rider->rider_email; ?></td>
                    <td><?php echo $rider->rider_contact; ?></td>
                    <td><?php echo $rider->rider_address; ?></td>
                    <td><?php echo $rider->rider_city; ?></td>
                    <td>
                      <div class="d-flex justify-content-between">
                        <a href="<?php echo URLROOT; ?>/riders/editRiderImage/<?php echo $rider->rider_id; ?>"><i class="fa-solid fa-image teal-text" data-toggle="tooltip" data-placement="top" title="Update Rider Image"></i>
                        </a>
                        <a href="<?php echo URLROOT; ?>/riders/edit/<?php echo $rider->rider_id; ?>"><i class="fa-solid fa-pen-to-square teal-text" data-toggle="tooltip" data-placement="top" title="Update Rider Information"></i>
                        </a>
                        <a onclick="deleteRider()" href="<?php echo URLROOT; ?>/riders/deleteRider/<?php echo $rider->rider_id; ?>"><i class="fa-solid fa-trash red-text" data-toggle="tooltip" data-placement="top" title="Delete Rider Information"></i></a>
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