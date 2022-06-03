<?php
include './shared/head.php';
include './sharedFunc/db.php';

if (isset($_POST['login'])) {
  $name = $_POST['name'];
  $password = $_POST['password'];
  $typeLogin = $_POST['typeLogin'];
  if($typeLogin == 0 ){
    $select  = "SELECT * FROM `admin` where  `name` = '$name' and `password`= '$password'";
    $s =  mysqli_query($conn, $select);
   
  }elseif($typeLogin==1){
    $select  = "SELECT * FROM `travel_agency` where  `name` = '$name' and `password`= '$password'";
    $s =  mysqli_query($conn, $select);
    $_SESSION['travel'] = $name;
  }
  $numOfRows = mysqli_num_rows($s);
  $row = mysqli_fetch_assoc($s);
  if ($numOfRows > 0) {
    $_SESSION['admin'] = $name;
    $_SESSION['adminId'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['image'] = $row['image'];
    $_SESSION['job'] = $row['job'];
    header("LOCATION:/ivisitor/admin/");
  } else {
    echo "<div class=' mt-5  alert alert-danger mx-auto w-50'>
    <h3>   Wrong Password OR User Name </h3>
        </div>";
  }
}
print_r($_SESSION);
?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="/NiceAdmin/index.php" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Ivisitor</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 needs-validation" novalidate method="POST">

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="name" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <select name="typeLogin" class="form-control">
                      <option value="0"> Login As Admin </option>
                      <option value="1"> Login travel_agency</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="/ivisitor/admin/travelAgenecy/add.php">Create an account</a></p>
                  </div>
                </form>

              </div>
            </div>

            <div class="credits">
              Designed by <a href="">Ivisitor</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
<?php
