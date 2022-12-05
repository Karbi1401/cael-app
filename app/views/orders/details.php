<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">
      <?php success('order_message'); ?>
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-shopping-cart mr-2"></i> Order Details</h5>

      <div class="row mb-md-4">
        <div class="col-md-6 h-100">
          <div class="card">
            <div class="card-body">
              <h5 class="dark-grey-text font-weight-bold mb-3"><i class="fa-solid fa-user mr-2"></i> User Information</h5>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 font-weight-bold">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $data['user_first_name'];  ?>&nbsp;<?php echo  $data['user_last_name']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 font-weight-bold">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $data['user_email']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 font-weight-bold">Contact</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $data['user_contact']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 font-weight-bold">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $data['user_address']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <p class="mb-0 font-weight-bold">City</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $data['user_city']; ?></p>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-md-6 h-100">
          <div class="card">
            <div class="card-body">
              <h5 class="dark-grey-text font-weight-bold mb-3"><i class="fa-solid fa-motorcycle mr-2"></i> Shipping Information</h5>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 font-weight-bold">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $data['user_first_name'];  ?>&nbsp;<?php echo  $data['shipping_last_name']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 font-weight-bold">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $data['shipping_email']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 font-weight-bold">Contact</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $data['shipping_contact']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 font-weight-bold">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $data['shipping_address']; ?></p>
                </div>
              </div>
              <hr>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <p class="mb-0 font-weight-bold">City</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $data['shipping_city']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="myTable" class="table table-striped display" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Product Price</th>
                      <th>Product Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['orderdetails'] as $orderdetail) : ?>
                      <tr>
                        <td><?php echo $orderdetail->product_id; ?></td>
                        <td><?php echo $orderdetail->product_name; ?></td>
                        <td>&#8369;<?php echo $orderdetail->product_price; ?></td>
                        <td><?php echo $orderdetail->product_quantity; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>