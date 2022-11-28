<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<!-- Main Layout -->
<main>
  <div class="container">
    <section class="section my-5 pb-5">
      <?php success('cart_message'); ?>
      <div class="card card-ecommerce">
        <div class="card-body">
          <?php if ($data['carts']) : ?>
            <div class="table-responsive">
              <table class="table product-table table-cart-v-2">
                <thead class="warning-color-dark text-white lighten-5">
                  <tr>
                    <th></th>
                    <th class="font-weight-bold">
                      <strong>Product</strong>
                    </th>
                    <th class="font-weight-bold">
                      <strong>Category</strong>
                    </th>
                    <th></th>
                    <th class="font-weight-bold">
                      <strong>Price</strong>
                    </th>
                    <th class="font-weight-bold">
                      <strong>QTY</strong>
                    </th>
                    <th class="font-weight-bold">
                      <strong>Amount</strong>
                    </th>
                    <th></th>
                  </tr>
                </thead>
                <!-- Table head -->
                <!-- Table body -->
                <tbody>
                  <?php
                  $total = 0;
                  $qty = 0;
                  foreach ($data['carts'] as $cart) :
                  ?>
                    <tr>
                      <th scope="row">
                        <img src="<?php echo URLROOT; ?>/img/<?php echo $cart->product_image; ?>" alt="" class="img-fluid z-depth-0">
                      </th>
                      <td>
                        <h5 class="m-auto">
                          <strong><?php echo $cart->product_name; ?></strong>
                        </h5>
                      </td>
                      <td><?php echo $cart->category_name; ?></td>
                      <td></td>
                      <td>&#8369;<?php echo number_format($cart->product_price, 2, '.', '');  ?></td>
                      <td class="text-center text-md-left">
                        <form action="<?php echo URLROOT; ?>/carts/updateQuantity/<?php echo $cart->product_id; ?>" method="POST">
                          <div class="def-number-input number-input safari_only">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                            <input class="quantity" min="0" name="quantity" value="<?php echo $cart->cart_quantity; ?>" type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                          </div>
                        </form>
                      </td>
                      <td class="font-weight-bold">
                        <strong>&#8369;<?php echo number_format($cart->cart_quantity * $cart->cart_price, 2, '.', ''); ?></strong>
                      </td>
                      <td>
                        <a onclick="deleteItem()" href="<?php echo URLROOT; ?>/carts/delete/<?php echo $cart->cart_id; ?>" class="btn btn-sm btn-danger">
                          <i class="fa-solid fa-trash" data-toggle="tooltip" data-placement="top" title="Remove Item From Cart"></i>
                        </a>
                      </td>
                    </tr>
                  <?php
                    $total = $total + ($cart->cart_quantity * $cart->cart_price);
                    $qty = $qty + ($cart->cart_quantity);
                  endforeach;
                  ?>
                  <tr>
                    <td colspan="3"></td>
                    <td>
                      <h4 class="mt-2">
                        <strong>Total</strong>
                      </h4>
                    </td>

                    <td class="text-right">
                      <h4 class="mt-2">
                        <strong>&#8369;<?php echo number_format($total, 2, '.', ''); ?></strong>
                      </h4>
                    </td>

                    <td colspan="3" class="text-right">
                      <button type="button" class="btn btn-orange btn-rounded">
                        Proceed Checkout<i class="fas fa-step-forward ml-2"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          <?php else : ?>
            <div class="d-flex flex-column align-items-center justify-content-center text-center vh-100">
              <h1 class="h1-responsive fw-bold orange-text"><i class="fa-solid fa-cart-shopping mr-2"></i>Cart</h1>
              <h2 class="h2-responsive fw-bold">There are no items in the cart</h2>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>