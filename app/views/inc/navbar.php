<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>">
      <img src="<?php echo URLROOT; ?>/img/logo-light.png" alt="Cael Logo" width="55">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto smooth-scroll">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>"><i class="fa-solid fa-house mr-2"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/menu"><i class="fa-solid fa-bars mr-2"></i>Menu</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['user_id'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/carts"><i class="fa-solid fa-cart-shopping mr-2"></i>Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-solid fa-user mr-2"></i>Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login"><i class="fa-solid fa-right-to-bracket mr-2"></i>Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/signup"><i class="fa-solid fa-id-card mr-2"></i>Sign up</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>