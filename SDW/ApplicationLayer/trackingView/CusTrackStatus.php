<?php
require_once __DIR__ . '/../../BusinessServiceLayer/trackingController/TrackingController.php';
require __DIR__ . '/../../src/bootstrap.php';
$Status = new TrackingController();
$TrackID = $_GET['TrackID'];
if (isset($_POST['received'])) {
    $Status->updateDeliveryStatus();
}
$data = $Status->viewRunner($TrackID);
$data2 = $Status->viewProgress($TrackID);
?>
<html>

<body>
    <div class="mx-auto" style="width: 90%">
        <?php require __DIR__ . '/../../src/navbar.php' ?>
    </div>

    <div class="mx-auto" style="width: 90%">
        <h5>Customer Homepage > TrackingList > Status</h5>
        <hr>
        <?php foreach ($data as $row) { ?>
            Runner: <?= $row['R_Name'] ?>
            <br />
            Contact number: <?= $row['R_ContactNo'] ?>
            <br />
            <hr />
        <?php } ?>
        <table border="1" width="80%" align="center">
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Process</th>
            </tr>

            <tr>
                <?php
                $i = 1;
                foreach ($data2 as $row2) {
                    echo "<tr>"
                        . "<td>" . $row2['TrackDate'] . "</td>"
                        . "<td>" . $row2['TrackTime'] . "</td>"
                        . "<td>" . $row2['TrackProcess'] . "</td>";
                ?>
                <?php
                    $i++;
                    echo "</tr>";
                }
                ?>
            </tr>
        </table>
        <br />
        <form method="POST"><button type="submit" name="received" value="<?= $TrackID ?>">Confirm
                Received</button></form>
    </div>
</body>

</html>