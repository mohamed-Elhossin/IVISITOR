<?php

if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location:/ivisitor/admin/pages-login.php');
}


?>
<!-- ======= Header ======= -->

<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <img src="/ivisitor/admin/assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">Ivisitor:Admin Panel</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">
        <?php if ($_SESSION['admin']) :  ?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/ivisitor/admin/admins/upload/<?php echo  $_SESSION['image']  ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo   $_SESSION['admin']; ?> </span>
          </a><!-- End Profile Iamge Icon -->
        <?php endif; ?>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?php echo   $_SESSION['admin']; ?></h6>
            <span><?php echo   $_SESSION['job']; ?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="/ivisitor/admin/users-profile.php">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <form action="">
              <button class="dropdown-item d-flex align-items-center" name="logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </button>
            </form>

          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->