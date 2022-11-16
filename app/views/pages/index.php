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
                <img class="d-block mx-auto mb-4" src="<?php echo URLROOT; ?>/img/logo.png" alt="" width="100">
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
              <a class="btn btn-orange btn-rounded wow fadeInUp" data-wow-delay="0.2s">
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
  <div class="container">
    <section id="features" class="mt-4 mb-5 pb-5">
      <h1 class="text-center mb-5 mt-5 pt-5 font-weight-bold wow fadeIn" data-wow-delay="0.2s">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h1>

      <p class="text-center w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum quas, eos officia maiores ipsam ipsum
        dolores reiciendis
        ad voluptas, animi obcaecati adipisci sapiente mollitia? Autem delectus quod accusamus tempora, aperiam
        minima assumenda deleniti hic.</p>

      <div class="row my-4 text-center">
        <div class="col-md-6 mb-4 wow fadeIn" data-wow-delay="0.4s">
          <div class="card hoverable">
            <i class="fas fa-bullseye orange-text mt-3 fa-3x my-4"></i>
            <h5 class="font-weight-bold mb-4">Mission</h5>
            <p class="font-small mx-3">
              Cael's Party Mania is dedicated in providing an excellent and successful event service with creativity and originality that leaves the best impression to everyone.
            </p>
          </div>
        </div>

        <div class="col-md-6 mb-4 wow fadeIn" data-wow-delay="0.4s">
          <div class="card hoverable">
            <i class="far fa-eye orange-text mt-3 fa-3x my-4"></i>
            <h5 class="font-weight-bold mb-4">Vision</h5>
            <p class="font-small mx-3">
              Cael's Party Mania's vision is to be one of the most well-known event organizing company that meets the highest quality of service that exceeds customers expectations.
            </p>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="streak streak-photo streak-md" style="
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
  </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>