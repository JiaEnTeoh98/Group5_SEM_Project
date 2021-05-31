<?php
require __DIR__ . '/../../src/bootstrap.php';
session_start();
require_once __DIR__ . '/../../BusinessServiceLayer/viewServiceController/viewServiceController.php';

$ser = new viewServiceController();

if (isset($_GET['list'])) {
    $list = $_GET['list'];
    $_SESSION["list"] = $list;
} else $list = $_SESSION["list"];
$data = $ser->viewProductList($list);

if (isset($_POST['sortFromLow'])) {
    $data = $ser->viewSortedFromLow($list);
}

?>
<html>

<head>
</head>

<body>
    <form method="POST">
        <div class="mx-auto" style="width: 90%;">
            <?php require __DIR__ . '/../../src/navbar.php' ?>
            <h5>Customer Homepage > Service List</h5>
            <a href="./CusHomePage.php">
                <span class="material-icons md-48 text-primary my-3">
                    arrow_back
                </span>
            </a>
            <br />


            <form method="POST">
                Sort by:
                <button type="submit" name="sortFromLow">Price from Low to High</button>
                <a href="./viewServicewithRating.php" name="sortFromRating">Rating from High to Low</a></form>

            <br />
            <br />
            <hr />
            <!-- <div class="d-flex justify-content-between bd-highlight mb-3"> -->
            <div class="row d-flex flex-wrap mx-0">
            <table class="table">
                    <thead class="">
                    <tr class="h5">
                       
                     
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                           
                        </tr>
                    </thead>

                <?php foreach ($data as $row) { ?>
                <tr>
                    <div style="width: 18%" class="px-2 mb-5 ml-4 bd-highlight">
                        <a href="../orderView/CusProductInfo.php?Service_ID=<?= $row['Service_ID'] ?>">
                           <td> <img class="col-12" height="250" src="<?= $row['S_Photo'] ?>" /></td>
                            <div class="mx-3">
                             <td>   <p class="pt-1 h5"><?= $row['S_Name'] ?></p>
                                <p class=" lead mt-0">Unit Price: RM <?= $row['Unit_Price'] ?></p><td>
                            </div>
                        </a>
                    </div>
                    </tr>
                <?php } ?>
                </table>
            </div>


        </div>
    </form>
</body>

</html>