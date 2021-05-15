<?php
require __DIR__ . '/../../src/bootstrap.php';
require_once __DIR__ . '/../../BusinessServiceLayer/trackingController/TrackingController.php';


$Tracking = new TrackingController();
$data1 = $Tracking->viewUnaccepted();
$data2 = $Tracking->viewAccepted();
$data3 = $Tracking->viewCompleted();

if (isset($_POST['accept'])) {
    $Tracking->runAccept();
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
                    <a href='/sdw/ApplicationLayer/userProfileView/RunnerLogin.php'
                        style="font-size: 20px; color: lightgreen;" class="nav-link">
                        <img src="/sdw/src/img/signout.png" /></a>
                </li>
            </ul>
        </nav>
    </div>


    <div class="mx-auto" style="width: 90%">
        <h5>RunnerHomepage > JobList</h5>
        <a href="../userProfileView/RunnerHomePage.php">
            <span class="material-icons md-48 text-primary my-3">
                arrow_back
            </span>
        </a>
        <hr>
        <h4 align="center">Available Job</h4>
        <form action="" method="POST">
            <table border="1" width="80%" align="center">
                <tr>
                    <th>Tracking No</th>
                    <th>Order</th>
                    <th>From
                    <th>To</th>
                    <th>Customer Telephone No</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php
                    $i = 1;
                    foreach ($data1 as $row1) {
                        echo "<tr>"
                            . "<td>" . $row1['TrackID'] . "</td>"
                            . "<td>" . $row1['S_Name'] . "<br/>" . "(Quantity: " . $row1['quantity'] . ")" . "</td>"
                            . "<td>" .  $row1['spname'] . "<br/>" . $row1['spaddress'] . "</td>"
                            . "<td>" . $row1['Ship_Add'] . "</td>"
                            . "<td>" . $row1['Cus_Telno'] . "</td>";
                    ?>
                    <td width="20%">
                        <input type="hidden" name="TrackID" value="<?= $row1['TrackID'] ?>" readonly>
                        <input type="hidden" name="RunStatus" value="accepted" readonly>
                        <input type="submit" name="accept" value="ACCEPT">
                    </td>
                    <?php
                        $i++;
                        echo "</tr>";
                    }
                    ?>
                </tr>
            </table>
        </form>
    </div>

    <div class="mx-auto" style="width: 90%">
        <hr>
        <h4 align="center">Accepted Job</h4>
        <form action="" method="POST">
            <table border="1" width="80%" align="center">
                <tr>
                    <th>Tracking No</th>
                    <th>Order</th>
                    <th>From
                    <th>To</th>
                    <th>Customer Telephone No</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php
                    $i = 1;
                    foreach ($data2 as $row2) {
                        echo "<tr>"
                            . "<td>" . $row2['TrackID'] . "</td>"
                            . "<td>" . $row2['S_Name'] . "<br/>" . "(Quantity: " . $row2['quantity'] . ")" . "</td>"
                            . "<td>" .  $row2['spname'] . "<br/>" . $row2['spaddress'] . "</td>"
                            . "<td>" . $row2['Ship_Add'] . "</td>"
                            . "<td>" . $row2['Cus_Telno'] . "</td>";
                    ?>
                    <td width="20%">
                        <input type="hidden" name="TrackID" value="<?= $row2['TrackID'] ?>" readonly>
                        <input type="hidden" name="RunStatus" value="unaccepted" readonly>
                        <input type="button" onclick="location.href='RunUpdate.php?TrackID=<?= $row2['TrackID'] ?>'"
                            value="UPDATE">
                        <!-- <input type="submit" name="accept" value="REJECT"> -->
                    </td>
                    <?php
                        $i++;
                        echo "</tr>";
                    }
                    ?>
                </tr>
            </table>
        </form>
    </div>

    <div class="mx-auto" style="width: 90%">
        <hr>
        <h4 align="center">Completed Job</h4>
        <form action="" method="POST">
            <table border="1" width="80%" align="center">
                <tr>
                    <th>Tracking No</th>
                    <th>Order</th>
                    <th>From
                    <th>To</th>
                    <th>Customer Telephone No</th>

                </tr>
                <tr>
                    <?php
                    $i = 1;
                    foreach ($data3 as $row3) {
                        echo "<tr>"
                            . "<td>" . $row3['TrackID'] . "</td>"
                            . "<td>" . $row3['S_Name'] . "<br/>" . "(Quantity: " . $row2['quantity'] . ")" . "</td>"
                            . "<td>" .  $row3['spname'] . "<br/>" . $row2['spaddress'] . "</td>"
                            . "<td>" . $row3['Ship_Add'] . "</td>"
                            . "<td>" . $row3['Cus_Telno'] . "</td>";
                    ?>

                    <?php
                        $i++;
                        echo "</tr>";
                    }
                    ?>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>