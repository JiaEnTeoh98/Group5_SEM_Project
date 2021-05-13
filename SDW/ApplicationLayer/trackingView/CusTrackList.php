<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/trackingController/TrackingController.php';

$Tracking = new TrackingController();
$data1 = $Tracking->viewOnD();
$data2 = $Tracking->viewComp();
?>
<html>

<body>
    <div class="mx-auto" style="width: 90%">
        <?php require __DIR__ . '/../../src/navbar.php' ?>
    </div>

    <div class="mx-auto" style="width: 90%">
        <h5>Customer Homepage > TrackingList</h5>
        <a href="../viewServiceView/CusHomePage.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
        <hr>
        <h1 align="center">On Delivery Order</h1>
        <table border="1" width="80%" align="center">
            <tr>
                <th>#</th>
                <th>Service Name</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($data1 as $row1) { ?>
            <form method="POST">
                <tr>
                    <td><?= $i ?></td>
                    <td width="20%"><?= $row1['S_Name'] ?></td>

                    <td><?= $row1['Ship_Add'] ?></td>
                    <td width="20%"><input type="button"
                            onclick="location.href='CusTrackStatus.php?TrackID=<?= $row1['TrackID'] ?>'" value="STATUS">
                    </td>
                </tr>
            </form>
            <?php
                $i++;;
            }
            ?>
        </table>
    </div>

    <div class="mx-auto" style="width: 90%">
        <hr>
        <h1 align="center">Completed Order</h1>
        <table border="1" width="80%" align="center">
            <tr>
                <th>#</th>
                <th>Service</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php
            $i = 1;
            foreach ($data2 as $row2) { ?>
            <form action="../manageAnalyticView/CusFeedback.php" method="POST">
                <tr>
                    <td><?= $i ?></td>
                    <td width="20%"><?= $row2['S_Name'] ?></td>
                    <td><?= $row2['Ship_Add'] ?></td>
                    <td width="20%">
                        <input type="hidden" name="Cus_ID" value="<?= $row2['Cus_ID'] ?>">
                        <button type="submit" name="TrackID" value="<?= $row2['TrackID'] ?>">Feedback</button>
                    </td>
                </tr>
            </form>
            <?php
                $i++;
            }
            ?>
        </table>
    </div>
</body>

</html>