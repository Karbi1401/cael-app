<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>


<div class = "toast-container position-absolute top-0 end-0 p-3">
<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fixed-bottom m-5 ms-auto" data-bs-autohide="false">
  <div class="toast-header">
    <img src="<?php echo URLROOT; ?>/img/logo-dark.png" height="40px" width="40px" class="rounded me-2" alt="...">
    <strong class="me-auto">Cael's Delivery</strong>
    <small>Just now</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    Welcome to Cael's Delivery
  </div>
</div>
</div>


<div id="home" class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('<?php echo URLROOT; ?>/img/bgparallax.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
  <div class="mask rgba-black-slight">
    <div class="container h-100 d-flex justify-content-center align-items-center">
      <div class="mask mask-custom rgba-orange-slight">
        <div class="container h-100 d-flex justify-content-center align-items-center">
          <div class="row smooth-scroll">
            <div class="wow fadeIn col-md-12 text-center" data-wow-delay="0.2s">
              <div class="container">
                <img class="d-block mx-auto"  src="<?php echo URLROOT; ?>/img/logo.png" alt="Cael Logo" width="100">
                <h2 class="display-3 white-text font-weight-bold mb-2 mt-5 mt-xl-2" >
                  <span class="span-orange">Cael's</span> Delivery
                </h2>
                <hr class="hr-light" />
                <h4 class="subtext-header white-text mt-2 mb-3">
                  Cael's Delivery is a family business that not just caters delicious foods,
                </h4>
                <h4 class="mb-5 white-text clearfix d-none d-md-inline-block">
                  but lives with the perspective that nothing makes people closer together like pleasure and laughter.
                </h4>
              </div>
              <a href="<?php echo URLROOT; ?>/pages/menu" class="btn btn-orange btn-rounded wow fadeInUp" data-wow-delay="1.4s">
                <i class="fas fa-arrow-alt-circle-right mr-2"></i>
                <span> See Full Menu</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<main>
  <section class="mt-4 mb-5 pb-5">
    <div class="container">
      <h1 class="text-center mb-5 mt-5 py-5 font-weight-bold wow fadeInDown" data-wow-delay="0.2s">
        You are our top priority!
      </h1>
      <div class="row my-4 text-center">
        <div class="wow fadeInLeftBig col-md-4 mb-4" data-wow-delay = "0.3s">
          <div class="card shadow-2-strong h-100">
            <div class="d-flex justify-content-center" style="margin-top: -43px">
              <div class="p-4 rounded-circle shadow-5-strong d-inline-block" style="background: #e67e22">
                <i class="fas fa-bullseye fa-4x text-white"></i>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Mission</h5>
              <p class="card-text">
                Cael is dedicated in providing an excellent and
                successful event service with creativity and originality
                that leaves the best impression to everyone.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4 wow fadeInUpBig" data-wow-delay = "0.7s" >
          <div class="card shadow-2-strong h-100">
            <div class="d-flex justify-content-center" style="margin-top: -43px">
              <div class="p-4 rounded-circle shadow-5-strong d-inline-block" style="background: #e67e22">
                <i class="fas fa-eye fa-4x text-white"></i>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Vision</h5>
              <p class="card-text">
                Cael's vision is to be one of the most well-known event
                organizing company that meets the highest quality of
                service that exceeds customers expectations.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4 wow fadeInRight" data-wow-delay="1.1s">
          <div class="card shadow-2-strong h-100">
            <div class="d-flex justify-content-center" style="margin-top: -43px">
              <div class="p-4 rounded-circle shadow-5-strong d-inline-block" style="background: #e67e22">
                <i class="fas fa-star fa-4x text-white"></i>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Core</h5>
              <p class="card-text">
                Cael has formed its foundation from good business
                practices and strong core values of Customer Focus,
                Speed with Excellence, Integrity, Spirit of Family and
                Fun, Humility to Listen and Learn.&nbsp;
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="streak streak-photo streak-md" style="
          background-image: url('<?php echo URLROOT; ?>/img/streak.jpg');
        ">
    <div class="flex-center mask rgba-black-strong">
      <div class="text-center white-text wow zoomIn" data-wow-delay = "0.5s">
        <h2 class="h2-responsive mb-5">
          "Food for the body is not enough. There must be food for the soul."
        </h2>
        <h5 class="text-center font-italic">~ Dorothy Day</h5>
      </div>
    </div>
</section>
<section id="testimonials" class="container team-section mt-2 mb-5">

<!--Secion heading-->
<div class="row mt-5 mb-4" >
  <div class="col-md-12  wow jackInTheBox" data-wow-delay="0.2s">
    <div class="divider-new">
      <h3 class="text-center text-uppercase font-weight-bold mr-3 ml-3">Our
        Guests opinions</h3>
    </div>
  </div>
  <!--/Secion heading-->

  <!--Section description-->
  <p class="text-center grey-text w-responsive mx-auto mb-5 wow zoomIn" data-wow-delay="0.5s" >Lorem ipsum dolor
    sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate
    esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur accusamus veniam.
  </p>

  <!--First row-->
  <div class="row text-center">

    <!--First column-->
    <div class="col-md-4 mb-4 wow bounceInUp" data-wow-delay = "0.5s">

      <div class="testimonial">
        <!--Avatar-->
        <div class="avatar mx-auto mb-4">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%285%29.jpg" class="rounded-circle img-fluid z-depth-1-half">
        </div>

        <!--Content-->
        <h4 class="font-weight-bold">Anna Deynah</h4>
        <p>
          <i class="fas fa-quote-left "></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos
          id officiis hic
          tenetur quae quaerat ad velit ab.
        </p>

        <!--Review-->
        <div class="orange-text">
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="fas fa-star-half-alt"> </i>
        </div>
      </div>
    </div>
    <!--/First column-->

    <!--Second column-->
    <div class="col-md-4 mb-4 wow bounceInUp" data-wow-delay="0.8s">
      <div class="testimonial">
        <!--Avatar-->
        <div class="avatar mx-auto mb-4">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg" class="rounded-circle img-fluid z-depth-1-half">
        </div>

        <!--Content-->
        <h4 class="font-weight-bold">John Doe</h4>
        <p>
          <i class="fas fa-quote-left"></i> Ut enim ad minima veniam, quis nostrum exercitationem ullam
          corporis suscipit laboriosam,
          nisi ut aliquid ex ea commodi.</p>

        <!--Review-->
        <div class="orange-text">
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
        </div>
      </div>
    </div>
    <!--/Second column-->

    <!--Third column-->
    <div class="col-md-4 mb-4 wow bounceInUp" data-wow-delay="1.1s">
      <div class="testimonial">
        <!--Avatar-->
        <div class="avatar mx-auto mb-4">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%288%29.jpg" class="rounded-circle img-fluid z-depth-1-half">
        </div>
        <!--Content-->
        <h4 class="font-weight-bold">Tom Smith</h4>
        <p>
          <i class="fas fa-quote-left"></i> At vero eos et accusamus et iusto odio dignissimos ducimus qui
          blanditiis praesentium
          voluptatum deleniti atque corrupti.</p>

        <!--Review-->
        <div class="orange-text">
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="fas fa-star"> </i>
          <i class="far fa-star"> </i>
        </div>

      </div>
    </div>
    <!--/Third column-->

  </div>
  <!--/First row-->
</div>

</section>
<!--/Section: Testimonials v.3-->
</main>

<script>
  // TOAST
window.onload = (event) => {
let myAlert = document.querySelector('.toast');
let bsAlert = new bootstrap.Toast(myAlert);
  
setTimeout(function () {
  bsAlert.show();
}, 800);
};

</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>