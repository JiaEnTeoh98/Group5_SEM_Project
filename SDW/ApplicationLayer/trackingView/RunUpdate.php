<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/trackingController/TrackingController.php';

date_default_timezone_set('Asia/Kuala_Lumpur');

$TrackID = $_GET['TrackID'];

$Tracking = new TrackingController();
$data1 = $Tracking->viewStatus($TrackID);

$Status = new TrackingController($TrackID);
$data2 = $Status->viewProgress($TrackID);

if (isset($_POST['update'])) {
    $Status->updateProgress($TrackID);
}
?>
<html>

<body>
    <div class="mx-auto" style="width: 90%">
        <nav class="navbar navbar-expand-sm bg-light rounded my-3" style="height: 10%;">
            <ul class="navbar-nav navbar-left mr-auto">
                <li class="nav-brand"><a style="font-family: 'Pacifico', cursive; font-size: 30px;" class="nav-link"
                        href="/sdw/ApplicationLayer/userProfileView/RunnerHomePage.php">SMS</a></li>
            </ul>
            <ul class="navbar-nav mr-2">
                <li class="nav-item justify-content-center align-self-center px-4">
                    <a href="/sdw/ApplicationLayer/userProfileView/RunnerEditProfile.php">
                        <span style="color:grey; font-size: 36px" class="material-icons">account_circle </span>
                    </a>
                </li>
                <li class="nav-item justify-content-center align-self-center px-5">
                    <a href='/sdw/ApplicationLayer/userProfileView/RunnerLogout.php'
                        style="font-size: 20px; color: lightgreen;" class="nav-link">
                        <img src="/sdw/src/img/signout.png" /></a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="mx-auto" style="width: 90%">
        <h5>RunnerHomepage > JobList > UpdateProgress</h5>
        <a href="./RunJobList.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
        <hr>
        <?php
        foreach ($data1 as $row1) {
        ?>
        <tr>
            <td>Tracking Number: <?= $row1['TrackID'] ?></td>
        </tr>
        <?php } ?>
        <hr>
        <form action="" method="POST">
            <table width="100%">
                <tr>
                    <td>Date:</td>
                    <td><input type="text" name="TrackDate" value="<?php echo date("d/m/Y") ?>" readonly></td>
                    <td>Time:</td>
                    <td><input type="text" name="TrackTime" value="<?php echo date("h:i:s a") ?>" readonly></td>
                </tr>
                <tr>
                    <td>Process:</td>
                    <td><select name="TrackProcess" id="TrackProcess">
                            <option value="Order received">Order received</option>
                            <option value="Service order processing">Service order processing</option>
                            <option value="Runner on the way destination">Runner on the way destination</option>
                            <option value="Runner arrived">Runner arrived</option>
                        </select>

                        <input type="hidden" name="StatID" value="<?= $i ?>" readonly>
                        <input type="hidden" name="TrackID" value="<?= $row1['TrackID'] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="update" value="Update" width="100%"></td>
                </tr>
            </table>
        </form>
        <hr>
        <table border="1" width="100%" align="center">
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

    </div>
</body>

</html>
