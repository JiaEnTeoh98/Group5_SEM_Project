<?php
session_start();
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/paymentController/paymentController.php';

$pay = new paymentController();
if (isset($_GET['value'])) {
    $received = $_GET['value'];
    $result = $pay->validatePayment($received);
    if ($result == 1) {
        $pay->updateStock();
        $pay->updateOrderStatus();
        $pay->insertTracking();
    }
}


?>
<html>
<style>
    .material-icons {
        font-size: 90px;
        text-align: center;
        margin: auto;
    }
</style>

<head>
</head>

<body>
    <div class="row h-100">
        <div class="mx-auto my-auto"><span class="material-icons md-48 text-center mx-auto">
                check
            </span><br /></div>
        <div class="mx-auto my-auto">
            <h1 class="text-center mx-auto">
                <br />Payment Successful<br />
                You will be redirected to HomePage in 5 seconds
            </h1>
        </div>
    </div>
</body>
<?php header("Refresh:5; url=/sdw/ApplicationLayer/viewServiceView/CusHomePage.php");
?>

</html>