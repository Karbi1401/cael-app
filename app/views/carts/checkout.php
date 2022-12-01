<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<?php
$total = 0;
$qty = 0;
?>

<main class="my-5 pb-5">
  <div class="container wow fadeIn">
    <h2 class="my-5 h2 text-center orange-text">Checkout form</h2>
    <div class="row">

      <div class="col-md-4 mb-3 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="orange-text">Your cart</span>
          <span class="badge badge-danger badge-pill"><?php echo $_SESSION['user_cart']; ?></span>
        </h4>

        <ul class="list-group mb-3 z-depth-1">
          <?php foreach ($data['carts'] as $cart) : ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $cart->product_name; ?></h6>
                <small class="text-muted">Quantity: <?php echo $cart->cart_quantity; ?></small>
              </div>
              <span class="text-muted">&#8369;<?php echo $cart->product_price; ?></span>
            </li>
          <?php
            $total = $total + ($cart->cart_quantity * $cart->cart_price);
            $qty = $qty + ($cart->cart_quantity);
          endforeach;
          ?>
          <li class="list-group-item d-flex justify-content-between font-weight-bold">
            <span>Total Quantity:</span>
            <strong class="font-weight-bold"><?php echo $qty; ?></strong>
          </li>
          <li class="list-group-item d-flex justify-content-between font-weight-bold">
            <span>Total (Peso):</span>
            <strong class="font-weight-bold">&#8369;<?php echo number_format($total, 2, '.', ''); ?></strong>
          </li>
        </ul>
      </div>

      <div class="col-md-8 mb-4">
        <h4 class="mb-3 orange-text">Shipping Information</h4>
        <div class="card">
          <div class="card-body">
            <form action="<?php echo URLROOT; ?>/carts/checkout" method="POST">
              <div class="row">

                <div class="col-md-6 mb-3">
                  <label for="first_name">First Name</label>
                  <input type="text" id="first_name" class="form-control <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['first_name']; ?>" name="first_name">
                  <span class="invalid-feedback"><?php echo $data['first_name_err']; ?></span>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="last_name">Last Name</label>
                  <input type="text" id="last_name" class="form-control <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['last_name']; ?>" name="last_name">
                  <span class="invalid-feedback"><?php echo $data['last_name_err']; ?></span>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="email">Email</label>
                  <input type="email" id="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" name="email">
                  <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="contact_number">Contact Number</label>
                  <input type="text" id="contact_number" class="form-control <?php echo (!empty($data['contact_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['contact_number']; ?>" name="contact_number">
                  <span class="invalid-feedback"><?php echo $data['contact_number_err']; ?></span>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="address">Address</label>
                  <input type="text" id="address" class="form-control <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>" name="address">
                  <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
                </div>

                <div class="col-md-12 mb-5">
                  <label for="city">City</label>
                  <input type="text" id="city" class="form-control <?php echo (!empty($data['city_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['city']; ?>" name="city">
                  <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
                </div>

                <div class="col-md-12 mb-5">
                  <label for="payment_method">Payment method</label>
                  <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" id="payment_method" name="payment_method" value="cash">
                    <label class="custom-control-label" for="payment_method">Cash on delivery</label>
                  </div>
                  <span class="invalid-feedback"><?php echo $data['payment_method_err']; ?></span>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="order_schedule">Order Scheduled</label>
                  <input type="datetime-local" class="form-control" id="order_schedule" name="order_scheduled">
                  <span class="invalid-feedback"><?php echo $data['order_schedule_err']; ?></span>
                </div>

                <div class="form-group">
                  <input type="hidden" name="qty" value='<?php echo $qty ?>'>
                  <input type="hidden" name="total" value='<?php echo $total ?>'>
                </div>

                <div class="col-md-12 pt-1 mb-3">
                  <button class="btn btn-orange btn-block" type="submit" value="Signup"><i class="fa-solid fa-cart-shopping mr-2"></i>Confirm Order</button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>


    </div>
  </div>
</main>


<?php require APPROOT . '/views/inc/footer.php'; ?>