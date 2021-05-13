<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/viewServiceController/viewServiceController.php';
session_start();
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $_SESSION["query"] = $query;
} else $query = $_SESSION["query"];
$ser = new viewServiceController();
$data = $ser->viewSearchList($query);

?>
<html>

<head>
</head>

<body>
    <form method="POST">
        <div class="mx-auto" style="width: 90%;">
            <?php require __DIR__ . '/../../src/navbar.php' ?>
            <h5>Customer Homepage > Search Result(s)</h5>

            <a href="./CusHomePage.php">
                <span class="material-icons md-48 text-primary my-3">
                    arrow_back
                </span>
            </a>
            <br />
            <!-- <div class="d-flex justify-content-between bd-highlight mb-3"> -->
            <div class="row d-flex flex-wrap mx-0">
                <?php if ($data->rowCount() == 0) { ?>
                    <h1>No result found</h1>
                <?php } else { ?>
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Stocks left</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><a href="../orderView/CusProductInfo.php?Service_ID=<?= $row['Service_ID'] ?>"><?= $row['S_Name'] ?>
                                        </a>
                                    </td>
                                    <td><?= $row['Unit_Price'] ?></td>
                                    <td><?= $row['S_Stock'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
            </div>


        </div>
        </div>
    </form>
</body>

</html>