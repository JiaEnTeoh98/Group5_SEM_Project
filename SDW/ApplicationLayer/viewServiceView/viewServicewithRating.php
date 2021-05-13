<?php
require __DIR__ . '/../../src/bootstrap.php';
session_start();
require_once __DIR__ . '/../../BusinessServiceLayer/viewServiceController/viewServiceController.php';

$ser = new viewServiceController();

$data1 = $ser->viewSortedByRating($_SESSION["list"]);
$data2 = $ser->viewServicewithoutRating($_SESSION["list"]);


?>
<html>

<head>
</head>

<body>
    <form method="POST">
        <div class="mx-auto" style="width: 90%;">
            <?php $i = 0;
            require __DIR__ . '/../../src/navbar.php' ?>
            <h5>Customer Homepage > Service List > Sort by Rating</h5>
            <form method="POST">
                <a href="./CusProductList.php">
                    <span class="material-icons md-48 text-primary my-3">
                        arrow_back
                    </span>
                </a>
                <br />
                <!-- <div class="d-flex justify-content-between bd-highlight mb-3"> -->

                <h3 class="display-4">With rating</h3><br />
                <div class="row d-flex flex-wrap mx-0">
                    <?php foreach ($data1 as $row) { ?>
                        <div style="width: 18%" class="px-2 mb-5 ml-4 bd-highlight">
                            <a href="../orderView/CusProductInfo.php?Service_ID=<?= $row['Service_ID'] ?>">
                                <img class="col-12" height="250" src="<?= $row['S_Photo'] ?>" />
                                <div class="mx-3">
                                    <p class="pt-1 h5"><?= $row['S_Name'] ?></p>
                                    <p class=" lead mt-0">Unit Price: RM <?= $row['Unit_Price'] ?></p>
                                    <p class=" lead mt-0">Rating: <?= number_format((float) $row['ave'], 2, '.', '') ?>
                                    </p>
                                    <p> <?php for ($i = 1; $i <= $row['ave']; $i++) {
                                            echo "<span style='color:#fcd65f' class='material-icons'>star</span>";
                                            if ($row['ave'] - $i == 0.5)
                                                echo "<span class='material-icons'>star_half</span>";
                                        } ?></p>
                                </div>
                                <br />
                                <?php ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <hr />

                <h3 class="display-4">Without rating</h3><br />
                <div class="row d-flex flex-wrap mx-0">
                    <?php foreach ($data2 as $row) { ?>
                        <div style="width: 18%" class="px-2 mb-5 ml-4 bd-highlight">
                            <a href="../orderView/CusProductInfo.php?Service_ID=<?= $row['Service_ID'] ?>">
                                <img class="col-12" height="250" src="<?= $row['S_Photo'] ?>" />
                                <div class="mx-3">
                                    <p class="pt-1 h5"><?= $row['S_Name'] ?></p>
                                    <p class=" lead mt-0">Unit Price: RM <?= $row['Unit_Price'] ?></p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>


        </div>
    </form>
</body>

</html>