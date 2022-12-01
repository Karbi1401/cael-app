<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<!--Main layout-->
<main class="my-5 pb-5">
  <div class="container wow fadeIn">
    <h2 class="my-5 h2 text-center orange-text">Checkout form</h2>
    <div class="row">
      <div class="col-md-8 mb-4">
        <div class="card">
          <div class="card-body">
            <h4 class="h4-responsive mb-3 orange-text">Shipping Information</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="exampleForm2">First Name</label>
                <input type="text" id="exampleForm2" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label for="exampleForm2">Last Name</label>
                <input type="text" id="exampleForm2" class="form-control">
              </div>

              <div class="col-md-12 mb-3">
                <label for="exampleForm2">Email</label>
                <input type="email" id="exampleForm2" class="form-control">
              </div>

              <div class="col-md-12 mb-3">
                <label for="exampleForm2">Contact Number</label>
                <input type="text" id="exampleForm2" class="form-control">
              </div>

              <div class="col-md-12 mb-3">
                <label for="exampleForm2">Address</label>
                <input type="text" id="exampleForm2" class="form-control">
              </div>

              <div class="col-md-12 mb-3">
                <label for="exampleForm2">City</label>
                <input type="text" id="exampleForm2" class="form-control">
              </div>

              <div class="col-md-12 pt-1 mb-3">
                <button class="btn btn-orange btn-block" type="submit" value="Signup">Sign up</button>
              </div>

            </div>

          </div>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-md-4 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="orange-text">Your cart</span>
          <span class="badge badge-danger badge-pill">3</span>
        </h4>

        <ul class="list-group mb-3 z-depth-1">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Product name</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$12</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Second product</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$8</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Third item</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">-$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>
      </div>
    </div>
  </div>
</main>


<?php require APPROOT . '/views/inc/footer.php'; ?>