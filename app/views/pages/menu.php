<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<br><br><br>

<style>
    .h1-responsive{
        font-size: 70px;
    }


</style>

<section>

<div class = "hero"
  style="background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed!important;">
  <!-- Caption --->
  <div class="full-bg-img  flex-center white-text rgba-stylish-strong">

    <ul class="animated fadeIn col-md-12 list-unstyled">

      <li>
        <br>
        <h1 class="h1-responsive font-weight-bold mt-5 pt-5 ">MENU</h1>
      </li>


      <li class="pb-5">
        <br><br><br>
      </li>

    </ul>

  </div>
  <!-- Caption --->

</div>
<br><br>

<section class = "container">
<div class="row pt-4">

<!-- Sidebar -->
<div class="col-lg-3">

  <div class="">

    <!-- Grid row -->
    <div class="row">


      <!-- Filter by category -->
      <div class="col-md-6 col-lg-12 mb-5">

        <h5 class="font-weight-bold dark-grey-text"><strong>Category</strong></h3>
        <br>
          <div class="divider"></div>

          <!-- Radio group -->
          <div class="form-group">

            <input class="form-check-input" name="group100" type="radio" id="radio100">

            <label for="radio100" class="form-check-label dark-grey-text">All</label>

          </div>

          <div class="form-group">

            <input class="form-check-input" name="group100" type="radio" id="radio102" checked>

            <label for="radio102" class="form-check-label dark-grey-text">Beef</label>

          </div>

          <div class="form-group">

            <input class="form-check-input" name="group100" type="radio" id="radio103">

            <label for="radio103" class="form-check-label dark-grey-text">Pork</label>

          </div>

          <!-- Radio group -->
      </div>

      <!-- Filter by category -->
    </div>
    <!-- Grid row -->

    <!-- Grid row -->
    <div class="row">


      <!-- Filter by price -->

      <!-- Filter by rating -->
      <div class="col-md-6 col-lg-12 mb-5">

        <h5 class="font-weight-bold dark-grey-text"><strong>Rating</strong></h3>

          <div class="divider"></div>

          <div class="row ml-1">

            <!-- Rating -->
            <ul class="orange-text rating mb-0">
              <BR>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li>

                <p class="ml-3 dark-grey-text"><a>4 and more</a></p>

              </li>

            </ul>

          </div>

          <div class="row ml-1">

            <!-- Rating -->
            <ul class="orange-text rating mb-0">

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star grey-text"></i></li>

              <li>

                <p class="ml-3 dark-grey-text"><a>3 - 3,99</a></p>

              </li>

            </ul>

          </div>

          <div class="row ml-1">

            <!-- Rating -->
            <ul class="orange-text rating">

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star grey-text"></i></li>

              <li><i class="fas fa-star grey-text"></i></li>

              <li>

                <p class="ml-3 dark-grey-text"><a>3.00 and less</a></p>

              </li>

            </ul>

          </div>

      </div>
      <!-- Filter by rating -->

    </div>
    <!-- Grid row -->

  </div>

</div>
<!-- Sidebar -->

