<?php

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

function auth()
{
    if (isset($_SESSION['admin'])) {
    } else {
        echo "not admin";
        echo "<script>
        window.location.replace('http://localhost/ivisitor/user/pages-login.php)
    </script>";
    }
}
