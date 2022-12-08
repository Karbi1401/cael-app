<header class="bg-orange">
  <div id="slide-out" class="side-nav sn-bg-4 fixed">
    <ul class="custom-scrollbar">
      <li class="logo-sn waves-effect py-3">
        <div class="text-center">
          <a href="<?php echo URLROOT; ?>/admins" class="pl-0">
            <img src="<?php echo URLROOT; ?>/img/logo.png" width="72">
          </a>
        </div>
      </li>
      <li>
        <ul class="collapsible collapsible-accordion">
          <?php if ($_SESSION['user_role'] == 'admin') : ?>
            <li>
              <a href="<?php echo URLROOT; ?>/admins" class="collapsible-header waves-effect">
                <div class="row">
                  <div class="col-1"><i class="fas fa-tachometer"></i></div>
                  <div class="col">Dashboard</div>
                </div>
              </a>
            </li>
            <li>
              <a href="<?php echo URLROOT; ?>/categories" class="collapsible-header waves-effect">
                <div class="row">
                  <div class="col-1">
                    <i class="fas fa-list"></i>
                  </div>
                  <div class="col">Categories</div>
                </div>
              </a>
            </li>
            <li>
              <a href="<?php echo URLROOT; ?>/products" class="collapsible-header waves-effect">
                <div class="row">
                  <div class="col-1"><i class="fas fa-box"></i></div>
                  <div class="col">Products</div>
                </div>
              </a>
            </li>
            <li>
              <a href="<?php echo URLROOT; ?>/riders" class="collapsible-header waves-effect">
                <div class="row">
                  <div class="col-1"><i class="fas fa-motorcycle"></i></div>
                  <div class="col">Riders</div>
                </div>
              </a>
            </li>
            <li>
              <a href="<?php echo URLROOT; ?>/admins/users" class="collapsible-header waves-effect">
                <div class="row">
                  <div class="col-1"><i class="fas fa-user"></i></div>
                  <div class="col">Users</div>
                </div>
              </a>
            </li>
            <li><a class="collapsible-header waves-effect arrow-r">
                <div class="row">
                  <div class="col-1"><i class="fas fa-cart-shopping"></i></div>
                  <div class="col">Orders</div>
                  <i class="fas fa-angle-down rotate-icon"></i>
                </div>
              </a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="<?php echo URLROOT; ?>/orders" class="collapsible-header waves-effect">Pending Orders</a>
                  </li>
                  <li><a href="<?php echo URLROOT; ?>/orders/onDelivery" class="collapsible-header waves-effect">On Delivery</a>
                  </li>
                  <li><a href="<?php echo URLROOT; ?>/orders/completed" class="collapsible-header waves-effect">Completed Orders</a>
                  </li>
                  <li><a href="<?php echo URLROOT; ?>/orders/cancelled" class="collapsible-header waves-effect">Cancelled Orders</a>
                  </li>
                </ul>
              </div>
            </li>
          <?php elseif ($_SESSION['user_role'] == 'employee') : ?>
            <li>
              <a href="<?php echo URLROOT; ?>/admins" class="collapsible-header waves-effect">
                <i class="fas fa-tachometer-alt"></i> Dashboard
              </a>
            </li>
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-shopping-cart"></i>
                Orders<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="<?php echo URLROOT; ?>/orders" class="collapsible-header waves-effect">Pending Orders</a>
                  </li>
                  <li><a href="<?php echo URLROOT; ?>/orders/onDelivery" class="collapsible-header waves-effect">On Delivery</a>
                  </li>
                  <li><a href="<?php echo URLROOT; ?>/orders/completed" class="collapsible-header waves-effect">Completed Orders</a>
                  </li>
                  <li><a href="<?php echo URLROOT; ?>/orders/cancelled" class="collapsible-header waves-effect">Cancelled Orders</a>
                  </li>
                </ul>
              </div>
            </li>
          <?php endif; ?>
        </ul>
      </li>
    </ul>
    <div class="sidenav-bg mask-strong"></div>
  </div>