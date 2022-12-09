<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">
      <?php success('rider_message'); ?>
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-user mr-2"></i> Contact Information</h5>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">

            <table id="myTable" class="table table-striped display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>City</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $data['users']->user_first_name; ?></td>
                  <td><?php echo $data['users']->user_last_name; ?></td>
                  <td><?php echo $data['users']->user_email; ?></td>
                  <td><?php echo $data['users']->user_contact; ?></td>
                  <td><?php echo $data['users']->user_address; ?></td>
                  <td><?php echo $data['users']->user_city; ?></td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>