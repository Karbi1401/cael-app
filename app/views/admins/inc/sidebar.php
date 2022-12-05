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
          <li>
            <a href="<?php echo URLROOT; ?>/admins" class="collapsible-header waves-effect">
              <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
          </li>
          <li>
            <a href="<?php echo URLROOT; ?>/categories" class="collapsible-header waves-effect">
              <i class="fas fa-list"></i> Categories
            </a>
          </li>
          <li>
            <a href="<?php echo URLROOT; ?>/products" class="collapsible-header waves-effect">
              <i class="fas fa-box"></i> Products
            </a>
          </li>
          <li>
            <a href="<?php echo URLROOT; ?>/riders" class="collapsible-header waves-effect">
              <i class="fas fa-motorcycle"></i> Riders
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
        </ul>
      </li>
    </ul>
    <div class="sidenav-bg mask-strong"></div>
  </div>