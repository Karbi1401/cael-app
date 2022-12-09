<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">
      <?php success('order_message'); ?>
      <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-shopping-cart mr-2"></i> Pending Orders</h5>
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
                  <th>Rider Assigned</th>
                  <th>Payment Status</th>
                  <th>Order Status</th>
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
                      <?php if ($order->rider_id == 0) : ?>
                        <span class="badge badge-warning">Pending</span>
                      <?php endif; ?>
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
                      <?php if ($order->order_status == 0) : ?>
                        <a class="btn btn-warning btn-rounded btn-sm" href="<?php echo URLROOT; ?>/orders/changeOrderStatusInKitchen/<?php echo $order->order_id; ?>" role="button">
                          Placed
                        </a>
                      <?php elseif ($order->order_status == 1) : ?>
                        <a class="btn btn-secondary btn-rounded btn-sm" href="<?php echo URLROOT; ?>/orders/changeOrderStatusPlaced/<?php echo $order->order_id; ?>" role="button">
                          In Kitchen
                        </a>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="d-flex justify-content-around">
                        <a href="<?php echo URLROOT; ?>/orders/details/<?php echo $order->order_id; ?>"><i class="fa-solid fa-info blue-text" data-toggle="tooltip" data-placement="top" title="View Order Details"></i>
                        </a>
                        <a href="<?php echo URLROOT; ?>/orders/assignRider/<?php echo $order->order_id; ?>"><i class="fa-solid fa-motorcycle teal-text" data-toggle="tooltip" data-placement="top" title="Assign Rider"></i>
                        </a>
                        <a onclick="cancelOrder()" href="<?php echo URLROOT; ?>/orders/cancelOrder/<?php echo $order->order_id; ?>/<?php echo $order->payment_id; ?>"><i class="fa-solid fa-x red-text" data-toggle="tooltip" data-placement="top" title="Cancel Order"></i></a>
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