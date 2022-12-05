<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">
      <?php success('order_message'); ?>
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-shopping-cart mr-2"></i> Cancelled Orders</h5>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table table-striped display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Order Total</th>
                  <th>Payment Method</th>
                  <th>Order Schedule</th>
                  <th>Order Status</th>
                  <th>Payment Status</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($data['orders'] as $order) : ?>
                  <tr>
                    <td><?php echo $order->order_id; ?></td>
                    <td>&#8369;<?php echo $order->order_total; ?></td>
                    <td><?php echo $order->payment_method; ?></td>
                    <td><?php echo $order->order_schedule; ?></td>
                    <td>
                      <?php
                      if ($order->order_status == 0) {
                        echo '<span class="badge badge-warning">Pending</span>';
                      } elseif ($order->order_status == 1) {
                        echo '<span class="badge badge-default">On Delivery</span>';
                      } elseif ($order->order_status == 2) {
                        echo '<span class="badge badge-success">Completed</span>';
                      } elseif ($order->order_status == 3) {
                        echo '<span class="badge badge-danger">Cancelled</span>';
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      if ($order->payment_status == 0) {
                        echo '<span class="badge badge-warning">Pending</span>';
                      } elseif ($order->payment_status == 1) {
                        echo '<span class="badge badge-success">Completed</span>';
                      } elseif ($order->payment_status == 2) {
                        echo '<span class="badge badge-danger">Cancelled</span>';
                      }
                      ?>
                    </td>
                    <td>
                      <a href="<?php echo URLROOT; ?>/orders/details/<?php echo $order->order_id; ?>"><i class="fa-solid fa-info blue-text" data-toggle="tooltip" data-placement="top" title="View Order Details"></i>
                      </a>
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