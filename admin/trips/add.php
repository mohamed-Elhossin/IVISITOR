<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `travel_agency`";
$travels = mysqli_query($conn, $select);

if (isset($_POST['send'])) {
    $state = $_POST['state'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    // Image Code
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;
    if (move_uploaded_file($image_tmp, $location)) {
        echo "image Uploaded Done";
    } else {
        echo "image Uploaded false";
    }
    $agency_id  = $_POST['agency_id'];
    $insert = "INSERT INTO `trips` VALUES (NULL ,'$state',$price,'$description','$date','$image_name',$agency_id )";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert Trips");
}


$state = '';
$price = '';
$description = '';
$date = '';
$agency_id  = '';
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id =   $_GET['edit'];
    $select = "SELECT * from `trips` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $state = $row['state'];
    $price = $row['price'];
    $description = $row['description'];
    $date = $row['date'];
    $agency_id  = $row['agency_id'];
    if (isset($_POST['update'])) {
        $state = $_POST['state'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $agency_id  = $_POST['agency_id'];
        $update = "UPDATE `trips` SET `state` = '$state', `price` = $price,`description` = '$description',`date` = '$date'   where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "Updated Trips");
        // header('LOCATION: http://localhost/ivisitor/admin/travelAgenecy/list.php');
    }
}
?>
<main id="main" class="main">
    <div class="pagetitle">
        <?php if ($update) : ?>
            <h1 class="display-1 text-center text-warning"> Trips Update page </h1>
        <?php else : ?>
            <h1 class="display-1 text-center text-info">Trips Add page </h1>
        <?php endif; ?>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">add travel adency</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">

            <div class="row">
                <div class="card col-lg-9">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> Sate : </label>
                                <input class="form-control" value="<?php echo $state ?>" name="state" type="text">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label> price </label>
                                    <input class="form-control" value="<?php echo $price ?>" name="price" type="text">
                                </div>
                                <div class="form-group">
                                    <label> Description</label>
                                    <input type="text" value="<?php echo $description ?>" class="form-control" name="description">
                                </div>
                                <div class="form-group">
                                    <label> Date </label>
                                    <input class="form-control" value="<?php echo $date ?>" name="date" type="date">
                                </div>
                                <div class="form-group">
                                    <label> Image </label>
                                    <input class="form-control" name="image" type="file">
                                </div>
                                <div class="form-group">
                                    <label>agency_id </label>
                                    <select name="agency_id" class="form-control">

                                        <option value="<?php echo $_SESSION['adminId']; ?> "> <?php echo $_SESSION['travel']; ?> </option>
                                    </select>
                                </div>
                                <?php if ($update) : ?>
                                    <button name="update" class="mt-4 btn btn-primary btn-block w-50 mx-auto">Update Data </button>
                                <?php else : ?>
                                    <button name="send" class=" mt-4 btn btn-info btn-block w-50 mx-auto">Send Data</button>
                                <?php endif; ?>
                        </form>
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