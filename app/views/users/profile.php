<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<main>

  <div class="container py-5">
    <?php success('user_message'); ?>
    <div class="row mb-md-5">
      <div class="col-lg-4">
        <div class="card h-100 mb-4">
          <div class="card-body text-center">
            <img src="<?php echo URLROOT; ?>/img/<?php echo $data['users']->user_image; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <a href=""></a>
            <h5 class="my-3"><?php echo $data['users']->user_first_name;  ?>&nbsp;<?php echo  $data['users']->user_last_name; ?></h5>
            <p class="text-muted mb-1">User ID: <?php echo $data['users']->user_id; ?></p>
            <p class="text-muted mb-1">Username: <?php echo $data['users']->user_username; ?></p>
            <a href="<?php echo URLROOT; ?>/users/avatar/<?php echo $data['users']->user_id; ?>" class="btn btn-orange btn-sm mt-3" role="button">
              <i class="fa-solid fa-pen-to-square mr-2"></i>Edit
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card h-100 mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 orange-text font-weight-bold">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['users']->user_first_name;  ?>&nbsp;<?php echo  $data['users']->user_last_name; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 orange-text font-weight-bold">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['users']->user_email; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 orange-text font-weight-bold">Contact</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['users']->user_contact; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0 orange-text font-weight-bold">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['users']->user_address; ?></p>
              </div>
            </div>
            <hr>
            <div class="row mb-3">
              <div class="col-sm-3">
                <p class="mb-0 orange-text font-weight-bold">City</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['users']->user_city; ?></p>
              </div>
            </div>
            <a href="<?php echo URLROOT; ?>/users/edit/<?php echo $data['users']->user_id; ?>" class="btn btn-orange btn-sm float-right" role="button">
              <i class="fa-solid fa-pen-to-square mr-2 text-white"></i>Edit
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="card mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table id="myTable" class="table table-striped display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Order Scheduled</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Total</th>
                    <th>Order Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['orders'] as $order) : ?>
                    <tr>
                      <td><?php echo $order->order_id; ?></td>
                      <td><?php echo $order->order_schedule; ?></td>
                      <td><?php echo $order->product_name; ?></td>
                      <td><?php echo $order->product_price; ?></td>
                      <td><?php echo $order->product_quantity; ?></td>
                      <td><?php echo $order->product_price * $order->product_quantity; ?></td>
                      <td><?php echo $order->order_status; ?></td>
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

</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>