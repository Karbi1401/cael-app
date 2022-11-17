<script src="<?php echo URLROOT; ?>/backend/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo URLROOT; ?>/backend/js/popper.min.js"></script>
<script src="<?php echo URLROOT; ?>/backend/js/bootstrap.min.js"></script>
<script src="<?php echo URLROOT; ?>/backend/js/mdb.min.js"></script>
<script>
  // SideNav Initialization
  $(".button-collapse").sideNav();

  var container = document.querySelector('.custom-scrollbar');
  var ps = new PerfectScrollbar(container, {
    wheelSpeed: 2,
    wheelPropagation: true,
    minScrollbarLength: 20
  });
</script>
</body>

</html>