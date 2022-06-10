<?php
include '../shared/head.php';

include '../sharedFunc/db.php';

function testMessage($condation, $message)
{
    if ($condation) {
        echo "<div class='mt-5 alert alert-info mx-auto w-50'>
<h3>  $message is Done </h3>
    </div>";
    } else {
        echo "<div class=' mt-5  alert alert-danger mx-auto w-50'>
        <h3>  $message is False </h3>
            </div>";
    }
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $legel_no = $_POST['legel_no'];
    $bank_account = $_POST['bank_account'];
    $phone = $_POST['phone'];
    $addess = $_POST['addess'];
    $password = $_POST['password'];
    $approve = $_POST['approve'];

    // Image Code
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;
    if (move_uploaded_file($image_tmp, $location)) {
        echo "image Uploaded Done";
    } else {
        echo "image Uploaded false";
    }
    if ($approve == 1) {
        $insert = "INSERT INTO `travel_agency` VALUES (NULL ,'$name',$legel_no,$bank_account,'$phone','$addess','$password','$image_name',DEFAULT)";
        $i = mysqli_query($conn, $insert);
        testMessage($i, "Sign up ");
    } else {
        echo "<div class=' mt-5  alert alert-danger mx-auto w-50'>
        <h3>   Sorry you cant use this Site</h3>
            </div>";
    }
}


$name = '';
$legel_no = '';
$bank_account = '';
$phone = '';
$addess = '';
$password = '';

$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id =   $_GET['edit'];
    $select = "SELECT * from `travel_agency` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    $legel_no = $row['legel_no'];
    $bank_account = $row['bank_account'];
    $phone = $row['phone'];
    $addess = $row['addess'];
    $password = $row['password'];
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $legel_no = $_POST['legel_no'];
        $bank_account = $_POST['bank_account'];
        $phone = $_POST['phone'];
        $addess = $_POST['addess'];
        $password = $_POST['password'];
        $update = "UPDATE `travel_agency` SET `name` = '$name', `legel_no` = $legel_no,`bank_account` = $bank_account,`phone` = '$phone',`addess` = '$addess' , `password` = '$password' where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "Updated travel_agency");
        // header('LOCATION: http://localhost/ivisitor/admin/travelAgenecy/list.php');
    }
}
?>
<main id="main" class="main">
    <div class="pagetitle">
        <?php if ($update) : ?>
            <h1 class="display-1 text-center text-warning"> travel_agency Update page </h1>
        <?php else : ?>
            <h1 class="display-1 text-center text-info">Sign Up As travel_agency </h1>
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
                                <label> Name : </label>
                                <input class="form-control" value="<?php echo $name ?>" name="name" type="text">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label> legel_No </label>
                                    <input class="form-control" value="<?php echo $legel_no ?>" name="legel_no" type="text">
                                </div>
                                <div class="form-group">
                                    <label> Bank Account </label>
                                    <input type="text" value="<?php echo $bank_account ?>" class="form-control" name="bank_account">
                                </div>
                                <div class="form-group">
                                    <label> phone </label>
                                    <input type="text" value="<?php echo $phone ?>" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label> addess </label>
                                    <input type="text" value="<?php echo $addess ?>" class="form-control" name="addess">
                                </div>
                                <div class="form-group">
                                    <label> password </label>
                                    <input type="text" value="<?php echo $password ?>" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <label> Image </label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <label><a href="../terms.html"> Terms & conditions:</a> </label>
                                    <br>
                                    Approve <input type="radio" value="1" name="approve">
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