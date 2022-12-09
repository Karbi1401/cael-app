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
                      <img src="<?php echo URLROOT; ?>/img/forgot_password.png" alt="" class="img-fluid">
                  </div>

                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">

                  <form action="<?php echo URLROOT; ?>/users/forgot" method="POST">
                    <div class="p-5">
                      <h3 class="fw-normal span-orange mb-3">Forgot Password</h3>
                      <p>Enter the email address you used when you joined and we’ll send you instructions to reset your password.</p>
                      <p>For security reasons, we do NOT store your password. So rest assured that we will never send your password via email.</p>
                      <?php success('user_message'); ?>
                      <div class="row">

                        <div class="col-12 mb-3">
                          <label for="email">Email</label>
                          <input type="email" id="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" name="email">
                          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                        </div>

                        <div class="pt-1 mb-3 text-center">
                          <button class="btn btn-orange btn-block" type="submit" value="Send Reset Instructions">Send Reset Instructions</button>
                        </div>

                      </div>

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

<?php require APPROOT . '/views/inc/footer.php'; ?>