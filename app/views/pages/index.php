<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<div id="home" class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('<?php echo URLROOT; ?>/img/bgparallax.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
  <div class="mask rgba-black-slight">
    <div class="container h-100 d-flex justify-content-center align-items-center">
      <div class="mask mask-custom rgba-orange-slight">
        <div class="container h-100 d-flex justify-content-center align-items-center">
          <div class="row smooth-scroll">
            <div class="col-md-12 text-center">
              <div class="wow fadeInDown" data-wow-delay="0.2s">
                <img class="d-block mx-auto mb-4" src="<?php echo URLROOT; ?>/img/logo.png" alt="Cael Logo" width="100">
                <h2 class="display-3 white-text font-weight-bold mb-2 mt-5 mt-xl-2">
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
              <a href="#" class="btn btn-orange btn-rounded wow fadeInUp" data-wow-delay="0.2s">
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
      <h1 class="text-center mb-5 mt-5 py-5 font-weight-bold wow fadeIn" data-wow-delay="0.2s">
        You are our top priority!
      </h1>
      <div class="row my-4 text-center">
        <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
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
        <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
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
        <div class="col-md-4 mb-4 wow fadeIn" data-wow-delay="0.4s">
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
      <div class="text-center white-text">
        <h2 class="h2-responsive mb-5">
          "Food for the body is not enough. There must be food for the soul."
        </h2>
        <h5 class="text-center font-italic">~ Dorothy Day</h5>
      </div>
    </div>
  </section>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>