<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';

if (isset($_GET['search'])) {
  $nameTrip = $_GET['nameTrip'];
  $priceValue = $_GET['priceValue'];
  if (empty($nameTrip)) {
    $select = "SELECT * FROM `trips` ORDER BY price $priceValue";

  } else {
    $select = "SELECT * FROM `trips` where `state` = '$nameTrip'";
  }
  $s = mysqli_query($conn, $select);
  $numRows = mysqli_num_rows($s);
}


?>
<main id="main" class="main">
  <div class="pagetitle">

    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List travel adency</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <div class="container text-center my-5 pricing section-bg wow fadeInUp">


    <div class="row flex-items-xs-middle flex-items-xs-center">
      <?php if ($numRows == 0) :  ?>
        <img style="width:40%" src="https://user-images.githubusercontent.com/24848110/33519396-7e56363c-d79d-11e7-969b-09782f5ccbab.png" alt="">
      <?php else : ?>
        <!-- Basic Plan  -->
        <?php foreach ($s as $data) { ?>
          <div class="col-xs-12 col-lg-4">
            <div class="card mt-5">
              <img height="300" src="/ivisitor/admin/trips/upload/<?php echo $data['image'] ?>" class="img-top" alt="Eror">
              <div class="card-header">
                <h3><span class="currency">$</span><?php echo $data['price'] ?><span class="period">/Day</span></h3>
              </div>
              <div class="card-block">
                <h4 class="card-title">
                  <?php echo $data['state'] ?>
                </h4>
                <p>
                  <?php echo $data['description'] ?>
                </p>
                <p> <?php echo $data['date'] ?>
                </p>
                <a href="/ivisitor/user/payment.php?booking=<?php echo $data['id']?>" class="btn btn-info">Book Now</a>
              </div>
            </div>
          </div>

        <?php } ?>
      <?php endif; ?>
    </div>
  </div>
</main><!-- End #main -->
<?php
include './shared/footer.php';
include './shared/script.php';
?>