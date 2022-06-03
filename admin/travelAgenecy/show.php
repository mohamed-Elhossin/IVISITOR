<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

if (isset($_GET['show'])) {
  $id = $_GET['show'];
  $select = "SELECT * FROM `travel_agency` where id =$id";
  $s = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($s);
  echo $row['id'];
}

?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List Travel Agency ID : <?php echo $row['id'] ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List travel adency</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container col-6 mt-5 ">
        <div class="card">
          <div class="card-body">
            <p> ID : <?php echo $row['id'] ?> </p>
            <p> name : <?php echo $row['name'] ?> </p>
            <p>legel_no : <?php echo $row['legel_no'] ?> </p>
            <p>bank_accoun : <?php echo $row['bank_account'] ?> </p>
            <p>phone : <?php echo $row['phone'] ?> </p>
            <p>addess : <?php echo $row['addess'] ?> </p>
            <p>password : <?php echo $row['password'] ?> </p>
            <p>adminId : <?php echo $row['adminId'] ?> </p>
          </div>
        </div>
      </div>
    </div><!-- End Right side columns -->
  </section>
</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>