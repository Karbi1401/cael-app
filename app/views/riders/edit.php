<?php require APPROOT . '/views/admins/inc/header.php'; ?>
<?php require APPROOT . '/views/admins/inc/sidebar.php'; ?>
<?php require APPROOT . '/views/admins/inc/navbar.php'; ?>

<main class="vh-100 mb-5">
  <div class="container-fluid">
    <div class="col-md-12">
      <?php success('rider_message'); ?>
      <form action="<?php echo URLROOT; ?>/admins/edit/<?php echo $data['rider_id']; ?>" method="POST">
        <h5 class="offset-md-2 my-4 dark-grey-text font-weight-bold"><i class="fas fa-motorcycle mr-2"></i> Edit Rider</h5>

        <div class="row">
          <div class="col-md-8 offset-md-2">

            <div class="card h-100">
              <div class="card-body">
                <h5 class="mb-3 dark-grey-text font-weight-bold"><i class="fas fa-user mr-2"></i> Rider Information</h5>

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
                  <div class="col-12 pt-1">
                    <button class="btn btn-success btn-block" type="submit" value="Edit Rider">Edit Rider</button>
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