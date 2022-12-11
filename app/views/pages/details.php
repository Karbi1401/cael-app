<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<main>
  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <section id="productDetails" class="pb-5">
      <div class="card mt-5 hoverable">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-6 p-5">

            <img src="<?php echo URLROOT; ?>/img/<?php echo $data['products']->product_image; ?>" class="mx-lg-auto img-fluid rounded" alt="Bootstrap Themes" width="700" height="500" loading="lazy">

          </div>

          <div class="col-lg-5 mr-3 text-center text-md-left">
            <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text ml-xl-0 ml-4">
              <strong><?php echo $data['products']->product_name; ?></strong>
            </h2>

            <h3 class="h3-responsive text-center text-md-left ml-xl-0 ml-4">
              <span class="orange-text font-weight-bold">
                <strong>&#8369;<?php echo $data['products']->product_price; ?></strong>
              </span>
            </h3>

            <p class="ml-xl-0 ml-4"><?php echo $data['products']->product_description; ?></p>

            <section>
              <div class="row">
                <div class="col-md-12 text-center text-md-left text-md-right">
                  <a href="<?php echo URLROOT; ?>/carts/add/<?php echo $data['products']->product_id; ?>/<?php echo $data['products']->product_price; ?>" class="btn btn-orange btn-rounded" role="button">
                    <i class="fa-solid fa-cart-plus mr-2"></i>
                    Add to cart
                  </a>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>