<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';
if (isset($_GET['booking'])) {
    $tripid = $_GET['booking'];
    $userId =  $_SESSION['adminId'];
    $select = "SELECT * FROM `trips` where id =$tripid ";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
    if (isset($_POST['pay'])) {
        $amount = $row['price'];
        $insert = "INSERT INTO `payment` VALUES (NULL ,  $amount ,Null,$userId ,$tripid  )";
        $i =  mysqli_query($conn, $insert);
        testMessage($i, "Congrate. Booking is confirmed !");
    }
}


?>
<main id="main" class="main  my-5 pt-5">
    <div class="pagetitle">
        <h1 class="display-1 text-center text-info"> Payment Page </h1>

    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="container col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> amount </label>
                                <input name="amount" disabled value="<?php echo $row['price'] ?>" type="text" class="form-control">
                            </div>
                            <label for=""> Chose payment Way </label>
                            Cash <input type="radio" name="way">
                            Visa <input type="radio" name="way">
                            Voda Cash <input type="radio" name="way">
                            <button name="pay" class="btn mt-3 btn-info btn-block w-50 mx-auto"> pay now </button>
                        </form>

                    </div>
                </div>
            </div>

    </section>

</main><!-- End #main -->
<?php
include './shared/footer.php';
include './shared/script.php';
?>