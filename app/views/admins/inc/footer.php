<footer class="page-footer pt-0 mt-5 fixed-bottom">

  <div class="footer-copyright py-3 text-center">
    <div class="container-fluid">
      © 2022 Copyright: <a href="<?php echo URLROOT; ?>" target="_blank"> <?php echo SITENAME; ?></a>
    </div>
  </div>

</footer>

<script src="<?php echo URLROOT; ?>/backend/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo URLROOT; ?>/backend/js/popper.min.js"></script>
<script src="<?php echo URLROOT; ?>/backend/js/bootstrap.min.js"></script>
<script src="<?php echo URLROOT; ?>/backend/js/mdb.min.js"></script>
<script src="<?php echo URLROOT; ?>/backend/js/addons/datatables.min.js"></script>
<script src="<?php echo URLROOT; ?>/backend/js/addons/datatables-select.min.js"></script>
<script>
  $(".button-collapse").sideNav();

  var container = document.querySelector('.custom-scrollbar');
  var ps = new PerfectScrollbar(container, {
    wheelSpeed: 2,
    wheelPropagation: true,
    minScrollbarLength: 20
  });

  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })

  $(document).ready(function() {
    $('#myTable').DataTable();
  });

  $(document).ready(function() {
    $('input[type="file"]').change(function(e) {
      var filepath = e.target.files[0].name;
      alert(filepath + ' is the selected file .')
      $("#file-path").val(filepath);;
    });
  });

  function deleteCategory() {
    var result = confirm("Are you sure you want to delete the category?");
    if (result == false) {
      event.preventDefault();
    }
  }

  function deleteProduct() {
    var result = confirm("Are you sure you want to delete the product?");
    if (result == false) {
      event.preventDefault();
    }
  }

  $(document).ready(function() {
    $(".mdb-select").materialSelect();
  });
</script>
</body>

</html>