<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100">
  <div class="container-fluid">
    <div class="col-md-12">
      <?php success('user_message'); ?>
      <form action="<?php echo URLROOT; ?>/admins/addUser" method="POST" id="formUser" enctype="multipart/form-data">
        <h5 class="my-4 dark-grey-text font-weight-bold"><i class="fas fa-user mr-2"></i> Add User</h5>

        <div class="row">
          <div class="col-md-6">

            <div class="card h-100">
              <div class="card-body">
                <h5 class="mb-3 dark-grey-text font-weight-bold"><i class="fas fa-user mr-2"></i> User Information</h5>

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
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" name="email">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>" name="username">
                    <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" name="password">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>" name="confirm_password">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card">
              <div class="card-body">

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" id="contact_number" class="form-control <?php echo (!empty($data['contact_number_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['contact_number']; ?>" name="contact_number">
                    <span class="invalid-feedback"><?php echo $data['contact_number_err']; ?></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="address">Address</label>
                    <input type="text" id="address" class="form-control <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['address']; ?>" name="address">
                    <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="city">City</label>
                    <input type="text" id="city" class="form-control <?php echo (!empty($data['city_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['city']; ?>" name="city">
                    <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 mb-3">
                    <label for="userRole">User Role</label>
                    <select class="browser-default custom-select" action="formUser" id="userRole" name="role">
                      <option selected>Choose user role</option>
                      <option value="user">User</option>
                      <option value="employee">Employee</option>
                      <option value="admin">Admin</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12 pt-1">
                    <button class="btn btn-success btn-block" type="submit" value="Add User">Add User</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>
</main>

<?php require APPROOT . '/views/admins/inc/footer.php'; ?>