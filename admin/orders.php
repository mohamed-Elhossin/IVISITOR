<?php
include 'allHead.php';
include './sharedFunc/func.php';
include './sharedFunc/db.php';

$userId =  $_SESSION['adminId'];
$select = "SELECT * FROM `payment` ";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
    $id =   $_GET['delete'];
    $delete = "DELETE FROM payment where id = $id";
    $d =  mysqli_query($conn, $delete);
    // header('LOCATION: /ivisitor/admin/trips/list.php');
    testMessage($d, "Delete payment");
}
?>
<!-- ======= Pricing Section ======= -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>List Trips Page</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">List Orders </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row ">
            <!-- Basic Plan  -->
            <table class="table tabel-dark">
                <tr>
                    <td> ID </td>
                    <td> Amount </td>
                    <td> pay_Date </td>
                    <td> Delete </td>
                </tr>
                <?php foreach ($s as $data) { ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['amount'] ?></td>
                        <td><?php echo $data['paymentDate'] ?></td>
                        <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/ivisitor/user/orders.php?delete=<?php echo $data['id'] ?>">delete </a> </th>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>
    <?php
    include './shared/footer.php';
    include './shared/script.php';

    ?>