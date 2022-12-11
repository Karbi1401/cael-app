<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main>
  <div class="container-fluid">
    <section class="mt-md-4 pt-md-2 mb-5 pb-4">
      <div class="row">
        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
          <div class="card card-cascade cascading-admin-card">
            <div class="admin-up">
              <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
              <div class="data">
                <p class="text-uppercase">Total Sales</p>
                <h4 class="font-weight-bold dark-grey-text">&#8369;<?php echo $data['total_sales']; ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
          <div class="card card-cascade cascading-admin-card">
            <div class="admin-up">
              <i class="fas fa-clock warning-color mr-3 z-depth-2"></i>
              <div class="data">
                <p class="text-uppercase">Pending Order</p>
                <h4 class="font-weight-bold dark-grey-text"><?php echo $data['total_pending_orders']; ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-md-0 mb-4">
          <div class="card card-cascade cascading-admin-card">
            <div class="admin-up">
              <i class="fas fa-check success-color lighten-1 mr-3 z-depth-2"></i>
              <div class="data">
                <p class="text-uppercase">Completed Order</p>
                <h4 class="font-weight-bold dark-grey-text"><?php echo $data['total_completed_orders']; ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-0">
          <div class="card card-cascade cascading-admin-card">
            <div class="admin-up">
              <i class="fas fa-ban red accent-2 mr-3 z-depth-2"></i>
              <div class="data">
                <p class="text-uppercase">Cancelled Order</p>
                <h4 class="font-weight-bold dark-grey-text"><?php echo $data['total_cancelled_orders'] ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
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
                      <?php if ($order->rider_id == 0) : ?>
                        <span class="badge badge-warning">Pending</span>
                      <?php else : ?>
                        <?php echo $order->rider_first_name ?>&nbsp;<?php echo $order->rider_last_name ?>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php
                      if ($order->order_status == 3) {
                        echo '<span class="badge badge-success">Completed</span>';
                      } elseif ($order->order_status == 4) {
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
    </section>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>