<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';
$userId =  $_SESSION['adminId'];
$select = "SELECT * FROM `payment` where userId =$userId ";
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
<section id="pricing" class="my-5 pricing section-bg wow fadeInUp">

    <div class="container">
        <header class="section-header">
            <h3>Trips</h3>
        </header>

        <div class="row flex-items-xs-middle flex-items-xs-center">
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
    </div>

</section><!-- End Pricing Section -->

<?php
include './shared/footer.php';
include './shared/script.php';

?>