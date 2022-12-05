<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">
      <?php success('order_message'); ?>
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fa-solid fa-motorcycle mr-2"></i> Assign Rider</h5>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table table-striped display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Rider First Name</th>
                  <th>Rider Last Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['riders'] as $rider) : ?>
                  <tr>
                    <td><?php echo $rider->rider_id; ?></td>
                    <td><?php echo $rider->rider_first_name; ?></td>
                    <td><?php echo $rider->rider_last_name; ?></td>
                    <td><a href="<?php echo URLROOT; ?>/orders/assignRiderOrder/<?php echo $data['id']; ?>/<?php echo $rider->rider_id; ?>" data-toggle="tooltip" data-placement="top" title="Assign Rider"><i class="fa-solid fa-check text-success"></i></a></td>
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