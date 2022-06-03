<?php
include '../shared/head.php';
include '../shared/header.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

if (isset($_POST['send'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $national_id = $_POST['national_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $insert = "INSERT INTO `users` VALUES (NULL , '$fname' ,'$lname',$age ,$national_id, '$email','$password' ,'$address' , '$phone','$gender')";
    $i =  mysqli_query($conn, $insert);
    testMessage($i, "Now You Are signed IN");
}
?>
<main id="main" class="main  my-5 pt-5">
    <div class="pagetitle">
        <h1 class="display-1 text-center text-info">Sign Up </h1>

    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">
            <div class="container col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> First Name</label>
                                <input name="fname" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> Last Name</label>
                                <input name="lname" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> age</label>
                                <input name="age" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> national_id</label>
                                <input name="national_id" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> user Email </label>
                                <input name="email" type="email" class="form-control">

                            </div>
                            <div class="form-group">
                                <label> user password</label>
                                <input name="password" type="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label> user Address</label>
                                <input name="address" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> phone</label>
                                <input name="phone" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> gender</label><br>
                                Male <input name="gender" type="radio" value="male" class="mt-3 ">
                                Female <input name="gender" type="radio" value="female">

                            </div>
                            <button name="send" class="btn mt-3 btn-info btn-block w-50 mx-auto"> Send Data </button>
                        </form>
                    </div>
                </div>
            </div>

    </section>

</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>