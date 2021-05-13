<?php
require_once __DIR__ . '/../../BusinessServiceLayer/paymentController/paymentController.php';
require __DIR__ . '/../../src/bootstrap.php';
session_start();
$pay = new paymentController();
$data = $pay->loadReceipt();
?>
<html>

<head>

</head>

<body>
    <div class="mx-auto" style="width: 90%;">
        <?php require __DIR__ . '/../../src/navbar.php' ?>
        <h5>Customer Homepage > List of Receipt > Receipt Details</h5>
        <a href="./CusReceiptList.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
        <br />
    </div>
    <?php foreach ($data as $row) {
        $Ord_IDs = $row['Ord_IDs'];
        $orders = $pay->viewOrderArray($Ord_IDs);
        $i = 1; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row p-5">
                            <div class="col-6">
                                <img height="225" width="350" src="../../src/img/paypal.jpg">
                            </div>

                            <div class="col-6 text-right">
                                <p class="font-weight-bold mb-1">Receipt</p>
                                <p class="text-muted">Payment Date = <?= $row['P_Date'] ?></p>
                            </div>
                        </div>

                        <hr class="mb-1">

                        <div class="row py-2 px-5">
                            <div class="col-6">
                                <p class="font-weight-bold mb-3">Customer Information</p>
                                <p class="mb-1"><?= $row['Cus_Name'] ?></p>
                                <?php $address = $pay->loadShippingAddress($row['Ord_IDs']) ?>
                                <p class="mb-1">
                                    <?php foreach ($address as $each) {
                                            echo $each['ship_add'];
                                        } ?></p>
                            </div>

                            <div class="col-6 text-right">
                                <p class="font-weight-bold mb-3">Payment Details</p>
                                <p class="mb-1"><span class="text-muted">Payment Type: </span> Paypal</p>
                                <p class="mb-1"><span class="text-muted">Payer's Name: </span> <?= $row['Cus_Name'] ?>
                                </p>
                                <p class="mb-1"><span class="text-muted">Payee's Name: </span> SMS Financial Deparment
                                </p>

                            </div>
                        </div>

                        <div class="row p-5">
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">#</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Service Name</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Order ID</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Unit Price</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Item Subotal</th>
                                        </tr>
                                    </thead>

                                    <?php foreach ($orders as $order) { ?><tbody>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $order['S_Name'] ?></td>
                                            <td><?= $order['Ord_ID'] ?></td>
                                            <td><?= $order['quantity'] ?></td>
                                            <td><?= $order['Unit_Price'] ?></td>
                                            <td><?= $order['quantity'] * $order['Unit_Price'] ?></td>
                                        </tr>
                                    </tbody>
                                    <?php $i++;
                                        } ?>

                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Grand Total</div>
                                <div class="h2 font-weight-light">RM <?= $row['T_Payment'] ?></div>
                            </div>

                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Delivery Fee</div>
                                <div class="h2 font-weight-light">RM <?= $row['delivery_fee'] ?></div>
                            </div>

                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Item(s) subtotal</div>
                                <div class="h2 font-weight-light">RM <?= $row['subtotal'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
    } ?>
</body>

</html>