<!-- Content -->
<div class="col-lg-9">

  <!-- Filter Area -->
  <div class="row">

    <div class="col-md-4 mt-3">

      <!-- Sort by -->
      <select class="mdb-select grey-text md-form" multiple>

        <option value="" disabled selected>Choose your option</option>

        <option value="1">Option 1</option>

        <option value="2">Option 2</option>

        <option value="3">Option 3</option>

      </select>


      <!-- Sort by -->
    </div>

    <div class="col-md-8 text-right">

      <!-- View Switcher -->

      <!-- View Switcher -->

    </div>

  </div>
  <!-- Filter Area -->

  <!-- Products Grid -->
  <section class="section pt-4">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-lg-4 col-md-12 mb-4">

        <!-- Card -->
        <div class="card card-ecommerce">

          <!-- Card image -->
          <div class="view overlay">

            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/1.jpg" class="img-fluid"
              alt="">

            <a>

              <div class="mask rgba-white-slight"></div>

            </a>

          </div>
          <!-- Card image -->

          <!-- Card content -->
          <div class="card-body">

            <!-- Category & Title -->
            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">iPad</a></strong></h5><span
              class="badge badge-danger mb-2">bestseller</span>

            <!-- Rating -->
            <ul class="orange-text rating">

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

            </ul>

            <!-- Card footer -->
            <div class="card-footer pb-0">

              <div class="row mb-0">

                <span class="float-left"><strong>P1000</strong></span>

                <span class="float-right">

                  <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                      class="fas fa-shopping-cart ml-3"></i></a>

                </span>

              </div>

            </div>

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-4 col-md-6 mb-4">

        <!-- Card -->
        <div class="card card-ecommerce">

          <!-- Card image -->
          <div class="view overlay">

            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/15.jpg" class="img-fluid"
              alt="">

            <a>

              <div class="mask rgba-white-slight"></div>

            </a>

          </div>
          <!-- Card image -->

          <!-- Card content -->
          <div class="card-body">

            <!-- Category & Title -->
            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">Sony T56-v</a></strong></h5>

            <span class="badge badge-info mb-2">new</span>

            <!-- Rating -->
            <ul class="orange-text rating">

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

            </ul>

            <!-- Card footer -->
            <div class="card-footer pb-0">

              <div class="row mb-0">

                <span class="float-left"><strong>1439$</strong></span>

                <span class="float-right">

                  <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                      class="fas fa-shopping-cart ml-3"></i></a>

                </span>

              </div>

            </div>

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-4 col-md-6 mb-4">

        <!-- Card -->
        <div class="card card-ecommerce">

          <!-- Card image -->
          <div class="view overlay">

            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/6.jpg" class="img-fluid"
              alt="">

            <a>

              <div class="mask rgba-white-slight"></div>

            </a>

          </div>
          <!-- Card image -->

          <!-- Card content -->
          <div class="card-body">

            <!-- Category & Title -->
            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">Headphones</a></strong></h5>

            <span class="badge badge-danger mb-2">bestseller</span>

            <!-- Rating -->
            <!-- Rating -->
            <ul class="orange-text rating">

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star grey-text"></i></li>

            </ul>

            <!-- Card footer -->
            <div class="card-footer pb-0">

              <div class="row mb-0">

                <span class="float-left"><strong>1439$</strong></span>

                <span class="float-right">

                  <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                      class="fas fa-shopping-cart ml-3"></i></a>

                </span>

              </div>

            </div>

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->



    <!-- Grid row -->
    <div class="row mb-3">

      <!-- Grid column -->
      <div class="col-lg-4 col-md-12 mb-4">

        <!-- Card -->
        <div class="card card-ecommerce">

          <!-- Card image -->
          <div class="view overlay">

            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/8.jpg" class="img-fluid"
              alt="">

            <a>

              <div class="mask rgba-white-slight"></div>

            </a>

          </div>
          <!-- Card image -->

          <!-- Card content -->
          <div class="card-body">

            <!-- Category & Title -->
            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">Samsung V54</a></strong></h5>

            <span class="badge grey mb-2">best rated</span>

            <!-- Rating -->
            <!-- Rating -->
            <ul class="orange-text rating">

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

            </ul>

            <!-- Card footer -->
            <div class="card-footer pb-0">

              <div class="row mb-0">

                <span class="float-left"><strong>1439$</strong></span>

                <span class="float-right">

                  <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                      class="fas fa-shopping-cart ml-3"></i></a>

                </span>

              </div>

            </div>

          </div>
          <!-- Card content -->

        </div>

        <!-- Card -->
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-4 col-md-6 mb-4">

        <!-- Card -->
        <div class="card card-ecommerce">

          <!-- Card image -->
          <div class="view overlay">

            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/7.jpg" class="img-fluid"
              alt="">

            <a>

              <div class="mask rgba-white-slight"></div>

            </a>

          </div>
          <!-- Card image -->

          <!-- Card content -->
          <div class="card-body">

            <!-- Category & Title -->
            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">Dell 786i</a></strong></h5><span
              class="badge badge-info mb-2">new</span>

            <!-- Rating -->
            <ul class="orange-text rating">

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star grey-text"></i></li>

            </ul>

            <!-- Card footer -->
            <div class="card-footer pb-0">

              <div class="row mb-0">

                <span class="float-left"><strong>1439$</strong></span>

                <span class="float-right">

                  <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                      class="fas fa-shopping-cart ml-3"></i></a>

                </span>

              </div>

            </div>

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-lg-4 col-md-6 mb-4">

        <!-- Card -->
        <div class="card card-ecommerce">

          <!-- Card image -->
          <div class="view overlay">

            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/9.jpg" class="img-fluid"
              alt="">

            <a>

              <div class="mask rgba-white-slight"></div>

            </a>

          </div>
          <!-- Card image -->

          <!-- Card content -->
          <div class="card-body">

            <!-- Category & Title -->
            <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text">Canon 675-D</a></strong></h5>

            <span class="badge badge-info mb-2">new</span>

            <!-- Rating -->
            <ul class="orange-text rating">

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

              <li><i class="fas fa-star"></i></li>

            </ul>

            <!-- Card footer -->
            <div class="card-footer pb-0">

              <div class="row mb-0">

                <span class="float-left"><strong>1439$</strong></span>

                <span class="float-right">

                  <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i
                      class="fas fa-shopping-cart ml-3"></i></a>

                </span>

              </div>

            </div>

          </div>
          <!-- Card content -->

        </div>
        <!-- Card -->

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

    <!-- Grid row -->
    <div class="row justify-content-center mb-4">

      <!-- Pagination -->
      <nav class="mb-4">

        <ul class="pagination pagination-circle pg-blue mb-0">

          <!-- First -->
          <li class="page-item disabled clearfix d-none d-md-block"><a
              class="page-link waves-effect waves-effect">First</a></li>

          <!-- Arrow left -->
          <li class="page-item disabled">

            <a class="page-link waves-effect waves-effect" aria-label="Previous">

              <span aria-hidden="true">«</span>

              <span class="sr-only">Previous</span>

            </a>

          </li>

          <!-- Numbers -->
          <li class="page-item active"><a class="page-link waves-effect waves-effect">1</a></li>

          <li class="page-item"><a class="page-link waves-effect waves-effect">2</a></li>

          <li class="page-item"><a class="page-link waves-effect waves-effect">3</a></li>

          <li class="page-item"><a class="page-link waves-effect waves-effect">4</a></li>

          <li class="page-item"><a class="page-link waves-effect waves-effect">5</a></li>

          <!-- Arrow right -->
          <li class="page-item">

            <a class="page-link waves-effect waves-effect" aria-label="Next">

              <span aria-hidden="true">»</span>

              <span class="sr-only">Next</span>

            </a>

          </li>

          <!-- First -->
          <li class="page-item clearfix d-none d-md-block"><a class="page-link waves-effect waves-effect">Last</a>

          </li>

        </ul>

      </nav>
      <!-- Pagination -->

    </div>
    <!-- Grid row -->

  </section>
  <!-- Products Grid -->

</div>
<!-- Content -->

</div>
</section>


<?php require APPROOT . '/views/inc/footer.php'; ?>