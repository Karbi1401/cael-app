<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<main>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <?php success('user_message'); ?>
        <h2 class="h2-responsive orange-text font-weight-bold"><i class="fa-solid fa-image mr-2"></i> Edit Profile Picture</h2>
        <div class="card">
          <div class="card-body">
            <div class="row">

              <div class="col-md-12 mb-3">
                <div class="text-center">
                  <img src="<?php echo URLROOT; ?>/img/<?php echo $data['users']->user_image; ?>" class="rounded-circle z-depth-1 img-fluid" width="150px">
                </div>
              </div>

            </div>
            <form action="<?php echo URLROOT; ?>/users/avatar/<?php echo $data['users']->user_id; ?>" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12 mb-3">

                  <div class="input-group p-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="user_image">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                  <div class="d-flex gap-2">
                    <button class="btn btn-orange w-100" type="submit" value="Upload">Upload Image</button>
                    <a class="btn btn-danger w-100" href="<?php echo URLROOT; ?>/users/profile/<?php echo $data['users']->user_id; ?>" role="button">Cancel</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>