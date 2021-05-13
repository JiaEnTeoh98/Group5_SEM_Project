<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/paymentController/paymentController.php';

session_start();
$pay = new paymentController();
$data = $pay->viewReceiptList();

?>
<html>

<head>
    <link rel="stylesheet" href="../../src/css/bootstrap.min.css" />
    <script src="../../src/script/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../src/css/all.css" />
</head>

<body>
    <div class="mx-auto" style="width: 90%;">
        <?php require __DIR__ . '/../../src/navbar.php' ?>
        <h5>Customer Homepage > List of Receipt</h5>
        <a href="../viewServiceView/CusHomePage.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
        <br />
        <div style="background-color: #E8E9EB">
            <p class="display-4 px-4 py-1">List of Receipts Received</p>
            <br />
            <?php foreach ($data as $row) { ?>
            <div style="color:#CCCDC6"
                class="my-3 border rounded border-secondary p-3 col-11 bg-white text-dark mx-auto">
                <form>
                    <p class="h5">Receipt Received on <?= $row['P_Date'] ?></p>
                    <input type="hidden" name="P_ID" value="<?= $row['P_ID'] ?>">
                    <button type="submit" class="btn btn-outline-info" formaction="./CusReceipt.php" formmethod="POST"
                        style="float: right;">View
                        Receipt</button>
                    <br />
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>