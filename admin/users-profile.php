<?php
include 'allHead.php';
include './sharedFunc/func.php';
include './sharedFunc/db.php';
$id = $_SESSION['adminId'];
echo $id;
$select = "SELECT * FROM `admin` where id =$id ";
$s = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($s);
echo $row['name'];
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="/ivisitor/admin/admins/upload/<?php echo  $_SESSION['image']  ?>" alt="Profile" class="rounded-circle">
            <h2><?php echo $row['name']; ?></h2>
            <h3><?php echo $row['job']; ?></h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php
include 'allUnder.php';
?>