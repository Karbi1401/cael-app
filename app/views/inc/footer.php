<footer class="page-footer text-center text-md-left pt-4">
  <div class="container mb-4">
    <div class="row">
      <div class="col-lg-6 pt-1 pb-3 wow bounceInLeft" data-wow-delay="0.3s">
        <h5 class="title mb-4">
          <strong>ABOUT RESTAURANT</strong>
        </h5>

        <p class="w-responsive">
          Cael's Delivery is a family business that not just caters delicious foods, but lives with the perspective that nothing makes people closer together like pleasure and laughter.
        </p>
      </div>

      <hr class="w-100 clearfix d-md-none" />

      <div class="col-lg-6 pt-1 pb-1 col-md-6 wow bounceInRight" data-wow-delay="0.3s">
        <h5 class="text-uppercase mb-4">
          <strong>Contact Us</strong>
        </h5>

        <p><i class="fas fa-home mr-3"></i> 42-22 Pacheco Dr., Lungsod ng Valenzuela, Philippines</p>
        <p><i class="fas fa-phone mr-3"></i> (+63) 933 866 4039</p>
        <p><i class="fas fa-envelope mr-3"></i> caelspartymania@gmail.com</p>
        <a href="https://www.facebook.com/AnalynPabloVizmanos" target="_blank"><i class="fab fa-facebook mr-3"></i> facebook.com/AnalynPabloVizmanos</a>
      </div>

      <hr class="w-100 clearfix d-md-none" />

    </div>
  </div>

  <div class="footer-copyright py-3 text-center" data-wow-delay="0.3s">
    <div class="container-fluid">
      © 2022 Copyright:
      <a href="<?php echo URLROOT; ?>">
        Cael's Delivery
      </a>
    </div>
  </div>
</footer>

<script src="<?php echo URLROOT; ?>/frontend/js/jquery.min.js"></script>
<script src="<?php echo URLROOT; ?>/frontend/js/popper.min.js"></script>
<script src="<?php echo URLROOT; ?>/frontend/js/bootstrap.min.js"></script>
<script src="<?php echo URLROOT; ?>/frontend/js/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>
  new WOW().init();

  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })

  function deleteItem() {
    var result = confirm("Are you sure you want to delete the item?");
    if (result == false) {
      event.preventDefault();
    }
  }
</script>

</body>

</html>