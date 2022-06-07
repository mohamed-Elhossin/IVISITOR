<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="/ivisitor/admin/index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#trips" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Trips</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="trips" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/ivisitor/admin/trips/add.php">
            <i class="bi bi-circle"></i><span>Add</span>
          </a>
        </li>
        <li>
          <a href="/ivisitor/admin/trips/list.php">
            <i class="bi bi-circle"></i><span>List</span>
          </a>
        </li>
      </ul>
    </li><!-- End travel Adency Nav -->
    <?php if (!isset($_SESSION['travel'])) : ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#travel" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Travel Agency</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="travel" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/ivisitor/admin/travelAgenecy/add.php">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
          <li>
            <a href="/ivisitor/admin/travelAgenecy/list.php">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li><!-- End travel Adency Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#admin" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>admins</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/ivisitor/admin/admins/add.php">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
        </ul>
      </li><!-- End travel Adency Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/ivisitor/admin/pages-contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/ivisitor/admin/pages-register.php">
          <i class="bi bi-card-list"></i>
          <span>Add Admins</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/ivisitor/admin/users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/ivisitor/admin/orders.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Order Details</span>
        </a>
      </li><!-- End Login Page Nav -->
    <?php endif; ?>
  </ul>

</aside><!-- End Sidebar-->