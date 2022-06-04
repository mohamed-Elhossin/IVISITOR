<?php
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location:/ivisitor/user/');
}
?>
<!-- ======= Header ======= -->

<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="index.php">IVisitor
      </a></h1>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="/ivisitor/user/#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="/ivisitor/user/#about">About</a></li>
        <li><a class="nav-link scrollto" href="/ivisitor/user/#services">Services</a></li>
        <li><a class="nav-link scrollto" href="/ivisitor/user/#team">Team</a></li>
        <li><a class="nav-link scrollto" href="/ivisitor/user/trip.php">Trips</a></li>
        <li><a class="nav-link scrollto" href="/ivisitor/user/#footer">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <div class="social-links">
      <?php if (isset($_SESSION['admin'])) : ?>
        <form action="">
          <button name="logout" class="btn btn-info"> Log Out </button>
        </form>
        <a class="btn btn-danger p-3" href="/ivisitor/user/orders.php">your Orders</a>
      <?php else : ?>
        <a href="/ivisitor/user/admins/add.php" class="btn btn-info p-3 "> Sign up </a>
        <a href="/ivisitor/user/pages-login.php" class="btn btn-warning p-3">Login</a>
      <?php endif; ?>
    </div>
  </div>
</header><!-- End Header -->