<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
$select = "SELECT * FROM `trips`";
$s = mysqli_query($conn, $select);
?>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="my-5 pricing section-bg wow fadeInUp">

    <div class="container">

        <header class="section-header">
            <h3>Trips</h3>
        </header>

        <div class="row flex-items-xs-middle flex-items-xs-center">

            <!-- Basic Plan  -->
            <?php foreach ($s as $data) { ?>
                <div class="col-xs-12 col-lg-4">
                    <div class="card">
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
                            <a href="#" class="btn">Book Now</a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>

</section><!-- End Pricing Section -->

<?php
include './shared/footer.php';
include './shared/script.php';

?>