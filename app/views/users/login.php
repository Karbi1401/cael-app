<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<main>
  <section class="h-100 h-custom gradient-custom-2">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card">
            <div class="card-body p-0">
              <div class="row g-0 flex-lg-row-reverse">
                <div class="col-md-6">

                  <div class="p-5" style="background-color: #f8f9fa;">
                    <h2 class="display-5 font-weight-bold"><span class="span-orange">Cael's</span> Delivery</h2>
                    <h5 class="mt-2 mb-3"> You are our top priority!</h4>
                      <img src="<?php echo URLROOT; ?>/img/login.png" alt="" class="img-fluid">
                  </div>

                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">

                  <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                    <div class="p-5">
                      <h3 class="fw-normal span-orange mb-3">Login</h3>
                      <?php success('user_message'); ?>
                      <div class="row">

                        <div class="col-12 mb-3">
                          <label for="username">Username</label>
                          <input type="text" id="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>" name="username">
                          <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                        </div>

                        <div class="col-12 mb-3">
                          <label for="password">Password</label>
                          <input type="password" id="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" name="password" data-toggle="password">
                          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                        </div>

                        <div class="col-12 mb-3">
                          <!-- Default unchecked -->
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                            <label class="custom-control-label" for="defaultUnchecked">Show Password</label>
                          </div>
                        </div>
                      </div>
                      <div class="pt-1 mb-3 text-center">
                        <button class="btn btn-orange btn-block" type="submit" value="Login">Login</button>
                      </div>
                      <a class="small span-orange" href="#!">Forgot password?</a>
                      <p class="mb-5 pb-lg-2">Don't have an account? <a href="<?php echo URLROOT; ?>/users/signup" class="span-orange">Register here</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
  document.getElementById('defaultUnchecked').onclick = function() {
    if (this.checked) {
      document.getElementById('password').type = "text";
    } else {
      document.getElementById('password').type = "password";
    }
  };
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>