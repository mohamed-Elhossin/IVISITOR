<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `trips`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id =   $_GET['delete'];
  $delete = "DELETE FROM trips where id = $id";
  $d =  mysqli_query($conn, $delete);
  // header('LOCATION: /ivisitor/admin/trips/list.php');
  testMessage($d , "Delete Trip $id ");
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List Trips Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List Trips </li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container  mt-5 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table table-dark">
              <tr>
                <th>ID</th>
                <th>stat</th>
                <th>price</th>
                <th>description</th>
                <th>date</th>
                <th> agency_id	</th>
               
                <th colspan="3">Action</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['state'] ?> </th>
                  <th> <?php echo $data['price'] ?> </th>
                  <th> <?php echo $data['description'] ?> </th>
                  <th> <?php echo $data['date'] ?> </th>
                  <th> <?php echo $data['agency_id'] ?> </th>
                  <th> <a class="btn btn-warning" href="/ivisitor/admin/trips/add.php?edit=<?php echo $data['id'] ?>">Edit </a> </th>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/ivisitor/admin/trips/list.php?delete=<?php echo $data['id'] ?>">delete </a> </th>
                </tr>
              <?php } ?>
            </table>
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