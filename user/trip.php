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
        <form action="./show.php">
            <div class="row my-5">
                <div class="col">
                    <label for=""> Search by name</label>
                    <input type="text" name="nameTrip" class="form-control" placeholder="search by Trip Name">
                </div>
                <div class="col">
                    <label for=""> Filter by Price</label>
                    <select type="text" name="priceValue" class="form-control">
                        <option value="DESC">highest price </option>
                        <option value="ASC">Lowest price</option>
                    </select>
                </div>
            </div>
            <button name="search" class="btn btn-info"> Search </button>
        </form>
        <div class="row flex-items-xs-middle flex-items-xs-center">
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
                            <?php if (isset($_SESSION['admin'])) : ?>
                                <a href="/ivisitor/user/payment.php?booking=<?php echo $data['id'] ?>" class="btn">Book Now</a>
                            <?php else : ?>
                                <a href="/ivisitor/user/pages-login.php" class="btn">Book Now</a>
                            <?php endif; ?>
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