<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<main>
  <section class="h-100 h-custom gradient-custom-2">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <form action="<?php echo URLROOT; ?>/users/signup" method="POST">
            <div class="card">
              <div class="card-body p-0">
                <div class="row g-0">
                  <div class="col-md-6">

                    <div class="p-5">

                      <h3 class="fw-normal orange-text mb-3">Sign up</h3>

                      <div class="row">

                        <div class="col-6 mb-3">
                          <label for="firstName">First Name</label>
                          <input type="text" id="name" class="form-control <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['first_name']; ?>" name="first_name">
                          <span class="invalid-feedback"><?php echo $data['first_name_err']; ?></span>
                        </div>

                        <div class="col-6 mb-3">
                          <label for="lastName">Last Name</label>
                          <input type="text" id="name" class="form-control <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['last_name']; ?>" name="last_name">
                          <span class="invalid-feedback"><?php echo $data['last_name_err']; ?></span>
                        </div>

                        <div class="col-12 mb-3">
                          <label for="username">Username</label>
                          <input type="text" id="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>" name="username">
                          <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                        </div>

                        <div class="col-12 mb-3">
                          <label for="password">Password</label>
                          <input type="password" id="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" name="password">
                          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                        </div>

                        <div class="col-12 mb-3">
                          <label for="confirmPassword">Confirm Password</label>
                          <input type="password" id="confirmPassword" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>" name="confirm_password">
                          <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                        </div>

                      </div>

                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="p-5" style="background-color: #f8f9fa;">

                      <h3 class="fw-normal orange-text mb-3">Contact Information</h3>

                      <div class="row">
                        <div class="col-12 mb-3">
                          <label for="email">Email</label>
                          <input type="email" id="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" name="email">
                          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                        </div>

                        <div class="col-12 mb-3">
                          <label for="contact_number">Contact Number</label>
                          <input type="text" id="contact_number" class="form-control <?php echo (!empty($data['contact_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['contact_number']; ?>" name="contact_number">
                          <span class="invalid-feedback"><?php echo $data['contact_number_err']; ?></span>
                        </div>

                        <div class="col-12 mb-3">
                          <label for="address">Address</label>
                          <input type="text" id="address" class="form-control <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>" name="address">
                          <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
                        </div>

                        <div class="col-12 mb-3">
                          <label for="city">City</label>
                          <input type="text" id="city" class="form-control <?php echo (!empty($data['city_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['city']; ?>" name="city">
                          <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
                        </div>

                        <div class="col-12 pt-1 mb-3">
                          <button class="btn btn-orange btn-block" type="submit" value="Signup">Sign up</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>