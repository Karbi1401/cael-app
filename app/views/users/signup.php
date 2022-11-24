<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<style>
	.gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #e67e22);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #e67e22);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
</style>
<br><br>

<!-- <div class="limiter">
		<div class="container-login100">
		<br><br><br><br><br><br>
			<div class="wrap-login100">
				
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						<img src = "<?php echo URLROOT; ?>/img/logo.png" height = "90px" width = "90px">
						<br><br>
						<h5>CAEL'S DELIVERY</h5>
						<br>
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter First Name">
						<input class="input100" type="text" name="password">
						<span class="focus-input100" data-placeholder="First Name"></span>                             
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter Last Name">
						<input class="input100" type="text" name="password">
						<span class="focus-input100" data-placeholder="Last Name"></span>                             
					</div>


                    <div class="wrap-input100 validate-input" data-validate = "Enter Number">
						<input class="input100" type="number" name="number">
						<span class="focus-input100" data-placeholder="Contact Number"></span>                     
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter City">
						<input class="input100" type="text" name="city">
						<span class="focus-input100" data-placeholder="City"></span>                     
					</div>

 


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<form method = "POST" action = "<?php echo URLROOT; ?>/users/signup2">
							<button class="login100-form-btn">
								NEXT
							</button>
						</form>

						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Already have an account?
						</span>

						<a class="txt2" href="#">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div> -->

	<section class="h-100 gradient-form">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
		<br>
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src= "<?php echo URLROOT; ?>/img/logo.png"
                    style="width: 100px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1"><span>CAEL'S</span> DELIVERY</h4>
                </div>
                <form>
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example11" class="form-control"
                      placeholder="Enter Name" />
                    <label class="form-label" for="form2Example11">Full name</label>
                  </div>

				  <div class="form-outline mb-4">
                    <input type="email" id="form2Example11" class="form-control"
                      placeholder="Enter email" />
                    <label class="form-label" for="form2Example11">Email</label>
                  </div>

				  <div class="form-outline mb-4">
                    <input type="email" id="form2Example11" class="form-control"
                      placeholder="Enter phone number" />
                    <label class="form-label" for="form2Example11">Phone Number</label>
                  </div>

				  <div class="form-outline mb-4">
                    <input type="email" id="form2Example11" class="form-control"
                      placeholder="Enter Password" />
                    <label class="form-label" for="form2Example11">Password</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" />
                    <label class="form-label" for="form2Example22">Re-enter Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Log
                      in</button>
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" class="btn btn-outline-danger">Create new</button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Cael's Delivery</h4>
                <p class=" text-white small mb-0">Cael's Delivery is a family business that not just caters delicious foods,
but lives with the perspective that nothing makes people closer together like pleasure and laughter.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>
<br><br><br><br><br><br><br><br><br>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


<?php require APPROOT . '/views/inc/footer.php'; ?>