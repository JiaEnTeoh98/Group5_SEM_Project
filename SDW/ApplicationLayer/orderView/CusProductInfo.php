<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once '../../BusinessServiceLayer/orderController/orderController.php';

session_start();

$Service_ID = $_GET['Service_ID'];

$ord = new orderController();
$data = $ord->viewDetails($Service_ID);

if (isset($_POST['addCart'])) {
    $ord->addOrder();
}
?>
<html>

<head>
    <link rel="stylesheet" href="../src/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/all.css" />
</head>

<body>
    <?php foreach ($data as $row) { ?>
        <div class="mx-auto" style="width: 90%;">
            <?php require __DIR__ . '/../../src/navbar.php' ?>
            <h5>Customer Homepage > Service List > Service Details</h5>

            <a href="../viewServiceView/Cusproductlist.php?list=<?= $_SESSION['list'] ?>">
                <span class="material-icons md-48 text-primary my-3">
                    arrow_back
                </span>
            </a>
            <br />
            <div class="clearfix pt-2">

                <form method="POST">
                    <div class="float-left pr-5 mr-5">
                        <img src="<?= $row['S_Photo'] ?>" width=400 height=500 />
                    </div>
                    <div>
                        <span class="display-4"><?= $row['S_Name'] ?></span>
                        <br />
                        <br />
                        <h5><i>Prepared by <?= $row['spname'] ?></i></h5>
                        <div class="pt-3">
                            <span class="h2"><strong>RM <?= $row['Unit_Price'] ?></strong></span>

                        </div>
                        <br />
                        <div class="pt-3">
                            <span class="lead"><?= $row['S_Desc'] ?></span>
                        </div>
                        <p class="h6 pt-4">Stock Available: <?= $row['S_Stock'] ?></p>
                        <br />
                        <br />
                        <div class="row">
                            <div class="col-2">
                                <span class="h5">Quantity</span>
                            </div>
                            <div class="col-3">
                                <input type="number" class="h5 form-control" name="quantity" min=1 required max="<?= $row['S_Stock'] ?>" />
                            </div>
                        </div>

                        <input type="hidden" name="Unit_Price" value="<?= $row['Unit_Price'] ?>" />
                        <input type="hidden" name="Service_ID" value="<?= $row['Service_ID'] ?>" />
                        <br />
                        <br />

                        <div class="row">
                            <div class="col-2">
                                <input type="submit" name="addCart" value="Add To Cart" class="btn btn-outline-primary h5 btn-lg" />
                            </div>
                        </div>


                    </div>
                </form>
            </div>

        </div>
    <?php } ?>
</body>