<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<main>
  <section class="streak streak-photo streak-sm" style="
          background-image: url('<?php echo URLROOT; ?>/img/foo-visuals-5AMSZcgN_cM-unsplash.jpg');
        ">
    <div class="flex-center mask rgba-black-strong">
      <div class="text-center white-text">
        <h1 class="display-4">Menu</h1>
      </div>
    </div>
  </section>

  <section class="container py-3 my-5">
    <?php success('cart_message'); ?>
    <div class="row">
      <div class="col-lg-3">
        <div class="row">
          <div class="col-md-6 col-lg-12 mb-5">
            <h5 class="font-weight-bold span-orange">Categories</h5>
            <hr>
            <?php foreach ($data['categories'] as $category) : ?>
              <p>
                <a href="<?php echo URLROOT; ?>/pages/category/<?php echo $category->category_id; ?>" class="text-dark"><?php echo $category->category_name; ?></a>
              </p>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="col-lg-9">
        <section>
          <div class="row mb-3">
            <?php foreach ($data['products'] as $product) : ?>
              <div class="col-lg-4 col-md-12 mb-4">
                <div class="card card-ecommerce hoverable">
                  <a href="<?php echo URLROOT; ?>/pages/details/<?php echo $product->product_id; ?>">
                    <img src="<?php echo URLROOT; ?>/img/<?php echo $product->product_image; ?>" class="img-fluid" alt="">
                  </a>
                  <div class="card-body">
                    <h5 class="card-title mb-1 dark-grey-text"><strong><?php echo $product->product_name; ?></strong></h5>
                    <div class="card-footer pb-0">
                      <div class="row mb-0">
                        <span class="float-left"><strong>&#8369;<?php echo $product->product_price; ?></strong></span>
                        <span class="float-right">
                          <a href="<?php echo URLROOT; ?>/carts/add/<?php echo $product->product_id; ?>/<?php echo $product->product_price; ?>" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="fa-solid fa-cart-shopping ml-3 span-orange"></i></a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      </div>
    </div>
  </section>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>